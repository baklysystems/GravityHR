@extends('hrms.layouts.base') 
@section('content')
<!-- START CONTENT -->
<div class="content">
	<header id="topbar" class="alt">
		@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="breadcrumb-icon">
					<a href="/dashboard"> <span class="fa fa-home"></span> </a>
				</li>
				{{--
				<li class="breadcrumb-active">
					<a href="#"> Edit Details</a>
				</li>--}}
				<li class="breadcrumb-link">
					<a href="/dashboard"> Employees </a>
				</li>
				<li class="breadcrumb-current-item"> Edit details of {{$emps->first_name}} {{$emps->last_name}}</li>
			</ol>
		</div>
		@else
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="breadcrumb-icon"> <a href="/dashboard"> <span class="fa fa-home"></span> </a> </li>
				<li class="breadcrumb-active"> <a href="/dashboard">New Employee</a> </li>
				{{--
				<li class="breadcrumb-link"> <a href="/add-employee"> Employees </a> </li>
				<li class="breadcrumb-current-item"> Add Details</li> --}}
			</ol>
		</div>
		@endif
	</header>


	<section id="content" class="animated fadeIn">
		<div class="center-block">
			@if(session('message')) {{session('message')}} @endif @if(Session::has('flash_message'))
			<div class="alert alert-success">
				{{ session::get('flash_message') }}
			</div>
			@endif

			<div class="allcp-form">
				<div class="box box-success">
					<div class="panel">
						<form method="post" action="/edit-emp/3">
							<input name="_token" id="token" type="hidden" value="{{ csrf_token() }}" />
							

							<div class="row">
								<div class="col-md-12">
									<h6 class="wizard-section-title text-uppercase text-danger">
										<i class="fa fa-user pr5"></i> Employee Profile</h6>
									<hr class="mt5 mb20">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="section">
										<label for="photo-upload"><h6 class="mb5 mt10"> Photo </h6></label>
										<label class="field prepend-icon append-button file">
										<span class="button">Choose File</span>
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="hidden" value="edit-emp/{{$emps->id}}" id="url">

										<input type="file" class="gui-file" name="photo" id="photo_upload"
										value="@if($emps && $emps->photo){{$emps->photo}}@endif"
										onChange="document.getElementById('uploader1').value = this.value;">
										<input type="text" class="gui-input" id="uploader1"
										placeholder="Select File">
										@else
										<input type="hidden" value="add-employee" id="url">
										<input type="file" class="gui-file" name="photo" id="photo_upload"
										onChange="document.getElementById('uploader1').value = this.value;">
										<input type="text" class="gui-input" id="uploader1"
										placeholder="Select File">
										@endif
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn">First Name </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="text" name="first_name" id="first_name" class="gui-input"
										value="@if($emps && $emps->employee->first_name){{$emps->employee->first_name}}@endif" required>
										@else
										<input type="text" name="first_name" id="first_name" class="gui-input" required>
										@endif
										</label>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn">Middle Name </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="text" name="middle_name" id="middle_name" class="gui-input"
										value="@if($emps && $emps->employee->middle_name){{$emps->employee->middle_name}}@endif">
										@else
										<input type="text" name="middle_name" id="middle_name" class="gui-input" required>
										@endif
										</label>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn">Last Name </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="text" name="last_name" id="last_name" class="gui-input"
										value="@if($emps && $emps->employee->last_name){{$emps->employee->last_name}}@endif" required>
										@else
										<input type="text" name="last_name" id="last_name" class="gui-input" required>
										@endif
										</label>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Role </h6></label> @if(\Route::getFacadeRoot()->current()->uri() ==
										'edit-emp/{id}')
										<select class="select2-single form-control" name="role" id="role" readonly required>
										<option value="">Select role</option>
										@foreach($roles as $role)
										@if(isset($emps->role->role->id) && $emps->role->role->id == $role->id)
										<option value="{{$role->id}}" selected>{{$role->name}}</option>
										@endif
										<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
										</select> @else
										<select class="select2-single form-control" name="role" id="role">
										<option value="">Select role</option>
										@foreach($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
										</select> @endif
									</div>
								</div>
							</div>



							<div class="row">
								<div class="col-md-4">
									<div class="section">
										<label for="date_of_birth" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Date of Birth </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif"
											 required> @else
											<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" required> @endif
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="section">
										<label for="civil_status" class="field prepend-icon mb5"><h6 class="mb5 mtn">
								Civil Status</h6></label>

										<div class="field prepend-icon">

											<input type="text" id="civil_status" class="gui-input fs13" name="civil_status" required>

										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Gender </h6></label>
										<div class="option-group field">
											<label class="field option mb5">
										<input type="radio" value="0" name="gender" id="gender"
										@if(isset($emps))@if($emps->employee->gender == '0')checked @endif @endif>
										<span class="radio"></span>Male</label>
											<label class="field option mb5">
										<input type="radio" value="1" name="gender" id="gender"
										@if(isset($emps))@if($emps->employee->gender == '1')checked @endif @endif>
										<span class="radio"></span>Female</label>
										</div>
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Primary Phone </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="number" name="primary_phone" id="primary_phone" class="gui-input phone-group" maxlength="10" minlength="10" value="@if($emps && $emps->employee->primary_phone){{$emps->employee->primary_phone}}@endif">
										@else
										<input type="number" name="primary_phone" id="primary_phone" class="gui-input phone-group" maxlength="10" minlength="10">
										@endif
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Secondary Phone </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="number" name="secondary_phone" id="secondary_phone"
										class="gui-input phone-group" maxlength="10" minlength="10"
										value="@if($emps && $emps->employee->secondary_phone){{$emps->employee->secondary_phone}}@endif">
										@else
										<input type="number" name="secondary_phone" id="secondary_phone"
										class="gui-input phone-group" maxlength="10" minlength="10">
										@endif
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Work Email </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="email" name="work_email" id="work_email" class="gui-input email-group" 
										value="@if($emps && $emps->employee->work_email){{$emps->employee->work_email}}@endif">
										@else
										<input type="email" name="work_email" id="work_email" class="gui-input email-group">
										@endif
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Personal Email </h6></label>
										<label for="input002" class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="email" name="personal_email" id="personal_email" class="gui-input email-group" 
											value="@if($emps && $emps->employee->personal_email){{$emps->employee->personal_email}}@endif">
											@else
											<input type="email" name="personal_email" id="personal_email" class="gui-input email-group">
											@endif
											</label>
									</div>
								</div>
							</div>

					

							<div class="row">
								<div class="col-md-12">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Current Address </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="text" name="current_address" id="current_address" class="gui-input"
										value="@if($emps && $emps->employee->current_address){{$emps->employee->current_address}}@endif">
										@else
										<input type="text" name="current_address" id="current_address" class="gui-input">
										@endif
										</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Permanent Address </h6></label>
										<label for="input002" class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
													<input type="text" name="permanent_address" id="permanent_address"
																	class="gui-input"
																	value="@if($emps && $emps->employee->permanent_address){{$emps->employee->permanent_address}}@endif">
											@else
													<input type="text" name="permanent_address" id="permanent_address" class="gui-input">
											@endif
									</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Qualification </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
												{!! Form::select('qualification_list', qualification(),$emps->employee->qualification, ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
												<input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="Enter other qualification" value="{{$emps->employee->qualification}}"/>

										@else
												{!! Form::select('qualification_list', qualification(),'', ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
												<input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="Enter other qualification"/>
										@endif
										</label>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<h6 class="wizard-section-title text-uppercase text-danger">
										<i class="fa fa-user-secret pr5"></i> Employment details</h6>
									<hr class="mt5 mb20">
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn">Employee Code</h6></label>
										<label for="input002" class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" name="code" id="code" class="gui-input" value="@if($emps && $emps->employee->code){{$emps->employee->code}}@endif" required>
											@else
											<input type="text" name="code" id="code" class="gui-input" required>
											@endif
									</label>
									</div>
								</div>

								<div class="col-md-3">
									<div class="section">
										<label for="date_of_joining" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Date Hired </h6></label>
										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining" value="@if($emps && $emps->employee->date_of_joining){{$emps->employee->date_of_joining}}@endif"
											 required> @else
											<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining" required> @endif
										</div>
									</div>
								</div>

								{{-- <div class="col-md-6">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn">Employment Status </h6></label>
										<div class="option-group field">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<label class="field option mb5">
								<input type="radio" name="status" id="status" value="1" @if(isset($emps))@if($emps->employee->status == '1') checked @endif @endif>
								<span class="radio"></span>Active</label>
											<label class="field option mb5">
								<input type="radio" name="status" id="status" value="0" @if(isset($emps))@if($emps->employee->status == '0') checked @endif @endif>
								<span class="radio"></span>Resigned</label> @else
											<input type="radio" name="status" id="status" value="1">
											<span class="radio"></span>Active</label>
											<label class="field option mb5">
								<input type="radio" name="status" id="status" value="0" checked>
								<span class="radio"></span>Resigned</label> @endif
										</div>
									</div>
								</div> --}}
								</div>

						

							<div class="row">
								<div class="col-md-4">
									<div class="section">
										<label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Position </h6></label>
								
										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="job_title" class="gui-input fs13" name="job_title" value="@if($emps && $emps->employee->job_title){{$emps->employee->job_title}}@endif"
											 required> @else
											<input type="text" id="job_title" class="gui-input fs13" name="job_title" required> @endif
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Department </h6></label>
										<select class="select2-single form-control" name="department" id="department">
											<option value="">Select department</option>
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
													@if($emps->employee->department == 'Marketplace')
															<option value="Marketplace" selected>Marketplace</option>
															<option value="Social Media">Social Media</option>
															<option value="IT">IT</option>
													@elseif($emps->employee->department == 'Social Media')
															<option value="Marketplace">Marketplace</option>
															<option value="Social Media" selected>Social Media</option>
															<option value="IT">IT</option>
													@else
															<option value="Marketplace">Marketplace</option>
															<option value="Social Media">Social Media</option>
															<option value="IT" selected>IT</option>
													@endif
											@else
													<option value="Marketplace">Marketplace</option>
													<option value="Social Media">Social Media</option>
													<option value="IT">IT</option>
											@endif
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Starting Salary </h6> </label>
										<label for="input002" class="field prepend-icon">
									@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
									<input type="text" name="salary" id="salary" class="gui-input"
									value="@if($emps && $emps->employee->salary){{$emps->employee->salary}}@endif" readonly>
									@else
									<input type="text" name="salary" id="salary" class="gui-input">
									@endif
									</label>
									</div>
								</div>
							</div>

						
							<div class="row">
								<div class="col-md-12">
									<h6 class="wizard-section-title text-uppercase text-danger">
										<i class="fa fa-user-secret pr5"></i> Contact Person</h6>
									<hr class="mt5 mb20">
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-8">
										<div class="section">
										<label for="input002"><h6 class="mb5 mtn"> Contact Person Name </h6></label>
										<label for="input002" class="field prepend-icon">
										@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
										<input type="text" name="contact_person" id="contact_person" class="gui-input"
													value="@if($emps && $emps->employee->contact_person){{$emps->employee->contact_person}}@endif">
										@else
										<input type="text" name="contact_person" id="contact_person" class="gui-input">
										@endif
										</label>
										</div>
								</div>
								<div class="col-md-4">
									<div class="section">
									<label for="input002"><h6 class="mb5 mtn"> Relationship </h6></label>
									<label for="input002" class="field prepend-icon">
									@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
									<input type="text" name="contact_person_relationship" id="contact_person_relationship" class="gui-input" value="@if($emps && $emps->employee->contact_person_relationship){{$emps->employee->contact_person_relationship}}@endif">
									@else
									<input type="text" name="contact_person_relationship" id="contact_person_relationship" class="gui-input">
									@endif
									</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
								<div class="section">
								<label for="input002"><h6 class="mb5 mtn"> Contact Number </h6></label>
								<label for="input002" class="field prepend-icon">
								@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
								<input type="number" name="contact_person_phone" id="contact_person_phone" class="gui-input phone-group" maxlength="10" minlength="10" value="@if($emps && $emps->employee->contact_person_phone){{$emps->employee->contact_person_phone}}@endif">
								@else
								<input type="number" name="contact_person_phone" id="contact_person_phone" class="gui-input phone-group" maxlength="10" minlength="10">
								@endif
								</label>
								</div>
								</div>
								<div class="col-md-6">
									<div class="section">
									<label for="input002"><h6 class="mb5 mtn"> Alt Contact Number </h6></label>
									<label for="input002" class="field prepend-icon">
									@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
									<input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone" class="gui-input phone-group" maxlength="10" minlength="10" value="@if($emps && $emps->employee->contact_person_alt_phone){{$emps->employee->contact_person_alt_phone}}@endif">
									@else
									<input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone" class="gui-input phone-group" maxlength="10" minlength="10">
									@endif
									</label>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-12">
									<h6 class="wizard-section-title text-uppercase text-danger">
										<i class="fa fa-user-secret pr5"></i> Government IDs</h6>
									<hr class="mt5 mb20">
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
										<div class="section">
											<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Social Security Number (SSS) </h6></label>
										
											<div class="field prepend-icon">
												@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
												<input type="text" id="sss_number" class="gui-input fs13" name="sss_number" value="@if($emps && $emps->employee->sss_number){{$emps->employee->sss_number}}@endif"
												/> @else
												<input type="text" id="sss_number" class="gui-input fs13" name="sss_number" /> @endif
											</div>
										</div>
								</div>
								<div class="col-md-6">
								<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Pag-IBIG ID Number </h6></label>
									
										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" value="@if($emps && $emps->employee->pagibig_number){{$emps->employee->pagibig_number}}@endif"
											/> @else
											<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" /> @endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Taxpayer Identification Number (TIN) </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" value="@if($emps && $emps->employee->tin_number){{$emps->employee->tin_number}}@endif"
											/> @else
											<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" /> @endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> PhilHealth ID Number </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" value="@if($emps && $emps->employee->philhealth_number){{$emps->employee->philhealth_number}}@endif"
											/> @else
											<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" /> @endif
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="section">
											<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Company Insurance Number </h6></label>
										
											<div class="field prepend-icon">
												@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
												<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" value="@if($emps && $emps->employee->health_insurance_number){{$emps->employee->health_insurance_number}}@endif"
												/> @else
												<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" /> @endif
											</div>
										</div>
								</div>
							</div>
						
	
						

							<input value="Save Employee Details" type="submit" class="btn btn-primary"/>


						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
</div> {{-- end content --}}
@endsection