 @extends('layouts.app')
 @php
 $emailValue = is_array($verifiedEmail) ? end($verifiedEmail) : $verifiedEmail;
 use App\Models\Tutor;
 $tutors = Tutor::whereNotNull('profileImage')->take(10)->get();
 @endphp

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
 <meta name="description"
     content="Tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
 <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png" />
 <link rel="stylesheet" href="{{ asset('css/tutor-form.css') }}">
 <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="{{ asset('js/jquery.js') }}"></script>
 <style>
     .select2-container--default .select2-selection--multiple .select2-selection__choice {
         background-color: #42B979 !important;
         color: #fff;
         margin-top: 0px !important;
     }

     .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
         padding-left: 18px !important
     }

     .select2-selection__choice__remove span {
         color: #fff;
     }

     .loader {
         display: none;
         position: fixed;
         z-index: 9999;
         background-color: rgba(255, 255, 255, 0.8);
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         justify-content: center;
         align-items: center;
     }

     .main-banner {
         margin-top: 5.5rem !important;
     }
 </style>
 @include('whatsapp')
 <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;"
     onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
 @if ($errors->any())

 <div class="alert alert-danger d-block" id="close" style="">
     <ul style="margin: 0; padding: 10px 0;">
         @foreach ($errors->all() as $error)
         <li style="display:flex; justify-content: space-between; align-items: center;">{{ $error }} <i
                 class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true"></i></li>

         @endforeach
     </ul>
 </div>
 @endif

 <div id="otpModal" class="modal fade show d-block" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false" style="background-color: rgba(0,0,0,0.6);">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-0 shadow-lg rounded-3">
             <div class="modal-header text-white" style="background:lightgreen;">
                 <h5 class="modal-title fw-bold" id="otpModalLabel">Welcome to Edexcel Academy</h5>
             </div>
             <div class="modal-body p-4">
                 <!-- <p class="text-muted text-center">
                    We've sent a One-Time Password (OTP) to your email: <br>
                    <strong class="text-dark">{{ session('verifiedEmail') }}</strong>
                </p> -->

                 <form id="otpForm">
                     @csrf
                     <input type="hidden" name="email" value="{{ session('verifiedEmail') }}">

                     <div class="mb-3">
                         <!-- <label for="otpInput" class="form-label fw-semibold">Enter OTP</label> -->
                         <input type="text" id="otpInput" name="otp"
                             class="form-control text-center fs-5 rounded-pill border-success shadow-sm"
                             placeholder="Please enter 6 digit OTP" maxlength="6" required>
                         <div id="otpError" class="text-danger mt-2 text-center fw-bold" style="display: none;">
                             ❌ Invalid OTP. Please try again.
                         </div>
                     </div>

                     <div class="d-grid gap-2">
                         <button type="button" class="btn btn-success fw-bold shadow-sm rounded-pill"
                             onclick="verifyOTP()">Verify OTP</button>
                     </div>

                   <p class="text-center mt-3">
                        Didn't receive the OTP?
                        <a href="javascript:void(0);" id="resendLink" class="text-success fw-semibold" onclick="resendOTP()">Resend</a>
                        <span id="resendMessage" class="text-muted ms-2" style="display: none;">Sending...</span>
                    </p>

                 </form>
             </div>
         </div>
     </div>
 </div>

 @section('content')

 <div class="row">
     <header class="main_header d-flex  py-1 px-3 justify-content-between align-items-center"
         style="position: fixed; height: 115px; top: 0; left: 0; width: 100%; z-index: 1000; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);background: #42b979;">
         <!-- Left Logo -->
         <a class="arrow" href="{{ route('newhome') }}">
             <img src="{{ asset('images/white-logo.jpeg') }}" alt="Edexcel-logo" style="height: 100px; border-radius: 60px;width:100px;">
         </a>

         <!-- Right Login Button -->
         <a href="{{ route('login') }}" class="btn login-btn text-white px-4 py-2"
             style="background-color: #fff; border: none; border-radius: 5px;color:#42B979 !important;">
             Login
         </a>
     </header>
 </div>
 <div class="row mt-4">
     <div class="container-fluid main-banner">
         <!-- Tutor Image Slider -->
         <div class="d-flex text-center justify-content-center mt-3">
             <h4 class="text-white mt-2" style="font-size:30px;font-weight:bold">
                 Join The Community Of Tutors
             </h4>
         </div>
         <div class="owl-carousel owl-theme container">
             @foreach($tutors as $tutor) @php
             $subjects = @unserialize($tutor->teaching);
             if ($subjects === false) {
             $subjects = is_array(json_decode($tutor->teaching, true)) ? json_decode($tutor->teaching, true) : [];
             }
             $subjectString = !empty($subjects) ? implode(', ', $subjects) : 'No Subjects Available';
             @endphp
             <div class="item text-white" style="border:1px solid #fff; border-radius:10px; background-color: rgba(0,0,0,0.5); overflow: hidden;">
                 <img src="{{ asset('storage/' . $tutor->profileImage) }}" style="height:180px;border-top-left-radius:10px;border-top-right-radius:10px;" class="" alt="Tutor Image">
                 <div class="ps-2 text-start">
                     <h6 class="mb-1 pt-2 text-white"><i class="fa fa-graduation-cap"></i><strong>Subject:</strong><span class="ms-1">{{ $subjectString }}</span></h6>


                     <h6 class="mb-1 text-white"><i class="fa fa-book"></i> <strong>Experience:</strong> <span class="ms-1">{{ $tutor->experience }} {{ $tutor->experience > 1 ? 'years' : 'year' }} of teaching experience</span></h6>
                     <h6 class="mb-1 text-white"><i class="fas fa-user"></i> <strong class="">Gender:</strong><span class="ms-1">{{ $tutor->gender }}</span></h6>
                 </div>
             </div>
             @endforeach
         </div>
     </div>
 </div>

 <div class="main-page col-12 bg-white col-md-10 mx-auto p-0 text-center" style="padding: 0px 10px 0px 10px;"><!--md-8-->
     <div class="row justify-content-center">
         <div class="col-lg-11 col-sm-4">
             <form id="tutorForm" class=" pages" method="POST" action="{{ route('tutor-create') }}"
                 style="padding-bottom: 20px; padding-top: 20px;border-radius: 10px; margin-top: 10px; margin-bottom: 10px; "
                 enctype="multipart/form-data">
                 <div class="step-form-heading col py-2 text-center flex-column rounded-top ">
                     <h2 class="text-center my-2 fw-bold">Teacher Sign-Up Form</h2>
                 </div>
                 @csrf
                 <div>
                     <div id="page-1" class="mx-3">
                         <div class="form-group d-none">
                             <input type="search" value="English" name="subject" class="form-control" id="page1-search"
                                 placeholder="Search" style="height:50px; border: 1px solid #ccc;">
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="f_name" class="form-label" style="color:#42b979;"><strong>First
                                         Name</strong></label>
                                 <input type="text" class="form-control" id="f_name" name="f_name" placeholder="John"
                                     style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                 <div style="text-align: left;font-size: 14px; color: #e74c3c;">
                                 </div>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="l_name" class="form-label" style="color:#42b979;"><strong>Last
                                         Name</strong></label>
                                 <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Doe"
                                     style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                 <div style="text-align: left;font-size: 14px; color: #e74c3c;">
                                 </div>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="email" class="form-label" style="color:#42b979;">
                                     <strong>Email</strong>
                                 </label>

                                 <input type="email" class="form-control email-field" id="email" name="email"
                                     value="{{ old('email', $emailValue) }}"
                                     style="box-shadow: none; background-color: white;border: 1px solid rgba(137, 135, 135, 0.5);" readonly>

                                 <small class="error-message text-danger"
                                     style="display: block; margin-top: 5px; text-align:left;">This email is already
                                     registered.</small>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="phone" class="form-label" style="color:#42b979;">
                                     <strong>Mobile Number</strong>
                                 </label>
                                 <div class="d-flex align-items-center">
                                     <select class="form-select w-auto" id="countrySelect" 
                                         style="border: 1px solid rgb(137, 135, 135); flex-shrink: 0;">
                                         @foreach ($countriesPhone as $key => $country)
                                         <option value="{{ $key }}">{{ $country }}</option>
                                         @endforeach
                                     </select>
                                     <input type="text" class="form-control" id="phone" name="phone"
                                         placeholder="e.g +92XXXXXXXXXX"
                                         style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                 </div>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="password" class="form-label" style="color:#42b979;">
                                     <strong>Password</strong>
                                 </label>
                                 <div>
                                     <div style="position: relative;">
                                         <input required type="password" id="password" name="password"
                                             placeholder="Password" class="form-control inp-1"
                                             style="width: 100%; flex-direction: column; border-radius: 5px; padding: 5px 8px; margin: 7px 0px; border: 1px solid rgba(137, 135, 135, 0.5);" />
                                         <div style="text-align: left; font-size: 14px; color: #e74c3c;"></div>
                                         <button type="button" onclick="togglePassword('password', this)"
                                             style="position: absolute; right: 10px; top: 20px; transform: translateY(-50%); border: none; background: none; cursor: pointer;">
                                             <img id="eye-icon" src="{{ asset('images/close_eye.png') }}" alt="eye icon"
                                                 style="height: 20px; width: 20px;color:#42b979;" />
                                         </button>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="c_password" class="form-label" style="color:#42b979;">
                                     <strong>Confirm Password</strong>
                                 </label>
                                 <div style="position: relative;">
                                     <input type="password" id="c_password" name="c_password"
                                         placeholder="Confirm Password" class="form-control inp-1"
                                         style="width: 100%; flex-direction: column; border-radius: 5px; padding: 5px 8px; margin: 7px 0px; border: 1px solid rgba(137, 135, 135, 0.5);" />
                                     <div style="text-align: left; font-size: 14px; color: #e74c3c;"></div>
                                     <button type="button" onclick="togglePassword2('c_password', this)"
                                         style="position: absolute; right: 10px; top: 20px; transform: translateY(-50%); border: none; background: none; cursor: pointer;">
                                         <img id="c-eye-icon" src="{{ asset('images/close_eye.png') }}" alt="eye icon"
                                             style="height: 20px; width: 20px;" />
                                     </button>
                                 </div>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="gender" class="form-label" style="color:#42b979;">
                                     <strong>Gender</strong>
                                 </label>
                                 <select class="form-control select2" id="gender" name="gender"
                                     style="border: 1px solid #000;">
                                     <option value="male">Male</option>
                                     <option value="female">Female</option>
                                     <!-- <option value="others">Others</option> -->
                                 </select>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <div class="form-group">
                                     <label for="datePicker" class="date-picker-label" style="color: #42b979;">
                                         <strong>Date of Birth</strong>
                                     </label>
                                     <div class="ad-dob d-flex justify-content-between align-items-center"
                                         style="gap: 8px;">
                                         <select id="year" name="year" class="form-select"
                                             style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;"
                                             onchange="updateDob()">
                                         </select>
                                         <select id="month" name="month" class="form-select"
                                             style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;"
                                             onchange="updateDob()">
                                         </select>
                                         <select id="day" name="day" class="form-select"
                                             style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;"
                                             onchange="updateDob()">
                                         </select>
                                     </div>
                                     <input name="dob" type="hidden" id="dob" />
                                 </div>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="choice col-6 px-2 mb-2">
                                 <label for="experience" class="form-label" style="color:#42b979;">
                                     <strong>How We Can Help</strong>
                                 </label>
                                 <select class="form-control form-select" id="status" name="availability_status"
                                     aria-label="Default select example"
                                     style="border: 1px solid rgba(137, 135, 135, 0.5); width: 100%;">
                                     <option value="online" selected>Online</option>
                                     <option value="physical">Physical</option>
                                     <option value="both">Both</option>
                                 </select>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="currency_price" class="form-label" style="color:#42b979;">
                                     <strong>Price</strong>
                                 </label>
                                 <div class="row align-items-center">
                                     <div class="col-2">
                                         <select class="form-select" id="currency" name="currency" required>
                                             @foreach ($symbols as $key => $symbol)
                                             @if(is_string($symbol))
                                             <option value="{{ $symbol }}">{{ $symbol }}</option>
                                             @endif
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="col-10">
                                         <input type="text" class="form-control" id="price" name="price"
                                             placeholder="e.g $65" required>
                                     </div>
                                 </div>
                             </div>

                             <!-- Hidden input to combine values -->
                             <input type="hidden" name="currency_price" id="currency_price">

                         </div>
                         <div class="form-row d-flex flex-column flex-md-row gap-5">
                             <!-- Upload Area (Left Side) -->
                             <div class="px-2 mb-2 col-6 d-flex flex-column align-items-left">
                                 <label class="mb-2 fw-bold" style="color: #42b979; font-size: 18px;text-align: left;">Profile Picture</label>
                                 <div class="upload-area d-flex flex-column align-items-center justify-content-center text-center" id="uploadArea"
                                     style="cursor: pointer; border: 2px dashed #42b979; width: 100%; height: 185px;">
                                     <input type="file" class="form-control d-none" id="profilePicture" name="profileImage" accept="image/*">
                                     <div class="upload-content text-center">
                                         <div class="upload-icon">
                                             <i class="fas fa-cloud-upload-alt fa-2x"></i>
                                         </div>
                                         <div class="upload-text">
                                             <p class="mb-1">Click to upload or drag and drop</p>
                                             <small>PNG, JPG or JPEG (max. 5MB)</small>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!-- Preview Area (Right Side) -->
                             <div class="px-2 mb-2 col-4 d-flex flex-column d-none" id="previewContainer">
                                 <label class="mb-2 fw-bold" style="color: #42b979; font-size: 18px;text-align: left;">Preview Picture</label>
                                 <div style="position: relative; border: 2px solid #42b979; border-radius: 8px; width: 100%; height: 185px;">
                                     <img id="previewImg" src="" alt="Preview"
                                         style="width: 100%; height: 100%; object-fit: contain; border-radius: 8px;">
                                     <button id="removeBtn" type="button"
                                         style="position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; border-radius: 50%; padding: 5px;">
                                         X
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="d-none px-3 mx-3" id="page-2">
                         <div class="pg-1-heading">
                             <!-- <h3 class="fs-5 fw-bold py-1">2 Steps Left to Unlock Your Teaching Potential</h3> -->
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <!-- Highest Qualification -->
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="qualification" class="form-label" style="color:#42b979;">
                                     <strong>Highest Qualification</strong>
                                 </label>
                                 <select class="form-control school_class" id="qualification" name="qualification"
                                     style="border: 1px solid rgb(137, 135, 135);">
                                     @foreach($schoolClasses as $schoolClass)
                                     <option value="{{ $schoolClass->name }}">{{ $schoolClass->name }}</option>
                                     @endforeach
                                     <option value="">Others</option>
                                 </select>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="qualificationDocument" class="form-label" style="color:#42b979;">
                                     <strong>Add Your Qualification Document</strong>
                                 </label>
                                 <input type="file" class="form-control" id="qualificationDocument"
                                     accept="application/pdf"
                                     name="document"
                                     style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                                 <p style="text-align: justify;color: #42b979;font-weight: bold;font-size: 12px;">PDF OR DOC Files Are Allowed</p>
                                 <div class="doc" style="text-align: left;font-size: 14px; color: #e74c3c;"></div>
                             </div>
                         </div>

                         <div class="form-row d-flex flex-column flex-md-row">
                             <!-- Country and Year -->
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="countryYear" class="form-label" style="color:#42b979;">
                                     <strong>Country and Year</strong>
                                 </label>
                                 <div class="d-flex gap-2">
                                     <!-- Country Select -->
                                     <select id="country" name="country" class="form-select me-2"
                                         style="border: 1px solid rgb(137, 135, 135);">
                                         <option value="" disabled selected>Select Country</option>
                                         @foreach ($countriesPhone as $key => $country)
                                         <option value="{{ $key }}">{{ $country }}</option>
                                         @endforeach
                                     </select>
                                     <!-- Year Select -->
                                     <select id="yearSelect" name="year" class="form-select"
                                         style="border: 1px solid rgb(137, 135, 135);">
                                         <option value="" disabled selected>Select Year</option>
                                         @for ($i = date('Y'); $i >= 1900; $i--)
                                         <option value="{{ $i }}">{{ $i }}</option>
                                         @endfor
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="specialization" class="form-label" style="color:#42b979;">
                                     <strong>Specialization</strong>
                                 </label>
                                 <select name="specialization[]" class="form-control select2" placeholder="Add Multiple Subject" id="specialization" multiple>
                                     @foreach (config('specialization.specialization') as $specialization)
                                     <option value="{{ $specialization }}">
                                         {{$specialization}}
                                     </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>

                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="institution" class="form-label" style="color:#42b979;">
                                     <strong>Institution/University Name</strong>
                                 </label>
                                 <select name="location" class="form-control select2" id="institution">
                                     @foreach (config('universities.universities') as $universities)
                                     <option value="{{ $universities }}">
                                         {{$universities}}
                                     </option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="other_qualification_input" class="form-label" style="color:#42b979;"><strong>Courses
                                         Teaching</strong></label>
                                 <!-- <input type="text" class="form-control" id="other_qualification_input"
                                    name="other_qualification_input"
                                    style="border: 1px solid rgba(137, 135, 135, 0.5);" /> -->
                                 <select id="other_qualification_input" name="courses">
                                     @foreach ($courses as $code => $name)
                                     <option value="{{ $code }}">{{ $name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                    
    <div class="col-md-6 px-2 mb-2">
        <label for="teaching" class="form-label" style="color:#42b979;">
            <strong>Subject You Can Teach</strong>
        </label>

        <div class="row">
            <div class="col-11">
                <select class="form-select teaching" id="teachingSubjects" name="teaching[]"
                    style="border: 1px solid rgba(137, 135, 135, 0.5);">
                    @foreach (config('subjects.subjects') as $subject)
                        <option value="{{ $subject }}">{{ $subject }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-1 d-flex align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectModal"
                    style="padding: 6px 10px; font-size: 16px;">
                    +
                </button>
            </div>
        </div>
    </div>

                             <div class="col-md-6 px-2 mb-2">
                                 <label for="language" class="form-label" style="color:#42b979;">
                                     <strong>Language Teaching</strong>
                                 </label>
                                 <select name="language_tech" class="form-control" id="language">
                                     <option value="" disabled selected>Select Language</option>
                                     @foreach ($languages as $code => $name)
                                     <option value="{{ $code }}">{{ $name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-row d-flex flex-column flex-md-row">
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="experience" class="form-label" style="color:#42b979;"><strong>Experience (In
                                         Teaching)</strong></label>
                                 <input type="number" min="0" class="form-control" id="experienceInTeaching"
                                     name="experience"
                                     style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                                 <div style="text-align: left;font-size: 14px; color: #e74c3c;"></div>
                             </div>
                             <div class="col-md-6 px-2 mb-2">
                                 <label for="edu_teaching" class="form-label" style="color:#42b979;"><strong>Educational
                                         Teaching</strong></label>
                                 {{-- <input type="text" class="form-control" id="edu_Teaching"
                                    name="edu_teaching" style="border: 1px solid rgba(137, 135, 135, 0.5);" /> --}}
                                 <select name="edu_teaching[]" class="form-control h-40 select2" placeholder="Add Multiple Subject" id="edu_Teaching" multiple>
                                     @foreach (config('subjects.subjects') as $subject)
                                     <option value="{{ $subject }}">
                                         {{$subject}}
                                     </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div id="languages-container">
                             <div class="form-row d-flex flex-column flex-md-row mb-4" id="language-row-1">
                                 <div class="col-md-6 px-2">
                                     <label for="language_proficient" class="form-label" style="color:#42b979;">
                                         <strong>Language Proficient</strong>
                                     </label>
                                     <div class="position-relative">
                                         <select name="language_proficient[]" class="form-control rounded-md pr-5"
                                             id="language_proficient_1" onchange="handleLanguageChange(this)">
                                             <option value="" disabled selected>Select Language</option>
                                             @foreach ($languages as $code => $name)
                                             <option value="{{ $code }}">{{ $name }}</option>
                                             @endforeach
                                         </select>
                                         <i class="fas fa-chevron-down position-absolute"
                                             style="right: 10px; top: 50%; transform: translateY(-50%);"
                                             id="arrow-1"></i>
                                     </div>
                                 </div>

                                 <div class="col-md-6 px-2">
                                     <label for="language_level" class="form-label" style="color:#42b979;">
                                         <strong>Level</strong>
                                     </label>
                                     <div class="position-relative">
                                         <input type="text" id="selected_language_level" name="language_level[]" class="form-control rounded-md pr-5 bg-white"
                                             placeholder="Select Level" readonly>
                                         <button type="button" class="position-absolute border-0 bg-transparent"
                                             style="right: 10px; top: 50%; transform: translateY(-50%);"
                                             data-bs-toggle="modal" data-bs-target="#languageLevelModal">
                                             <i class="fas fa-chevron-down"></i>
                                         </button>
                                     </div>

                                 </div>
                             </div>

                             <div class="col-md-2 px-2 mb-2 flex items-center justify-center"
                                 id="delete-btn-container-1">
                                 <!-- No delete button for the first row -->
                             </div>


                             <div class="text-left mx-2" style="text-align: left;">
                                 <button type="button"
                                     class="add-language-btn border-0 bg-transparent text-decoration-underline"
                                     onclick="addLanguageField()" style="color:#42b979;">
                                     Add Another Language
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="form-row d-flex flex-column flex-md-row">
                     <div class="col-md-6 px-2 mb-2 d-none">
                         <label for="whatsapp" class="form-label" style="color:#42b979;"><strong>WhatsApp
                                 Number</strong></label>
                         <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                             placeholder="e.g +92XXXXXXXXXX"
                             style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                     </div>
                 </div>
         </div>
         <div class="d-none mx-3" id="page-3">
             <div class="pg-1-heading">
                 <!-- <h3 class="fs-5 fw-bold py-3">You're Just One Step Away</h3> -->
             </div>
             <input required type="email" name="c_email" placeholder="Email" class="inp-1 d-none"
                 style="border: 1px solid rgba(137, 135, 135, 0.5);" readonly>

             <div class="form-row d-none flex-column flex-md-row">
                 <div class="col-md-12 px-2 mb-2">
                     <label for="teaching" class="form-label" style="color:#42b979;"><strong>Available
                             Time</strong></label>
                     <select class="form-select" id="teaching" name="availability"
                         style="border: 1px solid rgb(137, 135, 135);">
                         <option selected>Select Time</option>
                         <option value="9:00AM to 10:00AM">6:00AM to 7:00AM</option>
                         <option value="10:00AM to 11:00AM">8:00AM to 9:00AM</option>
                         <option value="10:00AM to 11:00AM">10:00Am to 11:00Am</option>
                         <option value="10:00AM to 11:00AM">12:00PM to 1:00PM</option>
                         <option value="10:00AM to 11:00AM">2:00PM to 3:00PM</option>
                         <option value="10:00AM to 11:00AM">4:00PM to 5:00PM</option>
                         <option value="10:00AM to 11:00AM">6:00PM to 7:00PM</option>
                         <option value="10:00AM to 11:00AM">8:00PM to 9:00PM</option>
                         <option value="10:00AM to 11:00AM">10:00PM to 11:00PM</option>
                     </select>
                 </div>
             </div>
             <div class="col-12 px-2 py-2"><label for="curriculum" class="form-label"
                     style="color:#42b979;"><strong>Description (Optional)</strong></label>
                 <textarea class="form-control" id="curriculum" name="description" rows="5"
                     placeholder="Enter Your Description Here..."
                     style="box-shadow: none;border: 1px solid rgb(137, 135, 135);"></textarea>
             </div>
         </div>
         <div class="d-none" id="page-4">
             <label class="form-label" style="color:#42b979;">
                 <strong>Upload Your Introduction Video</strong>
             </label>

             <!-- Row for Upload Section and Demo Video -->
             <div class="row">
                 <div class="col-6">
                     <div class="upload-box mx-3">
                         <div class="upload-area-video" id="uploadAreaVideo">
                             <!-- Hidden File Input -->
                             <input type="file" id="videoFileInput" name="videoFile" accept="video/mp4,video/webm,video/ogg" style="display: none;" />

                             <!-- Upload Area -->
                             <div class="upload-content-video" id="uploadVideoContent" onclick="document.getElementById('videoFileInput').click();">
                                 <div class="upload-icon-video">
                                     <i class="fas fa-cloud-upload-alt"></i>
                                 </div>
                                 <div class="upload-text">
                                     <p class="mb-1">Click to upload or drag and drop your video</p>
                                     <small>MP4, WebM or OGG (max. 50MB)</small>
                                 </div>
                             </div>

                             <!-- Loading Indicator -->
                             <div class="loading" id="loadingVideoIndicator" style="display:none;">
                                 <i class="fas fa-spinner fa-2x loading-spinner"></i>
                             </div>
                         </div>

                         <!-- Error & Controls -->
                         <div class="error-message text-danger mt-2" id="errorVideoMessage"></div>

                         <button type="button" class="btn btn-outline-secondary w-100 remove-btn mt-3" id="removeVideoButton">
                             Remove Video
                         </button>

                         <div class="btn btn-outline-secondary w-100 mt-3" id="startBtn">
                             Start Recording
                         </div>
                     </div>
                 </div>

                 <div class="col-6">
                     <div class="demo-box">
                         <video id="live" controls style="width:100%;height:70%;" src="{{ asset('images/banner-video.mp4') }}"></video>
                     </div>
                 </div>

             </div>

             <!-- Displaying the uploaded video in a row, full width (col-12)
                        <div class="uploaded-video-row col-12 mt-4" id="uploadedVideoRow" style="display:none;">
                            <div class="row">
                                <div class="col-12">
                                    <video class="uploaded-video" controls id="uploadedVideoPreview">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div> -->
         </div>

         <div class="col-12 my-4 d-flex justify-content-between align-items-center"
             style="padding-top: 20px; position: relative;">
             <!-- Previous Button -->
             <input onclick="backStep(this)" id="back-btn" type="button" value="← Previous"
                 class="btn previous-btn p-2 rounded border-0 text-light bg_theme_green fs-6 py-1 px-3"
                 style="display: none;margin-left:40px">

             <!-- Next Button -->
             <input onclick="validateAndNextStep(this)" id="next-btn" type="button" value="Next →"
                 class="btn next-btn p-2 rounded border-0 text-light bg_theme_green fs-6 py-1 px-3"
                 style="margin-right: 15px">
         </div>
     </div>
     </form>
 </div>
 </div>
 </div>
 <div class="modal fade" id="languageLevelModal" tabindex="-1" aria-labelledby="languageLevelModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="languageLevelModalLabel">Select Language Level</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <select id="modal_language_level" class="form-select">
                     <option value="" disabled selected>Select Level</option>
                     <option value="A1">A1</option>
                     <option value="A2">A2</option>
                     <option value="B1">B1</option>
                     <option value="B2">B2</option>
                     <option value="C1">C1</option>
                     <option value="C2">C2 - Proficient</option>
                     <option value="native">Native</option>
                 </select>
             </div>
             <div class="modal-footer justify-content-end">
                 <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" id="saveLanguageLevel">Save</button>
             </div>
         </div>
     </div>
 </div>
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newSubjectInput" class="form-control" placeholder="Enter new subject">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="addNewSubject()">Add Subject</button>
            </div>
        </div>
    </div>
</div>


 @endsection
 @section('js')
 @if (session('verifiedEmail'))
 <script>
     document.getElementById('otpForm').addEventListener('keypress', function (event) {
        // If Enter key is pressed
        if (event.key === 'Enter') {
            event.preventDefault(); // Stop form submission
        }
    });
     $(document).ready(function() {
         $('#otpModal').modal('show');
     });
 </script>
 @endif
 <script src="{{ asset('js/popper.min.js')}}"></script>
 <script src="{{ asset('js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
 <script src=" {{ asset('js/tutor.js') }}"></script>
 <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <script>function addNewSubject() {
    const newSubject = document.getElementById('newSubjectInput').value.trim();
    if (newSubject === '') {
        alert('Please enter a subject name.');
        return;
    }

    const select = document.getElementById('teachingSubjects');

    // Check if subject already exists
    const existingOption = Array.from(select.options).find(opt => opt.value.toLowerCase() === newSubject.toLowerCase());
    if (existingOption) {
        alert('Subject already exists in the list.');
        return;
    }

    // Create new option
    const option = document.createElement('option');
    option.value = newSubject;
    option.text = newSubject;
    option.selected = true; // select newly added one

    select.add(option);

    // Clear input
    document.getElementById('newSubjectInput').value = '';

    // Close modal
    const modalEl = document.getElementById('addSubjectModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();
}

     jQuery(document).ready(function($) {
         $(".owl-carousel").owlCarousel({
             nav: true,
             items: 3, // Show 3 slides at a time
             loop: true,
             margin: 10,
             autoplay: true,
             autoplayTimeout: 3000,
             autoplayHoverPause: true,
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 2
                 },
                 1000: {
                     items: 3
                 }
             }
         });
     })
     window.addEventListener('load', function() {
         const loader = document.getElementById('lazzyLoader');
         if (loader) {
             loader.classList.add('d-none'); // Hide loader after page load
         }
     });
     document.addEventListener('DOMContentLoaded', () => {
         const loader = document.getElementById('lazzyLoader');
         const form = document.querySelector('form'); // Adjust if needed

         if (form && loader) {
             form.addEventListener('submit', function(e) {
                 loader.classList.remove('d-none');
                 loader.classList.add('d-block');
                 loader.style.display = 'flex'; // Ensure it's flex if needed
             });
         }
     });
     document.addEventListener('DOMContentLoaded', () => {
         const startBtn = document.getElementById('startBtn');
         const videoInput = document.getElementById('videoFileInput');
         const loadingIndicator = document.getElementById('loadingVideoIndicator');
         const videoPreview = document.getElementById('live');
         const removeBtn = document.getElementById('removeVideoButton');
         const errorMsg = document.getElementById('errorVideoMessage');

         const defaultSrc = '/images/banner-video.mp4'; // replace with your default video path
         videoPreview.src = defaultSrc;
         videoPreview.style.display = 'block';

         let stream = null;
         let mediaRecorder = null;

         startBtn.onclick = async () => {
             errorMsg.innerText = '';
             loadingIndicator.style.display = 'block';

             try {
                 // 1080p HD stream
                 stream = await navigator.mediaDevices.getUserMedia({
                     video: {
                         width: 1920,
                         height: 1080
                     },
                     audio: true
                 });

                 const recordedChunks = [];

                 // Live preview during recording
                 videoPreview.srcObject = stream;
                 videoPreview.style.display = 'block';
                 videoPreview.muted = true;
                 videoPreview.play();

                 const options = {
                     mimeType: 'video/webm;codecs=vp9',
                     videoBitsPerSecond: 5000000 // 5 Mbps for better HD quality
                 };
                 mediaRecorder = new MediaRecorder(stream, options);

                 mediaRecorder.ondataavailable = e => {
                     if (e.data.size > 0) recordedChunks.push(e.data);
                 };

                 mediaRecorder.onstop = () => {
                     const blob = new Blob(recordedChunks, {
                         type: 'video/webm'
                     });
                     const file = new File([blob], `live_video_${Date.now()}.webm`, {
                         type: 'video/webm'
                     });

                     const dataTransfer = new DataTransfer();
                     dataTransfer.items.add(file);
                     videoInput.files = dataTransfer.files;

                     // Replace preview with recorded video
                     videoPreview.srcObject = null;
                     videoPreview.src = URL.createObjectURL(blob);
                     videoPreview.muted = false;
                     videoPreview.load();
                     videoPreview.play();

                     loadingIndicator.style.display = 'none';
                 };

                 mediaRecorder.start();

                 // Stop after 60 seconds
                 setTimeout(() => {
                     mediaRecorder.stop();
                     stream.getTracks().forEach(track => track.stop());
                 }, 60000);
             } catch (err) {
                 errorMsg.innerText = 'Could not start recording. Please allow camera and mic access.';
                 console.error("Recording error:", err);
                 loadingIndicator.style.display = 'none';
             }
         };

         videoInput.onchange = () => {
             errorMsg.innerText = '';
             if (videoInput.files.length > 0) {
                 const file = videoInput.files[0];
                 const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

                 if (!validTypes.includes(file.type)) {
                     errorMsg.innerText = 'Invalid file type. Please upload MP4, WebM or OGG.';
                     videoInput.value = '';
                     return;
                 }

                 videoPreview.srcObject = null;
                 videoPreview.src = URL.createObjectURL(file);
                 videoPreview.load();
                 videoPreview.play();
             }
         };

         removeBtn.onclick = () => {
             videoInput.value = '';
             errorMsg.innerText = '';
             if (stream) {
                 stream.getTracks().forEach(track => track.stop());
             }
             videoPreview.srcObject = null;
             videoPreview.src = defaultSrc;
             videoPreview.load();
             videoPreview.play();
         };
     });
 </script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

 <script>
     $(document).ready(function() {

         $('#edu_Teaching').select2({
             placeholder: "Select an educational teaching",
             allowClear: false,
             tags: true,
             dropdownCssClass: 'edu_teaching-custom-select2-templates-lang',
             selectionCssClass: 'edu_teaching-custom-select2-templates-lang',
         });
     });

     function toggleArrow(selectElement) {
         let arrowId = selectElement.id.replace("language_proficient_", "arrow-");
         let arrowIcon = document.getElementById(arrowId);

         if (arrowIcon) {
             arrowIcon.classList.toggle("rotate-180"); // Example: Toggle class
         }
     }
     document.getElementById("selected_language_level").addEventListener("click", function() {
         let modal = new bootstrap.Modal(document.getElementById("languageLevelModal"));
         modal.show();
     });
     document.addEventListener('shown.bs.modal', function() {
         document.body.style.overflow = 'auto';
     });

     document.addEventListener('hidden.bs.modal', function() {
         document.body.style.overflow = '';
     });

     function handleLanguageChange(selectElement) {
         toggleArrow(selectElement); // Call first function
         showModal(selectElement); // Call second function
     }
     document.addEventListener("DOMContentLoaded", function() {
         let languageSelect = document.getElementById("language_proficient_1");

         if (languageSelect) {
             languageSelect.addEventListener("change", function() {
                 toggleArrow(this);
                 showModal(this);
             });
         }
     });

     function showModal(selectElement) {
         let selectedLanguage = selectElement.value;
         let modalElement = document.getElementById("languageLevelModal");

         if (selectedLanguage && modalElement) {
             console.log("Opening modal for:", selectedLanguage); // Debugging
             let modal = new bootstrap.Modal(document.getElementById("languageLevelModal"));
             modal.show();
         };

     }
     document.getElementById("saveLanguageLevel").addEventListener("click", function() {
         let selectedLevel = document.getElementById("modal_language_level").value;
         let inputField = document.getElementById("selected_language_level");

         if (selectedLevel) {
             inputField.value = selectedLevel; // Set the selected level in the input field
         }

         // Close the modal
         let modal = bootstrap.Modal.getInstance(document.getElementById("languageLevelModal"));
         modal.hide();
     });
 </script>
 <script>
    function resendOTP() {
    const resendMessage = document.getElementById('resendMessage');
    const resendLink = document.getElementById('resendLink');

    // Show sending message
    resendMessage.style.display = 'inline';
    // Disable the link temporarily
    resendLink.style.pointerEvents = 'none';
    resendLink.style.opacity = '0.6';

    fetch('/resend-verification-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        resendMessage.style.display = 'none';

        if (data.success) {
            alert(data.success);
        } else {
            alert(data.error || 'Failed to resend email.');
        }

        // Re-enable after 5 seconds
        setTimeout(() => {
            resendLink.style.pointerEvents = 'auto';
            resendLink.style.opacity = '1';
        }, 5000);
    })
    .catch(error => {
        console.error('Error:', error);
        resendMessage.style.display = 'none';
        alert('An error occurred while resending the email.');

        resendLink.style.pointerEvents = 'auto';
        resendLink.style.opacity = '1';
    });
}

 </script>

 <script>
     function verifyOTP() {
         let otp = document.getElementById('otpInput').value;
         let email = "{{ session('verifiedEmail') }}";
         let csrfToken = "{{ csrf_token() }}";

         // Disable button to prevent multiple clicks
         let verifyButton = document.querySelector("button[onclick='verifyOTP()']");
         verifyButton.innerHTML = "⏳ Verifying...";
         verifyButton.disabled = true;

         fetch("{{ route('verify-otp') }}", {
                 method: "POST",
                 headers: {
                     "Content-Type": "application/json",
                     "X-CSRF-TOKEN": csrfToken
                 },
                 body: JSON.stringify({
                     otp,
                     email
                 })
             })
             .then(response => response.json())
             .then(data => {
                 if (data.success) {
                     $('#otpModal').modal('hide');
                     $('#otpModal').addClass('d-none');

                     // Redirect on success
                 } else {
                     document.getElementById('otpError').style.display = 'block'; // Show error message
                     verifyButton.innerHTML = "✔ Verify OTP"; // Reset button
                     verifyButton.disabled = false;
                 }
             })
             .catch(error => {
                 console.error("Error:", error);
                 verifyButton.innerHTML = "✔ Verify OTP"; // Reset button
                 verifyButton.disabled = false;
             });
     }

    
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const currencySelect = document.getElementById('currency');
         const priceInput = document.getElementById('price');
         const currencyPriceInput = document.getElementById('currency_price');

         function updateHiddenField() {
             currencyPriceInput.value = currencySelect.value + ' ' + priceInput.value;
         }

         currencySelect.addEventListener('change', updateHiddenField);
         priceInput.addEventListener('input', updateHiddenField);
     });
 </script>
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         let uploadArea = document.getElementById("uploadAreaVideo");
         let fileInput = document.getElementById("videoFile");
         let uploadedVideoPreview = document.getElementById("demoVideoPreview");
         let removeVideoButton = document.getElementById("removeVideoButton");
         let loadingVideoIndicator = document.getElementById("loadingVideoIndicator");
         let errorVideoMessage = document.getElementById("errorVideoMessage");
         let nextButton = document.getElementById("next-btn");
         let liveVideoButton = document.createElement("button");
         let live = document.getElementById("live");
         // Create Live Video Button
         liveVideoButton.textContent = "Record Live Video";
         liveVideoButton.classList.add("btn", "btn-outline-secondary", "w-100", "mt-3");
         live.appendChild(liveVideoButton);

         document.getElementById("uploadAreaVideo").addEventListener("click", function() {
             document.getElementById("videoFile").click();
         });

         fileInput.addEventListener("change", (e) => {
             handleFile(e.target.files[0]);
         });

         removeVideoButton.addEventListener("click", () => {
             resetUpload();
         });

         function handleFile(file) {
             errorVideoMessage.style.display = "none";

             if (!file.type.startsWith("video/")) {
                 showError("Please upload a video file");
                 return;
             }

             if (file.size > 50 * 1024 * 1024) {
                 showError("Video must be less than 50MB");
                 return;
             }

             loadingVideoIndicator.style.display = "block";
             const videoURL = URL.createObjectURL(file);
             uploadedVideoPreview.src = videoURL;

             uploadedVideoPreview.onloadeddata = () => {
                 loadingVideoIndicator.style.display = "none";
                 nextButton.setAttribute("type", "submit");
             };
         }

         function showError(message) {
             errorVideoMessage.textContent = message;
             errorVideoMessage.style.display = "block";
         }

         function resetUpload() {
             uploadedVideoPreview.src = "https://www.w3schools.com/html/mov_bbb.mp4";
             uploadedVideoPreview.load();
             fileInput.value = "";
             nextButton.setAttribute("type", "button");
         }

         // Live Video Recording Feature
         liveVideoButton.addEventListener("click", async () => {
             try {
                 const stream = await navigator.mediaDevices.getUserMedia({
                     video: true,
                     audio: true
                 });
                 const mediaRecorder = new MediaRecorder(stream);
                 let chunks = [];

                 mediaRecorder.ondataavailable = (event) => {
                     if (event.data.size > 0) {
                         chunks.push(event.data);
                     }
                 };

                 mediaRecorder.onstop = () => {
                     const blob = new Blob(chunks, {
                         type: "video/mp4"
                     });
                     const videoURL = URL.createObjectURL(blob);
                     uploadedVideoPreview.src = videoURL;
                     nextButton.setAttribute("type", "submit");
                 };

                 mediaRecorder.start();

                 setTimeout(() => {
                     mediaRecorder.stop();
                     stream.getTracks().forEach(track => track.stop());
                 }, 5000); // Record for 5 seconds
             } catch (error) {
                 showError("Could not access camera. Please allow permissions.");
             }
         });
     });
 </script>
 <script>
     document.getElementById("uploadArea").addEventListener("click", function() {
         document.getElementById("profilePicture").click();
     });

     document.getElementById("profilePicture").addEventListener("change", function(event) {
         const file = event.target.files[0];
         if (file) {
             const reader = new FileReader();
             reader.onload = function(e) {
                 document.getElementById("previewImg").src = e.target.result;
                 document.getElementById("previewContainer").classList.remove("d-none");
             };
             reader.readAsDataURL(file);
         }
     });

     document.getElementById("removeBtn").addEventListener("click", function() {
         document.getElementById("profilePicture").value = "";
         document.getElementById("previewImg").src = "";
         document.getElementById("previewContainer").classList.add("d-none");
     });
 </script>
 <script>
     let currentStep = 1;
     let errorMessage = '';

     function validateAndNextStep(button) {
         if (validateForm()) {
             console.log(`currentStep: page-${currentStep}`);
             NextStep(currentStep)
         }
     }

     const step1RequiredFields = ['f_name', 'l_name', 'password', 'c_password'];
     const step2RequiredFields = ['qualificationDocument', 'experienceInTeaching'];

     function validateForm() {
         let isValid = true;

         if (stepCounter == 1) {
             for (const field of step1RequiredFields) {
                 const element = document.getElementById(field);
                 const errorDiv = element.nextElementSibling;

                 if (!element.value.trim()) {
                     isValid = false;
                     element.style.border = '2px solid #e74c3c';
                     errorDiv.textContent = "Please fill this field"

                 } else {
                     element.style.border = '';
                     errorDiv.textContent = '';
                 }

                 element.addEventListener('input', function() {
                     if (element.value.trim()) {
                         element.style.border = '1px solid rgb(137, 135, 135)';
                         errorDiv.textContent = "";
                     } else {
                         element.style.border = '2px solid #e74c3c';
                         errorDiv.textContent = "Please fill this field";
                     }
                 });
             }
             const date = document.getElementById("dob");
             if (!date.value) {
                 isValid = false;
                 Swal.fire({
                     toast: true,
                     icon: 'error',
                     title: 'Date must be added',
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000,
                     timerProgressBar: true,
                     didOpen: (toast) => {
                         const title = toast.querySelector('.swal2-title');
                         if (title) {
                             title.style.fontSize = '14px';
                             title.style.fontWeight = 'normal';
                         }
                     }
                 });
             }

             const profilePictureInput = document.getElementById("profilePicture");
             if (!profilePictureInput.files.length) {
                 isValid = false;
                 Swal.fire({
                     toast: true,
                     icon: 'error',
                     title: 'Profile Image must be uploaded',
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000,
                     timerProgressBar: true,
                     didOpen: (toast) => {
                         const title = toast.querySelector('.swal2-title');
                         if (title) {
                             title.style.fontSize = '14px';
                             title.style.fontWeight = 'normal';
                         }
                     }
                 });
             }

             const passwordElement = document.getElementById('password');
             const confirmPasswordElement = document.getElementById('c_password');

             if (passwordElement && confirmPasswordElement) {
                 console.log('Password length: ', passwordElement.value.length);
                 console.log('confirmPasswordElement length: ', confirmPasswordElement.value.length);
                 if (passwordElement.value.length < 8) {
                     isValid = false;
                     Swal.fire({
                         toast: true,
                         icon: 'error',
                         title: 'Password must be at least 8 characters',
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             const title = toast.querySelector('.swal2-title');
                             if (title) {
                                 title.style.fontSize = '14px';
                                 title.style.fontWeight = 'normal';
                             }
                         }
                     });
                 }

                 if (confirmPasswordElement.value.length < 8) {
                     isValid = false;
                     Swal.fire({
                         toast: true,
                         icon: 'error',
                         title: 'Confirm Password must be at least 8 characters',
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             const title = toast.querySelector('.swal2-title');
                             if (title) {
                                 title.style.fontSize = '14px';
                                 title.style.fontWeight = 'normal';
                             }
                         }
                     });
                 }

                 if (passwordElement.value !== confirmPasswordElement.value) {
                     console.log("passwordValue.value: ", passwordElement.value);
                     console.log("confirmPasswordValue.value: ", confirmPasswordElement.value);
                     isValid = false;
                     Swal.fire({
                         toast: true,
                         icon: 'error',
                         title: 'Passwords and Confirm Password must match',
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                             const title = toast.querySelector('.swal2-title');
                             if (title) {
                                 title.style.fontSize = '14px';
                                 title.style.fontWeight = 'normal';
                             }
                         }
                     });
                 }
             } else {
                 console.error("Password or confirm password element not found.");
                 isValid = false;
             }
         }

         if (stepCounter == 2) {
             for (const field of step2RequiredFields) {
                 const element = document.getElementById(field);
                 const errorDiv = element.nextElementSibling;

                 if (!element.value.trim()) {
                     isValid = false;
                     element.style.border = '2px solid #e74c3c';
                     errorDiv.textContent = "Please fill this field"
                 } else {
                     element.style.border = '';
                     errorDiv.textContent = '';
                 };

                 element.addEventListener('input', function() {
                     if (element.value.trim()) {
                         element.style.border = '1px solid rgb(137, 135, 135)';
                         errorDiv.textContent = "";
                     } else {
                         element.style.border = '2px solid #e74c3c';
                         errorDiv.textContent = "Please fill this field";
                     }
                 })
             }
             const allowedExtensions = ['pdf', 'xlsx', 'docx'];

             const fileInput = document.getElementById('qualificationDocument'); // Replace with your input field ID
             const fileName = fileInput.value;

             // Extract the file extension
             const fileExtension = fileName.split('.').pop().toLowerCase();
             const doc = document.querySelector('.doc');
             if (!allowedExtensions.includes(fileExtension)) {
                 isValid = false;
                 fileInput.style.border = '2px solid #e74c3c';
                 doc.textContent = "Please fill & add only PDF, XLSX, and DOCX files";
             } else {
                 fileInput.style.border = '';
                 doc.textContent = '';
             }

             const language_proficient_1 = document.getElementById("language_proficient_1");
             if (!language_proficient_1.value || language_proficient_1.value === "") {
                 isValid = false;
                 Swal.fire({
                     toast: true,
                     icon: 'error',
                     title: 'Must fill language proficient & its level',
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000,
                     timerProgressBar: true,
                     didOpen: (toast) => {
                         const title = toast.querySelector('.swal2-title');
                         if (title) {
                             title.style.fontSize = '14px';
                             title.style.fontWeight = 'normal';
                         }
                     }
                 });
             }

             // Qualification validation
             const qualification = document.getElementById("qualification");
             if (!qualification.value) {
                 isValid = false;
                 errorMessage += "Must select a qualification.<br>";
             }


             // Country validation
             const country = document.getElementById("country");
             if (!country.value) {
                 isValid = false;
                 errorMessage += "Must select a country.<br>";
             }

             // Year validation
             const yearSelect = document.getElementById("yearSelect");
             if (!yearSelect.value) {
                 isValid = false;
                 errorMessage += "Must select a year.<br>";
             }

             // Specialization validation
             const specialization = document.getElementById("specialization");
             if (!specialization.value) {
                 isValid = false;
                 errorMessage += "Must select at least one specialization.<br>";
             }

             // Institution validation
             const institution = document.getElementById("institution");
             if (!institution.value) {
                 isValid = false;
                 errorMessage += "Must select an institution/university.<br>";
             }

             // Courses Teaching validation
             const courses = document.getElementById("other_qualification_input");
             if (!courses.value) {
                 isValid = false;
                 errorMessage += "Must select at least one course.<br>";
             }

             // Teaching Subjects validation
             const teachingSubjects = document.getElementById("teachingSubjects");
             if (!teachingSubjects.value) {
                 isValid = false;
                 errorMessage += "Must select at least one subject to teach.<br>";
             }

             // Language Teaching validation
             const language = document.getElementById("language");
             if (!language.value) {
                 isValid = false;
                 errorMessage += "Must select a language.<br>";
             }

             // Show Swal alert if form is invalid
             if (!isValid) {
                 Swal.fire({
                     icon: "error",
                     title: "Form Incomplete!",
                     html: errorMessage, // Supports HTML formatting
                     position: "top-end",
                     toast: true,
                     showConfirmButton: false,
                     timer: 4000,
                     timerProgressBar: true,
                 });
             }


         }

         return isValid;
     }
 </script>
 <script>
     let languageFieldCount = 1;

     function addLanguageField() {
         languageFieldCount++;

         const newRow = document.createElement('div');
         newRow.classList.add('form-row', 'd-flex', 'flex-column', 'flex-md-row', 'mb-4');
         newRow.setAttribute('id', `language-row-${languageFieldCount}`);
         newRow.innerHTML = `
        <div class="col-md-6 px-2">
            <div class="position-relative">
                <select name="language_proficient[]" class="form-control rounded-md pr-5 language-select"
                    id="language_proficient_${languageFieldCount}">
                    <option value="" disabled selected>Select Language</option>
                    @foreach ($languages as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </select>
                <i class="fas fa-chevron-down position-absolute"
                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
            </div>
        </div>

        <div class="col-md-5 px-2">
            <div class="position-relative">
                <input type="text" name="language_level[]" id="selected_language_level_${languageFieldCount}" 
                       class="form-control rounded-md pr-5 bg-white language-level-input" 
                       placeholder="Select Level" readonly>
                <button type="button" class="position-absolute border-0 bg-transparent open-modal-btn"
                        style="right: 10px; top: 50%; transform: translateY(-50%);" 
                        data-bs-toggle="modal" data-bs-target="#languageLevelModal">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <div class="col-md-1 px-2 mb-2 flex items-center" id="delete-btn-container-${languageFieldCount}">
            <button type="button" class="border-0 bg-transparent remove-language-btn text-danger px-3 py-2 rounded-circle" 
                    onclick="removeLanguageField(${languageFieldCount})" style="color:#42b979;">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;

         document.getElementById('languages-container').appendChild(newRow);

         attachLanguageSelectListener();
     }

     // Function to handle language selection and trigger the modal
     function attachLanguageSelectListener() {
         document.querySelectorAll('.language-select').forEach(select => {
             select.addEventListener('change', function() {
                 const languageRow = this.closest('.form-row');
                 const levelInput = languageRow.querySelector('.language-level-input');

                 // Open the modal after selecting a language
                 const modal = new bootstrap.Modal(document.getElementById('languageLevelModal'));
                 modal.show();

                 // Store the selected input field to update later
                 document.getElementById('saveLanguageLevel').dataset.targetInput = levelInput.id;
             });
         });
     }

     // Function to save the selected language level into the correct input field
     document.getElementById('saveLanguageLevel').addEventListener('click', function() {
         const selectedLevel = document.getElementById('modal_language_level').value;
         if (selectedLevel) {
             const targetInputId = this.dataset.targetInput;
             document.getElementById(targetInputId).value = selectedLevel;

             // Close the modal after selection
             const modal = bootstrap.Modal.getInstance(document.getElementById('languageLevelModal'));
             modal.hide();
         }
     });

     // Function to remove language field
     function removeLanguageField(id) {
         const fieldToRemove = document.getElementById(`language-row-${id}`);
         if (fieldToRemove) fieldToRemove.remove();
     }

     // Attach event listeners on page load
     document.addEventListener("DOMContentLoaded", attachLanguageSelectListener);
 </script>
 <script>
     function togglePassword(inputId, button) {
         const input = document.getElementById(inputId);
         const eyeIcon = document.getElementById("eye-icon");

         if (input.type === "password") {
             input.type = "text";
             eyeIcon.src = "/images/opened_eye.png"; // Change to open-eye image
         } else {
             input.type = "password";
             eyeIcon.src = "/images/close_eye.png"; // Change back to closed-eye image
         }
     }

     function togglePassword2(inputId, button) {
         const input = document.getElementById(inputId);
         const eyeIconId = inputId === "c_password" ? "c-eye-icon" : "eye-icon"; // Determine which eye icon to target
         const eyeIcon = document.getElementById(eyeIconId);

         if (input.type === "password") {
             input.type = "text";
             eyeIcon.src = "/images/opened_eye.png"; // Change to open-eye image
         } else {
             input.type = "password";
             eyeIcon.src = "/images/close_eye.png"; // Change back to closed-eye image
         }
     }

     function toggleEye2(input, state) {
         const eyeIconId = input.id === "c_password" ? "c-eye-icon" : "eye-icon"; // Determine which eye icon to target
         const eyeIcon = document.getElementById(eyeIconId);

         if (state === "open") {
             eyeIcon.src = "/images/open_eye.png"; // Change to open-eye image on focus
         } else {
             eyeIcon.src = "/images/closed_eye.png"; // Change back to closed-eye image on blur
         }
     }

     function toggleEye(input, state) {
         const eyeIcon = document.getElementById("eye-icon");

         if (state === "open") {
             eyeIcon.src = "/images/open_eye.png"; // Change to open-eye image on focus
         } else {
             eyeIcon.src = "/images/closed_eye.png"; // Change back to closed-eye image on blur
         }
     }
 </script>
 <script>
     function updateDob() {
         var year = document.getElementById('year').value;
         var month = document.getElementById('month').value;
         var day = document.getElementById('day').value;

         // Concatenate into YYYY-MM-DD format
         var dob = year + '-' + month + '-' + day;

         // Set the value of the hidden input
         document.getElementById('dob').value = dob;
     }


     $(document).ready(function() {
         var storedEmail = localStorage.getItem('email');
         if (storedEmail) {
             // Set the email input value to the stored email
             $('#email').val(storedEmail);
         }


         // $('#location').select2();
         // $('#city').select2();
         // $('#school_class').select2();
         $('#language_proficient_1').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'profiecient-custom-select2-templates-lang',
             selectionCssClass: 'profiecient-custom-select2-templates-lang',
         });
         $('#city').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'city-custom-select2-templates-lang',
             selectionCssClass: 'city-custom-select2-templates-lang',
         });
         $('#teachingSubjects').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'city-custom-select2-templates-lang',
             selectionCssClass: 'city-custom-select2-templates-lang',
         });
         $('#location').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'location-custom-select2-templates-lang',
             selectionCssClass: 'location-custom-select2-templates-lang',
         });

         $('#school_class').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'school_class-custom-select2-templates-lang',
             selectionCssClass: 'school_class-custom-select2-templates-lang',
         });

         $('#qualification').select2({
             placeholder: 'Search qualification',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'qualification-custom-select2-templates-lang',
             selectionCssClass: 'qualification-custom-select2-templates-lang',
         });

         $('#teaching').select2({
             multiple: true
         });

         $('#location').on('change', function() {


             var countryCode = $(this).val();
             var $citySelect = $('#city');

             if (countryCode) {
                 $.ajax({
                     url:"{{ route('cities') }}",
                     type: 'GET',
                     data: {
                         country: countryCode
                     },
                     success: function(data) {
                         $citySelect.empty();
                         $citySelect.append('<option value="">Select City</option>');
                         $.each(data, function(index, city) {
                             $citySelect.append('<option value="' + city + '">' + city + '</option>');
                         });
                     },
                     error: function() {
                         $citySelect.empty();
                         $citySelect.append('<option value="">No cities available</option>');
                     }
                 });
             } else {
                 $citySelect.empty();
                 $citySelect.append('<option value="">Select City</option>');
             }
         });
     });

     $(document).ready(function() {
         var email = $('#email').val(); // Get the value of the email input field

         if (email) {
             $.ajax({
                 url: '/check-email', // Your Laravel route
                 method: 'POST',
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token here
                 },
                 data: {
                     email: email
                 },
                 success: function(response) {
                     if (!response.error) {
                         // Remove any existing error message and show success message (if needed)
                         $('#email').siblings('.error-message').remove();
                     }
                 },
                 error: function(xhr) {
                     if (xhr.responseJSON && xhr.responseJSON.error) {
                         // Remove any existing error message
                         $('#email').siblings('.error-message').remove();

                         // Append the error message below the input field
                         $('#email').after(
                             '<small class="error-message text-danger" style="display: block; margin-top: 5px;text-align:left">' +
                             xhr.responseJSON.message +
                             '</small>'
                         );
                     }
                 }
             });
         }
     });



     $(document).ready(function() {
         $('#country').select2({
             placeholder: 'Search country',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'country-custom-select2-templates-lang',
             selectionCssClass: 'country-custom-select2-templates-lang',
         });

         $('#yearSelect').select2({
             placeholder: 'Search year',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'year-custom-select2-templates-lang',
             selectionCssClass: 'year-custom-select2-templates-lang',
         });

         $('#gender').select2({
             placeholder: "Select or type your gender",
             allowClear: false,
             tags: true,
             dropdownCssClass: 'gender-custom-select2-templates-lang',
             selectionCssClass: 'gender-custom-select2-templates-lang',
         });

         $('#specialization').select2({
             placeholder: "Select a specialization",
             allowClear: false,
             tags: true,
             dropdownCssClass: 'specialization-custom-select2-templates-lang',
             selectionCssClass: 'specialization-custom-select2-templates-lang',

         });

         $('#other_qualification_input').select2({
             placeholder: "Type or select a language",
             allowClear: false,
             tags: true,
             dropdownCssClass: 'other_qualification_input-custom-select2-templates-lang',
             selectionCssClass: 'other_qualification_input-custom-select2-templates-lang',
         });

         $('#institution').select2({
             placeholder: "Select an institution/university",
             tags: true,
             dropdownCssClass: 'institution-custom-select2-templates-lang',
             selectionCssClass: 'institution-custom-select2-templates-lang',

         });

         $('#language_proficient').select2({
             placeholder: 'Select a language',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'language_proficient-custom-select2-templates-lang',
             selectionCssClass: 'language_proficient-custom-select2-templates-lang',
         });
         $('#language').select2({
             placeholder: 'Select a language',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'language-custom-select2-templates-lang',
             selectionCssClass: 'language-custom-select2-templates-lang',
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         setTimeout(function() {
             $(".alert").fadeOut("slow");
         }, 5000);
         $('#datepicker').datepicker({
             format: 'yyyy-dd-mm',
             todayHighlight: true,
             autoclose: true,
             endDate: "0d"
         });
     });
     $(document).ready(function() {
         // Initialize Select2

         $('#countrySelect').select2({
             placeholder: 'Select a language',
             allowClear: false,
             tags: true,
             dropdownCssClass: 'countrySelect-custom-select2-templates-lang',
             selectionCssClass: 'countrySelect-custom-select2-templates-lang',
         });

         const defaultCountry = 'AE';
         const countriesPrefix = @json($countries_prefix);
         const countriesNumberLength = @json($countries_number_length);
         let countryValue = defaultCountry;

         const country = $('#countrySelect');
         const userNumber = $('#phone');

         function setCountryPrefix() {
             const prefix = countriesPrefix[countryValue];
             userNumber.val(prefix);
             userNumber.attr('data-prefix', prefix); // Store the prefix in a data attribute
         }

         // Prevent users from clearing the prefix
         userNumber.on('keydown', function(event) {
             const prefix = userNumber.attr('data-prefix');
             const cursorPosition = this.selectionStart;

             // Prevent deletion or backspace within the prefix
             if (cursorPosition <= prefix.length && (event.key === 'Backspace' || event.key === 'Delete')) {
                 event.preventDefault();
             }

             // Prevent typing within the prefix
             if (cursorPosition < prefix.length && !['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'].includes(event.key)) {
                 event.preventDefault();
             }
         });

         // Adjust input length based on the selected country
         userNumber.on('input', function() {
             const prefix = userNumber.attr('data-prefix');
             const maxLength = countriesNumberLength[countryValue];
             if (userNumber.val().length > maxLength) {
                 userNumber.val(userNumber.val().slice(0, maxLength));
             }
         });

         // Change the prefix when the country selection changes
         country.on('change', function() {
             countryValue = country.val();
             setCountryPrefix();
         });

         // Set default country and prefix on page load
         country.val(defaultCountry).trigger('change');
         setCountryPrefix();
     });

     function cancel() {
         var close = document.getElementById("close");
         close.style.display = "none";
     }
     // date of birth\
     var Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // index => month [0-11]
     $(document).ready(function() {
         var option = '<option value="day">day</option>';
         var selectedDay = "day";
         for (var i = 1; i <= Days[0]; i++) { //add option days
             option += '<option value="' + i + '">' + i + '</option>';
         }
         $('#day').append(option);
         $('#day').val(selectedDay);

         var option = '<option value="month">month</option>';
         var selectedMon = "month";
         for (var i = 1; i <= 12; i++) {
             option += '<option value="' + i + '">' + i + '</option>';
         }
         $('#month').append(option);
         $('#month').val(selectedMon);

         var option = '<option value="month">month</option>';
         var selectedMon = "month";
         for (var i = 1; i <= 12; i++) {
             option += '<option value="' + i + '">' + i + '</option>';
         }
         $('#month2').append(option);
         $('#month2').val(selectedMon);

         var d = new Date();
         var option = '<option value="year">year</option>';
         selectedYear = "year";
         for (var i = 1970; i <= (d.getFullYear() + 10); i++) { // years start i
             option += '<option value="' + i + '">' + i + '</option>';
         }
         $('#year').append(option);
         $('#year').val(selectedYear);
     });

     function isLeapYear(year) {
         year = parseInt(year);
         if (year % 4 != 0) {
             return false;
         } else if (year % 400 == 0) {
             return true;
         } else if (year % 100 == 0) {
             return false;
         } else {
             return true;
         }
     }

     function change_year(select) {
         if (isLeapYear($(select).val())) {
             Days[1] = 29;

         } else {
             Days[1] = 28;
         }
         if ($("#month").val() == 2) {
             var day = $('#day');
             var val = $(day).val();
             $(day).empty();
             var option = '<option value="day">day</option>';
             for (var i = 1; i <= Days[1]; i++) { //add option days
                 option += '<option value="' + i + '">' + i + '</option>';
             }
             $(day).append(option);
             if (val > Days[month]) {
                 val = 1;
             }
             $(day).val(val);
         }
     }
 </script>
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 @endsection