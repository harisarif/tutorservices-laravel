@extends('layouts.app')
<!-- aos animation link -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
<meta name="description"
    content="Tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="{{ asset('css/tutor-form.css') }}">
@include('whatsapp')
<button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;"
    onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
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

<header class="main_header d-flex bg-white py-2 px-3 justify-content-between align-items-center">
    <!-- Left Logo -->
    <a class="arrow" href="https://edexceledu.com">
        <img src="{{ asset('images/logo.png') }}" alt="EDEXCEL-logo" height="50px">
    </a>

    <!-- Right Login Button -->
    <a href="/login" class="btn login-btn text-white px-4 py-2"
        style="background-color: #42b979; border: none; border-radius: 5px;">
        Login
    </a>
</header>

<div class="container-fluid d-flex flex-row justify-content-center align-items-start main-banner">
    <div class="d-flex flex-column align-items-center justify-content-start gap-3 my-4">
        <div class="d-flex flex-column align-items-center justify-content-center gap-1 my-5 mx-5">
            <h1 class="main-heading text-dark fw-bold my-2 banner-heading fade-in-up">
                Join The Community of Tutors
            </h1>
            <p class="subheading text-white mx-5 text-center fade-in-up" style="animation-delay: 0.9s;">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
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
                                <div style="text-align: left;color: red;">
                                </div>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="l_name" class="form-label" style="color:#42b979;"><strong>Last
                                        Name</strong></label>
                                <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Doe"
                                    style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                <div style="text-align: left;color: red;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="email" class="form-label" style="color:#42b979;">
                                    <strong>Email</strong>
                                </label>
                                <input type="email" class="form-control email-field" id="email" name="email"
                                    style="box-shadow: none; background-color: white;border: 1px solid rgba(137, 135, 135, 0.5);"
                                    readonly>
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
                                        <div style="text-align: left; color: red;"></div>
                                        <button type="button" onclick="togglePassword('password', this)"
                                            style="position: absolute; right: 10px; top: 20px; transform: translateY(-50%); border: none; background: none; cursor: pointer;">
                                            <img id="eye-icon" src="{{ asset('images/closed_eye.png') }}" alt="eye icon"
                                                style="height: 20px; width: 20px;" />
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
                                    <div style="text-align: left; color: red;"></div>
                                    <button type="button" onclick="togglePassword2('c_password', this)"
                                        style="position: absolute; right: 10px; top: 20px; transform: translateY(-50%); border: none; background: none; cursor: pointer;">
                                        <img id="c-eye-icon" src="{{ asset('images/closed_eye.png') }}" alt="eye icon"
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
                                    <option value="others">Others</option>
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
                            <div class="choice col-md-6 px-2 mb-2">
                                <label for="experience" class="form-label" style="color:#42b979;">
                                    <strong>How We Can Help</strong>
                                </label>
                                <select class="form-control form-select" id="experience"
                                    aria-label="Default select example"
                                    style="border: 1px solid rgba(137, 135, 135, 0.5); width: 100%;">
                                    <option value="Online" selected>Online</option>
                                    <option value="Physical">Physical</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="profilePicture" class="form-label" style="color:#42b979;">
                                    <strong>Profile Picture</strong>
                                </label>
                                <input type="file" class="form-control" id="profilePicture" name="profileImage"
                                    style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                <div style="text-align: left;color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none px-3 mx-3" id="page-2">
                        <div class="pg-1-heading">
                            <h3 class="fs-5 fw-bold py-1">2 Steps Left to Unlock Your Teaching Potential</h3>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <!-- Highest Qualification -->
                            <div class="col-md-6 px-2 mb-2">
                                <label for="qualification" class="form-label" style="color:#42b979;">
                                    <strong>Highest Qualification</strong>
                                </label>
                                <select class="form-control school_class" id="school_class" name="qualification"
                                    style="border: 1px solid rgb(137, 135, 135);">
                                    @foreach($schoolClasses as $schoolClass)
                                        <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                                    @endforeach
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="qualificationDocument" class="form-label" style="color:#42b979;">
                                    <strong>Add Your Qualification Document</strong>
                                </label>
                                <input type="file" class="form-control" id="qualificationDocument"
                                    name="qualificationDocument"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                                <div style="text-align: left;color: red;"></div>
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
                                    <select id="yearSelect" name="uniyear" class="form-select"
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
                        </div>

                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="institution" class="form-label" style="color:#42b979;">
                                    <strong>Institution/University Name</strong>
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
                            <div class="col-md-6 px-2 mb-2">
                                <label for="qualification" class="form-label" style="color:#42b979;"><strong>Courses
                                        Teaching</strong></label>
                                <input type="text" class="form-control" id="other_qualification_input"
                                    name="other_qualification_input"
                                    style="border: 1px solid rgba(137, 135, 135, 0.5);" />
                            </div>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="teaching" class="form-label" style="color:#42b979;"><strong>Subject You Can
                                        Teach</strong></label>
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
                                <div style="text-align: left;color: red;"></div>
                            </div>
                            <div class="col-md-6 px-2 mb-2">
                                <label for="language" class="form-label" style="color:#42b979;">
                                    <strong>Language Teaching</strong>
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
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="language_proficient" class="form-label" style="color:#42b979;">
                                    <strong>Language Proficient</strong>
                                </label>
                                <select name="language_proficient" class="form-control select2"
                                    id="language_proficient">
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
                            <div class="col-md-6 px-2 mb-2">
                                <label for="qualification" class="form-label" style="color:#42b979;"><strong>Educational
                                        Teaching</strong></label>
                                <input type="text" class="form-control" id="educationalTeaching"
                                    name="educationalTeaching" style="border: 1px solid rgba(137, 135, 135, 0.5);" />
                                <div style="text-align: left;color: red;"></div>
                            </div>
                        </div>
                        <div class="form-row d-flex flex-column flex-md-row">
                            <div class="col-md-6 px-2 mb-2">
                                <label for="experience" class="form-label" style="color:#42b979;"><strong>Experience (In
                                        Teaching)</strong></label>
                                <input type="number" min="0" class="form-control" id="experienceInTeaching"
                                    name="experienceInTeaching"
                                    style="box-shadow: none;border: 1px solid rgba(137, 135, 135, 0.5);">
                                <div style="text-align: left;color: red;"></div>
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
                            <h3 class="fs-5 fw-bold py-3">You're Just One Step Away</h3>
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
                            <textarea class="form-control" id="curriculum" name="curriculum[]" rows="5"
                                placeholder="Enter Your Description Here..."
                                style="box-shadow: none;border: 1px solid rgb(137, 135, 135);"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4 d-flex justify-content-center"
                    style="margin-bottom: 1rem !important; padding-top:20px">
                    <!-- Previous Button -->
                    <input onclick="backStep(this)" id="back-btn" type="button" value="←  Previous"
                        class="ab p-2 btn-an rounded border-0 text-success hover-button bg-body-secondary text-dark fs-6 py-1 px-3 d-none solid_btn"
                        style="margin-right: 10px; white-space: nowrap;">

                    <!-- Next Button -->
                    <input onclick="validateAndNextStep(this)" id="next-btn" type="button" value="Next  →"
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
    const step1RequiredFields = ['f_name', 'l_name', 'password', 'c_password', 'profilePicture'];
    // const step2RequiredFields = ['school_class', 'qualificationDocument', 'country', 'yearSelect', 'specialization', 'institution', 'other_qualification_input', 'teaching', 'language', 'language_proficient', 'educationalTeaching', 'experience',];
    const step2RequiredFields = ['qualificationDocument', 'educationalTeaching', 'experienceInTeaching'];

    function validateAndNextStep(button) {
        if (validateForm()) {
            NextStep(button);
        }
    }

    function validateForm() {
        let isValid = true;

        if (stepCounter == 1) {
            for (const field of step1RequiredFields) {
                const element = document.getElementById(field);
                const errorDiv = element.nextElementSibling;

                if (!element.value.trim()) {
                    isValid = false;
                    element.style.border = '2px solid red';
                    errorDiv.textContent = "Please fill this field"
                } else {
                    element.style.border = '';
                    errorDiv.textContent = '';
                }
            }

            const passwordElement = document.getElementById('password'); // Use string ID
            const confirmPasswordElement = document.getElementById('c_password'); // Use string ID

            if (passwordElement && confirmPasswordElement) {
                if (passwordElement.value !== confirmPasswordElement.value) {
                    console.log("passwordValue.value: ", passwordElement.value);
                    console.log("confirmPasswordValue.value: ", confirmPasswordElement.value);
                    isValid = false;
                    alert('Passwords and Confirm Password must be same');
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
                    element.style.border = '2px solid red';
                    errorDiv.textContent = "Please fill this field"
                } else {
                    element.style.border = '';
                    errorDiv.textContent = '';
                }
            }
        }

        return isValid;
    }
</script>
<script>
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
        // $('#location').select2();
        // $('#city').select2();
        // $('#school_class').select2();
        $('#city').select2({
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

        $('#teaching').select2({
            multiple: true
        });

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

    $(document).ready(function () {
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