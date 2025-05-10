
@extends('layouts.app')

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
<style>
    .tutorlist-wrapper {
        border-radius:10px;
        border:3px solid #1cc88a;
    }
    main {
        overflow-x:hidden;
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
                        <img src="{{ asset('images/white-logo.jpeg') }}" height="50px" alt="logo" style="height: 50px; border-radius: 10px; margin-top: 14px;">
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
                                <a class="navbar-brand" href="{{ route('hire.tutor') }}">
                                 <img src="{{ asset('images/white-logo.jpeg') }}" height="50px" alt="logo" style="height: 50px; border-radius: 10px;">
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
                    
                        <i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>
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

    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        </div>
        </nav>
    <section style="background-color: #a5a5a5;">
        <div class="row mx-3">
            <div class="col-6 col-md-6 intro_lines mx-0 my-5">
            @if(Auth::check())
                <h1 class="banner-heading-point text-white">{{ __('messages.Welcome') }}, {{ Auth::user()->name }}!</h1>
                @endif
                <p class="p-h text-white">
                {{__('messages.about_us')}}
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 d-flex justify-content-end my-4">
                
                    <video src="{{ asset('images/banner-video.mp4') }}" class="object-fit-cover" autoplay="" muted="" loop="" width="100%" style="width: 510px; "></video>
                
            </div>
            
        </div>
    </section>
    <div class="wrapper mx-5">

        @include('whatsapp')
        <div class="container-fluid mt-2 ">
            <div class="row mx-1">
              <div class="col-md-9">
                                

                                <!-- Tutor profile -->
                               @if($matchedTutors->count() > 0)    
                                <div id="">
                                     @foreach($matchedTutors as $item)
                                        @if($item->status != 'inactive')
                                          
                                             <div class="ad-form">
                                                <div class="container-fluid pt-2 px-0">
                                                
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
                                                                <div class="d-flex text-secondary pb-1">
                                                                    
                                                                    
                                                                    <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px; margin-top: 5px;color: #1cc88a;"></i></span>
                                                                    @foreach($tutors as $tutor)
    <p class="mb-0" style="color:black; transform: scaleY(1); text-transform: capitalize;">
        {{ implode(', ', json_decode($tutor->edu_teaching ?? '[]', true)) }}
    </p>
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

                                                                        - Hello, my name is {{ $item->f_name ?? 'Not Specified' }}. I have {{ $item->experience ?? 'Nullable' }}+ years of experience as a {{ collect($item->specialization)->first() ?? 'Not Specified' }} Teacher & Tutor
                                                                        
                                                                    </span>
                                                                    
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
                                                                        <button type="button" style="background-color: #1cc88a;" class="btn4 btn-outline-light rounded fw-bold text-light p-2 w-100">Book trail lesson</button>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                <div class="mt-2" id="btn-container">
                                                                        <button type="button" style="background-color: #1cc88a;" class="btn4 btn-outline-light rounded fw-bold text-light p-2 w-100">Send Massage</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div> 
                                        
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p>No tutors available matching your search criteria.</p>
                @endif
            </div>
        </div>
        </div>
        </div>

        <!-- Pagination for Tutors -->
        <div class="row justify-content-center mt-3">
           @foreach ($paginatedMatchedTutors as $tutor)
                {{-- Show tutor info --}}
            @endforeach

<!-- Pagination links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $paginatedMatchedTutors->links() }}
        </div>

        </div>
    </div>
</div>

            <section>
                <div class="row g-3">
                        <div class="ae-heading my-4">
                            <h2 class="text-center fw-bold ">{{ __('messages.Top Subjects & Programs') }}</h2>
                        </div>
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