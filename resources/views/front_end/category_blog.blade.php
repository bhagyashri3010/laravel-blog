@extends('front_end.front-layout.main')

@section('content')

    <!--/.header-->

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <section class="banner">
                        </section>
                        <section class="services" style="margin-top: 100px;">
                            <div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="service-item">
                                            <h4>"Here Quote will come"</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="our-blog" style="background-color: #FDE8E4; padding-top: 0;">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="heading">
                                            <h2 style="margin-bottom: 30px;">Our blog post</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($blogs as $blog)
                                    <div class="col-md-12">
                                        <div class="blog-post">
                                            <div class="col-md-6">
                                                <img src="{{asset('uploads/blog_image/medium_img/'.$blog->image)}}" style="width: 100%;" alt="">
                                                <div class="date" style="right: 15px;left: inherit; font-weight: bold; text-align: center;">
                                                    {{ date("d", strtotime($blog->created_at)) }} <br> {{ date("M", strtotime($blog->created_at)) }}</div>
                                            </div>
                                            <div class="right-content" style="background-color: #FDE8E4;">
                                                <h4>{{$blog->title}}</h4>
                                                <span>Branding / Admin</span>
                                                @php
                                                    $total_words = str_word_count($blog->description);
                                                    $total_chars = (substr(strip_tags($blog->description), 0, 145));
                                                    // dd($total_chars);
                                                    if(ends_with($total_chars,' ') || ends_with($total_chars,'.')){
                                                    $words = str_word_count($total_chars);
                                                    }else{
                                                    $words = str_word_count($total_chars)-1;
                                                    }

                                                @endphp
                                                <p>{{implode(' ', array_slice(explode(' ',strip_tags($blog->description) ), 0, $words))}} {{$total_words>$words ? '...':''}}</p>

                                                 {{-- {!! $blog->description !!} --}}
                                                <div class="text-button">
                                                    <a href="#">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <section class="banner">
                        </section>

                        <section class="services" style="margin-top: 10px;">
                            <div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="our-blog" style="background-color: #FDE8E4; padding-top: 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="heading">
                                        <h2 style="margin-bottom: 30px;">Follow me on</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-xs-12">

                                    <ul class="social-icons">
                                        <li class="follow_me"><a rel="nofollow" href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                        <li class="follow_me"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                        <li class="follow_me"><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="follow_me"><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                                        <li class="follow_me"><a href="javascript:void(0)"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 card-margin">
                                    <div class="card search-form">
                                        <div class="card-body p-0">
                                            <form id="search-form">
                                                <div class="">
                                                    <div class="col-12">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-10 search-bar"  style="height: 40px;">
                                                                <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                                            </div>
                                                            <div class="col-md-2 search-icon">
                                                                <button type="submit" class="btn btn-base" style="margin-left: -20px;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="our-blog" style="background-color: #FDE8E4; padding-top: 0;">
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="heading">
                                            <h2 style="margin-bottom: 30px;">Popular Posts</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($blogs as $blog)
                                        <div class="col-md-12" style="padding: 0;">
                                            <div class="blog-post" style="width: 100%;">
                                                <div class="col-md-6">
                                                    <img src="{{asset('uploads/blog_image/medium_img/'.$blog->image)}}" style="width: 100%;" alt="">
                                                    <div class="date" style="right: 15px;left: inherit; font-weight: bold; text-align: center;">
                                                        {{ date("d", strtotime($blog->created_at)) }} <br> {{ date("M", strtotime($blog->created_at)) }}</div>
                                                </div>
                                                <div class="right-content" style="background-color: #FDE8E4;">
                                                    <h4>{{$blog->title}}</h4>
                                                    <!-- <span>Branding / Admin</span>
                                                    <p>Skateboard iceland twee tofu shaman crucifix vice before they sold out corn hole occupy drinking vinegar chambra meggings kale chips hexagon...</p> -->
                                                    <div class="text-button">
                                                        <a href="#">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <section class="our-blog" style="background-color: #FDE8E4; padding-top: 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="heading">
                                        <h2 style="margin-bottom: 30px;">Subscribe</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 card-margin">
                                    <div class="card search-form">
                                        <div class="card-body p-0">
                                            <form id="search-form">
                                                <div class="">
                                                    <div class="col-12">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-2" style="margin-top: 10px;">
                                                                <label>Name:</label>
                                                            </div>
                                                            <div class="col-md-10" style="height: 40px;">
                                                                <input type="text" class="form-control" id="search" name="search">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12" style="margin-top: 10px;">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-2" style="margin-top: 10px;">
                                                                <label>Email:</label>
                                                            </div>
                                                            <div class="col-md-10" style="height: 40px;">
                                                                <input type="text" class="form-control" id="search" name="search">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12" style="margin-top: 10px; float: left;">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4" style="height: 40px; text-align: center;">
                                                                <!-- <input type="submit" class="btn btn-primary" id="search" name="search"> -->
                                                                <button type="submit" id="form-submit" class="btn" style="background-color: #959996;color: pink;">Subscribe</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
