@extends('admin-layout.app')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
    <strong>Alert</strong> {{session()->get("success")}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('sub'))
<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{session()->get("sub")}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('xsub'))
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
    <strong>Error</strong> {{session()->get("xsub")}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('inquiry_success'))
<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
    <strong>Message</strong> {{session()->get("inquiry_success")}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<section class="hero bg-overlay" id="hero" data-bg="{{asset('storage/'.$admin->banner1)}}">
    <div class="text py-5">
        <!-- <p class="lead">Fully responsive HTML5 &amp; CSS3 template</p> -->
        <p class="lead">{{$admin->home_subheading}}</p>
        <h1>{{$admin->home_heading}}</h1>
        <div class="cta">
            <a href="#features" class="btn btn-primary smooth-link">Get Started</a>
            <div class="link">
                <a href="#">Under the MIT License</a>
            </div>
        </div>
    </div>
</section>



<section class="padding" id="features">
    <div class="container">
        <div class="row">
            @foreach ($feature as $show)
            <div class="col-12 col-md-4 col-sm-12 mt-4">
                <div class="list-item">
                    <div class="icon">
                        <img src="{{asset('storage/'.$show->feature_logo)}}" class="img-fluid rounded-top" alt="">
                    </div>
                    <div class="desc">
                        <h2>{{$show->feature_heading}}</h2>
                        <p>
                            {{$show->feature_description}}
                        </p>
                        <a href="#" class="more">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="padding bg-grey" id="blog">
    <div class="container">
        <h2 class="section-title">We Blog Sometimes</h2>
        <p class="section-lead text-muted">We wrote some articles about whatever was on our heads and most people liked it.</p>
        <div class="section-body">
            <div class="row col-spacing">
                @foreach( $blog as $info )
                <div class="col-12 col-md-6 col-lg-4">
                    @if ($info->status == '1')
                    <article class="card">



                        <img class="card-img-top" src="{{asset('storage/'.$info->blog_image)}}" alt="Article Image">

                        <div class="card-body">
                            <div class="card-subtitle mb-2 text-muted">by <a href="#">{{$info->blog_author}}</a> on {{$info->blog_date}}</div>
                            <h4 class="card-title"><a href="#" data-toggle="read" data-id="1">{{$info->blog_heading}}</a></h4>
                            <p class="card-text">{{$info->blog_description}}</p>

                        </div>
                        <div class="text-center mt-2 mb-3">
                            </article>
                            @endif
                </div>
                @endforeach

            </div>
        </div>

        <div class="row align-items-center mt-5">
            <div class="col-12 col-md-6">
                <h2>Don't miss our article</h2>
                <p class="text-muted">Just enter your email then we will send an email about the latest articles</p>
            </div>
            <div class="col-12 col-md-6">
                <form class="subscribe" action="{{route('subscribe')}}" method="post">
                    @csrf
                    <input type="email" name="email" class="form-control" placeholder="Your email" required>
                    <!-- <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span> -->
                    <button class="btn btn-primary">Subscribe</button>
                </form>

            </div>
        </div>
    </div>
</section>
@foreach ($project as $show)
<section class="bg-overlay padding" id="project" data-bg="{{asset('storage/'.$show->project_banner)}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <figure class="projects-picture">
                    <img src="{{asset('storage/'.$show->project_image)}}" alt="Youzhang">
                </figure>
            </div>
            <div class="col-12 col-md-6">
                <div class="projects-details">
                    <div class="projects-badge">
                        Featured
                    </div>
                    <h2 class="projects-title">{{$show->project_heading}}</h2>
                    <p class="projects-description">
                        {{$show->project_description}}
                    </p>
                    <div class="projects-cta">
                        <a href="{{$show->project_link}}" class="btn btn-primary" target="_blank">
                            Buy Now
                        </a>
                        <!-- <a href="https://codecanyon.net/user/frameborder?ref=frameborder" class="btn btn-link" target="_blank">
                                More Products
                            </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<section class="padding bg-grey" id="contact">
    <div class="container">
        <h2 class="section-title text-center">Contact Us</h2>
        <p class="section-lead text-center text-muted">Send us your inquiry, we will help you and reply as soon as possible</p>
        <div class="section-body">
            <div class="row col-spacing">
                @foreach ($contact as $show)
                <div class="col-12 col-md-5">


                    <p class="contact-text">You can send us something like a question or project, we are open {{$show->open_at}} to {{$show->close_at}}.</p>
                    <ul class="contact-icon">
                        <li><i class="ion ion-ios-telephone"></i>
                            <div>{{$show->contact_number}}</div>
                        </li>
                        <li><i class="ion ion-ios-email"></i>
                            <div>{{$show->contact_email}}</div>
                        </li>
                    </ul>
                    <!-- <iframe src="{{$show->contact_location}}" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <!-- <iframe src="" style="border:none;" class="maps"></iframe> -->
                    <!-- <iframe src="{!! $show->contact_location !!}"  width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    {!! $show->contact_location !!}
                </div>
                @endforeach
                <div class="col-12 col-md-7" id="contact">

                    <form class="contact row" action="{{route('userInquiry')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-6">
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
                            <span class="text-danger">
                                @error('subject')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-12">
                            <input type="file" class="form-control" placeholder="CV" name="cv" id="cv">
                            <span class="text-danger">
                                @error('cv')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" placeholder="Message" name="message" id="message"></textarea>
                            <span class="text-danger">
                                @error('message')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-12 mt-2">
                            <button class="btn btn-primary" type="submit">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
