@extends('layouts.admin')
@section('title')
   Edexcel Dashboard
@endsection 
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@php
$languages_spoken = json_decode($tutor->language, true) ?? [];
$selectedYear = isset($tutor->dob) ? date("Y", strtotime($tutor->dob)) : "";
$selectedMonth = isset($tutor->dob) ? date("m", strtotime($tutor->dob)) : "";
$selectedDay = isset($tutor->dob) ? date("d", strtotime($tutor->dob)) : "";

// Convert specialization into an array if stored as a comma-separated string
$specializations = is_array($tutor->specialization) ? $tutor->specialization : explode(',', $tutor->specialization);

$currentYear = date("Y");
$selectedSubjects = is_array($tutor->teaching) ? $tutor->teaching : explode(',', $tutor->teaching ?? '');
$selectedLanguage = $tutor->language_tech ?? '';
@endphp
<link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/style1.css')}}" />
<!-- Select2 CSS -->
<link href="{{asset('js/select2.css')}}" rel="stylesheet" />


@if ($errors->any())
<div class="alert alert-danger opacity-100" id="close">
    <ul style="margin: 0; padding: 10px 0;">
        @foreach ($errors->all() as $error)
        <li style="display:flex; justify-content: space-between; align-items: center;">
            {{ $error }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true"></i>
        </li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div id="wrapper">
@include('layouts.admin-sidebar')
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

                        <div class="notification-icon">
                            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge badge-danger badge-counter" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>


                        </div>
                        <!-- Dropdown - Alerts -->
                        @include('notifications')
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


            <section>
                <form action="{{route('teachers.update', $tutor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="profile-header text-center">
                        <div class="profile-pic-container">
                            <label for="imageUpload">
                                <img src="{{asset('storage/' . $tutor->profileImage)}}" alt="Avatar" class="avatar img-thumbnail" id="profileImage">
                                <div class="upload-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </label>
                        </div>
                        <input type="file" name="profileImage" id="imageUpload" class="form-control d-none" accept="image/*">


                    </div>

                    <!-- Personal Information & Education -->
                    <div class="row mt-4">
                        <div class="col-md-6 d-flex">
                            <div class="card h-100 w-100 ms-3">
                                <div class="card-body">
                                    <h5 class="section-title"><i class="fas fa-user icon"></i> Personal Information</h5>

                                    <div class="mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">First name:</strong></label>
                                        <input type="text" class="form-control" id="fullName" name="f_name" value="{{ $tutor->f_name}}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">Last name:</strong></label>
                                        <input type="text" class="form-control" id="fullName" name="l_name" value="{{ $tutor->l_name}}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">Email:</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $tutor->email}}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">Price:</strong></label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-select w-auto col-3" style="height:38px;" id="currency" name="currency" required>
                                                @foreach (config('symbols.symbols') as $key => $symbol)
                                                @if(is_string($symbol))
                                                <option value="{{ $symbol }}"
                                                    {{ isset($data) && $data->currency == $symbol ? 'selected' : '' }}>
                                                    {{ $symbol }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="e.g 833" required
                                                value="{{ isset($tutor) ? preg_replace('/[^0-9.]/', '', $tutor->price) : '' }}">
                                        </div>
                                        <input type="hidden" name="currency_price" id="currency_price">
                                    </div>


                                    <div class="mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">Phone:</strong></label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-select w-auto" id="countrySelect"
                                                style="border: 1px solid rgb(137, 135, 135); flex-shrink: 0; ">
                                                @foreach ($countriesPhone as $key => $country)
                                                <option value="{{ $key }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="e.g +92XXXXXXXXXX" value="{{ $tutor->phone }}"
                                                style="box-shadow: none; border: 1px solid rgba(137, 135, 135, 0.5);">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label"><strong style="color: #1cc88a;">Date of Birth:</strong></label>
                                                <input type="date" class="form-control" name="dob" value="{{ $tutor->dob}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="gender" class="form-label" style="color: #1cc88a;">Gender</label>
                                                <select name="gender" id="gender" class="form-select select2" required>
                                                    <option value="male" {{ $tutor->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ $tutor->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ $tutor->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex">
                            <div class="card h-100 w-100 mx-3">
                                <div class="card-body">
                                    <h5 class="section-title">
                                        <i class="fas fa-graduation-cap icon"></i> Education & Qualifications
                                    </h5>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Experience Teaching</label>
                                        <input type="text" class="form-control" name="experience" id="address" value="{{ $tutor->experience ?? '' }}" style="border: 2px solid #dee2e6;">
                                    </div>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Institution/University Name</label>
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
                                        <label for="address" class="form-label" style="color: #1cc88a;">Course teaching</label>
                                        <input type="text" class="form-control" name="courses" id="address" value="{{ $tutor->curriculum ?? '' }}" style="border: 2px solid #dee2e6;">
                                    </div>

                                    <label for="qualification" class="form-label">
                                        <strong style="color: #1cc88a;">Highest Qualification</strong>
                                    </label>

                                    <select class="form-control school_class" id="qualification" name="qualification">
                                        {{-- If a qualification ID exists, show the corresponding name --}}
                                        @if($tutor->qualification && $schoolClasses->contains('id', $tutor->qualification))
                                        @php
                                        $existingQualification = $schoolClasses->where('id', $tutor->qualification)->first();
                                        @endphp
                                        <option value="{{ $existingQualification->id }}" selected>
                                            {{ $existingQualification->name }}
                                        </option>
                                        @endif

                                        {{-- Loop through available qualifications --}}
                                        @foreach($schoolClasses as $schoolClass)
                                        <option value="{{ $schoolClass->id }}"
                                            {{ ($qualification == $schoolClass->id) ? 'selected' : '' }}>
                                            {{ $schoolClass->name }}
                                        </option>
                                        @endforeach

                                        {{-- Option for custom/other qualification --}}
                                        <option value="">Others</option>
                                    </select>

                                    <label for="specialization" class="form-label" style="color: #1cc88a;">
                                        Specialization
                                    </label>
                                    <select name="specialization[]" class="form-control select2" id="specialization" multiple>
                                        @php
                                        // Ensure specialization is an array
                                        $selectedSpecializations = is_array($tutor->specialization) ?
                                        $tutor->specialization :
                                        json_decode($tutor->specialization, true) ?? explode(',', $tutor->specialization);
                                        @endphp

                                        @foreach($selectedSpecializations as $specialization)
                                        <option value="{{ $specialization }}" selected>{{ ucfirst(str_replace('_', ' ', $specialization)) }}</option>
                                        @endforeach @foreach (config('specialization.specialization') as $specialization)
                                        @if(!in_array($specialization, $selectedSpecializations))
                                        <option value="{{ $specialization }}">{{ ucfirst(str_replace('_', ' ', $specialization)) }}</option>
                                        @endif
                                        @endforeach
                                    </select>


                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">year</label>
                                        <select id="yearSelect" name="year" class="form-select select2">
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
                            <div class="card h-100 w-100 ms-3">
                                <div class="card-body">
                                    <h5 class="section-title"><i class="fas fa-chalkboard-teacher icon"></i> Teaching Preferences</h5>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Status</label>
                                        <select class="form-select school_class" id="qualification" name="availability_status">
                                            @php
                                            $selectedStatus = $tutor->availability_status ?? ''; // Ensure it's defined
                                            @endphp

                                            @if($selectedStatus && !in_array($selectedStatus, ['Online', 'Physical', 'Both']))
                                            <option value="{{ $selectedStatus }}" selected>{{ ucfirst($selectedStatus) }}</option>
                                            @endif

                                            <option value="Physical" @if($selectedStatus==='Physical' ) selected @endif>Physical</option>
                                            <option value="Both" @if($selectedStatus==='Both' ) selected @endif>Both</option>
                                            <option value="">Others</option>
                                        </select>

                                    </div>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Subject you want to teach</label>
                                        <select class="form-select teaching" id="teachingSubjects" name="teaching[]">
                                            @foreach (config('subjects.subjects') as $subject)
                                            <option value="{{ $subject }}" {{ in_array($subject, $selectedSubjects) ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $subject)) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Description</label>
                                        <input type="text" class="form-control" id="address" name="description" value="{{$tutor->description}}" style="border: 2px solid #dee2e6;">
                                    </div>

                                    <div class="mb-2">
                                        <label for="document" class="form-label" style="color: #1cc88a;">Upload Qualification Document</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control d-block" id="document" name="document" accept=".pdf,.doc,.docx,.jpg,.png" style="border: 2px solid #dee2e6;">
                                        </div>
                                        {{-- Show previously uploaded file --}}
                                        @if(isset($tutor->document))
                                        <p class="mt-2">Previously uploaded:
                                            <a href="{{ asset( $tutor->document) }}" target="_blank" id="documents" style="background-color: #198754;color: white;margin-right: 25px;" class="btn">Watch Document</a>
                                        </p>
                                        @endif
                                    </div>

                                    <div class="mb-2">
                                        <label for="video" class="form-label" style="color: #1cc88a;">Video</label>
                                        <div class="input-group">
                                            <!-- <input type="text" class="form-control" id="video" placeholder="Video URL or Name"> -->
                                            <input type="file" class="form-control" name="videoFile" id="videoUpload" accept="video/*" style="border: 2px solid #dee2e6;">
                                        </div>@if(isset($tutor->video))
                                        <p class="mt-2">Previously uploaded:
                                            <a href="{{ asset($tutor->video) }}" target="_blank" id="video" style="background-color: #198754;color: white;margin-right: 25px;" class="btn">Watch Video</a>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4 mb-3 d-flex">
                            <div class="card h-100 w-100 mx-3">
                                <div class="card-body">
                                    <h5 class="section-title"><i class="fas fa-language icon"></i> Languages</h5>

                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Educational teaching</label>
                                        <input type="text" class="form-control" name="edu_teaching" id="address" value="{{$tutor->edu_teaching}}" style="border: 2px solid #dee2e6;">
                                    </div>
                                    <div class="mb-2">
                                        <label for="address" class="form-label" style="color: #1cc88a;">Langauge teaching</label>
                                        <select name="language_tech" class="form-select" id="language">
                                            @if($selectedLanguage && !in_array($selectedLanguage, ['english', 'spanish', 'french', 'german', 'italian', 'portuguese']))
                                            <option value="{{ $selectedLanguage }}" selected>{{ ucfirst($selectedLanguage) }}</option>
                                            @endif

                                            @foreach (config('languages.languages') as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                            @endforeach
                                        </select>


                                    </div>

                                    <div id="language-container">
                                        @foreach ($languages_spoken as $index => $lang)
                                        <div class="form-row d-flex flex-column flex-md-row mb-4" id="language-row">
                                            <div class="col-md-12 col-lg-12">
                                                <label for="language_proficient" class="form-label" style="color: #1cc88a;">
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
                                                        @endforeach @foreach (config('languages.languages') as $code => $name)
                                                        <option value="{{ $code }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-lg-12">
                                                <label for="language_level_{{ $index }}" class="form-label" style="color: #1cc88a;">
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
                                    <button type="submit" class="btn mt-2 mb-2 animated-button" style="background-color: #198754;color: white;margin-right: 25px;">Submit</button>
                                </div>


                </form>
            </section>


        </div>


        
    </div>


</div>
@endsection

@section('js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currencySelect = document.getElementById('currency');
        const priceInput = document.getElementById('price');
        const currencyPriceInput = document.getElementById('currency_price'); // Hidden field

        function updateHiddenField() {
            currencyPriceInput.value = currencySelect.value + ' ' + priceInput.value;
        }

        // Update hidden field on change/input
        currencySelect.addEventListener('change', updateHiddenField);
        priceInput.addEventListener('input', updateHiddenField);

        // Initialize the field with default values
        updateHiddenField();
    });
</script>
<script>
    $(document).ready(function() {
        $('#specialization').select2({
            tags: true, // Allows adding new values
            tokenSeparators: [','], // Use comma to separate values
            placeholder: "Select or add specialization",
            allowClear: true
        });
    });
    $(document).ready(function() {
        $('#videoUpload').on('change', function() {
            if ($(this).val()) {
                $('#video').parent().hide(); // Hide the previous video link
            }
        });
    });
    $(document).ready(function() {
        $('#document').on('change', function() {
            if ($(this).val()) {
                $('#documents').parent().hide(); // Hide the previous video link
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for better UI
        $('#countrySelect').select2({
            placeholder: 'Select a country',
            allowClear: false
        });

        $('#countrySelect').on('select2:open', function() {
            $('.select2-container .select2-selection--single').css('height', '38px');
        });

        // Country prefix & phone number length mappings
        const countriesPrefix = @json($countries_prefix);
        const countriesNumberLength = @json($countries_number_length);

        let countryValue = $('#countrySelect').val(); // Get selected country value
        const userNumber = $('#phone');

        // Get previously saved phone number from the tutor table
        let savedPhoneNumber = @json($tutor->phone);

        // Function to set country prefix
        function setCountryPrefix(resetNumber = false) {
            const prefix = countriesPrefix[countryValue] || '+';

            if (resetNumber || !savedPhoneNumber) {
                userNumber.val(prefix); // Show only the prefix when changing country
            } else {
                userNumber.val(savedPhoneNumber); // Show saved phone number
            }

            userNumber.attr('data-prefix', prefix); // Store prefix in data attribute
        }

        // Change country prefix and reset phone number when selection changes
        $('#countrySelect').on('change', function() {
            countryValue = $(this).val();
            setCountryPrefix(true); // Reset phone number on country change
        });

        // Prevent deletion of prefix
        userNumber.on('keydown', function(event) {
            const prefix = userNumber.attr('data-prefix');
            const cursorPosition = this.selectionStart;

            if (cursorPosition <= prefix.length && (event.key === 'Backspace' || event.key === 'Delete')) {
                event.preventDefault();
            }
            if (cursorPosition < prefix.length && !['ArrowLeft', 'ArrowRight'].includes(event.key)) {
                event.preventDefault();
            }
        });

        // Limit input length based on selected country
        userNumber.on('input', function() {
            const prefix = userNumber.attr('data-prefix');
            const maxLength = countriesNumberLength[countryValue] || 15;

            if (userNumber.val().length > maxLength) {
                userNumber.val(userNumber.val().slice(0, maxLength));
            }
        });

        // Set default country prefix on page load
        setCountryPrefix();
    });
</script>
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
    document.addEventListener("DOMContentLoaded", function() {
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

        document.getElementById("year").addEventListener("change", function() {
            let year = parseInt(this.value);
            let month = parseInt(document.getElementById("month").value);
            if (month) {
                populateDays(month, year);
            }
            updateDob();
        });

        document.getElementById("month").addEventListener("change", function() {
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



@endsection