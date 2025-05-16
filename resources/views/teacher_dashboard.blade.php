@extends('layouts.app')
@php
                        $languages = is_array($tutor->language) ? $tutor->language : json_decode($tutor->language, true);
                    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Hired tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/new-home.css') }}"><meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
            .custom-pagination nav {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

        .custom-pagination .pagination {
            display: flex;
            list-style: none;
            padding-left: 0;
        }

        .custom-pagination .pagination li {
            margin: 0 5px;
        }

        .custom-pagination .pagination li a,
        .custom-pagination .pagination li span {
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            background-color: #f0f0f0;
            border-radius: 4px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .custom-pagination .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }

        .custom-pagination .pagination li.active span {
            background-color: #007bff;
            color: white;
            pointer-events: none;
        }

        .custom-pagination .pagination li.disabled span {
            color: #999;
            background-color: #e0e0e0;
        }

    .img-wrapper{
        max-width:30px !important;
        
    }
    #calendericon{
        margin-left:1.7rem;
    }

    #pro{
        font-size: 12px;
    }
    .read li a{
        color:#1cc88a;
    }
    .ppp{
        font-size: 13px;
    }
    .btn5{
        padding: 12px 13px;
        width: 100%;
        border-radius: 0.375rem;
    }
    .btn4{
        background-color: #42b979;
        padding: 12px 13px;
        width: 100%;
        border: none;
    }
    .btn-outline-dark {
        transition: all 1s ease;
    }
    .btn-outline-dark:hover {
        border-color: #343a40;
        transform: scale(0.9);
    }
    .liked {
        color: #42b979 !important;
    }
    #heartIcon{
        cursor: pointer !important;
    }
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
        align-tutors: center; */
    }
    .dropdown-container {
        position: relative;
        display: inline-block;
    }

        .settings-icon {
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .dropdown-menu-box {
            position: absolute;
            top: 30px;
            right: 0;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-width: 140px;
            z-index: 999;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu-box ul {
            list-style: none;
            padding: 0;
            margin: 0;  outline: none;
            border: none;
        }

        .dropdown-menu-box li {
            margin-bottom: 10px; outline: none;
            border: none; list-style: none;  
        }

        .dropdown-menu-box li:last-child {
            margin-bottom: 0;   outline: none;
            border: none; list-style: none; 
        
        }

        .dropdown-menu-box a {
            text-decoration: none;list-style: none;  outline: none;
            border: none;
            color: #333;
            display: block;
            padding: 5px 10px;
        }
        .dropdown-menu-box li:hover {
            color: #42b979;  text-decoration: none; list-style: none;  outline: none;
            border: none;
        }
        .dropdown-menu-box i:hover {
            color: #42b979;  text-decoration: none; list-style: none;  outline: none;
            border: none;
        }
        .dropdown-menu-box a:hover {
            color: #42b979;  text-decoration: none; list-style: none;  outline: none;
            border: none;
        }
        .dropdown-menu-box {
            z-index: 9999;
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
                
        .main-footer{
            display: none !important;
        }
</style>
<body>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif     <div id="overlay" class="overlay" style="display: none;">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
@section('content')
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
                                <a class="navbar-brand" href="{{ route('newhome') }}">
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
                    
                        <div class="p-2 header-phone-number phone-container">
                            <i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>
                            <a class="phone-number-header text-decoration-none" href="#" style="color: #42b979;"></a>
                        </div>
                    
                        <div class="custom-select-wrapper">
                            @include('language')
                        </div>
                    
                        {{-- 🔧 Settings Icon + Dropdown --}}
                        <div class="dropdown-container ms-2">
                            <i class="fa-solid fa-gear settings-icon dropdownButton"></i>
                            <div class="dropdown-menu-box" style="display:none;">
                                <ul>
                                    <li>
                                        <a href="{{ route('front-edit-teacher', $tutor->id) }}" class="btn text-justify">
                                        <i class="fa fa-edit" style="color: #4e73df;"></i>
                                        <span class="mx-1">Edit</span>
                                    </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                
                </ul>
                {{-- <a href="#" class="btn notify position-relative"><i class="fa-regular fa-bell text-white"></i><span class="position-absolute top-10 start-60 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span></a> --}}
            </div>
        </div>
    </div>


    <div class="wrapper">

    @include('whatsapp')

        <nav class="navbar navbar-expand-lg">

            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
            </div>
        </nav>
<section class="banner-section mb-3" style="background-image: url(images/group-of-kids.jpg); background-size: cover; background-blend-mode: multiply; background-color: #a5a5a5;">
    <div class="banner-content text-center text-white">
        <h1 class="fs-2" style="margin-top: 10rem;">
            {{ __('messages.Edexcel Academically with tailored tutoring and professional guidance') }}
        </h1>
    </div>
</section>

<section>
    <div class="container pt-5">
        <div class="row">
            <!-- Left side: filters and student list -->
            <div class="col-lg-9">
                <!-- Filter header -->
                <div class="d-flex justify-content-between align-items-center mb-3 border p-2 rounded">
                   
                                        <p class="m-0 pt-1 tutors-range">
                                            @if($paginatedStudents->total() == 0)
                                                0 of 0 tutors
                                            @else
                                                {{ $paginatedStudents->firstItem() }} to {{ $paginatedStudents->lastItem() }} of {{ $paginatedStudents->total() }} tutors
                                            @endif
                                       
                                        </p>
                    <button id="resetFilter" class="btn btn-outline-secondary">
                        {{ __('messages.Reset Filter') }}
                    </button>
                </div>

                <!-- Filters -->
                <div class="border p-3 rounded mb-4">
                    <div class="row g-3">
                        <!-- Country filter -->
                        <div class="col-lg-4">
                            <label class="form-label">{{ __('messages.Please select a country') }}</label>
                            <select name="country" id="country" class="form-select">
                                <option value="AE" selected>United Arab Emirates</option>
                                @foreach($countries as $code => $name)
                                    <option value="{{ $code }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Gender filter -->
                        <div class="col-lg-4">
                            <label class="form-label">{{ __('messages.Gender Selection') }}</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="Male">{{ __('Male') }}</option>
                                <option value="female">{{ __('Female') }}</option>
                            </select>
                        </div>

                        <!-- Price filter -->
                        
                    </div>
                </div>

                <!-- Matched Students List -->
                @if($matchedStudents->count() > 0)
                    <div id="tutorsContainer">
                        @foreach($paginatedStudents as $student)
                            <div class="mb-4">
                                <div class="p-4 border border-success rounded">
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if (  $student->profileImage) 
                                                <img src="{{ asset('storage/' . $student->profileImage) }}" alt="Tutor Image" class="img-thumbnail" id="profileImages" style="height: 150px; width: 100%">
                                            @else
                                                <img src="{{ asset('images/avatar.png') }}" alt="Default Image" class="img-thumbnail" style="height: 150px; width: 100%;">
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <p class="mb-1"><strong>Name:</strong> {{ $student->name ?? 'N/A' }}</p>
                                            <p class="mb-1"><strong>Contact Email:</strong> {{ $student->email ?? 'N/A' }}</p>
                                            <p class="mb-1"><strong>Subject:</strong> {{ $student->subject ?? 'N/A' }}</p>
                                            <p class="mb-1"><strong>Phone:</strong> {{ $student->phone ?? 'N/A' }}</p>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <p class="mb-1"><strong>Gender:</strong> {{ Str::ucfirst($student->gender ?? 'N/A') }}</p>
                                            <p class="mb-1"><strong>Country:</strong> {{ $student->country_name ?? 'N/A' }}</p>
                                            <p class="mb-1"><strong>City:</strong> {{ $student->city ?? 'N/A' }}</p>
                                            <p class="mb-1"><strong>Teach By:</strong> {{ $student->availability_status ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                   <div>
                        <img class="not-found-img w-100" src="{{ asset('images/not-found.jpeg') }}" />
                     </div>
                @endif

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4 custom-pagination">
                    {{ $paginatedStudents->links() }}
                </div>
            </div>

            <!-- Right side: video -->
            <div class="col-lg-3 mb-3">
                <video src="{{ asset('images/video.mp4') }}" class="w-100 rounded" autoplay muted loop></video>
            </div>
        </div>
    </div>
</section>


        <!-- <section>
            <div class="row g-3">
                
                <div  class="col col-lg-3  my-3 p-0">
                    <video src="{{asset('images/video.mp4')}}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                </div>
            </div>
            
        </section> -->


     </div>

    @endsection 
    @section('js')<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


      function fetchFilteredStudents() {
    let selectedGender = $('#gender').val();
    let selectedCountry = $('#country').val();

    let filterData = {
        gender: selectedGender,
        country: selectedCountry !== "all" ? selectedCountry : "all"
    };

    console.log("🔍 Applying filters:", filterData);

    $('#overlay').show();

    $.ajax({
        type: 'POST',
        url: '{{ route("fetch-stduent-data") }}',
        data: filterData,
        dataType: 'json',
        success: function (response) {
            $('#tutorsContainer').empty();
            $('#overlay').hide();

            if (response && response.students && response.students.length > 0) {
                response.students.forEach(function (student) {
                    let studentHTML = `
                        <div class="mb-4">
                            <div class="p-4 border border-success rounded">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="${student.profileImage ? '/storage/' + student.profileImage : '/images/avatar.png'}" 
                                             alt="Student Image" class="img-thumbnail" style="height: 150px; width: 100%">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-1"><strong>Name:</strong> ${student.name ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Contact Email:</strong> ${student.email ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Subject:</strong> ${student.subject ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Phone:</strong> ${student.phone ?? 'N/A'}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="mb-1"><strong>Gender:</strong> ${student.gender ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Country:</strong> ${student.country_name ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>City:</strong> ${student.city ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Teach By:</strong> ${student.availability_status ?? 'N/A'}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $('#tutorsContainer').append(studentHTML);
                });

                // Pagination
                const total = response.pagination.total;
                const perPage = response.pagination.perPage;
                const currentPage = response.pagination.currentPage;
                const firstItem = (currentPage - 1) * perPage + 1;
                const lastItem = Math.min(currentPage * perPage, total);

                $('.total-tutors-count').text(total);
                $('.tutors-range').text(`${firstItem} to ${lastItem} of ${total} students`);

                if (total <= perPage) {
                    $('#paginationContainer').hide();
                } else {
                    $('#paginationContainer').show().html(response.pagination);
                }
            } else {
                    const notFoundImage = "{{ asset('images/not-found.jpeg') }}";
                     $('#tutorsContainer').append(`<img class="not-found-img w-100" src="${notFoundImage}" />`);
                $('#paginationContainer').hide();
            }
        },
        error: function (xhr) {
            console.error("❌ AJAX Error:", xhr.responseText);
            $('#overlay').hide();
        }
    });
}

// Bind both filters to the same function
$('#gender, #country').on('change', function () {
    fetchFilteredStudents();
});

$('#resetFilter').on('click', function () {
    // Reset the filters to default values
    $('#gender').val('Male'); // Set your default gender
    $('#country').val('AE'); // Set your default country

    console.log("🔄 Resetting filters to default: Male & Pakistan");

    let filterData = {
        gender: 'Male',
        country: 'AE'
    };

    $('#overlay').show(); // Show loading overlay

    $.ajax({
        type: 'POST',
        url: '{{ route("fetch-stduent-data") }}', // Use correct route
        data: filterData,
        dataType: 'json',
        success: function (response) {
            $('#tutorsContainer').empty();
            $('#overlay').hide();

            if (response && response.students && response.students.length > 0) {
                response.students.forEach(function (student) {
                    let studentHTML = `
                        <div class="mb-4">
                            <div class="p-4 border border-success rounded">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="${student.profileImage ? '/storage/' + student.profileImage : '/images/avatar.png'}" 
                                             alt="Student Image" class="img-thumbnail" style="height: 150px; width: 100%">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-1"><strong>Name:</strong> ${student.name ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Contact Email:</strong> ${student.email ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Subject:</strong> ${student.subject ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Phone:</strong> ${student.phone ?? 'N/A'}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="mb-1"><strong>Gender:</strong> ${student.gender ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Country:</strong> ${student.country_name ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>City:</strong> ${student.city ?? 'N/A'}</p>
                                        <p class="mb-1"><strong>Teach By:</strong> ${student.availability_status ?? 'N/A'}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $('#tutorsContainer').append(studentHTML);
                });

                // Pagination Info
                const total = response.pagination.total;
                const perPage = response.pagination.perPage;
                const currentPage = response.pagination.currentPage;
                const firstItem = (currentPage - 1) * perPage + 1;
                const lastItem = Math.min(currentPage * perPage, total);

                $('.total-tutors-count').text(total);
                $('.tutors-range').text(`${firstItem} to ${lastItem} of ${total} students`);

                if (total <= perPage) {
                    $('#paginationContainer').hide();
                } else {
                    $('#paginationContainer').show().html(response.pagination);
                }
            } else {
                    const notFoundImage = "{{ asset('images/not-found.jpeg') }}";
                     $('#tutorsContainer').append(`<img class="not-found-img w-100" src="${notFoundImage}" />`);
                $('#paginationContainer').hide();
            }
        },
        error: function (xhr) {
            console.error("❌ AJAX Error:", xhr.responseText);
            $('#overlay').hide();
        }
    });
});
});
</script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".dropdownButton").forEach((button) => {
                button.addEventListener("click", (event) => {
                    document.querySelectorAll(".dropdown-menu-box").forEach((menu) => {
                        if (menu !== button.nextElementSibling) {
                            menu.style.display = "none";
                        }
                    });
    
                    const dropdownMenu = button.nextElementSibling;
                    dropdownMenu.style.display =
                        dropdownMenu.style.display === "block" ? "none" : "block";
    
                    event.stopPropagation();
                });
            });
    
            document.addEventListener("click", () => {
                document.querySelectorAll(".dropdown-menu-box").forEach((menu) => {
                    menu.style.display = "none";
                });
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  

    <script>
           document.getElementById("heartIcon").addEventListener("click", function() {
            let heart = this.querySelector("i");
            heart.classList.toggle("fa-regular");
            heart.classList.toggle("fa-solid");
            heart.classList.toggle("liked");
        });
    </script>


  <script>
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach((alert) => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>
   
    <script>
        const ctx1 = document.getElementById('overviewChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Overview',
                    data: [10, 20, 30, 40, 50, 60],
                    borderColor: '#4CAF50',
                    fill: false
                }]
            }
        });
        const ctx2 = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    data: [50, 30, 20],
                    backgroundColor: ['#4CAF50', '#66BB6A', '#81C784']
                }]
            }
        });
    </script>
</body>
</html>
