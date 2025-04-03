@extends('layouts.app')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Hired tutor Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<style>
   #allModal {
            display: none !important;
        }
        #page-2 {
            height:300px;
            overflow-y:scroll;
        }
        /* Target the entire scrollbar */
            ::-webkit-scrollbar {
            width: 4px; /* Adjust the width */
            }

            /* Target the scrollbar track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Color of the track */
            }

            /* Target the scrollbar thumb */
            ::-webkit-scrollbar-thumb {
            background: #42b979; /* Color of the thumb */
            border-radius: 6px; /* Rounded corners */
            }

            /* Target the scrollbar thumb on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #42b979; /* Color when hovering */
            }

    /* .select2-container--default .select2-selection--single {
            height:35px !important;
        } */
        main{
    background: url(./images/bg_image_1.png), #f1f1f1a0;
    background-blend-mode: screen;
}
    footer{
        background-color: #42b979;
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
                <form action="{{ route('student-create') }}" method="POST" class="pages">
                    @csrf
                    <div style="min-height: 325px;">


                        <!-- page-1 -->
                        <div class="col " id="page-1">
                            <h3 class="heading-box pt-3" style="padding:0 30px; text-align: left; font-size:16px;color:#42b979;"><strong>{{ __('messages.What are you looking for?') }}</strong></h3>
                            <div class="choice col-12 px-3 py-1" >

                                <ul class="p-0 ">
                                    <li class="d-flex align-items-center fs-5 py-1">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Online Tutor" name="subjects"
                                            id="option-1">
                                        <label for="option-1" style="font-size:15px;">{{ __('messages.Online Tutor ') }}</label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-1">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Tutor for home" name="subjects"
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
                                    <label for="dropdown1" class="mini-heading pb-1">
                                        <strong style="color:#42b979;">{{ __('messages.Select your Grade') }} <b style="color: red;
                                         font-size: 20px;">*</b></strong>
                                   </label>
                                <select class="form-control" id="school_class" name="school_class" style="height:50px;">>
                                    @foreach($schoolClasses as $schoolClass)
                                    <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                                    @endforeach
                    
                                </select>
                            </div>
                            
                            <div class="form-group d-none" >
                           
                                <input type="search" value="English" name="subject" class="form-control" id="page1-search" placeholder="Search" style="height:50px;">
                            </div>
                            <ul class="list-group d-none" id="searchList">
                                <li onclick="page1List(this)" class="list-group-item text-start">English</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Mathematics</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Physics</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Chemistry</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Urdu</li>
                            </ul>
                            
                            <div class="mx-4" style="text-align: left; width:90%; ">
                                <!-- <select id="subject" name="subject" class="select form-control">
                                    <option value="">Select Subject</option>
                                </select> -->
                                <label  class="mini-heading" for="" style="padding: 5px; color:42b979;"><strong>{{ __('messages.Subject') }}<b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                   <input type="text" placeholder="{{ __('messages.Subject') }}" id="inputPassword4" class="form-control py-3" style="height: 53px;">
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
                                <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Name') }} <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                <input required name="name" type="text" placeholder="{{ __('messages.Name') }}"  class="inp-1" style="width:100%;">

                                <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Email') }}<b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                <input required name="email" type="email" placeholder="{{ __('messages.Email') }}"  class="inp-1" style="width:100%;">

                                <!-- <div class="row"> -->
                                <label class="mini-heading" for="" style="color:#42b979;"><strong>{{ __('messages.Mobile Number') }} <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <div class="col-md-11 mt-2 mb-2" style="width: 100%;">
                                        <div class="input-group d-flex justify-content-between align-items-center" style="width: 100%;">
                                        
                                            <select name="countrySelect" id="countrySelect" class="form-select country-select w-50" required>
                                                @foreach ($countriesPhone as $key => $country)
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
                                <textarea class="form-control" id="curriculum" name="reviews" rows="2" placeholder="{{ __('messages.Description') }}" style="box-shadow: none;border: 1px solid #aaa;"></textarea>
                            </div>  
                        </div>

                    </div>

                    <div class="col-12 my-5 d-flex justify-content-center px-5 " style="margin-bottom: 1rem !important;">

                        <input onclick="backStep(this)" id="back-btn" type="button" value="{{ __('messages.Previous') }}"
                            class="border-0 bg-body-secondary text-dark fs-6 py-1 px-4 rounded d-none">
                        <input onclick="NextStep(this)" id="next-btn" type="button" value="{{ __('messages.Next') }}"
                            class="border-0 bg_theme_green text-light fs-6 py-1 px-4 rounded">
                            
                    </div>
                        
                        <!-- page-4 -->
                        
                </form>


            </div>
        </div>
    </main>
    <script src="./js/hire_tutor.js"></script>
</body>
@endsection
@section('js')
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
    </script><script>// Disable Right Click
    document.addEventListener("contextmenu", (event) => event.preventDefault());
    
    // Disable Keyboard Shortcuts
    document.addEventListener("keydown", function (event) {
        if (
            event.ctrlKey && 
            (event.key === "u" || event.key === "U" ||  // View Source
             event.key === "s" || event.key === "S" ||  // Save Page
             event.key === "i" || event.key === "I" ||  // DevTools
             event.key === "j" || event.key === "J" ||  // Console
             event.key === "c" || event.key === "C")    // Copy
        ) {
            event.preventDefault();
        }
    
        // Disable F12
        if (event.key === "F12") {
            event.preventDefault();
        }
    });
    
    // Block Developer Console (Anti Debugging)
    (function() {
        let openConsole = false;
        setInterval(() => {
            console.profile();
            console.profileEnd();
            if (console.clear) console.clear();
            if (openConsole) {
                document.body.innerHTML = "";
                alert("Developer tools are disabled!");
                window.location.reload();
            }
        }, 1000);
        Object.defineProperty(console, 'profile', {
            get: function() {
                openConsole = true;
                throw new Error("Console is disabled!");
            }
        });
    })();  </script>
<script>

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
                            $('#subject').empty();
                            $('#subject').append('<option value="">Select Subject</option>');
                            $.each(data, function(key, value) {
                                $('#subject').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#subject').empty();
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