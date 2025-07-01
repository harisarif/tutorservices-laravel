<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edexcel Online Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/home.css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css/style2.css') }}">
<link rel="stylesheet" href="{{asset('css/figma.css')}}" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <i class="fas fa-phone me-2"></i> +875 784 5682
                    <i class="fas fa-envelope ms-3 me-2"></i> edexceledu@gmail.com
                    <i class="fas fa-map-marker-alt ms-3 me-2"></i> 238, Arimantab, Moska - USA
                </div>
                <div class="col-md-4 text-md-end">

                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm p-0">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold p-0 m-0" href="#"><img src="{{asset('homeImage/logo.jpg')}}" alt="Edecxel"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
          <div class="get-started-header">
    {{-- Guest view: Show Register and Login --}}
    @guest
        <a href="{{ route('basicsignup') }}">
            <button class="primary-btn">
                Register
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                        <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </a>

        <a href="{{ route('login') }}">
            <button class="primary-btn">
                Login
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                        <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </a>
    @endguest

    {{-- Auth view: Show Logout for any logged-in user --}}
    @auth
        @if (Auth::user()->role === 'user')
            
        @endif

        {{-- Logout form --}}
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
    <a class="" href="{{ route('logout') }}">        <button type="submit" class="primary-btn">  
                Logout
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                        <path d="M6.4707 2.2207L1.4707 8.2207L6.4707 14.2207" stroke="white" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16.4707 8.2207H1.4707" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button> </a>
        </form>
    @endauth
</div>

        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section position-relative">
        <div class="container" style="z-index: 4; position: relative;">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h4 class="hero-pretitle">WELCOME EDEXCEL ONLINE COURSES.</h4>
                    <h2 class="hero-title">Edexcel Academically With Tailored Tutoring And Professional Guidance</h2>
                    <p class="mb-4">We are experienced in education platform and skilled strategies for the success of
                        our online learning.</p>
                    <button class="primary-btn">
                        Request a Tutor
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15"
                                fill="none">
                                <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white"
                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <img src="{{asset('homeImage/dots.png')}}" class="dots" alt="">
        <spna class="tutor-span">
            <h3><span class="text-primary">+200 </span>Tutors</h3>
            <img src="{{asset('homeImage/tutor-banner.png')}}" alt="">
        </spna>
        <img src="{{asset('homeImage/5c59f5b1f89aa3bf34e0e8a6afa3bc296d7128e5.jpg')}}" class="banner-image" alt="">
    </section>

    <!-- Services Section -->
    <section class="padding-120">
        <div class="container">
            <span class="primary-badge mx-auto mb-3">SERVICES</span>
            <h2 class="text-center section-title">Our Services</h2>
            <div class="row g-3 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4">
                        <div class="service-icon">
                            <img src="{{asset('homeImage/teacher.png')}}" width="54" alt="">
                        </div>
                        <h3>ONLINE CLASSES</h3>
                        <p>Duis aute irure dolor reprehenderit in voluptate velit esse cillum dolore fugiat nulla
                            pariatur Excepteur</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card service-card active text-center p-4">
                        <div class="service-icon active">
                            <img src="{{asset('homeImage/student.png')}}" width="54" alt="">
                        </div>
                        <h3>ONLINE TUTORS</h3>
                        <p>Duis aute irure dolor reprehenderit in voluptate velit esse cillum dolore fugiat nulla
                            pariatur. Excepteur</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card service-card text-center p-4">
                        <div class="service-icon">
                            <img src="{{asset('homeImage/mic.png')}}" width="54" alt="">
                        </div>
                        <h3>SUPPORT</h3>
                        <p>Duis aute irure dolor reprehenderit in voluptate velit esse cillum dolore fugiat nulla
                            pariatur Excepteur</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tutors Section -->
    <section class="padding-120 bg-light">
        <div class="container">
            <span class="primary-badge mb-3">OUR TUTORS</span>
            <h2 class="section-title">Discover Your Tutor</h2>

            <div class="search-box row g-3">
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Search Tutor...">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn-warning warning-btn">Reset Filter</button>
                </div>
            </div>

            <div class="row mb-4 g-3">
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Please Select A Country</label>
                    <select class="form-select">
                        <option>Afghanistan</option>
                        <option>USA</option>
                        <option>UK</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Gender Selection</label>
                    <select class="form-select">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Which Subject Interests You?</label>
                    <select class="form-select">
                        <option>Accounting</option>
                        <option>Mathematics</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Price Selection</label>
                    <select class="form-select">
                        <option>$0-$50</option>
                        <option>$50-$100</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Add Varified</label>
                    <select class="form-select">
                        <option value="">Select</option>
                        <option>$0-$50</option>
                        <option>$50-$100</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <label for="" class="small-label">Select Tutor</label>
                    <select class="form-select">
                        <option value="">Select</option>
                        <option>$0-$50</option>
                        <option>$50-$100</option>
                    </select>
                </div>
            </div>
            
                  
           @if ($tutors->count() > 0)
    <div class="row">
        @foreach ($tutors as $item)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="tutor-card d-flex flex-column w-100">
                        <div class="image-section">
                            <img src="{{asset('homeImage/Link.png')}}" alt="">
                            <span class="course-badge">Aerospace Engineering</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 align-items-center">
                            <h3 class="display-6">Haris Arif</h3>
                            <div class="d-flex justify-content-end gap-1 align-items-center">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$50.00</div>
                            </div>
                        </div>
                        <p class="content">1+ Years Of Air Conditioning And Refrigeration Service Teaching Experience:
                            Your Air
                            Conditioning And Refrigeration Service Success, Guaranteed. - Hello, My Name Is Haris. I
                            Have 1+ Years Of Experience As A Air Conditioning And
                            Refrigeration Service Teacher & Tutor.</p>
                        <div class="d-flex justify-content-between mt-3 info-bar">
                            <span class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"
                                    fill="none">
                                    <path
                                        d="M7.875 7.26953V9.01953H2.625V7.26953H7.875ZM10.3086 3.14062C10.4362 3.26823 10.5 3.42318 10.5 3.60547V3.76953H7V0.269531H7.16406C7.34635 0.269531 7.5013 0.333333 7.62891 0.460938L10.3086 3.14062ZM6.125 3.98828C6.125 4.17057 6.1888 4.32552 6.31641 4.45312C6.44401 4.58073 6.59896 4.64453 6.78125 4.64453H10.5V13.6133C10.5 13.7956 10.4362 13.9505 10.3086 14.0781C10.181 14.2057 10.026 14.2695 9.84375 14.2695H0.65625C0.473958 14.2695 0.31901 14.2057 0.191406 14.0781C0.0638021 13.9505 0 13.7956 0 13.6133V0.925781C0 0.74349 0.0638021 0.588542 0.191406 0.460938C0.31901 0.333333 0.473958 0.269531 0.65625 0.269531H6.125V3.98828ZM1.75 2.23828V2.67578C1.75 2.82161 1.82292 2.89453 1.96875 2.89453H4.15625C4.30208 2.89453 4.375 2.82161 4.375 2.67578V2.23828C4.375 2.09245 4.30208 2.01953 4.15625 2.01953H1.96875C1.82292 2.01953 1.75 2.09245 1.75 2.23828ZM1.75 3.98828V4.42578C1.75 4.57161 1.82292 4.64453 1.96875 4.64453H4.15625C4.30208 4.64453 4.375 4.57161 4.375 4.42578V3.98828C4.375 3.84245 4.30208 3.76953 4.15625 3.76953H1.96875C1.82292 3.76953 1.75 3.84245 1.75 3.98828ZM8.75 12.3008V11.8633C8.75 11.7174 8.67708 11.6445 8.53125 11.6445H6.34375C6.19792 11.6445 6.125 11.7174 6.125 11.8633V12.3008C6.125 12.4466 6.19792 12.5195 6.34375 12.5195H8.53125C8.67708 12.5195 8.75 12.4466 8.75 12.3008ZM8.75 6.83203C8.75 6.70443 8.70443 6.60417 8.61328 6.53125C8.54036 6.4401 8.4401 6.39453 8.3125 6.39453H2.1875C2.0599 6.39453 1.95052 6.4401 1.85938 6.53125C1.78646 6.60417 1.75 6.70443 1.75 6.83203V9.45703C1.75 9.58464 1.78646 9.69401 1.85938 9.78516C1.95052 9.85807 2.0599 9.89453 2.1875 9.89453H8.3125C8.4401 9.89453 8.54036 9.85807 8.61328 9.78516C8.70443 9.69401 8.75 9.58464 8.75 9.45703V6.83203Z"
                                        fill="black" />
                                </svg>
                                <span>Albanian(Cl)</span>
                            </span>
                            <span class="text-muted">
                                <span>Male</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                    fill="none">
                                    <path
                                        d="M8.58594 6.25781C7.91146 6.93229 7.09115 7.26953 6.125 7.26953C5.15885 7.26953 4.32943 6.93229 3.63672 6.25781C2.96224 5.5651 2.625 4.73568 2.625 3.76953C2.625 2.80339 2.96224 1.98307 3.63672 1.30859C4.32943 0.615885 5.15885 0.269531 6.125 0.269531C7.09115 0.269531 7.91146 0.615885 8.58594 1.30859C9.27865 1.98307 9.625 2.80339 9.625 3.76953C9.625 4.73568 9.27865 5.5651 8.58594 6.25781ZM8.58594 8.14453C9.58854 8.14453 10.4453 8.50911 11.1562 9.23828C11.8854 9.94922 12.25 10.806 12.25 11.8086V12.957C12.25 13.3216 12.1224 13.6315 11.8672 13.8867C11.612 14.1419 11.3021 14.2695 10.9375 14.2695H1.3125C0.947917 14.2695 0.638021 14.1419 0.382812 13.8867C0.127604 13.6315 0 13.3216 0 12.957V11.8086C0 10.806 0.355469 9.94922 1.06641 9.23828C1.79557 8.50911 2.66146 8.14453 3.66406 8.14453H4.12891C4.76693 8.4362 5.43229 8.58203 6.125 8.58203C6.81771 8.58203 7.48307 8.4362 8.12109 8.14453H8.58594Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <span class="text-muted">
                                <span>13-05-1985</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                    fill="none">
                                    <path
                                        d="M2.70703 2.48438C4.03776 1.15365 5.64193 0.488281 7.51953 0.488281C9.39714 0.488281 10.9922 1.15365 12.3047 2.48438C13.6354 3.79688 14.3008 5.39193 14.3008 7.26953C14.3008 9.14714 13.6354 10.7513 12.3047 12.082C10.9922 13.3945 9.39714 14.0508 7.51953 14.0508C5.64193 14.0508 4.03776 13.3945 2.70703 12.082C1.39453 10.7513 0.738281 9.14714 0.738281 7.26953C0.738281 5.39193 1.39453 3.79688 2.70703 2.48438ZM9.07812 10.0586C9.26042 10.1862 9.41536 10.168 9.54297 10.0039L10.3086 8.9375C10.4362 8.75521 10.418 8.60026 10.2539 8.47266L8.50391 7.21484V3.44141C8.50391 3.22266 8.39453 3.11328 8.17578 3.11328H6.86328C6.64453 3.11328 6.53516 3.22266 6.53516 3.44141V8.03516C6.53516 8.14453 6.58073 8.23568 6.67188 8.30859L9.07812 10.0586Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between gap-3 mt-3">
                           @if(Auth::check() && Auth::user()->role === 'user')
    <a href="{{ route('zoom.send.meeting.email', ['student_id' => Auth::user()->id, 'teacher_id' => $item->teacher_id]) }}"
       class="primary-btn-2 flex-grow-1 d-flex align-items-center justify-content-center px-3 py-2"
       style="text-decoration: none;"
       title="Zoom Meet">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 24 24">
            <path d="M17 10.5V7c0-1.1-.9-2-2-2H4C2.9 5 2 5.9 2 7v10c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-3.5l4 4v-11l-4 4z"/>
        </svg>
        <span class="ms-2">Zoom Meet</span>
    </a>
@else
    <a href="javascript:void(0);"
       data-bs-toggle="modal" data-bs-target="#signupPromptModal"
       class="primary-btn-2 flex-grow-1 d-flex align-items-center justify-content-center px-3 py-2"
       style="text-decoration: none;"
       title="Sign up to join Zoom Meet">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 24 24">
            <path d="M17 10.5V7c0-1.1-.9-2-2-2H4C2.9 5 2 5.9 2 7v10c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-3.5l4 4v-11l-4 4z"/>
        </svg>
        <span class="ms-2">Zoom Meet</span>
    </a>
@endif
   {{-- //request a demo code --}}
                         @if(Auth::check() && Auth::user()->role === 'user')
    <button type="button"
            id="demo"
            data-teacher-id="{{ $item->teacher_id }}"
            class="primary-btn-2 flex-grow-1 d-flex align-items-center justify-content-center  request-demo-btn" style="width: 130px;
    height: 45px;"
            title="Request a Demo">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-2.83.48-5.42-.48-7.07-2.27a9.015 9.015 0 0 1-1.71-9.37c.2-.52.92-.66 1.33-.26l4.07 4.07V7h2v6h-4l4.59 4.59c.39.39.39 1.02 0 1.41-.26.26-.64.36-1 .26z"/>
        </svg>
        <span class="ms-2">Request a Demo</span>
    </button>
@else
    <button type="button"
            id="demo"
            data-bs-toggle="modal"
            data-bs-target="#signupPromptModal"
            class="primary-btn-2 flex-grow-1 d-flex align-items-center justify-content-center "  style="width: 130px;
    height: 45px;"
            title="Sign up to request a demo">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-2.83.48-5.42-.48-7.07-2.27a9.015 9.015 0 0 1-1.71-9.37c.2-.52.92-.66 1.33-.26l4.07 4.07V7h2v6h-4l4.59 4.59c.39.39.39 1.02 0 1.41-.26.26-.64.36-1 .26z"/>
        </svg>
        <span class="ms-2">Request a Demo</span>
    </button>
@endif


                        </div>
                    </div>
              </div>
        @endforeach
    </div>
@endif  <!-- Display pagination links -->
                <div id="paginationContainer">
                    {{ $tutors->links('custom-pagination') }}
                </div>
                {{-- <div class="col-12 col-md-6 col-lg-4">
                    <div class="tutor-card">
                        <div class="image-section">
                            <img src="{{asset('homeImage/Link.png')}}" alt="">
                            <span class="course-badge">Aerospace Engineering</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 align-items-center">
                            <h3 class="display-6">Haris Arif</h3>
                            <div class="d-flex justify-content-end gap-1 align-items-center">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$50.00</div>
                            </div>
                        </div>
                        <p class="content">1+ Years Of Air Conditioning And Refrigeration Service Teaching Experience:
                            Your Air
                            Conditioning And Refrigeration Service Success, Guaranteed. - Hello, My Name Is Haris. I
                            Have 1+ Years Of Experience As A Air Conditioning And
                            Refrigeration Service Teacher & Tutor.</p>
                        <div class="d-flex justify-content-between mt-3 info-bar">
                            <span class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"
                                    fill="none">
                                    <path
                                        d="M7.875 7.26953V9.01953H2.625V7.26953H7.875ZM10.3086 3.14062C10.4362 3.26823 10.5 3.42318 10.5 3.60547V3.76953H7V0.269531H7.16406C7.34635 0.269531 7.5013 0.333333 7.62891 0.460938L10.3086 3.14062ZM6.125 3.98828C6.125 4.17057 6.1888 4.32552 6.31641 4.45312C6.44401 4.58073 6.59896 4.64453 6.78125 4.64453H10.5V13.6133C10.5 13.7956 10.4362 13.9505 10.3086 14.0781C10.181 14.2057 10.026 14.2695 9.84375 14.2695H0.65625C0.473958 14.2695 0.31901 14.2057 0.191406 14.0781C0.0638021 13.9505 0 13.7956 0 13.6133V0.925781C0 0.74349 0.0638021 0.588542 0.191406 0.460938C0.31901 0.333333 0.473958 0.269531 0.65625 0.269531H6.125V3.98828ZM1.75 2.23828V2.67578C1.75 2.82161 1.82292 2.89453 1.96875 2.89453H4.15625C4.30208 2.89453 4.375 2.82161 4.375 2.67578V2.23828C4.375 2.09245 4.30208 2.01953 4.15625 2.01953H1.96875C1.82292 2.01953 1.75 2.09245 1.75 2.23828ZM1.75 3.98828V4.42578C1.75 4.57161 1.82292 4.64453 1.96875 4.64453H4.15625C4.30208 4.64453 4.375 4.57161 4.375 4.42578V3.98828C4.375 3.84245 4.30208 3.76953 4.15625 3.76953H1.96875C1.82292 3.76953 1.75 3.84245 1.75 3.98828ZM8.75 12.3008V11.8633C8.75 11.7174 8.67708 11.6445 8.53125 11.6445H6.34375C6.19792 11.6445 6.125 11.7174 6.125 11.8633V12.3008C6.125 12.4466 6.19792 12.5195 6.34375 12.5195H8.53125C8.67708 12.5195 8.75 12.4466 8.75 12.3008ZM8.75 6.83203C8.75 6.70443 8.70443 6.60417 8.61328 6.53125C8.54036 6.4401 8.4401 6.39453 8.3125 6.39453H2.1875C2.0599 6.39453 1.95052 6.4401 1.85938 6.53125C1.78646 6.60417 1.75 6.70443 1.75 6.83203V9.45703C1.75 9.58464 1.78646 9.69401 1.85938 9.78516C1.95052 9.85807 2.0599 9.89453 2.1875 9.89453H8.3125C8.4401 9.89453 8.54036 9.85807 8.61328 9.78516C8.70443 9.69401 8.75 9.58464 8.75 9.45703V6.83203Z"
                                        fill="black" />
                                </svg>
                                <span>Albanian(Cl)</span>
                            </span>
                            <span class="text-muted">
                                <span>Male</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                    fill="none">
                                    <path
                                        d="M8.58594 6.25781C7.91146 6.93229 7.09115 7.26953 6.125 7.26953C5.15885 7.26953 4.32943 6.93229 3.63672 6.25781C2.96224 5.5651 2.625 4.73568 2.625 3.76953C2.625 2.80339 2.96224 1.98307 3.63672 1.30859C4.32943 0.615885 5.15885 0.269531 6.125 0.269531C7.09115 0.269531 7.91146 0.615885 8.58594 1.30859C9.27865 1.98307 9.625 2.80339 9.625 3.76953C9.625 4.73568 9.27865 5.5651 8.58594 6.25781ZM8.58594 8.14453C9.58854 8.14453 10.4453 8.50911 11.1562 9.23828C11.8854 9.94922 12.25 10.806 12.25 11.8086V12.957C12.25 13.3216 12.1224 13.6315 11.8672 13.8867C11.612 14.1419 11.3021 14.2695 10.9375 14.2695H1.3125C0.947917 14.2695 0.638021 14.1419 0.382812 13.8867C0.127604 13.6315 0 13.3216 0 12.957V11.8086C0 10.806 0.355469 9.94922 1.06641 9.23828C1.79557 8.50911 2.66146 8.14453 3.66406 8.14453H4.12891C4.76693 8.4362 5.43229 8.58203 6.125 8.58203C6.81771 8.58203 7.48307 8.4362 8.12109 8.14453H8.58594Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <span class="text-muted">
                                <span>13-05-1985</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                    fill="none">
                                    <path
                                        d="M2.70703 2.48438C4.03776 1.15365 5.64193 0.488281 7.51953 0.488281C9.39714 0.488281 10.9922 1.15365 12.3047 2.48438C13.6354 3.79688 14.3008 5.39193 14.3008 7.26953C14.3008 9.14714 13.6354 10.7513 12.3047 12.082C10.9922 13.3945 9.39714 14.0508 7.51953 14.0508C5.64193 14.0508 4.03776 13.3945 2.70703 12.082C1.39453 10.7513 0.738281 9.14714 0.738281 7.26953C0.738281 5.39193 1.39453 3.79688 2.70703 2.48438ZM9.07812 10.0586C9.26042 10.1862 9.41536 10.168 9.54297 10.0039L10.3086 8.9375C10.4362 8.75521 10.418 8.60026 10.2539 8.47266L8.50391 7.21484V3.44141C8.50391 3.22266 8.39453 3.11328 8.17578 3.11328H6.86328C6.64453 3.11328 6.53516 3.22266 6.53516 3.44141V8.03516C6.53516 8.14453 6.58073 8.23568 6.67188 8.30859L9.07812 10.0586Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between gap-3 mt-3">
                            <button class="primary-btn-2 flex-grow-1">Send Message</button>
                            <button class="primary-btn-2 flex-grow-1">Enroll</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="tutor-card">
                        <div class="image-section">
                            <img src="{{asset('homeImage/Link.png')}}" alt="">
                            <span class="course-badge">Aerospace Engineering</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 align-items-center">
                            <h3 class="display-6">Haris Arif</h3>
                            <div class="d-flex justify-content-end gap-1 align-items-center">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">$50.00</div>
                            </div>
                        </div>
                        <p class="content">1+ Years Of Air Conditioning And Refrigeration Service Teaching Experience:
                            Your Air
                            Conditioning And Refrigeration Service Success, Guaranteed. - Hello, My Name Is Haris. I
                            Have 1+ Years Of Experience As A Air Conditioning And
                            Refrigeration Service Teacher & Tutor.</p>
                        <div class="d-flex justify-content-between mt-3 info-bar">
                            <span class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"
                                    fill="none">
                                    <path
                                        d="M7.875 7.26953V9.01953H2.625V7.26953H7.875ZM10.3086 3.14062C10.4362 3.26823 10.5 3.42318 10.5 3.60547V3.76953H7V0.269531H7.16406C7.34635 0.269531 7.5013 0.333333 7.62891 0.460938L10.3086 3.14062ZM6.125 3.98828C6.125 4.17057 6.1888 4.32552 6.31641 4.45312C6.44401 4.58073 6.59896 4.64453 6.78125 4.64453H10.5V13.6133C10.5 13.7956 10.4362 13.9505 10.3086 14.0781C10.181 14.2057 10.026 14.2695 9.84375 14.2695H0.65625C0.473958 14.2695 0.31901 14.2057 0.191406 14.0781C0.0638021 13.9505 0 13.7956 0 13.6133V0.925781C0 0.74349 0.0638021 0.588542 0.191406 0.460938C0.31901 0.333333 0.473958 0.269531 0.65625 0.269531H6.125V3.98828ZM1.75 2.23828V2.67578C1.75 2.82161 1.82292 2.89453 1.96875 2.89453H4.15625C4.30208 2.89453 4.375 2.82161 4.375 2.67578V2.23828C4.375 2.09245 4.30208 2.01953 4.15625 2.01953H1.96875C1.82292 2.01953 1.75 2.09245 1.75 2.23828ZM1.75 3.98828V4.42578C1.75 4.57161 1.82292 4.64453 1.96875 4.64453H4.15625C4.30208 4.64453 4.375 4.57161 4.375 4.42578V3.98828C4.375 3.84245 4.30208 3.76953 4.15625 3.76953H1.96875C1.82292 3.76953 1.75 3.84245 1.75 3.98828ZM8.75 12.3008V11.8633C8.75 11.7174 8.67708 11.6445 8.53125 11.6445H6.34375C6.19792 11.6445 6.125 11.7174 6.125 11.8633V12.3008C6.125 12.4466 6.19792 12.5195 6.34375 12.5195H8.53125C8.67708 12.5195 8.75 12.4466 8.75 12.3008ZM8.75 6.83203C8.75 6.70443 8.70443 6.60417 8.61328 6.53125C8.54036 6.4401 8.4401 6.39453 8.3125 6.39453H2.1875C2.0599 6.39453 1.95052 6.4401 1.85938 6.53125C1.78646 6.60417 1.75 6.70443 1.75 6.83203V9.45703C1.75 9.58464 1.78646 9.69401 1.85938 9.78516C1.95052 9.85807 2.0599 9.89453 2.1875 9.89453H8.3125C8.4401 9.89453 8.54036 9.85807 8.61328 9.78516C8.70443 9.69401 8.75 9.58464 8.75 9.45703V6.83203Z"
                                        fill="black" />
                                </svg>
                                <span>Albanian(Cl)</span>
                            </span>
                            <span class="text-muted">
                                <span>Male</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                    fill="none">
                                    <path
                                        d="M8.58594 6.25781C7.91146 6.93229 7.09115 7.26953 6.125 7.26953C5.15885 7.26953 4.32943 6.93229 3.63672 6.25781C2.96224 5.5651 2.625 4.73568 2.625 3.76953C2.625 2.80339 2.96224 1.98307 3.63672 1.30859C4.32943 0.615885 5.15885 0.269531 6.125 0.269531C7.09115 0.269531 7.91146 0.615885 8.58594 1.30859C9.27865 1.98307 9.625 2.80339 9.625 3.76953C9.625 4.73568 9.27865 5.5651 8.58594 6.25781ZM8.58594 8.14453C9.58854 8.14453 10.4453 8.50911 11.1562 9.23828C11.8854 9.94922 12.25 10.806 12.25 11.8086V12.957C12.25 13.3216 12.1224 13.6315 11.8672 13.8867C11.612 14.1419 11.3021 14.2695 10.9375 14.2695H1.3125C0.947917 14.2695 0.638021 14.1419 0.382812 13.8867C0.127604 13.6315 0 13.3216 0 12.957V11.8086C0 10.806 0.355469 9.94922 1.06641 9.23828C1.79557 8.50911 2.66146 8.14453 3.66406 8.14453H4.12891C4.76693 8.4362 5.43229 8.58203 6.125 8.58203C6.81771 8.58203 7.48307 8.4362 8.12109 8.14453H8.58594Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <span class="text-muted">
                                <span>13-05-1985</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                    fill="none">
                                    <path
                                        d="M2.70703 2.48438C4.03776 1.15365 5.64193 0.488281 7.51953 0.488281C9.39714 0.488281 10.9922 1.15365 12.3047 2.48438C13.6354 3.79688 14.3008 5.39193 14.3008 7.26953C14.3008 9.14714 13.6354 10.7513 12.3047 12.082C10.9922 13.3945 9.39714 14.0508 7.51953 14.0508C5.64193 14.0508 4.03776 13.3945 2.70703 12.082C1.39453 10.7513 0.738281 9.14714 0.738281 7.26953C0.738281 5.39193 1.39453 3.79688 2.70703 2.48438ZM9.07812 10.0586C9.26042 10.1862 9.41536 10.168 9.54297 10.0039L10.3086 8.9375C10.4362 8.75521 10.418 8.60026 10.2539 8.47266L8.50391 7.21484V3.44141C8.50391 3.22266 8.39453 3.11328 8.17578 3.11328H6.86328C6.64453 3.11328 6.53516 3.22266 6.53516 3.44141V8.03516C6.53516 8.14453 6.58073 8.23568 6.67188 8.30859L9.07812 10.0586Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between gap-3 mt-3">
                            <button class="primary-btn-2 flex-grow-1">Send Message</button>
                            <button class="primary-btn-2 flex-grow-1">Enroll</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>     --}}
    </section>

    <!-- About Section -->
    <section class="padding-120 about">
        <div class="container">
            <div class="row align-items-center g-3">
                <div class="col-lg-6 text-center text-lg-start">
                    <img src="{{asset('homeImage/about-section.png')}}" alt="About Edexcel" class="img-fluid rounded">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <span class="primary-badge mb-3">ABOUT EDEXCELEDU</span>
                    <h2 class="section-title">Learn & Grow Your Skills From Anywhere</h2>
                    <h3 class="mb-3"></h3>
                    <p class="mb-4 about-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris..</p>

                    <div class="row g-3">
                        <div class="col-md-6 mb-4">
                            <h4 class="about-heading">FLEXIBLE CLASSNAMEES</h4>
                            <p class="about-content">Suspendisse ultrice gravida dictum fusce placerat ultricies integer
                                quis auctor elit sed
                                vulputate mi sit.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h4 class="about-heading">FLEXIBLE CLASSNAMEES</h4>
                            <p class="about-content">Suspendisse ultrice gravida dictum fusce placerat ultricies integer
                                quis auctor elit sed
                                vulputate mi sit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="padding-120 bg-light">
        <div class="container">
            <span class="primary-badge mb-3">COURSES</span>
            <h2 class="section-title mb-3">Explore Top Courses</h2>

            <div class="row mb-4 ">
                <div class="col">
                    <ul class="nav nav-pills gap-3">
                        <li class="nav-item">
                            <a class="nav-link nav-primary active" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-primary" href="#">Data Science</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-primary" href="#">Business</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-primary" href="#">Artificial Intelligence</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-primary" href="#">Computer Science</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row g-3 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card course-card">
                        <div class="image-section">
                            <img src="{{asset('homeImage/course.png')}}" alt="Course">
                            <span class="course-badge">OxfordX</span>
                        </div>
                        <h5 class="display-6 mb-3">Artificial Intelligence: Implications For Business Strategy</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="primary-badge">Executive Education</span>
                            <span class="text-muted">3 Courses</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card course-card">
                        <div class="image-section">
                            <img src="{{asset('homeImage/course.png')}}" alt="Course">
                            <span class="course-badge">OxfordX</span>
                        </div>
                        <h5 class="display-6 mb-3">Artificial Intelligence: Implications For Business Strategy</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="primary-badge">Executive Education</span>
                            <span class="text-muted">3 Courses</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card course-card">
                        <div class="image-section">
                            <img src="{{asset('homeImage/course.png')}}" alt="Course">
                            <span class="course-badge">OxfordX</span>
                        </div>
                        <h5 class="display-6 mb-3">Artificial Intelligence: Implications For Business Strategy</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="primary-badge">Executive Education</span>
                            <span class="text-muted">3 Courses</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action">
        <div class="dark-bg">
            <div class="container padding-70">
                <h4 class="pre-heading">Join Our New Session</h4>
                <h2 class="section-title">Call To Enroll Your Child <br>(+91)958423452</h2>
                <button class="warning-btn-2">
                    Join With Us
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                            <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <!-- Inquiry Form -->
    <section class="padding-120 padding-bottom-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start">
                    <div class="max-width-550">
                        <span class="primary-badge mb-3">INQUIRY OVERVIEW</span>
                        <h3 class="section-title mb-4">Submit Your Inquiry To Request A Callback For Further Assistance
                        </h3>
                        <small class="text-muted mb-3">"Please Complete All Required Fields"</small>

                        <form method="POST" action="{{ route('inquiry-create') }}" enctype="multipart/form-data" class="mt-3">
    @csrf
    <div class="mb-3">
        <input type="text" class="form-control" name="fname" placeholder="{{ __('messages.Name') }}" required>
    </div>
    <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="{{ __('messages.Email ID') }}"
               pattern="^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$"
               title="Only Gmail, Hotmail, or Yahoo emails are allowed (e.g., example@gmail.com)" required>
    </div>
    <div class="mb-3 d-flex gap-2">
       <select name="country_code" class="form-select w-50" required>
    @foreach ($countries_prefix as $countryCode => $dialCode)
        <option value="{{ $dialCode }}"> {{ $dialCode }}</option>
    @endforeach
</select>

        <input type="text" class="form-control w-50" name="phone" placeholder="e.g +92XXXXXXXXXX" required>
    </div>
    <div class="mb-3">
        <textarea class="form-control" name="description" rows="4" placeholder="{{ __('messages.Description') }}"></textarea>
    </div>
    <button type="submit" class="btn-submit primary-btn">
        {{ __('messages.Confirm') }}
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </button>
</form>

                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <img src="{{asset('homeImage/question.png')}}" alt="Inquiry" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stat-counter row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="stat-icon">
                            <img src="{{asset('homeImage/teacher-2.png')}}" alt="">
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h4 class="stat-count">+500</h4>
                            <span class="stat-heading">Teacher</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="stat-icon">
                            <img src="{{asset('homeImage/language.png')}}" alt="">
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h4 class="stat-count">+500</h4>
                            <span class="stat-heading">Languages</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="stat-icon">
                            <img src="{{asset('homeImage/students-2.png')}}" alt="">
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h4 class="stat-count">+1000</h4>
                            <span class="stat-heading">Students</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="stat-icon">
                            <img src="{{asset('homeImage/subjects.png')}}" alt="">
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h4 class="stat-count">+1500</h4>
                            <span class="stat-heading">Subjects</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="padding-120 padding-top-180 bg-light">
        <div class="container">
            <span class="primary-badge mb-4 mx-auto">TESTIMONIALS</span>
            <h2 class="text-center section-title">Creating A Community Of <br>Life Long Learners.</h2>

            <div class="row g-5 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Lorem ipsum dolor sit amet, elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Orci nulla pellentesque dignissim enim. Amet consectetur
                            adipiscing"</p>
                        <div class="d-flex gap-1 flex-column">
                            <div class="testimonial-author">Kathy Sullivan</div>
                            <div class="testimonial-position">CEO at ordian it</div>
                        </div>
                        <span class="quttes">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="70" height="47" viewBox="0 0 70 47" fill="none">
                                <rect width="70" height="46" transform="translate(0 0.0292969)"
                                    fill="url(#pattern0_427_218)" />
                                <defs>
                                    <pattern id="pattern0_427_218" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_427_218" transform="scale(0.0142857 0.0217391)" />
                                    </pattern>
                                    <image id="image0_427_218" width="70" height="46" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAAAuCAYAAACViW+zAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAUUSURBVHgB7ZrPb+NEFMefxx7Hjps0bUKSbrcl7Ub8OCFRiZU4rYQEQmIl9tAbSJz6d+TPQPwLvay0SKBKSEjcWIK4gBB02Wq3JT/dzTZNk9hjG4+z2Q1pftkziXPYz83JSPP8nffePM88AeZAPv9ppE4iKgZDwSLGRBBk2zZExxLcJ4ToGNO0bYyj9fLxYQ0WQgGl3v5V61625FVNVYghYYIMmf4jIRH3R9kgdqrHT58IwIUCim3+tKbhWMx0TLX/8rMgtJzHpdK3VzAHNjY+i5KIHXcQxAdffipEbEnAAJ0YVEgZ1kPNXX1XDAswzKyJh7hmKlACjsIUUDb/e9LumnEnYikiiOAXQSZKQGEOcDZX3XQkS6NPGAVzPGJbZlmtN4ETm5v3kh3pYRoAIRSBwDi2pft+o97kRtpPuAxD84skmXrlyw/rUCjYwExvoeDFQgWGmC2nbdcqlaOWD2FcF839ts0yOfUQYsvVxsn9BnAil/s80XTMDaaFQk5Dj5WqUCya/d9mFOYAp3ZPd3wlsCEcp1vj5yE9MrfupQWBvAEBoTuQ0LwqUw8Z/m8GYdhEoV4itsjZqMlZYBXFIpZe++qD6riFmiKMu/fv/pxnEaW+Vnk86KI8oHnOUkkWAkOq5ePvJtZPE3eltY1fbrKED/UU+IevKAB3FCZR3ARbPvl+alE5NmFRV41oQgyCW1DlHT69sI5uQ0C88iBZO5tlLBpnAEv8egZ8cVsHziRv/ptm8eCI3NVnDeuRZWFqN5NHAvJfMr7AsHC5c//rNnAk4W7LEdlJQ0DoYlX+PjqddTwaZQDLqlADeNYpfSRkBBaFQusnP+OHhDnArAY4EuKcV3r5jmWxKI3kU192CcMGsOQWSoeIZ2qXGIO/aZplHR/fdmM7SHHHXlzSr2WhS655zI0bJbM4JucMCLMvpnZbt1hXZhK00jQI6H5CLfbOR0mNRBlqlsnQ7zawhAv91P0kgFcivUywidxbq7IICZgjghtoEnLiSiK/dvUsfgFQmupB8fi7WywbwTREURBESVBW1mPJlfX34PL8D+8I5GWOYc0tfqBe6e58OwB7E72TdSPwTyedze97qcQTJpP5WFusAT1xsrmtzUljFJivB4+mk6YHcJ4wBMshGODiHmHs7Y3zmgPMfL4SECmOEp4w7lF1KAZQHumxkXMnctXQbGqbZAVB7o6y6DAaRJHUkXMj8YrhO40NqgdKQEKBJQQ5kgohgujdDywd+2KYXkxxCwR56YTJZJ6HbhPq38YtE101Gqq3UBC2g5+uzwvNbM6t0p0VN8cJoRsxjKXKoS/W0nnLsvBamDEgeuIGS0aHREK3CSHTsWDJQBddbreVgW2wo5jroTUPzne2QrcJRS5bXVg2it+YAgnXk9EZtrgfXvOgKxqh2oXg5MfOMiZg24pyaygKgrddiwLhfg/ESuMEN8MMJ0+YyqNVPeyYvs6hZYvGOYQECtuISTVLWAtGUwsaNCKMXDP5hvDQulTaC+oDfgW9TUWDRnj9LAuE9r5N6z5o/vmDTm8SYYHQfrz/fSvRfhZiLiakqHd6DYEzUE6mzxYXUsRrUrx25HD1/P22kuiuzvP2j3Y1VderT2ZuQSsVbSG75cg2XoE5Qa9q5Ui7UvrrqE6fR/bg5dybg0sU3eZ+7uoK0gGlEbRNJPXmJxsSlteBI1QQpDnPampFn7mddfxlmH+Kd+9aXFpZCwW09+ABN28e1+3wH5+NLVJDMgdDAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Lorem ipsum dolor sit amet, elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Orci nulla pellentesque dignissim enim. Amet consectetur
                            adipiscing"</p>
                        <div class="d-flex gap-1 flex-column">
                            <div class="testimonial-author">Kathy Sullivan</div>
                            <div class="testimonial-position">CEO at ordian it</div>
                        </div>
                        <span class="quttes">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="70" height="47" viewBox="0 0 70 47" fill="none">
                                <rect width="70" height="46" transform="translate(0 0.0292969)"
                                    fill="url(#pattern0_427_218)" />
                                <defs>
                                    <pattern id="pattern0_427_218" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_427_218" transform="scale(0.0142857 0.0217391)" />
                                    </pattern>
                                    <image id="image0_427_218" width="70" height="46" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAAAuCAYAAACViW+zAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAUUSURBVHgB7ZrPb+NEFMefxx7Hjps0bUKSbrcl7Ub8OCFRiZU4rYQEQmIl9tAbSJz6d+TPQPwLvay0SKBKSEjcWIK4gBB02Wq3JT/dzTZNk9hjG4+z2Q1pftkziXPYz83JSPP8nffePM88AeZAPv9ppE4iKgZDwSLGRBBk2zZExxLcJ4ToGNO0bYyj9fLxYQ0WQgGl3v5V61625FVNVYghYYIMmf4jIRH3R9kgdqrHT58IwIUCim3+tKbhWMx0TLX/8rMgtJzHpdK3VzAHNjY+i5KIHXcQxAdffipEbEnAAJ0YVEgZ1kPNXX1XDAswzKyJh7hmKlACjsIUUDb/e9LumnEnYikiiOAXQSZKQGEOcDZX3XQkS6NPGAVzPGJbZlmtN4ETm5v3kh3pYRoAIRSBwDi2pft+o97kRtpPuAxD84skmXrlyw/rUCjYwExvoeDFQgWGmC2nbdcqlaOWD2FcF839ts0yOfUQYsvVxsn9BnAil/s80XTMDaaFQk5Dj5WqUCya/d9mFOYAp3ZPd3wlsCEcp1vj5yE9MrfupQWBvAEBoTuQ0LwqUw8Z/m8GYdhEoV4itsjZqMlZYBXFIpZe++qD6riFmiKMu/fv/pxnEaW+Vnk86KI8oHnOUkkWAkOq5ePvJtZPE3eltY1fbrKED/UU+IevKAB3FCZR3ARbPvl+alE5NmFRV41oQgyCW1DlHT69sI5uQ0C88iBZO5tlLBpnAEv8egZ8cVsHziRv/ptm8eCI3NVnDeuRZWFqN5NHAvJfMr7AsHC5c//rNnAk4W7LEdlJQ0DoYlX+PjqddTwaZQDLqlADeNYpfSRkBBaFQusnP+OHhDnArAY4EuKcV3r5jmWxKI3kU192CcMGsOQWSoeIZ2qXGIO/aZplHR/fdmM7SHHHXlzSr2WhS655zI0bJbM4JucMCLMvpnZbt1hXZhK00jQI6H5CLfbOR0mNRBlqlsnQ7zawhAv91P0kgFcivUywidxbq7IICZgjghtoEnLiSiK/dvUsfgFQmupB8fi7WywbwTREURBESVBW1mPJlfX34PL8D+8I5GWOYc0tfqBe6e58OwB7E72TdSPwTyedze97qcQTJpP5WFusAT1xsrmtzUljFJivB4+mk6YHcJ4wBMshGODiHmHs7Y3zmgPMfL4SECmOEp4w7lF1KAZQHumxkXMnctXQbGqbZAVB7o6y6DAaRJHUkXMj8YrhO40NqgdKQEKBJQQ5kgohgujdDywd+2KYXkxxCwR56YTJZJ6HbhPq38YtE101Gqq3UBC2g5+uzwvNbM6t0p0VN8cJoRsxjKXKoS/W0nnLsvBamDEgeuIGS0aHREK3CSHTsWDJQBddbreVgW2wo5jroTUPzne2QrcJRS5bXVg2it+YAgnXk9EZtrgfXvOgKxqh2oXg5MfOMiZg24pyaygKgrddiwLhfg/ESuMEN8MMJ0+YyqNVPeyYvs6hZYvGOYQECtuISTVLWAtGUwsaNCKMXDP5hvDQulTaC+oDfgW9TUWDRnj9LAuE9r5N6z5o/vmDTm8SYYHQfrz/fSvRfhZiLiakqHd6DYEzUE6mzxYXUsRrUrx25HD1/P22kuiuzvP2j3Y1VderT2ZuQSsVbSG75cg2XoE5Qa9q5Ui7UvrrqE6fR/bg5dybg0sU3eZ+7uoK0gGlEbRNJPXmJxsSlteBI1QQpDnPampFn7mddfxlmH+Kd+9aXFpZCwW09+ABN28e1+3wH5+NLVJDMgdDAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Lorem ipsum dolor sit amet, elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Orci nulla pellentesque dignissim enim. Amet consectetur
                            adipiscing"</p>
                        <div class="d-flex gap-1 flex-column">
                            <div class="testimonial-author">Kathy Sullivan</div>
                            <div class="testimonial-position">CEO at ordian it</div>
                        </div>
                        <span class="quttes">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="70" height="47" viewBox="0 0 70 47" fill="none">
                                <rect width="70" height="46" transform="translate(0 0.0292969)"
                                    fill="url(#pattern0_427_218)" />
                                <defs>
                                    <pattern id="pattern0_427_218" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_427_218" transform="scale(0.0142857 0.0217391)" />
                                    </pattern>
                                    <image id="image0_427_218" width="70" height="46" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAAAuCAYAAACViW+zAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAUUSURBVHgB7ZrPb+NEFMefxx7Hjps0bUKSbrcl7Ub8OCFRiZU4rYQEQmIl9tAbSJz6d+TPQPwLvay0SKBKSEjcWIK4gBB02Wq3JT/dzTZNk9hjG4+z2Q1pftkziXPYz83JSPP8nffePM88AeZAPv9ppE4iKgZDwSLGRBBk2zZExxLcJ4ToGNO0bYyj9fLxYQ0WQgGl3v5V61625FVNVYghYYIMmf4jIRH3R9kgdqrHT58IwIUCim3+tKbhWMx0TLX/8rMgtJzHpdK3VzAHNjY+i5KIHXcQxAdffipEbEnAAJ0YVEgZ1kPNXX1XDAswzKyJh7hmKlACjsIUUDb/e9LumnEnYikiiOAXQSZKQGEOcDZX3XQkS6NPGAVzPGJbZlmtN4ETm5v3kh3pYRoAIRSBwDi2pft+o97kRtpPuAxD84skmXrlyw/rUCjYwExvoeDFQgWGmC2nbdcqlaOWD2FcF839ts0yOfUQYsvVxsn9BnAil/s80XTMDaaFQk5Dj5WqUCya/d9mFOYAp3ZPd3wlsCEcp1vj5yE9MrfupQWBvAEBoTuQ0LwqUw8Z/m8GYdhEoV4itsjZqMlZYBXFIpZe++qD6riFmiKMu/fv/pxnEaW+Vnk86KI8oHnOUkkWAkOq5ePvJtZPE3eltY1fbrKED/UU+IevKAB3FCZR3ARbPvl+alE5NmFRV41oQgyCW1DlHT69sI5uQ0C88iBZO5tlLBpnAEv8egZ8cVsHziRv/ptm8eCI3NVnDeuRZWFqN5NHAvJfMr7AsHC5c//rNnAk4W7LEdlJQ0DoYlX+PjqddTwaZQDLqlADeNYpfSRkBBaFQusnP+OHhDnArAY4EuKcV3r5jmWxKI3kU192CcMGsOQWSoeIZ2qXGIO/aZplHR/fdmM7SHHHXlzSr2WhS655zI0bJbM4JucMCLMvpnZbt1hXZhK00jQI6H5CLfbOR0mNRBlqlsnQ7zawhAv91P0kgFcivUywidxbq7IICZgjghtoEnLiSiK/dvUsfgFQmupB8fi7WywbwTREURBESVBW1mPJlfX34PL8D+8I5GWOYc0tfqBe6e58OwB7E72TdSPwTyedze97qcQTJpP5WFusAT1xsrmtzUljFJivB4+mk6YHcJ4wBMshGODiHmHs7Y3zmgPMfL4SECmOEp4w7lF1KAZQHumxkXMnctXQbGqbZAVB7o6y6DAaRJHUkXMj8YrhO40NqgdKQEKBJQQ5kgohgujdDywd+2KYXkxxCwR56YTJZJ6HbhPq38YtE101Gqq3UBC2g5+uzwvNbM6t0p0VN8cJoRsxjKXKoS/W0nnLsvBamDEgeuIGS0aHREK3CSHTsWDJQBddbreVgW2wo5jroTUPzne2QrcJRS5bXVg2it+YAgnXk9EZtrgfXvOgKxqh2oXg5MfOMiZg24pyaygKgrddiwLhfg/ESuMEN8MMJ0+YyqNVPeyYvs6hZYvGOYQECtuISTVLWAtGUwsaNCKMXDP5hvDQulTaC+oDfgW9TUWDRnj9LAuE9r5N6z5o/vmDTm8SYYHQfrz/fSvRfhZiLiakqHd6DYEzUE6mzxYXUsRrUrx25HD1/P22kuiuzvP2j3Y1VderT2ZuQSsVbSG75cg2XoE5Qa9q5Ui7UvrrqE6fR/bg5dybg0sU3eZ+7uoK0gGlEbRNJPXmJxsSlteBI1QQpDnPampFn7mddfxlmH+Kd+9aXFpZCwW09+ABN28e1+3wH5+NLVJDMgdDAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Become Tutor -->
    <section class="padding-120">
        <div class="container text-center">
            <span class="primary-badge mb-4 mx-auto">BECOM A TUTOR</span>
            <h2 class="text-center section-title">Guide And Inspire Learners</h2>
            <div class="become-tutor-div">
                <div class="row g-3">
                    <div class="col-12 col-lg-7">
                        <div class="tutor-content">
                            <h4>Guide and Inspire Learners</h4>
                            <p>Earn while you teach—share your expertise with students on Edexcel. Sign up to start
                                tutoring online.</p>
                            <button class="warning-btn-2">
                                Register yourself as a professional teacher
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15"
                                        fill="none">
                                        <path d="M11.5293 2.2207L16.5293 8.2207L11.5293 14.2207" stroke="white"
                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M1.5293 8.2207H16.5293" stroke="white" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="tutor-image text-center">
                            <img src="{{asset('homeImage/become-tutor-teacher.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="padding-120 bg-light">
        <div class="container">
            <span class="primary-badge mb-4 mx-auto">FAQ</span>
            <h2 class="text-center section-title">Frequently Asked Questions</h2>

            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="faq-image text-center text-lg-start">
                        <img src="{{asset('homeImage/faq-image.png')}}" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Which class is right for me?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can select a class based on your current level, academic goals, and interest
                                    areas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I register to take classes?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Registration can be done online via our website or in person at our office.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Is there a fee to take the class?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, each course has a fee based on the subject and duration. Please check the
                                    course page for details.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What kind of material is taught in class?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The material is based on the latest curriculum and includes practical examples and
                                    assessments.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Are the instructors in the class experienced?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, all instructors are highly experienced and qualified in their respective
                                    fields.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Can this class guarantee me good grades in school?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    While we can’t guarantee grades, we provide you with the tools and support to
                                    succeed.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Can this class help me pass the chemistry olympiad?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we offer specialized training and practice sessions to help you prepare for the
                                    chemistry olympiad.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- News Latter -->
    <section class="position-relative padding-70 bg-primary">
        <div class="bg-images">
            <img src="{{asset('homeImage/start-top.png')}}" class="start-top" alt="">
            <img src="{{asset('homeImage/bottom-end.png')}}" class="bottom-end" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 text-center text-lg-start">
                    <h2 class="section-title text-white">Join Our Newsletter</h2>
                    <p class="text-white">Subscribe our newsletter to get our latest update & news.</p>
            
                <meta name="csrf-token" content="{{ csrf_token() }}">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="mail-section text-center text-lg-end">
                         <form id="newsletterForm">
                    <div class="mb-3">
                        <label class="d-flex align-items-center mb-2" style="font-size:12px;">Email Address <span class="text-danger ms-1">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" id="newsletterEmail" required pattern="^[\w\.\-]+@(gmail|yahoo|outlook)\.com$" >
                    </div>
                    <button type="submit" class="btn text-white w-100" style="background-color:#42b979">Subscribe</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo mb-2">
                        <img src="{{asset('homeImage/logo.jpg')}}" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <div class="contact-info">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46"
                                fill="none">
                                <rect x="0.5" y="0.0302734" width="45" height="45" rx="22.5" fill="#EEFBF5" />
                                <path
                                    d="M27.1158 22.7178H24.6256V30.1553H21.3053V22.7178H18.5826V19.6631H21.3053V17.3057C21.3053 14.6494 22.899 13.1553 25.3228 13.1553C26.485 13.1553 27.7135 13.3877 27.7135 13.3877V16.0107H26.3521C25.024 16.0107 24.6256 16.8076 24.6256 17.6709V19.6631H27.5807L27.1158 22.7178Z"
                                    fill="#42B979" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46"
                                fill="none">
                                <rect x="0.5" y="0.0302734" width="45" height="45" rx="22.5" fill="#EEFBF5" />
                                <path
                                    d="M23.1873 17.8369C25.2791 17.8369 27.0057 19.5635 27.0057 21.6553C27.0057 23.7803 25.2791 25.4736 23.1873 25.4736C21.0623 25.4736 19.3689 23.7803 19.3689 21.6553C19.3689 19.5635 21.0623 17.8369 23.1873 17.8369ZM23.1873 24.1455C24.5486 24.1455 25.6443 23.0498 25.6443 21.6553C25.6443 20.2939 24.5486 19.1982 23.1873 19.1982C21.7928 19.1982 20.6971 20.2939 20.6971 21.6553C20.6971 23.0498 21.826 24.1455 23.1873 24.1455ZM28.035 17.7041C28.035 18.2021 27.6365 18.6006 27.1385 18.6006C26.6404 18.6006 26.242 18.2021 26.242 17.7041C26.242 17.2061 26.6404 16.8076 27.1385 16.8076C27.6365 16.8076 28.035 17.2061 28.035 17.7041ZM30.5584 18.6006C30.6248 19.8291 30.6248 23.5146 30.5584 24.7432C30.492 25.9385 30.2264 26.9678 29.3631 27.8643C28.4998 28.7275 27.4373 28.9932 26.242 29.0596C25.0135 29.126 21.3279 29.126 20.0994 29.0596C18.9041 28.9932 17.8748 28.7275 16.9783 27.8643C16.115 26.9678 15.8494 25.9385 15.783 24.7432C15.7166 23.5146 15.7166 19.8291 15.783 18.6006C15.8494 17.4053 16.115 16.3428 16.9783 15.4795C17.8748 14.6162 18.9041 14.3506 20.0994 14.2842C21.3279 14.2178 25.0135 14.2178 26.242 14.2842C27.4373 14.3506 28.4998 14.6162 29.3631 15.4795C30.2264 16.3428 30.492 17.4053 30.5584 18.6006ZM28.9646 26.0381C29.3631 25.0752 29.2635 22.751 29.2635 21.6553C29.2635 20.5928 29.3631 18.2686 28.9646 17.2725C28.699 16.6416 28.201 16.1104 27.5701 15.8779C26.574 15.4795 24.2498 15.5791 23.1873 15.5791C22.0916 15.5791 19.7674 15.4795 18.8045 15.8779C18.1404 16.1436 17.6424 16.6416 17.3767 17.2725C16.9783 18.2686 17.0779 20.5928 17.0779 21.6553C17.0779 22.751 16.9783 25.0752 17.3767 26.0381C17.6424 26.7021 18.1404 27.2002 18.8045 27.4658C19.7674 27.8643 22.0916 27.7646 23.1873 27.7646C24.2498 27.7646 26.574 27.8643 27.5701 27.4658C28.201 27.2002 28.7322 26.7021 28.9646 26.0381Z"
                                    fill="#42B979" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46"
                                fill="none">
                                <rect x="0.5" y="0.0302734" width="45" height="45" rx="22.5" fill="#EEFBF5" />
                                <path
                                    d="M23.5777 13.3877C26.6988 13.3877 29.5543 15.5459 29.5543 18.833C29.5543 21.9209 27.9605 25.374 24.441 25.374C23.5777 25.374 22.5484 24.9424 22.1168 24.1787C21.3863 27.167 21.4195 27.6318 19.7594 29.9229C19.5934 29.9893 19.6266 29.9893 19.527 29.8564C19.4605 29.2256 19.3941 28.6279 19.3941 27.9971C19.3941 25.9717 20.3238 23.0166 20.7887 21.0576C20.523 20.5264 20.4566 19.9287 20.4566 19.3643C20.4566 16.708 23.5777 16.3096 23.5777 18.501C23.5777 19.7959 22.6813 21.0244 22.6813 22.2861C22.6813 23.1162 23.4117 23.7139 24.2418 23.7139C26.5328 23.7139 27.2301 20.4268 27.2301 18.667C27.2301 16.3096 25.5699 15.0146 23.2789 15.0146C20.6559 15.0146 18.6305 16.9072 18.6305 19.5635C18.6305 20.8584 19.4273 21.5225 19.4273 21.8213C19.4273 22.0869 19.2281 22.9834 18.8961 22.9834C18.0992 22.9834 16.8043 21.6553 16.8043 19.3311C16.8043 15.6455 20.1578 13.3877 23.5777 13.3877Z"
                                    fill="#42B979" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46"
                                fill="none">
                                <rect x="0.5" y="0.0302734" width="45" height="45" rx="22.5" fill="#EEFBF5" />
                                <path
                                    d="M29.9402 18.2021C29.9402 18.3682 29.9402 18.501 29.9402 18.667C29.9402 23.2822 26.4539 28.5615 20.0457 28.5615C18.0535 28.5615 16.2273 27.9971 14.7 27.001C14.9656 27.0342 15.2313 27.0674 15.5301 27.0674C17.157 27.0674 18.6512 26.5029 19.8465 25.5732C18.3191 25.54 17.0242 24.5439 16.5926 23.1494C16.825 23.1826 17.0242 23.2158 17.2566 23.2158C17.5555 23.2158 17.8875 23.1494 18.1531 23.083C16.5594 22.751 15.3641 21.3564 15.3641 19.6631V19.6299C15.8289 19.8955 16.3934 20.0283 16.9578 20.0615C15.9949 19.4307 15.3973 18.3682 15.3973 17.1729C15.3973 16.5088 15.5633 15.9111 15.8621 15.4131C17.5887 17.5049 20.1785 18.8994 23.0672 19.0654C23.0008 18.7998 22.9676 18.5342 22.9676 18.2686C22.9676 16.3428 24.5281 14.7822 26.4539 14.7822C27.45 14.7822 28.3465 15.1807 29.0105 15.8779C29.7742 15.7119 30.5379 15.4131 31.202 15.0146C30.9363 15.8447 30.4051 16.5088 29.6746 16.9404C30.3719 16.874 31.0691 16.6748 31.6668 16.4092C31.202 17.1064 30.6043 17.7041 29.9402 18.2021Z"
                                    fill="#42B979" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links:</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Courses:</h5>
                    <ul>
                        <li><a href="#">Data Science</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Artificial Intelligence</a></li>
                        <li><a href="#">Computer Science</a></li>
                        <li><a href="#">All Courses</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="text-white mb-4">Gallery</h5>
                    <div class="d-flex justify-content-start gap-2 flex-wrap">
        <img src="{{ asset('homeImage/footer-image-1.png') }}" alt="" class="footer-image">
        <img src="{{ asset('homeImage/footer-image-2.png') }}" alt="" class="footer-image">
        <img src="{{ asset('homeImage/footer-image-3.png') }}" alt="" class="footer-image">
        <img src="{{ asset('homeImage/footer-image-4.png') }}" alt="" class="footer-image">
        <img src="{{ asset('homeImage/footer-image-5.png') }}" alt="" class="footer-image">
        <img src="{{ asset('homeImage/footer-image-6.png') }}" alt="" class="footer-image">
    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- copyright -->
    <div class="copyright text-center py-3 bg-dark text-white mt-0">
        <p class="mb-0">Copyright © 2024 <span class="text-primary">edexceledu</span> || All Rights Reserved</p>
    </div>
<!-- Sign Up Modal -->
<div class="modal fade" id="signupPromptModal" tabindex="-1" aria-labelledby="signupPromptLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 1000px !important;">
        <div class="modal-content" style="border-radius: 16px; overflow: hidden; box-shadow: 0 0 15px rgba(0,0,0,0.1);">

            <div class="modal-body p-0 d-flex">

                <div class="left-panel col-6">
                    <!-- <span class="fs-2 pointer foucs mb-1 position-absolute top-0" style="right:0px" onclick="document.getElementById('signupPromptModal').style.display = 'none'"> &times;</span> -->
                    <h2 class="mb-0">Create Your Account</h4>

                    <p class="my-2">How to i get started</p>

                    <!-- Form -->
                    <form action="{{ route('student-create') }}" method="POST" class="pages" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="modal-form-group">
                            <img src="{{ asset('images/Frame-user.png') }}" alt="email icon" />
                            <input type="text" placeholder="Full Name" name="name" required autocomplete="off" autofocus />

                        </div>
                        <div class="modal-form-group">
                            <img src="{{ asset('images/formkit_email.png') }}" alt="email icon" />
                            <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus class="@error('email') is-invalid @enderror" />

                        </div>
                        <div class="modal-form-group">
                            <img src="{{ asset('images/Frame.png') }}" alt="password icon" />
                            <input type="password" placeholder="Password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="login-button" type="submit">Sign Up</button>
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="color:red;">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="divider">Sign Up with Others</div>
                        
                    </form>
                    <a class="social-btn" href="{{ route('social.redirect','google') }}">
                            <img src="https://img.icons8.com/color/48/000000/google-logo.png" />
                            Sign Up with <strong style="margin-left: 5px;">google</strong>
                        </a>

                    <p class="mt-3 text-center" style="font-size: 12px; color: #999;">
                        Already have an account? <a href="{{ route('login') }}" style="color: #42b979;">Login here</a>
                    </p>
                </div>
                <div class="right-panel col-6">
                    <div class="close-btn" onclick="document.getElementById('signupPromptModal').style.display = 'none'">×</div>
                    <div class="card-image">
                        <div class="icon-badge">
                            <img src="{{ asset('images/Group11.png') }}" />
                        </div>
                        <h3>Online Expert Training</h3>
                        <img src="{{ asset('images/user.png') }}" alt="Woman with tablet" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
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
        button.addEventListener('click', function() {
            const teacherId = this.getAttribute('data-teacher-id');

            fetch('{{ route("request.demo") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        teacher_id: teacherId
                    })
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
</body>

</html>