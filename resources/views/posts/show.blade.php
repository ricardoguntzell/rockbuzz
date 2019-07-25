<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rockbuzz - Teste Full Stack Laravel</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/rockbuzz.png') }}"/>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background: #603cba;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog') }}">
            <img class="" src="{{ asset('assets/img/rockbuzz.ico') }}" style="border-radius: 20px;" width="30px" alt="">
            <span>Rock</span>
            <span class="font-weight-bold text-warning">buzz</span>
            | <span>Ricardo</span>
            <span class="font-weight-bold text-warning">Guntzell</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{ route('blog') }}">Blog
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white">Admin</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="app">

                <!-- Page Header -->
                <header class="masthead">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <div class="post-heading">
                                    <h1 class="text-capitalize">{{ $post->title }}</h1>
                                    <h2 class="subheading"></h2>
                                    <span class="meta">Posted by
                                      <a href="javascript:void(0);">{{ $post->userObject->name }}</a>
                                      on {{ date('d/m/Y H:i', strtotime($post->updated_at)) }}
                                    </span>

                                    <a class="text-warning" title="Edit"
                                       href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                        <i class="fas fa-edit fa-pull-right fa-2x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Post Content -->
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <p>{{ $post->body }}</p>

                                <a href="#">
                                    @php
                                        if (!is_null($post->cover) && !empty($post->cover)){
                                        $img = $post->cover;
                                        }else{
                                        $img = asset('assets/img/rockbuzz.png');
                                        }
                                    @endphp
                                    <img class="img-fluid" src="{{ $img }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <hr>

                <!-- Footer -->
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto p-1">
                                <ul class="list-inline text-center">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/agenciarockbuzz" target="_blank">
                                            <span class="fa-stack fa-lg">
                                              <i class="fas fa-circle fa-stack-2x"></i>
                                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://github.com/rockbuzz" target="_blank">
                                            <span class="fa-stack fa-lg">
                                              <i class="fas fa-circle fa-stack-2x"></i>
                                              <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://bitbucket.org/rockbuzz1" target="_blank">
                                            <span class="fa-stack fa-lg">
                                              <i class="fas fa-circle fa-stack-2x"></i>
                                              <i class="fab fa-bitbucket fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <p>
                                    <i class="fas fa-copyright"></i>
                                    by
                                    <span class="font-weight-bold text-dark">Rock</span>
                                    <span class="font-weight-bold text-warning">buzz</span>
                                    <img class="" src="{{ asset('assets/img/rockbuzz.ico') }}"
                                         style="border-radius: 20px;" width="30px" alt="">
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/libs.js') }}"></script>

</body>

</html>

