@extends('layouts.app')
@php
$languages_spoken = json_decode($tutor->language, true) ?? [];
$selectedYear = isset($tutor->dob) ? date("Y", strtotime($tutor->dob)) : "";
    $selectedMonth = isset($tutor->dob) ? date("m", strtotime($tutor->dob)) : "";
    $selectedDay = isset($tutor->dob) ? date("d", strtotime($tutor->dob)) : "";
  
    $currentYear = date("Y");
    $selectedSubjects = is_array($tutor->teaching) ? $tutor->teaching : explode(',', $tutor->teaching ?? '');
    $selectedLanguage = $tutor->language_tech ?? '';
@endphp
<link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/style1.css')}}"/>
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
@if ($errors->any())

<div class="alert alert-danger" id="close" style="">
    <ul style="margin: 0; padding: 10px 0;">
        @foreach ($errors->all() as $error)
        <li style="display:flex; justify-content: space-between; align-items: center;">{{ $error }} <i
                class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true"></i></li>

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">
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
                
          
<section>
<form action="{{route('teachers.update', $tutor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="profile-header text-center">
                <div class="profile-pic-container">
                    <label for="imageUpload">
                        <img src="img/kids.jpg" alt="Avatar" class="avatar img-thumbnail" id="profileImage">
                        <div class="upload-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                    </label>
                </div>
                <input type="file" id="imageUpload" class="form-control d-none" accept="image/*">
                
                
            </div>
    
            <!-- Personal Information & Education -->
            <div class="row mt-4">
                <div class="col-md-6 d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="section-title"><i class="fas fa-user icon"></i> Personal Information</h5>
                        
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">First name:</strong></label>
                                <input type="text" class="form-control" id="fullName" name="f_name"  value="{{ $tutor->f_name}}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Last name:</strong></label>
                                <input type="text" class="form-control"  id="fullName" name="l_name"  value="{{ $tutor->l_name}}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Email:</strong></label>
                                <input type="email" class="form-control"  name="email"id="email" value="{{ $tutor->email}}">
                            </div>

                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Price:</strong></label>
                                <input type="text" class="form-control" id="price" name="price"  value="{{ $tutor->price}}">
                            </div>
                        
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Phone:</strong></label>
                                <input type="tel" class="form-control"  name="phone" id="phone"  value="{{ $tutor->phone ?? '' }}">
                            </div>
                        
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Date of Birth:</strong></label>
                                <input type="date" class="form-control" value="">
                            </div>
                        
                            <div class="mb-2">
                            <label for="gender" class="form-label fw-bold" style="color: #1cc88a;">Gender</label>
                            <select name="gender" id="gender" class="form-select" required> 
                            <option value="male" {{ $tutor->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $tutor->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $tutor->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                                </div>
                            
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6 d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="section-title">
                                <i class="fas fa-graduation-cap icon"></i> Education & Qualifications
                            </h5>

                            <div class="mb-2">
                          <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Experience Teaching</label>
                          <input type="text" class="form-control"  name="experience" id="address" value="{{ $tutor->experience ?? '' }}" style="border: 2px solid #dee2e6;">
                        </div>
                            
                            <div class="mb-2">
                            <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Institution/University Name</label>
                          <select name="location" class="form-select select2" id="institution">
                            @if(isset($tutor->location) && !in_array($tutor->location, ['harvard', 'mit', 'stanford', 'oxford', 'cambridge', 'berkeley', 'yale', 'princeton']))
                                <option value="{{ $tutor->location }}" selected>{{ ucfirst(str_replace('_', ' ', $tutor->location)) }}</option>
                            @endif
                        
                            <option value="harvard" {{ $tutor->location == 'harvard' ? 'selected' : '' }}>Harvard University</option>
                            <option value="mit" {{ $tutor->location == 'mit' ? 'selected' : '' }}>Massachusetts Institute of Technology</option>
                            <option value="stanford" {{ $tutor->location == 'stanford' ? 'selected' : '' }}>Stanford University</option>
                            <option value="oxford" {{ $tutor->location == 'oxford' ? 'selected' : '' }}>University of Oxford</option>
                            <option value="cambridge" {{ $tutor->location == 'cambridge' ? 'selected' : '' }}>University of Cambridge</option>
                            <option value="berkeley" {{ $tutor->location == 'berkeley' ? 'selected' : '' }}>University of California, Berkeley</option>
                            <option value="yale" {{ $tutor->location == 'yale' ? 'selected' : '' }}>Yale University</option>
                            <option value="princeton" {{ $tutor->location == 'princeton' ? 'selected' : '' }}>Princeton University</option>
                        </select>
                        
          
                            </div>
                        
                            <div class="mb-2">
                          <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Course teaching</label>
                          <input type="text" class="form-control"  name="courses" id="address" value="{{ $tutor->curriculum ?? '' }}" style="border: 2px solid #dee2e6;">
                            </div>
                        
                            <div class="mb-2">
                            <label for="qualification" class="form-label">
                                    <strong style="color: #1cc88a;">Highest Qualification</strong>
                                </label>
                                <select class="form-select school_class" id="qualification" name="qualification"
                                   >
                                    @if($qualification && !in_array($qualification, $schoolClasses->pluck('id')->toArray()))
                                    <option value="{{ $qualification }}" selected>{{ $qualification }}</option>
                                    @endif

                                    @foreach($schoolClasses as $schoolClass)
                                        <option value="{{ $schoolClass->id }}" 
                                            {{ ($qualification == $schoolClass->id) ? 'selected' : '' }}>
                                            {{ $schoolClass->name }}
                                        </option>
                                    @endforeach
                                    <option value="">Others</option>
                                </select>
                            </div>
    
                            <label for="specialization" class="form-label fw-bold" style="color: #1cc88a;">
                                    Specialization
                                </label>
                                <select name="specialization" class="form-select select2"  id="specialization">
                                    @if(isset($tutor->specialization) && !in_array($tutor->specialization, ['mathematics', 'science', 'computer_science', 'literature', 'history', 'languages', 'engineering', 'medicine']))
                                        <option value="{{ $tutor->specialization }}" selected>{{ ucfirst(str_replace('_', ' ', $tutor->specialization)) }}</option>
                                    @endif
                            
                                    <option value="mathematics" {{ $tutor->specialization == 'mathematics' ? 'selected' : '' }}>Mathematics</option>
                                    <option value="science" {{ $tutor->specialization == 'science' ? 'selected' : '' }}>Science</option>
                                    <option value="computer_science" {{ $tutor->specialization == 'computer_science' ? 'selected' : '' }}>Computer Science</option>
                                    <option value="literature" {{ $tutor->specialization == 'literature' ? 'selected' : '' }}>Literature</option>
                                    <option value="history" {{ $tutor->specialization == 'history' ? 'selected' : '' }}>History</option>
                                    <option value="languages" {{ $tutor->specialization == 'languages' ? 'selected' : '' }}>Languages</option>
                                    <option value="engineering" {{ $tutor->specialization == 'engineering' ? 'selected' : '' }}>Engineering</option>
                                    <option value="medicine" {{ $tutor->specialization == 'medicine' ? 'selected' : '' }}>Medicine</option>
                                </select>

                          <div class="mb-2">
                          <label for="address" class="form-label fw-bold" style="color: #1cc88a;">year</label>
                          <select id="yearSelect" name="year" class="form-select"
                                        >
                                        @if(isset($tutor->year))
                                        <option value="{{ $tutor->year }}" selected>{{ ucfirst(str_replace('_', ' ', $tutor->year)) }}</option>
                                    @endif
                                        @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Teaching Preferences & Languages -->
            <div class="row">
                <div class="col-md-6 mt-4 mb-3 d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="section-title"><i class="fas fa-chalkboard-teacher icon"></i> Teaching Preferences</h5>
    
                            <div class="mb-2">
                            <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Status</label>
                            <input type="text" class="form-control" id="address" name="status" value="{{$tutor->status}}" style="border: 2px solid #dee2e6;">
                            </div>
                        
                            <div class="mb-2">
                          <label for="address" class="form-label fw-bold"  style="color: #1cc88a;">Subject you want to teach</label>
                          <select class="form-select teaching" id="teachingSubjects" name="teaching[]">
                          @foreach (config('subjects.subjects') as $subject)
                          <option value="{{ $subject }}" {{ in_array($subject, $selectedSubjects) ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $subject)) }}
                          </option>
                          @endforeach
                         </select>
                        </div>
                        
                         <div class="mb-2">
                            <label for="address" class="form-label fw-bold"  style="color: #1cc88a;">Description</label>
                        <input type="text" class="form-control" id="address" name="description" value="{{$tutor->description}}" style="border: 2px solid #dee2e6;">
                        </div>

                        <div class="mb-2">
                        <label for="document" class="form-label fw-bold" style="color: #1cc88a;">Upload Qualification Document</label>
                        <div class="input-group">
                            <input type="file" class="form-control fw-bold  d-block" id="document" name="document"  accept=".pdf,.doc,.docx,.jpg,.png " >
                        </div>
                    </div>

                        <div class="mb-2">
                        <label for="video" class="form-label fw-bold"  style="color: #1cc88a;">Video</label>
                        <div class="input-group">
                          <!-- <input type="text" class="form-control" id="video" placeholder="Video URL or Name"> -->
                          <input type="file" class="form-control" id="videoUpload" accept="video/*" style="border: 2px solid #dee2e6;">
                        </div>
                      </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6 mt-4 mb-3 d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="section-title"><i class="fas fa-language icon"></i> Languages</h5>
                        
                            <div class="mb-2">
                        <label for="address" class="form-label fw-bold"  style="color: #1cc88a;">Educational teaching</label>
                        <input type="text" class="form-control" name="edu_teaching" id="address" value="{{$tutor->edu_teaching}}" style="border: 2px solid #dee2e6;">
                      </div>
                        
                      <div class="md-2">
                        <label for="address" class="form-label fw-bold"  style="color: #1cc88a;">Languge teaching</label>
                        @if($selectedLanguage && !in_array($selectedLanguage, ['english', 'spanish', 'french', 'german', 'italian', 'portuguese']))
                        <option value="{{ $selectedLanguage }}" selected>{{ ucfirst($selectedLanguage) }}</option>
                    @endif
                    <select name="language_tech" class="form-select" id="language">
                    <option value="english" {{ $selectedLanguage == 'english' ? 'selected' : '' }}>English</option>
                    <option value="spanish" {{ $selectedLanguage == 'spanish' ? 'selected' : '' }}>Spanish</option>
                    <option value="french" {{ $selectedLanguage == 'french' ? 'selected' : '' }}>French</option>
                    <option value="german" {{ $selectedLanguage == 'german' ? 'selected' : '' }}>German</option>
                    <option value="italian" {{ $selectedLanguage == 'italian' ? 'selected' : '' }}>Italian</option>
                    <option value="portuguese" {{ $selectedLanguage == 'portuguese' ? 'selected' : '' }}>Portuguese</option>
                </select>
                </div>    
                
                <div id="language-container">
                        @foreach ($languages_spoken as $index => $lang)
                          <div class="form-row d-flex flex-column flex-md-row mb-4" id="language-row">
                              <div class="col-md-12 col-lg-12">
                                  <label for="language_proficient" class="form-label fw-bold"  style="color: #1cc88a;">
                                    Language Proficient
                                  </label>
                                  <div class="position-relative">
                                      <select name="language_proficient[]" class="form-select rounded-md pr-5"
                                          id="language_proficient" onchange="toggleArrow(this)">
                                          <option value="" disabled>Select Language</option>
                                          @foreach ($languageNames as $key => $language)
                                          <option value="{{ $key }}" 
                                          {{ isset(old('language_proficient')[$key]) && old('language_proficient')[$key] == $key ? 'selected' : '' }}>
                                          {{ $language}}
                                      </option>
                                      @endforeach
                                      </select>
                                  </div>
                              </div>
                               

                              <div class="col-md-12 col-lg-12">
                                  <label for="language_level_{{ $index }}"  class="form-label fw-bold"  style="color: #1cc88a;">
                                      Level
                                  </label>
                                  <div class="position-relative">
                                      <select name="language_level[]" class="form-select rounded-md pr-5"
                                          id="language_level_{{ $index }}" onchange="toggleArrow(this)">
                                          <option value="">Select Level</option>
                                          <option value="A1" {{ $lang['level'] == 'A1' ? 'selected' : '' }}>A1</option>
                                          <option value="A2" {{ $lang['level'] == 'A2' ? 'selected' : '' }}>A2</option>
                                          <option value="B1" {{ $lang['level'] == 'B1' ? 'selected' : '' }}>B1</option>
                                          <option value="B2" {{ $lang['level'] == 'B2' ? 'selected' : '' }}>B2</option>
                                          <option value="C1" {{ $lang['level'] == 'C1' ? 'selected' : '' }}>C1</option>
                                          <option value="C2" {{ $lang['level'] == 'C2' ? 'selected' : '' }}>C2</option>
                                          <option value="native" {{ $lang['level'] == 'native' ? 'selected' : '' }}>Native</option>
                                      </select>

                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
            </div>
    <!--  -->
            <div class="d-flex justify-content-end mt-4 mb-3">
            <button type="submit" class="btn mt-2 mb-2 animated-button" style="background-color: #198754;color: white;">Submit</button>      
            </div>
            

</form>
</section>
                         
            
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
<script>
    document.getElementById('document').disabled = false;
document.getElementById('document').style.display = 'block';

$(document).ready(function($) {
setTimeout(function() {
    $(".alert").fadeOut("slow");
}, 5000);
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        function isLeapYear(year) {
            return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
        }

        function populateDays(month, year) {
            let daySelect = document.getElementById("day");
            let selectedDay = "{{ $selectedDay }}";
            let daysInMonth = Days[month - 1];

            if (month === 2 && isLeapYear(year)) {
                daysInMonth = 29;
            }

            daySelect.innerHTML = '<option value="">Day</option>';
            for (let i = 1; i <= daysInMonth; i++) {
                let option = new Option(i, i);
                if (i == selectedDay) option.selected = true;
                daySelect.appendChild(option);
            }
        }

        function updateDob() {
            let year = document.getElementById("year").value;
            let month = document.getElementById("month").value;
            let day = document.getElementById("day").value;
            document.getElementById("dob").value = (year && month && day) ? `${year}-${month}-${day}` : "";
        }

        document.getElementById("year").addEventListener("change", function () {
            let year = parseInt(this.value);
            let month = parseInt(document.getElementById("month").value);
            if (month) {
                populateDays(month, year);
            }
            updateDob();
        });

        document.getElementById("month").addEventListener("change", function () {
            let month = parseInt(this.value);
            let year = parseInt(document.getElementById("year").value);
            if (month) {
                populateDays(month, year);
            }
            updateDob();
        });

        document.getElementById("day").addEventListener("change", updateDob);

        // Populate days on load if a month and year are preselected
        let preselectedMonth = "{{ $selectedMonth }}";
        let preselectedYear = "{{ $selectedYear }}";
        if (preselectedMonth && preselectedYear) {
            populateDays(parseInt(preselectedMonth), parseInt(preselectedYear));
        }
    });
</script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@endsection


    