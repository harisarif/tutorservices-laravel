@extends('layouts.app')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQKNqXr5pOFbMxuL5GpU3QK8EoB1RaOYohcB1QZ6J71/2+UM1NFOG2HIl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/tutor-style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mediaquery.css')}}">
<style>
    .img-fluid1 {
    max-width: 16px;
    height: auto;
}
    .read li a {
    color: #42b979;
}
    .sd{
        color: #42b979;  
    }
    .on{
        color: #42b979;
    }
    .btn1{
    background-color: #42b979;
    padding: 12px 13px;
    width: 100%;
    border: none;
}
    /* Overlay Styles */
    .overlay {
        position: fixed; /* Fixed positioning */
        top: 0;          /* Cover the whole viewport */
        left: 0;
        width: 100%;     /* Full width */
        height: 100%;    /* Full height */
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        display: flex;   /* Flexbox to center the spinner */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        z-index: 1000;   /* High z-index to overlay on top */
    }

    /* Spinner Styles (Bootstrap) */
    .spinner-border {
        width: 3rem;    /* Spinner size */
        height: 3rem;
        color:#42b979 !important
    }

    .fa-globe{
        color: #fff !important;
    }
    body{
        overflow-x: hidden !important;
    }
    #country span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }
    @media (max-width: 1514px){
        .img-reqire{
            height: 608px !important;
        }
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
    .custom-alert {
    position: fixed;
    top: 60px;
    right: 10px;
    background-color: #d4edda;
    color: #42b979;
    padding: 15px 20px;
    border-radius: 8px;
    border-left: 5px solid #42b979;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
    min-width: 250px;
    z-index: 1050;display: block !important;
    opacity: 1 !important;
    visibility: visible !important;
    transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
}

.custom-alert .close-btn {
    background: none;
    border: none;
    font-size: 16px;
    font-weight: bold;
    color:#42b979;
    cursor: pointer;
    float: right;
    margin-left: 10px;
}

.custom-alert .close-btn:hover {
    color: #42b979;
}

.fade-out {
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.5s ease, transform 0.3s ease-in-out;
    pointer-events: none; /* Prevent interaction when faded */
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

    .card{
        transition: 0.5s;
    }
    .card:hover{
        transform: scale(1.1);
        cursor: pointer;
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
        
    .progress-line {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 4px;
    background: #42b979;
    transition: width 5s linear;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #42b979;
        border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #42b979;
    }

    .alert {
        display: flex !important;
        align-items: center;
        font-size: 14px !important;
    }

           
          
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div id="success" class="custom-alert alert-success d-flex align-items-center fade show" role="alert">
    <i class="fas fa-check-circle"></i>
    <div>
        <strong>Success!</strong> {{ session('success') }}
    </div>
    <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
        &times;
    </button>
    <div class="progress-line"></div>
</div>
@endif

@if (session('error'))
<div id="error" class="alert alert-danger" style="z-index: 6; padding: 14px !important;">
    {{ session('error') }}
    <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
    <div class="progress-line"></div>
</div>
@endif

    <div id="overlay" class="overlay" style="display: none;">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
        <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 9;" onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
    <div class="row mini_header m-0 p-0 container-fluid position-relative">
        <div class="col-sm-12 px-3  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0 adjustMobile" style="background:#42b979;position:fixed !important;height:12%">
            <ul class="p-1 m-0 d-sm-inline d-block text-center header-ul pt-2">
                <li class=" p-0">
                     <a class="navbar-brand" href="{{ route('newhome') }}">
                        <img src="images/white-logo.jpeg" height="50px" alt="logo" style="height: 50px; border-radius: 10px;">
                    </a>
                </li>
                <nav class="navbar navbar-expand-lg adjust-header-mobile">
                    <div class="container-fluid">
                        <!-- Button to trigger the off-canvas -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                                aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation" style="border:1px solid #fff;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="custom-select-wrapper mx-1">
                        <div class="custom-select">
                               <i class="fa fa-globe" style="color:#fff !important" aria-hidden="true" onclick="toggleDropdown()"></i>
                           <div class="custom-options" id="language-select">
                              <div class="custom-option " data-value="en" onclick="changeLanguage('en')">English</div>
                              <div class="custom-option" data-value="ar" onclick="changeLanguage('ar')">Arabic</div>
                            
                            </div>
                        </div>
                         </div>
                        <!-- Off-canvas component -->
                        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:100%;">
                            <div class="offcanvas-header p-1" style="width:96%;">
                                <a class="navbar-brand" href="{{ route('newhome') }}">
                                 <img src="images/white-logo.jpeg" height="50px" alt="logo" style="height: 50px; border-radius: 10px;">
                                </a>
                                <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-2 px-3">
                                <ul class="navbar-nav align-items-md-center">
                                    <div class="ai-nav">
                                        <div class="AI">    
                                            <li class="nav-item m-1 rounded w-1 py-0">
                                                <a class="nav-link text-decoration-none solid_btn p-0 " href="{{ route('login') }}">
                                                    <i class="fas fa-sign-in-alt"></i><span style="margin-left:5px;"> {{ __('messages.login') }}</span>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="AI">
                                            <li class="nav-item m-1 rounded w-1 py-0">
                                                <a class="nav-link text-decoration-none solid_btn p-0" href="{{ route('basicsignup') }}">
                                                    <i class="fa-regular fa-clipboard"></i> <span class="mx-2">{{ __('messages.register') }}</span>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="email-container mx-0 ">
                                            <i class="fa fa-envelope-square" aria-hidden="true" style="color: #42b979;"></i>
                                            <a class="email text-decoration-none mx-2" href="mailto:info@eduexceledu.com " style="color: #42b979;">
                                                info@eduexceledu.com
                                            </a>
                                        </div>
                                        <div class="d-flex alig header-phone-number phone-container mx-0" style="align-items: center;">
                                            <i class="fa-solid fa-phone" aria-hidden="true" style="color: #42b979;"></i>
                                            <a class="phone-number-header text-decoration-none mx-2" href="tel:+971566428066" style="color: #42b979;">
                                                +971 56 642 8066
                                            </a>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                </ul>
                <a href="{{ route('hire.tutor') }}" class="hiring-button">
                    {{ __('messages.Book a free demo for your child') }}
                </a>
            <div>
            <!-- <h1>{{ __('messages.welcome') }}</h1> -->
            

                <ul  class="icons d-flex p-2 m-0  align-items-center gap-3" style="list-style:none;">   
                <div class="d-flex  align-items: center;" style="justify-content: center;">
                        <div class="col-6 ">    
                            <li class="nav-item m-1 btn-an text-center bg-white rounded w-1 py-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('login') }}" style="color:#42b979;">{{__('messages.login')}}</a>
                            </li>
                        </div>
                        <div class="col-6 ">
                            <li class="nav-item m-1 btn-an text-center  bg-white rounded w-1 py-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('basicsignup') }}" style="color:#42b979;">{{__('messages.register')}}</a>
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
                        <a class="phone-number-header text-decoration-none " href="tel:+971566428066" style="color: #42b979;">+971 56 642 8066</a>
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
        <!-- <div class="notification mb-2 w-25 p-2 bg-info-subtle position-absolute end-0 top-100 z-1">This is a demo</div> -->
    </div>
    <section class="banner-section" style="background-image: url(images/group-of-kids.jpg); background-size: cover; background-blend-mode: multiply; background-color: #a5a5a5;">
                <div class="banner-content">
                    <h1 class="aa fs-2" style="margin-top:10rem;" > {{ __('messages.Edexcel Academically with tailored tutoring and professional guidance') }}</h1>
                </div>
                {{-- <button class="p-2  btn-an rounded border-0 text-light">
                        Student
                    </button> --}}
                   <div class="AB mt-5">
                        <button class="ab  p-2  btn-an rounded border-0 text-success hover-button" style=" white-space: nowrap;">
                            <a class=" text-decoration-none active solid_btn" aria-current="page"
                            href="{{ route('hire.tutor') }}">{{ __('messages.Request A Tutor') }} </a>

                    </button>
                   </div>
    </section>
    <div class="wrapper mx-5">
            <!-- WhatsApp Button html start -->
            @include('whatsapp')

                    <section class="row justify-content-center mx-0">
                        <div class="ad-headin-div mt-2">
                            <h2 style="text-align: center; color: #42b979; font-weight: 600;">{{ __('messages.Data Insights') }}</h2>
                        </div>
                        <div class="row mb-3">
                                <div class="col-xl-3 col-sm-6 col-12 my-3">
                                    <div class="MH card" >
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media d-flex" style=" justify-content: space-between;">
                                            <div class="media-body text-left counter">
                                            <h3 class="danger"  id="teacher-count">500+</h3>
                                            <span>{{ __('messages.Teachers') }}</span>
                                            </div>
                                            <div class="align-self-center animated-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40"   height="64" fill="#42b979">
                                            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-2.67 0-8 1.337-8 4v3h16v-3c0-2.663-5.33-4-8-4zm-8 6v-1c0-1.721 3.468-3 8-3s8 1.279 8 3v1H4z"/>
                                            </svg>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 my-3">
                                    <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media d-flex" style=" justify-content: space-between;">
                                            <div class="media-body text-left counter">
                                            
                                            <h3 class="success" id="count">1000+</h3>
                                            <span>{{ __('messages.Students') }}</span>
                                            </div>
                                            <div class="align-self-center animated-icons">
                                            <svg width="40" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="32" cy="20" r="12" fill="#42b979"/>
                                                <path d="M32 36C22 36 14 44 14 54H50C50 44 42 36 32 36Z" fill="#42b979"/>
                                                <path d="M32 4L14 14L32 24L50 14L32 4Z" fill="#42b979"/>
                                            </svg>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            
                                <div class="col-xl-3 col-sm-6 col-12 my-3">
                                    <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media d-flex" style=" justify-content: space-between;">
                                            <div class="media-body text-left counter">
                                            <h3 class="warning"  id="subject-count">1500+</h3>
                                            <span>{{ __('messages.Subjects') }}</span>
                                            </div>
                                            <div class="align-self-center animated-icons">
                                            <i class="fa-solid fa-book-open " style="color:#42b979; font-size:25px;"></i>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6 col-12 my-3">
                                    <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media d-flex " style=" justify-content: space-between;">
                                            <div class="media-body text-left counter">
                                            <h3 class="danger" id="lang-count">500+</h3>
                                            <span >{{ __('messages.Languages') }}</span>
                                            </div>
                                            <div class="align-self-center animated-icons">
                                            <i class="fas fa-globe" aria-hidden="true" style="font-size: 25px;"></i>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
            
                        </div>
                    </section>
                    <section class="AD-teacher" style="overflow-x:hidden;">
                        <div class="ae-heading my-4">
                            <h2 class="text-center fw-bold ">{{ __('messages.Discover Your Tutor') }}</h2>
                        </div>
                        <div class="row justify-content-center px-0 mx-0">
                        
                        
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between ad-border-div">
                                    <div class="mx-2">
                                        <p class="m-0 pt-1 tutors-range">
                                            @if($totalTutorsCount == 0 || $tutors->isEmpty())
                                                0 of 0 tutors
                                            @else
                                                {{ $tutors->firstItem() }} to {{ $tutors->lastItem() }} of {{ $totalTutorsCount }} tutors
                                            @endif
                                        </p>
                                        
                                    </div>
                                    <div class="my-2 mx-2">
                                        <button id="resetFilterBtn" class="ad-btn-reset">{{ __('messages.Reset Filter') }}</button>
            
                                    </div>
                                    
                                </div>
                                <div class="ad-border-filters" >
                                    
                                        <div class="row  country-row">
                                            <div class="col-lg-3 country-drop-down" >

                                                <select name="country" id="country" class="country" >
                                                    <option value="all">{{ __('messages.Please select a country') }}</option>

                                                    @foreach($countries as $countryCode => $countryName)
                                                        <option value="{{ $countryCode }}">{{ $countryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-9 adjust-filters-wrap ">
                                                <div class="col-md-6 px-2 col-lg-4">
                                                        <select name="gender" id="gender" class="country" >
                                                            <option value="all">{{ __('messages.Gender Selection') }}</option>
                                                            <option value="Male">{{ __('Male') }}</option>
                                                            <option value="female">{{ __('Female') }}</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6 px-2 col-lg-4">
                                                        <select name="subjectSearch" id="subjectSearch" class="country" >
                                                            <option value="all">{{ __('messages.Which Subject Interests You?') }}</option>
                                                           
                                                    @foreach($subjectsTeach as $subjectsCode => $subjects)
                                                        <option value="{{ $subjectsCode }}">{{ $subjects }}</option>
                                                    @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-md-6 px-2 col-lg-4">
                                                    {{-- <label for="citysearch" class="form-label">City</label> --}}
                                                        <select name="prize-Range" id="prize-Range" class="country" >
                                                            <option value="all">{{ __('messages.Price Selection') }}</option>
                                                            
                                                        </select>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                <!-- Tutor profile -->
                                @if ($tutors->count() > 0)
                                <div id="tutorsContainer">
                                    @foreach ($tutors as $item)
                                        @if($item->status != 'inactive')
                                          
                                             <div class="ad-form"><div class="container-fluid pt-2 px-0">
                                                
                                             <div class="recomended-badge mb-1" data-toggle="tooltip" data-placement="top" title="{{ $item->f_name ?? 'Nullable' }}  {{ $item->l_name ?? 'Nullable' }}" style="float: right;">
                                                    <span class="badge badge-primary">Recomended</span>
                                            </div>
                                                <div class="row ">
                                                    <div class="col-xl-12 col-lg-12">
                                                        <div class="row py-4" style="margin: 0 auto;">
                                                            <div class="col-md-3">
                                                                <div id="waste1">
                                                                    <div class="img-wrapper trigger-modal" id="triggerImage">
                                                                        @if (  $item->profileImage) 
                                                                                <img src="{{ asset('storage/' . $item->profileImage) }}"
                                                                                    alt="Tutor Image" class="img-thumbnail" id="profileImages"
                                                                                    style="height: 150px; width: 100%">
                                                                            @else
                                                                                <img src="{{ asset('images/avatar.png') }}" 
                                                                                    alt="Default Image" class="img-thumbnail"
                                                                                    style="height: 150px; width: 100%;">
                                                                            @endif
                                                                           
                                                                    </div>
                                                                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg" id="pro1">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header"style="background-color: #1cc88a;">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(2);"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Video Embed -->
                                                                                    <video controls height="250px" width="100%">
                                                                                        <source src="{{ asset('/' . $item->video) }}" type="video/mp4">
                                                                                        Your browser does not support the video tag.
                                                                                    </video>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-4" id="waste" style="display: none;margin: 0 auto;     margin-top: 20px;">
                                                                        <div class="d-flex">
                                                                            <h4 class="me-2 fw-bold">{{ $item->f_name ?? 'Nullable' }}{{ $item->l_name ?? 'Nullable' }}</h4>
                                                                            <span class="me-3"><i class="fa-regular fa-star"></i></span>
                                                                            <div class="img-wrapper1"  style="max-width: 15px;     margin-top: 3px;">
                                                                                <img src="{{ asset('image/flag.svg') }}" class="img-fluid1" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex mt-md-5 mt-2" id="for-320">
                                                                            <div class="me-md-5 me-3" id="new">
                                                                                <div class="d-flex text-center">
                                                                                    <span class=""><i class="fa-regular fa-star text-warning"></i></span>
                                                                                    <h4 class="fw-bold mb-0">5</h4>
                                                                                </div>
                                                                                <p class="text-secondary fs-6">{{ $item->avalibility_status ?? 'Nullable' }}</p>
                                                                            </div>
                                                                            <div class="me-md-5 me-2" id="dollar">
                                                                                <h4 class="fw-bold mb-0">US$16</h4>
                                                                                <p class="text-secondary fs-6 " style="text-align: center;">{{ $item->year ?? 'Nullable' }}</p>
                                                                            </div>
                                                                            <div>
                                                                                <span><i class="fa-regular fa-heart"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="d-flex" id="ff000">
                                                                    <h4 class="me-2 fw-bold sd">{{ $item->f_name ?? 'Nullable' }}</h4>
                                                                    <span class="me-3"><i class="fa-regular fa-star "></i></span>
                                                                    <div class="img-wrapper" style="max-width:15px;margin-top:5px;">
                                                                        <img src="{{ asset('image/flag.svg') }}" class="img-fluid" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="mt-1 cm">
                                                                    @foreach($item->specialization as $specialization)   
                                                                        <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold"> 
                                                                            <i class="fa-solid fa-briefcase me-1"></i> {{ trim($specialization) }}  
                                                                        </span>
                                                                    @endforeach
                                                                </div>
                                                                
                                                                <div class="d-flex text-secondary my-1">
                                                                    <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">{{ $item->gender ?? 'Nullable' }}</p>
                                                                </div>
                                                                
                                                                <div class="d-flex text-secondary">
                                                                    <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                    <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">{{ $item->country_name ?? 'Nullable' }}</p>
                                                                </div>
                                                                
                                                                <div class="d-flex text-secondary py-2">
                                                                    <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                        Speaks 
                                                                        @if(!empty($item->language) && is_array($item->language))
                                                                            @foreach($item->language as $lang)
                                                                                {{ $lang['language'] ?? 'Unknown' }} ({{ $lang['level'] ?? 'Unknown' }})
                                                                            @endforeach
                                                                        @else
                                                                            Nullable
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                
                                                                <!--  -->
                                                                <span class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                {{ $item->dob ?? 'Nullable' }}</span>
                                                                <!--  -->
                                                                <div class="py-2">
                                                                    <span>
                                                                        <b>{{ $item->experience ?? 'Nullable' }}+ Years of {{ collect($item->specialization)->first() ?? 'Not Specified' }} Teaching Experience: Your {{ implode(', ', $item->specialization ?? ['Not Specified']) }} Success, Guaranteed.</b> 

                                                                        - Hello, my name is {{ $item->f_name ?? 'Not Specified' }}. I have {{ $item->experience ?? 'Nullable' }}+ years of experience as a {{ collect($item->specialization)->first() ?? 'Not Specified' }} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                    <ul class="read p-0 mt-3">
                                                                        <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="d-flex pb-5" id="ff111">
                                                                    <div class="me-lg-5 me-3" id="dollar">
                                                                        <h4 class="fw-bold on">{{ $item->price ?? 'Nullable' }}</h4>
                                                                        <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                        {{ $item->dob ?? 'Nullable' }}</p> -->
                                                                    </div>
                                                                    <!-- <div id="heart-icon">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </div> -->
                                                                </div>
                                                                <div>
                                                                    <div id="btn-container">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                <div class="mt-2" id="btn-container">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Send Massage</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div> 
                                        
                                                {{-- <div class="ad-img-card d-flex"> --}}
                                                    {{-- <div class="tutor-profile" style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                                                        
                                                               Tutor Image 
                                                        @if (!empty(trim($item->profileImages)))
                                                        <img src="{{ asset($item->profileImages) }}"
                                                             alt="Tutor Image" class="img-thumbnail"
                                                             style="max-width: 100px; height: 100px; width: 100px; border-radius: 70px;">
                                                    @else
                                                        <img src="{{ asset('images/avatar.png') }}" 
                                                             alt="Default Image" class="img-thumbnail"
                                                             style="max-width: 100px; height: 100px; width: 100px; border-radius: 70px;">
                                                    @endif
                                                    
                            
                                                         Tutor Rating 
                                                        <p class="mb-0 mx-1 fs-5" style="color:#42b979;">4.5 <i class="fa-solid fa-star"></i></p>
                                                    </div>
                            
                                                    <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                                        <span class="mb-div"><b>{{ __('messages.20 AED for 50 minutes') }}</b></span>
                                                        <div class="ae-detail">
                                                            <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('messages.Free Trial Section') }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                <div class="ad-detail my-1 mx-4 w-100">
                                                    <div class="ae-div row">
                                                        <div class="col-9">
                                                            <div class="ae-detail-div">
                                                                <span><i class="fa-solid fa-graduation-cap"></i>
                                                                    <strong style="margin-left: 11px;">{{ __('Name') }} :</strong> {{ $item->f_name }}</span>
                            
                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong>{{ __('Date') }} :</strong> {{ $item->dob ?? 'Nullable' }}</span>
                            
                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong style="margin-left: 7px;">{{ __('Language') }} :</strong> 
                                                                    @if(!empty($item->language) && is_array($item->language))
                                                                        @foreach($item->language as $lang)
                                                                            {{ $lang['language'] ?? 'Unknown' }} ({{ $lang['level'] ?? 'Unknown' }})
                                                                        @endforeach
                                                                    @else
                                                                        Nullable
                                                                    @endif
                                                                </span>
                            
                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong>{{ __('Phone') }} :</strong> {{ $item->phone ?? 'Nullable' }}</span> 
                            
                                                                 **Subjects Logic** 
                                                                                   <span>
    <i class="fa fa-globe" style="color: #42b979 !important;"></i>
    <strong>{{ __('Specialization') }}:</strong> 
    {{ $item->specialization ?? 'Not Specified' }}
</span>

                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong>{{ __('Experience') }} :</strong> {{ $item->experience ?? 'Nullable' }} years</span>
                            
                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong>{{ __('messages.Country') }} :</strong> {{ $item->country_name ?? 'Nullable' }}</span>
                            
                                                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                                    <strong>{{ __('University') }} :</strong> {{ $item->location ?? 'Nullable' }}</span>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-3 ad-div">
                                                            <span><b>{{ __('messages.20 AED for 50 minutes') }}</b></span>
                                                            <div class="ae-detail">
                                                                <h4 class="fs-6 mt-1" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    {{ __('messages.Free Trial Section') }}
                                                                </h4>
                                                            </div>
                                                        </div>--}}
                                                    {{-- </div>  --}}
                                                {{-- </div> --}}
                                            </div>
                                        
                                      
                                            <div class="d-none tutor_profile rounded overflow-hidden mb-3 mt-3">
                                                <div class="d-flex justify-content-between">
                                                    <button class="p-1 bg_theme_green text-light border border-0" style="display:none;">
                                                        Sponsored
                                                    </button>
                                                    <span class="p-1 text-secondary">
                                                        <i class="fa fa-bookmark text-body-tertiary"></i>
                                                        Watchlist
                                                    </span>
                                                </div>

                                                <div class="py-2 px-5">
                                                    <div class="row d-flex">
                                                        <div
                                                            class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">
                                                            <div class="imgBox col-sm-4 d-grid mx-3">
                                                                <img class="img-1 rounded-circle"
                                                                    src="{{ asset('storage/' . $item->profileImage) }}"
                                                                    alt="" />
                                                                <p class="d-flex align-items-center m-auto">
                                                                    Verified
                                                                    <span
                                                                        class="mx-1 varified bg-primary rounded-circle text-light"><i
                                                                            class="fa fa-check"></i></span>
                                                                </p>
                                                            </div>
                                                            <div class="personal_detail text-center text-md-start">
                                                                <!-- <div> -->

                                                                <h5>{{ $item->f_name }} {{$item->l_name}}</h5>
                                                                <span>{{ $item->gender }}
                                                                    @if ( $item->experience >= 1 )
                                                                        <span style="background-color: red"
                                                                        class="text-light font-s px-1">Pro</span></span>
                                                                    @endif
                                                                <p class="m-0">{{ $item->experience }} 
                                                                    @if ( $item->experience > 1 )
                                                                    years
                                                                    @else
                                                                    year
                                                                @endif of teaching
                                                                    experience</p>
                                                                <!-- stars -->
                                                                <span
                                                                    class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                                <p class="text-danger m-0">( 10 reviews )</p>
                                                                <!-- </div> -->
                                                            </div>
                                                        </div>

                                                        <div class="qualification col-lg-6">
                                                            <div class="row p-0">
                                                                <table class="col-12">
                                                                    <tr class="title-1 col col-md-3">
                                                                        <td class="text-dark fw-bold font-s">Qualification</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->qualification }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="title-1 col col-md-3">
                                                                        <td class="font-s text-dark fw-bold">Country</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->location }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="title-1 col col-md-3">
                                                                        <td class="font-s text-dark fw-bold">City</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->city }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="title-1 col col-md-3" style="display:none;">
                                                                        <td class="font-s text-dark fw-bold">Mobile</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->phone }}
                                                                            <button
                                                                                class="text-success bg-transparent fw-bold border-0">
                                                                                view contact
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="title-1 col col-md-3" style="display:none;">
                                                                        <td class="font-s fw-bold">WhatsApp</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->whatsapp }}
                                                                            <button
                                                                                class="text-success bg-transparent fw-bold border-0">
                                                                                view contact
                                                                            </button>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="title-1 col col-md-3">
                                                                        <td class="font-s fw-bold">Availability</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->availability }}

                                                                        </td>
                                                                    </tr>

                                                                    <tr class="title-1 col col-md-3">
                                                                        <td class="font-s fw-bold">Date of Birth</td>
                                                                        <td class="d-none d-md-block px-2">:</td>
                                                                        <td class="font-s text-secondary">
                                                                            {{ $item->dob }}

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div
                                                            class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">
                                                            <div class="option d-flex align-items-start py-1">
                                                                <h5
                                                                    class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
                                                                    Teaches
                                                                </h5>
                                                                <span class="d-none d-sm-block">:</span>
                                                            </div>

                                                            <div class="d-flex flex-column flex-md-row flex-wrap">

                                                                {{-- @php
                                                                    // Assuming $item->teaching is a JSON string
                                                                    // Serialized string
                                                                    $serializedData = $item->teaching;

                                                                    // Convert the serialized string to an array
                                                                    $arrayData = unserialize($serializedData);
                                                                @endphp
                                                                @foreach ($arrayData as $teaching)
                                                                    <span
                                                                        class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">{{ $teaching }}</span>
                                                                @endforeach --}}


                                                                <button class="m-1 text-danger border-0 bg-transparent">
                                                                    +1 more
                                                                </button>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <div class="d-flex flex-column flex-lg-row mt-5 py-1 bd_top_dashed">
                                                        <div
                                                            class="d-flex align-items-center flex-column flex-sm-row justify-content-between">
                                                            <span class="d-flex align-items-center px-2 py-2">
                                                                Expand
                                                                <i class="fa fa-chevron-down mx-1" aria-hidden="true"></i>
                                                            </span>

                                                            <div class="d-flex">
                                                                <p
                                                                    class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                                    <i class="fa fa-mobile"></i>
                                                                </p>

                                                                <p
                                                                    class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                                    <i class="fas fa-envelope"></i>
                                                                </p>

                                                                <p
                                                                    class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                                    <i class="fas fa-location"></i>
                                                                </p>

                                                                <p
                                                                    class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                                    <i class="fas fa-certificate"></i>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="col d-flex align-items-center justify-content-center justify-content-lg-end flex-column flex-sm-row py-2">
                                                            <a class="text-success text-decoration-none text-center px-2 py-2"
                                                                href="#">Request a callback</a>
                                                            <button class="bg_theme_green border border-0 text-light rounded p-2">
                                                                Send Message
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        @endif
                                        @endforeach
                                    </div>
                                    <!-- Display pagination links -->
                                    <div id="paginationContainer">
                                        {{ $tutors->links('custom-pagination') }}
                                    </div>
                                    <!-- tutor profile end -->
                                @else
                                    <p>No tutors found.</p>
                                @endif

                                <!-- Here is form -->
                    
                                <!-- end job section  -->
                                

                                <!-- form end -->
                            </div>
                            @if (App::getLocale() === 'en') 
                                <div class="col col-lg-3 my-0 p-0">
                                    <video src="{{ asset('images/video.mp4') }}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                                </div>
                            @elseif (App::getLocale() === 'ar')
                                <div class="col col-lg-3 my-0 p-0">
                                    <video src="{{ asset('videos/arabic.mp4') }}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                                </div>
                            @elseif (App::getLocale() === 'rs')
                                <div class="col col-lg-3 my-0 p-0">
                                    <video src="{{ asset('videos/russian.mp4') }}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                                </div>
                            @elseif (App::getLocale() === 'zh')
                                <div class="col col-lg-3 my-0 p-0">
                                    <video src="{{ asset('videos/chinese.mp4') }}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                                </div>
                            @else
                                <!-- Default or fallback video in case no matching locale is found -->
                                <!-- <div class="col col-lg-3 my-0 p-0">
                                    <video src="{{ asset('videos/default.mp4') }}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                                </div> -->
                            @endif

                        </div>
                    </section>
            
                    <div class="ai-heading-div py-2">
                        <h2 class="text-center  fw-bold" >{{ __('messages.Inquiry Overview') }}</h2>
                    </div>
                    <div class="im row mx-0">
                        <div class=" Ai col-5 " >
                            <form method="POST" action="{{ route('inquiry-create') }}">
                                @csrf
                                <div class=" mt-3 mb-5 " >
                                    <div class="ai-card px-3 py-4" style="border: 1px solid #ddd; border-radius: 5px;">
                                        <div class="card-body">
                                                <h6 class="card-title mb-3 text-center fw-bold fs-6 ">{{ __('messages.Submit your inquiry to request a callback for further assistance') }}</h6> 
                                                <h3 class="Ab-heading fw-bold text-center" style="font-size: 15px;color: red;"><i>"{{ __('messages.Please Complete All Required Fields') }}"</i></h3>
                                            
                        
                                            <div class="row g-0">
                                                    <div class="col-sm-12">
                                                        <div class="form-group p-2 px-0">
                                                            <label for="curriculum" class="form-label" style="color:#42b979;"><strong>{{ __('messages.Enter your Name') }} <b style="color: red;font-size: 20px;">*</b></strong></label>
                                                            <input name="fname" class="form-control" type="text" placeholder="{{ __('messages.Name') }}">
                                                        </div>      
                                                </div>
                                                <div class="col-sm-12">
                                                        <div class="form-group p-2 px-0">
                                                        <label for="curriculum" class="form-label" style="color:#42b979;"><strong>{{ __('messages.Enter your   Email') }} <b style="color: red; font-size: 20px;">*</b></strong></label>
                                                        <div class="input-group"> <input name="email"  class="form-control" type="text" placeholder="{{ __('messages.Email ID') }}"></div>
                                                        </div>
                                                        </div>
                                                </div>  
                                                <div class="col-sm-12">
                                                    <div class="form-group p-2 px-0">
                                                    <label for="curriculum" class="form-label" style="color:#42b979;">
                                                        <strong>{{ __('messages.Enter your Number ') }}<b style="color: red; font-size: 20px;">*</b></strong>
                                                    </label>
                                                    <div class="inquiry-select input-group d-flex justify-content-between align-items-center" style="width: 100%;">
                                                                
                                                                <select name="countrySelect" id="countrySelect" class="form-select country-select w-50" required>
                                                                    @foreach ($countriesPhone as $key => $country)
                                                                        <option value="{{ $key }}">{{ $country }}</option>
                                                                    @endforeach
                                                                </select>
                                                            
                                                                <input  class="form-control w-50" required name="phone" id="phone" type="text" placeholder="e.g +92XXXXXXXXXX" style="border: 1px solid #ddd; height: 50px; box-shadow: none;">
                                                            </div>
                                                            <div class="col-12  py-2">
                                                                <label for="curriculum" class="form-label" style="color:#42b979;">
                                                                    <strong>{{ __('messages.Description (Optional)') }}  <b style="color: red; font-size: 20px;">*</b>
                                                                    </strong>
                                                                </label>
                                                                <textarea class="form-control" id="curriculum" name="description" rows="2" placeholder="{{ __('messages.Description') }}" style="box-shadow: none;border: 1px solid #ddd;"></textarea>
                                                            </div>
                                                </div>
                                                
                                            </div>
                                        
                                           <button type="submit" class="AB-button btn btn-success btn-block confirm-button mt-4">{{ __('messages.Confirm') }}</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="col-7 img-reqire p-0">
                                    <div class="ai-image-div">
                                        <!-- <h1 class="text-center text-white">This Imaage will be Required</h1> -->
                                        <img src="images/indian-asian.jpg" alt="">
                                    </div>
                        </div>
                    </div>
                    
                    <section class="ad-Tutor " >
                            <div class="im-heading py-3">
                                <h2>{{ __('messages.Become A Tutor') }}</h2>
                            </div>
                            <div class="AE row border mx-0" >
                                <div class="col-lg-6 col-sm-6 im-div p-0">
                                    <div class="im-img">
                                        <img src="images/group.png" alt="">
                                    </div>
                                </div>

                                <div class="col-6 ad-div-child">
                                    <div class="im-heading-div text-white mt-4">
                                        <h1 class="text-white fw-bold ">{{ __('messages.Guide and Inspire Learners') }}</h1>
                                        <p class="mx-md-2 mx-sm-0">{{ __('messages.Earn while you teach—share your expertise with students on Edexcel. Sign up to start tutoring online.') }}</p>

                                        <div class="im-detail">
                                            <ul class="mt-lg-5 mt-md-3 mt-sm-0">
                                                <li class="AH fs-5 mx-3">{{ __('messages.Expand Your Student Base') }}</li>
                                                <li class="AH fs-5 mx-3">{{ __('messages.Boost Your Business') }}</li>
                                                <li class="AH fs-5 mx-3">{{ __('messages.Guaranteed Payment Security') }}</li>
                                            </ul>
                                        </div>
                                        <div class="im-button d-flex mx-3 mb-lg-0 mb-2">
                                        <a href="{{route('tutor')}}" class="btn btn-light bg-white my-lg-5 my-sm-3  fs-lg-6 fs-sm-3" style="color : #42b979;">{{ __('messages.Register yourself as a professional teacher') }} <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="Ed-max">
                                 <div class="mx-heading-div py-4">
                                    <h2>{{ __('messages.Recomendation') }}</h2>
                                </div>
                                <div class="mx-cont row">
                                    <div class="ed col-lg-6 col-sm-3 mx-2">
                                        <div class="Ab-img my-3 mx-2">
                                            <img src="images/group-of-kids.jpg" alt="">
                                        </div>
                                        <div class="mx-detail">
                                            <p class="fs-5">{{ __('messages.Edexcels operating system is exceptionally robust and holds the collective knowledge of Selectra entire business operations') }}</p>
                                            <div class="video-div">
                                                <div class="zwc-testimonial-video">
                                                    <img data-lazy="" src="images/profile_dp.png" alt="" class="data-loaded"> <span><i class="fa-brands fa-youtube" aria-hidden="true" style="color: red;font-size: 20px;"></i>Watch video</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ed-div col-lg-5 col-sm-3">
                                        <div class="mx-div">
                                            <h3 class="text-white fs-1 ny-3">{{ __('messages.Edexcel for Study') }}</h3>
                                        </div>
                                        <div class="mx-para">
                                            <p class="text-white my-4">{{ __('messages.Edexcel for Study offers a diverse range of qualifications, including GCSEs and A-levels, designed to support students academic and professional aspirations. With a focus on critical thinking and practical skills, Edexcel provides high-quality education that prepares learners for further studies or careers, empowering them to excel in their chosen paths.') }}</p>
                                        </div>
                                        <div class="mx-button">
                                            <button type="button" class="btn ">{{ __('messages.Get in Touch') }} <i class="fa-solid fa-angle-right" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                    </section>
                    <section>
                        <div class="keys-heading">
                            <h2 class="text-center my-4 fw-bold">Our key services</h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <div class="ad-cards border m-3 p-1 ">
                                    <span><i class="fa-regular fa-clock fs-1 text-center mx-1 mt-2"></i></span>
                                    <h4 class="py-2 fs-5 mx-3 text-center">24/7</h4>
                                    <p class="mx-3 text-center">{{ __('messages.Our expert engineering team is available 24/7, providing specialized services including customized monitoring solutions, performance enhancements, comprehensive training programs, and continuous technical support.') }}</p>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="ad-cards border m-3 p-1 ">
                                    <span><i class="fa-solid fa-users fs-1 text-center mx-1 mt-2"></i>
                                    </span>
                                    <h4 class="py-2 fs-5 mx-3 text-center ">{{ __('messages.Why chose Edexcel') }}</h4>
                                    <p class="mx-3 text-center ">{{ __('messages.Choosing Edexcel means opting for a globally recognized and respected qualification provider known for its high academic standards and practical approach to learning.  By choosing Edexcel, you’re investing quality education') }} </p>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="ad-cards border m-3 p-1 ">
                                    <span><i class="fa-regular fa-clock fs-1 text-center mx-1 mt-2"></i></span>
                                    <h4 class="py-2 fs-5 mx-3 text-center ">24/7</h4>
                                    <p class="mx-3 text-center ">{{ __('messages.Our expert engineering team is available 24/7, providing specialized services including customized monitoring solutions, performance enhancements, comprehensive training programs, and continuous technical support.') }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                        <section class="testimonials">
                            <div class="AH container">
                                     <div class="ad-heading-div-child">
                                        <h2 class="text-center mt-3 fw-bold">{{ __('messages.Testimonials') }}</h2>
                                     </div>
                                <div class="row">
                                    <div class="col-sm-12 sm-div ms-lg-0 ms-3">
                                    <div id="customers-testimonials" class="owl-carousel">

                                        <!--TESTIMONIAL 1 -->
                                        <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="images/profile_dp.png" alt="">
                                            <p>{{ __('messages.Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.') }}</p>
                                        </div>
                                        <div class="testimonial-name">EMILIANO AQUILANI</div>
                                        </div>
                                        <!--END OF TESTIMONIAL 1 -->
                                        <!--TESTIMONIAL 2 -->
                                        <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="images/profile_dp.png" alt="">
                                            <p>{{ __('messages.Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.') }}</p>
                                        </div>
                                        <div class="testimonial-name">ANNA ITURBE</div>
                                        </div>
                                        <!--END OF TESTIMONIAL 2 -->
                                        <!--TESTIMONIAL 3 -->
                                        <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="images/profile_dp.png" alt="">
                                            <p>{{ __('messages.Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.') }}</p>
                                        </div>
                                        <div class="testimonial-name">LARA ATKINSON</div>
                                        </div>
                                        <!--END OF TESTIMONIAL 3 -->
                                        <!--TESTIMONIAL 4 -->
                                        <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="images/profile_dp.png" alt="">
                                            <p>{{ __('messages.Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.') }}</p>
                                        </div>
                                        <div class="testimonial-name">IAN OWEN</div>
                                        </div>
                                        <!--END OF TESTIMONIAL 4 -->
                                        <!--TESTIMONIAL 5 -->
                                        <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="images/profile_dp.png" alt="">
                                            <p>{{ __('messages.Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.') }}</p>
                                        </div>
                                        <div class="testimonial-name">{{ __('messages.MICHAEL TEDDY') }}</div>
                                        </div>
                                        <!--END OF TESTIMONIAL 5 -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
    
    
                        
    <button class="goToTop fw-20px" style="background-color:#42B979" onclick="window.scrollTo(0, 0)"><i
            class="fa fa-chevron-up"></i></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width:750px !important">
                    <div class="modal-content" style="width:700px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <form method="POST" action="{{ route('newstudent-create') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary login-button">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>


 
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- testiomial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <!-- Your custom script -->
    <script>
           document.querySelectorAll('.trigger-modal').forEach(function (element) {
        element.addEventListener('mouseenter', function () {
            var modal = new bootstrap.Modal(document.getElementById('videoModal'));
            modal.show();
        });
    });
        $(document).on('select2:open', function(e) {
            let scrollPos = $(window).scrollTop();
            setTimeout(function() {
                $(window).scrollTop(scrollPos);
            }, 0);
        });
        
    </script>
     <script>
        
        jQuery(document).ready(function($) {
        		"use strict";
        		//  TESTIMONIALS CAROUSEL HOOK
		        $('#customers-testimonials').owlCarousel({
		            loop: true,
		            center: true,
		            items: 3,
		            margin: 0,
		            autoplay: true,
		            dots:true,
		            autoplayTimeout: 8500,
		            smartSpeed: 450,
                    rtl: true ,
		            responsive: {
		              0: {
		                items: 1
		              },
		              768: {
		                items: 2
		              },
		              1170: {
		                items: 3
		              }
		            }
		        });
        	});
     </script> 
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".img-wrapper").forEach(wrapper => {
                const img = wrapper.querySelector(".profile-image");
                const video = wrapper.querySelector(".profile-video");
        
                if (video) {
                    // Show video on hover
                    wrapper.addEventListener("mouseenter", function () {
                        img.style.display = "none"; // Hide image
                        video.style.display = "block"; // Show video
                        video.play(); // Start playing
                    });
        
                    // Hide video when mouse leaves
                    wrapper.addEventListener("mouseleave", function () {
                        video.style.display = "none"; // Hide video
                        img.style.display = "block"; // Show image
                        video.pause(); // Pause video
                        video.currentTime = 0; // Reset video
                    });
                }
            });
        });
        </script> <script>
const priceRanges = [
    "0-50", "50-100", "100-200", "200-500", "500-1000", "1000-5000", "5000+"
];

const select = document.getElementById("prize-Range");

// Generate options dynamically
priceRanges.forEach(range => {
    let option = document.createElement("option");
    option.value = range;
    option.textContent = `$${range.replace("-", " - $")}`;
    select.appendChild(option);
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#prize-Range').change(function (e) {
        e.preventDefault();

        var selectedPrice = $(this).val();
        console.log("Price selected:", selectedPrice);

        var locationData = {     
    price: selectedPrice !== "all" ? selectedPrice : "all" // Use "price" instead of "price_range"
        };
        console.log("AJAX Data Sent:", locationData);

        $('#overlay').show(); // Show loading overlay

        $.ajax({
            type: 'POST',
            url: '{{ route('fetch-data') }}',
            data: locationData,
            dataType: 'json',
            success: function (response) {
                console.log("AJAX Success: ", response);
                $('#tutorsContainer').empty();
                $('#overlay').hide(); // Hide loading overlay

                if (response && response.tutors && response.tutors.length > 0) {
                    response.tutors.forEach(function (tutor) {
                        let specializations = tutor.specialization.split(','); // Split by comma
                        let specialization = tutor.specialization.split(',')[0];

            // Build specialization spans
            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                        if (tutor.status !== 'inactive') {
                            var languages = tutor.languages && tutor.languages.length > 0 
            ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ') 
            : 'Not Available';

                            var tutorHTML = `
                                <div class="ad-form">
                                    <div class="ad-img-card d-flex" style="margin-top: 20px;">
                                        <div class="MD col-lg-12 col-sm-5">
                                            <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                 style="width: 100%; height: 140px;">
                                        </div>
                                        <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                            <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                            <div class="ae-detail">
                                                <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Free Trial Section
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-1 mx-2 w-100">
                                        <div class="ae-div row" style="margin-top: 20px;">
                                            <div class="col-8">
                                                <div class="ae-detail-div">
                                                
                                                  <div class="d-flex" id="ff000">
                                                                    <h4 class="me-2 fw-bold sd"> ${tutor.f_name} ${tutor.l_name}</h4>
                                                                    <span class="me-3"><i class="fa-regular fa-star"  style="margin-top: 6px;"></i></span>
                                                                    <div class="img-wrapper" style="max-width:22px;margin-top:5px;">
                                                                        <img src="/image/flag.svg" class="img-fluid" alt="">
                                                                    </div>
                                                                </div>

                                                     <div class="mt-1 cm d-flex">
                                                        ${specializationHTML}
                                                                                                           
                                                                        </div>
                                                    
                                                                    <div class="d-flex text-secondary my-1">
                                                                    <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">${tutor.gender ?? 'Others'}</p>
                                                                    </div>

                                                                      
                                                                      <div class="d-flex text-secondary">
                                                                    <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                    <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">${tutor.country_name ?? 'Not Available'}</p>
                                                                </div>


                                                                   <div class="d-flex text-secondary py-2">
                                                                    <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                    ${languages ?? 'Not Available'}
                                                                    </p>
                                                                </div>



                                                                <p class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                ${tutor.dob}</p>

                                                    
                                                </div>
                                                <div class="py-2">
                                                                    <span>
                                                                         <b> ${tutor.experience}+ Years of  ${specialization} Teaching Experience: Your ${specialization} Success, Guaranteed.</b> 

                                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specialization} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                    <ul class="read p-0 mt-3">
                                                                        <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                    </ul>
                                                                </div>
                                            </div>
                                            <div class="ad-div col-4">
                                                <div class="d-flex pb-5" id="ff111">
                                                                    <div class="me-lg-5 me-3" id="dollar">
                                                                        <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                                        <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                        14-09-1982</p> -->
                                                                    </div>
                                                                    <div id="heart-icon" style="margin-top: 6px;">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container" style=" margin-top: 5px;">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('#tutorsContainer').append(tutorHTML);
                        }
                    });

                    // Update Pagination Info
                    var totalTutorsCount = response.pagination.total;
                    var perPage = response.pagination.perPage;
                    var firstItem = (response.pagination.currentPage - 1) * perPage + 1;
                    var lastItem = Math.min(response.pagination.currentPage * perPage, totalTutorsCount);

                    $('.total-tutors-count').text(totalTutorsCount);
                    $('.tutors-range').text(`${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                    // Hide pagination if only one page of results
                    if (totalTutorsCount <= perPage) {
                        $('#paginationContainer').hide();
                    } else {
                        $('#paginationContainer').show();
                    }
                } else {
                    $('#tutorsContainer').html('<p>No tutors found for the selected Price.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
                $('#overlay').hide();
            }
        });
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#subjectSearch').change(function (e) {
    e.preventDefault();

    // Get the selected value
    var selectedValue = $(this).val();
    
    // Get the selected text (subject name)
    var selectedText = $('#subjectSearch option:selected').text(); 

    // Ensure it's an array
    var selectedsubject = Array.isArray(selectedText) ? selectedText : [selectedText];

    console.log("Subject selected:", selectedsubject);

    var locationData = {         
        specialization: selectedsubject
    };

    console.log("AJAX:", locationData);

    $('#overlay').show(); // Show loading overlay

    $.ajax({
        type: 'POST',
        url: '{{ route('fetch-data') }}',
        data: JSON.stringify(locationData),
        contentType: 'application/json',
        dataType: 'json', // Corrected syntax (no extra comma or misplaced characters)
        success: function (response) {
            console.log("AJAX Success: ", response);
            $('#tutorsContainer').empty();
            $('#overlay').hide();// Hide loading overlay

                if (response && response.tutors && response.tutors.length > 0) {
                    response.tutors.forEach(function (tutor) {
                        let specializations = tutor.specialization.split(','); // Split by comma
                        let specialization = tutor.specialization.split(',')[0];

            // Build specialization spans
            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                        if (tutor.status !== 'inactive') {
                            var languages = tutor.languages && tutor.languages.length > 0 
            ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ') 
            : 'Not Available';

                            var tutorHTML = `
                                <div class="ad-form">
                                    <div class="ad-img-card d-flex" style="margin-top: 20px;">
                                        <div class="MD col-lg-12 col-sm-5">
                                            <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                 style="width: 100%; height: 140px;">
                                        </div>
                                        <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                            <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                            <div class="ae-detail">
                                                <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Free Trial Section
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-1 mx-2 w-100">
                                        <div class="ae-div row" style="margin-top: 20px;">
                                            <div class="col-8">
                                                <div class="ae-detail-div">
                                                
                                                  <div class="d-flex" id="ff000">
                                                                    <h4 class="me-2 fw-bold sd"> ${tutor.f_name} ${tutor.l_name}</h4>
                                                                    <span class="me-3"><i class="fa-regular fa-star"  style="margin-top: 6px;"></i></span>
                                                                    <div class="img-wrapper" style="max-width:22px;margin-top:5px;">
                                                                        <img src="/image/flag.svg" class="img-fluid" alt="">
                                                                    </div>
                                                                </div>

                                                     <div class="mt-1 cm d-flex">
                                                        ${specializationHTML}
                                                                                                           
                                                                        </div>
                                                    
                                                                    <div class="d-flex text-secondary my-1">
                                                                    <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">${tutor.gender ?? 'Others'}</p>
                                                                    </div>

                                                                      
                                                                      <div class="d-flex text-secondary">
                                                                    <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                    <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">${tutor.country_name ?? 'Not Available'}</p>
                                                                </div>


                                                                   <div class="d-flex text-secondary py-2">
                                                                    <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                    ${languages ?? 'Not Available'}
                                                                    </p>
                                                                </div>



                                                                <p class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                ${tutor.dob}</p>

                                                    
                                                </div>
                                                <div class="py-2">
                                                                    <span>
                                                                         <b> ${tutor.experience}+ Years of  ${specialization} Teaching Experience: Your ${specialization} Success, Guaranteed.</b> 

                                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specialization} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                    <ul class="read p-0 mt-3">
                                                                        <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                    </ul>
                                                                </div>
                                            </div>
                                            <div class="ad-div col-4">
                                                <div class="d-flex pb-5" id="ff111">
                                                                    <div class="me-lg-5 me-3" id="dollar">
                                                                        <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                                        <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                        14-09-1982</p> -->
                                                                    </div>
                                                                    <div id="heart-icon" style="margin-top: 6px;">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container" style=" margin-top: 5px;">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('#tutorsContainer').append(tutorHTML);
                        }
                    });

                    // Update Pagination Info
                    var totalTutorsCount = response.pagination.total;
                    var perPage = response.pagination.perPage;
                    var firstItem = (response.pagination.currentPage - 1) * perPage + 1;
                    var lastItem = Math.min(response.pagination.currentPage * perPage, totalTutorsCount);

                    $('.total-tutors-count').text(totalTutorsCount);
                    $('.tutors-range').text(`${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                    // Hide pagination if only one page of results
                    if (totalTutorsCount <= perPage) {
                        $('#paginationContainer').hide();
                    } else {
                        $('#paginationContainer').show();
                    }
                } else {
                    $('#tutorsContainer').html('<p>No tutors found for the selected Price.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
                $('#overlay').hide();
            }
        });
    });
});
</script>  
    <script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#country').change(function (e) {
        e.preventDefault();

        var selectedCountry = $(this).val();
        console.log("Country selected:", selectedCountry);

        var locationData = {
            country: selectedCountry !== "all" ? selectedCountry : "all"
        };

        $('#overlay').show(); // Show loading overlay

        $.ajax({
            type: 'POST',
            url: '{{ route('fetch-data') }}',
            data: locationData,
            dataType: 'json',
            success: function (response) {
                console.log("AJAX Success: ", response);
                $('#tutorsContainer').empty();
                $('#overlay').hide(); // Hide loading overlay

                if (response && response.tutors && response.tutors.length > 0) {
                    response.tutors.forEach(function (tutor) {
                        let specializations = tutor.specialization.split(','); // Split by comma
                        let specialization = tutor.specialization.split(',')[0];

            // Build specialization spans
            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                        if (tutor.status !== 'inactive') {
                            var languages = tutor.languages && tutor.languages.length > 0 
            ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ') 
            : 'Not Available';

                            var tutorHTML = `
                                <div class="ad-form">
                                    <div class="ad-img-card d-flex" style="margin-top: 20px;">
                                        <div class="MD col-lg-12 col-sm-5">
                                            <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                 style="width: 100%; height: 140px;">
                                        </div>
                                        <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                            <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                            <div class="ae-detail">
                                                <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Free Trial Section
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-1 mx-2 w-100">
                                        <div class="ae-div row" style="margin-top: 20px;">
                                            <div class="col-8">
                                                <div class="ae-detail-div">
                                                
                                                  <div class="d-flex" id="ff000">
                                                                    <h4 class="me-2 fw-bold sd"> ${tutor.f_name} ${tutor.l_name}</h4>
                                                                    <span class="me-3"><i class="fa-regular fa-star"  style="margin-top: 6px;"></i></span>
                                                                    <div class="img-wrapper" style="max-width:22px;margin-top:5px;">
                                                                        <img src="/image/flag.svg" class="img-fluid" alt="">
                                                                    </div>
                                                                </div>

                                                     <div class="mt-1 cm d-flex">
                                                        ${specializationHTML}
                                                                                                           
                                                                        </div>
                                                    
                                                                    <div class="d-flex text-secondary my-1">
                                                                    <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">${tutor.gender ?? 'Others'}</p>
                                                                    </div>

                                                                      
                                                                      <div class="d-flex text-secondary">
                                                                    <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                    <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">${tutor.country_name ?? 'Not Available'}</p>
                                                                </div>


                                                                   <div class="d-flex text-secondary py-2">
                                                                    <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                    ${languages ?? 'Not Available'}
                                                                    </p>
                                                                </div>



                                                                <p class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                ${tutor.dob}</p>

                                                    
                                                </div>
                                                <div class="py-2">
                                                                    <span>
                                                                         <b> ${tutor.experience}+ Years of  ${specialization} Teaching Experience: Your ${specialization} Success, Guaranteed.</b> 

                                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specialization} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                    <ul class="read p-0 mt-3">
                                                                        <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                    </ul>
                                                                </div>
                                            </div>
                                            <div class="ad-div col-4">
                                                <div class="d-flex pb-5" id="ff111">
                                                                    <div class="me-lg-5 me-3" id="dollar">
                                                                        <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                                        <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                        14-09-1982</p> -->
                                                                    </div>
                                                                    <div id="heart-icon" style="margin-top: 6px;">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div id="btn-container" style=" margin-top: 5px;">
                                                                        <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                    </div>
                                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('#tutorsContainer').append(tutorHTML);
                        }
                    });

                    // Update Pagination Info
                    var totalTutorsCount = response.pagination.total;
                    var perPage = response.pagination.perPage;
                    var firstItem = (response.pagination.currentPage - 1) * perPage + 1;
                    var lastItem = Math.min(response.pagination.currentPage * perPage, totalTutorsCount);

                    $('.total-tutors-count').text(totalTutorsCount);
                    $('.tutors-range').text(`${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                    // Hide pagination if only one page of results
                    if (totalTutorsCount <= perPage) {
                        $('#paginationContainer').hide();
                    } else {
                        $('#paginationContainer').show();
                    }
                } else {
                    $('#tutorsContainer').html('<p>No tutors found for the selected country.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
                $('#overlay').hide();
            }
        });
    });
});


                $(document).ready(function () {
                        $('#gender').on('keyup change', function () {
                            var selectedGender = $(this).val(); // Get selected gender
                            var locationData = {
                                gender: selectedGender // Include selected gender
                            };

                            $('#overlay').show(); // Show loading overlay

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('fetch-data') }}',
                                data: locationData,
                                dataType: 'json',
                                success: function (response) {
                                    console.log("AJAX Success: ", response);
                                    $('#tutorsContainer').empty(); // Clear existing tutors
                                    $('#overlay').hide(); // Hide loading overlay

                                    if (response && response.tutors && response.tutors.length > 0) {
                                        response.tutors.forEach(function (tutor) {
                                            let specializations = tutor.specialization.split(','); // Split by comma
                                            let specialization = tutor.specialization.split(',')[0];
                                            // Build specialization spans
                                            let specializationHTML = specializations.map(spec => `
                                                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                                                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                                                </span>
                                            `).join('');
                                            if (tutor.status !== 'inactive') {
                                                var languages = tutor.languages && tutor.languages.length > 0
                                                    ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ')
                                                    : 'Not Available';

                                                var tutorHTML = `
                                                    <div class="ad-form">
                                                        <div class="ad-img-card d-flex" style="margin-top: 20px;">
                                                            <div class="MD col-lg-12 col-sm-5">
                                                                <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                                    style="max-width: 100%; height: 140px; width: 100%;">
                                                            
                                                            </div>
                                                            <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                                                <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                                                <div class="ae-detail">
                                                                    <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        Free Trial Section
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-4 mx-4 w-100">
                                                            <div class="ae-div row">
                                                                <div class="col-8">
                                                                    <div class="ae-detail-div">
                                                                        <span>
                                                                            <div class="d-flex" id="ff000" style="margin-left: 3px;">
                                                                                        <h4 class="me-2 fw-bold sd"> ${tutor.f_name} ${tutor.l_name}</h4>
                                                                                        <span class="me-3"><i class="fa-regular fa-star "></i></span>
                                                                                        <div class="img-wrapper" style="max-width:20px;margin-top:5px;">
                                                                                            <img src="/image/flag.svg" class="img-fluid" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                        </span>
                                                                        

                                                                                        <div class="mt-1 cm" style="display: flex;">
                                                                                            ${specializationHTML}
                                                                                                                                                        </div>

                                                                                        <div class="d-flex text-secondary my-1">
                                                                                        <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">${tutor.gender ?? 'Others'}</p>
                                                                                        </div>

                                                                                        <div class="d-flex text-secondary">
                                                                                        <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">${tutor.country_name ?? 'Not Available'}</p>
                                                                                    </div>
                                                                                
                                                                                    <div class="d-flex text-secondary py-2">
                                                                                        <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                                            ${languages ?? 'Not Available'}</p>
                                                                                    </div>
                                                                        
                                                                                    <span class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                                    ${tutor.dob}</span>                              
                                                                        
                                                                        <div class="py-2">
                                                                                        <span>
                                                                                           <b> ${tutor.experience}+ Years of  ${specialization} Teaching Experience: Your ${specialization} Success, Guaranteed.</b> 

                                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specialization} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                                        <ul class="read p-0 mt-3">
                                                                                            <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                                    <div class="d-flex pb-5" id="ff111">
                                                                                        <div class="me-lg-5 me-3" id="dollar">
                                                                                            <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                                                            <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                                            05-03-1972</p> -->
                                                                                        </div>
                                                                                        <div id="heart-icon">
                                                                                            <span><i class="fa-regular fa-heart"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div id="btn-container">
                                                                                            <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                    <div class="mt-2" id="btn-container">
                                                                                            <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Send Massage</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                `;

                                                $('#tutorsContainer').append(tutorHTML);
                                            }
                                        });

                                        // Update pagination data
                                        var totalTutorsCount = response.pagination.total;
                                        var perPage = response.pagination.perPage;
                                        var firstItem = (response.pagination.currentPage - 1) * perPage + 1;
                                        var lastItem = Math.min(response.pagination.currentPage * perPage, totalTutorsCount);

                                        $('.total-tutors-count').text(totalTutorsCount);
                                        $('.tutors-range').text(firstItem + ' to ' + lastItem + ' of ' + totalTutorsCount + ' tutors');

                                        if (totalTutorsCount <= perPage) {
                                            $('#paginationContainer').hide();
                                        } else {
                                            $('#paginationContainer').show();
                                        }

                                        // Update pagination
                                        $('#paginationContainer').html(response.pagination);
                                    } else {
                                        $('#tutorsContainer').append('<p>No tutors found for the selected criteria.</p>');
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('AJAX Error:', xhr.responseText);
                                }
                            });
                        });
                });


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#subjectsearch').keyup(function () {
        var searchQuery = $(this).val(); // Get the value from the search input field

        var locationData = {
            subjectsearch: searchQuery
        };

        $('#overlay').show();

        $.ajax({
            type: 'POST',
            url: '{{ route('fetch-data') }}',
            data: locationData,
            dataType: 'json',
            success: function (response) {
                console.log("AJAX Success: ", response);
                $('#tutorsContainer').empty();
                $('#overlay').hide();

                if (response && response.tutors && response.tutors.length > 0) {
                    response.tutors.forEach(function (tutor) {
                        let specializations = tutor.specialization.split(','); // Split by comma
                        let specialization = tutor.specialization.split(',')[0]; 
                                            // Build specialization spans
                                            let specializationHTML = specializations.map(spec => `
                                                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                                                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                                                </span>
                                            `).join('');
                        if (tutor.status !== 'inactive') {
                            var languages = tutor.languages && tutor.languages.length > 0
                                ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ')
                                : 'Not Available';

                            var tutorHTML = `
                                <div class="ad-form">
                                                        <div class="ad-img-card d-flex" style="margin-top: 20px;">
                                                            <div class="MD col-lg-12 col-sm-5">
                                                                <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                                    style="max-width: 100%; height: 140px; width: 100%;">
                                                            
                                                            </div>
                                                            <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                                                <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                                                <div class="ae-detail">
                                                                    <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        Free Trial Section
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-4 mx-4 w-100">
                                                            <div class="ae-div row">
                                                                <div class="col-8">
                                                                    <div class="ae-detail-div">
                                                                        <span>
                                                                            <div class="d-flex" id="ff000" style="margin-left: 3px;">
                                                                                        <h4 class="me-2 fw-bold sd"> ${tutor.f_name} ${tutor.l_name}</h4>
                                                                                        <span class="me-3"><i class="fa-regular fa-star "></i></span>
                                                                                        <div class="img-wrapper" style="max-width:20px;margin-top:5px;">
                                                                                            <img src="/image/flag.svg" class="img-fluid" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                        </span>
                                                                        

                                                                                        <div class="mt-1 cm" style="display: flex;">
                                                                                            ${specializationHTML}
                                                                                                                                                        </div>

                                                                                        <div class="d-flex text-secondary my-1">
                                                                                        <span class="me-2"><i class="fa-solid fa-venus-mars" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0" style="color:black; transform: scaleY(1);text-transform:capitalize">${tutor.gender ?? 'Others'}</p>
                                                                                        </div>

                                                                                        <div class="d-flex text-secondary">
                                                                                        <span class="me-2"><i class="fa-solid fa-earth-americas" style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">${tutor.country_name ?? 'Not Available'}</p>
                                                                                    </div>
                                                                                
                                                                                    <div class="d-flex text-secondary py-2">
                                                                                        <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                                        <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                                                            ${languages ?? 'Not Available'}</p>
                                                                                    </div>
                                                                        
                                                                                    <span class="cv" style="color:black; transform: scaleY(1);"><i class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i> 
                                                                                    ${tutor.dob}</span>                              
                                                                        
                                                                        <div class="py-2">
                                                                                        <span>
                                                                                           <b> ${tutor.experience}+ Years of  ${specialization} Teaching Experience: Your ${specialization} Success, Guaranteed.</b> 

                                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specialization} Teacher & Tutor. 🇬🇧
                                                                        
                                                                    </span>
                                                                                        <ul class="read p-0 mt-3">
                                                                                            <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                                    <div class="d-flex pb-5" id="ff111">
                                                                                        <div class="me-lg-5 me-3" id="dollar">
                                                                                            <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                                                            <!-- <p class="text-secondary fs-6"><p><i class="fa-solid fa-calendar-days me-1" style="color:#1cc88a"></i> 
                                                                                            05-03-1972</p> -->
                                                                                        </div>
                                                                                        <div id="heart-icon">
                                                                                            <span><i class="fa-regular fa-heart"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div id="btn-container">
                                                                                            <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Book trail lesson</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                    <div class="mt-2" id="btn-container">
                                                                                            <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">Send Massage</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            `;

                            $('#tutorsContainer').append(tutorHTML);
                        }
                    });

                    // Update pagination details only if pagination data is available
                    if (response.pagination) {
                        var totalTutorsCount = response.pagination.total;
                        var perPage = response.pagination.perPage;
                        var firstItem = (response.pagination.currentPage - 1) * perPage + 1;
                        var lastItem = Math.min(response.pagination.currentPage * perPage, totalTutorsCount);

                        $('.total-tutors-count').text(totalTutorsCount);
                        $('.tutors-range').text(`${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                        if (totalTutorsCount <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                            $('#paginationContainer').html(response.pagination.links);
                        }
                    }
                } else {
                    $('#tutorsContainer').html('<p>No tutors found for the selected subject.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                $('#overlay').hide();
                $('#tutorsContainer').html('<p class="text-danger">An error occurred while fetching tutors. Please try again later.</p>');
            }
        });
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#resetFilterBtn').click(function () {
        $.ajax({
            type: 'POST',
            url: '{{ route('fetch-data') }}',
            data: { reset: true },
            dataType: 'json',
            success: function (response) {
                $('#gender').val('all').trigger('change');
$('#country').val('all').trigger('change');
$('#subjectsearch').val('');
 // Clear input fields
                $('#tutorsContainer').empty(); // Clear tutor list
                console.log("Filters reset successfully:", response);

                if (response.tutors && response.tutors.length > 0) {
                    response.tutors.forEach(function (tutor) {
                        // Decode the serialized "teaching" string
                        let teachingSubject = tutor.teaching;
                        const match = teachingSubject.match(/s:\d+:"([^"]+)"/);
                        teachingSubject = match ? match[1] : (teachingSubject ?? 'Not Available');

                        if (tutor.status !== 'inactive') {
                            var languages = tutor.languages && tutor.languages.length > 0
                                ? tutor.languages.map(lang => `${lang.language} (${lang.level})`).join(', ')
                                : 'Not Available';

                            var tutorHTML = `
                                <div class="ad-form">
                                    <div class="ad-img-card d-flex">
                                        <div class="MD col-lg-9 col-sm-5">
                                            <img src="storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
                                                 style="max-width: 100%; height: 100px; width: 100px; border-radius: 70px;">
                                            <div class="ad-icons">
                                                <p class="mb-0 mx-1 fs-5" style="color:#42b979;">4.5 <i class="fa-solid fa-star"></i></p>
                                            </div>
                                        </div>
                                        <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                                            <span class="mb-div"><b>20 AED for 50 minutes</b></span>
                                            <div class="ae-detail">
                                                <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Free Trial Section
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ad-detail my-1 mx-4 w-100">
                                        <div class="ae-div row">
                                            <div class="col-9">
                                                <div class="ae-detail-div">
                                                    <span><i class="fa-solid fa-graduation-cap"></i>
                                                        <strong style="margin-left: 11px;">Name :</strong> 
                                                        ${tutor.f_name} ${tutor.l_name}
                                                    </span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>DOB :</strong> ${tutor.dob ?? 'Not Available'}
                                                    </span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>Language :</strong> ${languages}
                                                    </span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>Phone :</strong> ${tutor.phone ?? 'Not Available'}
                                                    </span> 
                                                    <span><i class="fa-solid fa-book-open"></i>
                                                        <strong style="margin-left: 8px;">Subject :</strong> ${tutor.subjectString ?? 'Not Available'}
                                                    </span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>Experience :</strong> ${tutor.experience ?? 'Not Availableyears'}</span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>Country :</strong> ${tutor.country_name ?? 'Not Available'}
                                                    </span>
                                                    <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                                        <strong>University :</strong> ${tutor.location ?? 'Not Available'}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ad-div col-3">
                                                <span><b>20 AED for 50 minutes</b></span>
                                                <div class="ae-detail">
                                                    <h4 class="fs-6 mt-1" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Free Trial Section
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('#tutorsContainer').append(tutorHTML);
                        }
                    });
                } else {
                    $('#tutorsContainer').append('<p>No tutors found.</p>');
                }

                // Update pagination details
                if (response.pagination) {
                    $('#paginationContainer').show().html(response.pagination);
                } else {
                    $('#paginationContainer').hide();
                }
            },
            error: function (xhr, status, error) {
                console.error('Error resetting filters:', status, error);
                $('#tutorsContainer').html('<p class="text-danger">An error occurred while resetting filters. Please try again.</p>');
            }
        });
    });

    // Notification toggle functionality
    $('.notification').hide();
    $('.notify').click(function () {
        $('.notification').toggle();
    });
});

        
    </script>
   <script>
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
    $(document).ready(function() {
            $('#countrySelect').select2();

            const defaultCountry = 'US';
            const countriesPrefix = @json($countries_prefix);
            const countriesNumberLength = @json($countries_number_length);
            let countryValue = defaultCountry;

            const country = $('#countrySelect');
            const userNumber = $('#phone');

            function setCountryPrefix() {
                const prefix = countriesPrefix[countryValue];
                userNumber.val(prefix);
                userNumber.attr('data-prefix', prefix); // Store the prefix in a data attribute
            }

            // Prevent users from clearing the prefix
            userNumber.on('keydown', function(event) {
                const prefix = userNumber.attr('data-prefix');
                const cursorPosition = this.selectionStart;
                
                // Prevent deletion or backspace within the prefix
                if (cursorPosition <= prefix.length && (event.key === 'Backspace' || event.key === 'Delete')) {
                event.preventDefault();
                }

                // Prevent typing within the prefix
                if (cursorPosition < prefix.length && !['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'].includes(event.key)) {
                event.preventDefault();
                }
            });

            // Adjust input length based on the selected country
            userNumber.on('input', function() {
                const prefix = userNumber.attr('data-prefix');
                const maxLength = countriesNumberLength[countryValue];
                if (userNumber.val().length > maxLength) {
                userNumber.val(userNumber.val().slice(0, maxLength));
                }
            });

            // Change the prefix when the country selection changes
            country.on('change', function() {
                countryValue = country.val();
                setCountryPrefix();
            });

            // Set default country and prefix on page load
            country.val(defaultCountry).trigger('change');
            setCountryPrefix();
        });

        let count = 0;
        const limit = 1000; // The limit for the counter
        const countElement = document.getElementById('count');

        // Function to update the counter
        function updateCounter() {
            if (count < limit) {
                count += 100; // Increment by 100 for each interval
                if (count > limit) {
                    count = limit; // Ensure count does not exceed the limit
                }
                countElement.textContent = count;
            }

            // Add a plus sign if the counter reaches the limit
            if (count === limit) {
                countElement.textContent = count + "+";
            }
        }

        // Update counter every 100 milliseconds (0.1 seconds)
         const intervalId = setInterval(updateCounter, 100);

         // Optional: Clear the interval when the counter reaches the limit
        function stopCounter() {
            if (count >= limit) {
                    clearInterval(intervalId);
                }
            }

        let teachercount = 0;
        const Teacherlimit = 500; // The limit for the counter
        const TeachercountElement = document.getElementById('teacher-count');

        // Function to update the counter
        function TupdateCounter() {
            if (teachercount < Teacherlimit) {
                teachercount += 50; // Increment by 50 for each interval
                if (teachercount > Teacherlimit) {
                    teachercount = Teacherlimit; // Ensure count does not exceed the limit
                }
                TeachercountElement.textContent = teachercount;
            }

            // Add a plus sign if the counter reaches the limit
            if (teachercount === Teacherlimit) {
                TeachercountElement.textContent = teachercount + "+";
            }
        }

        // Update counter every 100 milliseconds (0.1 seconds)
        const TintervalId = setInterval(TupdateCounter, 100);

        // Optional: Clear the interval when the counter reaches the limit
        function TstopCounter() {
            if (teachercount >= Teacherlimit) {
                clearInterval(TintervalId);
            }
        }

        let subjectcount = 0;
        const Subjectlimit = 1500; // The limit for the counter
        const SubjectcountElement = document.getElementById('subject-count');

        // Function to update the counter
        function SupdateCounter() {
            if (subjectcount < Subjectlimit) {
                subjectcount += 50; // Increment by 50 for each interval
                if (subjectcount > Subjectlimit) {
                    subjectrcount = Subjectlimit; // Ensure count does not exceed the limit
                }
                SubjectcountElement.textContent = subjectcount;
            }

            // Add a plus sign if the counter reaches the limit
            if (subjectcount === Subjectlimit) {
                SubjectcountElement.textContent = subjectcount + "+";
            }
        }

        // Update counter every 100 milliseconds (0.1 seconds)
        const SintervalId = setInterval(SupdateCounter, 100);

        // Optional: Clear the interval when the counter reaches the limit
        function SstopCounter() {
            if (subjectcount >= Subjectlimit) {
                clearInterval(SintervalId);
            }
        }

        let langcount = 0;
        const Langlimit = 500; // The limit for the counter
        const  LangcountElement = document.getElementById('lang-count');

        // Function to update the counter
        function LupdateCounter() {
            if ( langcount < Langlimit) {
                langcount += 50; // Increment by 50 for each interval
                if (langcount > Langlimit) {
                    langrcount = Langlimit; // Ensure count does not exceed the limit
                }
                LangcountElement.textContent = langcount;
            }

            // Add a plus sign if the counter reaches the limit
            if (langcount === Langlimit) {
                LangcountElement.textContent = langcount + "+";
            }
        }

        // Update counter every 100 milliseconds (0.1 seconds)
        const lintervalId = setInterval(LupdateCounter, 100);

        // Optional: Clear the interval when the counter reaches the limit
        function LstopCounter() {
            if (langcount >= Langlimit) {
                clearInterval(LintervalId);
            }
        }
        
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        autoHideAlert("success");
        autoHideAlert("error");
    }, 200); // Added a delay to ensure alerts are available in the DOM

    document.querySelectorAll(".custom-alert .close-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            let alertBox = this.closest(".custom-alert");
            if (alertBox) {
                alertBox.classList.add("fade-out");
                setTimeout(() => alertBox.remove(), 500);
            }
        });
    });
});

function autoHideAlert(alertId) {
    let alert = document.getElementById(alertId);
    if (alert) {
        let progressBar = alert.querySelector('.progress-line');
        
        if (progressBar) {
            // Make the progress bar fill over 30 seconds
            progressBar.style.transition = "width 20s linear"; 
            progressBar.style.width = "100%"; 
        }

        // Hide the alert after 30 seconds
        setTimeout(() => {
            alert.classList.add("fade-out");
        }, 20000); // 30 seconds visible

        // Remove the alert completely after fading out
        setTimeout(() => {
            alert.remove();
        }, 20500); // 30.5 seconds total
    }
}



function cancel() {
    let alert = document.getElementById("error");
    if (alert) alert.remove();
}

    </script>
@endsection