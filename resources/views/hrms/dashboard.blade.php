@extends('hrms.layouts.base') 
@section('content')
<!-- -------------- Topbar -------------- -->
<header id="topbar" class="alt">
	<div class="topbar-left">
		<ol class="breadcrumb">
			<li class="breadcrumb-icon">
				<a href="/dashboard"> <span class="fa fa-home"></span> </a>
			</li>
			<li class="breadcrumb-active">
				<a href="/dashboard">Dashboard</a>
			</li>
			<li class="breadcrumb-link">
				<a href="/dashboard">Home</a>
			</li>
			<li class="breadcrumb-current-item">Dashboard</li>
		</ol>
	</div>
</header>
<!-- -------------- /Topbar -------------- -->
<!-- -------------- Content -------------- -->
<section id="content" class="table-layout">
	<div class="chute chute-center">
		<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Announcement</span>
					</div>
					<div class="panel-body panel-scroller scroller-lg scroller-pn">
						<div class="media">
							<div class="media-body">
								<h4>Lorem ipsum dolor sit amet</h4>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae mollitia eligendi, libero deserunt tempore exercitationem
									dolorum praesentium odio, aliquid non sed nemo officiis cum enim, facilis reiciendis inventore ab et.</p>
							</div>
						</div>
						<div class="media">
							<div class="media-body">
								<h4>New Policy</h4>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae mollitia eligendi, libero deserunt tempore exercitationem
									dolorum praesentium odio, aliquid non sed nemo officiis cum enim, facilis reiciendis inventore ab et.</p>
							</div>
						</div> {{-- end media --}}
						<div class="media">
							<div class="media-body">
								<h4>Lorem ipsum dolor sit amet consectetur, adipisicing elit</h4>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium ducimus assumenda veritatis earum eius, aliquam
									quaerat debitis rem ratione beatae veniam quisquam eveniet, harum, eum in libero nulla quod blanditiis? Lorem ipsum
									dolor sit amet consectetur adipisicing elit. Et molestiae iusto, dolores facere est architecto voluptatum ab alias
									temporibus, amet labore animi modi nobis maxime neque exercitationem aliquid magni aspernatur!</p>
							</div>
						</div> {{-- end media --}}
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Draft New Announcement</span>
					</div>
					<div class="panel-body ">
						<div class="allcp-form theme-primary">
							<div class="section mb20">
								<input type="text" id="draft-title" class="gui-input bg-light" placeholder="Title">
							</div>
							<div class="section">
								<label class="field">
						                            <textarea class="gui-textarea bg-light" id="comment" name="comment"
						                                      placeholder="Message here..."></textarea>
						                                                </label>
							</div>

						</div>
					</div>
					<div class="panel-footer text-right">
						<button class="btn btn-primary ph15" type="button">Save Draft</button>
					</div>
				</div>
			</div>
		</div>
	
	{{-- row 2 --}}


	<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Leave Requests</span>
					</div>
					<div class="panel-body panel-scroller scroller-lg scroller-pn">
						<div class="table-responsive">
							<table class="table allcp-form theme-warning tc-checkbox-1 fs13">
								<thead>
									<tr class="bg-light">
										<th>Name</th>
										<th class="text-center">Reason</th>
										<th class="text-center">Date</th>
										<th class="text-center">Direct Supervisor</th>
										<th class="text-center">Status</th>
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
		
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Upcoming Holidays</span>
					</div>
		
					<div class="panel-body panel-scroller scroller-lg scroller-pn">
						<ol class="timeline-list">
							<li class="timeline-item">
								<div class="timeline-icon bg-dark light">
									<span class="fa fa-envelope"></span>
								</div>
								<div class="timeline-desc">
									<b>John Doe</b> Sent you a message.
									<a href="#">View now</a>
								</div>
								<div class="timeline-date">11:15am</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-success">
									<span class="fa fa-info"></span>
								</div>
								<div class="timeline-desc">
									<b>Admin</b> created invoice for:
									<a href="#">iPad Air</a>
								</div>
								<div class="timeline-date">6:26pm</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-success">
									<span class="fa fa-info"></span>
								</div>
								<div class="timeline-desc">
									<b>Admin</b> created invoice for:
									<a href="#">iPhone 5s</a>
								</div>
								<div class="timeline-date">11:45am</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-dark light">
									<span class="fa fa-envelope"></span>
								</div>
								<div class="timeline-desc">
									<b>Lara Johnes</b> Sent you a message.
									<a href="#">View now</a>
								</div>
								<div class="timeline-date">3:18pm</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-primary">
									<span class="fa fa-star"></span>
								</div>
								<div class="timeline-desc">
									<b>Richard Johnes</b> Added to wishlist:
									<a href="#">iPhone 5c</a>
								</div>
								<div class="timeline-date">8:15am</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-success">
									<span class="fa fa-info"></span>
								</div>
								<div class="timeline-desc">
									<b>Admin</b> created invoice for:
									<a href="#">Mac Pro</a>
								</div>
								<div class="timeline-date">9:29pm</div>
							</li>
							<li class="timeline-item">
								<div class="timeline-icon bg-primary">
									<span class="fa fa-star"></span>
								</div>
								<div class="timeline-desc">
									<b>Douglas Adams</b> Added to wishlist:
									<a href="#">iPad 4</a>
								</div>
								<div class="timeline-date">3:05am</div>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
</section>
@endsection