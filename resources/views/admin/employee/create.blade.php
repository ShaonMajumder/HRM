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
						<h6 class="card-title">Employee Add</h6>	
					</div>
					<div class="card-body">
                	<form class="form" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                		@csrf
						<strong class="text-center text-success"> <span class="icon-user"></span> Basic Information</strong><hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Employee ID: <strong class="text-danger">*</strong> </label>
										<input type="text" name="employee_id" class="form-control"  required="" placeholder="Write Employee ID" value="{{ $employee_id }}" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Full Name: <strong class="text-danger">*</strong></label>
										<input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}"  required="">
										@error('full_name')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Email address: <strong class="text-danger">*</strong></label>
										<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="" value="{{ old('email') }}">
										@error('email')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Phone: <strong class="text-danger">*</strong></label>
										<input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" required="" value="{{ old('phone') }}">
										@error('phone')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Alternative Phone :</label>
										<input type="text" name="alternative_phone" class="form-control @error('alternative_phone') is-invalid @enderror"  value="{{ old('alternative_phone') }}" >
										@error('alternative_phone')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Country : <strong class="text-danger">*</strong></label>
										<input type="text" name="country" class="form-control" required="" value="Bangladesh" value="{{ old('country') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>City : <strong class="text-danger">*</strong></label>
										<input type="text" name="city" class="form-control" required="" value="{{ old('city') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Zipcode : <strong class="text-danger">*</strong></label>
										<input type="text" name="zipcode" class="form-control" required="" value="{{ old('zipcode') }}">
									</div>
								</div>
							</div><br>
							<strong class="text-center text-success"> <span class="icon-collaboration"></span> Personal Information</strong><hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Division : <strong class="text-danger">*</strong></label>
										<select class="form-control @error('division_id') is-invalid @enderror" name="division_id" id="division_id">
											<option selected="" disabled="">-- choose department --</option>
											@foreach($department as $row)
											  @php 
											    $division=DB::table('divisions')->where('department_id',$row->id)->get();
											  @endphp
											 <option disabled="" class="text-primary"><b>{{ $row->department_name }}</b></option>
											  @foreach($division as $row)
											     <option value="{{ $row->id }}" @if (old('division_id') == $row->id)  selected @endif > &nbsp;&nbsp;&nbsp; -- {{ $row->division_name }}</option>
											  @endforeach
											@endforeach
										</select>
										@error('division_id')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Position : <strong class="text-danger">*</strong></label>
										<select class="form-control @error('position_id') is-invalid @enderror" name="position_id" id="position_id">
											<option selected="" disabled="">-- choose position --</option>
											@foreach($position as $row)
											 <option value="{{ $row->id }}" @if (old('position_id') == $row->id)  selected @endif>{{ $row->position_name }}</option>
											@endforeach
										</select>
										@error('position_id')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Duty Type : <strong class="text-danger">*</strong></label>
										<select class="form-control" name="duty_type">
											<option value="Full Time" @if (old('duty_type') == "Full Time")  selected @endif>Full Time</option>
											<option value="Part Time" @if (old('duty_type') == "Part Time")  selected @endif>Part Time</option>
											<option value="Contractual" @if (old('duty_type') == "Contractual")  selected @endif>Contractual</option>
											<option value="Other" @if (old('duty_type') == "Other")  selected @endif>Other</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Hire Date : <strong class="text-danger">*</strong></label>
										<input type="date" value="<?= date('Y-m-d'); ?>" name="hire_date" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<div class="form-group">
										<label>joining Date : <strong class="text-danger">*</strong></label>
										<input type="date" value="<?= date('Y-m-d'); ?>" name="joining_date" class="form-control" required="" >
									</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="form-group">
										<label>Termination Date : </label>
										<input type="date" name="termination_date" class="form-control" value="{{ old('termination_date') }}">
									</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Termination Reason : </label>
										<input type="text" name="termination_reason" class="form-control" value="{{ old('termination_reason') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Voluntary Termination :</label>
										<select class="form-control" name="voluntary_termination">
											<option></option>
											<option value="Yes" @if (old('voluntary_termination') == "Yes")  selected @endif>Yes</option>
											<option value="No" @if (old('voluntary_termination') == "No")  selected @endif>No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Rate Type : <strong class="text-danger">*</strong></label>
										<select class="form-control" name="rate_type">
											<option value="Salary" @if (old('rate_type') == "Salary")  selected @endif>Salary</option>
											<option value="Hourly" @if (old('rate_type') == "Hourly")  selected @endif>Hourly</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="form-group">
										<label>Rate : <strong class="text-danger">*</strong></label>
										<input type="text" name="rate" class="form-control" required="" value="{{ old('rate') }}">
									</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Pay Frequency  : <strong class="text-danger">*</strong></label>
										<select class="form-control @error('pay_frequency') is-invalid @enderror" name="pay_frequency">
											<option disabled="" selected="">-- Select Pay Frequency --</option>
											<option value="Monthly" @if (old('pay_frequency') == "Monthly")  selected @endif>Monthly</option>
											<option value="Daily" @if (old('pay_frequency') == "Daily")  selected @endif>Daily</option>
											<option value="Weekly" @if (old('pay_frequency') == "Weekly")  selected @endif>Weekly</option>
											<option value="Beweekly" @if (old('pay_frequency') == "Beweekly")  selected @endif>Beweekly</option>
											<option value="Yearly" @if (old('pay_frequency') == "Yearly")  selected @endif>Yearly</option>
										</select>
										@error('pay_frequency')
										    <span class="invalid-feedback" role="alert">
										        <strong>{{ $message }}</strong>
										    </span>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Pay Frequency Text : </label>
										<input type="text" name="pay_frequency_text" class="form-control" value="{{ old('pay_frequency_text') }}">
									</div>
								</div>
							</div><br>
							<strong class="text-center text-success"> <span class="icon-enlarge5"></span> Benefit</strong><hr>
							<div class="row">
							    <div class="col-md-3">
									<div class="form-group">
										<label>Benifit class code : </label>
										<input type="text" name="benefit_class_code" class="form-control" value="{{ old('benefit_class_code') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Benifit Details : </label>
										<input type="text" name="benefit_details" class="form-control" value="{{ old('benefit_details') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Benifit Accural Date : </label>
										<input type="date" name="benefit_accural_date" class="form-control" value="{{ old('benefit_accural_date') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Benifit Status :</label>
										<select class="form-control" name="benefit_status">
											<option disabled="" selected="">-- choose one --</option>
											<option value="Active" @if (old('benefit_status') == "Active")  selected @endif>Active</option>
											<option value="Inactive" @if (old('benefit_status') == "Inactive")  selected @endif>Inactive</option>
										</select>
									</div>
								</div>
							</div><br>
							<strong class="text-center text-success"> <span class="icon-safe"></span> Class</strong><hr>
							<div class="row">
							    <div class="col-md-3">
									<div class="form-group">
										<label> Class code : </label>
										<input type="text" name="class_code" class="form-control" value="{{ old('class_code') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Class Details : </label>
										<input type="text" name="class_details" class="form-control" value="{{ old('class_details') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Class Accural Date : </label>
										<input type="date" name="class_accural_date" class="form-control" value="{{ old('class_accural_date') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Class Status :</label>
										<select class="form-control" name="class_status">
											<option disabled="" selected="">-- choose one --</option>
											<option value="Active" @if (old('class_status') == "Active")  selected @endif>Active</option>
											<option value="Inactive" @if (old('class_status') == "Inactive")  selected @endif>Inactive</option>
										</select>
									</div>
								</div>
							</div><br>

							<strong class="text-center text-success"> <span class="icon-paperplane"></span> Supervisor & Reference</strong><hr>
							<div class="row">
							    <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Supervisor : <strong class="text-danger"> * </strong> </label>
							    		<select class="form-control @error('supervisor_id') is-invalid @enderror" name="supervisor_id" required="">
							    			<option disabled="" selected="">-- under supervisor --</option>
							    			<option value="self"  @if (old('supervisor_id') =="self")  selected @endif>Self</option>
							    			@foreach($supervisor as $row)
							    			<option value="{{ $row->id }}" @if (old('supervisor_id') == $row->id)  selected @endif>{{ $row->name }}</option>
							    			@endforeach
							    		</select>
							    		@error('supervisor_id')
							    		    <span class="invalid-feedback" role="alert">
							    		        <strong>{{ $message }}</strong>
							    		    </span>
							    		@enderror
							    	</div>
							    </div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Reference Name : </label>
										<input type="text" name="reference_name" class="form-control" value="{{ old('reference_name') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Reference Phone: </label>
										<input type="text" name="reference_phone" class="form-control" value="{{ old('reference_phone') }}">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Reference Address: </label>
										<input type="text" name="reference_address" class="form-control" value="{{ old('reference_address') }}">
									</div>
								</div>
							</div><br>

							<strong class="text-center text-success"> <span class="icon-stack-star"></span> Biographical Information</strong><hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Date of birth : <strong class="text-danger">*</strong> </label>
										<input type="date" name="dob" class="form-control" required="" value="{{ old('dob') }}">
									</div>
								</div>
								 <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Gender : <strong class="text-danger">*</strong></label>
							    		<select class="form-control" name="gender" required="">
							    			<option value="Male"  @if (old('gender') == "Male")  selected @endif>Male</option>
							    			<option value="Female"  @if (old('gender') == "Female")  selected @endif>Female</option>
							    			<option value="Other"  @if (old('gender') == "Other")  selected @endif>Other</option>
							    		</select>
							    	</div>
							    </div>
							    <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Marital Status : <strong class="text-danger">*</strong></label>
							    		<select class="form-control" name="marital_status" required="">
							    			<option value="Single" @if (old('marital_status') == "Single")  selected @endif>Single</option>
							    			<option value="Married" @if (old('marital_status') == "Married")  selected @endif>Married</option>
							    			<option value="Devorced" @if (old('marital_status') == "Devorced")  selected @endif>Devorced</option>
							    			<option value="Widowed" @if (old('marital_status') == "Widowed")  selected @endif>Widowed</option>
							    			<option value="Other" @if (old('marital_status') == "Other")  selected @endif>Other</option>
							    		</select>
							    	</div>
							    </div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label>SSN: </label>
										<input type="text" name="ssn" class="form-control" value="{{ old('ssn') }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Present Address : <strong class="text-danger">*</strong> </label>
										<input type="text" name="present_address" class="form-control" required="" value="{{ old('present_address') }}">
									</div>
								</div>
								 <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Permanent Address : <strong class="text-danger">*</strong></label>
							    		<input type="text" name="permanent_address" class="form-control" required="" value="{{ old('permanent_address') }}">
							    	</div>
							    </div>
							    <div class="col-md-3">
							    	<div class="form-group">
							    		<label>NID No. : <strong class="text-danger">*</strong></label>
							    		<input type="text" name="nid" class="form-control" required="" value="{{ old('nid') }}">
							    	</div>
							    </div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>Photo: </label>
										<input type="file" name="photo" class="form-control" id="imgInp">
									</div>
								</div>
								<div class="col-lg-1">
								<img src="" style="height:70px; width:70px;" id="p_avatar">		
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Home Phone Number :  </label>
										<input type="text" name="home_phone" class="form-control" value="{{ old('home_phone') }}">
									</div>
								</div>
								 <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Emergency Cotact Person : </label>
							    		<input type="text" name="emergency_contact_person" class="form-control" placeholder="Name" value="{{ old('emergency_contact_person') }}">
							    	</div>
							    </div>
							    <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Emergency Contact <strong class="text-danger">*</strong> </label>
							    		<input type="text" name="emergency_contact" class="form-control" placeholder="Mobile" required="" value="{{ old('emergency_contact') }}">
							    	</div>
							    </div>
							    <div class="col-md-3">
							    	<div class="form-group">
							    		<label>Relation With Emergency Person: </label>
							    		<input type="text" name="emergency_contact_relation" class="form-control" placeholder="Person Relation" value="{{ old('emergency_contact_relation') }}">
							    	</div>
							    </div>
							</div>	
					    <br><br>
						<button type="submit" class="btn btn-info"> <i class="icon-plus-circle2"></i> ADD EMPLOYEE</button>
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