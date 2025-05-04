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
        .alert{
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
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-select2.css') }}">
    @if(Route::is('newhome'))
    <link rel="stylesheet" href="{{ asset('css/new-home.css') }}">
    @endif
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <style>
        .pagination li.active span {
            background-color: #42B979 !important; 
            border-color: #42B979 !important;
        }
        .foucs{
            color: #ffff;
            width: 30px;
            transition: 0.5s;
            display: flex;
            justify-content: center;
            height: 30px;
            border-radius: 24px;
            align-items: center;
            background-color: #42b979;
            margin-bottom:25px ;
        }
        .foucs:hover{
            cursor: pointer;
            transform: scale(1.3);
        }
        .hiring-btn:hover {
            /* transform: translateY(-0.25em); */
            font-size:15px;
            transition:none;
            /* box-shadow: 0 3px 0 0 #ddd; */
        }
    </style>
</head>
<div class="loader" id="lazzyLoader">
    <img src="{{ asset('images/loader.gif') }}" alt="lazzyloader">
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
            <a href="{{ route('tutor') }}"  class="btn bg-body-secondary   border-0 hiring-btn">{{__('messages.tutor')}}</a>
        </div>
    </div>
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
        @include('layouts.footer')
</body>

</html>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T7J1VV3190"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T7J1VV3190');
</script>
<script src="{{ URL::asset('js/select2.js') }}"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('js/inspect.js') }}"></script>

<script>
    function cancel(){
            $('.alert').addClass('d-none')
        }
$(document).on('select2:open', function(e) {
            let scrollPos = $(window).scrollTop();
            setTimeout(function() {
                $(window).scrollTop(scrollPos);
            }, 0);
        });
    $(document).ready(function($) { $('.country').select2(); });
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