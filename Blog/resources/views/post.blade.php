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
@include('nav')
    <main class="container p-5">
        <div class="row g-4">
            <div class="col-6">
                @php
                $img = asset('storage/').'/'.$post->thumbnail
                @endphp
                <img src="{{$post->img ? $img  :'../images/overlay-bg.jpg'}}" alt="Title" class="w-100">
            </div>
            <div class="col-6">
                <h1>{{$post->title}}</h1>
                <p>{!!$post->body!!}</p>
            </div>
            <div class="d-flex text-decoration-none col-6 author align-items-start">
                @php
                $img2 = asset('storage/').'/'.$post->author->photo
                @endphp

                <img src="{{$post->author->img ? $img2  :'../images/testimonial-4.jpg'}}" alt="author" class="rounded-circle">
                <div>
                    <h4 class="mt-3 ms-3">{{$post->author->name}}</h4>
                    <h6 class="ms-3">{{$post->category->name}}</h6>
                </div>
            </div>
            <div class="col-6">
                <div class=" mx-3">
                    @auth
                    <form action="/post/{{$post->title}}/comments" method="post" class="d-flex">
                        @csrf
                        <input type="text" class="form-control w-75" name="body" placeholder="write a comment">
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn rounded mx-2 login">
                        </div>

                    </form>
                    <div class="error">
                        @error('body')
                        {{$message}}
                        @enderror
                    </div>
                    @else
                    <a href="/login" class="btn rounded mx-2 login">Log in to write a comment.</a>
                    @endauth
                </div>
                @foreach($comments as $comment)
                @php
                $img3 = asset('storage/').'/'.$comment->author->photo;
                $random = 'https://i.pravatar.cc/60?img=' . $comment->author_id;
                @endphp
                <div class="p-4 m-4 comment">
                    <div class="d-flex">
                        <img 
                        src="{{$comment->author->img ? $img3  : $random}}" 
                            alt="" class="rounded-circle me-3" width="50px">
                        <h5 class="mt-3">{{ucfirst($comment->author->name)}}</h5>
                    </div>
                    <p class="ms-5 ps-4">{{$comment->body}}</p>
                </div>
                @endforeach
            </div>
        </div>


    </main>
    @include('footer')
</body>