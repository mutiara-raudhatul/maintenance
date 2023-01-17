<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

        <title>@yield('title')</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- JS -->
		<script src="/backend/js/chart.js"></script>


		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="{{asset('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light')}}" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->

		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />
		<!--css maintenance-->
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/basic.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/dropzone.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs3.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/lib/codemirror.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/theme/monokai.css')}}" />

		<!-- css permintaan-barang -->
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
		

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
		
		<!-- Halaman utama admin gudang-->
		<!-- Registrasi-->
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/basic.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/dropzone.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs3.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/lib/codemirror.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/theme/monokai.css')}}" />
		<!-- Data Barang-->
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
		<!-- tabel -->
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="assets/images/logo_semenpadang.png" height="45"alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
		
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">
									{{-- {{\Auth::user()->name}}	 --}}
								</span>
								
								<span class="role">
									{{-- {{\Auth::user()->role}} --}}
								</span>
								
								
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>

								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<form action="{{route('logout')}}" method="POST">
										@csrf
										<button type="submit" class="btn btn-outline-dark"><i class="fa fa-power-off"></i> Logout</button>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
					@include('layout.tsidebar')
				<!-- end: sidebar -->

				<!-- start: page -->
					@yield('content')
				<!-- end: page -->
			</div>

				<!-- start: rightbar -->
					@include('layout.trightbar')
				<!-- end: rightbar -->

		</section>

		<!-- Vendor -->
		<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
		<script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
		<script src="{{asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
		<script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('assets/vendor/flot/jquery.flot.categories.js')}}"></script>
		<script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
		<script src="{{asset('assets/vendor/raphael/raphael.js')}}"></script>
		<script src="{{asset('assets/vendor/morris/morris.js')}}"></script>
		<script src="{{asset('assets/vendor/gauge/gauge.js')}}"></script>
		<script src="{{asset('assets/vendor/snap-svg/snap.svg.js')}}"></script>
		<script src="{{asset('assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>
		<!-- css maintenance -->
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/fuelux/js/spinner.js')}}"></script>
		<script src="{{asset('assets/vendor/dropzone/dropzone.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/lib/codemirror.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/addon/selection/active-line.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/addon/edit/matchbrackets.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/xml/xml.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/css/css.js')}}"></script>
		<script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
		<script src="{{asset('assets/vendor/ios7-switch/ios7-switch.js')}}"></script>

		<!-- css permintaan-barang -->
		<script src="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('assets/javascripts/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>


		<!-- Examples -->
		<script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
		
		<!-- Examples Permintaan Barang-->
		<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.gudang.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.cobadata.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/t.datatables.tabletools.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.editable.js')}}"></script>


		@yield('footer')

		<script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script>

		
		<!-- Halaman utama admin gudang-->
		<!-- Registrasi -->
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/fuelux/js/spinner.js')}}"></script>
		<script src="{{asset('assets/vendor/dropzone/dropzone.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/lib/codemirror.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/addon/selection/active-line.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/addon/edit/matchbrackets.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/xml/xml.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
		<script src="{{asset('assets/vendor/codemirror/mode/css/css.js')}}"></script>
		<script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
		<script src="{{asset('assets/vendor/ios7-switch/ios7-switch.js')}}"></script>
		<!-- Data Barang -->
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		<!-- Examples -->
		<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.user.datatables.row.with.details.js')}}"></script>
		<script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
		<!-- tabel -->
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		<!-- Examples -->
		<script src="{{asset('assets/javascripts/tables/examples.datatables.editable.js')}}"></script>
		
		<!-- Barang Masuk -->
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/fuelux/js/spinner.js')}}"></script>

	</body>
</html>