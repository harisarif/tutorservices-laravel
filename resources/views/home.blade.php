<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edexcel Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}"/>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
</head>
<style>
        ::-webkit-scrollbar {
            width: 6px; /* For vertical scrollbars */
            height: 6px; /* For horizontal scrollbars */
        }

        ::-webkit-scrollbar-track {
           background: #42b979; /* Track color */
        }
    .sidebar-dark .nav-item .nav-link:active, .sidebar-dark .nav-item .nav-link:focus, .sidebar-dark .nav-item .nav-link:hover {
        border:1px solid transparent;
    }
    .sidebar-dark #sidebarToggle::after{
        color: #fff !important;
        font-weight: 900;
        content: '\f104';
        font-family: 'Font Awesome 5 Free';
        margin-right: .1rem;
        margin-left: 2px !important;
    }
    .sidebar-dark #sidebarToggle:hover{
        background-color: #42b979;
        color: #fff;
    }
    .dropdown-menu{
        cursor: pointer;
    }
    .sidebar-dark #sidebarToggle{
        width: 25px;
        height: 25px;
        text-align: center;
        margin-bottom: 1rem;
        cursor: pointer;
        background-color: #42b979;
        position: absolute;
        top: -26px;
        left:-6px;
        z-index: 9;
    }
    @keyframes blink {
        50% {
        opacity: 0;
     }
    }

    #sidebarToggle {
     animation: blink 2s infinite;
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        background-color:transparent;
        border:unset;
    }
    .page-item.active .page-link {
        background-color: #42b979;
        border-color: #42b979;
    }
    .MH{
        border: 5px solid;
        border-image: linear-gradient(45deg, #42b979, #ffffff) 1;
    }
    .animated-icons{
        font-size: 50px;
        color: #42b979;
         animation: bounce 2s infinite;
    }
    .table-responsive{
        display: inline-table;
    }
    footer.sticky-footer .copyright{
        font-size:19px;
    }
        @keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.7;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
    }

    .custom-options {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.custom-options.show {
    display: block;
}

.custom-option:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

#current-language {
    font-size: 16px;
    font-weight: bold;
}

#selected-language {
    color: #42b979;
}
    #language-select{
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        font-size: 14px;
        color: #333;
        width: 68px;
        max-width: 200px;
        outline: none;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
        position: absolute;
        top: 55px;
        left: 75px;
    }
    [dir="rtl"] .sidebar  {
        z-index: 9;
        padding: 0;
    }
    [dir="rtl"] .sidebar-dark #sidebarToggle::after  {
       text-align:center;
    }
    [dir="rtl"] .nav-link  {
        text-align: justify !important;
    }
    [dir="rtl"] .sidebar-dark  #sidebarToggle{
        left:-27px !important;
    }
    [dir="rtl"] .media-body{
        text-align: justify !important;
    }
    [dir="rtl"] .ml-auto, .mx-aut{
        margin-left:0 !important;
    }
    [dir="rtl"] #language-select{
        left: -15px;
    }
    [dir="rtl"] .topbar{
        justify-content: space-between;
    }
    [dir="rtl"] .icons{
        display: block !important;
        color:#fff;
    }
    @media (max-width: 425px) {
        #language-select{
            left: 78%;
        }
        [dir="rtl"]  #language-select{
            left: 1%;
    }
        .container-fluid{
            padding: 0 6px;
        }
        .SB{
            display: flex;
        }
        .odd{
            display: flex;
            /* margin-left: -60%; */
            white-space:nowrap;
        }
        [dir="rtl"] .AB-img{
            margin-left: 33px;
        }
        [dir="rtl"] .dataTables_wrapper div.dataTables_paginate ul.pagination{
            display: flex;
            justify-content: space-between !important;
            padding: 0 16%;
        }
        [dir="rtl"] .paginate_button {
            border: 1px solid #42b979 !important;
            border-radius: 5px !important;
        }
        .paginate_button{
            border: 1px solid #42b979 !important;
            border-radius: 5px !important;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination{
            display: flex;
            justify-content: space-between !important;
            padding: 0 16%;
        }
    }
</style>
<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="nav nav-tabs navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <li class=" py-2 mx-2 d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                   <img src=" {{asset('images/white-logo.jpeg')}}" class="d-lg-block d-none" id="toggleImage" height="50px" alt="logo" style="height: 50px; border-radius: 10px; width: 100%;">
               </a>
               <a href="{{ route('home') }}">
                    <img src=" {{asset('images/favicon.png')}}" id="toggleImage" class="d-lg-none d-sm-block AB-img" alt="Image" style="width:70%;">
               </a>
                <div class="text-center d-none d-md-inline position-relative">
                 <button class="rounded-circle border-0" id="sidebarToggle">
                    <div class="icons d-none">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                 </button>
                   
                </div>
           </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" id="dashboard-tab" data-toggle="tab"
                href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('messages.Dashboard') }}</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2" id="profile-tab" data-toggle="tab"
                href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                <i class="fas fa-chalkboard-teacher"></i>
                    <span>{{ __('messages.Teacher') }}</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link py-2" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                <i class="fa-solid fa-user-graduate"></i>
                    <span>{{ __('messages.Students') }}</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="button-div">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 bg-success text-white">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Sidebar Toggle (Topbar) -->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow d-flex align-items-center">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if(auth()->check())
                                    {{ auth()->user()->name}}@endif</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('images/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item text-success" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
                                    {{ __('messages.Logout') }} 
                                </a>
                            </div>
                            <div class="custom-select-wrapper mx-1" style="cursor: pointer;">
                                <div class="custom-select-web">
                                        <!-- Clickable Globe Icon -->
                                        <i class="fa-solid fa-globe" style="color:#42b979 !important" aria-hidden="true" onclick="toggleDropdown()"></i>

                                        <!-- Dropdown Options -->
                                        <div class="custom-options" id="language-select">
                                            <div class="custom-option text-center text-success py-1" data-value="en" onclick="changeLanguage('en')">English</div>
                                            <div class="custom-option text-center text-success py-1" data-value="ar" onclick="changeLanguage('ar')">Arabic</div>
                                        </div>
                                </div>
                             </div>
                        </li>

                    </ul>

                </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                     style="display: none;">@csrf
                </form>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" >
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                                <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Dashboard') }} </h1>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-3 col-sm-6 col-12 my-2">
                                    <div class="MH card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex" style=" justify-content: space-between;">
                                                    <div class="media-body text-left counter">
                                                        <h3 class="danger text-success" id="teacher-count">500+</h3>
                                                        <span>{{ __('messages.Teachers') }} </span>
                                                    </div>
                                                    <div class="align-self-center animated-icons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="64" fill="#42b979">
                                                            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-2.67 0-8 1.337-8 4v3h16v-3c0-2.663-5.33-4-8-4zm-8 6v-1c0-1.721 3.468-3 8-3s8 1.279 8 3v1H4z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 my-2">
                                    <div class="MH card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex text-success" style=" justify-content: space-between;">
                                                    <div class="media-body text-left counter">

                                                        <h3 class="success text-success" id="count">1000+</h3>
                                                        <span>{{ __('messages.Students') }}</span>
                                                    </div>
                                                    <div class="align-self-center animated-icons">
                                                        <svg width="40" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="32" cy="20" r="12" fill="#42b979"></circle>
                                                            <path d="M32 36C22 36 14 44 14 54H50C50 44 42 36 32 36Z" fill="#42b979"></path>
                                                            <path d="M32 4L14 14L32 24L50 14L32 4Z" fill="#42b979"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6 col-12 my-2">
                                    <div class="MH card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex" style=" justify-content: space-between;">
                                                    <div class="media-body text-left counter">
                                                        <h3 class="warning text-success" id="subject-count">1500+</h3>
                                                        <span>{{ __('messages.Subjects') }}</span>
                                                    </div>
                                                    <div class="align-self-center animated-icons">
                                                        <i class="fa-solid fa-book-open " style="color:#42b979; font-size:25px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6 col-12 my-2">
                                    <div class="MH card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex " style=" justify-content: space-between;">
                                                    <div class="media-body text-left counter">
                                                        <h3 class="danger text-success" id="lang-count">500+</h3>
                                                        <span>{{ __('messages.Languages') }}</span>
                                                    </div>
                                                    <div class="align-self-center animated-icons">
                                                        <i class="fas fa-globe"  aria-hidden="true" style="    font-size: 25px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-success">
                                            <h6 class="m-0 font-weight-bold text-white">{{ __('messages.Edexcel Overview') }}</h6>
                                            <div class="dropdown no-arrow">

                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-success">
                                            <h6 class="m-0 font-weight-bold text-white">{{ __('messages.Revenue Sources') }}</h6>
                                            <div class="dropdown no-arrow">

                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2"> 
                                                     <i class="fas fa-circle text-primary"></i> 
                                                     Direct </span>
                                                <span class="mr-2">
                                                                                <i class="fas fa-circle text-success"></i> Social
                                                                            </span>
                                                <span class="mr-2">
                                                                                <i class="fas fa-circle text-info"></i> Referral
                                                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab" >
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                                <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Student') }}</h1>
                                <div class="del-button">
                                    <a href="#">
                                     <button type="button" class="btn btn-danger">{{ __('messages.Delet All') }}</button>
                                    </a>
                                </div>
                            </div>
                            @include('student-list')

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                                <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Teacher') }}</h1>
                                <div class="del-button">
                                 <a href="#">
                                    <button type="button" class="btn btn-danger">{{ __('messages.Delet All') }}</button>
                                 </a>
                                </div>
                            </div>
                            @include('teacher-list')
                        </div>

                    </div>

              
            </div>              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer  bg-gradient-success">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy;Edexcel Academy & Educational Consultancy</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded text-white bg-success" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/js/jquery.min.js')}}"></script>
    <script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('js/js/demo/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('js/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
  $('.teachers-table').DataTable();
  $('.student-table').DataTable();
});


</script>
</body>

</html>
<script>
    function toggleDropdown() {
        document.querySelector('.custom-options-web').classList.toggle('open');
    }

    function changeLanguage(value) {
        document.querySelector('.custom-options-web').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select-web')) {
            document.querySelector('.custom-options-web').classList.remove('open');
        }
    });
    function changeLanguage(locale) {
        console.log(locale)
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
</script>
<script>
    function toggleDropdown() {
    const dropdown = document.getElementById("language-select");

    if (dropdown) { // Check if the dropdown element exists
        dropdown.classList.toggle("show");
    } else {
        console.error("Element with id 'language-select' not found.");
    }
}

// Close the dropdown if clicked outside of the select box
document.addEventListener("click", function (e) {
    const selectWrapper = document.querySelector(".custom-select-web");
    const dropdown = document.getElementById("language-select");

    if (!selectWrapper.contains(e.target)) {
        if (dropdown) { // Check if the dropdown element exists
            dropdown.classList.remove("show");
        } else {
            console.error("Element with id 'language-select' not found.");
        }
    }
});

</script>