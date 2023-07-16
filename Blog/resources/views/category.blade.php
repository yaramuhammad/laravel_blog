@extends("master")

@section("content")
<main class="container py-5">
    <section>
        <div class="container m-auto p-5">
            <div action="/" class="d-flex justify-content-between align-items-center position-relative">
                <button class="form-select w-25 text-start" onclick="showList()">{{$cat->name}}</button>
                
                <div id="list">
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                        <li>
                            <a href="/categories/{{$category->slug}}" class="text-decoration-none fs-6 {{($category->name==$cat->name)?'hovered':''}}">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <form class="w-75">
                    <div class="d-flex ">
                        <input type="text" hidden value="{{$cat->name}}" name="category">
                        <input type="text" class="form-control w-75 m-0 pe-5" placeholder="Search" name="search" value="{{request('search')}}">
                        <input type="submit" class="w-25 mx-2">
                    </div>
                </form>
            </div>
        </div>
    </section>
    
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
<script>
    document.getElementById("cats").classList.add("active");
    document.getElementById("auths").classList.remove("active");
    document.getElementById("home").classList.remove("active");
</script>
@endsection