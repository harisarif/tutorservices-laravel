<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="edexcel dashboard">
    <meta name="msapplication-tap-highlight" content="no">
    {{-- <title>{{ config('app.name', 'Edexcel Dashboard') }}</title> --}}
    <title>Edecel Academy & Educational Consultancy</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        div.dt-buttons {
            float: right !important;
            margin-left: 10px;
        }

        .vertical-nav-menu li a {
            padding: 0 1.5rem 0 1px !important;
        }

        .widget-content .widget-content-left .widget-heading {
            display: flex;
            gap: 8px;
        }

        table {
            border-collapse: collapse;
            /* Collapse borders */
            width: 100%;
            /* Full width */
        }

        th,
        td {
            border: 1px solid #dddddd;
            /* Add borders to cells */
            padding: 8px;
            /* Add padding */
            text-align: left;
            /* Align text to the left */
        }

        th {
            background-color: #f2f2f2;
            /* Background color for header */
        }

        tbody td {
            text-align: center !important;
            white-space: nowrap !important;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            text-align: center;
        }

        .fixed-sidebar .app-main .app-main__outer {
            z-index: 9 !important;
            padding-left: 280px !important;
            width: calc(100% - 280px) !important;
        }

        .student-table-wrapper {
            overflow-x: scroll;
        }

        @media(max-width: 600px) {
            .fixed-sidebar .app-main .app-main__outer {
                padding-left: 0 !important;
                width: 100% !important;

            }
        }

        .app-header .app-header__content {
            visibility: visible;
            opacity: 2;
            box-shadow: unset;
            position: absolute;
            left: 5%;
            width: 90%;
            top: 0;
            transition: all .2s;
            background: transparent;
            border-radius: 50px;
            padding: 0 10px;
            overflow: hidden;
        }

        .header-user-info {
            display: block !important;
        }

        @media(max-width: 991.98px) {

            .app-sidebar {
                width: auto !important;
                transform: unset;
            }

            .dataTables_wrapper .dataTables_filter {
                text-align: start;
                float: left;
            }
        }

        .fixed-sidebar .app-main .app-main__outer {
            width: 100% !important;
        }

        .app-page-title {
            padding: 10px;
            margin: -30px -32px 0px;
            position: relative;
        }

        .app-theme-white .app-page-title {
            background-color: white;
            text-align: justify;
        }

        .dataTables_wrapper {
            margin-top: 0.5rem;
        }
        .app-main .app-main__inner{
            padding: 30px 32px 0;
        }
        .label-div{
            & i{

                display: none;
            }
        }
        .log-out-div{
            display: none !important;
            /* position: relative; */
        }
        .log-out-icon{
            padding-left: 10px;
        }
        .mobile-log-out{
            display: none !important;
           /*  position: absolute;
            top: 40px;
            right: 0px;
            background-color: #e3e4e5;
            z-index: 99999;
            padding: 10px 14px;
            border-radius: 5px;
            overflow: auto; */
            position: absolute;
    bottom: 10px;
            padding: 0 28px 20px !important;
            .main-div{
                & h6{
                    color: #3195fe;
                }
                & i{
                    color: red;
                }
            }
        }
        .widget-content .widget-content-wrapper {
            top: -13px !important;
            right: 10px !important;
        }
        @media (max-width:321px){
            .app-main__inner{
                padding: 30px 17px 0 !important;
            }
            .student-data{
                padding: 0 22px !important;
            }
        }
        @media (max-width: 426px) {
            .app-sidebar {
                display: none;
            }
          .label-div{
            & i{

                display: inline-block !important;
            }
          }
          .widget-content-wrapper{
            display: none !important;
          }
          .log-out-div{
            display: inline-block !important;
        }
        body:has(#hamid:checked) .app-sidebar{
            display: block;
        }
        /* body:has(#log-out:checked) .mobile-log-out{
            display: inline-block !important;
        } */
        .dataTables_length,
        .dt-buttons{
            display: inline-block !important;
            text-align: left !important;
            float: left !important;
        }
        .mobile-log-out{
            display: block !important;
            & a{
                text-decoration: none;
            }
        }
        }
      
       
      /*   body:has(#hamid:checked) .label-div-two{
            display: none;
        }
        body:has(#hamid-raza:checked) .label-div{
            display: block !important;
        }
        body:has(#hamid-raza:checked) .app-sidebar{
            display: inline-block;
        } */
    </style>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo d-block mt-4">
                <img src="images/logo.png" height="30" width="150" alt="logo" />

            </div>
            
          
          
            <div class="app-header__content">
       
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">   
                              <div class="label-div d-inline-block">
                <label for="hamid" >
                <i class="fa-solid fa-bars fa-lg"></i>
                    <input type="checkbox" class="d-none" id="hamid">
                </label>               
            </div>
            <!-- <div class="log-out-div d-inline-block">
                <label for="log-out" >
                <i class="fa-solid fa-user  fa-lg log-out-icon "></i>
                    <input type="checkbox" class="d-none" id="log-out">
                </label>
                          
            </div> -->
            
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg"
                                                alt="">
                                            {{-- <i class="fa fa-angle-down ml-2 opacity-8"></i> --}}
                                        </a>

                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">

                                    <div class="widget-heading">
                                        Admin
                                        <nav>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            </a>
                                        </nav>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                                </form>
                                        {{-- <div class="py-12">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <div
                                                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                                        {{ __("You're logged in!") }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}


                                    </div>
                                    {{-- <div class="widget-subheading">
                                        VP People Manager
                                    </div> --}}
                                </div>
                                {{-- <div class="widget-content-right header-user-info ml-3">
                                    <button type="button"
                                        class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
   
            <div class="app-sidebar sidebar-shadow">
              
        
                <div class="app-header__logo">

                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner mt-3">
                        <h6>Dashboard</h6>
                        <ul class="vertical-nav-menu nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav- w-100 student-listing">
                                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                    aria-selected="true" class="mm-active">
                                    <i class="fa fa-user mx-1" aria-hidden="true"></i>

                                    Students
                                </a>

                            </li>
                            <li class="nav-item w-100 teacher-listing"> <a id="profile-tab" data-toggle="tab"
                                    href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="fa fa-user mx-1" aria-hidden="true"></i>

                                    Teachers
                                </a></li>
                        </ul>
                    </div>
                    <div class="mobile-log-out">
                <a href="{{ route('logout') }}" class="main-div d-flex gap-3 align-items-center"  style="gap:15px;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <h6 class="m-0">Logout</h6>
    </a >
                      </div> 
                </div>
                <!-- <div class="label-div">
                <label for="hamid" >
                    <i class="fa-solid fa-xmark"></i>
                    <input type="checkbox" id="hamid">
                </label>
                </div> -->
              
            </div>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <div class="student-data">
                                    Student List

                                </div>
                                <div class="teacher-data d-none">
                                    Teacher List

                                </div>
                            </div>
                            <!-- <div class="page-title-actions">
                                
                                <div class="d-inline-block dropdown">
                                    <a href="{{ route('students.pdf') }}" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info d-none">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Export As PDF
                                    </a>
                                    
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <div class="student-table-wrapper">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                @include('student-list')

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @include('teacher-list')
                            </div>
                        </div>
                        <div id="content">
                            <!-- Content will be loaded here -->
                        </div>
                    </div>
                </div>

                <div class="app-wrapper-footer d-none">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 2
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <small>NEW</small>
                                            </div>
                                            Footer Link 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

@if (request()->is('livewire-required-route'))
    @livewireScripts
@endif

<!-- <script>
    function asideOnOff(id){
        if(id == 'hamid-raza'){
            $('#hamid-raza').removeClass('d-none');
            $('#hamid').addClass('d-none');
        }else if(id == 'hamid'){
            $('#hamid').removeClass('d-none');
            $('#hamid-raza').addClass('d-none');
        }
    }
</script> -->

</html>


@include('scripts')