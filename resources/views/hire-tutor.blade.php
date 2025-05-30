@extends('layouts.app')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Hired tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #42B979 !important;
            color: #fff;
            margin-top: 6px !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding-left:18px !important
        }
        .select2-selection__choice__remove span {
            color:#fff;
        }
        .upload-area {
            cursor: pointer; 
            border: 2px dashed #42b979; 
            width: 100%; 
            height: 100px;
        }
        #allModal {
            display: none !important;
        }
        #page-2 {
            height:300px;
            overflow-y:scroll;
        }
        
        main{
            background: url(./images/bg_image_1.png), #f1f1f1a0;
            background-blend-mode: screen;
        }
        .select2-container .select2-selection--single{
            height: 45px !important;
        }
        .custom-select-wrapper {
            position: relative;
            display: flex;
            cursor: pointer;
            text-align: justify;
        }
        [dir="rtl"] .custom-select-web  {
            margin-left: 50px;
            }
        #language-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ccc;
            color: var(--primary-color) !important;
            border-radius: 4px;
            padding: 5px;
            font-size: 12px;
            color: #333;
            width: 95px;
            max-width: 95px;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .custom-options-web {
            display: none;
            position: absolute;
            top: 30px;
            left: -109px;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        [dir="rtl"] .custom-options-web  {
            left: -5px;
        }
        [dir="rtl"] .ad-heading  {
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 170px;
        }
        [dir="rtl"] .whatsApp_button_Warpper12  {
            right: 94%;
        }
        [dir="rtl"] .whatsapp-help  {
            right: -115px;
            white-space: nowrap;
            width: 111px;
        }
        [dir="rtl"] .mini-heading  {
            text-align: justify;
            display: flex;
        }
        [dir="rtl"] .goToTop  {
            right: 94%;
        }
        [dir="rtl"] .main-footer{
            text-align: justify;
        }
        [dir="rtl"] .heading-box{
            text-align: justify !important;
        }
        [dir="rtl"] .form-group {
            text-align: justify !important;
            width: 0;
        }
        .custom-options.open {
            display: block;
        }
        .custom-options-web.open {
            display: block;
        }
        .fa-globe{
            margin-left: -50px;
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

<body>

        <header class="text-center bg-white m-0 p-2 d-flex align-items-center justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="{{ asset('images/logo.png') }}" alt="EDEXCEL-logo"height="50px"></a>
                <div class="custom-select-wrapper">
                    @include('language')
                </div>
        </header>
        <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 9;" onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
    @include('whatsapp')
    <main class="hireTutor">
        <div class="row m-0 px-4">
            <div class="main-page col-12 bg-white col-md-6 mx-auto my-3 p-0 text-center ">
                <!-- page-1 header -->
                <div class="col m-1 py-3 bg-success text-center flex-column rounded-top bg-body-secondary">
                    <h3>{{ __('messages.Post Learning Requirement - Its Free!') }}</h3>
                    <p>{{ __('messages.Post your learning requirement and let interested tutors contact you') }}</p>
                    <span><i>{{ __('messages. If you are a tutor') }} </i><a href="{{ route('tutor') }}" class="theme_text_green text-decoration-none">
                            <b>{{ __('messages.Click here') }}</b></a></span>
                            <h3 style="font-size: 18px;color: red;"><i>{{ __('messages.Please fill all mandatory fields') }}</i></h3>
                </div>
                <!-- loading -->
                <div class="col-12 d-flex justify-content-center py-3 border-bottom">
                    <b class="theme_text_green px-2 persentage-num">33%</b>
                    <div class="loading bg-body-secondary my-2">
                        <div class="percentage bg_theme_green"></div>
                    </div>
                </div>
                <form action="{{ route('student-create') }}" method="POST" class="pages" enctype="multipart/form-data">
                    @csrf
                    <div style="min-height: 325px;">


                        <!-- page-1 -->
                        <div class="col " id="page-1">
                            <h3 class="heading-box pt-3" style="padding:0 30px; text-align: left; font-size:16px;color:#42b979;"><strong>{{ __('messages.What are you looking for?') }}</strong></h3>
                            <div class="choice col-12 px-3 py-1" >

                                <ul class="p-0 ">
                                    <li class="d-flex align-items-center fs-5 py-1">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Online" name="subjects"
                                            id="option-1">
                                        <label for="option-1" style="font-size:15px;">{{ __('messages.Online Tutor ') }}</label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-1">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Physical" name="subjects"
                                            id="option-2">
                                        <label for="option-2" style="font-size:15px;">{{ __('messages.Tutor for Home') }}</label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-1">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Both" name="subjects"
                                            id="option-3">
                                        <label for="option-3" style="font-size:15px;">{{ __('messages.Both') }}</label>
                                    </li>
                                </ul>
                            </div>

                            
                            <div class="form-group mx-4" style="text-align:left; width:90%;" >
                                    <label for="school_class" class="mini-heading pb-1">
                                        <strong style="color:#42b979;">{{ __('messages.Select your Grade') }} <b style="color: red;
                                         font-size: 20px;">*</b></strong>
                                   </label>
                                   <select class="form-control" id="school_class" name="grade" style="height:50px;">
                                    <option value="">Select your grade</option>
                                    @foreach($schoolClasses as $schoolClass)
                                        <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                    
                            
                            <div class="form-group mx-4" style="text-align: left; width: 90%;">
                                <label class="mini-heading" for="subject" style="padding: 5px; color: #42b979;">
                                    <strong>{{ __('messages.Subject') }}
                                        <b style="color: red; font-size: 20px;">*</b>
                                    </strong>
                                </label>
                            
                                <select name="subject[]"  class="form-control h-40 select2" placeholder="Add Multiple Subject" id="subject" multiple>
                                    @foreach (config('subjects.subjects') as $subject)
                                    <option value="{{ $subject }}">
                                        {{$subject}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <!-- page-2 -->
                      
                        <div class="col-12 px-4 py-4 d-none" id="page-2">
                            <h4 style="font-size: 18px; color:#42b979;" ><b>{{ __('messages.Select Your Residence') }}</b></h4>
                            <div class="col-12" id="page-1">
                                <div class="col-12 mb-2  text-left" style="text-align:left">
                                    <h4 style="font-size: 16px; text-align: left; color:#42b979;"><strong  class="mini-heading">{{ __('messages.Select your country') }}</strong></h4>
                                
                                    <select name="country" id="country" class="form-select" required style="margin: 0 auto !important; width: 100%; height: 50px;">
                                        <option value="">{{ __('messages.Select Country') }}</option>
                                        @foreach($countries as $code => $country)
                                            <option value="{{ $code }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-2 text-left" style="text-align:left">
                                    
                                    <!-- <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" required style="margin: 16px auto !important; width: 92%; height: 50px;"> -->
                                    <h4 style="font-size: 16px; text-align: left; color:#42b979;"><strong  class="mini-heading">{{ __('messages.Select your city') }}</strong></h4>
                                    <select name="city" id="city" class="form-select" required style="margin: 0 auto !important; width: 100%; height: 50px;">
                                        <option value="">{{ __('messages.Select City') }}</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col" style="text-align:left;">
                                <h3 style="font-size: 18px; text-align: center; margin-top: 15px;    margin-bottom: -9px; color: #42b979;"><b>{{ __('messages.Please Enter your Details') }}</b></h3>
                                <div>
                                    <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Name') }} <b style="color: red;
                                        font-size: 20px;">*</b></strong></label>
                                    <input required name="name" type="text" placeholder="{{ __('messages.Name') }}"  class="inp-1 w-100">
                                </div>
                                <div>
                                    <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Email') }}<b style="color: red;
                                        font-size: 20px;">*</b></strong></label>
                                    <input required name="email" type="email" placeholder="{{ __('messages.Email') }}"  class="inp-1 w-100">
                                </div>
                                <div class="col-12 px-0 mb-2">
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
                                <div class="px-0 mb-2 col-12 d-flex flex-column align-items-left">
                                    <label class="mb-2 fw-bold" style="color: #42b979; font-size: 18px;text-align: left;">{{ __('messages.Picture') }}</label>
                                    <div class="upload-area d-flex flex-column align-items-center justify-content-center text-center" id="uploadArea"
                                        >
                                        <input type="file" class="form-control d-none" id="profilePicture" name="image" accept="image/*">
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
                                <!-- <div class="row"> -->
                                <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Mobile Number') }} <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <div class="col-md-11 mt-2 mb-2" style="width: 100%;">
                                        <div class="input-group d-flex justify-content-between align-items-center" style="width: 100%;">
                                        
                                            <select name="countrySelect" id="countrySelect" class="form-select country-select w-50" required>
                                                <option value="">Select your Phone</option>@foreach ($countriesPhone as $key => $country)
                                                    <option value="{{ $key }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                           
                                            <input  class="form-control w-50" required name="phone" id="phone" type="text" placeholder="e.g +92XXXXXXXXXX" style="border: 1px solid #ddd; height: 44px; box-shadow: none;">
                                        </div>
                                    </div>

                                    <label  class="mini-heading" for="" style=" color:#42b979;"><strong> {{ __('messages.Password') }} <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>

                                    <input required type="email" name="c_email" placeholder="{{ __('messages.Email') }}" class="inp-1 d-none" readonly >

                                    <input required type="password" name="password" placeholder="{{ __('messages.Password') }}"  class="inp-1"style=" display: flex; width: 100%;">
                                    <input required type="password" name="c_password" placeholder="{{ __('messages.Confirm Password') }}"  class="inp-1" style=" display: flex; width: 100%;">
                                </div>
                        
                            
                    
                    
                        </div>


                        <!-- page-3 -->
                        
                        <div class="col-12 d-none px-4" id="page-3" style="text-align:left;">
                            
                            <div class="col-12 px-2 py-2">
                                <label class="mini-heading" for="curriculum" class="form-label" style="color:#42b979;"><strong>{{ __('messages.Description (Optional)') }}</strong></label>
                                <textarea class="form-control" id="curriculum" name="description" rows="2" placeholder="{{ __('messages.Description') }}" style="box-shadow: none;border: 1px solid #aaa;"></textarea>
                            </div> 
                              
                        </div>

                    </div>

                    <div class="col-12 my-3 d-flex justify-content-end px-5 mb-2">

                        <input onclick="backStep(this)" id="back-btn" type="button" value="{{ __('messages.Previous') }}"
                            class="border-0 bg-body-secondary text-dark fs-6 py-1 px-4 me-2 rounded d-none">
                        <input onclick="NextStep(this)" id="next-btn" type="button" value="{{ __('messages.Next') }}"
                            class="border-0 bg_theme_green text-light fs-6 py-1 px-4 rounded">
                            
                    </div>
                        
                        <!-- page-4 -->
                        
                </form>


            </div>
        </div>
    </main>
    <script src="{{ asset('js/hire_tutor.js') }}"></script>
</body>
@endsection
@section('js')<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                const mediaRecorder = new MediaRecorder(stream);
                let chunks = [];

                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                        chunks.push(event.data);
                    }
                };

                mediaRecorder.onstop = () => {
                    const blob = new Blob(chunks, { type: "video/mp4" });
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
    let currentStep = 1;

    // Handle Next Button Click
    document.getElementById('next-btn').addEventListener('click', function () {
        if (validateForm(currentStep)) {
            showNextStep();
        }
    });

    // Handle Back Button Click
    document.getElementById('back-btn').addEventListener('click', function () {
        showPreviousStep();
    });

    // Show next page
    function showNextStep() {
        document.getElementById(`page-${currentStep}`).classList.add('d-none');
        currentStep++;
        document.getElementById(`page-${currentStep}`).classList.remove('d-none');
        updateButtons();
    }

    // Show previous page
    function showPreviousStep() {
        document.getElementById(`page-${currentStep}`).classList.add('d-none');
        currentStep--;
        document.getElementById(`page-${currentStep}`).classList.remove('d-none');
        updateButtons();
    }

    // Show/hide buttons based on current step
    function updateButtons() {
        const backBtn = document.getElementById('back-btn');
        const nextBtn = document.getElementById('next-btn');

        backBtn.classList.toggle('d-none', currentStep === 1);
        nextBtn.value = currentStep === 3 ? 'Submit' : 'Next';

        if (currentStep === 3) {
            nextBtn.addEventListener('click', () => {
                document.querySelector('.pages').submit();
            }, { once: true });
        }
    }

    // Validate based on current step
    function validateForm(step) {
        let isValid = true;
        let missingFields = [];
        if (step === 1) {
        const fieldConfigs = [
            { id: 'school_class', label: 'Status' },
            { id: 'subject', label: 'Subject' }
        ];

    fieldConfigs.forEach(({ id, label }) => {
        const el = document.getElementById(id);
        if (!el || !el.value.trim()) {
            el.style.border = '2px solid #e74c3c';
            isValid = false;
            missingFields.push(label);
        } else {
            el.style.border = '1px solid rgb(137, 135, 135)';
        }
    });

    // Check if any tutor type (radio) is selected
    const subjectRadios = document.querySelectorAll('input[name="subjects"]');
    if (![...subjectRadios].some(r => r.checked)) {
        isValid = false;
        Swal.fire({
            icon: 'error',
            title: 'Please select a tutor type',
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    }

    if (missingFields.length > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Please fill all required fields',
            text: `Missing: ${missingFields.join(', ')}`,
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    }
}

        if (step === 2) {
            const fieldIds = ['name', 'email', 'country', 'city', 'countrySelect', 'phone', 'password', 'c_password'];
            fieldIds.forEach(id => {
                const el = document.querySelector(`[name="${id}"]`);
                if (!el || !el.value.trim()) {
                    el.style.border = '2px solid #e74c3c';
                    isValid = false;
                    missingFields.push(id);
                } else {
                    el.style.border = '1px solid rgb(137, 135, 135)';
                }
            });

            const pwd = document.querySelector('[name="password"]');
            const cpwd = document.querySelector('[name="c_password"]');
            if (pwd && cpwd && pwd.value !== cpwd.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords do not match!',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
                isValid = false;
            }

            if (missingFields.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Please fill all required fields',
                    text: `Missing: ${missingFields.join(', ')}`,
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
            }
        }

        return isValid;
    }

    // Initialize button state on page load
    document.addEventListener('DOMContentLoaded', updateButtons);
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
        $(document).ready(function() {
            $('#country').select2();
            $('#city').select2();
            $('#school_class').select2();
            $('#country').on('change', function() {
                
            
                var countryCode = $(this).val();
                var $citySelect = $('#city');

                if (countryCode) {
                    $.ajax({
                        url: '{{ route('cities') }}',
                        type: 'GET',
                        data: { country: countryCode },
                        success: function(data) {
                            console.log(data)
                            $citySelect.empty();
                            $citySelect.append('<option value="">Select City</option>');
                            $.each(data, function(index, city) {
                                $citySelect.append('<option value="' + city + '">' + city + '</option>');
                            });
                        },
                        error: function() {
                            
                            $citySelect.append('<option value="">No cities available</option>');
                        }
                    });
                } else {
                    
                    $citySelect.append('<option value="">Select City</option>');
                }
            });
        });
    </script>
<script>
    $('#subject').select2({
            placeholder: "Select a subject",
            allowClear: false,
            tags: true,
            dropdownCssClass: 'subject-custom-select2-templates-lang',
            selectionCssClass: 'subject-custom-select2-templates-lang',

        }); 
     $(document).ready(function($) {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            })
            $(document).ready(function() {
            $('#school_class').on('change', function() {
                var schoolClassId = $(this).val();
                if(schoolClassId) {
                    $.ajax({
                        url: '/subjects/' + schoolClassId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('#subject').append('<option value="">Select Subject</option>');
                            $.each(data, function(key, value) {
                                $('#subject').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#subject').append('<option value="">Select Subject</option>');
                }
            });
        });
        $(document).ready(function() {
      // Initialize Select2
            $('#countrySelect').select2();

            const defaultCountry = 'US';
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
      
    function toggleDropdown() {
        document.querySelector('.custom-options').classList.toggle('open');
    }

    function changeLanguage(value) {
        document.querySelector('.custom-options').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select')) {
            document.querySelector('.custom-options').classList.remove('open');
        }
    });
    function toggleDropdownWeb() {
        document.querySelector('.custom-options-web').classList.toggle('open');
    }

    function changeLanguageWeb(value) {
        document.querySelector('.custom-options-web').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select-web')) {
            document.querySelector('.custom-options-web').classList.remove('open');
        }
    });
    function changeLanguage(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
    function changeLanguageWeb(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
</script>
@endsection