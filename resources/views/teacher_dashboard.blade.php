@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Hired tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-KIT.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
<style>
/* filter-section */
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

/*  */



/*  */
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
@endif
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
            <div class="banner-content">
                <h1 class="aa fs-2" style="margin-top:10rem;" > {{ __('messages.Edexcel Academically with tailored tutoring and professional guidance') }}</h1>
            </div>
            {{-- <button class="p-2  btn-an rounded border-0 text-light">
                    Student
                </button> --}}
        </section>
       
        <!--  -->
        <section>
    <div class="container pt-5">
        <div class="row ">
            <div class="col-xl-8 col-lg-12">
                <div class="row py-4" style="border:3px solid #1cc88a;">
                    <div class="col-md-2">
                        <div id="waste1">
                            <div class="img-wrapper1">
                                <img src="{{ asset('images/kids.jpg') }}" class="img-fluid" alt="no img">
                            </div>
                            <div class="col-md-4" id="waste" style="display: none;">
                                <div class="d-flex">
                                    <h4 class="me-2 fw-bold">Elouise v.</h4>
                                    <span class="me-3"><i class="fa-regular fa-star"></i></span>
                                    <div class="img-wrapper" style="max-width: 30px !important;">
                                        <img src="{{ asset('images/flag.svg') }}" class="img-fluid" alt="no img">
                                    </div>
                                </div>
                                <div class="d-flex mt-md-5 mt-2" id="for-320">
                                    <div class="me-md-5 me-3" id="new">
                                        <div class="d-flex text-center">
                                            <span class=""><i class="fa-regular fa-star text-warning"></i></span>
                                            <h4 class="fw-bold mb-0">5</h4>
                                        </div>
                                        <p class="text-secondary fs-6">5reviews</p>
                                    </div>
                                    <div class="me-md-5 me-2" id="dollar">
                                        <h4 class="fw-bold mb-0">US$16</h4>
                                        <p class="text-secondary fs-6 ">50-min lesson</p>
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
                            <h4 class="me-2 fw-bold">Elouise v.</h4>
                            <span class="me-3"><i class="fa-regular fa-star "></i></span>
                            <div class="img-wrapper">
                                <img src="{{ asset('images/flag.svg') }}"   class="img-fluid" alt="no img">
                            </div>
                        </div>
                        <!-- <div class="mt-1">
                            <span id="pro" class="p-1 bg-primary-subtle rounded fw-bold">Professional</span>
                        </div> -->
                        <div class="d-flex text-secondary py-1">
                        <span id="pro" class="p-1 bg-primary-subtle rounded fw-bold text-dark">English</span>
                           
                            <div class="d-flex text-secondary pb-1 ms-5">
                                <span class="me-2"><i class="fas fa-briefcase icon-colored" style="font-size: 13px;color: #1cc88a;margin-top: 5px;"></i></i></span>
                                <p class="mb-0">3 years experience</p>
                            </div>
                        </div>
                        <div class="d-flex text-secondary pb-1">
                            <div class="d-flex text-secondary pb-1">
                                <span class="me-2"><i class="fa-solid fa-user-graduate" style="font-size: 13px;color: #1cc88a;margin-top: 5px;"></i></span>
                                <p class="mb-0">physics</p>
                                <div class="d-flex" id="calendericon">
                                    <span class="me-1"><i class="fa-solid fa-calendar-days" style="font-size: 13px;color: #1cc88a;margin-top: 5px;"></i></span>
                                    <p class="mb-0">19-02-1984</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex text-secondary pb-1">
                            <span class="me-2"><i class="fa-solid fa-phone-volume" style="font-size: 13px;color: #1cc88a;margin-top: 5px;"></i></span>
                            <p class="mb-0">097-123-456-789</p>
                        </div>
                        <div class="d-flex text-secondary">
                            <span class="me-2"><i class="fa-solid fa-user" style="font-size: 13px;color: #1cc88a;margin-top: 5px;"></i></span>
                            <p class="mb-0">17 active students • 8 lessons</p>
                        </div>
                        <!-- <div class="d-flex text-secondary py-2">
                            <span class="me-2"><i class="fa-solid fa-language" style="font-size: 13px;"></i></span>
                            <p class="mb-0" id="on-1024">Speaks English (Native), French (Pre-Intermediate)</p>
                            <p class="mb-0" id="on-768">Speaks English (Native), Fre....</p>
                        </div> -->

                        <!-- experience or read more -->


                        <div class="py-2">
                            <span class="text-secondary">
                                I am <b>Haris</b>, with <b>two years of experience</b> in the field of <b>Physics</b>. I have a basic proficiency <b>(A2 level)</b> in <b>English</b>.and completed my education at the <b>National University of Sciences and Technology</b>.
                            </span>
                            <ul class="read p-0 mt-3">
                                <li style="list-style: none;"><a class="fw-bold" href="">Read More</a></li>
                            </ul>
                        </div>



                        <!-- end -->



                    </div>
                    <div class="col-md-4">
                        <div class="d-flex pb-5" id="ff111">
                            <!-- <div class="me-5" id="new">
                                <h4 class="fw-bold" style="color: #1cc88a;">New</h4>
                                <p class="text-secondary fs-6">Tutor</p>
                            </div> -->
                            <div class="me-lg-5" id="dollar" >
                                <h4 class="fw-bold" style="color: #1cc88a;">$16</h4>
                                <p class="text-secondary fs-6">50-min lesson</p>
                            </div>
                            <span id="heartIcon ms-">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                        </div>
                        <div>
                            <div class="pt-5" id="btn-container">
                                <button type="button" class="btn4 btn-outline-dark rounded fw-bold text-light">Book Trail Lesson</button>
                            </div>
                        </div>
                        <div>
                            <div class="pt-3" id="btn-container">
                                <button type="button" class="btn4 btn-outline-dark rounded fw-bold text-light">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col col-lg-3  mb-3 p-0">
                    <video src="{{asset('images/video.mp4')}}" class="object-fit-cover m-0" autoplay muted loop width="100%"></video>
                </div>
        </div>
    </div>
</section>
        <!--  -->

        <!-- <section>
            <div class="row g-3">
                
                <div  class="col col-lg-3  my-3 p-0">
                    <video src="{{asset('images/video.mp4')}}" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
                </div>
            </div>
            
        </section> -->


     </div>

    @endsection
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
    <script>// Disable Right Click
        document.addEventListener("contextmenu", (event) => event.preventDefault());
        
        // Disable Keyboard Shortcuts
        document.addEventListener("keydown", function (event) {
            if (
                event.ctrlKey && 
                (event.key === "u" || event.key === "U" ||  // View Source
                 event.key === "s" || event.key === "S" ||  // Save Page
                 event.key === "i" || event.key === "I" ||  // DevTools
                 event.key === "j" || event.key === "J" ||  // Console
                 event.key === "c" || event.key === "C")    // Copy
            ) {
                event.preventDefault();
            }
        
            // Disable F12
            if (event.key === "F12") {
                event.preventDefault();
            }
        });
        
        // Block Developer Console (Anti Debugging)
        (function() {
            let openConsole = false;
            setInterval(() => {
                console.profile();
                console.profileEnd();
                if (console.clear) console.clear();
                if (openConsole) {
                    document.body.innerHTML = "";
                    alert("Developer tools are disabled!");
                    window.location.reload();
                }
            }, 1000);
            Object.defineProperty(console, 'profile', {
                get: function() {
                    openConsole = true;
                    throw new Error("Console is disabled!");
                }
            });
        })();  </script>
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
