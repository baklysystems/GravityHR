@extends('hrms.layouts.base') 
@section('content') 
<!-- -------------- Content -------------- -->
<section id="content" class="animated fadeIn">
	<div class="row">
		<!-- -------------- FAQ Left Column -------------- -->
		<div class="col-md-9">
			<div class="panel">
				<div class="panel-body pn mtn">
					<div class="br-b">
						<h3 class="mb20 mt10">Company Polices</h3>
					</div>
					<div class="mt40">
						<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQ30Jtt0qRpp2KFenn6zvonelhi5dGOhflyvTtca8puPRoxcVvN-1JtI-TlrVdLCTz3sxg6zpeuamcx/embed?start=false&loop=true&delayms=3000"
						 frameborder="0" width="100%" height="600px" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- -------------- FAQ Right Column -------------- -->
		<div class="col-md-3">
			
			<div class="panel mb10">
				<div class="panel-heading">
					<span class="panel-title"> Recently added Tickets</span>
				</div>
				<div class="panel-body text-muted pn pv10">
					<ul class="list-unstyled">
						<li><strong class="text-dark"> John Doe: </strong> why can not i do that and that?
						</li>
						<li>Posted: today</li>
						<li>Status:
							<strong class="text-primary">Open</strong>
						</li>
					</ul>
					<ul class="list-unstyled pt10">
						<li><strong class="text-dark"> Jane Doe: </strong> I can not do that. Perhaps i should read documentation?
						</li>
						<li>Posted: today</li>
						<li>Status:
							<strong class="text-primary">Open</strong>
						</li>
					</ul>
					<ul class="list-unstyled">
						<li><strong class="text-dark"> Charli Doe: </strong> why can not i do that and that?
						</li>
						<li>Posted: today</li>
						<li>Status:
							<strong class="text-primary">Open</strong>
						</li>
					</ul>
					<ul class="list-unstyled pt10">
						<li><strong class="text-dark"> Mane Doe: </strong> I can not do that. Perhaps i should read documentation?
						</li>
						<li>Posted: today</li>
						<li>Status:
							<strong class="text-primary">Open</strong>
						</li>
					</ul>
				</div>
				<div class="panel-footer text-muted br-t pn pt20">
					<ul class="list-unstyled">
						<li><strong class="text-dark"> John Doe: </strong> why can not i do that and that?
						</li>
						<li>Posted: 1 week ago</li>
						<li>Status:
							<strong class="text-alert">Closed</strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection