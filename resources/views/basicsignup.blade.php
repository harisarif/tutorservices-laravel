@extends('layouts.app')
<head>
    <style>
        .modalBox{
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/sign-up.css')}}">
</head>
@section('content')
<body>
<main>
            <button id="goToTop" class="goToTop fw-20px" onclick="window.scrollTo(0, 0)">
                <i class="fa fa-chevron-up"></i>
            </button>
    <header class="main_header d-flex  align-items-center" style="background: #42b979;">
        <a class="nav-link active px-3 py-0 fw-bold d-flex " style=" color: #fff; flex-shrink: 0; transition: 0.5s;" aria-current="page" href="{{ route('hire.tutor') }}"><i>&#8592; <b>Hire Tutor</b></i></a>

        <a class="mx-auto" href="{{ route('newhome') }}">
            <img src="{{ asset('images/white-logo.jpeg') }}" alt="Edexcel-logo" style="height: 100px; border-radius: 60px;width:100px;">
        </a>

    </header>
    
    <section class="inner">
    @include('whatsapp')
        <h1>Let's get started!</h1>
        <div class="inner_wrapper">
            <div class="signup_holder">
                <div class="icon_holder">
                    <img src="{{asset('images/student_parent_normal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/student_parent_active.png')}}" alt="" class="active">
                </div>
                <h4>Students & Parents</h4>
                <p class="para">Discover amazing teachers, post tuition jobs, take enriching courses</p>
                <a href="{{ route('hire.tutor') }}" class="signup_typ">Find a Great Teacher</a>
            </div>
            <div class="signup_holder">
                <div class="icon_holder">
                    <img src="{{asset('images/ttnormal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/tt_active.png')}}" alt="" class="active">
                </div>
                <h4>Tutors & Trainers</h4>
                <p>Find tuition jobs, build your teaching career, teach online courses</p>
                
                <a href="{{route('tutor')}}" class="signup_typ" style=" margin-top: 4rem;">Sign Up</a>
            </div>
            <div class="signup_holder d-none">
                <div class="icon_holder">
                    <img src="{{asset('images/center_normal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/center_active.png')}}" alt="" class="active">
                </div>
                <h4>Centers & Training Institutes</h4>
                <p>Get students, sell your courses, launch online tutoring, grow your business</p>
                <a href="{{route('tutor')}}" class="signup_typ ">Sign Up</a>

                <!-- <a href="#" class="signup_typ" style="background-color: #ddd; color: #999; border: 0;">Sign Up</a> -->
            </div>

        </div>
        <div class="login">
            <a href="{{route('login')}}" class="login_typ">Already Have an Account? <span>SIGN IN</span></a>
        </div>
    </section>
    
    <footer class="d-none row text-center text-lg-start justify-content-center m-0 p-0">
        
        <div class="col-12 footer-bottom border-top">
            <ul class="p-3 text-center">
                <li class="d-inline text-light">© Copyright 2024.</li>
                <li class="d-inline text-light">All Rights Reserved.</li>        
                <li class="d-inline text-light">|</li>
                <li class="d-inline text-light">Managed by</li>
                <li class="d-inline">
                    <a class="text-decoration-none text-light" href="https://techtrack.online/">Techtrack</a>
                </li>
            
                
            </ul>
        </div>
    </footer>
</main>
</body>
</html>
@endsection
<script>
    window.onscroll = function() {
            const goToTopBtn = document.getElementById("goToTop");

            // Show the button after scrolling down 200px
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                goToTopBtn.style.display = "block";
            } else {
                goToTopBtn.style.display = "none";
            }
        };
</script>    <!-- Select2 JS -->
<script src="{{asset('js/inspect.js')}}"></script>