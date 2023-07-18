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
    <div class="container p-5">
        <form action="/register" method="post" class="py-5 w-50 m-auto">
            @csrf
            <h1 class="my-5">Register</h1>

            <div class="p-4 border rounded bg-white">
                <label class="mt-4 mb-2">Name</label>
                <input required type="text" name="name" value="{{old('name')}}" class="form-control">

                <div class="fs-6 text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>


                <label for="" class="mt-4 mb-2">Email:</label>
                <input required type="email" name="email" value="{{old('email')}}" class="form-control">
                <div class="fs-6 text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>



                <label for="" class="mt-4 mb-2">Password</label>
                <input required type="password" name="password" class="form-control">
                <div class="fs-6 text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
                <input type="submit" class="btn rounded login mt-4 mb-2">
            </div>


        </form>
    </div>
</body>