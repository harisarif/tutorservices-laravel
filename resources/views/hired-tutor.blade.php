
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
<style>
    .modalBox{
        display: none !important;
    }
    
</style>
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row mini_header m-0 p-0 container-fluid position-relative">
            <div class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">
                <ul class="p-2 m-0 d-sm-inline d-block text-center header-ul">
                    <li class=" p-2">
                        <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
                        <a class="text-decoration-none text-light" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
                    </li>

                    <li>
                          <a href="{{ route('hire.tutor') }}" class="hiring-button">Book A demo</a>               
                    </li>
                </ul>

                <div>
                    <ul  class="icons d-flex p-2 m-0 justify-content-center align-items-center gap-3" style="list-style:none;">   

                            <div>
                                <label class="text-white" style="font-size:12px;">Swtich language from there</label>
                                <select id="language-select" onchange="changeLanguage()">
                                    <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                </select>
                                </div>
                        <li class=" p-2 header-phone-number">

                            <i class="fa-solid fa-phone text-light" aria-hidden="true"></i>
                            <a class="text-decoration-none text-light" href="tel:+971566428066">+971 56 642 8066</a>
                        </li>
                        
                        </ul>
                    </div>
                    <div class="fixed" id="social">
                            <a target="_blank"
                                href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d"
                            >
                                <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a target="_blank"
                                href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr"
                            >
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a target="_blank" href="https://www.linkedin.com/in/edexcel-edu-130983310/">
                                <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                            </a>
                    </div>
                    {{-- <a href="#" class="btn notify position-relative"><i class="fa-regular fa-bell text-white"></i><span class="position-absolute top-10 start-60 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span></a> --}}
                </div>
            </div>
    </div>


    <div class="wrapper container">

    @include('whatsapp')

            <nav class="navbar navbar-expand-lg">

                <div class="container-fluid">


                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" height="50px" alt="logo" style="height: 50px" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav align-items-md-center">

                    <div class="row nav-item-row">
                        <div class="col-6 ">    
                            <li class="nav-item m-1 btn-an text-center rounded w-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('logout') }}">{{__('messages.logout')}}</a>
                            </li>
                        </div>
                        
                    </div>
                        
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="row banner-section">
            
                <div class="col-12 col-md-6 intro_lines mx-0 my-5">
                @if(Auth::check())
                    <h1>Welcome, {{ Auth::user()->name }}!</h1>
                    @endif
                    <p>
                    {{__('messages.about_us')}}
                    </p>
                </div>
                <div class="col-12 col-md-6 p-0 ">
                    <div class="image-wrapper d-flex justify-content-end">
                        <!-- <img src="images/Banner.png" class="full-img" alt="Banner.png" /> -->
                        <video src="images/banner-video.mp4" class="object-fit-cover" autoplay="" muted="" loop="" width="100%" style="width: 510px; height: 335px;"></video>

                    </div>
                </div>
            </section>

            <section>
                <div class="row g-3">
                    
                        <h3 class="text-center">Popular Subjects & Courses</h3>
                        <div class="color-main-div">
                            <div class="color-div"></div>
                        </div>
                            <h4 class="text-center">Featured Learning Paths</h4>
                        <div class="col-4">
                           <a href="{{route('tutor.detail')}}" style="text-decoration: none;cursor: pointer;"> <div class=" teacher-main-parent">
                                <div class="card h-100 teacher-card-wrapper border-0">
                                    <div class="card-div">
                                        <div class="hadding">
                                            <h3>Little Learners</h3>
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
