<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="sign up, registration, create account, easy steps, join now, membership, online signup, fast registration, user registration, quick sign up">
    <meta name="description" content="Sign up for your account in just 3 simple steps. Quick, easy, and secure registration process to join our community.">
    <!-- Meta Author -->
    <title>@yield('title', 'Default Site Title')</title>
    <meta name="author" content="Edexcel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-admin.css')}}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px !important;
        }
        th , td{ border-right: 1px solid #e3e6f0!important;
        }
        .img-thumbnail {
            height:65px !important;
            margin-top:15px;
            width: 125px;
        }
        .select2-container {
            width: 100% !important;
        }
        .select2-container--default .select2-selection--single {
            height: 45px;
        }
        .table {
            background-color: #fff;
        }
        .scroll-to-top a {
            margin-top:13px;
        }
        .loader {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        background-color: #f5f7f6;
        z-index: 9999999;
    }
    </style>


</head>
<div class="loader" id="lazzyLoader">
    <!-- <img src="{{ asset('images/loader.gif') }}" alt="lazzyloader"> -->
    <video autoplay loop muted playsinline>
        <source src="{{ asset('images/loader.webm') }}" type="video/webm">
        Your browser does not support the video tag.
    </video>
</div>

<body class="font-sans antialiased">

    <!-- Page Heading -->


    <!-- Page Content -->
    <main>
        @yield('content')
        @include('layouts.admin-footer')
        @yield('js')
    </main>


</body>
<script src="{{asset('js/select2.min.js')}}"></script>

<script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('js/inspect.js')}}"></script>
<!-- Core plugin JavaScript-->
<!-- <script src="{{asset('js/js/jquery.easing.min.js')}}"></script> -->

<!-- Custom scripts for all pages-->
<script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('js/js/demo/Chart.min.js')}}"></script>
<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/js/demo/chart-pie-demo.js')}}"></script>
<script src="{{asset('js/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
</html>

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
    $(document).ready(function () {
    // Toggle dropdown
    $('.custom_dropdown-toggle').on('click', function (e) {
        e.stopPropagation(); // prevent bubbling
        // Close other dropdowns
        $('.dropdown-menu').not($(this).siblings('.dropdown-menu')).slideUp(150);
        // Toggle the clicked dropdown
        $(this).siblings('.dropdown-menu').slideToggle(150);
    });

    // Close dropdown when clicking outside
    $(document).on('click', function () {
        $('.dropdown-menu').slideUp(150);
    });
});
    $('.select2').select2();
    $('.table').dataTable();
    window.addEventListener('load', ()=>{
    document.getElementById('lazzyLoader').style.display = 'none';
})

</script>
<!-- <script src="{{asset('js/inspect.js')}}"></script> -->