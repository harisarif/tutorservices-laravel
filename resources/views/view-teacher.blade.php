@extends('layouts.app')
@php
$languages_spoken = json_decode($tutor->language, true) ?? [];
@endphp
<link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}"/>
<style>
    .modalBox {
     display:none !important;
    }
    .loader {
        display: none !important;
    }
    footer {
        display: none !important;
    }
 </style>
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
<li class="nav-item active">
    <a class="nav-link py-2"
    href="{{route('all.tutors')}}">
    <i class="fas fa-chalkboard-teacher"></i>
        <span>{{ __('messages.Teacher') }}</span>
    </a>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
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
            <div id="contents">

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

                            <div class="notification-icon" >
                                <a href="#" class="nav-link dropdown-toggle"  id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                        <span class="badge badge-danger badge-counter" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                    @endif
                                </a>


                            </div>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in BD notification-dropdown " id="notificationDropdown" aria-labelledby="alertsDropdown "  style="display: none;">
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

                                <a class="dropdown-item text-success" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success" ></i>
                                    {{ __('messages.Logout') }}
                                </a>
                            </div>

                        </li>

                    </ul>

                </nav>
                <h2>Teacher's Profile</h2>
<section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4 h-100">
                <div class="card-body text-center">
                  <img src="{{ asset('storage/' . $tutor->profileImage) }}" alt="avatar"
                    class="rounded-circle img-fluid mt-5" style="width: 150px;height: 150px !important;">
                  <h5 class="my-3" style="color: #198754;">{{ $tutor->f_name ?? '' }} {{ $tutor->l_name ?? '' }}</h5>
                  <p class="mb-1" style="color: #198754;">{{ $tutor->specialization ?? '' }}</p>
                  <p class="mb-4" style="color: #198754;">{{ $tutor->description ?? '' }}</p>
                  <div class="d-flex justify-content-center mb-2">
                    <button  type="button"  class="btn" style="background-color: #198754;color: white;">Follow</button>
                    <button  type="button"  class="btn ms-1" style="background-color: #198754;color: white;">Message</button>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body" style="height: auto;">
                  <div class="row" style="margin-top: 100px;">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Full Name</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->f_name ?? '' }} {{ $tutor->l_name ?? '' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Email</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->email ?? '' }}</p>
                      </div>
                    </div>
                  </div>


                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Phone</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->phone ?? '' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Date Of Birth</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->dob ?? '' }}</p>
                      </div>
                    </div>
                  </div>


                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Gender</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->gender ?? '' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Status</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->status ?? '' }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">High qualification</h6>
                        <p class="mb-0" style="color: #198754;">{{ $qualification ?? 'Not specified' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">year</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->year ?? '' }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Specification</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->specialization ?? '' }}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">University</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->location ?? '' }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Course teaching</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->curriculum ??''}}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Subject you want to teach</h6>
                        <p class="mb-0" style="color: #198754;">{{ !empty($tutor->teaching) ? implode(', ', $tutor->teaching) : '' }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row  mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-4 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Country</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->country ??''}}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                          <h6 class="mb-0" style="color: #198754;">video</h6>
                          <p class="mb-0" style="color: #198754;">
                              <video width="50" height="50" controls>
                              <source src="{{ asset('storage/' . $tutor->video) }}" type="video/mp4">
                              Your browser does not support the video tag.
                          </video>
                      </p>
                        </div>
                  </div>
                  </div>


                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Language Spoken</h6>
                        <p class="mb-0" style="color: #198754;">
                        @foreach ($languageNames as $index => $language)
                            {{ $language }}</br>
                    @endforeach 
                   </p>
                </div>
              </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Language Level</h6>
                        <p class="mb-0 me-5" style="color: #198754;">
                        @foreach ($languages_spoken as $index => $lang)
                            ({{ $lang['level'] ?? 'N/A' }})<br>
                    @endforeach      
                    </p>              
                      </div>
                    </div>
                  </div>


                  <div class="row mt-md-4">
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Experience teaching</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->experience ??''}}</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                        <h6 class="mb-0" style="color: #198754;">Language teaching</h6>
                        <p class="mb-0" style="color: #198754;">{{ $tutor->language_tech ??''}}</p>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<a href="{{ route('all.tutors') }}" class="btn btn-success">Back To Dashboard</a>

</form>
    </div>
    <div class="sticky-footer  bg-gradient-success" style="padding:2rem 0">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy;Edexcel Academy & Educational Consultancy</span>
                    </div>
                </div>
    </div>
</div>

    
</div>
@endsection

@section('js')
<script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>
<script>
$(document).ready(function($) {
setTimeout(function() {
    $(".alert").fadeOut("slow");
}, 5000);
});
</script>
@endsection