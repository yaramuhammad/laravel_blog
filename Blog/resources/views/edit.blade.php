<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <div class="container p-3">
        @if(Auth::id()!=$post->author_id)
        {{abort(403, 'Access denied');}}
        @endif
        <form action="/edit/posts/{{$post->title}}" method="post" enctype="multipart/form-data" class="py-2 w-50 m-auto">
            @csrf
            @method('PATCH')
            <h1 class="my-3">Edit Post: {{$post->title}}</h1>

            <input type="number" hidden name="img">
            <div class="p-4 border rounded bg-white">

                <label class="mt-4 mb-2">Title</label>
                <input required type="text" name="title" value="{{old('title',$post->title)}}" class="form-control">

                <div class="fs-6 text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>

                <label for="" class="mt-4 mb-2">Excerpt:</label>
                <input required type="text" name="excerpt" value="{{old('excerpt',$post->excerpt)}}" class="form-control">
                <div class="fs-6 text-danger">
                    @error('excerpt')
                    {{$message}}
                    @enderror
                </div>

                <label for="" class="mt-4 mb-2">Body</label>
                <textarea name="body" rows="5" class="form-control">
                {{old('body',$post->body)}}
                </textarea>
                <div class="fs-6 text-danger">
                    @error('body')
                    {{$message}}
                    @enderror
                </div>


                
                @php
                $img = asset('storage/').'/'.$post->thumbnail
                @endphp
                <label for="" class="mt-4 mb-2">Thumbnail:</label>
                <div class="d-flex justify-content-center">
                    <input type="file" name="thumbnail" value="{{old('thumbnail')}}" class="form-control">
                    <img src="{{$post->img ? $img  :'../images/overlay-bg.jpg'}}" alt="Title" width="80">
                </div>
                <div class="fs-6 text-danger">
                    @error('thumbnail')
                    {{$message}}
                    @enderror
                </div>



                <label for="" class="mt-4 mb-2">Category:</label>

                <select name="category_id" id="" class="form-control form-select">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == old('category_id') || $category->id == $post->category_id ? 'selected' : ''}}> 
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                <div class="fs-6 text-danger">
                    @error('category')
                    {{$message}}
                    @enderror
                </div>

                <input type="submit" class="btn rounded login mt-4 mb-2">
            </div>


        </form>
    </div>
</body>