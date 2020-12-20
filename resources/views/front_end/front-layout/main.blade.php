@include('front_end.front-layout.header')

<body>

<div class="wrapper">
	<!-- <div>
		<a href="{{ url('user_logout') }}" style="float: right; color: red">Logout</a>
	</div> -->
@yield('content')
</div>

@include('front_end.front-layout.footer')
