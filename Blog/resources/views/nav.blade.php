@php
use App\Models\Author;
use App\Models\Category;

$categories = Category::all();
$authors = Author::all();

@endphp
<nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">My Blog</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach(Category::all() as $category)
                            @php
                            $path = 'categories/' . str_replace(' ','%20',rtrim($category->name))
                            @endphp
                            <a href="/categories/{{$category->name}}" 
                            class="dropdown-item {{request()->path()== $path ?'dropdown-hover' : ''}}">
                                {{$category->name}}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Authors</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach($authors as $author)
                            @php
                            $path2 = 'authors/' . str_replace(' ','%20',rtrim($author->name))
                            @endphp
                            <a href="/authors/{{$author->name}}" class="dropdown-item {{request()->path()== $path2 ?'dropdown-hover' : ''}}">{{$author->name}}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="logins">
                @guest
                <a href="/login" class="btn rounded mx-2 {{request()->path()=='login' ? 'hovered-btn' : ''}}">Log In</a>
                
                <a href="/register" class="btn rounded mx-2 {{request()->path()=='register' ? 'hovered-btn' : ''}}">Register</a>
                @endguest
                @auth

                <a href="/edit/posts" class="btn rounded mx-2">Dashboard</a>
                <a href="/logout" class="btn rounded mx-2">Log Out</a>
                @endauth
            </div>
        </div>
    </nav>

    <script src="../js/bootstrap.bundle.min.js"></script>
