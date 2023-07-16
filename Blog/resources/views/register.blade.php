

<form action="/register" method="post">

    @csrf

    <h1>register</h1>

    <div class="user-box">

        <label for="">Name</label>
        <input required type="text" name="name" value="{{old('name')}}">

        <div class="error">
            @error('name')
            {{$message}}
            @enderror
        </div>
    </div>


    <div class="user-box">

        <label for="">Email:</label>
        <input required type="email" name="email" value="{{old('email')}}">
        <div class="error">
            @error('email')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="user-box">

        <label for="">Password</label>
        <input required type="password" name="password">
        <div class="error">
            @error('password')
            {{$message}}
            @enderror
        </div>
    </div>

    <input type="submit">

</form>
