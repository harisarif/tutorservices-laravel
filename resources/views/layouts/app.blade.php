<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="sign up, registration, create account, easy steps, join now, membership, online signup, fast registration, user registration, quick sign up">
    <meta name="description" content="Sign up for your account in just 3 simple steps. Quick, easy, and secure registration process to join our community.">
    <!-- Meta Author -->
    <meta name="author" content="Edexcel">
    <style>
        .newsletter-modal {
            display: flex !important;
            flex-direction: row !important;
            padding: 0 !important;
            border: none !important;
            border-radius: 0.5rem !important;
            overflow: hidden !important;

        }

        #newsletterModal {
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            flex-direction: column;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .modal-img {
            width: 50%;
        }

        .modal-form {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .fade:not(.show) {
            opacity: 1 !important;
        }

        .alert {
            position: fixed !important;
            right: 0px;
            width: 26%;
            padding: 0px 16px;
            margin: 10px;
            border-radius: 4px;
            border-style: solid;
            border-width: 1px;
            font-size: 16px;
        }
    </style>
    {{-- <title>{{ config('app.name', 'Edecel Academy & Educational Consultancy') }}</title> --}}
    <title>{{__('messages.academy_name')}}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/png" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- whatsapp button css -->
    <link rel="stylesheet" href="{{ asset('css/whatsApp-buttons.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/figma.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-select2.css') }}">
    @if(Route::is('newhome'))
    <link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
    @endif
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>
<div class="loader" id="lazzyLoader">
    <video autoplay loop muted playsinline>
        <source src="{{ asset('images/loader.webm') }}" type="video/webm">
        Your browser does not support the video tag.
    </video>
</div>
<div class="modalBox" id="allModal">
    <div class="boxModal-1 col-4 bg-light rounded p-2">
        <h5 class="col-12 d-flex justify-content-between align-items-center px-2">
            {{__('messages.academy_name')}}
            <span class="fs-2 pointer foucs"
                onclick="document.getElementById('allModal').style.display = 'none'"> &times;</span>
        </h5>

        <p class="px-2">{{__('messages.welcome_message')}}</p>

        <hr />
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('hire.tutor') }}"
                class="btn bg_theme_green hiring-btn">{{__('messages.student')}}</a>
            <a href="{{ route('tutor') }}" class="btn bg-body-secondary   border-0 hiring-btn">{{__('messages.tutor')}}</a>
        </div>
    </div>
</div>
@if (Route::currentRouteName() === 'newhome' && !Auth::check())
<div class="modal fade d-none" id="newsletterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content newsletter-modal">
            <div class="modal-img">
                <img src="{{ asset('images/tutor-new.jpeg') }}" data-bb-lazy="true" loading="eager" data-src="https://femme.taam.tech/storage/at-reallygreatsite.png" alt="Subscribe Now" data-ll-status="loaded" class="entered loaded w-100">
            </div>
            <div class="modal-form">
                <span class="fs-2 pointer foucs closeModal" style="position: absolute;top:10px;right:10px;"> &times;</span>
                <p class="mb-1" style="font-size:12px;">Newsletter</p>
                <h2 class="mb-2" style="color:#42b979">Subscribe Now</h2>
                <meta name="csrf-token" content="{{ csrf_token() }}">

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
@endif
<div id="success" class="custom-alert alert-success d-flex align-items-center fade show d-none" role="alert">
    <i class="fas fa-check-circle"></i>
    <div>
        <strong id="messageres"></strong>
    </div>
    <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
        &times;
    </button>
    <div class="progress-line custom-line-test"></div>
</div>
<body class="font-sans antialiased">
    {{-- <livewire:layout.navigation /> --}}

    <!-- Page Heading -->
    {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
    </div>
    </header>
    @endif --}}

    <!-- Page Content -->
    <main>
        {{-- {{ $slot }} --}}
        @yield('content')

        @yield('js')
    </main>
    @if(!request()->cookie('cookie_consent'))
    <!-- <div id="cookie-banner" class="fixed-cookies bottom-0 left-0 w-full bg-gray-800 text-white z-50">
            <section class="cookies-privacy w-100">
                <div class="container-fluid p-2 ms-4">
                <h5>Cookies & Privacy</h5>
                <p style="font-size:12px;">
                    We use cookies to ensure that we give you the best experience on our website. By clicking Accept or continuing to use our site, you consent to our use of cookies and our privacy policy. For more information, please read our privacy policy.. <a href="#" class="text-light">More information</a>
                </p>
                <div class=" button-contanier p-0 mb-4">
                    <button class="btn me-2 mr-2 accpt-btn text-white" onclick="setCookieConsent('accepted')">
                    Accept cookies
                    </button>
                    <button class="btn accpt-btn text-white" onclick="setCookieConsent('rejected')">
                    Reject cookies
                    </button>
                </div>
                </div>
            </section>
        </div> -->
    @endif
    @include('layouts.footer')
</body>

</html>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CPBJT0ZYB1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CPBJT0ZYB1');
</script>
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-T7J1VV3190"></script> -->
<script>
    function setCookieConsent(value) {
        fetch('/cookie-consent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                consent: value
            })
        }).then(() => {
            document.getElementById('cookie-banner').remove();
        });
    }
    //   window.dataLayer = window.dataLayer || [];
    //   function gtag(){dataLayer.push(arguments);}
    //   gtag('js', new Date());

    //   gtag('config', 'G-T7J1VV3190');
</script>
<script src="{{ URL::asset('js/select2.js') }}"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('js/inspect.js') }}"></script>

<script>
    function cancel() {
        $('.alert').addClass('d-none')
    }
    $(document).on('select2:open', function(e) {
        let scrollPos = $(window).scrollTop();
        setTimeout(function() {
            $(window).scrollTop(scrollPos);
        }, 0);
    });
    $(document).ready(function($) {
        $('.country').select2();
    });
</script>
<!-- <script>
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
                // alert("Developer tools are disabled!");
                window.location.reload();
            }
        }, 1000);
        Object.defineProperty(console, 'profile', {
            get: function() {
                openConsole = true;
                throw new Error("Console is disabled!");
            }
        });
    })();  
</script>  -->