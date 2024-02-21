@extends('dashboard-layout.app')
@section('dashboard-content')
<!-- Content Start -->

@if (Auth::user()->role_id == '1')
<!-- Sale & Revenue Start -->
<div class="mt-4" id="dashboard">
    <div class="row g-5 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Subscribers</p>
                    <h6 class="mb-0">
                        {{$totalSubscriber}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Blogs</p>
                    <h6 class="mb-0">{{$totalBlog}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-camera fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Your Blogs</p>
                    <h6 class="mb-0">{{$totalMyBlog}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-question-circle fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">User Inqiry</p>
                    <h6 class="mb-0">{{$totalInquiry}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total user</p>
                    <h6 class="mb-0">{{$totalUser}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-ban fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Blocked user</p>
                    <h6 class="mb-0">{{$BlockedUser}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if (Auth::user()->role_id != '1')
<!-- blog status -->
<div class="container mt-5 " id="blogStatus">
    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseblogStatus" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    BLOG STATUS
                </button>
            </h2>
            <div id="panelsStayOpen-collapseblogStatus" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="text-center">
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Published by</th>
                                    <th scope="col">Request send at</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($myBlog as $blog)

                                <tr class="">
                                    <div class="d-flex justify-content-evenly">

                                        <td>
                                            <img width="100" src="{{ asset('storage/' . $blog->blog_image) }}" alt="" />
                                        </td>
                                        <td>{{$blog->blog_author}}</td>
                                        <td>{{$blog->created_at}}</td>
                                        <td> @if ($blog->status == '3')
                                            <span class="text-sm badge bg-warning">Pending</span>
                                            @elseif ($blog->status =='1')
                                            <span class="text-sm badge bg-success">Approved</span>
                                            @else
                                            <span class="text-sm badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </div>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if (Auth::user()->role_id == '1')
<!-- blog status -->
<div class="container mt-5 " id="blogStatus">
    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseblogStatus" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    BLOG STATUS
                </button>
            </h2>
            <div id="panelsStayOpen-collapseblogStatus" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="text-center">
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Published by</th>
                                    <th scope="col">Request send at</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                @if (Auth::user()->role_id == '1')
                                <tr class="">
                                    <div class="d-flex justify-content-evenly">

                                        <td>
                                            <img width="100" src="{{ asset('storage/' . $blog->blog_image) }}" alt="" />
                                        </td>
                                        <td>{{$blog->blog_author}}</td>
                                        <td>{{$blog->created_at}}</td>
                                        <td> @if ($blog->status == '3')
                                            <span class="text-sm badge bg-warning">Pending</span>
                                            @elseif ($blog->status =='1')
                                            <span class="text-sm badge bg-success">Approved</span>
                                            @else
                                            <span class="text-sm badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="lni lni-more-alt"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                                                    @if ($blog->status == '3')
                                                    <li class="dropdown-item"><a href="{{ route('publish.user', ['id' => $blog->blog_id]) }}" class="text-gray">publish</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('reject.user', ['id' => $blog->blog_id]) }}" class="text-danger">reject</a></li>
                                                    @elseif ($blog->status =='1')
                                                    <li class="dropdown-item"><a href="{{ route('reject.user', ['id' => $blog->blog_id]) }}" class="text-danger">reject</a></li>

                                                    @else
                                                    <li class="dropdown-item"><a href="{{ route('publish.user', ['id' => $blog->blog_id]) }}" class="text-gray">publish</a></li>
                                                    @endif
                                        </td>
                                    </div>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if (Auth::user()->role_id == '1')
<!-- users list -->
<div class="container mt-5 " id="usersList">
    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseusersList" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    USER LIST
                </button>
            </h2>
            <div id="panelsStayOpen-collapseusersList" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="text-center">
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if ($user->role_id != '1')
                                <tr class="">
                                    <div class="d-flex justify-content-evenly">

                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->status == '2')
                                            <span class="text-sm badge bg-danger">blocked</span>
                                            @else
                                            <span class="text-sm badge bg-primary">active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="lni lni-more-alt"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                                                    @if ($user->status == '2')
                                                    <li class="dropdown-item"><a href="{{ route('unblock.user', ['id' => $user->id]) }}" class="text-gray">Unblock</a></li>
                                                    @else
                                                    <li class="dropdown-item"><a href="{{ route('block.user', ['id' => $user->id]) }}" class="text-danger">Block</a></li>
                                                    @endif
                                        </td>
                                    </div>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if (Auth::user()->role_id == '1')
<!-- user inqiry -->
<div class="container mt-5 " id="userinqiry">
    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseInquiry" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    USER INUIRY
                </button>
            </h2>
            <div id="panelsStayOpen-collapseInquiry" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="text-center">
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiry as $show)
                                <tr class="">
                                    <div class="d-flex justify-content-evenly">

                                        <td>{{$show->name}}</td>
                                        <td>{{$show->email}}</td>
                                        <td>{{$show->subject}}</td>
                                        <td>{{$show->message}}</td>
                                        <td>
                                            <a href="mailto:{{$show->email}}"><button type="submit" class="me-2"><img src="{{asset('storage/email.png')}}" hight="30px" width="30px" alt=""></button></a>
                                            <a href="{{asset('storage/'.$show->cv)}}"><button type="submit" class="me-2">
                                                    <img src="{{asset('storage/cv.png')}}" hight="30px" width="30px" alt=""></button></a>
                                        <td>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if (Auth::user()->role_id == '1')
<!-- blogs -->

<div class="container mt-5 " id="blogs">

    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne3" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    BLOGS
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne3" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <!-- slides -->
                    <div class="container d-flex align-items-center justify-content-center">

                        <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                @foreach($blogs as $info)
                                <div class="carousel-item active">

                                    <!-- slide card -->
                                    <article class="card">


                                        <img class="card-img-top" src="{{asset('storage/'.$info->blog_image)}}" alt="Article Image">

                                        <div class="card-body">
                                            <div class="card-subtitle mb-2 text-muted">by <a href="#">{{$info->blog_author}}</a> on {{$info->blog_date}}</div>
                                            <h4 class="card-title"><a href="#" data-toggle="read" data-id="1">{{$info->blog_heading}}</a></h4>
                                            <p class="card-text">{{$info->blog_description}}</p>

                                        </div>
                                        <div class="text-center mt-2 mb-3">

                                            <a href="{{route('blog.edit',['blog_id'=>$info->blog_id])}}"><button type="button" class="me-2"><img src="{{asset('storage/pen.png')}}" hight="30px" width="30px" alt=""></button></a>
                                            <a href="{{url('/admin/blog/delete/')}}/{{$info->blog_id}}"><button type="submit" class="ms-2"><img src="{{asset('storage/bin.png')}}" hight="30px" width="30px" alt=""></button></a>
                                        </div>
                                    </article>
                                    @if(session()->has('blog_success'))
                                    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                                        <strong>Success</strong> {{session()->get("blog_success")}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                    <!-- modal  -->
                    <div class="col  d-flex justify-content-end align-items-center mt-4">
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"><img src="{{asset('storage/add.png')}}" hight="30px" width="30px" alt=""></button>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new blog</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- add blog form -->
                                    <form class="row g-3" action="{{route('blog')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <!-- image for blog     -->
                                        <div class="col-5 mt-3">
                                            <label for="blog_image" class="form-label">Add Image</label>
                                            <input class="form-control" name="blog_image" type="file" id="blog_image">
                                        </div>

                                        <!-- blog autor -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_author" class="form-label">Blog Author</label>
                                            <input type="text" class="form-control" name="blog_author" id="blog_author" placeholder="Blog Author">
                                            <span class="text-danger">
                                                @error('blog_author')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>

                                        <!-- blog date -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_date" class="form-label">Blog Date</label>
                                            <input type="date" class="form-control" name="blog_date" id="blog_date" value="" placeholder="Blog Date">
                                            <span class="text-danger">
                                                @error('blog_date')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>


                                        <!-- blog heading -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_heading" class="form-label">Blog Heading</label>
                                            <input type="text" class="form-control" name="blog_heading" id="blog_heading" value="" placeholder="Blog Heading">
                                            <span class="text-danger">
                                                @error('blog_heading')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>

                                        <!-- blog description -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_description" class="form-label">Blog Description</label>
                                            <input type="text" class="form-control" name="blog_description" id="blog_description" value="" placeholder="Blog Description">
                                            <span class="text-danger">
                                                @error('blog_description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <!-- auth id -->
                                        <input type="hidden" name="auth_id" value="{{Auth::user()->id}}">
                                        <!-- submit button -->
                                        <div class="col-12 mt-5">
                                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (Auth::user()->role_id == '1')
<!-- checked subscribers  brodcast -->

<!-- accordion -->
<div class="container mt-5" id="subscribers">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsesubscriber" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    SUBSCRIBERS
                </button>
            </h2>
            <div id="panelsStayOpen-collapsesubscriber" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="text-center">

                        <form action="{{route('broadcast')}}" method="post">

                            @csrf
                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th>
                                            Select
                                        </th>
                                        <th scope="col">No.</th>
                                        <th scope="col">Subscribers</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriber as $show)
                                    <tr class="">
                                        <div class="d-flex justify-content-evenly">
                                            <td><input class="form-check-input" type="checkbox" value="{{$show->subscriber_id}}" id="" name="active[]" id="defaultCheck1"></td>
                                            <td>{{$show->subscriber_id}}</td>
                                            <td>{{$show->email}}</td>
                                            <td> <a href="{{route('subscriber.delete',['subscriber_id'=>$show->subscriber_id])}}"> <button type="button" class="me-2"><img src="{{asset('storage/bin.png')}}" hight="30px" width="30px" alt=""></button></a>
                                            </td>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col  d-flex justify-content-end align-items-center mt-4">
                                <button type="submit" class=""><img src="{{asset('storage/send.png')}}" hight="30px" width="30px" alt=""></button>
                            </div>
                        </form>

                        @if(session()->has('done'))
                        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{session()->get("done")}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif


@if (Auth::user()->role_id == '1')
<!-- Brodcast  -->

<div class="container mt-5 " id="boradcast">

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOneSendAds" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    BROADCAST
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOneSendAds" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <form class="row g-3" action="{{route('sendAds')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- subject  -->
                        <div class="col-12 mt-2">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="@if ($broadcast!=null){{$broadcast->subject}}@endif" placeholder="Subject">
                            <span class="text-danger">
                                @error('subject')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- content -->
                        <div class="col-12 mt-2">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control" name="content" id="content" value="@if ($broadcast!=null){{$broadcast->content}}@endif" placeholder="Content">
                            <span class="text-danger">
                                @error('content')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- submit button -->
                        <div class="col  d-flex justify-content-end align-items-center mt-4">

                            <button type="submit"><img src="{{asset('storage/send.png')}}" hight="30px" width="30px" alt=""></button>
                        </div>

                    </form>

                </div>

            </div>

            @if(session()->has('sendAds'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{session()->get("sendAds")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

<!-- My blogsblogs -->

<div class="container mt-5 " id="myblogs">

    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOneMyBlogs" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    MY BLOGS
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOneMyBlogs" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <!-- slides -->
                    <div class="container d-flex align-items-center justify-content-center">

                        <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                @foreach(Auth::user()->blogs as $info)

                                <div class="carousel-item active">

                                    <!-- slide card -->
                                    <article class="card">

                                        <img class="card-img-top" src="{{asset('storage/'.$info->blog_image)}}" alt="Article Image">

                                        <div class="card-body">
                                            <div class="card-subtitle mb-2 text-muted">by <a href="#">{{$info->blog_author}}</a> on {{$info->blog_date}}</div>
                                            <h4 class="card-title"><a href="#" data-toggle="read" data-id="1">{{$info->blog_heading}}</a></h4>
                                            <p class="card-text">{{$info->blog_description}}</p>
                                            <p class="card-text">by {{$info->user->name}}</p>

                                        </div>
                                        <div class="text-center mt-2 mb-3">

                                            <a href="{{route('blog.edit',['blog_id'=>$info->blog_id])}}"><button type="button" class="me-2"><img src="{{asset('storage/pen.png')}}" hight="30px" width="30px" alt=""></button></a>
                                            <a href="{{url('/admin/blog/delete/')}}/{{$info->blog_id}}"><button type="submit" class="ms-2"><img src="{{asset('storage/bin.png')}}" hight="30px" width="30px" alt=""></button></a>
                                        </div>
                                    </article>
                                    @if(session()->has('blog_success'))
                                    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                                        <strong>Success</strong> {{session()->get("blog_success")}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                    <!-- modal  -->
                    <div class="col  d-flex justify-content-end align-items-center mt-4">
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"><img src="{{asset('storage/add.png')}}" hight="30px" width="30px" alt=""></button>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new blog</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- add blog form -->
                                    <form class="row g-3" action="{{route('blog')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <!-- image for blog     -->
                                        <div class="col-5 mt-3">
                                            <label for="blog_image" class="form-label">Add Image</label>
                                            <input class="form-control" name="blog_image" type="file" id="blog_image">
                                        </div>

                                        <!-- blog autor -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_author" class="form-label">Blog Author</label>
                                            <input type="text" class="form-control" name="blog_author" id="blog_author" placeholder="Blog Author">
                                            <span class="text-danger">
                                                @error('blog_author')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>

                                        <!-- blog date -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_date" class="form-label">Blog Date</label>
                                            <input type="date" class="form-control" name="blog_date" id="blog_date" value="" placeholder="Blog Date">
                                            <span class="text-danger">
                                                @error('blog_date')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>


                                        <!-- blog heading -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_heading" class="form-label">Blog Heading</label>
                                            <input type="text" class="form-control" name="blog_heading" id="blog_heading" value="" placeholder="Blog Heading">
                                            <span class="text-danger">
                                                @error('blog_heading')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>

                                        <!-- blog description -->
                                        <div class="col-12 mt-2">
                                            <label for="blog_description" class="form-label">Blog Description</label>
                                            <input type="text" class="form-control" name="blog_description" id="blog_description" value="" placeholder="Blog Description">
                                            <span class="text-danger">
                                                @error('blog_description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <!-- submit button -->
                                        <div class="col-12 mt-5">
                                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->role_id == '1')
<!-- home section  -->

<div class="container mt-5 " id="home">

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne1" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    HOME
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <form class="row g-3" action="{{route('home')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- logo for company     -->
                        <div class="col-4 mt-2">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control" name="logo" type="file" id="logo" value="">

                            <span class="text-danger">
                                @error('logo')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- banner1 -->
                        <div class="col-4 mt-2">
                            <label for="banner1" class="form-label">1st banner</label>
                            <input class="form-control" name="banner1" type="file" id="banner1" value="">
                            <span class="text-danger">
                                @error('banner1')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- home heading  -->
                        <div class="col-12 mt-2">
                            <label for="home_heading" class="form-label">Home Heading</label>
                            <input type="text" class="form-control" name="home_heading" id="home_heading" value="@if ($admin!=null){{$admin->home_heading}}@endif" placeholder="Home Heading">
                            <span class="text-danger">
                                @error('home_heading')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- home subheading -->
                        <div class="col-12 mt-2">
                            <label for="home_subheading" class="form-label">Home Subheading 1</label>
                            <input type="text" class="form-control" name="home_subheading" id="home_subheading" value="@if ($admin!=null){{$admin->home_subheading}}@endif" placeholder="Home Subheading">
                            <span class="text-danger">
                                @error('home_subheading')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- submit button -->
                        <div class="col  d-flex justify-content-end align-items-center mt-4">

                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                        </div>

                    </form>

                </div>

            </div>
            @if(session()->has('success'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{session()->get("success")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- features section -->

<div class="container mt-5 " id="features">

    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne2" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    FEATURES
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne2" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="text-center">
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Heading</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Oprations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feature as $show)
                                <tr class="">
                                    <div class="d-flex justify-content-evenly">
                                        <td><img src="{{asset('storage/'.$show->feature_logo)}}" class="d-flex justify-content-center" alt=""></td>
                                        <td>
                                            {{$show->feature_heading}}
                                        </td>
                                        <td>{{$show->feature_description}}</td>
                                        <td>
                                            <!-- <button type="submit" class="me-2"><img src="{{asset('storage/pen.png')}}" hight="30px" width="30px" alt=""></button> -->
                                            <a href="{{route('feature.edit',['feature_id'=>$show->feature_id])}}"> <button type="button" class="me-2"><img src="{{asset('storage/pen.png')}}" hight="30px" width="30px" alt=""></button></a>

                                            <a href="{{route('feature.delete',['feature_id'=>$show->feature_id])}}"> <button type="button" class="me-2"><img src="{{asset('storage/bin.png')}}" hight="30px" width="30px" alt=""></button></a>

                                        </td>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(session()->has('feature_success'))
                        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{session()->get("feature_success")}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <!-- modal  -->
                    <div class="col  d-flex justify-content-end align-items-center mt-4">
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"><img src="{{asset('storage/add.png')}}" hight="30px" width="30px" alt=""></button>
                    </div>



                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new feature</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- add feature form -->
                                    <form class="row g-3" action="{{route('feature')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- icon for feature     -->
                                        <div class="col-5 mt-3">
                                            <label for="feature_logo" class="form-label">Icon</label>
                                            <input class="form-control" name="feature_logo" type="file" id="feature_logo">
                                        </div>

                                        <!-- feature heading -->
                                        <div class="col-12 mt-2">
                                            <label for="feature_heading" class="form-label">Feature Heading</label>
                                            <input type="text" class="form-control" name="feature_heading" id="feature_heading" value="" placeholder="Feature Heading">
                                            <span class="text-danger">
                                                @error('feature_heading')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <!-- featue description -->
                                        <div class="col-12 mt-2">
                                            <label for="feature_description" class="form-label">Feature Description</label>
                                            <input type="text" class="form-control" name="feature_description" id="feature_description" value="" placeholder="Feature Description">
                                            <span class="text-danger">
                                                @error('feature_description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <!-- submit button -->
                                        <div class="col-12 mt-5">
                                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- project section  -->
<div class="container mt-5 " id="project">

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOneProject" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    PROJECT
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOneProject" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <form class="row g-3" action="{{route('project')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- banner for project section  -->
                        <div class="col-4 mt-2">
                            <label for="project_banner" class="form-label">Banner</label>
                            <input class="form-control" name="project_banner" type="file" id="project_banner">
                            <span class="text-danger">
                                @error('project_banner')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- project image -->
                        <div class="col-4 mt-2">
                            <label for="project_image" class="form-label">Project image</label>
                            <input class="form-control" name="project_image" type="file" id="project_image">
                            <span class="text-danger">
                                @error('project_image')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- project heading  -->
                        <div class="col-12 mt-2">
                            <label for="project_heading" class="form-label">Project Heading</label>
                            <input type="text" class="form-control" name="project_heading" id="project_heading" value="@if ($project!=null){{$project->project_heading}}@endif" placeholder="Project Heading">
                            <span class="text-danger">
                                @error('project_heading')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- project description -->
                        <div class="col-12 mt-2">
                            <label for="project_description" class="form-label">Project description</label>
                            <input type="text" class="form-control" name="project_description" id="project_description" value="@if ($project!=null){{$project->project_description}}@endif" placeholder="Project Description">
                            <span class="text-danger">
                                @error('project_description')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="project_link" class="form-label">Project link</label>
                            <input type="text" class="form-control" name="project_link" id="project_link" value="@if ($project!=null){{$project->project_link}}@endif" placeholder="Project Link">
                            <span class="text-danger">
                                @error('project_link')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- submit button -->
                        <div class="col  d-flex justify-content-end align-items-center mt-4">

                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                        </div>

                    </form>

                </div>

            </div>
            @if(session()->has('success'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{session()->get("success")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- contact us -->
<div class="container mt-5 " id="contactus">

    <!-- accordion -->
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOneContactUs" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    CONTACT US
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOneContactUs" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <form class="row g-3" action="{{route('contact')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- opening time     -->
                        <div class="col-5 mt-3">
                            <label for="open_at" class="form-label">Open At</label>
                            <input class="form-control" name="open_at" type="time" id="open_at" value="@if ($contact!=null){{$contact->open_at}}@endif">
                            <span class="text-danger">
                                @error('open_at')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- closing time  -->
                        <div class="col-5 mt-3">
                            <label for="close_at" class="form-label">Close At</label>
                            <input class="form-control" name="close_at" type="time" id="close_at" value="@if ($contact!=null){{$contact->close_at}}@endif">
                            <span class="text-danger">
                                @error('close_at')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- contace number -->
                        <div class="col-12 mt-2">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="contact_number" id="contact_number" placeholder="Contact number" value="@if ($contact!=null){{$contact->contact_number}}@endif">
                            <span class="text-danger">
                                @error('contact_number')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- contact email -->
                        <div class="col-12 mt-2">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" name="contact_email" id="contact_email" value="@if ($contact!=null){{$contact->contact_email}}@endif" placeholder="Contact email">
                            <span class="text-danger">
                                @error('contact_email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <!-- location -->
                        <div class="col-12 mt-2">
                            <label for="contact_location" class="form-label">Location Link</label>
                            <input type="text" class="form-control" name="contact_location" id="contact_location" value="@if ($contact!=null){{$contact->contact_location}}@endif" placeholder="Location link">
                            <span class="text-danger">
                                @error('contact_location')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <!-- submit button -->
                        <div class="col  d-flex justify-content-end align-items-center mt-4">
                            <button type="submit"><img src="{{asset('storage/edit.png')}}" hight="30px" width="30px" alt=""></button>
                        </div>
                    </form>
                    @if(session()->has('contact_success'))
                    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{session()->get("contact_success")}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endif
@endsection
