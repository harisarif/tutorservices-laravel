
@extends('layouts.app')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
<style>
    :root {
    --primary-color:  #42b979;
    }
    .modalBox{
        display: none !important;
    }
    .email-container {
        position: relative;
        display: inline-block;
        cursor:pointer;
        padding: 8px 4px;
    }
    
    .email {
        display: none;
        position: absolute;
        left: -88px;
        top: 100%; /* Adjust as needed to position below the icon */
        white-space: nowrap;
        background-color: white; /* Optional: add a background color */
        padding: 5px; /* Optional: add some padding */
        border-radius: 3px; /* Optional: add rounded corners */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: add a shadow */
        z-index: 100;
    }

    .email-container:hover .email{
        display: inline-block;
    }
    .phone-container {
        position: relative;
        display: inline-block;
        cursor:pointer;
    }
    .phone-container i {
        font-size:15px;
    }
    .phone-number-header {
        display: none;
        position: absolute;
        left: -88px;
        top: 100%; /* Adjust as needed to position below the icon */
        white-space: nowrap;
        background-color: white; /* Optional: add a background color */
        padding: 5px; /* Optional: add some padding */
        border-radius: 3px; /* Optional: add rounded corners */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: add a shadow */
        z-index: 100;
    }

    .phone-container:hover .phone-number-header {
        display: inline-block;
    }
    .custom-select-wrapper {
        position: relative;
        display: flex;
        cursor: pointer;
    }

    .custom-select {
        cursor: pointer;
        /* display: flex;
        align-items: center; */
    }

    .custom-select i {
        font-size: 15px; /* Adjust icon size as needed */
        margin-right:-22px;
    }

    .custom-options {
        display: none;
        position: absolute;
        top: 100%;
        left: -30px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }
    .custom-options-web {
        display: none;
        position: absolute;
        top: 30px;
        left: -58px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .custom-options.open {
        display: block;
    }

    .custom-option {
        padding: 10px;
        cursor: pointer;
    }

    .custom-option:hover {
        background: #f0f0f0;
    }
    .custom-options-web.open {
        display: block;
    }
    #page-2 {
            height:300px;
            overflow-y:scroll;
        }
        /* Target the entire scrollbar */
            ::-webkit-scrollbar {
            width: 4px; /* Adjust the width */
            }

            /* Target the scrollbar track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Color of the track */
            }

            /* Target the scrollbar thumb */
            ::-webkit-scrollbar-thumb {
            background: #42b979; /* Color of the thumb */
            border-radius: 6px; /* Rounded corners */
            }

            /* Target the scrollbar thumb on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #42b979; /* Color when hovering */
            }
            .banner-heading-point, .p-h, .H-E, .hf{
                color: var(--primary-color); 
            }
            .fa-globe{
                color: #fff !important;
            }
            .main-footer{
                display: none !important;
            }
</style>
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
     <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 9;" onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
    <div class="row mini_header m-0 p-0 container-fluid position-relative">
        <div class="col-sm-12 px-3  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0 adjustMobile" style="background:#42b979;position:fixed !important;height:12%">
            <ul class="p-1 m-0 d-sm-inline d-block text-center header-ul pt-2">
                <li class=" p-0">
                     <a class="navbar-brand" href="{{ route('newhome') }}">
                        <img src="images/white-logo.jpeg" height="50px" alt="logo" style="height: 50px; border-radius: 10px; margin-top: 14px;">
                    </a>
                </li>
                <nav class="navbar navbar-expand-lg adjust-header-mobile">
                    <div class="container-fluid">
                        <!-- Button to trigger the off-canvas -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                                aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation" style="border:1px solid #fff;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Off-canvas component -->
                        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:100%;">
                            <div class="offcanvas-header p-1" style="width:96%;">
                                <a class="navbar-brand" href="{{ route('newhome') }}">
                                 <img src="images/white-logo.jpeg" height="50px" alt="logo" style="height: 50px; border-radius: 10px;">
                                </a>
                               
                            </div>
                            
                        </div>
                    </div>
                </nav>

                </ul>
               
            <div>
            <!-- <h1>{{ __('messages.welcome') }}</h1> -->
            

                <ul  class="icons d-flex p-2 m-0  align-items-center gap-3" style="list-style:none;">   
                <div class="d-flex  align-items: center;" style="justify-content: center;">
                        <div class="col-12 ">    
                            <li class="nav-item m-1 btn-an text-center rounded w-1 bg-white">
                                <a class="nav-link text-decoration-none solid_btn text-success p-1 " href="{{ route('logout') }}">{{__('messages.logout')}}</a>
                            </li>
                        </div>
                       
                    </div>
                <div class="d-flex align-items-center">
                    <div class="email-container">
                        <i class="fa fa-envelope-square" aria-hidden="true" style="color: #fff;"></i>
                        <a class="email text-decoration-none" href="mailto:info@eduexceledu.com" style="color: #42b979;">info@eduexceledu.com</a>
                    </div>
               
                    <div class=" p-2 header-phone-number phone-container">
                    
                        <i class="fa fa-phone " aria-hidden="true" style="color: #fff;"></i>
                        <a class="phone-number-header text-decoration-none " href="#" style="color: #42b979;"></a>
                    </div>
                    <div class="custom-select-wrapper">
                        @include('language')
                    </div>
                </div>
                    
                
                </ul>
                {{-- <a href="#" class="btn notify position-relative"><i class="fa-regular fa-bell text-white"></i><span class="position-absolute top-10 start-60 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span></a> --}}
            </div>
        </div>
    </div>


    <div class="wrapper mx-5">

    @include('whatsapp')

            <nav class="navbar navbar-expand-lg mt-5">

                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
            </nav>
            <section>
                <div class="row">
                    <div class="col-6 col-md-6 intro_lines mx-0 my-5">
                    @if(Auth::check())
                        <h1 class="banner-heading-point">{{ __('messages.Welcome') }}, {{ Auth::user()->name }}!</h1>
                        @endif
                        <p class="p-h">
                        {{__('messages.about_us')}}
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-6 d-flex justify-content-end my-4">
                        
                            <video src="images/banner-video.mp4" class="object-fit-cover" autoplay="" muted="" loop="" width="100%" style="width: 510px; "></video>
                        
                    </div>
                    
                </div>
            </section>
            <section>
                <div class="row g-3">
                        <h3 class="text-center H-E">{{ __('messages.Top Subjects & Programs') }}</h3>
                        <div class="col-4">
                           <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;"> <div class=" teacher-main-parent">
                                <div class="card h-100 teacher-card-wrapper border-0">
                                    <div class="card-div">
                                        <div class="hadding">
                                            <h3>{{ __('messages.Little Learners') }}</h3>
                                            <h4>{{ __('messages.KS1') }}</h4>
                                        </div>
                                        <div class="img-teacher">
                                            
                                            <div class="deatil">
                                                <h3>{{ __('messages.All Subject') }}</h3>
                                                <p>{{ __('messages.English,Math,phonics,science.') }}</p>
                                            </div>
                                            <div class="img-card">
                                                <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;">
                                <div class=" teacher-main-parent">
                                <div class="card h-100 teacher-card-wrapper border-0">
                                    <div class="card-div">
                                        <div class="hadding">
                                            <h3>Junior Journey</h3>
                                            <h4>KS1</h4>
                                        </div>
                                        <div class="img-teacher">
                                            
                                            <div class="deatil">
                                                <h3>All Subject</h3>
                                                <p>English,Math,phonics,science.</p>
                                            </div>
                                            <div class="img-card">
                                                <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                         <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;">
                            <div class=" teacher-main-parent">
                            <div class="card h-100 teacher-card-wrapper border-0">
                                <div class="card-div">
                                    <div class="hadding">
                                        <h3>Senior</h3>
                                        <h4>KS1</h4>
                                    </div>
                                    <div class="img-teacher">
                                        
                                        <div class="deatil">
                                            <h3>All Subject</h3>
                                            <p>English,Math,phonics,science.</p>
                                        </div>
                                        <div class="img-card">
                                            <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                         </a>    
                        </div>
                        <div class="col-4">
                         <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;">
                            <div class=" teacher-main-parent">
                            <div class="card h-100 teacher-card-wrapper border-0">
                                <div class="card-div">
                                    <div class="hadding">
                                        <h3>Curious Kids</h3>
                                        <h4>KS1</h4>
                                    </div>
                                    <div class="img-teacher">
                                        
                                        <div class="deatil">
                                            <h3>All Subject</h3>
                                            <p>English,Math,phonics,science.</p>
                                        </div>
                                        <div class="img-card">
                                            <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                         </a> 
                        </div>
                        <div class="col-4">
                         <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;">
                            <div class=" teacher-main-parent">
                            <div class="card h-100 teacher-card-wrapper border-0">
                                <div class="card-div">
                                    <div class="hadding">
                                        <h3>AGE 5-7</h3>
                                        <h4>KS1</h4>
                                    </div>
                                    <div class="img-teacher">
                                        
                                        <div class="deatil">
                                            <h3>All Subject</h3>
                                            <p>English,Math,phonics,science.</p>
                                        </div>
                                        <div class="img-card">
                                            <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-4">
                         <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;">
                            <div class=" teacher-main-parent">
                            <div class="card h-100 teacher-card-wrapper border-0">
                                <div class="card-div">
                                    <div class="hadding">
                                        <h3>AGE 5-7</h3>
                                        <h4>KS1</h4>
                                    </div>
                                    <div class="img-teacher">
                                        
                                        <div class="deatil">
                                            <h3>All Subject</h3>
                                            <p>English,Math,phonics,science.</p>
                                        </div>
                                        <div class="img-card">
                                            <img src="{{ asset('images/study-removebg-preview.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                           </a>  
                        </div>
                    </div>
            </section>


         </div>
    @endsection
    <script>
    function toggleDropdownWeb() {
        document.querySelector('.custom-options-web').classList.toggle('open');
    }
    function changeLanguageWeb(value) {
        document.querySelector('.custom-options-web').classList.remove('open');
    }
    function changeLanguage(locale) {
        console.log(locale)
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
    function toggleDropdown() {
        document.querySelector('.custom-options').classList.toggle('open');
    }

    function changeLanguage(value) {
        document.querySelector('.custom-options').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select')) {
            document.querySelector('.custom-options').classList.remove('open');
        }
    });
    function toggleDropdownWeb() {
        document.querySelector('.custom-options-web').classList.toggle('open');
    }

    function changeLanguageWeb(value) {
        document.querySelector('.custom-options-web').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select-web')) {
            document.querySelector('.custom-options-web').classList.remove('open');
        }
    });
    function changeLanguage(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
    function changeLanguageWeb(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
</script> <!-- Select2 JS -->
<script src="{{asset('js/inspect.js')}}"></script>