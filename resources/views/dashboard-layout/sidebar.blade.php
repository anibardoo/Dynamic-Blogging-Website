<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ Auth::user()->name }}</h3>

        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('storage/img2/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            @if (Auth::user()->role_id == '1')
            <a href="#dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @endif
            <a href="#blogStatus" class="nav-item nav-link"><i class="fa fa-upload me-2"></i>Blog status</a>
            @if (Auth::user()->role_id == '1')
            <a href="#usersList" class="nav-item nav-link"><i class="fa fa-list-alt me-2"></i>User list</a>
            @endif
            @if (Auth::user()->role_id == '1')
            <a href="#userinqiry" class="nav-item nav-link"><i class="fa fa-question-circle me-2"></i>User Inqiry</a>
            @endif
            @if (Auth::user()->role_id == '1')
            <a href="#blogs" class="nav-item nav-link"><i class="fa fa-globe" aria-hidden="true"></i> Blogs</a>
            <a href="#subscribers" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Subscriers</a>
            <a href="#boradcast" class="nav-item nav-link"><i class="fa fa-bullhorn me-2"></i>Boradcast</a>
            @endif
            <a href="#myblogs" class="nav-item nav-link"><i class="fa fa-camera"></i>My blogs</a>
            @if (Auth::user()->role_id == '1')
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Website's Data</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="#home" class="dropdown-item">Home</a>
                    <a href="#features" class="dropdown-item">Features</a>
                    <a href="#project" class="dropdown-item">Project</a>
                    <a href="#contactus" class="dropdown-item">Contact Us</a>
                </div>
            </div>
            @endif
        </div>
    </nav>
</div>
<!-- Sidebar End -->
