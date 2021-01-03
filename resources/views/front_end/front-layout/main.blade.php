@include('front_end.front-layout.header')
{{-- @include('front_end.navbar.blade') --}}
<body style="background-color: #FDE8E4;">
    <div class="header" style="background-color: white;">

        <!-- common navbar -->
        <div class="container">
            <a href="#" class="navbar-brand scroll-top">
                <img src="{{asset('images/rct2.jpeg')}}" width="588" height="178" style="margin: auto;">
            </a>

            <!--/.navbar-->
        </div>
        <nav style="background-color: #FDE8E4;" class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('index')}}">Home</a></li>
                    <li><a href="javascript:void(0)">Recipe Index</a></li>
                    @foreach($categories as $key=>$category)
                        <li><a href="{{url('Blog_category/'.$key)}}">{{$category}}</a></li>
                    @endforeach
                    <li><a href="{{url('about-us')}}">About Me</a></li>
                    <li><a href="javascript:void(0)">Contact</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>


        <!--/.container-->
    </div>

<div class="wrapper">
	<!-- <div>
		<a href="{{ url('user_logout') }}" style="float: right; color: red">Logout</a>
	</div> -->
@yield('content')
</div>

@include('front_end.front-layout.footer')
