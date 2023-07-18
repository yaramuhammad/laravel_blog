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
    <main class="container py-5">
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
                    <td> <a href="/delete/posts/{{$post->title}}"class="btn bg-danger text-white"><i class="fa fa-trash"></i> </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>