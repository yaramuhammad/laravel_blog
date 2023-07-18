<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="container p-5">
        <form action="/create" method="post" enctype="multipart/form-data" class="py-5 w-50 m-auto">

            @csrf
            <h1 class="my-2">Add Post</h1>
            <input class="form-control"type="text" value="1" hidden name="img">

            <div class="p-4 border rounded bg-white">

                <label for="" class="mt-4 mb-2">Title:</label>
                <input class="form-control"required type="text" name="title" value="{{old('title')}}">

                <div class="fs-6 text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
          

                <label for="" class="mt-4 mb-2">Excerpt:</label>
                <input class="form-control"required type="text" name="excerpt" value="{{old('excerpt')}}">

                <div class="fs-6 text-danger">
                    @error('excerpt')
                    {{$message}}
                    @enderror
                </div>
           

                <label for="" class="mt-4 mb-2">Body:</label>
                <textarea required type="text" name="body" class="form-control" rows="5"> {{old('body')}}</textarea>
                <div class="fs-6 text-danger">
                    @error('body')
                    {{$message}}
                    @enderror
                </div>
         

                <label for="" class="mt-4 mb-2">Thumbnail:</label>
                <input class="form-control"type="file" name="thumbnail" value="{{old('thumbnail')}}">
                <div class="fs-6 text-danger">
                    @error('thumbnail')
                    {{$message}}
                    @enderror
                </div>
        
                <label for="" class="mt-4 mb-2">Category:</label>

                <select name="category_id" id="" class="form-control form-select">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="fs-6 text-danger">
                    @error('category')
                    {{$message}}
                    @enderror
                </div>
                <input class="btn rounded login mt-4 mb-2" type="submit">
            </div>


        </form>
    </div>
</body>