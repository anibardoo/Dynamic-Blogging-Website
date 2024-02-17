<x-app-layout>
<!doctype html>
<html lang="en">

<head>
    <title>Blog Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5 ">
        <form class="row g-3" action="{{$url}}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- image for blog     -->
            <div class="col-5 mt-3">
                <label for="blog_image" class="form-label">Add Image</label>
                <input class="form-control" name="blog_image" type="file" id="blog_image">
            </div>

            <!-- blog autor -->
            <div class="col-12 mt-2">
                <label for="blog_author" class="form-label">Blog Author</label>
                <input type="text" class="form-control" name="blog_author" id="blog_author" placeholder="Blog Author" value="{{$blogEdit->blog_author}}">
                <span class="text-danger">
                    @error('blog_author')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <!-- blog date -->
            <div class="col-12 mt-2">
                <label for="blog_date" class="form-label">Blog Date</label>
                <input type="date" class="form-control" name="blog_date" id="blog_date" value="{{$blogEdit->blog_date}}" placeholder="Blog Date">
                <span class="text-danger">
                    @error('blog_date')
                    {{$message}}
                    @enderror
                </span>
            </div>


            <!-- blog heading -->
            <div class="col-12 mt-2">
                <label for="blog_heading" class="form-label">Blog Heading</label>
                <input type="text" class="form-control" name="blog_heading" id="blog_heading" value="{{$blogEdit->blog_heading}}" placeholder="Blog Heading">
                <span class="text-danger">
                    @error('blog_heading')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <!-- blog description -->
            <div class="col-12 mt-2">
                <label for="blog_description" class="form-label">Blog Description</label>
                <input type="text" class="form-control" name="blog_description" id="blog_description" value="{{$blogEdit->blog_description}}" placeholder="Blog Description">
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


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
</x-app-layout>
