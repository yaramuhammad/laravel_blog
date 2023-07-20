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
    @if(session()->has('success'))
    <div class="pop-up-layer" id="pop-up-layer">
        <div class="pop-up">
            <p class="fs-3">{{session('success')}}</p>
            <button class="btn" onclick="document.getElementById('pop-up-layer').classList.add('d-none');" id="testButton">OK!</button>
        </div>
    </div>
    @endif
    @if($posts->count())
    <h1 class="text-center mt-5">Dashboard</h1>
    <main class="container py-5 dash">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title }}</td>
                    <td> {{$post->created_at}}</td>
                    <td> <a href="/edit/posts/{{$post->title}}" class="btn bg-warning text-white"><i class="fa fa-pen-to-square"></i></a></td>
                    <td> <a href="/delete/posts/{{$post->title}}" class="btn bg-danger text-white"><i class="fa fa-trash"></i> </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </main>
    @else
    <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="p-5 bg-white h-25 w-25 rounded d-flex justify-content-center align-items-center flex-column">
            <p class="fs-2">No Posts Yet</p>
            <a href="/create" class="login btn">Add a post now!</a>
        </div>
    </div>
    @endif
    @include('footer')
</body>