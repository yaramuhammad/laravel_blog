<main class="container py-5">
    <div class="d-flex w-50 m-auto p-5">
        @php
        $img2 = asset('storage/').'/'.$author->photo
        @endphp
        <img class=" rounded-circle m-4 " src="{{$author->img ? $img2  :'../images/testimonial-4.jpg'}}" alt="author">
        <h4 class="mt-5 pt-5">{{$author->name}}</h4>
    </div>
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