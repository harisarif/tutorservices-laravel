<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- whatsapp button css -->
    <link rel="stylesheet" href="css/whatsApp-buttons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
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
    </style>
</head>
<div class="loader" id="lazzyLoader">
    <img src="./images/loader.gif" alt="lazzyloader">
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
                class="btn bg-body-secondary hiring-btn">{{__('messages.student')}}</a>
            <a href="{{ route('tutor') }}"  class="btn btn-success bg_theme_green border-0 hiring-btn">{{__('messages.tutor')}}</a>
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
            @include('layouts.footer')
            @yield('js')
        </main>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/app.js"></script>

<script>
      $(document).ready(function() {
        $('.navbar-toggler').on('click', function() {
                $('#navbarNavDropdown').toggleClass('show');
            });
            // Attach click event handler to elements with class 'hiring-btn'
            $('.hiring-btn').on('click', function() {
                // Add the 'highlight' class to the clicked element
                $('#allModal').addClass('d-none');
            });
        });
    $(document).ready(function($) { $('.country').select2(); });
</script>