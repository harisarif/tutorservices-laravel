
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
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
                <a href="{{ route('hire.tutor') }}" class="hiring-button">
                            Book A demo
                                </a>
                                <!-- <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                            <a class="text-light text-decoration-none active solid_btn" aria-current="page"
                                href="{{ route('hire.tutor') }}">{{__('messages.hire_tutor')}}</a>

                        </button> -->
                </li>
                </ul>

                
                <div>
                <!-- <h1>{{ __('messages.welcome') }}</h1> -->
                

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
                        <!-- <li>
                        <a href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d" target="_blank"
                            class="icoFacebook text-light  p-2" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr" target="_blank" class="icoGoogle text-light p-2" title="instagram +"><i
                            class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/edexcel-edu-130983310/" class="icoGoogle text-light p-2" target="_blank" title="Linked-in +"><i
                            class="fa-brands fa-linkedin"></i></a>
                        </li> -->
                    </ul>
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
            <!-- <div class="notification mb-2 w-25 p-2 bg-info-subtle position-absolute end-0 top-100 z-1">This is a demo</div> -->
    </div>


    <div class="wrapper container">
       
            <!-- WhatsApp Button html start -->
            <div class="whatsApp_button_Warpper12">
                <div class="whatsAppMsgBox12">
                    <div class="WhatsApp_Msg_Box_header">
                        <img src="./images/whatsapp_dp.png" alt="whatsapp_dp" />
                        <div class="information">
                            <h4>Edexcel</h4>
                            <p>typing..</p>
                        </div>
                    </div>
                    <div class="WhatsApp_Msg_Aria">
                        <div class="WhatsApp_button_Msg">
                            <p>
                                Welcome to Edexcel Academy! <br />Empowering futures with
                                Edexcel Academy & Consultancy.
                            </p>
                        </div>
                        <div class="startChat_wrapper">
                            <a href="https://wa.me/+971566428066?text=Hi%20there,%20I%20visited%20the%20website%20of%20Edexcel%20Academy%20&%20Consultancy%20and%20I'm%20interested%20in%20learning%20more%20about%20your%20services.%20Could%20you%20please%20provide%20me%20with%20some%20information%20or%20arrange%20a%20call%20to%20discuss%20further?%20Thanks!"
                                target="_blank" class="start_chat">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i> Start
                                Chat</a>
                        </div>
                    </div>
                </div>

                <div class="Toggle_WhatsApp_Button_Wrapper">
                    <div class="Toggle_WhatApp_Chat_Box">
                        <input type="checkbox" id="toggleWhatsAppChat" />
                        <label for="toggleWhatsAppChat">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
            </div>

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
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('login') }}">{{__('messages.login')}}</a>
                            </li>
                        </div>
                        <div class="col-6 ">
                            <li class="nav-item m-1 btn-an text-center rounded w-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('basicsignup') }}">{{__('messages.sign_up')}}</a>
                            </li>
                        </div>
                    </div>
                            <!-- <li class="nav-item">
                                            </li> -->
                        
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- header end -->

            <!-- banner start -->
            <section class="row banner-section">
                <div class="col-12 col-md-6 intro_lines mx-0 my-5">
                    <h1><span>{{__('messages.academy_name')}}</span></h1>
                    <p>
                    {{__('messages.about_us')}}
                    </p>
                    {{-- <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                        Student
                    </button> --}}
                    <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                        <a class="text-light text-decoration-none active solid_btn" aria-current="page"
                            href="{{ route('hire.tutor') }}">{{__('messages.hire_tutor')}}</a>

                    </button>
                </div>
                <div class="col-12 col-md-6 p-0">
                    <div class="image-wrapper">
                        <img src="images/banner_img.png" class="full-img" alt="banner_img" />

                    </div>
                </div>
            </section>
            <!--  -->
            <section class="row justify-content-center">
                <div class="col-12 row-gap-1 p-1">
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="{{ route('hire.tutor') }}">Browse
                        Tutor</a>
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#FAQ">FAQ</a>
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#">How it works</a>
                    <hr />
                </div>
                <div class="col-12">
                    <h3 class="d-flex justify-content-between align-items-center">
                        World Wide Tutor
                        <i onclick="hideNShow('filter-col')" class="fa fa-filter text-secondary d-inline-block d-md-none"
                            aria-hidden="true"></i>
                    </h3>
                    <p class="border p-2 description-tutor">
                        Edexcel is a platform that connects students with qualified tutors across the globe. It leverages online tools and technologies to provide personalized, flexible, and accessible educational support. The platform offers a wide range of subjects, catering to different educational levels, from primary school to High school. Edexcel ensures high-quality instruction by vetting tutors for their expertise and teaching skills. This global reach allows students to access diverse teaching styles and perspectives, fostering a richer learning experience. Additionally, the platform often includes features like one-on-one sessions, group classes, and customized lesson plans to meet individual learning needs.
                    </p>
                </div>
                </section>




            <section>
            <h3 class="text-center">Popular Subjects & Courses</h3>
            <div class="color-main-div">
                <div class="color-div"></div>
            </div>
            <h4 class="text-center">Featured Learning Paths</h4>
       
            <div class="row g-3">
                
                <div class="col-4">
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
                </div>
                <div class="col-4">
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
                </div>
                <div class="col-4">
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
                </div>
                </div>
        </section>


    </div>
          


            
    @endsection


    <script>
  AOS.init();
</script>