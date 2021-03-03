@extends('layouts.admin')
@section('content')
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Departments</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                       <a href="{{ route('division') }}" class="btn btn-success btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Divisions</span></a>  
                        <a href="#" class="btn btn btn-primary btn-float text-white"  data-toggle="modal" data-target="#modal_department"><i class="icon-plus-circle2 text-white"></i><span>ADD NEW</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
          <div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Department lists</h5>
			</div>

			<div class="table-responsive">
				<table class="table department-datatable">
					<thead class="bg-dark">
						<tr>
							<th>NO</th>
							<th>Name</th>
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
	<div id="modal_department" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Add New Department</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="add_department_form" action="{{ route('department.store') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Department Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="department_name" placeholder="Department Name" required="">
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
	<div id="edit_modal_department" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Update Department</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="edit_department_form" action="{{ route('department.update') }}">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Department Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department Name" required="">
							<input type="hidden" class="form-control" name="id" id="id"  required="">
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
    var table = $('.department-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('department') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'department_name', name: 'department_name'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
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
         // Add department by ajax
         $('#add_department_form').on('submit', function(e){
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
                     $('#add_department_form')[0].reset(); 
                     $('#modal_department').modal('hide');
                     $('.department-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

        // Editrequest pass for data
        $('body').on('click', '.edit', function () {
              var department_id = $(this).data('id');
              $.get("department/edit/"+department_id, function (data) {
                   $('#department_name').val(data.department_name);  
                   $('#id').val(data.id);  
              })
           });

        //updat edit modal
          $(document).ready(function(){
         // Add department by ajax
         $('#edit_department_form').on('submit', function(e){
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
                     $('#edit_department_form')[0].reset(); 
                     $('#edit_modal_department').modal('hide');
                     $('.department-datatable').DataTable().ajax.reload();
                 }
		      
             });
         });
     });

      //delete department
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
		                     $('.department-datatable').DataTable().ajax.reload();
		                 }
		             });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });
	      });    

    
  
       
</script>
@endsection