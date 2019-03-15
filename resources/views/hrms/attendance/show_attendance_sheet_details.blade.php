@extends('hrms.layouts.base') 
@section('content')
<!-- START CONTENT -->
<div class="content">
<header id="topbar" class="alt">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="breadcrumb-icon"> <span class="fa fa-user"></span> </li>
				<li class="breadcrumb-active">
					<a href="/dashboard"> Attendance Sheet</a>
				</li>
			
			</ol>
		</div>
	</header>
	
<!-- -------------- END Content -------------- -->
<section id="content" class="table-layout animated fadeIn">
	<div class="chute chute-center">
		<!-- -------------- Products Status Table -------------- -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
				
						<div class="panel-menu allcp-form theme-primary mtn">
							<div class="row">
								{!! Form::open() !!}
								<div class="col-md-2">
									<label class="field select">
										{!! Form::select('column', getAttendanceDropDown(),$column) !!}
										<i class="arrow"></i>
									</label>
								</div>
								<div class="col-md-2">
									<input type="text" class="field form-control" placeholder="Search Keyword..." style="height:40px" value="{{$string}}" name="string">
								</div>
								
								<div class="col-md-2">
									<input type="text" id="datepicker1" class="select2-single form-control" name="dateFrom" value="{{$dateFrom}}" placeholder="Date from"
									/>
								</div>
								<div class="col-md-2">
									<input type="text" id="datepicker4" class="select2-single form-control" name="dateTo" value="{{$dateTo}}" placeholder="Date to"
									/>
								</div>


								<div class="col-md-2">
									<input type="submit" value="Search" name="button" class="btn btn-primary">
									<a href="/attendance-manager"> <input type="submit" value="Reset" class="btn btn-light"></a>
								</div>


							 <div class="col-md-2 text-right">
								<a href="/export"><input type="submit" value="Export" name="button" class="btn btn-dark"></a>
								</div> 
								{!! Form::close() !!}

								{{-- <div class="col-md-1">
									<a href="/attendance-manager"> <input type="submit" value="Reset" class="btn btn-light"></a>
								</div> --}}

							</div>
						</div>

						<div class="panel-body pn">
							@if(Session::has('flash_message'))
							<div class="alert alert-success">
								{{ Session::get('flash_message') }}
							</div>
							@endif
							<div class="table-responsive">
								<table class="table allcp-form theme-warning tc-checkbox-1 fs13">
									@if(count($attendances))
									<thead>
										<tr class="bg-light">
											{{-- <th class="text-center">Id</th> --}}
											<th class="text-center">Code</th>
											<th class="text-center">Name</th>
											<th class="text-center">Date</th>
											<th class="text-center">Day</th>
											<th class="text-center">In Time</th>
											<th class="text-center">Out Time</th>
											<th class="text-center">Hours Worked</th>
											{{-- <th class="text-center">Difference</th> --}}
											<th class="text-center">Status</th>
											<th class="text-center">Leave Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									@else
									<h2>Nothing to show</h2>
									@endif
									<tbody>
										<?php $i =0;?> @foreach($attendances as $attendance)
										<tr>
											{{-- <td class="text-center">{{$i+=1}}</td> --}}
											<td class="text-center">{{$attendance->code}}</td>
											<td class="text-center">{{$attendance->name}}</td>
											<td class="text-center">{{getFormattedDate($attendance->date)}}</td>
											<td class="text-center">{{$attendance->day}}</td>
											<td class="text-center">{{$attendance->in_time}}</td>
											<td class="text-center">{{$attendance->out_time}}</td>
											<td class="text-center">{{round($attendance->hours_worked,2)}}</td>
											{{-- <td class="text-center">{{$attendance->difference}}</td> --}}
											<td class="text-center">{{convertAttendanceFrom($attendance->status)}}</td>
											<td class="text-center">{{$attendance->leave_status}}</td>
											<td class="text-center">
												<div class="btn-group text-center">
													<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
													<span class="caret ml5"></span>
												</button>
													<ul class="dropdown-menu" role="menu">
														<li>
															<a href="#">Edit</a>
														</li>
														<li>
															<a href="#">Delete</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										@endforeach
										<tr>
											<td colspan="11">
												{!! $attendances->render() !!}
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
</div>
@endsection