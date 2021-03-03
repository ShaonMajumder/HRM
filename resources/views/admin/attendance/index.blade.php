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
                    <a href="{{ route('position') }}" class="btn btn-info btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Position</span></a>  
                    <a href="{{ route('department') }}" class="btn btn-danger btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Department</span></a><a href="{{ route('division') }}" class="btn btn-success btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Division</span></a>  
                    <a href="{{ route('employee.create') }}" class="btn btn-warning btn-float text-white mr-4"><i class="icon-plus-circle2 text-white"></i><span>Add Employee</span></a>  
                        {{-- <a href="#" class="btn btn btn-primary btn-float text-white"  data-toggle="modal" data-target="#modal_position"><i class="icon-plus-circle2 text-white"></i><span>ADD NEW</span></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
          <div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Employee lists</h5>
			</div>

			<div class="table-responsive">
				<table class="table employee-datatable">
					<thead class="bg-dark">
						<tr>
							<th>Emp.ID.</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
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
	<div id="view_employee" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Employee Details</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
			
				</div>
			</div>
		</div>
	</div>
	<!-- /Deparment modal -->




{{-- All Ajax and javascript code start from here --}}

<script type="text/javascript">
  $(function getEmployee() { 
    var table = $('.employee-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employee') }}",
        columns: [
            {data: 'employee_id', name: 'employee_id'},
            {data: 'photo', name: 'photo',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"" + data + "\" height=\"40\"/>";
                    }
            },
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'present_address', name: 'present_address'},
            {data: 'action', name: 'action',orderable: true,searchable: true},
        ],
        
    });    
  });
</script>
<script type="text/javascript">
    // Editrequest pass for data
    $('body').on('click', '.view', function () {
          var emp_id = $(this).data('id');
          $.get("employee/view/"+emp_id, function (data) {
                $('.modal-body').html(data); 
                 
          })
       });

     // Setup ajax for csrf token.
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
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
		                     $('.employee-datatable').DataTable().ajax.reload();
		                 }
		             });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });
	      });    

    
  
       
</script>
@endsection