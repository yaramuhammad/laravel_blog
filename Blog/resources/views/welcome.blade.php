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

    @if(session()->has('success'))
    <div class="pop-up-layer" id="pop-up-layer">
        <div class="pop-up">
            <p class="fs-3">{{session('success')}}</p>
            <button class="btn" onclick="document.getElementById('pop-up-layer').classList.add('d-none');" id="testButton">OK!</button>
        </div>
    </div>
    @endif

    @include('nav')

    <section class="text-center home">
        <div class="home-layer  p-5">
            <div class="container m-auto p-5">
                <h1 class="fw-bolder">My Blog</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, quidem</p>
            </div>
        </div>
    </section>

    <section class="post-filter">
        <div class="container m-auto p-5">
            <div action="/" class="d-flex justify-content-between align-items-center position-relative">
                <button class="form-select w-25 text-start" onclick="showList()">{{request('category')!==null ? request('category') : 'Categories'}}</button>

                <div id="list">
                    <ul class="list-unstyled">
                        <li>
                            <a href="?{{http_build_query(request()->except('category','page'))}}" class="text-decoration-none fs-6">All</a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="?category={{$category->name}}&{{http_build_query(request()->except('category','page'))}}" class="text-decoration-none fs-6">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <form class="w-75" action="#" method="GET">
                    <div class="d-flex ">
                        <input type="text" hidden value="{{request('category')}}" name="category">
                        <input type="text" class="form-control w-75 m-0 pe-5" placeholder="Search" name="search" value="{{request('search')}}">
                        <input type="submit" class="w-25 mx-2">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row g-4">
            <h1 class="text-center">Posts</h1>
            @auth<a href="/create" class="login btn offset-11 col-1">Add a post</a>@endauth
            @if($posts->count())
            @foreach ($posts as $post)
            <div class="col-4">
                <div class="card">
                    <a href="/post/{{$post->title}}" class="text-decoration-none">
                        @php
                        $img = asset('storage/').'/'.$post->thumbnail
                        @endphp
                        <img class="card-img-top" src="{{$post->img ? $img  :'./images/overlay-bg.jpg'}}" alt="Title" height="250px">
                    </a>
                    <div class="card-body">
                        <a href="/post/{{$post->title}}" class="text-decoration-none">
                            <h4 class="card-title">{{$post->title}}</h4>
                        </a>
                        <a href="/post/{{$post->title}}" class="text-decoration-none">
                            <p class="card-text">{{$post->excerpt}}</p>
                        </a>

                        <a href="/authors/{{$post->author->name}}" class="text-decoration-none mt-4 d-block">
                            <div class="author">
                                <div class="d-flex text-decoration-none">
                                    @php
                                    $img2 = asset('storage/').'/'.$post->author->photo
                                    @endphp
                                    <img src="{{$post->author->img ? $img2  :'./images/testimonial-4.jpg'}}" alt="author" class="rounded-circle">
                                    <div>
                                        <h4 class="mt-3 ms-3">{{$post->author->name}}</h4>
                                        <h6 class="ms-3">{{$post->category->name}}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center">no posts yet</p>
            @endif
        </div>
    </main>

    <div class="container">
        {{$posts->links()}}
    </div>

    @include('footer')

    <script>
        function showList() {

            openDropdown = document.getElementById("list");

            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            } else {
                openDropdown.classList.add('show');
            }
        }
    </script>
</body>