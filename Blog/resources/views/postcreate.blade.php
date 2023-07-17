

<form action="/create" method="post" enctype="multipart/form-data">

    @csrf

    <h1>Add Post</h1>
    <input type="text" value="1" hidden name="img">

    <div class="user-box">

        <label for="">Title</label>
        <input required type="text" name="title" value="{{old('title')}}">

        <div class="error">
            @error('title')
            {{$message}}
            @enderror
        </div>
    </div>

    
    <div class="user-box">

        <label for="">excerpt</label>
        <input required type="text" name="excerpt" value="{{old('excerpt')}}">

        <div class="error">
            @error('excerpt')
            {{$message}}
            @enderror
        </div>
    </div>


    <div class="user-box">

        <label for="">body:</label>
        <textarea required type="text" name="body"> {{old('body')}}</textarea>
        <div class="error">
            @error('body')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="user-box">

        <label for="">thumbnail:</label>
        <input  type="file" name="thumbnail" value="{{old('thumbnail')}}">
        <div class="error">
            @error('thumbnail')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="user-box">
        

        <label for="">category:</label>
        
        <select name="category_id" id="">
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
        <div class="error">
            @error('category')
            {{$message}}
            @enderror
        </div>
    </div>

    <input type="submit">

</form>
