@extends('layouts.admin')
@section('content')
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Employee</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                    <a href="{{ route('position') }}" class="btn btn-info btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Position</span></a>  
                    <a href="{{ route('department') }}" class="btn btn-danger btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Department</span></a>
                    <a href="{{ route('division') }}" class="btn btn-success btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Division</span></a>
                    <a href="{{ route('employee') }}" class="btn btn-warning btn-float text-white mr-4"><i class="icon-list2 text-white"></i><span>Employee</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">     
	            <div class="card">
	            	@if(session()->has('success'))
	            	    <div class="alert bg-success text-white alert-styled-left alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
							<span class="font-weight-semibold">Good !</span> {{ session()->get('success') }}
					    </div>
	            	@endif

					<div class="card-header bg-white header-elements-inline">
						<h6 class="card-title">Attendance Add</h6>	
					</div>
					
					<div class="card-body">
                	<form class="form" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                		@csrf
						<strong class="text-center text-success"> <span class="icon-user"></span> Attendance Information</strong><hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>User ID: <strong class="text-danger">*</strong> </label>
										<input type="text" name="user_id" class="form-control"  required="" placeholder="" value="{{ $user_id }}" readonly="true">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Date: <strong class="text-danger">*</strong></label>
										<input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $date }}"  required="" readonly="true">
										@error('date')
										<span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Month: <strong class="text-danger">*</strong></label>
										<input type="text" name="month" class="form-control @error('month') is-invalid @enderror" value="{{ $month }}"  required="" readonly="true">
										@error('month')
										<span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>year: <strong class="text-danger">*</strong></label>
										<input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ $year }}"  required="" readonly="true">
										@error('year')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							
							

							

							
							
							
					    
						<button type="submit" class="btn btn-info"> <i class="icon-plus-circle2"></i> ADD Attendance</button>
					</form>
					</div>
	            </div>
	            <!-- /basic setup -->
		</div>

<script type="text/javascript">
	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	      $('#p_avatar').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
@endsection