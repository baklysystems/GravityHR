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
    								<label for="input002"><h6 class="mb5 mtn"> Role </h6></label> @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
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









							<div class="section">
								<label for="input002"><h6 class="mb5 mtn"> Role </h6></label> @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
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

							<div class="section">
								<label for="date_of_birth" class="field prepend-icon mb5"><h6 class="mb5 mtn">
							Date of Birth </h6></label>

								<div class="field prepend-icon">
									@if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
									<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif"
									required> @else
									<input type="text" id="date_of_birth" class="gui-input fs13" name="date_of_birth" required> @endif
								</div>
							</div>

							<div class="section">
								<label for="input002"><h6 class="mb5 mtn"> Primary Phone </h6></label>
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

						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
</div> {{-- end content --}}
@endsection
