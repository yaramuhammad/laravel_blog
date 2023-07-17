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
    
    @if(session()->has('success'))
    <div class="pop-up-layer" id="pop-up-layer">
        <div class="pop-up">
            <p class="fs-3">{{session('success')}}</p>
            <button class="btn" onclick="document.getElementById('pop-up-layer').classList.add('d-none');" id="testButton">OK!</button>
        </div>
    </div>
    @endif

    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">My Blog</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach($categories as $category)
                            <a href="/categories/{{$category->name}}" class="dropdown-item">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Authors</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach($authors as $author)
                            <a href="/authors/{{$author->name}}" class="dropdown-item">{{$author->name}}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="logins">
                @guest
                <a href="/login" class="btn rounded mx-2">Log In</a>
                <a href="/register" class="btn rounded mx-2">Register</a>
                @endguest
                @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="p-2 rounded">Log Out</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

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
                <button class="form-select w-25 text-start" onclick="showList('list')">{{request('category')!==null ? request('category') : 'Categories'}}</button>

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
            <p class="text-center col-11">Posts</p>
            @auth<a href="/create" class="login btn col-1">Add a post</a>@endauth
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
                                    <img src="./images/testimonial-4.jpg" alt="author" class="rounded-circle">
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


    <footer class="footer-distributed p-5 fw-bold ">

        <div class="container">
            <div class="row g-2">
                <div class="footer-left col-4">

                    <h3>Blog</h3>

                    <p class="footer-company-name">Blog Name © 2015</p>
                </div>

                <div class="footer-center col-4">

                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
                    </div>

                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+1.555.555.5555</p>
                    </div>

                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:support@company.com">support@company.com</a></p>
                    </div>

                </div>

                <div class="footer-right col-4">

                    <p class="footer-company-about">
                        <span>About the company</span>
                        Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                    </p>

                    <div class="footer-icons">

                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>

                    </div>

                </div>
            </div>
        </div>

    </footer>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function showList(id) {

            openDropdown = document.getElementById(id);

            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            } else {
                openDropdown.classList.add('show');
            }
        }
    </script>
</body>