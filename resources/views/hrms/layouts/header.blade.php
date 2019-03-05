<header class="navbar navbar-fixed-top bg-dark">
	<div class="navbar-logo-wrapper dark bg-dark">
		<span id="sidebar_left_toggle" class="ad ad-lines"></span>
	</div>


	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown dropdown-fuse">
			<div class="navbar-btn btn-group">
				<button data-toggle="dropdown" class="btn dropdown-toggle">
						<span class="fa fa-bell fs20 text-primary"></span>
					</button>
				<button data-toggle="dropdown" class="btn dropdown-toggle fs18 visible-xl">
						8
					</button>
				<div class="dropdown-menu keep-dropdown w375 animated animated-shorter fadeIn" role="menu">
					<div class="panel mbn">
						<div class="panel-menu">
							<span class="panel-title fw600"> Activity reports</span>
							<button class="btn btn-default light btn-xs btn-bordered pull-right" type="button"><i class="fa fa-refresh"></i>
								</button>
						</div>
						<div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
							<ul class="media-list" role="menu">
								<li class="media">
									<a class="media-left" href="#"> <img src="{{ URL::asset('assets/img/avatars/profile_avatar.jpeg') }}" class="mw40 br2" alt="avatar">
										</a>

									<div class="media-body">
										<h5 class="media-heading">New post
											<small class="text-muted">- 09/01/15</small>
										</h5>
										Last Updated 5 days ago by
										<a class="" href="#"> John Doe </a>
									</div>
								</li>


								<li class="media">
									<a class="media-left" href="#"> <img src="{{ URL::asset('assets/img/avatars/profile_avatar.jpeg') }}" class="mw40 br2" alt="avatar">
										</a>

									<div class="media-body">
										<h5 class="media-heading">New post
											<small> - 09/01/15</small>
										</h5>
										Last Updated 5 days ago by
										<a class="" href="#"> John Doe </a>
									</div>
								</li>
								<li class="media">
									<a class="media-left" href="#"> <img src="{{ URL::asset('assets/img/avatars/profile_avatar.jpeg') }}" class="mw40 br2" alt="avatar">
										</a>

									<div class="media-body">
										<h5 class="media-heading">New post
											<small class="text-muted">- 09/01/15</small>
										</h5>
										Last Updated 5 days ago by
										<a class="" href="#"> John Doe </a>
									</div>
								</li>
							</ul>

						</div>
						<div class="panel-footer text-center">
							<a href="#" class="btn btn-primary btn-sm btn-bordered"> View All </a>
						</div>
					</div>
				</div>
			</div>
		</li>

		<li class="dropdown dropdown-fuse">
			<div class="navbar-btn btn-group">
				<li class="dropdown dropdown-fuse">
					<a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
				<span class="hidden-xs"><name>{{\Auth::user()->name}}</name> </span>
				<span class="fa fa-caret-down hidden-xs mr5"></span>
				@if(\Auth::user()->employee->photo)
					<img src="{{\Auth::user()->employee->photo}}" alt="avatar" class="mw40" style="border-radius: 100%;">
				@else
				<img src="{{ URL::asset('assets/img/avatars/profile_pic.png') }}" alt="avatar" class="mw40" style="border-radius: 100%;">
					@endif
			</a>
					</a>
					<ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
						{{--
						<li class="list-group-item">
							<a href="#" class="">
										<span class="fa fa-envelope-o"></span> Messages
										<span class="label label-warning">54</span>
									</a>
						</li> --}}

						<li class="list-group-item">
							<a href="/profile"> <span class="fa fa-user"></span> Profile </a>
						</li>

						@if(\Route::getFacadeRoot()->current()->uri() != 'change-password')
						<li class="list-group-item">
							<a href="/change-password"> <span class="fa fa-lock"></span> Change Password </a>
						</li>
						@endif


						<li class="divider"></li>
						<li class="list-group-item">
							<a href="/logout" class=""><span class="fa fa-power-off"></span> Logout </a>
						</li>


					</ul>
				</li>
	</ul>
</header>