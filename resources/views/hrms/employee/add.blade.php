<!DOCTYPE html>
<html style="padding: 0!important;">

<head>
	<!-- -------------- Meta and Title -------------- -->
	<meta charset="utf-8">
	<title> Human Resource Management System </title>
	<meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
	<meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
	<meta name="author" content="ThemeREX">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- -------------- Fonts -------------- -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|Roboto:400,500,700" rel="stylesheet">
	<!-- -------------- Icomoon -------------- -->
	{!! Html::style('/assets/fonts/icomoon/icomoon.css') !!}
	<!-- -------------- CSS - theme -------------- -->
	{!! Html::style('/assets/skin/default_skin/css/theme.css') !!}
	<!-- -------------- CSS - allcp forms -------------- -->
	{!! Html::style('/assets/allcp/forms/css/forms.css') !!} {!! Html::style('/assets/custom.css') !!}
	<!-- -------------- Favicon -------------- -->
	<link rel="shortcut icon" href="/assets/img/favicon.png">
	<!-- -------------- IE8 HTML5 support  -------------- -->
	<!--[if lt IE 9]>
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js') !!}
<![endif]-->
</head>

<body class="forms-wizard">

	<div id="main">
			@include('hrms.layouts.header')
		<aside id="sidebar_left" class="nano nano-light affix">
			<!-- -------------- Sidebar Left Wrapper  -------------- -->
			<div class="sidebar-left-content nano-content">
				<!-- -------------- Sidebar Menu  -------------- -->
				@include('hrms.layouts.sidebar')
				<!-- -------------- /Sidebar Menu  -------------- -->
			</div>
			<!-- -------------- /Sidebar Left Wrapper  -------------- -->
		</aside>

		<section id="content_wrapper">
			<header id="topbar" class="alt">
				@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
				<div class="topbar-left">
					<ol class="breadcrumb">
						<li class="breadcrumb-icon">
							<a href="/dashboard"> <span class="fa fa-home"></span> </a>
						</li>
						<li class="breadcrumb-link">
							<a href="/dashboard"> Employees </a>
						</li>
						<li class="breadcrumb-current-item"> Edit details of {{$emps->first_name}} {{$emps->last_name}}</li>
					</ol>
				</div>
				@else
				<div class="topbar-left">
					<ol class="breadcrumb">
						<li class="breadcrumb-icon">
							<a href="/dashboard"> <span class="fa fa-home"></span> </a>
						</li>
						<li class="breadcrumb-active">
							<a href="/dashboard">Dashboard</a>
						</li>
						<li class="breadcrumb-link">
							<a href="/add-employee"> Employees </a>
						</li>
						<li class="breadcrumb-current-item"> Add Details</li>
					</ol>
				</div>
				@endif
			</header>
			<!-- -------------- /Topbar -------------- -->

			<!-- -------------- Content -------------- -->
			<section id="content" class="">
				<div class="mw1000 center-block">
					@if(session('message')) {{session('message')}} @endif @if(Session::has('flash_message'))
					<div class="alert alert-success">
						{{ session::get('flash_message') }}
					</div>
					@endif
					<!-- -------------- Wizard -------------- -->
					<!-- -------------- Spec Form -------------- -->
					<div class="allcp-form">
						<form method="post" action="{{ $form_action }}" id="custom-form-wizard">
							<input name="_token" id="token" type="hidden" value="{{ csrf_token() }}" />
							<div class="wizard clearfix steps-tabs steps-justified">
								<!-- -------------- step 1 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-user pr5"></i> Personal Details</h4>
								<section class="wizard-section">
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Employee ID</h6></label>
												<label for="input002" class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" name="code" id="code" class="gui-input" value="{{$emps->employee->code}}" disabled="disabled">
													@else
													<input type="text" name="code" id="code" class="gui-input" placeholder="H18000" required="required">
													@endif
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="photo-upload"><h6 class="mb5 mtn"> Photo </h6></label>
												<label class="field prepend-icon append-button file">
												<span class="button">Choose File</span>
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
												<input type="hidden" value="employee/{{$emps->id}}" id="url">
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
									<!-- -------------- /section -------------- -->
									<div class="row">
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn">First Name </h6></label>
												<label for="input002" class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" name="first_name" id="first_name" class="gui-input" value="@if($emps && $emps->employee->first_name){{$emps->employee->first_name}}@endif" required="required">
													@else
													<input type="text" name="first_name" id="first_name" class="gui-input" required="required">
													@endif
													</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn">Middle Name </h6></label>
												<label for="input002" class="field prepend-icon">
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
												<input type="text" name="middle_name" id="middle_name" class="gui-input"
												value="@if($emps && $emps->employee->middle_name){{$emps->employee->middle_name}}@endif">
												@else
												<input type="text" name="middle_name" id="middle_name" class="gui-input">
												@endif
												</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn">Last Name </h6></label>
												<label for="input002" class="field prepend-icon">
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
												<input type="text" name="last_name" id="last_name" class="gui-input"
												value="@if($emps && $emps->employee->last_name){{$emps->employee->last_name}}@endif" required="required">
												@else
												<input type="text" name="last_name" id="last_name" class="gui-input" required="required">
												@endif
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Role </h6></label> @if(\Route::getFacadeRoot()->current()->uri() ==
												'employee/{id}/edit')
												<select class="select2-single form-control" name="role" id="role" required="required">
												<option value="">Select role</option>
												@foreach($roles as $role)
												@if(isset($emps->role->role->id) && $emps->role->role->id == $role->id)
												<option value="{{$role->id}}" selected>{{$role->name}}</option>
												@endif
												<option value="{{$role->id}}">{{$role->name}}</option>
												@endforeach
												</select> @else
												<select class="select2-single form-control" name="role" id="role" required="required">
												<option value="">Select role</option>
												@foreach($roles as $role)
												<option value="{{$role->id}}">{{$role->name}}</option>
												@endforeach
												</select> @endif
											</div>
										</div>
										<div class="col-md-4">
											<div class="section">
												<label for="date_of_birth" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Date of Birth </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif">													@else {{-- <input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth"> --}}
													<input type="text" id="datepicker1" class="select2-single form-control" name="date_of_birth"> @endif
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Gender </h6></label>
												<div class="option-group field mt10">
													<label class="field option mb">
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
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Primary Phone </h6></label>
												<label for="input002" class="field prepend-icon">
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
												<input type="number" name="primary_phone" id="primary_phone"
												class="gui-input phone-group" maxlength="10" minlength="10"
												value="@if($emps && $emps->employee->primary_phone){{$emps->employee->primary_phone}}@endif">
												@else
												<input type="number" name="primary_phone" id="primary_phone"
												class="gui-input phone-group" maxlength="10" minlength="10">
												@endif
												</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Secondary Phone </h6></label>
												<label for="input002" class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Work Email </h6></label>
												<label for="input002" class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="email" name="work_email" id="work_email" class="gui-input email-group"
													value="@if($emps && $emps->employee->work_email){{$emps->employee->work_email}}@endif">
													@else
													<input type="email" name="work_email" id="work_email" class="gui-input email-group">
													@endif
													</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Personal Email </h6></label>
												<label for="input002" class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
									<!-- -------------- /section -------------- -->
								</section>
								<!-- -------------- step 2 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-user-secret pr5"></i> Employment details</h4>
								<section class="wizard-section">
									<!-- -------------- /section -------------- -->
									{{-- testing here --}}
									<div class="row">
										<div class="col-md-4">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn">Employment Status </h6></label>
												<div class="option-group field">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="date_of_joining" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Date Hired </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining" value="@if($emps && $emps->employee->date_of_joining){{$emps->employee->date_of_joining}}@endif">													@else
													<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining"> @endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Department </h6></label>
												<select class="select2-single form-control" name="department" id="department">
	<option value="">Select department</option>
	@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
			@if($emps->employee->department == 'Admin and HR')
					<option value="Admin and HR" selected>Admin and HR</option>
					<option value="Call Center">Call Center</option>
					<option value="Tech Team">Tech Team</option>
			@elseif($emps->employee->department == 'Call Center')
					<option value="Admin and HR">Admin and HR</option>
					<option value="Call Center" selected>Call Center</option>
					<option value="Tech Team">Tech Team</option>
			@else
					<option value="Admin and HR">Admin and HR</option>
					<option value="Call Center">Call Center</option>
					<option value="Tech Team" selected>Tech Team</option>
			@endif
	@else
			<option value="Admin and HR">Admin and HR</option>
			<option value="Call Center">Call Centera</option>
			<option value="Tech Team">Tech Team</option>
	@endif
</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="section">
												<label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Position </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="job_title" class="gui-input fs13" name="job_title" value="@if($emps && $emps->employee->job_title){{$emps->employee->job_title}}@endif" required="required">
													@else
													<input type="text" id="job_title" class="gui-input fs13" name="job_title" required="required">
													@endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Starting Salary </h6> </label>
												<label for="input002" class="field prepend-icon">
@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Work Shift </h6></label>
												@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<select class="select2-single form-control" name="shift" id="shift" required="required">
													<option value="">Select a shift</option>
													@foreach($shifts as $shift)
														@if (isset($emps->employee->shift_id) && $emps->employee->shift_id == $shift->id)
														<option value="{{$shift->id}}" selected>{{$shift->name}}</option>
														@endif
													<option value="{{$shift->id}}">{{$shift->name}}</option>
													@endforeach
													</select>
												@else
												<select class="select2-single form-control" name="shift" id="shift" required="required">
													<option value="">Select shift</option>
													@foreach($shifts as $shift)
													<option value="{{$shift->id}}">{{$shift->name}}</option>
													@endforeach
												</select>
												@endif
											</div>
										</div>
									</div>
									{{-- testing end --}}
									<!-- -------------- /section -------------- -->
								</section>
								<!-- -------------- step 3 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-file-text pr5"></i> Contact Person</h4>
								<section class="wizard-section">
									{{-- step 3 --}}
									<div class="row">
										<div class="col-md-8">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Contact Person Name </h6></label>
												<label for="input002" class="field prepend-icon">
	@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
										@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
												<input type="text" name="contact_person_relationship" id="contact_person_relationship" class="gui-input"
																value="@if($emps && $emps->employee->contact_person_relationship){{$emps->employee->contact_person_relationship}}@endif">
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
	@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
			<input type="number" name="contact_person_phone" id="contact_person_phone"
							class="gui-input phone-group" maxlength="10" minlength="10"
							value="@if($emps && $emps->employee->contact_person_phone){{$emps->employee->contact_person_phone}}@endif">
	@else
			<input type="number" name="contact_person_phone" id="contact_person_phone"
							class="gui-input phone-group" maxlength="10" minlength="10">
	@endif
</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="section">
												<label for="input002"><h6 class="mb5 mtn"> Alt Contact Number </h6></label>
												<label for="input002" class="field prepend-icon">
@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
<input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone"
class="gui-input phone-group" maxlength="10" minlength="10"
value="@if($emps && $emps->employee->contact_person_alt_phone){{$emps->employee->contact_person_alt_phone}}@endif">
@else
<input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone"
class="gui-input phone-group" maxlength="10" minlength="10">
@endif
</label>
											</div>
										</div>
									</div>
								</section>
								<h4 class="wizard-section-title">
									<i class="fa fa-file-text pr5"></i> Government IDs </h4>
								<section class="wizard-section">
									{{-- here --}}
									<div class="row">
										<div class="col-md-6">
											<div class="section">
												<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Social Security Number (SSS) </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
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
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" value="@if($emps && $emps->employee->pagibig_number){{$emps->employee->pagibig_number}}@endif"
													/> @else
													<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" /> @endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Taxpayer Identification Number (TIN) </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" value="@if($emps && $emps->employee->tin_number){{$emps->employee->tin_number}}@endif"
													/> @else
													<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" /> @endif
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="section">
												<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> PhilHealth ID Number </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" value="@if($emps && $emps->employee->philhealth_number){{$emps->employee->philhealth_number}}@endif"
													/> @else
													<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" /> @endif
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="section">
												<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb5 mtn"> Company Insurance Number </h6></label>
												<div class="field prepend-icon">
													@if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
													<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" value="@if($emps && $emps->employee->health_insurance_number){{$emps->employee->health_insurance_number}}@endif"
													/> @else
													<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" /> @endif
												</div>
											</div>
										</div>
									</div>
									{{-- here --}}
								</section>
								<input value="Save Changes" type="submit" class="btn btn-info btn-margin" />
							</div>
							<!-- -------------- /Wizard -------------- -->
						</form>
						<!-- -------------- /Form -------------- -->
					</div>
					<!-- -------------- /Spec Form -------------- -->
				</div>
			</section>
			<!-- -------------- /Content -------------- -->
		</section>
	</div>
	<!-- -------------- /Body Wrap  -------------- -->
	<!-- Notification modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="notification-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div id="modal-header" class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- /Notification Modal -->
	<style> .wizard .steps .fa, .wizard .steps .glyphicon, .wizard .steps .glyphicon { display: none; } </style>
	<!-- -------------- Scripts -------------- -->
	<!-- -------------- jQuery -------------- -->
	{!! Html::script('/assets/js/jquery/jquery-1.11.3.min.js') !!}
	{!! Html::script('/assets/js/jquery/jquery_ui/jquery-ui.min.js')!!}
	<!-- -------------- HighCharts Plugin -------------- -->
	{!! Html::script('/assets/js/plugins/highcharts/highcharts.js') !!}
	<!-- -------------- MonthPicker JS -------------- -->
	{!! Html::script('/assets/allcp/forms/js/jquery-ui-monthpicker.min.js') !!}
	{!! Html::script('/assets/allcp/forms/js/jquery-ui-datepicker.min.js') !!}
	{!! Html::script('/assets/allcp/forms/js/jquery.spectrum.min.js') !!}
	{!! Html::script('/assets/allcp/forms/js/jquery.stepper.min.js') !!}
	<!-- -------------- Plugins -------------- -->
	{!! Html::script('/assets/allcp/forms/js/jquery.validate.min.js') !!}
	{!! Html::script('/assets/allcp/forms/js/jquery.steps.min.js') !!}
	<!-- -------------- Theme Scripts -------------- -->
	{!! Html::script('/assets/js/utility/utility.js') !!}
	{!! Html::script('/assets/js/demo/demo.js') !!}
	{!! Html::script('/assets/js/main.js') !!}
	{!! Html::script('/assets/js/demo/widgets_sidebar.js') !!}
	{!! Html::script('/assets/js/custom_form_wizard.js') !!}
	{!! Html::script ('/assets/js/pages/forms-widgets.js')!!}
	<!-- -------------- Select2 JS -------------- -->
	<script src="/assets/js/plugins/select2/select2.min.js"></script>
	<script src="/assets/js/function.js"></script>
</body>

</html>
