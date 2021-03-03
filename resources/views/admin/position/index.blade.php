@extends('layouts.admin')
@section('content')
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Position</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                       <a href="{{ route('division') }}" class="btn btn-success btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Employee</span></a>  
                        <a href="#" class="btn btn btn-primary btn-float text-white"  data-toggle="modal" data-target="#modal_position"><i class="icon-plus-circle2 text-white"></i><span>ADD NEW</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
          <div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Position lists</h5>
			</div>

			<div class="table-responsive">
				<table class="table position-datatable">
					<thead class="bg-dark">
						<tr>
							<th>NO</th>
							<th>Name</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody >
							
					</tbody>
				</table>
				
			</div>
		  </div>
		</div>


    <!-- Add Deparment Modal -->
	<div id="modal_position" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Add New Position</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="add_position_form" action="{{ route('position.store') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Position Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="position_name" placeholder="Position Name" required="">
						</div>
						<span class="error error_department"></span>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Position Details:</label>
						<div class="col-lg-9">
							<textarea class="form-control" name="position_details" rows="3">
								
							</textarea>
						</div>
						<span class="error error_department"></span>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>								
				</div>
			</div>
		</div>
	</div>
	<!-- /Deparment modal -->

	 <!-- Edit Deparment Modal -->
	<div id="edit_modal_position" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Update Department</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="edit_position_form" action="{{ route('position.update') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Position Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="position_name" placeholder="Position Name" required="" id="position_name">
						</div>
					</div>
					<input type="hidden" name="id" id="id">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Position Details:</label>
						<div class="col-lg-9">
							<textarea class="form-control" name="position_details" id="position_details" rows="3">
								
							</textarea>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">UPDATE</button>
					</div>
				</form>								
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Deparment modal -->


{{-- All Ajax and javascript code start from here --}}

<script type="text/javascript">
  $(function getDepartments() { 
    var table = $('.position-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('position') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'position_name', name: 'position_name'},
            {data: 'position_details', name: 'position_details'},
            {data: 'action', name: 'action',orderable: true,searchable: true},
        ]
    });    
  });
</script>
<script type="text/javascript">
	 // Setup ajax for csrf token.
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     // call jquery method 
     $(document).ready(function(){
         // Add position by ajax
         $('#add_position_form').on('submit', function(e){
             e.preventDefault();
             var url = $(this).attr('action');
             var request = $(this).serialize();
             $.ajax({
                 url:url,
                 type:'post',
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData: false,
                 success:function(data){
                     toastr.success(data, 'Succeed');
                     $('#add_position_form')[0].reset(); 
                     $('#modal_position').modal('hide');
                     $('.position-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

        // Editrequest pass for data
        $('body').on('click', '.edit', function () {
              var position_id = $(this).data('id');
              $.get("position/edit/"+position_id, function (data) {
                   $('#position_name').val(data.position_name);  
                   $('#position_details').val(data.position_details);  
                   $('#id').val(data.id);  
              })
           });

        //updat edit modal
          $(document).ready(function(){
         // Add position by ajax
         $('#edit_position_form').on('submit', function(e){
             e.preventDefault();
             var url = $(this).attr('action');
             var request = $(this).serialize();
             $.ajax({
                 url:url,
                 type:'post',
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData: false,
                 success:function(data){
                     toastr.success(data, 'Succeed');
                     $('#edit_position_form')[0].reset(); 
                     $('#edit_modal_position').modal('hide');
                     $('.position-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

      //delete position
      // Show sweet alert for delete
	      $(document).on('click', '.delete', function(e) {
	      	e.preventDefault();
	        var url = $(this).attr('href');           
	        swal({
                  title: "Are you sure to delete ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                       $.ajax({
		                 url:url,
		                 type:'delete',
		                 success:function(data){
		                     toastr.success(data, 'Succeed');
		                     $('.position-datatable').DataTable().ajax.reload();
		                 }
		             });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });
	      });    

    
  
       
</script>
@endsection