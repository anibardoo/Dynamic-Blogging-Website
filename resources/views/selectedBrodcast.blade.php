<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        button {
            border: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5 ">
        <form class="row g-3" action="{{route('sendCheckedAds')}}" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($subscriber as $data)
            <input type="email" value="{{$data->email}}" name="emails[]" hidden>
            @endforeach
            <!-- subject  -->
            <div class="col-12 mt-2">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject">
                <span class="text-danger">
                    @error('subject')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <!-- content -->
            <div class="col-12 mt-2">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" name="content" id="content" placeholder="Content">
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
