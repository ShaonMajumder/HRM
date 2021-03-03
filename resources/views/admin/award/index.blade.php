@extends('layouts.admin')
@section('content')

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Awards</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn btn-primary btn-float text-white"  data-toggle="modal" data-target="#modal_award"><i class="icon-medal text-white"></i><span>ADD NEW</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
          <div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Award lists</h5>
			</div>

			<div class="table-responsive">
				<table class="table award-datatable">
					<thead class="bg-dark">
						<tr>
							<th>Employee</th>
							<th>Award Name</th>
              <th>Gift Item</th>
              <th>Award By</th>
              <th>Award Date</th>
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
	<div id="modal_award" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title"><i class="icon-medal mr-2"></i> &nbsp;Add New Award</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form id="add_award_form" action="{{ route('award.store') }}">
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Employee:</label>
            <div class="col-lg-9">
              <select class="selectpicker form-control" data-live-search="true" name="user_id" required>
                <option selected="" disabled="">-- chosee employee-</option>
                  @foreach($user as $row)
                    <option  value="{{ $row->id }}">{{ $row->name }} | ID: {{ $row->id }}</option>
                  @endforeach
              </select>  
            </div>
            <span class="error error_department"></span>
          </div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Award Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="award_name" placeholder="Award Name" required="" >
						</div>
					</div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Award Details:</label>
            <div class="col-lg-9">
              <textarea class="form-control" name="award_description" placeholder="Award description" >
              </textarea>
            </div>
            <span class="error error_department"></span>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Award By:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="award_by" placeholder="Who Given Award" required="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Gift Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="gift_item" placeholder="Gift Item Name" required="" >
            </div>
          </div>
           <div class="form-group row">
            <label class="col-lg-3 col-form-label">Award Date:</label>
            <div class="col-lg-9">
              <input type="date" class="form-control" name="date" required="" value="<?= date('Y-m-d'); ?>">
            </div>
          </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>								
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Award Modal -->
  <div id="edit_modal_award" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title"><i class="icon-plus-circle2 mr-2"></i> &nbsp;Update Award Details</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form id="edit_division_form" action="{{ route('division.update') }}">
             <div class="form-group row">
               <label class="col-lg-3 col-form-label">Employee:</label>
               <div class="col-lg-9">
                 <select class="form-control selectpicker" data-live-search="true" name="user_id" id="user_id" required>
                   
                 </select>  
               </div>
               <span class="error error_department"></span>
             </div>
             <input type="hidden" name="id" id="id">
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Award Name:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="award_name" id="award_name" required="" >
              </div>
            </div>
             <div class="form-group row">
               <label class="col-lg-3 col-form-label">Award Details:</label>
               <div class="col-lg-9">
                 <textarea class="form-control" name="award_description" id="award_details">
                 </textarea>
               </div>
               <span class="error error_department"></span>
             </div>
             <div class="form-group row">
               <label class="col-lg-3 col-form-label">Award By:</label>
               <div class="col-lg-9">
                 <input type="text" class="form-control" name="award_by" id="award_by" required="" >
               </div>
             </div>
             <div class="form-group row">
               <label class="col-lg-3 col-form-label">Gift Name:</label>
               <div class="col-lg-9">
                 <input type="text" class="form-control" name="gift_item" id="gift_item" required="" >
               </div>
             </div>
              <div class="form-group row">
               <label class="col-lg-3 col-form-label">Award Date:</label>
               <div class="col-lg-9">
                 <input type="date" class="form-control" name="date" required="" id="award_date">
               </div>
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


<script type="text/javascript">
  $(function getDepartments() { 
    var table = $('.award-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('award') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'award_name', name: 'award_name'},
            {data: 'gift_item', name: 'gift_item'},
            {data: 'award_by', name: 'award_by'},
            {data: 'date', name: 'date'},
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
         // Add Award by ajax
         $('#add_award_form').on('submit', function(e){
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
                     $('#add_award_form')[0].reset(); 
                     $('#modal_award').modal('hide');
                     $('.award-datatable').DataTable().ajax.reload();
                 }
          
             });
         });
     });

     //get all deaprtment via ajax
      function getUser(){
          var formuser = $.ajax({
              url:"{{route('get.user')}}",
              async: false,
              dataType: 'json'
          }).responseJSON;
          return formuser;
      }

      // Edit request pass for data
        $('body').on('click', '.edit', function () {
              var award_id = $(this).data('id');
              $.get("award/edit/"+award_id, function (data) {
                   $('#award_name').val(data.award_name);  
                   $('#award_details').val(data.award_description);  
                   $('#award_by').val(data.award_by);  
                   $('#gift_item').val(data.gift_item);  
                   $('#award_date').val(data.date);  
                   $('#id').val(data.id); 

                     $('#user_id').empty();
                     $.each(getUser(),function(key,val){
                        if(val.id == data.user_id){
                           // $('#user_id').append('<option SELECTED value="'+val.id+'">'+ val.name +'</option>');
                           $('#user_id').append('<option value="'+val.id+'" selected>'+ val.name +'</option>');
                        }else{
                            $('#user_id').append('<option value="'+val.id+'">'+ val.name +'</option>');
                        }
                     });
              })
           });

      //delete award
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
		                     $('.award-datatable').DataTable().ajax.reload();
		                 }
		             });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });
	      });    

    
  
       
</script>
@endsection