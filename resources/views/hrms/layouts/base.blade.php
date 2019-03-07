<!DOCTYPE html>
<html>

<head>
	<!-- -------------- Meta and Title -------------- -->
	<meta charset="utf-8">
	<title> Human Resource Management System </title>
	<meta name="description" content="HRMS">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf_token" content="{{csrf_token()}}">

	<!-- -------------- Fonts -------------- -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>


	<!-- -------------- Icomoon -------------- -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fonts/icomoon/icomoon.css') }}">

	<!-- -------------- FullCalendar -------------- -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/plugins/fullcalendar/fullcalendar.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/plugins/magnific/magnific-popup.css') }}">

	<!-- -------------- Plugins -------------- -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/plugins/c3charts/c3.min.css') }}">

	<!-- -------------- CSS - theme -------------- -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">


	<!-- -------------- CSS - allcp forms -------------- -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/allcp/forms/css/forms.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/allcp/forms/css/widget.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/plugins/select2/css/core.css') }}">
	<!-- -------------- Favicon -------------- -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}">

	<!--  Custom css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/custom.css') }}">

	<!-- Sweet alert -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/sweetalert.css') }}"> @stack('styles')

	<!-- -------------- IE8 HTML5 support  -------------- -->
	<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

	<style type="text/css">
		.blink { color: mediumblue; }
		.blink_second { color: red; }
		.blink_third { color: yellow; }
	</style>

</head>

<body class="dashboard-page">
	<!-- -------------- Body Wrap  -------------- -->
	<div id="main">

		<!-- -------------- Header  -------------- -->
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

		<!-- -------------- /Sidebar -------------- -->

		<!-- -------------- Main Wrapper -------------- -->
		<section id="content_wrapper">

			<!-- YIELD CONTENT -->

			@yield('content')

			<!-- /YIELD CONTENT -->

			<!-- -------------- Content -------------- -->
			<section id="content" class="table-layout animated fadeIn">

			</section>
			<!-- -------------- /Content -------------- -->

			@if(\Route::getFacadeRoot()->current()->uri() == 'dashboard' || \Route::getFacadeRoot()->current()->uri() == 'welcome' ||
			\Route::getFacadeRoot()->current()->uri() == 'change-password' || \Route::getFacadeRoot()->current()->uri() == 'not-found'
			)
	
			@endif

		</section>
		<!-- -------------- /Main Wrapper -------------- -->


	</div>
	<!-- -------------- /Body Wrap  -------------- -->





	<!-- -------------- Scripts -------------- -->

	<!-- -------------- jQuery -------------- -->
	<script src="{{ URL::asset('assets/js/jquery/jquery-1.11.3.min.js') }}"></script>
	{{--
	<script src="{{ URL::asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>--}}
	<script src="{{ URL::asset('assets/js/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

	<!-- -------------- HighCharts Plugin -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/highcharts/highcharts.js') }}"></script>
	<script src="{{ URL::asset('assets/js/plugins/c3charts/d3.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/plugins/c3charts/c3.min.js') }}"></script>

	<!-- -------------- Simple Circles Plugin -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/circles/circles.js') }}"></script>

	<!-- -------------- Maps JSs -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/jvectormap/jquery.jvectormap.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js') }}"></script>

	<!-- -------------- FullCalendar Plugin -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/fullcalendar/lib/moment.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

	<!-- -------------- Date/Month - Pickers -------------- -->
	<script src="{{ URL::asset('assets/allcp/forms/js/jquery-ui-monthpicker.min.js') }}"></script>
	<script src="{{ URL::asset('assets/allcp/forms/js/jquery-ui-datepicker.min.js') }}"></script>

	<!-- -------------- Magnific Popup Plugin -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/magnific/jquery.magnific-popup.js') }}"></script>

	<!-- -------------- Theme Scripts -------------- -->
	<script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
	<script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
	<script src="{{ URL::asset('assets/js/main.js') }}"></script>

	<!-- -------------- Widget JS -------------- -->
	<script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/demo/widgets_sidebar.js') }}"></script>
	<script src="{{ URL::asset('assets/js/pages/dashboard1.js') }}"></script>

	<!-- Sweet alert -->
	<script src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>

	@if(\Route::getFacadeRoot()->current()->uri() == 'assign-asset')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'assign-project')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'assign-award')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'edit-award-assignment/{id}')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'add-expense')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'attendance-manager')
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'total-leave-list')
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'apply-leave')
	<script src="{{ URL::asset('assets/js/function.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif

	<script src="{{ URL::asset('assets/js/function.js') }}"></script>
	@if(\Route::getFacadeRoot()->current()->uri() == 'edit-asset-assignment/{id}')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'promotion')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'edit-promotion/{id}')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'add-training-invite')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'edit-training-invite/{id}')
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'add-training-invite')
	<script src="{{ URL::asset('assets/allcp/forms/js/bootstrap-select.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'edit-training-invite/{id}')
	<script src="{{ URL::asset('assets/allcp/forms/js/bootstrap-select.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'apply-leave' )
	<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
	<script src="{{ URL::asset('assets/js/function.js') }}"></script>
	@endif

	<!-- -------------- /Scripts -------------- -->

	@if(\Route::getFacadeRoot()->current()->uri() == 'add-employee' )
	<script src="{{ URL::asset('assets/js/custom_form_wizard.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'attendance-upload' )
	<script src="{{ URL::asset('assets/js/pages/forms-widgets.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'add-team')
	<script src="{{ URL::asset('assets/allcp/forms/js/bootstrap-select.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'edit-team/{id}')
	<script src="{{ URL::asset('assets/allcp/forms/js/bootstrap-select.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'create-event')
	<!-- -------------- DateTime JS -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	@endif @if(\Route::getFacadeRoot()->current()->uri() == 'create-meeting')
	<!-- -------------- DateTime JS -------------- -->
	<script src="{{ URL::asset('assets/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	@endif
	<script>
		$('#datetimepicker2').datetimepicker();


        (function($) {
            $.fn.blink = function(options) {
                var defaults = {
                    delay: 3000
                };
                var options = $.extend(defaults, options);

                return this.each(function() {
                    var obj = $(this);
                    setInterval(function() {
                        if ($(obj).css("visibility") == "visible") {
                            $(obj).css('visibility', 'hidden');
                        }
                        else {
                            $(obj).css('visibility', 'visible');
                        }
                    }, options.delay);
                });
            }
        }(jQuery))

        /////////////////////////////////////////////

        $(document).ready(function() {
            $('.blink').blink(); // default is 500ms blink interval.
            $('.blink_second').blink({
                delay: 100
            }); // causes a 100ms blink interval.
            $('.blink_third').blink({
                delay: 1500
            }); // causes a 1500ms blink interval.
        });

        /////////////////////////////////////////////

	</script>

	<script src="{{ URL::asset('assets/js/pages/allcp_forms-elements.js') }}"></script>
</body>

</html>