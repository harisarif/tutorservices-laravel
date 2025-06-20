@extends('layouts.app')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description"
    content="Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/tutor-style.css')}}">
<link rel="stylesheet" href="{{ asset('css/mediaquery.css')}}">
<style>
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
<button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 9;"
    onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
<div class="row mini_header m-0 p-0 container-fluid position-relative">
    <div class="col-sm-12 px-3  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0 adjustMobile"
        style="background:#42b979;position:fixed !important;height:25%">
        <ul class="p-1 m-0 d-sm-inline d-block text-center header-ul pt-2 pt-md-0">
            <li class=" p-0">
                <a class="navbar-brand" href="{{ route('newhome') }}">
                    <img src="{{ asset('images/white-logo.jpeg') }}" alt="logo"
                        style="height: 100px; border-radius: 60px;width:100px;margin-top:50px;">
                </a>
            </li>
            <nav class="navbar navbar-expand-lg adjust-header-mobile d-none">
                <div class="container-fluid">
                    <!-- Button to trigger the off-canvas -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                        aria-label="Toggle navigation" style="border:1px solid #fff;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="custom-select-wrapper mx-1">
                        <div class="custom-select">
                            <i class="fa fa-globe" style="color:#fff !important" aria-hidden="true"
                                onclick="toggleDropdown()"></i>
                            <div class="custom-options" id="language-select">
                                <div class="custom-option " data-value="en" onclick="changeLanguage('en')">English</div>
                                <div class="custom-option" data-value="ar" onclick="changeLanguage('ar')">Arabic</div>

                            </div>
                        </div>
                    </div>
                    <!-- Off-canvas component -->
                    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel" style="width:100%;">
                        <div class="offcanvas-header p-1" style="width:96%;">
                            <a class="navbar-brand" href="{{ route('newhome') }}">
                                <img src="images/white-logo.jpeg" height="50px" alt="logo"
                                    style="height: 50px; border-radius: 10px;">
                            </a>
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-2 px-3">
                            <ul class="navbar-nav align-items-md-center">
                                <div class="ai-nav">
                                    <div class="AI">
                                        <li class="nav-item m-1 rounded w-1 py-0">
                                            <a class="nav-link text-decoration-none solid_btn p-0 "
                                                href="{{ route('login') }}">
                                                <i class="fas fa-sign-in-alt"></i><span style="margin-left:5px;">
                                                    {{ __('messages.login') }}</span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="AI">
                                        <li class="nav-item m-1 rounded w-1 py-0">
                                            <a class="nav-link text-decoration-none solid_btn p-0"
                                                href="{{ route('basicsignup') }}">
                                                <i class="fa-regular fa-clipboard"></i> <span
                                                    class="mx-2">{{ __('messages.register') }}</span>
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="email-container mx-0 ">
                                        <i class="fa fa-envelope-square" aria-hidden="true" style="color: #42b979;"></i>
                                        <a class="email text-decoration-none mx-2" href="mailto:info@eduexceledu.com "
                                            style="color: #42b979;">
                                            info@eduexceledu.com
                                        </a>
                                    </div>
                                    <div class="d-flex alig header-phone-number phone-container mx-0"
                                        style="align-items: center;">
                                        <i class="fa-solid fa-phone" aria-hidden="true" style="color: #42b979;"></i>
                                        <a class="phone-number-header text-decoration-none mx-2" href="#"
                                            style="color: #42b979;">

                                        </a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

        </ul>
        <a href="{{ route('hire.tutor') }}" class="hiring-button mt-4">
            {{ __('messages.Book a free demo for your child') }}
        </a>
        <div>
            <!-- <h1>{{ __('messages.welcome') }}</h1> -->


            <ul class="icons d-flex p-2 m-0  align-items-center gap-3 mt-4" style="list-style:none;">
                <div class="d-flex align-items-center" style="justify-content: center;">

                    {{-- Guest: Show Login and Register --}}
                    @guest
                    <div class="col-6">
                        <li class="nav-item m-1 btn-an text-center bg-white rounded w-1 py-1">
                            <a class="nav-link text-decoration-none solid_btn" href="{{ route('login') }}"
                                style="color:#42b979;">{{ __('messages.login') }}</a>
                        </li>
                    </div>
                    <div class="col-6">
                        <li class="nav-item m-1 btn-an text-center bg-white rounded w-1 py-1">
                            <a class="nav-link text-decoration-none solid_btn" href="{{ route('basicsignup') }}"
                                style="color:#42b979;">{{ __('messages.register') }}</a>
                        </li>
                    </div>
                    @endguest



                </div>

                <div class="d-flex align-items-center">
                    <div>
                        {{-- Authenticated: Show Logout --}}
                        @auth
                        @if (Auth::user()->role === 'user')
                        <div class="col-12 d-flex">
                           <!-- Change Password Button -->
<!-- <a class="nav-link text-decoration-none solid_btn me-1" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
    <i class="fa fa-key text-white"></i>
</a> -->
                            <a class="nav-link text-decoration-none solid_btn me-1" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out text-white"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        @endif
                        @endauth
                    </div>
                    <div class="email-container mt-4">
                        <i class="fa fa-envelope-square" aria-hidden="true" style="color: #fff;"></i>
                        <a class="email text-decoration-none" href="mailto:info@eduexceledu.com"
                            style="color: #42b979;">info@eduexceledu.com</a>
                    </div>

                    <div class=" p-2 header-phone-number phone-container">
                        <i class="fa fa-phone " aria-hidden="true" style="color: #fff;"></i>
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
<section class="banner-section"
    style="background-image: url(images/group-of-kids.jpg); background-size: cover; background-blend-mode: multiply; background-color: #a5a5a5;">
    <div class="banner-content">
        <h1 class="aa fs-2" style="margin-top:10rem;">
            {{ __('messages.Edexcel Academically with tailored tutoring and professional guidance') }}
        </h1>
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
                <div class="MH card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex" style=" justify-content: space-between;">
                                <div class="media-body text-left counter">
                                    <h3 class="danger" id="teacher-count">500+</h3>
                                    <span>{{ __('messages.Teachers') }}</span>
                                </div>
                                <div class="align-self-center animated-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="64"
                                        fill="#42b979">
                                        <path
                                            d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-2.67 0-8 1.337-8 4v3h16v-3c0-2.663-5.33-4-8-4zm-8 6v-1c0-1.721 3.468-3 8-3s8 1.279 8 3v1H4z" />
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
                                    <svg width="40" height="64" viewBox="0 0 64 64" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="32" cy="20" r="12" fill="#42b979" />
                                        <path d="M32 36C22 36 14 44 14 54H50C50 44 42 36 32 36Z" fill="#42b979" />
                                        <path d="M32 4L14 14L32 24L50 14L32 4Z" fill="#42b979" />
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
                                    <h3 class="warning" id="subject-count">1500+</h3>
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
                                    <span>{{ __('messages.Languages') }}</span>
                                </div>
                                <div class="align-self-center animated-icons">
                                    <i class="fa-solid fa-globe data-insight-globe" aria-hidden="true"
                                        style="font-size: 25px;"></i>
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
                <div class="ad-border-filters">

                    <div class="row  country-row">
                        <div class="col-lg-3 country-drop-down">
                            <label class="form-label filter-heading">
                                {{ __('messages.Please select a country') }}
                            </label>
                            <select name="country" id="country" class="country">


                                @foreach($countries as $countryCode => $countryName)
                                <option value="{{ $countryCode }}">{{ $countryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-9 adjust-filters-wrap ">
                            <div class="col-md-6 px-2 col-lg-4">
                                <label class="form-label filter-heading">
                                    {{ __('messages.Gender Selection') }}
                                </label>
                                <select name="gender" id="gender" class="country">
                                    <option value="Male">{{ __('Male') }}</option>
                                    <option value="female">{{ __('Female') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 px-2 col-lg-4">
                                <label class="form-label filter-heading">
                                    {{ __('messages.Which Subject Interests You?') }}
                                </label>
                                <select name="subjectSearch" id="subjectSearch" class="country">

                                    @foreach($subjectsTeach as $subjectsCode => $subjects)
                                    <option value="{{ $subjectsCode }}">{{ $subjects }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 px-2 col-lg-4">
                                <label class="form-label filter-heading">
                                    {{ __('messages.Price Selection') }}
                                </label>
                                <select name="prize-Range" id="prize-Range" class="country">
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

                    <div class="ad-form">
                        <div class="container-fluid pt-2 px-0">

                            <div class="recomended-badge mb-1" data-toggle="tooltip" data-placement="top"
                                title="{{ $item->f_name ?? 'Nullable' }}  {{ $item->l_name ?? 'Nullable' }}"
                                style="float: right;">
                                <span class="badge badge-primary">Recomended</span>
                            </div>
                            <div class="row ">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="row py-4" style="margin: 0 auto;">
                                        <div class="col-md-3">
                                            <div id="waste1">
                                                <div class="img-wrapper trigger-modal" id="triggerImage">
                                                    @if ( $item->profileImage)
                                                    <img src="{{ asset('storage/' . $item->profileImage) }}"
                                                        alt="Tutor Image" class="img-thumbnail" id="profileImages"
                                                        style="height: 150px; width: 100%">
                                                    @else
                                                    <img src="{{ asset('images/avatar.png') }}" alt="Default Image"
                                                        class="img-thumbnail" style="height: 150px; width: 100%;">
                                                    @endif

                                                </div>
                                                <div class="modal fade" id="videoModal" tabindex="-1"
                                                    aria-labelledby="videoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" id="pro1">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background-color: #1cc88a;">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"
                                                                    style="filter: invert(2);"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Video Embed -->
                                                                <video controls height="250px" width="100%">
                                                                    <source src="{{ asset('/' . $item->video) }}"
                                                                        type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="waste"
                                                    style="display: none;margin: 0 auto;     margin-top: 20px;">
                                                    <div class="d-flex">
                                                        <h4 class="me-2 fw-bold">
                                                            {{ $item->f_name ?? 'Nullable' }}{{ $item->l_name ?? 'Nullable' }}
                                                        </h4>
                                                        <span class="me-3"><i class="fa-regular fa-star"></i></span>
                                                        <div class="img-wrapper1"
                                                            style="max-width: 15px;     margin-top: 3px;">
                                                            <img src="{{ asset('image/flag.svg') }}" class="img-fluid1"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-md-5 mt-2" id="for-320">
                                                        <div class="me-md-5 me-3" id="new">
                                                            <div class="d-flex text-center">
                                                                <span class=""><i
                                                                        class="fa-regular fa-star text-warning"></i></span>
                                                                <h4 class="fw-bold mb-0">5</h4>
                                                            </div>
                                                            <p class="text-secondary fs-6">
                                                                {{ $item->avalibility_status ?? 'Nullable' }}
                                                            </p>
                                                        </div>
                                                        <div class="me-md-5 me-2" id="dollar">
                                                            <h4 class="fw-bold mb-0">US$16</h4>
                                                            <p class="text-secondary fs-6 " style="text-align: center;">
                                                                {{ $item->year ?? 'Nullable' }}
                                                            </p>
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
                                                    <i class="fa-solid fa-briefcase me-1"></i>
                                                    {{ trim($specialization) }}
                                                </span>
                                                @endforeach
                                            </div>
                                            <div class="d-flex text-secondary my-1">
                                                <span class="me-2"><i class="fa-solid fa-globe"
                                                        style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                <p class="mb-0"
                                                    style="color:black; transform: scaleY(1);text-transform:capitalize">
                                                    @if($item->edu_teaching && is_array(json_decode($item->edu_teaching, true)))
                                                    {{ implode(', ', json_decode($item->edu_teaching, true)) }}
                                                    @else
                                                    {{ $item->edu_teaching ?? 'Nullable' }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="d-flex text-secondary my-1">
                                                <span class="me-2"><i class="fa-solid fa-venus-mars"
                                                        style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                <p class="mb-0"
                                                    style="color:black; transform: scaleY(1);text-transform:capitalize">
                                                    {{ $item->gender ?? 'Nullable' }}
                                                </p>
                                            </div>

                                            <div class="d-flex text-secondary">
                                                <span class="me-2"><i class="fa-solid fa-earth-americas"
                                                        style="font-size: 13px;  margin-top: 5px;    color: #1cc88a;"></i></span>
                                                <p class="mb-0 ms-1" style="color:black; transform: scaleY(1);">
                                                    {{ $item->country_name ?? 'Nullable' }}
                                                </p>
                                            </div>

                                            <div class="d-flex text-secondary py-2">
                                                <span class="me-2"><i class="fa-solid fa-language"
                                                        style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                <p class="mb-0" style="color:black; transform: scaleY(1);" id="on-1024">
                                                    Speaks
                                                    @if(!empty($item->language) && is_array($item->language))
                                                    @foreach($item->language as $lang)
                                                    {{ $lang['language'] ?? 'Unknown' }}
                                                    ({{ $lang['level'] ?? 'Unknown' }})
                                                    @endforeach
                                                    @else
                                                    Nullable
                                                    @endif
                                                </p>
                                            </div>

                                            <!--  -->
                                            <span class="cv" style="color:black; transform: scaleY(1);"><i
                                                    class="fa-solid fa-calendar-days me-1" style="color: #1cc88a;"></i>
                                                {{ $item->dob ?? 'Nullable' }}</span>
                                            <!--  -->
                                            <div class="py-2">
                                                <span>
                                                    @php
                                                    $teachingSubjects = $item->edu_teaching;
                                                    $decodedSubjects = is_array(json_decode($teachingSubjects, true)) ? json_decode($teachingSubjects, true) : null;
                                                    $subjectList = $decodedSubjects ? implode(', ', $decodedSubjects) : 'Nullable';
                                                    $experience = $item->experience ?? 'Nullable';
                                                    $firstName = $item->f_name ?? 'Not Specified';
                                                    @endphp

                                                    <b>
                                                        {{ $experience }}+ Years of {{ $subjectList }} Teaching Experience: Your {{ $subjectList }} Success, Guaranteed.
                                                    </b>

                                                    - Hello, my name is {{ $firstName }}. I have {{ $experience }}+ years of experience as a {{ $subjectList }} Teacher & Tutor.


                                                </span>
                                                <ul class="read p-0 mt-3">
                                                    <li style="list-style: none;"><a class="fw-bold" href="">Read
                                                            More</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex pb-5" id="ff111">
                                                <div class="me-lg-5 me-3" id="dollar">
                                                    <h4 class="fw-bold on">{{ $item->price ?? 'Nullable' }}</h4>
                                                </div>
                                            </div>
                                            <div>
                                                <div id="btn-container">
                                                    @if(Auth::check() && Auth::user()->role === 'user')
                                                    <a href="{{ route('zoom.send.meeting.email', ['student_id' => Auth::user()->id, 'teacher_id' => $item->id]) }}"
                                                        id="demo"
                                                        class="mb-1 d-flex align-items-center btn4 btn-outline-light rounded fw-bold text-light p-2 w-100 justify-content-center"
                                                        style="background-color: #1cc88a; text-decoration: none;"
                                                        title="Zoom Meet">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" viewBox="0 0 24 24">
                                                            <path d="M17 10.5V7c0-1.1-.9-2-2-2H4C2.9 5 2 5.9 2 7v10c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-3.5l4 4v-11l-4 4z" />
                                                        </svg>
                                                        <span class="ms-1">Zoom Meet</span>
                                                    </a>
                                                    @else
                                                    <a href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#signupPromptModal"
                                                        class="mb-1 d-flex align-items-center btn4 btn-outline-light rounded fw-bold text-light p-2 w-100 justify-content-center"
                                                        style="background-color: #1cc88a; text-decoration: none;"
                                                        title="Sign up to join Zoom Meet">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" viewBox="0 0 24 24">
                                                            <path d="M17 10.5V7c0-1.1-.9-2-2-2H4C2.9 5 2 5.9 2 7v10c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-3.5l4 4v-11l-4 4z" />
                                                        </svg>
                                                        <span class="ms-1">Zoom Meet</span>
                                                    </a>
                                                    @endif

                                                </div>
                                            </div>
                                            <div>
                                                <div class="mt-2" id="btn-container">
                                                @if(Auth::check() && Auth::user()->role === 'user')
                                                    <button   data-teacher-id="{{ $item->teacher_id }}" type="button" id="demo"
                                                        class="btn1 btn-outline-dark rounded fw-bold text-light request-demo-btn">
                                                        Request a Demo
                                                    </button>
                                                    @else
                                                    <button type="button" id="demo"
                                                        class="btn1 btn-outline-dark rounded fw-bold text-light">
                                                        Request a Demo
                                                    </button>
                                                    @endif
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
                        <img src="{{ asset('images/avatar.png') }}" alt="Default Image" class="img-thumbnail"
                            style="max-width: 100px; height: 100px; width: 100px; border-radius: 70px;">
                        @endif


                        Tutor Rating
                        <p class="mb-0 mx-1 fs-5" style="color:#42b979;">4.5 <i class="fa-solid fa-star"></i></p>
                    </div>

                    <div class="md-div col-lg-5 d-none mt-2" style="margin-left: 17px;">
                        <span class="mb-div"><b>{{ __('messages.20 AED for 50 minutes') }}</b></span>
                        <div class="ae-detail">
                            <h4 class="fs-6 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{ __('messages.Free Trial Section') }}
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="ad-detail my-1 mx-4 w-100">
                    <div class="ae-div row">
                        <div class="col-9">
                            <div class="ae-detail-div">
                                <span><i class="fa-solid fa-graduation-cap"></i>
                                    <strong style="margin-left: 11px;">{{ __('Name') }} :</strong>
                                    {{ $item->f_name }}</span>

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
                                    <strong>{{ __('Experience') }} :</strong> {{ $item->experience ?? 'Nullable' }}
                                    years</span>

                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                    <strong>{{ __('messages.Country') }} :</strong>
                                    {{ $item->country_name ?? 'Nullable' }}</span>

                                <span><i class="fa fa-globe" style="color: #42b979 !important;"></i>
                                    <strong>{{ __('University') }} :</strong> {{ $item->location ?? 'Nullable' }}</span>
                            </div>
                        </div>

                        <div class="col-3 ad-div">
                            <span><b>{{ __('messages.20 AED for 50 minutes') }}</b></span>
                            <div class="ae-detail">
                                <h4 class="fs-6 mt-1" style="cursor:pointer" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
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
                                <div class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">
                                    <div class="imgBox col-sm-4 d-grid mx-3">
                                        <img class="img-1 rounded-circle"
                                            src="{{ asset('storage/' . $item->profileImage) }}" alt="" />
                                        <p class="d-flex align-items-center m-auto">
                                            Verified
                                            <span class="mx-1 varified bg-primary rounded-circle text-light"><i
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
                                                    <button class="text-success bg-transparent fw-bold border-0">
                                                        view contact
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="title-1 col col-md-3" style="display:none;">
                                                <td class="font-s fw-bold">WhatsApp</td>
                                                <td class="d-none d-md-block px-2">:</td>
                                                <td class="font-s text-secondary">
                                                    {{ $item->whatsapp }}
                                                    <button class="text-success bg-transparent fw-bold border-0">
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
                                        <h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
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
                                <div class="d-flex align-items-center flex-column flex-sm-row justify-content-between">
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
                                    <a class="text-success text-decoration-none text-center px-2 py-2" href="#">Request
                                        a callback</a>
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
                <!-- <p>No tutors found.</p> -->
                <img class="not-found-img w-100" src="{{ asset('images/not-found.jpeg') }}" />
                @endif

                <!-- Here is form -->

                <!-- end job section  -->


                <!-- form end -->
            </div>
            @if (App::getLocale() === 'en')
            <div class="col col-lg-3 my-0 p-0">
                <video src="{{ asset('images/video.mp4') }}" class="object-fit-cover mt-0" autoplay muted loop
                    width="100%"></video>
            </div>
            @elseif (App::getLocale() === 'ar')
            <div class="col col-lg-3 my-0 p-0">
                <video src="{{ asset('videos/arabic.mp4') }}" class="object-fit-cover mt-0" autoplay muted loop
                    width="100%"></video>
            </div>
            @elseif (App::getLocale() === 'rs')
            <div class="col col-lg-3 my-0 p-0">
                <video src="{{ asset('videos/russian.mp4') }}" class="object-fit-cover mt-0" autoplay muted loop
                    width="100%"></video>
            </div>
            @elseif (App::getLocale() === 'zh')
            <div class="col col-lg-3 my-0 p-0">
                <video src="{{ asset('videos/chinese.mp4') }}" class="object-fit-cover mt-0" autoplay muted loop
                    width="100%"></video>
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
        <h2 class="text-center  fw-bold">{{ __('messages.Inquiry Overview') }}</h2>
    </div>
    <div class="im row mx-0">
        <div class=" Ai col-5 ">
            <form method="POST" action="{{ route('inquiry-create') }}" enctype="multipart/form-data">
                @csrf
                <div class="mt-0 mb-5">
                    <div class="ai-card px-3 py-4" style="border: 1px solid #ddd; border-radius: 5px;">
                        <div class="card-body">
                            <h6 class="card-title mb-3 text-center fw-bold fs-6 ">
                                {{ __('messages.Submit your inquiry to request a callback for further assistance') }}
                            </h6>
                            <h3 class="Ab-heading fw-bold text-center" style="font-size: 15px;color: red;">
                                <i>"{{ __('messages.Please Complete All Required Fields') }}"</i>
                            </h3>


                            <div class="row g-0">
                                <div class="col-sm-12">
                                    <div class="form-group p-2 px-0">
                                        <label for="curriculum" class="form-label"
                                            style="color:#42b979;"><strong>{{ __('messages.Enter your Name') }} <b
                                                    style="color: red;font-size: 20px;">*</b></strong></label>
                                        <input id="inquiryname" name="fname" class="form-control" type="text"
                                            placeholder="{{ __('messages.Name') }}">
                                    </div>
                                </div>
                                <input type="text" name="website" style="display:none">

                                <div class="col-sm-12">
                                    <div class="form-group p-2 px-0">
                                        <label for="curriculum" class="form-label"
                                            style="color:#42b979;"><strong>{{ __('messages.Enter your Email') }} <b
                                                    style="color: red; font-size: 20px;">*</b></strong></label>
                                        <div class="input-group"> <input id="inquiryemail" name="email" class="form-control" type="text"
                                                placeholder="{{ __('messages.Email ID') }}" pattern="^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$"
                                                title="Only Gmail, Hotmail, or Yahoo emails are allowed (e.g., example@gmail.com)"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group p-2 px-0">
                                    <label for="curriculum" class="form-label" style="color:#42b979;">
                                        <strong>{{ __('messages.Enter your Number ') }}<b
                                                style="color: red; font-size: 20px;">*</b></strong>
                                    </label>
                                    <div class="inquiry-select input-group d-flex justify-content-between align-items-center"
                                        style="width: 100%;">

                                        <select name="countrySelect" id="countrySelect"
                                            class="form-select country-select w-50" required>
                                            @foreach ($countriesPhone as $key => $country)
                                            <option value="{{ $key }}">{{ $country }}</option>
                                            @endforeach
                                        </select>

                                        <input class="form-control w-50" required name="phone" id="phone" type="text"
                                            placeholder="e.g +92XXXXXXXXXX"
                                            style="border: 1px solid #ddd; height: 50px; box-shadow: none;">
                                    </div>
                                    <div class="col-12  py-2">
                                        <label for="curriculum" class="form-label" style="color:#42b979;">
                                            <strong>{{ __('messages.Description (Optional)') }} <b
                                                    style="color: red; font-size: 20px;">*</b>
                                            </strong>
                                        </label>
                                        <textarea class="form-control" id="inquirydesp" name="description" rows="2"
                                            placeholder="{{ __('messages.Description') }}"
                                            style="box-shadow: none;border: 1px solid #ddd;"></textarea>
                                    </div>
                                </div>

                            </div>

                            <button disabled id="submitBtn" type="submit"
                                class="AB-button btn btn-success btn-block confirm-button mt-4">{{ __('messages.Confirm') }}</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-7 img-reqire p-0">
            <div class="ai-image-div">
                <img src="{{ asset('images/inquiry.jpeg') }}" alt="">
            </div>
        </div>
    </div>
    <section class="w-100 mx-auto">

        <div class="ad-heading-div-child">
            <h2 class="text-center mt-3 fw-bold">{{ __('Expert Educators') }}</h2>
        </div>
        <div class="row justify-content-cemter">
            <div class="col-sm-12 sm-div ms-lg-0 ms-3">
                <div id="customers-testimonials" class="owl-carousel">
                    @if ($sliderTutors->count())
                    @foreach ($sliderTutors as $sliderTutor)
                    <!--TESTIMONIAL 1 -->
                    <div class="profile-card mt-5 mb-3">
                        <div class="card-header tutor-slider-card">
                            @if ( $item->profileImage)
                            <img src="{{ asset('storage/' . $sliderTutor->profileImage) }}" alt="Profile"
                                class="profile-img-slider">
                            @else
                            <img src="{{ asset('images/avatar.png') }}" alt="Default Image" class="img-thumbnail"
                                style="height: 150px; width: 100%;">
                            @endif
                        </div>
                        <div class="card-body slider-body">
                            <h5 class="card-title slider-title">{{ $sliderTutor->f_name ?? 'Nullable' }}
                                {{ $sliderTutor->l_name ?? 'Nullable' }}
                            </h5>
                            <p class="card-text slider-text">
                                @php
                                $specializations = json_decode($sliderTutor->specialization, true);
                                @endphp
                                Hello, my name is {{ $sliderTutor->f_name ?? 'Not Specified' }}. I have
                                <b>{{ $sliderTutor->experience ?? 'Nullable' }}</b>+ years of experience as a
                                {{ is_array($specializations) && count($specializations) ? implode(', ', $specializations) : 'Not Specified' }}
                                Teacher & Tutor
                            </p>
                            <!-- <button class="view-more-btn">View More</button> -->
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="text-center mt-5">
                        <img src="{{ asset('images/not-found.jpeg') }}" alt="Not Found" class="img-fluid" style="max-width: 300px;">
                        <!-- <p class="mt-3">No tutors found.</p> -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="ad-Tutor ">
        <div class="im-heading py-3">
            <h2>{{ __('messages.Become A Tutor') }}</h2>
        </div>
        <div class="AE row border mx-0">
            <div class="col-lg-6 col-sm-6 im-div p-0">
                <div class="im-img">
                    <img src="{{ asset('images/become-tutor.jpeg') }}" alt="">
                </div>
            </div>

            <div class="col-6 ad-div-child">
                <div class="im-heading-div text-white mt-4">
                    <h1 class="text-white fw-bold ">{{ __('messages.Guide and Inspire Learners') }}</h1>
                    <p class="mx-md-2 mx-sm-0">
                        {{ __('messages.Earn while you teach—share your expertise with students on Edexcel. Sign up to start tutoring online.') }}
                    </p>

                    <div class="im-detail">
                        <ul class="mt-lg-5 mt-md-3 mt-sm-0">
                            <li class="AH fs-5 mx-3">{{ __('messages.Expand Your Student Base') }}</li>
                            <li class="AH fs-5 mx-3">{{ __('messages.Boost Your Business') }}</li>
                            <li class="AH fs-5 mx-3">{{ __('messages.Guaranteed Payment Security') }}</li>
                        </ul>
                    </div>
                    <div class="im-button d-flex mx-3 mb-lg-0 mb-2">
                        <a href="{{route('tutor')}}" class="btn btn-light bg-white my-lg-5 my-sm-3  fs-lg-6 fs-sm-3"
                            style="color : #42b979;">{{ __('messages.Register yourself as a professional teacher') }} <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($blogs->count() > 0)
    <section class="w-75 mx-auto">

        <div class="ad-heading-div-child im-heading">
            <h2 class="text-center mt-3 fw-bold">{{ __('Trending Posts') }}</h2>
        </div>
        <div class="row g-4">
            <!-- Card 1 -->
            @foreach ($blogs as $blog)
            <div class="col-md-4">
                <div class="blog-card">
                    <!-- <div class="blog-number">01</div> -->
                    <div class="blog-title">{{ $blog->title }}</div>
                    @if($blog->image)
                    <div class="blog-image">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    @endif
                    <p class="blog-text">{{ strip_tags($blog->description) }}</p>
                    <div class="d-flex">
                        <small class="text-start">{{ $blog->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif



    <section class="fb-ad ">
        <div class="ad-line"></div>
        <div class="im-heading">
            <h2 class="mx-heading-div py-3">Frequently Asked Questions</h2>
        </div>
    </section>
    <section class="w-75 mx-auto">
        <div>
            <div class="list-group-item border rounded my-2 px-2">
                <div class="d-flex justify-content-between align-items-center" onclick="toggle('para','toggle-arrow')">
                    <h6 class="fw-bold py-3 faq-heading">
                        {{ __('messages.How can students improve their knowledge?') }}
                    </h6>
                    <i class="fa fa-chevron-down" id="toggle-arrow"></i>
                </div>
                <div id="para" style="height:auto;">
                    <p>
                        {{ __('messages.Students can improve their knowledge and skills in a number of ways like:') }}
                    </p>
                    <ul>
                        <li> {{ __('messages.Practicing solutions regularly.') }}</li>
                        <li>
                            {{ __('messages.Understand the underlying concepts/formulas clearly.') }}
                        </li>
                        <li>{{ __('messages.Solving additional exercises.') }}</li>
                        <li>{{ __('messages.Sharing a positive attitude about the subject.') }}</li>
                    </ul>
                </div>
            </div>
            <div class="list-group-item border rounded my-2 px-2">
                <div class="d-flex justify-content-between align-items-center"
                    onclick="toggle('para1','toggle-arrow1')">
                    <h6 class="fw-bold py-3 faq-heading">
                        {{ __('messages.How can tutors help students improve their score and skills?') }}
                    </h6>
                    <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                </div>
                <div id="para1">
                    <p>
                        {{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}
                    </p>
                    <ul>
                        <li>{{ __('messages.Build confidence in the student.') }}</li>
                        <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                        <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                        <li>
                            {{ __('messages. Provide authentic problems that increase students’ drive to engage with the subject.') }}
                        </li>
                        <li>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                    </ul>
                </div>
            </div>

            <div class="list-group-item border rounded my-2 px-2">
                <div class="d-flex justify-content-between align-items-center"
                    onclick="toggle('para2','toggle-arrow2')">
                    <h6 class="fw-bold py-3 faq-heading">
                        {{ __('messages.Want to know what we can offer?') }}
                    </h6>
                    <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                </div>
                <div id="para2">
                    <p>
                        {{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}
                    </p>
                    <ul>
                        <li>{{ __('messages.Build confidence in the student.') }}</li>
                        <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                        <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                        <li>{{ __('messages.EProvide authentic problems that increase students’ drive to engage with the subject.') }}

                        </li>
                        <li>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                    </ul>
                </div>
            </div>

            <div class="list-group-item border rounded my-2 px-2">
                <div class="d-flex justify-content-between align-items-center"
                    onclick="toggle('para3','toggle-arrow3')">
                    <h6 class="fw-bold py-3 faq-heading">
                        {{ __('messages.If you have tried all means and yet looking for a tutor❓') }}
                    </h6>
                    <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                </div>
                <div id="para3">
                    <p>{{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}

                    </p>
                    <ul>
                        <li>{{ __('messages.Build confidence in the student.') }}</li>
                        <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                        <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                        <li>{{ __('messages.Provide authentic problems that increase students’ drive
                                                            to engage with the subject.') }}
                        </li>
                        <li>>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                    </ul>
                </div>
            </div>
        </div>


    </section>
    <section class="w-75 mx-auto mb-4 services-section">
        <div class="keys-heading">
            <h2 class="text-center my-4 fw-bold">Our Services</h2>
        </div>
        <div class="row justify-content-center">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/classroom.png" alt="Online Tutors">
                    </div>
                    <h5 class="service-title">Online Tutors</h5>
                    <p class="service-text">Get personalized, one-on-one tutoring from certified educators—anytime,
                        anywhere. We help learners of all ages master subjects with clarity and confidence.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/laptop.png" alt="Online Classes">
                    </div>
                    <h5 class="service-title">Online Classes</h5>
                    <p class="service-text">Interactive, expert-led online classes designed to fit your schedule. Learn
                        new skills, upgrade your knowledge, and achieve your goals.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/customer-support.png" alt="Support">
                    </div>
                    <h5 class="service-title">Support</h5>
                    <p class="service-text">24/7 dedicated support to ensure your experience is smooth and stress-free.
                        We're here to solve problems, answer questions, and keep you moving forward.</p>
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
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
<!-- Sign Up Modal -->
<div class="modal fade" id="signupPromptModal" tabindex="-1" aria-labelledby="signupPromptLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; overflow: hidden; box-shadow: 0 0 15px rgba(0,0,0,0.1);">

            <div class="modal-body p-0 d-flex flex-wrap">

                <!-- Left Side Image -->
                <div class="col-md-6 d-none d-md-block">
                    <img src="{{ asset('images/tutor-new.jpeg') }}" alt="student-signup" class="h-100 w-100">
                </div>

                <!-- Right Side Form -->
                <div class="col-md-6 p-4 bg-white">
                    <span class="fs-2 pointer foucs mb-1 position-absolute top-0" style="right:0px" onclick="document.getElementById('signupPromptModal').style.display = 'none'"> &times;</span>
                    <h4 class="text-center mb-3" style="color: #42b979;">Create Your Account</h4>

                    <!-- Social Buttons -->
                    <div class="mb-3 d-grid gap-2">
                        <a href="{{ route('social.redirect','google') }}" class="btn btn-outline-success d-flex align-items-center justify-content-center" style="border-color: #42b979; color: #42b979; font-size: 14px;">
                            <i class="fab fa-google me-2"></i> Sign in with Google
                        </a>

                        <!-- <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-outline-success d-flex align-items-center justify-content-center"
                            style="border-color: #42b979; color: #42b979; font-size: 14px;">
                            <i class="fab fa-facebook me-2"></i> Sign up with Facebook
                        </a> -->
                        <!-- <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-outline-success d-flex align-items-center justify-content-center"
                            style="border-color: #42b979; color: #42b979; font-size: 14px;">
                            <i class="fab fa-facebook me-2"></i> Sign up with Outlook
                        </a> -->
                    </div>

                    <div class="text-center my-2 text-muted" style="font-size: 13px;">OR</div>

                    <!-- Form -->
                    <form action="{{ route('student-create') }}" method="POST" class="pages" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label mb-1">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label mb-1">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label mb-1">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>

                        <button type="submit" class="btn text-white w-100 fw-semibold"
                            style="background-color: #42b979; font-size: 14px;">
                            Sign Up
                        </button>
                    </form>

                    <p class="mt-3 text-center" style="font-size: 12px; color: #999;">
                        Already have an account? <a href="{{ route('login') }}" style="color: #42b979;">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Change Password Modal -->
<!-- <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('change.password') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password" required minlength="8">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required minlength="8">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div> -->



@endsection

@section('js')
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- testiomial -->
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<!-- Bootstrap & FontAwesome (add these in your layout if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
document.querySelectorAll('.request-demo-btn').forEach(button => {
    button.addEventListener('click', function () {
        const teacherId = this.getAttribute('data-teacher-id');

        fetch('{{ route("request.demo") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ teacher_id: teacherId })
        })
        .then(response => {
            if (!response.ok) throw new Error("Network error");
            return response.json();
        })
        .then(data => {
            const alertBox = document.getElementById('success');
            const messageContainer = document.getElementById('messageres');

            // Append new message (instead of replacing)
            messageContainer.innerHTML += `<div>${data.message}</div>`;

            // Show the alert
            alertBox.classList.remove('d-none');

            // Restart progress animation (optional)
            const progressLine = alertBox.querySelector('.progress-line');
            progressLine.classList.remove('custom-line-test'); // reset animation
            void progressLine.offsetWidth; // reflow to restart animation
            progressLine.classList.add('custom-line-test');

            // Auto-hide after 5s
            setTimeout(() => {
                alertBox.classList.add('d-none');
            }, 5000);
        })
        .catch(error => {
            console.error('Request failed:', error);
            alert("Something went wrong");
        });
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const demoBtn = document.getElementById('demo');

        demoBtn.addEventListener('click', function() {
            @guest
            const modal = new bootstrap.Modal(document.getElementById('signupPromptModal'));
            modal.show();
            @else
            window.location.href = "{{ route('newhome') }}";
            @endguest
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submitBtn = document.getElementById("submitBtn");
        const form = document.querySelector("form");

        const requiredFields = [
            document.getElementById("inquiryname"),
            document.getElementById("inquiryemail"),
            document.getElementById("phone"),
            document.getElementById("inquirydesp"), // Remove this if optional
        ];

        function validateFields() {
            const allFilled = requiredFields.every(field => field.value.trim() !== '');
            submitBtn.disabled = !allFilled;
        }

        requiredFields.forEach(field => {
            field.addEventListener("input", validateFields);
        });

        validateFields(); // Initial check

        form.addEventListener("submit", function(e) {});
    });
    document.querySelectorAll('.trigger-modal').forEach(function(element) {
        element.addEventListener('mouseenter', function() {
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
        console.log(window.innerWidth);
        "use strict";
        //  TESTIMONIALS CAROUSEL HOOK
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 6,
            margin: 0,
            autoplay: true,
            dots: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                },
                1440: {
                    items: 4
                },
                1600: {
                    items: 5
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".img-wrapper").forEach(wrapper => {
            const img = wrapper.querySelector(".profile-image");
            const video = wrapper.querySelector(".profile-video");

            if (video) {
                // Show video on hover
                wrapper.addEventListener("mouseenter", function() {
                    img.style.display = "none"; // Hide image
                    video.style.display = "block"; // Show video
                    video.play(); // Start playing
                });

                // Hide video when mouse leaves
                wrapper.addEventListener("mouseleave", function() {
                    video.style.display = "none"; // Hide video
                    img.style.display = "block"; // Show image
                    video.pause(); // Pause video
                    video.currentTime = 0; // Reset video
                });
            }
        });
    });
</script> 
<script>
    const priceRanges = [
        "0-50", "50-100", "100-200",
    ];

    const select = document.getElementById("prize-Range");

    // Generate options dynamically
    priceRanges.forEach(range => {
        let option = document.createElement("option");
        option.value = range;
        option.textContent = `$${range.replace("-", " - $")}`;
        select.appendChild(option);
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#prize-Range').change(function(e) {
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
                url: '{{ route("fetch-data") }}',
                data: locationData,
                dataType: 'json',
                success: function(response) {
                    console.log("AJAX Success: ", response);
                    $('#tutorsContainer').empty();
                    $('#overlay').hide(); // Hide loading overlay

                    if (response && response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {

                            let specializations = tutor.specialization.split(
                                ','); // Split by comma
                            let specialization = tutor.specialization.split(',')[0];

                            // Build specialization spans
                            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                // $('.subjects-name').html(displayText);
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                        <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                        <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                        var lastItem = Math.min(response.pagination.currentPage * perPage,
                            totalTutorsCount);

                        $('.total-tutors-count').text(totalTutorsCount);
                        $('.tutors-range').text(
                            `${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                        // Hide pagination if only one page of results
                        if (totalTutorsCount <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                        }
                    } else {
                        $('#tutorsContainer').html(
                            '<p>No tutors found for the selected Price.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                    $('#overlay').hide();
                }
            });
        });


        $('#subjectSearch').change(function(e) {
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
                url: '{{ route("fetch-data") }}',
                data: JSON.stringify(locationData),
                contentType: 'application/json',
                dataType: 'json', // Corrected syntax (no extra comma or misplaced characters)
                success: function(response) {
                    console.log("AJAX Success: ", response);
                    $('#tutorsContainer').empty();
                    $('#overlay').hide(); // Hide loading overlay

                    if (response && response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            let specializations = tutor.specialization.split(
                                ','); // Split by comma
                            let specialization = tutor.specialization.split(',')[0];

                            // Build specialization spans
                            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                        <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                        <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                        var lastItem = Math.min(response.pagination.currentPage * perPage,
                            totalTutorsCount);

                        $('.total-tutors-count').text(totalTutorsCount);
                        $('.tutors-range').text(
                            `${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                        // Hide pagination if only one page of results
                        if (totalTutorsCount <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                        }
                    } else {
                        $('#tutorsContainer').html(
                            '<p>No tutors found for the selected Price.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                    $('#overlay').hide();
                }
            });
        });
        $('#country').change(function(e) {
            e.preventDefault();

            var selectedCountry = $(this).val();
            console.log("Country selected:", selectedCountry);

            var locationData = {
                country: selectedCountry !== "all" ? selectedCountry : "all"
            };

            $('#overlay').show(); // Show loading overlay

            $.ajax({
                type: 'POST',
                url: '{{ route("fetch-data") }}',
                data: locationData,
                dataType: 'json',
                success: function(response) {
                    console.log("AJAX Success: ", response);
                    $('#tutorsContainer').empty();
                    $('#overlay').hide(); // Hide loading overlay

                    if (response && response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            let specializations = tutor.specialization.split(
                                ','); // Split by comma
                            let specialization = tutor.specialization.split(',')[0];

                            // Build specialization spans
                            let specializationHTML = specializations.map(spec => `
                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                </span>
            `).join(''); // Join without extra commas


                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                        <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                        <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                        var lastItem = Math.min(response.pagination.currentPage * perPage,
                            totalTutorsCount);

                        $('.total-tutors-count').text(totalTutorsCount);
                        $('.tutors-range').text(
                            `${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                        // Hide pagination if only one page of results
                        if (totalTutorsCount <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                        }
                    } else {
                        $('#tutorsContainer').html(
                            '<p>No tutors found for the selected country.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                    $('#overlay').hide();
                }
            });
        });
        $('#gender').on('keyup change', function() {
            var selectedGender = $(this).val(); // Get selected gender
            var locationData = {
                gender: selectedGender // Include selected gender
            };

            $('#overlay').show(); // Show loading overlay

            $.ajax({
                type: 'POST',
                url: '{{ route("fetch-data") }}',
                data: locationData,
                dataType: 'json',
                success: function(response) {
                    console.log("AJAX Success: ", response);
                    $('#tutorsContainer').empty(); // Clear existing tutors
                    $('#overlay').hide(); // Hide loading overlay

                    if (response && response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            let specializations = tutor.specialization.split(
                                ','); // Split by comma
                            let specialization = tutor.specialization.split(',')[0];
                            // Build specialization spans
                            let specializationHTML = specializations.map(spec => `
                                                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                                                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                                                </span>
                                            `).join('');
                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                                            <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                                            <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                        var lastItem = Math.min(response.pagination.currentPage * perPage,
                            totalTutorsCount);

                        $('.total-tutors-count').text(totalTutorsCount);
                        $('.tutors-range').text(firstItem + ' to ' + lastItem + ' of ' +
                            totalTutorsCount + ' tutors');

                        if (totalTutorsCount <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                        }

                        // Update pagination
                        $('#paginationContainer').html(response.pagination);
                    } else {
                        $('#tutorsContainer').append(
                            '<p>No tutors found for the selected criteria.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', xhr.responseText);
                }
            });
        });
        $('#subjectsearch').keyup(function() {
            var searchQuery = $(this).val(); // Get the value from the search input field

            var locationData = {
                subjectsearch: searchQuery
            };

            $('#overlay').show();

            $.ajax({
                type: 'POST',
                url: '{{ route("fetch-data") }}',
                data: locationData,
                dataType: 'json',
                success: function(response) {
                    console.log("AJAX Success: ", response);
                    $('#tutorsContainer').empty();
                    $('#overlay').hide();

                    if (response && response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            let specializations = tutor.specialization.split(
                                ','); // Split by comma
                            let specialization = tutor.specialization.split(',')[0];
                            // Build specialization spans
                            let specializationHTML = specializations.map(spec => `
                                                <span id="pro" class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                                                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                                                </span>
                                            `).join('');
                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                                            <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                                            <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                            var lastItem = Math.min(response.pagination.currentPage * perPage,
                                totalTutorsCount);

                            $('.total-tutors-count').text(totalTutorsCount);
                            $('.tutors-range').text(
                                `${firstItem} to ${lastItem} of ${totalTutorsCount} tutors`);

                            if (totalTutorsCount <= perPage) {
                                $('#paginationContainer').hide();
                            } else {
                                $('#paginationContainer').show();
                                $('#paginationContainer').html(response.pagination.links);
                            }
                        }
                    } else {
                        $('#tutorsContainer').html(
                            '<p>No tutors found for the selected subject.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    $('#overlay').hide();
                    $('#tutorsContainer').html(
                        '<p class="text-danger">An error occurred while fetching tutors. Please try again later.</p>'
                    );
                }
            });
        });
        $('#resetFilterBtn').click(function() {
            $.ajax({
                type: 'POST',
                url: '{{ route("fetch-data") }}',
                data: {
                    reset: true
                },
                dataType: 'json',
                success: function(response) {
                    $('#gender').val('Male').trigger('change');
                    $('#country').val('AL').trigger('change');
                    $('#price').val('0-50').trigger('change');
                    // Clear input fields
                    $('#tutorsContainer').empty(); // Clear tutor list
                    console.log("Filters reset successfully:", response);

                    if (response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            // Decode the serialized "teaching" string
                            let teachingSubject = tutor.teaching;
                            const match = teachingSubject.match(/s:\d+:"([^"]+)"/);
                            teachingSubject = match ? match[1] : (teachingSubject ??
                                'Not Available');

                            if (tutor.status !== 'inactive') {
                                let edu_teaching = tutor
                                    .edu_teaching; // e.g., '["Physical Therapy","Physics"]'

                                let displayText = 'Others';
                                if (edu_teaching) {
                                    try {

                                        let parsed = JSON.parse(edu_teaching);
                                        if (Array.isArray(parsed)) {
                                            displayText = parsed.join(', ');
                                        }
                                    } catch (e) {
                                        // Optional: log or handle invalid JSON
                                    }
                                }
                                console.log('asdsadsa', displayText)
                                var languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

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
                                                                        <span class="me-2"><i class="fa-solid fa-globe" style="font-size: 13px; margin-top: 5px;color: #1cc88a !important;"></i></span>
                                                                        <p class="mb-0 subjects-name" style="color:black; transform: scaleY(1);text-transform:capitalize">${displayText}</p>
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
                    } else {
                        const notFoundImage = "{{ asset('images/not-found.jpeg') }}";
                        $('#tutorsContainer').append(`<img class="not-found-img w-100" src="${notFoundImage}" />`);
                        // $('#tutorsContainer').append(' <img src="{{ asset('images/not-found.jpeg') }}"/>');
                    }

                    // Update pagination details
                    if (response.pagination) {
                        $('#paginationContainer').show().html(response.pagination);
                    } else {
                        $('#paginationContainer').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error resetting filters:', status, error);
                    $('#tutorsContainer').html(
                        '<p class="text-danger">An error occurred while resetting filters. Please try again.</p>'
                    );
                }
            });
        });
        $('.notification').hide();
        $('.notify').click(function() {
            $('.notification').toggle();
        });
    });
</script>
<script>
    $(document).ready(function() {
        // CSRF setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Gender filter change event
        $('#gender').change(function() {
            const selectedGender = $(this).val();
            $('#tutorsContainer').empty();
            $('#overlay').show();

            if (!selectedGender) {
                $('#tutorsContainer').html('<p>Please select a gender.</p>');
                $('#paginationContainer').hide();
                $('#overlay').hide();
                return;
            }

            $.ajax({
                type: 'POST',
                url: '{{ route("fetch-student") }}',
                data: {
                    gender: selectedGender
                },
                dataType: 'json',
                success: function(response) {
                    $('#overlay').hide();
                    if (response.tutors && response.tutors.length > 0) {
                        response.tutors.forEach(function(tutor) {
                            if (tutor.status !== 'inactive') {
                                let specializationArray = tutor.specialization.split(
                                    ',');
                                let specializationHTML = specializationArray.map(spec => `
                                <span class="p-1 me-2 bg-primary-subtle rounded fw-bold">
                                    <i class="fa-solid fa-briefcase me-1"></i> ${spec.trim()}
                                </span>
                            `).join('');

                                let languages = tutor.languages && tutor.languages
                                    .length > 0 ?
                                    tutor.languages.map(lang =>
                                        `${lang.language} (${lang.level})`).join(', ') :
                                    'Not Available';

                                let tutorHTML = `
                                <div class="ad-form">
                                    <div class="ad-img-card d-flex mt-3">
                                        <div class="MD col-lg-12 col-sm-5">
                                            <img src="/storage/${tutor.profileImage}" alt="Tutor Image" class="img-thumbnail" 
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
                                        <div class="ae-div row mt-3">
                                            <div class="col-8">
                                                <div class="ae-detail-div">
                                                    <div class="d-flex">
                                                        <h4 class="me-2 fw-bold">${tutor.f_name} ${tutor.l_name}</h4>
                                                        <span class="me-3"><i class="fa-regular fa-star mt-1"></i></span>
                                                        <div class="img-wrapper" style="max-width:22px;margin-top:5px;">
                                                            <img src="/image/flag.svg" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="mt-1 d-flex">${specializationHTML}</div>
                                                    <div class="d-flex text-secondary my-1">
                                                        <i class="fa-solid fa-venus-mars text-success me-2"></i>
                                                        <p class="mb-0 text-capitalize">${tutor.gender ?? 'Others'}</p>
                                                    </div>
                                                    <div class="d-flex text-secondary">
                                                        <i class="fa-solid fa-earth-americas text-success me-2"></i>
                                                        <p class="mb-0">${tutor.country_name ?? 'Not Available'}</p>
                                                    </div>
                                                    <div class="d-flex text-secondary py-2">
                                                        <i class="fa-solid fa-language text-success me-2"></i>
                                                        <p class="mb-0">${languages}</p>
                                                    </div>
                                                    <p class="cv">
                                                        <i class="fa-solid fa-calendar-days me-1 text-success"></i>
                                                        ${tutor.dob}
                                                    </p>
                                                </div>
                                                <div class="py-2">
                                                    <span>
                                                        <b>${tutor.experience}+ Years of ${specializationArray[0]} Teaching Experience:</b>
                                                        - Hello, my name is ${tutor.f_name}. I have ${tutor.experience}+ years of experience as a ${specializationArray[0]} tutor. 🇬🇧
                                                    </span>
                                                    <ul class="read p-0 mt-3">
                                                        <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="ad-div col-4">
                                                <div class="d-flex pb-5">
                                                    <div class="me-lg-5 me-3">
                                                        <h4 class="fw-bold on">${tutor.price ?? 'Not Available'}</h4>
                                                    </div>
                                                    <div class="mt-1">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light mb-2">
                                                        Book trial lesson
                                                    </button>
                                                    <button type="button" class="btn1 btn-outline-dark rounded fw-bold text-light">
                                                        Book trial lesson
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                                $('#tutorsContainer').append(tutorHTML);
                            }
                        });

                        const totalTutors = response.pagination.total;
                        const perPage = response.pagination.perPage;
                        const currentPage = response.pagination.currentPage;
                        const firstItem = (currentPage - 1) * perPage + 1;
                        const lastItem = Math.min(currentPage * perPage, totalTutors);

                        $('.total-tutors-count').text(totalTutors);
                        $('.tutors-range').text(
                            `${firstItem} to ${lastItem} of ${totalTutors} tutors`);

                        if (totalTutors <= perPage) {
                            $('#paginationContainer').hide();
                        } else {
                            $('#paginationContainer').show();
                        }
                    } else {
                        $('#tutorsContainer').html(
                            '<p>No tutors found for the selected gender.</p>');
                        $('#paginationContainer').hide();
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    $('#overlay').hide();
                    $('#tutorsContainer').html(
                        '<p class="text-danger">An error occurred. Please try again.</p>');
                }
            });
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
            if (cursorPosition < prefix.length && !['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown']
                .includes(event.key)) {
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
    const LangcountElement = document.getElementById('lang-count');

    // Function to update the counter
    function LupdateCounter() {
        if (langcount < Langlimit) {
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
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            autoHideAlert("success");
            autoHideAlert("error");
        }, 200);
        // Added a delay to ensure alerts are available in the DOM

        document.querySelectorAll(".custom-alert .close-btn").forEach((btn) => {
            btn.addEventListener("click", function() {
                let alertBox = this.closest(".custom-alert");
                if (alertBox) {
                    alertBox.classList.add("fade-out");
                    setTimeout(() => alertBox.remove(), 500);
                }
            });
        });
        document.querySelectorAll(".custom-alert-danger .close-btn").forEach((btn) => {
            btn.addEventListener("click", function() {
                let alertBox = this.closest(".custom-alert-danger");
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