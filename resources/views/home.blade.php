

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
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
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full width */
    }
    th, td {
        border: 1px solid #dddddd; /* Add borders to cells */
        padding: 8px; /* Add padding */
        text-align: left; /* Align text to the left */
    }
    th {
        background-color: #f2f2f2; /* Background color for header */
    }
    
    tbody td {
        text-align: center !important;
        white-space: nowrap !important;
    }
    table.dataTable thead th, table.dataTable thead td {
        text-align: center;
    }
    .fixed-sidebar .app-main .app-main__outer {
    z-index: 9!important;
    padding-left: 280px!important;
    width: calc(100% - 280px)!important;
}
@media only screen and (max-width: 600px) {
    #DataTables_Table_1_wrapper {
        overflow: scroll;
    }
}
    </style>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <img src="images/logo.png" height="50" width="200" alt="logo"/>
                
            </div>
            
            <div class="app-header__content">
                
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
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
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            </a>
                                        </nav>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            </form>
                                            {{-- <div class="py-12">
                                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="mm-active">
                                    <i class="fa fa-user mx-1" aria-hidden="true"></i>

                                   Students
                                </a>
                               
                            </li>
                            <li class="nav-item w-100 teacher-listing"> <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i>

                               Teachers
                            </a></li>
                        </ul>
                    </div>
                </div>
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
                                    <div class="page-title-subheading">This is an example dashboard created using
                                        build-in elements and components.
                                    </div>
                                </div>
                                <div class="teacher-data d-none">
                                    Teacher List
                                    <div class="page-title-subheading">This is an example dashboard created using
                                        build-in elements and components.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                
                                <div class="d-inline-block dropdown">
                                    <a href="{{ route('students.pdf') }}" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info d-none">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Export As PDF
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                @include('student-list')

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
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
</html>


@include('scripts')