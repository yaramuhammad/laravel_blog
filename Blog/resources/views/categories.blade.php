@extends("master")
@section("content")

<section>
    <div class="container m-auto p-5">
        <div action="/" class="d-flex justify-content-between align-items-center position-relative">
            <button class="form-select w-25 text-start" onclick="showList()">Categories</button>

            <div id="list">
                <ul class="list-unstyled">
                    <li><a href="/" class="text-decoration-none fs-6">All</a></li>
                    @foreach($categories as $category)
                    <li><a href="/categories/{{$category->slug}}" class="text-decoration-none fs-6">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <form class="w-75">
                <div class="d-flex ">
                    <input type="text" class="form-control w-75 m-0 pe-5" placeholder="Search" name="search">
                    <input type="submit" class="w-25 mx-2">
                </div>
            </form>
        </div>
    </div>
</section>


<main class="container py-5">
    <div class="row g-4">
        <h1 class="text-center">Categories</h1>
        @foreach ($categories as $cat)
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <a href="/categories/{{$cat->slug}}" class="text-decoration-none">
                        <h4 class="card-title">{{$cat->name}}</h4>
                    </a>
                    <a href="/categories/{{$cat->slug}}" class="text-decoration-none">
                        <p class="card-text">{{$cat->slug}}</p>
                    </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
<script>
    document.getElementById("cats").classList.add('active');
    document.getElementById("auths").classList.remove("active");
    document.getElementById("home").classList.remove("active");
</script>
@endsection