@extends('hrms.layouts.base')

@section('content')
		<!-- START CONTENT -->
<div class="content">

	<header id="topbar" class="alt">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="breadcrumb-icon"> <span class="fa fa-user"></span> </li>
				<li class="breadcrumb-active">
					<a href="/dashboard"> Employees</a>
				</li>
				<!-- <li class="breadcrumb-link">
					<a href=""> Employees </a>
				</li>
				<li class="breadcrumb-current-item"> Employee Manager</li> -->
			</ol>
		</div>
		<div class="topbar-right">
		 {!! Form::open() !!}
		<div class="btn-group">
			<a href="{{route('upload-emp')}}" class="btn btn-dark">
				<span class="fa fa-upload"></span>  
				&nbsp;Import List
			</a>
			<button type="submit" class="btn btn-dark" value="Export"><span class="fa fa-download"></span>  
				&nbsp;Export to CSV</button>
		</div>
		</div>
	</header>


	<!-- -------------- Content -------------- -->
	<section id="content" class="table-layout animated fadeIn">

		<!-- -------------- Column Center -------------- -->
		<div class="chute chute-center">

			<!-- -------------- Products Status Table -------------- -->
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
					
						<div class="panel-menu allcp-form theme-primary mtn">
						
						<div class="row">
							 <div class="col-md-3">
								<label class="field select">
									{!! Form::select('column', getEmployeeDropDown(),$column) !!}
									<i class="arrow"></i>
								</label>
							</div>

							<div class="col-md-3">
								<input type="text" class="field form-control" placeholder="Search Keyword..." style="height:40px" value="{{$string}}" name="string">
							</div>
							
							<div class="col-md-2">
								<input type="submit" value="Search" name="button" class="btn btn-primary">
								{!! Form::close() !!}
								<a href="/employee-manager" >
									<input type="submit" value="Reset" class="btn btn-light">
								</a>
							</div>

							<!-- <div class="col-md-2">
								<input type="submit" value="Export" name="button" class="btn btn-success">
							</div> -->
							{!! Form::close() !!}
						
						</div>
							</div>

						<div class="panel-body pn">
							@if(Session::has('flash_message'))
								<div class="alert alert-success">
									{{ Session::get('flash_message') }}
									</div>
							@endif
							<div class="table-responsive">
								<table class="table table-hover allcp-form theme-warning tc-checkbox-1 table-striped">
									<thead>
									<tr class="bg-light">
										<!-- <th class="text-center">Id</th> -->
										<th class="text-center">ID Number</th>
										<th class="">Name</th>
										<th class="text-center">Status</th>
										<!-- <th class="text-center">Role</th> -->
										<th class="text-center">Date Hired</th>
										<th class="">Address</th>
										<th class="text-center">Mobile Number</th>
										<th class="text-center">Department</th>
										<th class="text-center"></th>
									</tr>
									</thead>
									<tbody>
									<?php $i =0;?>
									@foreach($emps as $emp)
									<tr>
										<!-- <td class="text-center">{{$i+=1}}</td> -->
										<td class="text-center">{{$emp->employee['code']}}</td>
										<td class="">{{$emp->name}}</td>
										<td class="text-center">{{convertStatusBack($emp->employee['status'])}}</td>
										<!-- <td class="text-center">{{isset($emp->role->role->name)?$emp->role->role->name:''}}</td> -->
										<td class="text-center">{{date('Y-m-d', strtotime($emp->employee['date_of_joining']))}}</td>
										<td class="">{{$emp->employee['current_address']}}</td>
										<td class="text-center">{{$emp->employee['primary_phone']}}</td>
										<td class="text-center">{{$emp->employee['department']}}</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button"
														class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
														data-toggle="dropdown" aria-expanded="false"> Action
													<span class="caret ml5"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="/employee/{{$emp->id}}/edit">Edit</a>
													</li>
													<li>
														<a href="/delete-emp/{{$emp->id}}">Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									@endforeach
									<tr><td colspan="10">
											{!! $emps->render() !!}
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</div>
		</div>
	</section>

</div>
@endsection
