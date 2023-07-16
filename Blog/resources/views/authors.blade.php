@extends("master")

@section("content")
<main class="container py-5">
    <div class="row g-4">
        <h1 class="text-center">Authors</h1>
        @foreach ($authors as $author)
        <div class="col-4">
            <div class="card">
                <a href="authors/{{$author->name}}" class="text-decoration-none">
                    <img class="card-img-top rounded-circle" src="./images/testimonial-4.jpg" alt="Title">
                </a>
                <div class="card-body">
                    <a href="authors/{{$author->name}}" class="text-decoration-none">
                        <h4 class="card-title">{{$author->name}}</h4>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
<script>
    document.getElementById("auths").classList.add("active");
    document.getElementById("home").classList.remove("active");
    document.getElementById("cats").classList.remove("active");
</script>
@endsection