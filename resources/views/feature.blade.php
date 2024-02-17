<x-app-layout>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <!-- add feature form -->
        <form class="row g-3" action="{{$url}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- icon for feature     -->
            <div class="col-5 mt-3">
                <label for="feature_logo" class="form-label">Icon</label>
                <input class="form-control" name="feature_logo" type="file" id="feature_logo">
            </div>

            <!-- feature heading -->
            <div class="col-12 mt-2">
                <label for="feature_heading" class="form-label">Feature Heading</label>
                <input type="text" class="form-control" name="feature_heading" id="feature_heading" value="{{$featureEdit->feature_heading}}" placeholder="Feature Heading">
                <span class="text-danger">
                    @error('feature_heading')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <!-- featue description -->
            <div class="col-12 mt-2">
                <label for="feature_description" class="form-label">Feature Description</label>
                <input type="text" class="form-control" name="feature_description" id="feature_description" value="{{$featureEdit->feature_description}}" placeholder="Feature Description">
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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
</x-app-layout>
