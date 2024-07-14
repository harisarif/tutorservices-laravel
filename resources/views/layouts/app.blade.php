<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Edecel Academy & Educational Consultancy') }}</title> --}}
    <title>{{__('messages.academy_name')}}</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- whatsapp button css -->
    <link rel="stylesheet" href="css/whatsApp-buttons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <style>
        .pagination li.active span {
            background-color: #42B979 !important; 
            border-color: #42B979 !important;
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
            <span class="fs-2 pointer"
                onclick="document.getElementById('allModal').style.display = 'none'"> &times;</span>
        </h5>

        <p class="px-2">Welcome to edexcel. We are empowering success through top-class education.
            Drop your information to start your journey with edexcel  today!</p>

        <hr />
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('hire.tutor') }}" 
                class="btn bg-body-secondary hiring-btn">Student</a>
            <a href="{{ route('tutor') }}"  class="btn btn-success bg_theme_green border-0 hiring-btn">Tutor</a>
        </div>
    </div>
</div>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
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
    </div>
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