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
    <main class="container py-5">


        <h1 class="text-center">{{$cat->name}}</h1>

        <div class="row g-4">
            @foreach ($posts as $post)
            <div class="col-4">
                <div class="card">
                    <a href="/post/{{$post->title}}" class="text-decoration-none">
                        <img class="card-img-top" src="../images/overlay-bg.jpg" alt="Title">
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
                                    <img src="../images/testimonial-4.jpg" alt="author" class="rounded-circle">
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
        </div>
    </main>
    @include('footer')
</body>