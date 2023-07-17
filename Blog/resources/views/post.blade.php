<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>


    <!-- <script src="https://cdn.tailwindcss.com"></script> -->


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <main class="container p-5">
        <div class="row g-4">
            <div class="col-6">
                <img src="../images/overlay-bg.jpg" alt="Title" class="w-100">
            </div>
            <div class="col-6">
                <h1>{{$post->title}}</h1>
                <p>{!!$post->body!!}</p>
            </div>
            <div class="d-flex text-decoration-none col-6 author align-items-start">
                <img src="../images/testimonial-4.jpg" alt="author" class="rounded-circle">
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
                <div class="p-4 m-4 comment">
                    <div class="d-flex">
                        <img src="https://i.pravatar.cc/60?img={{$comment->author_id}}" alt="" class="rounded-circle me-3">
                        <h4 class="mt-3">{{ucfirst($comment->author->name)}}</h4>
                    </div>
                    <p class="ms-5 ps-4">{{$comment->body}}</p>
                </div>
                @endforeach
            </div>
        </div>


    </main>
    <script>
        document.getElementById("home").classList.add("active");
        document.getElementById("auths").classList.remove("active");
        document.getElementById("cats").classList.remove("active");
    </script>
</body>