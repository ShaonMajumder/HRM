					<div class="">
						<div class="row">
							<div class="col-lg-3">
								<div class="card">
									<div class="card-body text-center">
										<div class="card-img-actions d-inline-block mb-3">
											<img class="img-fluid rounded-circle" id="photo" src="{{ asset($employee->photo) }}" width="175" height="180" alt="">
										</div>
							    		<h6 class="font-weight-semibold mb-0">{{ $employee->name }}</h6>
							    		<span class="d-block text-muted">Division: {{ $employee->division_name }}</span>
							    		<span class="d-block text-muted"> {{ $employee->phone }}</span>
							    		<span class="d-block text-muted">NID: {{ $employee->nid }} </span>
							    	</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Personal Information</h5>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Full Name</td>
													<td>{{ $employee->name }}</td>
												</tr>
												<tr>
													<td>Phone</td>
													<td>{{ $employee->phone }}</td>
												</tr>
												<tr>
													<td>Email</td>
													<td>{{ $employee->email }}</td>
												</tr>
												<tr>
													<td>Country</td>
													<td>{{ $employee->country }}</td>
												</tr>
												<tr>
													<td>City</td>
													<td>{{ $employee->city }}</td>
												</tr>
												<tr>
													<td>Zipcode</td>
													<td>{{ $employee->zipcode }}</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="card">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Biographical Information</h5>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Date Of Birth</td>
													<td>{{ $employee->dob }}</td>
												</tr>
												<tr>
													<td>Gender</td>
													<td>{{ $employee->gender }}</td>
												</tr>
												<tr>
													<td>Marital Status</td>
													<td>{{ $employee->marital_status }}</td>
												</tr>
												<tr>
													<td>SSN</td>
													<td>{{ $employee->ssn }}</td>
												</tr>
												<tr>
													<td>Present Address</td>
													<td>{{ $employee->present_address }}</td>
												</tr>
												<tr>
													<td>Permanent Address</td>
													<td>{{ $employee->permanent_address }}</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Biographical Information</h5>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Division</td>
													<td>{{ $employee->division_name }}</td>
												</tr>
												<tr>
													<td>Position</td>
													<td>{{ $employee->position_name }}</td>
												</tr>
												<tr>
													<td>Duty Type</td>
													<td>{{ $employee->duty_type }}</td>
												</tr>
												<tr>
													<td>Hire Date</td>
													<td>{{ $employee->hire_date }}</td>
												</tr>
												<tr>
													<td>Joining Date</td>
													<td>{{ $employee->joining_date }}</td>
												</tr>
												<tr>
													<td>Rate Type</td>
													<td>{{ $employee->rate_type }}</td>
												</tr>
												<tr>
													<td>Rate </td>
													<td>{{ $employee->rate }}</td>
												</tr>
												<tr>
													<td>Pay Frequency </td>
													<td>{{ $employee->pay_frequency }}</td>
												</tr>
												<tr>
													<td>Supervisor Name </td>
													<td>
														@if($employee->supervisor_id==$employee->id)
														SELF
														@else
														 @php 
														   $supervisor=DB::table('users')->where('id',$employee->supervisor_id)->select('name')->first();
														 @endphp
														 {{ $supervisor->name }}
														@endif
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Other Information</h5>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Benefit class Code</td>
													<td>{{ $employee->benefit_class_code }}</td>
												</tr>
												<tr>
													<td>Benefit Accural Date</td>
													<td>{{ $employee->benefit_accural_date }}</td>
												</tr>
												<tr>
													<td>Emergency Person</td>
													<td>{{ $employee->emergency_contact_person }}</td>
												</tr>
												<tr>
													<td>Emergency Contact</td>
													<td>{{ $employee->emergency_contact }}</td>
												</tr>
												<tr>
													<td>Home Phone</td>
													<td>{{ $employee->home_phone }}</td>
												</tr>
												<tr>
													<td>Reference Name</td>
													<td>{{ $employee->reference_name }}</td>
												</tr>
												<tr>
													<td>Reference Phone </td>
													<td>{{ $employee->reference_phone }}</td>
												</tr>
												<tr>
													<td>Reference Address</td>
													<td>{{ $employee->reference_address }}</td>
												</tr>
												<tr>
													<td>User Status</td>
													<td><span class="badge badge-success">Active</span></td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	