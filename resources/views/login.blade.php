<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - EDEXCEL</title>
    <link rel="shortcut icon" href="favicon.png" type="image/png" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
</head>
<body>
<main>
    <header class="d-flex align-items-end py-2">
        <a class="nav-link active px-3 fw-bold" aria-current="page" href="./hire_tutor.html"><i>&#8592; Hire Tutor</i></a>
        <a class="mx-auto" href="{{ route('home') }}"><img src="{{ asset('images/logo.png')}}" alt="EDEXCEL-logo" height="50px" /></a>

    </header>
    <section class="body">
        <div class="signin">
            <div class="body-2">
                <div class="data">
                    <b>Existing Member Login</b>
                    <div class="box">
                        <i class="fa-regular fa-envelope"></i><input type="email" placeholder="Enter Email" class="email" />
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-lock"></i><input type="passward" placeholder="Enter passward" class="passward" />
                    </div>
                    <div class="options">
                        <button>
                            <input type="radio" checked="checked" name="radio" /><strong>
                                Student</strong>
                        </button>
                        <button>
                            <input type="radio" checked="checked" name="radio" /><strong>
                                Tutor</strong>
                        </button>
                        <button>
                            <input type="radio" checked="checked" name="radio" /><strong>
                                Institute</strong>
                        </button>
                    </div>
                    <button class="signin-click fs-4 text-light">Login</button>
                    <a href="#" class="link pt-2">Forgot password</a>
                </div>
            </div>
        </div>

        <div class="signup">
            <div class="data">
                <b>New Member Sign Up</b>
                <a class="signup-click text-light bg-danger">
                    <img src="{{ asset('images/tutor.png') }}" alt="" /><strong>I Need A Tutor</strong></a>
                <a href="{{ route('signup') }}" class="signup-click text-light bg-primary">
                    <img src="{{asset('images/tutor2.png')}}"  alt="" /><strong>Sign Up As Tutor</strong></a>
                <a href="{{ route('signup') }}" class="signup-click text-light bg-success">
                    <img src="{{asset('images/institute.png')}}" alt="" /><strong>Signup As Institute</strong></a>
            </div>
        </div>
    </section>

    <!-- footer start -->
    

    <!-- footer end.. -->
</main>
</body>
    <footer>
     {{-- @include('layouts.footer') --}}
     </footer>
<script  src="js/app.js">
<script src="{{asset('js/inspect.js')}}"></script>
</html>
