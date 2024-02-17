<!DOCTYPE html>
<html lang="en">
@include("dashboard-layout.headerlinks")

<body>
    <!-- <div class="container-xxl position-relative bg-white d-flex p-0"> -->
        @include("dashboard-layout.sidebar")
        <div class="content">
            @include("dashboard-layout.header")
            @yield("dashboard-content")
        </div>
        @include("dashboard-layout.backToTop")
    <!-- </div> -->
    @include("dashboard-layout.footerslinks")
</body>

</html>
