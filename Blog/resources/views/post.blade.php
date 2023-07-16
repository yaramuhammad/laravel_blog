@extends("master")

@section("content")
<main class="container p-5">
    <div class="row g-4">
    <div class="col-6">
    <img src="../images/overlay-bg.jpg" alt="Title" class="w-100">
    </div>
    <div class="col-6">
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <div class="d-flex text-decoration-none">
        <img src="../images/testimonial-4.jpg" alt="author" class="rounded-circle">
        <div>
            <h4 class="mt-3 ms-3">{{$post->author->name}}</h4>
            <h6 class="ms-3">{{$post->category->name}}</h6>
        </div>
    </div>
    </div>
    </div>

    
   
</main>
<script>
    document.getElementById("home").classList.add("active");
    document.getElementById("auths").classList.remove("active");
    document.getElementById("cats").classList.remove("active");
</script>
@endsection