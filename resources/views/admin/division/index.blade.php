@extends('layouts.admin')
@section('content')
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Division</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                    	 <a href="{{ route('department') }}" class="btn btn-danger btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Department</span></a>  
                        <a href="#" class="btn btn btn-primary btn-float text-white"  data-toggle="modal" data-target="#modal_division"><i class="icon-plus-circle2 text-white"></i><span>ADD NEW</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
          <div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Division lists</h5>
			</div>

			<div class="table-responsive">
				<table class="table division-datatable">
					<thead class="bg-dark">
						<tr>
							<th>NO</th>
							<th>Department Name</th>
							<th>Division Name</th>
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
	<div id="modal_division" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Add New Division</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="add_division_name" action="{{ route('division.store') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Department :</label>
						<div class="col-lg-9">
							<select class="form-control" name="department_id" required="">
								@foreach($department as $row)
								 <option value="{{ $row->id }}">{{ $row->department_name }}</option>
								@endforeach 
							</select>
						</div>
						<span class="error error_department"></span>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Division Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="division_name" placeholder="Division Name" required="">
						</div>
						<span class="error error_division"></span>
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
	<div id="edit_modal_division" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Update Division</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="edit_division_form" action="{{ route('division.update') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Department :</label>
						<div class="col-lg-9">
							<select class="form-control" name="department_id" required="" id="department_id">
								
							</select>
						</div>
						<span class="error error_department"></span>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Division Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="division_name" id="division_name" placeholder="Division Name" required="">
							<input type="hidden" name="id" id="id">
						</div>
						<span class="error error_division"></span>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>								
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Deparment modal -->


{{-- All Ajax and javascript code start from here --}}

<script type="text/javascript">
  $(function getDivision() { 
    var table = $('.division-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('division') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'department_name', name: 'department_name'},
            {data: 'division_name', name: 'division_name'},
            {data: 'action', name: 'action', orderable: true,searchable: true},
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
         // Add division by ajax
         $('#add_division_name').on('submit', function(e){
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
                     $('#add_division_name')[0].reset(); 
                     $('#modal_division').modal('hide');
                     $('.division-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

     	//get all deaprtment via ajax
     	function getFormDepartment(){
     	    var formdepartment = $.ajax({
     	        url:"{{route('get.department')}}",
     	        async: false,
     	        dataType: 'json'
     	    }).responseJSON;
     	    return formdepartment;
     	}

        // Editrequest pass for data
        $('body').on('click', '.edit', function () {
              var division_id = $(this).data('id');
              $.get("division/edit/"+division_id, function (data) {
                   $('#division_name').val(data.division_name);  
                   $('#id').val(data.id);  
                     $('#department_id').empty();
                     $.each(getFormDepartment(),function(key,val){
                        if(val.id == data.department_id){
                            $('#department_id').append('<option SELECTED value="'+val.id+'">'+ val.department_name +'</option>');
                        }else{
                            $('#department_id').append('<option value="'+val.id+'">'+ val.department_name +'</option>');
                        }
                     });
              })
           });


        //updat edit modal
          $(document).ready(function(){
         // Update division by ajax
         $('#edit_division_form').on('submit', function(e){
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
                     $('#edit_division_form')[0].reset(); 
                     $('#edit_modal_division').modal('hide');
                     $('.division-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

      //delete division
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
		                     $('.division-datatable').DataTable().ajax.reload();
		                 }
		             });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });
	      });    

    
  
       
</script>
@endsection