<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>UD Sunan Drajad</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/minified/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/minified/core.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/minified/components.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/minified/colors.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('assets/css/extras/animate.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo asset('css/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css">

	<link href="<?php echo asset('vendor/summernote/summernote.css') ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/loaders/pace.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/core/libraries/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/core/libraries/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/loaders/blockui.min.js') ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/media/fancybox.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/forms/styling/uniform.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/tables/datatables/extensions/tools.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('js/dataTables.buttons.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('js/buttons.print.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo asset('assets/js/plugins/forms/selects/select2.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo asset('assets/js/core/app.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/core/libraries/jquery_ui/interactions.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/pages/form_select2.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/pages/datatables_basic.js') ?>"></script>
	<!-- /theme JS files -->

	<script type="text/javascript" src="<?php echo asset('assets/js/core/libraries/jquery-ui.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('js/alert.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('plugins/ckeditor/ckeditor.js') ?>"></script>

	<script type="text/javascript" src="<?php echo asset('vendor/summernote/summernote.min.js') ?>"></script>
	@section('header')

	@show
	<style>
		.numberCircle {
		    border-radius: 50%;

		    width: 20px;
		    height: 20px;
		    padding-top: 2px;

		    background: #FF4500;
		    color: #ffffff;
		    text-align: center;

		    font: 12px Arial, sans-serif;
		}
	</style>
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
		<?php /*	<a class="navbar-brand" href="{{ route('dashboard') }}" style="padding: 4px 10px"><img src="{{ asset('assets/images/logo_light.png') }}" alt="" style="height: 35px;"></a>

			*/ ?><ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="dropdown">
					<?php /*
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-git-compare"></i>
						<span class="visible-xs-inline-block position-right">Git updates</span>
						<span class="badge bg-warning-400">9</span>
					</a> */ ?>

					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Git updates
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<?php /*	<img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
						<span>{{ Sentinel::getUser()->fullname }}</span>
						<i class="caret"></i> */?>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<?php /* <li><a href="{{route('admin.edit', \Auth::user()->id)}}"><i class="icon-cog5"></i> Account settings</a></li> --}}
						<li><a href="<?php echo route('logout') ?>"><i class="icon-switch2"></i> Logout</a></li>
					*/?></ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<?php /*	<a href="#" class="media-left"><img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ \Sentinel::getUser()->fullname }}</span>
								</div>
							*/?></div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>

									<li class="active">
										<a href="dashboard.html">
											<i class="icon-home"></i>
											<p>Input Data</p>
										</a>
									</li>
									<li >
										<a href="#" class="click">
											<i class="pe-7s-graph"></i>
											<span class="caret"></span>
											<p>Input Data</p>
										</a>
										<ul class="nav c_dd" style="margin-left:2em;margin-top:0; display:none">
										  <li>
											<a href="dashboard.html">
												<i class="pe-7s-graph"></i>
												<p>Input Data</p>
											</a>
										  </li>
										</ul>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Cek Stock</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Pencarian</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Pengadaan Barang</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Penentuan Harga</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Penjualan</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Laporan</p>
										</a>
									</li>
									<li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Pemberian Hadiah</p>
										</a>
									</li>
									{{-- <li>
										<a href="{{route('pelanggan.index')}}">
											<i class="pe-7s-user"></i>
											<p>Pelanggan</p>
										</a>
									</li> --}}
									<li>
										<a href="table.html">
											<i class="pe-7s-note2"></i>
											<p>Table List</p>
										</a>
									</li>
									<li>
										<a href="typography.html">
											<i class="pe-7s-news-paper"></i>
											<p>Typography</p>
										</a>
									</li>
									<li>
										<a href="icons.html">
											<i class="pe-7s-science"></i>
											<p>Icons</p>
										</a>
									</li>
									<li>
										<a href="maps.html">
											<i class="pe-7s-map-marker"></i>
											<p>Maps</p>
										</a>
									</li>
									<li>
										<a href="notifications.html">
											<i class="pe-7s-bell"></i>
											<p>Notifications</p>
										</a>
									</li>



							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
