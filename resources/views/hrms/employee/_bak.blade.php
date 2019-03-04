<!DOCTYPE html>
<html>

<head>
	<!-- -------------- Meta and Title -------------- -->
	<meta charset="utf-8">
	<title> HRMS </title>
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


	<!-- -------------- Body Wrap  -------------- -->
	<div id="main">

		<!-- -------------- Header  -------------- -->
	@include('hrms.layouts.header')
		<!-- -------------- /Header  -------------- -->

		<!-- -------------- Sidebar  -------------- -->
		<aside id="sidebar_left" class="nano nano-light affix">

			<!-- -------------- Sidebar Left Wrapper  -------------- -->
			<div class="sidebar-left-content nano-content">

				<!-- -------------- Sidebar Header -------------- -->
				<header class="sidebar-header">
	@include('hrms.layouts.sidebar')



				</header>
			</div>
			<!-- -------------- /Sidebar Left Wrapper  -------------- -->

		</aside>

		<!-- -------------- Main Wrapper -------------- -->
		<section id="content_wrapper">

			<!-- -------------- Topbar -------------- -->
			<header id="topbar" class="alt">

				@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')

				<div class="topbar-left">
					<ol class="breadcrumb">
						<li class="breadcrumb-icon">
							<a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
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
						<li class="breadcrumb-icon">
							<a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
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
			<section id="content" class="animated fadeIn">

				<div class="mw1000 center-block">
					@if(session('message')) {{session('message')}} @endif @if(Session::has('flash_message'))
					<div class="alert alert-success">
						{{ session::get('flash_message') }}
					</div>
					@endif

					<!-- -------------- Wizard -------------- -->
					<!-- -------------- Spec Form -------------- -->
					<div class="allcp-form">

						<form method="post" action="/edit-emp/3" id="custom-form-wizard">
							<input name="_token" id="token" type="hidden" value="{{ csrf_token() }}" />
							<div class="wizard steps-bg steps-left">

								<!-- -------------- step 1 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-user pr5"></i> Personal Details</h4>
								<section class="wizard-section">
									<div class="section">
										<label for="photo-upload"><h6 class="mb20 mt40"> Photo </h6></label>
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

									<!-- -------------- /section -------------- -->

									<div class="section">
										<label for="input002"><h6 class="mb20 mt40">First Name </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="first_name" id="first_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->first_name){{$emps->employee->first_name}}@endif" required>
                                            @else
                                                <input type="text" name="first_name" id="first_name" class="gui-input" required>
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40">Middle Name </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="middle_name" id="middle_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->middle_name){{$emps->employee->middle_name}}@endif">
                                            @else
                                                <input type="text" name="middle_name" id="middle_name" class="gui-input" required>
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40">Last Name </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="last_name" id="last_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->last_name){{$emps->employee->last_name}}@endif" required>
                                            @else
                                                <input type="text" name="last_name" id="last_name" class="gui-input" required>
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Role </h6></label> @if(\Route::getFacadeRoot()->current()->uri() ==
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

									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Gender </h6></label>
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


									<div class="section">
										<label for="date_of_birth" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Birth </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif"
											 required> @else
											<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" required> @endif
										</div>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Primary Phone </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="number" name="primary_phone" id="primary_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="@if($emps && $emps->employee->primary_phone){{$emps->employee->primary_phone}}@endif">
                                            @else
                                                <input type="number" name="primary_phone" id="primary_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Secondary Phone </h6></label>
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


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Work Email </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="email" name="work_email" id="work_email" class="gui-input email-group" 
                                                       value="@if($emps && $emps->employee->work_email){{$emps->employee->work_email}}@endif">
                                            @else
                                                <input type="email" name="work_email" id="work_email" class="gui-input email-group">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Personal Email </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="email" name="personal_email" id="personal_email" class="gui-input email-group" 
                                                       value="@if($emps && $emps->employee->personal_email){{$emps->employee->personal_email}}@endif">
                                            @else
                                                <input type="email" name="personal_email" id="personal_email" class="gui-input email-group">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Current Address </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="current_address" id="current_address" class="gui-input"
                                                       value="@if($emps && $emps->employee->current_address){{$emps->employee->current_address}}@endif">
                                            @else
                                                <input type="text" name="current_address" id="current_address" class="gui-input">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Permanent Address </h6></label>
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


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Qualification </h6></label>
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

									<!-- -------------- /section -------------- -->
								</section>

								<!-- -------------- step 2 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-user-secret pr5"></i> Employment details</h4>
								<section class="wizard-section">
									<!-- -------------- /section -------------- -->

									<div class="section">
										<label for="input002"><h6 class="mb20 mt40">Employee Code</h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="code" id="code" class="gui-input"
                                                       value="@if($emps && $emps->employee->code){{$emps->employee->code}}@endif" required>
                                            @else
                                                <input type="text" name="code" id="code" class="gui-input" required>
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40">Employment Status </h6></label>
										<div class="option-group field">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<label class="field option mb5">
                                                <input type="radio" name="status" id="status" value="1"
                                                       @if(isset($emps))@if($emps->employee->status == '1') checked @endif @endif>
                                                <span class="radio"></span>Active</label>
											<label class="field option mb5">
                                                <input type="radio" name="status" id="status" value="0"
                                                       @if(isset($emps))@if($emps->employee->status == '0') checked @endif @endif>
                                                <span class="radio"></span>Resigned</label> @else
											<input type="radio" name="status" id="status" value="1">
											<span class="radio"></span>Active</label>
											<label class="field option mb5">
                                                    <input type="radio" name="status" id="status" value="0" checked>
                                                    <span class="radio"></span>Resigned</label> @endif
										</div>
									</div>


									<div class="section">
										<label for="date_of_joining" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Date Hired </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining" value="@if($emps && $emps->employee->date_of_joining){{$emps->employee->date_of_joining}}@endif"
											 required> @else
											<input type="text" id="date_of_joining" class="gui-input fs13" name="date_of_joining" required> @endif
										</div>
									</div>


									<div class="section">
										<label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Position </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="job_title" class="gui-input fs13" name="job_title" value="@if($emps && $emps->employee->job_title){{$emps->employee->job_title}}@endif"
											 required> @else
											<input type="text" id="job_title" class="gui-input fs13" name="job_title" required> @endif
										</div>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
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


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Starting Salary </h6>
                                        </label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="salary" id="salary" class="gui-input"
                                                       value="@if($emps && $emps->employee->salary){{$emps->employee->salary}}@endif" readonly>
                                            @else
                                                <input type="text" name="salary" id="salary" class="gui-input">
                                            @endif
                                        </label>
									</div>
									<!-- -------------- /section -------------- -->


								</section>

								<!-- -------------- step 3 -------------- -->
								<h4 class="wizard-section-title">
									<i class="fa fa-file-text pr5"></i> Contact Person</h4>
								<section class="wizard-section">

									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Contact Person Name </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="contact_person" id="contact_person" class="gui-input"
                                                       value="@if($emps && $emps->employee->contact_person){{$emps->employee->contact_person}}@endif">
                                            @else
                                                <input type="text" name="contact_person" id="contact_person" class="gui-input">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Relationship </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="contact_person_relationship" id="contact_person_relationship" class="gui-input"
                                                       value="@if($emps && $emps->employee->contact_person_relationship){{$emps->employee->contact_person_relationship}}@endif">
                                            @else
                                                <input type="text" name="contact_person_relationship" id="contact_person_relationship" class="gui-input">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Contact Number </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="number" name="contact_person_phone" id="contact_person_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="@if($emps && $emps->employee->contact_person_phone){{$emps->employee->contact_person_phone}}@endif">
                                            @else
                                                <input type="number" name="contact_person_phone" id="contact_person_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10">
                                            @endif
                                        </label>
									</div>


									<div class="section">
										<label for="input002"><h6 class="mb20 mt40"> Alt Contact Number </h6></label>
										<label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="@if($emps && $emps->employee->contact_person_alt_phone){{$emps->employee->contact_person_alt_phone}}@endif">
                                            @else
                                                <input type="number" name="contact_person_alt_phone" id="contact_person_alt_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10">
                                            @endif
                                        </label>
									</div>

								</section>


								<h4 class="wizard-section-title">
									<i class="fa fa-file-text pr5"></i> Government IDs </h4>
								<section class="wizard-section">

									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Social Security Number (SSS) </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="sss_number" class="gui-input fs13" name="sss_number" value="@if($emps && $emps->employee->sss_number){{$emps->employee->sss_number}}@endif"
											/> @else
											<input type="text" id="sss_number" class="gui-input fs13" name="sss_number" /> @endif
										</div>
									</div>


									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Pag-IBIG ID Number </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" value="@if($emps && $emps->employee->pagibig_number){{$emps->employee->pagibig_number}}@endif"
											/> @else
											<input type="text" id="pagibig_number" class="gui-input fs13" name="pagibig_number" /> @endif
										</div>
									</div>


									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Taxpayer Identification Number (TIN) </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" value="@if($emps && $emps->employee->tin_number){{$emps->employee->tin_number}}@endif"
											/> @else
											<input type="text" id="tin_number" class="gui-input fs13" name="tin_number" /> @endif
										</div>
									</div>


									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40"> PhilHealth ID Number </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" value="@if($emps && $emps->employee->philhealth_number){{$emps->employee->philhealth_number}}@endif"
											/> @else
											<input type="text" id="philhealth_number" class="gui-input fs13" name="philhealth_number" /> @endif
										</div>
									</div>


									<div class="section">
										<label for="datepicker6" class="field prepend-icon mb5"><h6 class="mb20 mt40"> Company Insurance Number </h6></label>

										<div class="field prepend-icon">
											@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
											<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" value="@if($emps && $emps->employee->health_insurance_number){{$emps->employee->health_insurance_number}}@endif"
											/> @else
											<input type="text" id="health_insurance_number" class="gui-input fs13" name="health_insurance_number" /> @endif
										</div>
									</div>

								</section>

								<input value="Save Changes" type="submit" />
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

		<!-- -------------- Sidebar Right -------------- -->
		<aside id="sidebar_right" class="nano affix">

			<!-- -------------- Sidebar Right Content -------------- -->
			<div class="sidebar-right-wrapper nano-content">

				<div class="sidebar-block br-n p15">

					<h6 class="title-divider text-muted mb20"> Visitors Stats
						<span class="pull-right"> 2015
                  <i class="fa fa-caret-down ml5"></i>
                </span>
					</h6>

					<div class="progress mh5">
						<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"
						 style="width: 34%">
							<span class="fs11">New visitors</span>
						</div>
					</div>
					<div class="progress mh5">
						<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
							<span class="fs11 text-left">Returnig visitors</span>
						</div>
					</div>
					<div class="progress mh5">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
						 style="width: 45%">
							<span class="fs11 text-left">Orders</span>
						</div>
					</div>

					<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>

					<div class="row">
						<div class="col-xs-5">
							<h3 class="text-primary mn pl5">350</h3>
						</div>
						<div class="col-xs-7 text-right">
							<h3 class="text-warning mn">
								<i class="fa fa-caret-down"></i> 15.7% </h3>
						</div>
					</div>

					<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>

					<div class="row">
						<div class="col-xs-5">
							<h3 class="text-primary mn pl5">660</h3>
						</div>
						<div class="col-xs-7 text-right">
							<h3 class="text-success-dark mn">
								<i class="fa fa-caret-up"></i> 20.2% </h3>
						</div>
					</div>

					<h6 class="title-divider text-muted mt25 mb10">Orders</h6>

					<div class="row">
						<div class="col-xs-5">
							<h3 class="text-primary mn pl5">153</h3>
						</div>
						<div class="col-xs-7 text-right">
							<h3 class="text-success mn">
								<i class="fa fa-caret-up"></i> 5.3% </h3>
						</div>
					</div>

					<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
						<span class="pull-right text-primary fw600">Today</span>
					</h6>
				</div>
			</div>
		</aside>
		<!-- -------------- /Sidebar Right -------------- -->

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
	<style>
		/*page demo styles*/

		.wizard .steps .fa,
		.wizard .steps .glyphicon,
		.wizard .steps .glyphicon {
			display: none;
		}
	</style>

	<!-- -------------- Scripts -------------- -->

	<!-- -------------- jQuery -------------- -->
	{!! Html::script('/assets/js/jquery/jquery-1.11.3.min.js') !!} {!! Html::script('/assets/js/jquery/jquery_ui/jquery-ui.min.js')
	!!}

	<!-- -------------- HighCharts Plugin -------------- -->
	{!! Html::script('/assets/js/plugins/highcharts/highcharts.js') !!}

	<!-- -------------- MonthPicker JS -------------- -->
	{!! Html::script('/assets/allcp/forms/js/jquery-ui-monthpicker.min.js') !!} {!! Html::script('/assets/allcp/forms/js/jquery-ui-datepicker.min.js')
	!!} {!! Html::script('/assets/allcp/forms/js/jquery.spectrum.min.js') !!} {!! Html::script('/assets/allcp/forms/js/jquery.stepper.min.js')
	!!}


	<!-- -------------- Plugins -------------- -->
	{!! Html::script('/assets/allcp/forms/js/jquery.validate.min.js') !!} {!! Html::script('/assets/allcp/forms/js/jquery.steps.min.js')
	!!}

	<!-- -------------- Theme Scripts -------------- -->
	{!! Html::script('/assets/js/utility/utility.js') !!} {!! Html::script('/assets/js/demo/demo.js') !!} {!! Html::script('/assets/js/main.js')
	!!} {!! Html::script('/assets/js/demo/widgets_sidebar.js') !!} {!! Html::script('/assets/js/custom_form_wizard.js') !!}
	{!! Html::script ('/assets/js/pages/forms-widgets.js')!!}

	<!-- -------------- Select2 JS -------------- -->
	<script src="/assets/js/plugins/select2/select2.min.js"></script>
	<script src="/assets/js/function.js"></script>


	<!-- -------------- /Scripts -------------- -->

</body>

</html>