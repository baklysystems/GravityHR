@extends('hrms.layouts.base') 
@section('content')

<section id="content" class="table-layout">
	<div class="chute chute-center">
		<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Announcement</span>
						<span class="panel-controls">
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mdNewAnnouncement">
								Add New
							</button>
						</span>
						<!-- Modal -->
							<div class="modal fade" id="mdNewAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label for="announceSubj" class="col-form-label">Subject</label>
													<input type="text" class="form-control" id="announceSubj">
												</div>
												<div class="form-group">
													<label for="announceText" class="col-form-label">Announcement</label>
													<textarea class="form-control" id="announceText" rows="6" style="resize: none; overflow: scroll-y"></textarea>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-text" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-danger">Post</button>
										</div>
									</div>
								</div>
							</div>
					</div>

					<div class="panel-body panel-scroller scroller-lg scroller-pn">
						
					<div class="message-view">
						<div class="message-header">
							<span class="pull-right text-muted">03/15/2019 00:00</span>
							<h4 class="mtn mb5">New Employee Policy</h4>
							<small class="text-muted clearfix">Posted by: Lucille Marie Cabanes</small>
						</div>
						<hr class="mb10 mt10">
						<div class="message-body">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
								aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
								aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
								vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
								zzril delenit augue duis dolore te feugait nulla facilisi. </p>
					
							<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.
								Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt
								lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
								lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis
								per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
						</div>
					</div> 
					{{-- end msg view --}}

					<div class="message-view">
						<div class="message-header">
							<span class="pull-right text-muted">03/15/2019 00:00</span>
							<h4 class="mt20 mb5">Leave Form Submission</h4>
							<small class="text-muted clearfix">Posted by: Lucille Marie Cabanes</small>
						</div>
						<hr class="mb10 mt10">
						<div class="message-body">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
								aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
								aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
								vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
								zzril delenit augue duis dolore te feugait nulla facilisi. </p>
						</div>
					</div>
					{{-- end msg view --}}

					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title"> <img src="{{ URL::asset('assets/img/icn-birthday-cake.svg') }}" style="width: 32px; height: 32px;" class="mr10 va-b">Birthday List</span></div>
					<div class="panel-body panel-scroller scroller-lg scroller-pn pln ptn mt10">
						<table class="table table-compressed">
							<tbody>
								<tr>
									<td><img src="{{ URL::asset('assets/img/avatars/avatar4.jpg') }}" style="width: 32px; height: 32px;" class="img-circle mr10"> <strong>Rechiell Wagas</strong></td>
									<td>March 3</td>
									<td>QA Analyst</td>
								</tr>
								<tr>
									<td><img src="{{ URL::asset('assets/img/avatars/avatar1.jpg') }}" style="width: 32px; height: 32px;" class="img-circle mr10">		<strong>Rechiell Wagas</strong></td>
									<td>March 3</td>
									<td>QA Analyst</td>
								</tr>
								<tr>
									<td><img src="{{ URL::asset('assets/img/avatars/avatar2.jpg') }}" style="width: 32px; height: 32px;" class="img-circle mr10">		<strong>Rechiell Wagas</strong></td>
									<td>March 3</td>
									<td>QA Analyst</td>
								</tr>
								<tr>
									<td><img src="{{ URL::asset('assets/img/avatars/avatar3.jpg') }}" style="width: 32px; height: 32px;" class="img-circle mr10">		<strong>Rechiell Wagas</strong></td>
									<td>March 3</td>
									<td>QA Analyst</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{-- end --}}
	


		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Leave Requests</span>
					</div>
					<div class="panel-body panel-scroller scroller-lg scroller-pn">
						<div class="table-responsive">
							<table class="table allcp-form theme-warning tc-checkbox-1 fs13">
								<thead>
									<tr class="bg-light">
										<th class="pt10 pb10">Name</th>
										<th class="pt10 pb10">Reason</th>
										<th class="pt10 pb10">Date</th>
										<th class="pt10 pb10">Direct Supervisor</th>
										<th class="pt10 pb10 text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
															<span class="caret ml5"></span>
														</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																								<span class="caret ml5"></span>
																							</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>

									<tr>
											<td class="text-left">Alison Liandro Carcedo</td>
											<td class="text-center">Vacation Leave</td>
											<td class="text-center">March 13-15</td>
											<td class="text-center">Fatima Reyes</td>
											<td class="text-center">
												<div class="btn-group text-right">
													<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																																		<span class="caret ml5"></span>
																																	</button>
													<ul class="dropdown-menu" role="menu">
														<li> <a href="">Approve</a> </li>
														<li> <a href="">Decline</a> </li>
													</ul>
												</div>
											</td>
										</tr>

										
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																								<span class="caret ml5"></span>
																							</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																								<span class="caret ml5"></span>
																							</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																								<span class="caret ml5"></span>
																							</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-left">Alison Liandro Carcedo</td>
										<td class="text-center">Vacation Leave</td>
										<td class="text-center">March 13-15</td>
										<td class="text-center">Fatima Reyes</td>
										<td class="text-center">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
																								<span class="caret ml5"></span>
																							</button>
												<ul class="dropdown-menu" role="menu">
													<li> <a href="">Approve</a> </li>
													<li> <a href="">Decline</a> </li>
												</ul>
											</div>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		
			<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<span class="panel-title"> <img src="{{ URL::asset('assets/img/icn-calendar.svg') }}" style="width: 32px; height: 32px;" class="mr5 va-b">
											2019 Holidays</span></div>
						<div class="panel-body panel-scroller scroller-lg scroller-pn">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th class="pt5 pb5">Date</th>
										<th class="pt5 pb5">Weekday</th>
										<th class="pt5 pb5">Name</th>
										<th class="pt5 pb5">Team</th>
									</tr>
								</thead>
								<tbody>
									<tr id="tr0" class="c0">
										<td>1 Jan</td>
										<td>Tuesday</td>
										<td>New Year's Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr1" class="c1">
										<td>2 Jan</td>
										<td>Wednesday</td>
										<td>Day After New Year's Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr2" class="c0">
										<td>5 Feb</td>
										<td>Tuesday</td>
										<td>Chinese Lunar New Year's Day</td>
										<td>Special Non-working</td>
									</tr>
									<tr id="tr3" class="c1">
										<td>25 Feb</td>
										<td>Monday</td>
										<td>People Power Anniversary</td>
										<td>Special Non-working</td>
									</tr>
				
									<tr id="tr6" class="c0">
										<td>9 Apr</td>
										<td>Tuesday</td>
										<td>The Day of Valor</td>
										<td>Regular</td>
									</tr>
									<tr id="tr7" class="c1">
										<td>18 Apr</td>
										<td>Thursday</td>
										<td>Maundy Thursday</td>
										<td>Regular</td>
									</tr>
									<tr id="tr8" class="c0">
										<td>19 Apr</td>
										<td>Friday</td>
										<td>Good Friday</td>
										<td>Regular</td>
									</tr>
									<tr id="tr9" class="c1">
										<td>20 Apr</td>
										<td>Saturday</td>
										<td>Black Saturday</td>
										<td>Special Non-working</td>
									</tr>
				
									<tr id="tr11" class="c1">
										<td>1 May</td>
										<td>Wednesday</td>
										<td>Labor Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr12" class="c0">
										<td>6 Jun</td>
										<td>Thursday</td>
										<td>Eidul-Fitar</td>
										<td>Regular</td>
									</tr>
									<tr id="tr13" class="c1">
										<td>12 Jun</td>
										<td>Wednesday</td>
										<td>Independence Day</td>
										<td>Regular</td>
									</tr>
				
									<tr id="tr15" class="c1">
										<td>12 Aug</td>
										<td>Monday</td>
										<td>Eid al-Adha (Feast of the Sacrifice)</td>
										<td>Regular</td>
									</tr>
				
									<tr id="tr17" class="c1">
										<td>21 Aug</td>
										<td>Wednesday</td>
										<td>Ninoy Aquino Day</td>
										<td>Special Non-working</td>
									</tr>
									<tr id="tr18" class="c0">
										<td>25 Aug</td>
										<td>Sunday</td>
										<td>National Heroes Day</td>
										<td>Regular</td>
									</tr>
				
									<tr id="tr22" class="c0">
										<td>1 Nov</td>
										<td>Friday</td>
										<td>All Saints' Day</td>
										<td>Special Non-working</td>
									</tr>
				
									<tr id="tr26" class="c0">
										<td>30 Nov</td>
										<td>Saturday</td>
										<td>Bonifacio Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr27" class="c1">
										<td>8 Dec</td>
										<td>Sunday</td>
										<td>Feast of the Immaculate Conception</td>
										<td>Special Non-working</td>
									</tr>
				
									<tr id="tr30" class="c0">
										<td>24 Dec</td>
										<td>Tuesday</td>
										<td>Additional Special Non-Working Day</td>
										<td>Special Non-working</td>
									</tr>
									<tr id="tr31" class="c1">
										<td>25 Dec</td>
										<td>Wednesday</td>
										<td>Christmas Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr32" class="c0">
										<td>30 Dec</td>
										<td>Monday</td>
										<td>Rizal Day</td>
										<td>Regular</td>
									</tr>
									<tr id="tr33" class="c1">
										<td>31 Dec</td>
										<td>Tuesday</td>
										<td>New Year's Eve</td>
										<td>Special Non-working</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

		</div>
	</div>
	</div>
</div>
</section>
@endsection