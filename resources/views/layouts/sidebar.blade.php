<style>
	.avatar{
		position: relative;
		white-space: nowrap;
		border-radius: 500px;
		display: inline-block;
		width: 40px;
	}

	.avatar img {
		height: auto;
		max-width: 100%;
		vertical-align: middle;
		width: 100%;
		border-radius: 500px;
	}

	.bottom {
		margin: 1px;
		background-color: #27c24c;
		top: auto;
		right: 0;
		bottom: 0;
		left: auto;
		position: absolute;
		/*top: 0;
		left: 0;*/
		width: 10px;
		height: 10px;
		margin: 2px;
		border-style: solid;
		border-width: 2px;
		border-radius: 100%;
		border-color: #27c24c;
	}

	.caret {
		display: inline-block;
		width: 0;
		height: 0;
		margin-left: 2px;
		vertical-align: middle;
		border-top: 4px dashed;
		border-top: 4px solid \9;
		border-right: 4px solid transparent;
		border-left: 4px solid transparent;
		color: #000000;
	}
	.dropdown-toggle::after {
		content: none;
	}

	.dropdown-menu > li > a {
		padding: 5px 15px;
	}

	.dropdown-menu > li > a {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: normal;
		line-height: 1.42857143;
		color: #333;
		white-space: nowrap;
	}

	.super_admin {
		color: #000000;
		font-size: 14px;
	}
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Right navbar links -->

	<ul class="navbar-nav ml-auto">
		<li class="dropdown">
		<a href="#" data-toggle="dropdown" class="dropdown-toggle clear" aria-expanded="true">
			<span class="hidden-sm hidden-md super_admin">Super Admin</span> <b class="caret"></b>
		  <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
			<img src="{{ asset('images/user.png') }}" alt="...">
			<i class="on md b-white bottom"></i>
		  </span>
		</a>
		<!-- dropdown -->
		<ul class="dropdown-menu animated fadeInRight w">
		  <li>
			<a href="{{ url('user_logout') }}">Logout</a>
			<!-- <a href="http://admin.bcar.local/logout" ui-sref="access.signin">Logout</a> -->
		  </li>
		</ul>
		<!-- / dropdown -->
	  </li>
	</ul>
</nav>
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
	  <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		   style="opacity: .8">
	  <span class="brand-text font-weight-light">Blogs</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <!-- Sidebar user panel (optional) -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			  <!-- Add icons to the links using the .nav-icon class
				   with font-awesome or any other icon font library -->
				{{-- <li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link  ">
						<i class="fa fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li> --}}
				<li class="nav-item has-treeview menu-open">
					<a href="{{ url('blogs') }}" class="nav-link {{ in_array(Request::path(), array('blogs','create-blog')) || Request::is('show-blog/*')? 'active' : ''}}">
						<i class="fa fa-clipboard"></i>
						<p>Blogs</p>
					</a>
				</li>
				 <li class="nav-item has-treeview menu-open">
					<a href="{{ route('categories.index') }}" class="nav-link {{ Request::path() == "categories" ? 'active':''}}">
					<i class="fa fa-list"></i>
						<p>Categories</p>
					</a>
				</li>
				<li class="nav-item has-treeview menu-open">
					<a href="{{ route('about-index') }}" class="nav-link {{ Request::path() == 'about_us' ? 'active': ''}}">
					<i class="fa fa-history"></i>
						<p>About Us</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
