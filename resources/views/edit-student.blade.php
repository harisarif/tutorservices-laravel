@extends('layouts.admin')
@section('title')
Edexcel Stundent
@endsection
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div id="wrapper">
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
        <li class="nav-item">
            <a class="nav-link"
                href="{{route('home')}}">
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
        <li class="nav-item active">
            <a class="nav-link py-2" href="{{route('all.students')}}">
                <i class="fa-solid fa-user-graduate"></i>
                <span>{{ __('messages.Students') }}</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link py-2" href="{{route('admin.inquiry')}}" role="tab">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <span>{{ __('messages.Direct inquiry') }}
                </span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link py-2" href="{{route('blogs.create')}}">
                <i class="fa-solid fa-blog" aria-hidden="true"></i>
                <span>{{ __('messages.Blogs') }}
                </span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link py-2" href="{{route('all.blogs')}}">
                <i class="fa-solid fa-blog" aria-hidden="true"></i>
                <span>{{ __('Blog List') }}
                </span>
            </a>
        </li>
    </ul>
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
                    <li class="nav-item dropdown no-arrow mx-1">

                        <div class="notification-icon">
                            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge badge-danger badge-counter" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>


                        </div>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in BD notification-dropdown " id="notificationDropdown" aria-labelledby="alertsDropdown " style="display: none;">
                            <h6 class="dropdown-header bg-success border-success text-center">
                                {{ __('messages.Notification') }}
                            </h6>
                            <a class="dropdown-item px-0 justify-content-center @if(auth()->user()->notifications->count() === 0) no-notifications @endif" href="#">
                                @if(auth()->user()->notifications->count() > 0)
                                @foreach(auth()->user()->notifications as $notification)
                                <div class="classic d-flex py-2 px-3 @if(!$loop->last) border-bottom @endif">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ntf">
                                        <div class="small">{{ $notification->data['message'] }}</div>
                                        <span class="font-weight-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="mt-2 text-center">
                                    <div class="small no-message">No notifications available.</div>
                                </div>
                                @endif
                            </a>

                            <a class="dropdown-item-fector  small" href="#">Show All Notifications </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if(auth()->check())
                                    {{ auth()->user()->name}}@endif</span> -->
                            <img class="img-profile rounded-circle"
                                src="{{asset('images/undraw_profile.svg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in md"
                            aria-labelledby="userDropdown" style="left: -95px !important; width: 0;">

                            <a class="dropdown-item text-success" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
                                {{ __('messages.Logout') }}
                            </a>
                        </div>

                    </li>

                </ul>

            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">@csrf
            </form>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="">
                <div class="tab-content mx-3" id="myTabContent">
                    <div class="blog-heading">
                        <h1 class="text-center border-bottom text-success fw-bold">Edit Student</h1>
                    </div>

                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label><br>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label><br>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="class_start_time">Class Start Time:</label><br>
                            <input type="time" class="form-control" id="class_start_time" name="class_start_time" value="{{ $student->class_start_time }}">
                        </div>

                        <div class="form-group">
                            <label for="class_end_time">Class End Time:</label><br>
                            <input type="time" class="form-control" id="class_end_time" name="class_end_time" value="{{ $student->class_end_time }}">
                        </div>

                        <div class="form-group">
                            <label for="whatsapp_number">Whatsapp Number:</label><br>
                            <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $student->whatsapp_number }}">
                        </div>

                        <div class="form-group">
                            <label for="country">Country:</label><br>
                            <select name="country" id="country" class="form-select">
                                @foreach($countries as $country)
                                <option value="{{ $country }}" {{ $student->country == $country ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city">City:</label><br>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $student->city }}">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label><br>
                            {{-- <input type="text" class="form-control" id="subject" name="subject" value="{{ $student->subject }}"> --}}
                            <select name="subject" id="subject" class="form-select">
                                <option value="English" {{ $student->subject == "English" ? 'selected' : '' }}>English</option>
                                <option value="Mathematics" {{ $student->subject == "Mathematics" ? 'selected' : '' }}>Mathematics</option>
                                <option value="Physics" {{ $student->subject == "Physics" ? 'selected' : '' }}>Physics</option>
                                <option value="Chemistry" {{ $student->subject == "Chemistry" ? 'selected' : '' }}>Chemistry</option>
                                <option value="Urdu" {{ $student->subject == "Urdu" ? 'selected' : '' }}>Urdu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city">Password:</label><br>
                            <input type="password" class="form-control" id="password" name="password" value="{{ $student->password }}">
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                @endsection
                @section('js')
                <script>
                    $(document).ready(function($) {
                        setTimeout(function() {
                            $(".alert").fadeOut("slow");
                        }, 5000);
                    })
                </script>
                @endsection
                @section('js')
                @endsection