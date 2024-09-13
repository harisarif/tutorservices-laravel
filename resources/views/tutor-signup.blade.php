
@extends('layouts.app')
<!-- aos animation link -->


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #42B979 !important; 
            color: #fff;
            margin-top: 0px !important;
        }
        footer{
            background-color: #42b979;
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
          outline: none;
        }
        .iti--allow-dropdown .iti__flag-container:hover .iti__selected-flag {
            background-color: rgba(0, 0, 0, 0.05);
        }  
        .iti--allow-dropdown input{
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
                    .select2-container{
                        width: 100% !important;
                    }
                }
        /* .select2-container{
            } */
       
        .input-group{
            #countrySelect{
                width: 21% !important;
            }
            .select2-container{
               width: 100px !important;
            }
        }
        .selection{
            .select2-selection{
                height: 38px !important;
            }
        }
        @media(min-width: 322px) and (max-width: 766px){
            .select2-container{
            .select2-dropdown{
                width: 330px !important;
             
            }
        }
        }
        @media (max-width: 425px) {
            .select2-container{
            .select2-dropdown{
                width: 283px !important;
             
            }
        }
        form{
            width: 100%;
        }
        .input-group{
            width: 100%;
        }
        }
        @media(min-width: 767px) and (max-width: 1441px){
            .select2-container{
            .select2-dropdown{
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

        .date-picker-input{
            width: 100%;
            padding: 6px 12px;
            border-radius: 6px;
            outline: none;
            border: 1px solid #dee2e6;

        }
        .date-picker-label{
            margin-bottom: 7px !important;
        }
        .alert-danger{
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
        .row{
            --bs-gutter-x: 0rem !important;
            justify-content: space-between;
        }
        .ad-heading h2{
            color: #42b979;
        }
        .ad-sign{
            background: #42b979;
        }
    </style>

@if ($errors->any())
        <div class="alert alert-danger" id="close" style="">
            <ul style="margin: 0; padding: 10px 0;">
                @foreach ($errors->all() as $error)
                    <li style="display:flex; justify-content: space-between; align-items: center;">{{ $error }}  <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true"></i></li> 
                    
                @endforeach
            </ul>
        </div>
    @endif
    @section('content')
    <body>
        <main>
            <div class="">
                <div class="row" style="border-bottom: 1px solid #ddd;">
                    <div class="col-lg-6 ad-sign">
                        <h2 class="text-white fw-bold pb-2 fs-1 border-bottom">Register Yourself</h2>
                        <ul>
                            <li class="text-white py-1">Join us today and unlock your potential!</li>
                            <li class="text-white py-1">Don’t miss out—register now and take the first step towards success</li>
                            <li class="text-white py-1">Sign up and start your journey to greatness</li>
                            <li class="text-white py-1">Your future starts here. Register today</li>
                            <li class="text-white py-1">Success is one click away. Register and thrive</li>
                            <li class="text-white py-1">Your next big adventure starts here—register today</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <form class="p-3" method="POST" action="{{ route('tutor-create') }}"
                            enctype="multipart/form-data" >
                            @csrf
                            <div class="ad-heading">
                                <h2 class="fs-4 text-center fw-bold">Fill a form to sign-up yourself</h2>
                                    <h3  style="text-align: center;color: red; padding: 10px; font-size: 15px;"><b><i>Please fill all mandatory fields</i></b></h3>
                            </div>
                            <div class="form-row d-flex flex-column flex-md-row">
                                
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="f_name" class="form-label" style="color:#42b979;"><strong>First Name</strong></label> <span class="text-danger fs-4" style="color:#42b979;">*</span>
                                    <input type="text" class="form-control" id="f_name" name="f_name"   style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="l_name" class="form-label" style="color:#42b979;"><strong>Last Name</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="text" class="form-control" id="l_name" name="l_name"    style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                            </div>
                        

                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="email" class="form-label" style="color:#42b979;"><strong>Email</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="email" class="form-control" id="email" name="email"   style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="gender" class="form-label" style="color:#42b979;"><strong>Gender</strong></label> <span class="text-danger fs-4">*</span>
                                    <select class="form-select" id="gender" name="gender"  >
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-6 px-2 mb-2">
                                <div class="form-group">
                                        <label for="datePicker" class="date-picker-label" style="color:#42b979;"><strong>DOB </strong><span class="text-danger fs-4"> *</span></label>
                                            <input type="date" id="datePicker" class="date-picker-input" name="dob">
                
                    
                                    </div>


                                </div>
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="qualification" class="form-label" style="color:#42b979;"><strong>Highest Qualifications</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="text" class="form-control" id="qualification" name="qualification"   style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                            </div>

                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="teaching" class="form-label" style="color:#42b979;"><strong>Subject You Can Teach</strong></label> <span class="text-danger fs-4">*</span><br>
                                    <select class="form-select teaching" id="teaching" name="teaching[]"  >
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
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="experience" class="form-label" style="color:#42b979;"><strong>Experience (in teaching)</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="number" min="0" class="form-control" id="experience" name="experience"
                                        style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                                <div class="choice col-6 mx-1">
                                <h3 class=" pt-3" style=" font-size:16px;color:#42b979;"><strong>Services</strong></h3>
                                            <ul class="p-0 d-flex mb-0">
                                                <li class="d-flex align-items-center fs-5 py-1">
                                                    <input class="m-2 d-none chose-subject" type="radio" value="Online Tutor" name="subjects" id="option-1">
                                                    <label for="option-1" style="font-size:15px;">Online</label>
                                                </li>
                                                <li class="d-flex align-items-center fs-5 py-1">
                                                    <input class="m-2 d-none chose-subject" type="radio" value="Tutor for home" name="subjects" id="option-2">
                                                    <label for="option-2" style="font-size:15px;">Physical</label>
                                                </li>
                                                <li class="d-flex align-items-center fs-5 py-1">
                                                    <input class="m-2 d-none chose-subject" type="radio" value="Both" name="subjects" id="option-3">
                                                    <label for="option-3" style="font-size:15px;">Both</label>
                                                </li>
                                            </ul>
                                        </div>
                            </div>
                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="location" class="form-label " style="color:#42b979;"><strong>Country Residence</strong></label> <span class="text-danger fs-4" style="color:#42b979;">*</span>
                                    </br>
                                    <select name="location" id="location" class="form-select" required style="margin: 0 auto !important; width: 92%; height: 50px;">
                                            <option value="">Select Country</option>
                                                @foreach($countries as $code => $country)
                                                    <option value="{{ $code }}">{{ $country }}</option>
                                                @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="city" class="form-label" style="color:#42b979;"><strong>City</strong></label> <span class="text-danger fs-4">*</span>
                                    <!-- <input type="text" class="form-control" id="city" name="city"   style="box-shadow: none;border: 1px solid #aaa;"> -->
                                    <select name="city" id="city" class="form-select" required style="margin: 0 auto !important; width: 92%; height: 43px;">
                                                    <option value="" style="color:#42b979;"><strong>Select City</strong></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-12 px-2 mb-2" >
                                    <label for="mobile" class="form-label" style="color:#42b979;"><strong>Mobile Number</strong></label> <span class="text-danger fs-4">*</span>
                                    <div class="input-group d-flex justify-content-between align-items-center" style="width: 99%">
                                        <select name="countrySelect" id="countrySelect" class="form-select country-select w-50"  >
                                            @foreach ($countriesPhone as $key => $country)
                                                <option value="{{ $key }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control w-50" id="phone" name="phone" placeholder="e.g +92XXXXXXXXXX"   style="box-shadow: none;border: 1px solid #aaa;">
                                    </div>
                                </div>
                                <div class="col-md-6 px-2 mb-2 d-none">
                                    <label for="whatsapp" class="form-label" style="color:#42b979;"><strong>WhatsApp Number</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="e.g +92XXXXXXXXXX"   style="box-shadow: none;border: 1px solid #aaa;">
                                </div>
                            </div>

                            <div class="form-row d-flex flex-column flex-md-row">
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="profilePicture" class="form-label" style="color:#42b979;"><strong>Profile Picture</strong></label> <span class="text-danger fs-4">*</span>
                                    <input type="file" class="form-control" id="profilePicture"  
                                        name="profileImage" style="box-shadow: none;">


                                </div>
                                <div class="col-md-6 px-2 mb-2">
                                    <label for="teaching" class="form-label" style="color:#42b979;"><strong>Available Time</strong></label> <span class="text-danger fs-4">*</span>
                                    <select class="form-select" id="teaching"   name="availability">
                                        <option selected>Select Time</option>
                                        <option value="9:00AM to 10:00AM">9:00AM to 10:00AM</option>
                                        <option value="10:00AM to 11:00AM">10:00AM to 11:00AM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 px-2 py-2"><label for="curriculum" class="form-label" style="color:#42b979;"><strong>Description (Optional)</strong></label>
                                <textarea class="form-control" id="curriculum" name="curriculum[]" rows="2" placeholder="Add comma after one" style="box-shadow: none;border: 1px solid #aaa;"></textarea>
                            </div>

                            <div class="col d-flex justify-content-center py-3">
                                <button type="submit" class="btn bg_theme_green text-light fw-bold">Submit Form</button>
                            </div>

                        </form>
                    </div>
                </div> 
            </div>
        </main>
          
    </body>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#location').select2();
            $('.teaching').select2({
                multiple: true
                });
            // $('#city').select2();
            $('#location').on('change', function() {
                
            
                var countryCode = $(this).val();
                var $citySelect = $('#city');

                if (countryCode) {
                    $.ajax({
                        url: '{{ route('cities') }}',
                        type: 'GET',
                        data: { country: countryCode },
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
    </script>
<script>
    
    $(document).ready(function() {
        // $('.select2').select2();
        // $('.countries').select2();
        // $('#countrySelect').select2();
        
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
    function cancel(){
        var close = document.getElementById("close");
        close.style.display = "none";
    }
</script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@endsection