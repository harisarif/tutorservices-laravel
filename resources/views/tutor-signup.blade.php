@extends('layouts.app')
<!-- aos animation link -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
<meta name="description"
    content="Tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #42B979 !important;
        color: #fff;
        margin-top: 0px !important;
    }

    .main-footer {
        display: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }

    #allModal {
        display: none !important;
    }

    .select2-container--default .select2-selection--multiple {
        padding: 5px;
    }

    /* .select2-container {
            width: 260px !important;
        } */
    .iti__selected-flag {
        top: 6px;
        height: 33px !important;
        border-radius: 4px;
        transition: .3s;
    }

    .intl-tel-input .flag-dropdown .selected-flag {
        padding: 11px 16px 11px 6px;
    }

    .intl-tel-input {
        z-index: 99;
        width: 100%;
    }

    .iti-flag {
        box-shadow: none;
    }

    .intl-tel-input .selected-flag:focus {
        outline: none !important;
    }

    .iti--allow-dropdown .iti__flag-container:hover .iti__selected-flag {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .iti--allow-dropdown input {
        padding-right: 6px;
        padding-left: 52px;
        margin-left: 0;
    }

    .iti__country-list {
        border-radius: 4px !important;
        z-index: 999 !important;
        box-shadow: 0 0 16px 0 rgb(0 0 0 / 8%) !important;
        border: 1px solid #ececec !important;
        width: 270px !important;
    }

    .input-group-append {
        cursor: pointer;
    }

    .form-row {
        .select2-container {
            width: 100% !important;
        }
    }

    /* .select2-container{
            } */

    .input-group {
        #countrySelect {
            width: 21% !important;
        }

        .select2-container {
            width: 330px !important;
        }
    }

    .selection {
        .select2-selection {
            height: 38px !important;
        }
    }

    @media(min-width: 322px) and (max-width: 766px) {
        .select2-container {
            .select2-dropdown {
                width: 330px !important;

            }
        }
    }

    @media (max-width: 425px) {
        .select2-container {
            .select2-dropdown {
                width: 283px !important;

            }
        }

        form {
            width: 100%;
        }

        .input-group {
            width: 100%;
        }
    }

    @media(min-width: 767px) and (max-width: 1441px) {
        .select2-container {
            .select2-dropdown {
                width: 269px !important;
            }
        }

        @media(max-width:426px) {
            .select2-container--open .select2-dropdown {
                left: 0;
                top: -44px !important;
            }
        }
    }

    .date-picker-input {
        width: 100%;
        padding: 6px 12px;
        border-radius: 6px;
        outline: none;
        border: 1px solid #dee2e6;

    }

    .date-picker-label {
        margin-bottom: 7px !important;
    }

    .alert-danger {
        position: fixed;
        width: 28%;
        right: 0;
        width: 27%;
        padding: 0 16px;
        margin: 10px;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        font-size: 16px;
    }

    .row {
        --bs-gutter-x: 0rem !important;
        justify-content: space-between;
    }

    .form-label {
        display: flex;
        text-align: justify;
        align-items: center;
    }

    .date-picker-label {
        display: flex;
        text-align: justify;
        align-items: center;
    }

    main {
        /*background: url(./images/bg_image_1.png), #f1f1f1a0;*/
        background-blend-mode: screen;
    }

    .step-form-heading h2 {
        color: #42b979;
    }

    SELECT {
        padding: 5px;
        border: none;
    }

    .ad-dob {
        /*border: 1px solid #ddd;*/
        padding: 3px 0;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
    }

    .footer-bottom {
        padding: 5px 0;
    }

    .pg-1-heading h3 {
        color: #42b979;
    }

    .select2 {
        width: 100% !important;
    }

    @keyframes fadeInOut {

        0%,
        100% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }
    }

    .fade-animation {
        animation: fadeInOut 3s infinite;
    }

    .email-field {
        pointer-events: none;
        cursor: not-allowed;
    }

    /* Change the color of the scrollbar to green */
    ::-webkit-scrollbar {
        width: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #42B979 !important;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }

    input.form-control::placeholder,
    textarea.form-control::placeholder {
        color: rgb(180, 173, 173);
    }

    input[type="password"]::placeholder {
        color: rgb(180, 173, 173);
    }

    .form-control:focus {
        border-color: #42b979 !important;
        border-width: 2px !important;
        outline: none !important;
        box-shadow: none !important; 
    }

    .inp-1:focus {
        border-color: #42b979 !important;
        border-width: 2px !important;
        box-shadow: none !important; 
        outline: none !important;
    }

    #countrySelect{
        padding-right: 0px !important;
    }

    .ad-dob select {
   /* border: 1px solid #888;*/
    padding: 5px;
    width: 30%; /* Adjust width for uniform dropdowns */
   /* border-radius: 4px;  Optional for rounded corners */
    font-size: 14px;
}
.date-picker-label {
    font-size: 16px;
    margin-bottom: 5px;
    display: block;
}

.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s, transform 0.3s;
    font-family: Arial, sans-serif;
    font-size: 14px;
  }
  
  .toast.show {
    opacity: 1;
    transform: translateY(0);
  }

  .toast.success {
    background-color: #42B979; /* Green background */
    color: white; /* White text */
  }

  .toast.info {
    background-color: #17a2b8; /* Blue background for info */
    color: white;
  }

</style>
@include('whatsapp')
<button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;"
    onclick="window.scrollTo(0, 0)"><i class="fa-solid fa-chevron-up"></i></button>
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

<header class="main_header d-flex bg-white  py-2 align-items-end justify-content-center">
    <a class="arrow" href="https://edexceledu.com">
        <img style="height: 50px" src="/images/logo.png" alt="EDEXCEL-logo" height="50px">
    </a>
</header>

<banner style="display: flex; flex-direction: row; justify-content: center; align-items: flex-start; 
     background-color: #93bfa8; width: 100%; height: 350px; gap: 10px;">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start; gap: 5px;">
        <div style="display: flex; flex-direction: column; align-items: center; gap: 2px;">
            <h1 class="main-heading" style="font-size: 2rem; font-weight: bold; color: #333; margin: 0;">
                Join The Community of Tutors
            </h1>
            <p class="subheading" style="font-size: 1rem; color: white; margin: 0;">
                You Have Three Steps To Start Your Journey
            </p>
        </div>
    </div>
    <div style="flex-shrink: 0;height: 450px; border: 1px solid black;">
<!--Remove height when place image-->
    </div>
</banner>


<div class="main-page col-12 bg-white col-md-10 mx-auto p-0 text-center" style="padding: 0px 10px 0px 10px;" 
><!--md-8-->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-4">
            <form id="tutorForm" class=" pages" method="POST" action="{{ route('tutor-create') }}" style="padding-bottom: 20px; padding-top: 20px;border: 1px solid #ccc;border-radius: 10px; margin-top: 10px; margin-bottom: 10px; "
                enctype="multipart/form-data">
                <div
                    class="step-form-heading col py-2  text-center flex-column rounded-top ">
                    <h2 class="text-center my-2">Tutors Sign-Up Page</h2> 
                </div>
                <div class="col-12 d-flex justify-content-center " style="padding-bottom: 20px;">
                    <b class="theme_text_green px-2 persentage-num">Step 1/3</b>
                    <div class="loading bg-body-secondary my-2">
                        <div class="percentage bg_theme_green"></div>
                    </div>
                </div>

                @csrf
                <div>
                    <div id="page-1" class="mx-3">
                        <!--<div class="pg-1-heading">
                            <h3 class="fs-5 fw-bold py-3">You Have Three Steps To Join Your Journey</h3>
                        </div>-->
                        <div class="ad-heading"style="padding-bottom: 20px;">
                            <h3 class="fade-animation"
                                style="text-align: center; color: red; padding: 5px; font-size: 15px;">
                                <b><i>Please Fill All Mandatory Fields</i></b>
                            </h3>
                        </div>
                        <div class="form-group d-none">

                            <input type="search" value="English" name="subject" class="form-control" id="page1-search"
                                placeholder="Search" style="height:50px; border: 1px solid #ccc;">
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="f_name" class="form-label" style="color:#42b979;"><strong>First Name <span
                                            class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="text" class="form-control" id="f_name" name="f_name" placeholder="John"
                                    style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="l_name" class="form-label" style="color:#42b979;"><strong>Last Name <span
                                            class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Doe"
                                    style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="email" class="form-label" style="color:#42b979;">
                                    <strong>Email
                                        <span class="text-danger fs-4"
                                            style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <input type="email" class="form-control email-field" id="email" name="email"
                                    style="box-shadow: none; background-color: white;border: 1px solid rgba(137, 135, 135, 0.5);"
                                    readonly>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="intro" class="form-label" style="color:#42b979;"><strong>Intro <span
                                            class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <textarea type="text" class="form-control" rows="1" id="intro"
                                    placeholder="Short Intro..." name="intro"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);"></textarea>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="password" class="form-label" style="color:#42b979;">
                                    <strong>Password <b style="color: red; font-size: 20px; vertical-align: middle;">*</b></strong>
                                </label>
                                <div style="position: relative;">
                                    <input
                                        required
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="Password"
                                        class="form-control inp-1"
                                        style="width: 100%; flex-direction: column; border-radius: 5px; padding: 5px 8px; margin: 7px 0px;border: 1px solid rgba(137, 135, 135, 0.5);"
                                        onfocus="toggleEye(this, 'open')"
                                        onblur="toggleEye(this, 'closed')"
                                    >
                                    <button
                                        type="button"
                                        onclick="togglePassword('password', this)"
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; cursor: pointer;"
                                    >
                                        <img
                                            id="eye-icon"
                                            src="/images/closed_eye.png"
                                            alt="eye icon"
                                            style="height: 20px; width: 20px;"
                                        />
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6 px-2 mb-2">
                                <label for="c_password" class="form-label" style="color:#42b979;">
                                    <strong>Confirm Password <b style="color: red; font-size: 20px; vertical-align: middle;">*</b></strong>
                                </label>
                                <div style="position: relative;">
                                    <input 
                                        type="password" 
                                        id="c_password" 
                                        name="c_password"
                                        placeholder="Confirm Password" 
                                        class="form-control inp-1"
                                        style="width: 100%; flex-direction: column; border-radius: 5px; padding: 5px 8px; margin: 7px 0px; border: 1px solid rgba(137, 135, 135, 0.5);"
                                        onfocus="toggleEye2(this, 'open')"
                                        onblur="toggleEye2(this, 'closed')"
                                    />
                                    <button 
                                        type="button" 
                                        onclick="togglePassword2('c_password', this)"
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; cursor: pointer;"
                                    >
                                        <img
                                            id="c-eye-icon"
                                            src="/images/closed_eye.png"
                                            alt="eye icon"
                                            style="height: 20px; width: 20px;"
                                        />
                                    </button>
                                </div>
                            </div>

                            
                            <div class="col-md-6 px-2 mb-2">
                                <label for="gender" class="form-label" style="color:#42b979;">
                                    <strong>Gender 
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <select class="form-control select2" id="gender" name="gender" style="border: 1px solid #000;">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <div class="form-group">
                                    <label for="datePicker" class="date-picker-label" style="color: #42b979;">
                                        <strong>Date of Birth 
                                            <span class="text-danger fs-4" style="color: #42b979; vertical-align: middle;">*</span>
                                        </strong>
                                    </label>
                                    <div class="ad-dob d-flex justify-content-between align-items-center" style="gap: 8px;">
                                        <select id="year" name="year" class="form-select" style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;" onchange="updateDob()">
                                        </select>
                                        <select id="month" name="month" class="form-select" style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;" onchange="updateDob()">
                                        </select>
                                        <select id="day" name="day" class="form-select" style="border: 1px solid rgba(137, 135, 135, 0.5); padding: 5px;" onchange="updateDob()">
                                        </select>
                                    </div>
                                    <input name="dob" type="hidden" id="dob" />
                                </div>
                            </div>

                            <div class="col-md-12 px-8 mb-4">
                                <label for="mobile" class="form-label" style="color:#42b979;"><strong>Mobile Number
                                        <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <div class="input-group d-flex justify-content-between align-items-center"
                                    style="width: 100%">
                                    <select 
                                        class="form-select" id="countrySelect"
                                        style="border: 1px solid rgb(137, 135, 135);">
                                        @foreach ($countriesPhone as $key => $country)
                                            <option value="{{ $key }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control w-50" id="phone" name="phone"
                                        placeholder="e.g +92XXXXXXXXXX"
                                        style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                                </div>
                            </div>
                        </div>

                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="choice col-md-6 px-8">
                                <label for="experience" class="form-label" style="color:#42b979;"><strong>How We Can
                                        Help <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <select class="form-control form-select" aria-label="Default select example"
                                    style="width: 100% !important;border: 1px solid rgba(137, 135, 135, 0.5);">
                                    <option value="Online" selected>Online</option>
                                    <option value="Physical">Physical</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>

                            <div class="col-md-6 px-2 mb-2">
                                <label for="profilePicture" class="form-label" style="color:#42b979;"><strong>Profile
                                        Picture <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="file" class="form-control" id="profilePicture" name="profileImage"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>
                        </div>
                    </div>
                    <div class="d-none px-3 mx-3" id="page-2">
                        <div class="pg-1-heading">
                            <h3 class="fs-5 fw-bold py-3">2 Steps Left to Unlock Your Teaching Potential</h3>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="qualification" class="form-label" style="color:#42b979;"><strong>Highest
                                        Qualification <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <select class="form-control" id="school_class" name="qualification"
                                    style="border: 1px solid rgb(137, 135, 135);">

                                    @foreach($schoolClasses as $schoolClass)
                                        <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                                    @endforeach
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="profilePicture" class="form-label" style="color:#42b979;"><strong>Add Your
                                        Qualification Document <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="file" class="form-control" id="profilePicture" name="document"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>

                            <div class="row mb-4 col-md-6">
                                <label for="countryYear" class="form-label" style="color:#42b979;">
                                    <strong>Country and Year 
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <div class="d-flex justify-content-between align-items-center" style="gap: 2px;">
                                    <!-- Country Select -->
                                    <div class="col-md-6 px-0">
                                        <select id="country" name="country" class="form-select" style="border: 1px solid rgb(137, 135, 135); padding: 5px;">
                                            <option value="" disabled selected>Select Country</option>
                                            @foreach ($countriesPhone as $key => $country)
                                                <option value="{{ $key }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Year Select -->
                                    <div class="col-md-6 px-0">
                                        <select id="yearSelect" name="uniyear" class="form-select" style="border: 1px solid rgb(137, 135, 135); padding: 5px;">
                                            <option value="" disabled selected>Select Year</option>
                                            @for ($i = date('Y'); $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-6">
                            
                                <label for="specialization" class="form-label" style="color:#42b979;">
                                    <strong>Specialization
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <select name="specialization" class="form-control select2" id="specialization">
                                    <option value="mathematics">Mathematics</option>
                                    <option value="science">Science</option>
                                    <option value="computer_science">Computer Science</option>
                                    <option value="literature">Literature</option>
                                    <option value="history">History</option>
                                    <option value="languages">Languages</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="medicine">Medicine</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="institution" class="form-label" style="color:#42b979;">
                                    <strong>Institution/University Name
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <select name="institution" class="form-control select2" id="institution">
                                    <option value="harvard">Harvard University</option>
                                    <option value="mit">Massachusetts Institute of Technology</option>
                                    <option value="stanford">Stanford University</option>
                                    <option value="oxford">University of Oxford</option>
                                    <option value="cambridge">University of Cambridge</option>
                                    <option value="berkeley">University of California, Berkeley</option>
                                    <option value="yale">Yale University</option>
                                    <option value="princeton">Princeton University</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="qualification" class="form-label" style="color:#42b979;"><strong>Courses
                                        Teaching <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="text" class="form-control" id="other_qualification_input"
                                    name="other_qualification_input" style="border: 1px solid rgba(137, 135, 135, 0.5);" />
                            </div>
                            <div class="col-md-6 px-2 mb-2 mt-4">
                                <label for="teaching" class="form-label" style="color:#42b979;"><strong>Subject You Can
                                        Teach <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <select class="form-select teaching" id="teaching" name="teaching[]"
                                    style="border: 1px solid rgba(137, 135, 135, 0.5);">
                                    <option value="english">English</option>
                                    <option value="maths">Mathematics</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemistry">Chemistry</option>
                                    <option value="islamiyat">Islamiyat</option>
                                    <option value="urdu">Urdu</option>
                                    <option value="biology">Biology</option>
                                    <option value="computer">Computer Science</option>
                                    <option value="pakstudies">Pak Studies</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="language" class="form-label" style="color:#42b979;">
                                    <strong>Language Teaching
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <select name="language" class="form-control" id="language">
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="italian">Italian</option>
                                    <option value="portuguese">Portuguese</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="language_proficient" class="form-label" style="color:#42b979;">
                                    <strong>Language Proficient
                                        <span class="text-danger fs-4" style="color:#42b979; vertical-align: middle;">*</span>
                                    </strong>
                                </label>
                                <select name="language_proficient" class="form-control select2" id="language_proficient">
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="italian">Italian</option>
                                    <option value="portuguese">Portuguese</option>
                                    <!-- Add more languages as needed -->
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="qualification" class="form-label" style="color:#42b979;"><strong>Educational
                                        Teaching <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="text" class="form-control" id="other_qualification_input"
                                    name="other_qualification_input" style="border: 1px solid rgba(137, 135, 135, 0.5);" />
                            </div>
                            <!-- <div class="col-md-6">
                                            <label for="other_qualification_input" class="form-label" style="color:#42b979;"><strong>Technology Teaching</strong><span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="other_qualification_input" class="form-label" style="color:#42b979;"><strong>Islamic Teaching</strong><span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div> -->
                            <div class="col-md-6 px-2 mb-2">
                                <label for="experience" class="form-label" style="color:#42b979;"><strong>Experience (In
                                        Teaching) <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="number" min="0" class="form-control" id="experience" name="experience"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>

                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">

                            <div class="col-md-6 px-2 mb-2 d-none">
                                <label for="whatsapp" class="form-label" style="color:#42b979;"><strong>WhatsApp Number
                                        <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle; ">*</span></strong></label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    placeholder="e.g +92XXXXXXXXXX"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                            </div>
                        </div>
                    </div>
                    <div class="d-none mx-3" id="page-3">
                        <div class="pg-1-heading">
                            <h3 class="fs-5 fw-bold py-3">You're Just One Step Away</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="location" class="form-label " style="color:#42b979;"><strong>Country
                                        Residence <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle;">*</span></strong></label>
                                <select name="location" id="location" class="form-select " required
                                    style="margin: 0 auto !important; width: 100%; height: 50px;border: 1px solid rgb(137, 135, 135);">
                                    <option value="" class="text-justify">Select Country</option>
                                    @foreach($countries as $code => $country)
                                        <option value="{{ $code }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="city" class="form-label" style="color:#42b979;"><strong>City <span
                                            class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle;">*</span></strong></label>
                                <select name="city" id="city" class="form-select"
                                    style="border: 1px solid rgb(137, 135, 135);" required>
                                    <option value="" style="color:#42b979;"><strong>Select City</strong></option>
                                </select>
                            </div>
                        </div>
                        <input required type="email" name="c_email" placeholder="Email" class="inp-1 d-none"
                            style="border: 1px solid rgba(137, 135, 135, 0.5);" readonly>

                        <div class="form-row d-none flex-column flex-md-row">

                            <div class="col-md-12 px-2 mb-2">
                                <label for="teaching" class="form-label" style="color:#42b979;"><strong>Available Time
                                        <span class="text-danger fs-4"
                                            style="color:#42b979;vertical-align: middle;">*</span></strong></label>
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
                            <textarea class="form-control" id="curriculum" name="curriculum[]" rows="4"
                                placeholder="Enter Your Description Here..."
                                style="box-shadow: none;border: 1px solid rgb(137, 135, 135);"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4 d-flex justify-content-center" style="margin-bottom: 1rem !important; padding-top:20px">
                    <!-- Previous Button -->
                    <input onclick="backStep(this)" id="back-btn" type="button" value="←  Previous"
                    class="ab p-2 btn-an rounded border-0 text-success hover-button bg-body-secondary text-dark fs-6 py-1 px-3 d-none solid_btn"
                    style="margin-right: 10px; white-space: nowrap;">

                    <!-- Next Button -->
                    <input onclick="NextStep(this)" id="next-btn" type="button" value="Next  →" 
                        class="ab p-2 btn-an rounded border-0 text-success hover-button bg_theme_green text-light fs-6 py-1 px-3 solid_btn" 
                        style="white-space: nowrap;">

                </div>

            </form>
        </div>
    </div>
</div>



@endsection
@section('js')
<script src="./js/tutor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    function togglePassword2(inputId, button) {
    const input = document.getElementById(inputId);
    const eyeIconId = inputId === "c_password" ? "c-eye-icon" : "eye-icon"; // Determine which eye icon to target
    const eyeIcon = document.getElementById(eyeIconId);

    if (input.type === "password") {
        input.type = "text";
        eyeIcon.src = "/images/open_eye.png"; // Change to open-eye image
    } else {
        input.type = "password";
        eyeIcon.src = "/images/closed_eye.png"; // Change back to closed-eye image
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


    function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const eyeIcon = document.getElementById("eye-icon");

    if (input.type === "password") {
        input.type = "text";
        eyeIcon.src = "/images/open_eye.png"; // Change to open-eye image
    } else {
        input.type = "password";
        eyeIcon.src = "/images/closed_eye.png"; // Change back to closed-eye image
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
    $(document).ready(function () {
        var storedEmail = localStorage.getItem('email');
        if (storedEmail) {
            // Set the email input value to the stored email
            $('#email').val(storedEmail);
        }
        $('#location').select2();
        $('#city').select2();
        $('#school_class').select2();
        $('#teaching').select2();
        $('.teaching').select2({
            multiple: true
        });
        // $('#city').select2();
        $('#location').on('change', function () {


            var countryCode = $(this).val();
            var $citySelect = $('#city');

            if (countryCode) {
                $.ajax({
                    url: '{{ route('cities') }}',
                    type: 'GET',
                    data: { country: countryCode },
                    success: function (data) {
                        $citySelect.empty();
                        $citySelect.append('<option value="">Select City</option>');
                        $.each(data, function (index, city) {
                            $citySelect.append('<option value="' + city + '">' + city + '</option>');
                        });
                    },
                    error: function () {
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
        $('#country').select2({
            placeholder: 'Type to search country',
            allowClear: false,
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',

        });
        $('#yearSelect').select2({
            placeholder: 'Type to search year',
            allowClear: false,
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',

        });
    });

    $(document).ready(function() {
        $('#gender').select2({
            placeholder: "Select or type your gender",
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',
        });
    });

    $(document).ready(function() {
        $('#specialization').select2({
            placeholder: "Select a specialization",  // Optional placeholder text
             // Allows clearing the selection
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',

        });
    });

    $(document).ready(function() {
        // Initialize Select2 for language select dropdown
        /*$('#language').select2({
            placeholder: "Select or type a language",
            allowClear: true,
            tags: true // Allows users to add new language if not listed
        });
*/
        // Initialize Select2 for the input field as well (allows typing/selecting)
        $('#other_qualification_input').select2({
            placeholder: "Type or select a language",
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',
        });
    });

    $(document).ready(function() {
        $('#institution').select2({
            placeholder: "Select an institution/university",  // Optional placeholder allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',

        });
    });

    
    $(document).ready(function() {
        // Initialize Select2 on the language proficiency select field
        $('#language_proficient').select2({
            placeholder: 'Select a language',
            allowClear: false,
            tags: true,
            dropdownCssClass: 'custom-select2-templates-lang',
            selectionCssClass: 'custom-select2-templates-lang',
// Allows clearing the selected option
        });
    });


</script>
<script>

    $(document).ready(function () {

        setTimeout(function () {
            $(".alert").fadeOut("slow");
        }, 5000);
        $('#datepicker').datepicker({
            format: 'yyyy-dd-mm',
            todayHighlight: true,
            autoclose: true,
            endDate: "0d"
        });
    });
    $(document).ready(function () {
        // Initialize Select2
        $('#countrySelect').select2();

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
        userNumber.on('keydown', function (event) {
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
        userNumber.on('input', function () {
            const prefix = userNumber.attr('data-prefix');
            const maxLength = countriesNumberLength[countryValue];
            if (userNumber.val().length > maxLength) {
                userNumber.val(userNumber.val().slice(0, maxLength));
            }
        });

        // Change the prefix when the country selection changes
        country.on('change', function () {
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
    var Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];// index => month [0-11]
    $(document).ready(function () {
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
        for (var i = 1970; i <= (d.getFullYear() + 10); i++) {// years start i
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

        }
        else {
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