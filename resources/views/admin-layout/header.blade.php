<nav class="navbar navbar-expand-lg main-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('storage/'.$admin->logo)}}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="ion-navicon"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mr-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link smooth-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-link" href="#project">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-link" href="#contact">Contact us</a>
                    </li>
                </ul>
                <form class="form-inline">

                    @if (Route::has('login'))
                <div class="text-center">
                    @auth
                      <a href="{{ url('/dashboard') }}" class="btn smooth-link align-middle btn-primary">Dashboard</a>

                    @else
                    <a href="{{route('login')}}" class="btn smooth-link align-middle btn-primary">Login</a>
                    @endauth
                </div>
            @endif




                </form>
            </div>
        </div>
    </nav>
