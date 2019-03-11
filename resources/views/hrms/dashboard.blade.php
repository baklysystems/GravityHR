@extends('hrms.layouts.base') 
@section('content')

<!-- -------------- Topbar -------------- -->
<header id="topbar" class="alt">
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
					<div class="panel-body panel-scroller scroller-lg scroller-pn pn">
						<div class="media">
						
							<div class="media-left">
								<img data-src="holder.js/60x60" alt="60x60" style="width: 60px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExLjQ2ODc1IiB5PSIzMCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjYweDYwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
									
							</div>
						
							<div class="media-body">
								<h4 class="media-heading">Media heading</h4> 
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae mollitia eligendi, libero deserunt tempore exercitationem dolorum praesentium odio, aliquid non sed nemo officiis cum enim, facilis reiciendis inventore ab et.</p>
							</div>
						</div>  {{-- end media --}}

						<div class="media">
						
							<div class="media-left">
								<img data-src="holder.js/60x60" alt="60x60" style="width: 60px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExLjQ2ODc1IiB5PSIzMCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjYweDYwPC90ZXh0PjwvZz48L3N2Zz4="
								 data-holder-rendered="true">
						
							</div>
						
							<div class="media-body">
								<h4 class="media-heading">Media heading</h4>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae mollitia eligendi, libero deserunt tempore exercitationem
									dolorum praesentium odio, aliquid non sed nemo officiis cum enim, facilis reiciendis inventore ab et.</p>
							</div>
						</div> {{-- end media --}}

						<div class="media">
						
							<div class="media-left">
								<img data-src="holder.js/60x60" alt="60x60" style="width: 60px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExLjQ2ODc1IiB5PSIzMCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjYweDYwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
							</div>
											
							<div class="media-body">
								<h4 class="media-heading">Media heading</h4>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae mollitia eligendi, libero deserunt tempore exercitationem
									dolorum praesentium odio, aliquid non sed nemo officiis cum enim, facilis reiciendis inventore ab et.</p>
							</div>
						</div> {{-- end media --}}
					</div>
				</div>
			</div>
		
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Newly Hired Employees</span>
					</div>
					<div class="panel-body panel-scroller scroller-lg scroller-pn pn">
						<table class="table mbn tc-icon-bold br-t">
							<thead>
								<tr class="hidden">
									<th>#</th>
									<th>First Name</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<span class="flag-sm flag-mx mr5 va-b"></span>Mexico
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-gb mr5 va-b"></span> Great Britain
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-ca mr5 va-b"></span>Canada
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-us mr5 va-b"></span>United States
									</td>
									<td>31%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-cn mr5 va-b"></span> China
									</td>
									<td>22%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-mx mr5 va-b"></span>Mexico
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-gb mr5 va-b"></span> Great Britain
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-ca mr5 va-b"></span>Canada
									</td>
									<td>33%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-us mr5 va-b"></span>United States
									</td>
									<td>31%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-cn mr5 va-b"></span> China
									</td>
									<td>22%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-us mr5 va-b"></span>United States
									</td>
									<td>31%</td>
								</tr>
								<tr>
									<td>
										<span class="flag-sm flag-cn mr5 va-b"></span> China
									</td>
									<td>22%</td>
								</tr>
							</tbody>
						</table>
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
					<div class="panel-body pn">
						<div class="table-responsive">
							<table class="table allcp-form theme-warning tc-checkbox-1 fs13">
								<thead>
									<tr class="bg-light">
										<th class="">Image</th>
										<th class="">Product Title</th>
										<th class="">SKU</th>
										<th class="">Price</th>
										<th class="">Stock</th>
										<th class="text-right">Status</th>

									</tr>
								</thead>
								<tbody>
									<tr>
									
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/1.jpg">
										</td>
										<td class="">Apple iPhone 5</td>
										<td class="">#123</td>
										<td class="">$500</td>
										<td class="">300</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
														<span class="caret ml5"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li class="active">
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li>
														<a href="#">Out of Stock</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/2.jpg">
										</td>
										<td class="">Apple iPhone 6</td>
										<td class="">#1234</td>
										<td class="">$600</td>
										<td class="">500</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
													<span class="caret ml5"></span>
											</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li class="active">
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li>
														<a href="#">Out of Stock</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/3.jpg">
										</td>
										<td class="">Apple iPad</td>
										<td class="">#2345</td>
										<td class="">$400</td>
										<td class="">300</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
												<span class="caret ml5"></span>
										</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li class="active">
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li>
														<a href="#">Out of Stock</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/4.jpg">
										</td>
										<td class="">Apple iPad Air</td>
										<td class="">#4563</td>
										<td class="">$800</td>
										<td class="">500</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
												<span class="caret ml5"></span>
										</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li class="active">
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li>
														<a href="#">Out of Stock</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/9.jpg">
										</td>
										<td class="">Apple iPhone 6S 32GB</td>
										<td class="">#1011</td>
										<td class="">$1195</td>
										<td class="text-danger">
											<b>0 - Sold Out</b>
										</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Sold Out
					                                                        <span class="caret ml5"></span>
					                                                    </button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li>
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li class="active">
														<a href="#">Out of Stock</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
								
										<td class="w100">
											<img class="img-responsive mw40 ib mr10" title="user" src="assets/img/pages/products/10.jpg">
										</td>
										<td class="">Apple iPhone 6S 64GB</td>
										<td class="">#1012</td>
										<td class="">$1395</td>
										<td class="text-danger">
											<b>0 - Sold Out</b>
										</td>
										<td class="text-right">
											<div class="btn-group text-right">
												<button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Sold Out
					                                                        <span class="caret ml5"></span>
					                                                    </button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="#">Edit</a>
													</li>
													<li>
														<a href="#">Delete</a>
													</li>
													<li>
														<a href="#">Archive</a>
													</li>
													<li class="divider"></li>
													<li>
														<a href="#">Active</a>
													</li>
													<li>
														<a href="#">Inactive</a>
													</li>
													<li>
														<a href="#">Low Stock</a>
													</li>
													<li class="active">
														<a href="#">Out of Stock</a>
													</li>
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
						<span class="panel-title">Upcoming Events</span>
					</div>
					<div class="panel-body pn">
					<div class="panel-body pn  mtn">
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