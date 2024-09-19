 
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
        .main-footer{
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
        .form-label{
            display: flex;
            text-align: justify;
        }
        .date-picker-label{
            display: flex;
            text-align: justify;
            align-items: center;
        }
        main{
            background: url(./images/bg_image_1.png), #f1f1f1a0;
            background-blend-mode: screen;
            height: 110vh;
        }
        .step-form-heading h2{
            color: #42b979;
        }
        SELECT{
          padding: 5px;
          border: none;
        }
        .ad-dob{
            border: 1px solid #ddd;
            padding: 3px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
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
            <header class="main_header d-flex bg-white  py-2 align-items-end justify-content-center">  
                <a class="arrow" href="https://edexceledu.com">
                <img style="height: 50px" src="/images/logo.png" alt="EDEXCEL-logo" height="50px">
                </a>
            </header>
            <div class="main-page col-12 bg-white col-md-6 mx-auto p-0 text-center my-2">
                        <div class="step-form-heading col py-2 bg-success text-center flex-column rounded-top bg-body-secondary">
                            <h2 class="text-center my-2">Register Now Two Steps Away from Joining</h2>
                            <div class="ad-heading">
                                    <h3 style="text-align: center;color: red; padding: 10px; font-size: 15px;"><b><i>Please fill all mandatory fields</i></b></h3>
                            </div>
                        </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-sm-4">
                        <div class="col-12 d-flex justify-content-center py-3 border-bottom">
                            <b class="theme_text_green px-2 persentage-num">33%</b>
                            <div class="loading bg-body-secondary my-2">
                                <div class="percentage bg_theme_green"></div>
                            </div>
                        </div>
                        
                        <form id="tutorForm"  class="p-3 pages" method="POST" action="{{ route('tutor-create') }}" enctype="multipart/form-data" >
                            @csrf
                            <div>
                                <div id="page-1">
                                    <div class="form-group d-none" >
                           
                                     <input type="search" value="English" name="subject" class="form-control" id="page1-search" placeholder="Search" style="height:50px;">
                                </div>
                                    <div class="form-row d-flex flex-column flex-md-row">
                                        
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="f_name" class="form-label" style="color:#42b979;"><strong>First Name  <span class="text-danger fs-4" style="color:#42b979; ">*</span></strong></label>
                                            <input type="text" class="form-control" id="f_name" name="f_name"   style="box-shadow: none;border: 1px solid #aaa;">
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="l_name" class="form-label" style="color:#42b979;"><strong>Last Name <span class="text-danger fs-4">*</span></strong></label> 
                                            <input type="text" class="form-control" id="l_name" name="l_name"    style="box-shadow: none;border: 1px solid #aaa;">
                                        </div>
                                    </div>
                                    <div class="form-row d-flex flex-column flex-md-row">
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="email" class="form-label" style="color:#42b979;"><strong>Email <span class="text-danger fs-4">*</span></strong></label> 
                                            <input type="email" class="form-control" id="email" name="email"   style="box-shadow: none;border: 1px solid #aaa;">
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                                <label for="" class="form-label" style=" color:#42b979;"><strong> Password <b style="color: red;
                                                font-size: 20px;">*</b></strong></label>
                                                <input required type="password" name="password" placeholder="*Password"  class="inp-1"style=" display: flex; width: 100%; flex-direction: column;border-radius: 5px;padding: 6px 8px;margin: 7px 0px;border: 1px solid #aaa" >
                                        </div>
                                        <div class="col-md-6 px-2 mb-2" >
                                            <label for="mobile" class="form-label" style="color:#42b979;"><strong>Mobile Number <span class="text-danger fs-4">*</span></strong></label> 
                                            <div class="input-group d-flex justify-content-between align-items-center" style="width: 99%">
                                                <select name="countrySelect" id="countrySelect" class="form-select country-select w-50"  >
                                                    @foreach ($countriesPhone as $key => $country)
                                                        <option value="{{ $key }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control w-50" id="phone" name="phone" placeholder="e.g +92XXXXXXXXXX"   style="box-shadow: none;border: 1px solid #aaa;">
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="gender" class="form-label" style="color:#42b979;"><strong>Gender  <span class="text-danger fs-4">*</span></strong></label>
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
                                                <div class="ad-dob">
                                                    <SELECT id ="year" name = "yyyy" onchange="change_year(this)">
                                                    </SELECT>
                                                    <SELECT  id ="month" name = "mm" onchange="change_month(this)">
                                                    </SELECT>
                                                    <SELECT id ="day" name = "dd" >
                                                    </SELECT> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                        
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="profilePicture" class="form-label" style="color:#42b979;"><strong>Profile Picture <span class="text-danger fs-4">*</span></strong></label> 
                                            <input type="file" class="form-control" id="profilePicture"  
                                                name="profileImage" style="box-shadow: none;">


                                        </div>
                                    </div>
                                </div>
                                <div class="d-none" id="page-2">
                                

                                    <div class="form-row d-flex flex-column flex-md-row">
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="qualification" class="form-label" style="color:#42b979;"><strong>Highest Qualifications <span class="text-danger fs-4">*</span></strong></label>
                                            <select class="form-control" id="school_class" name="school_class">

                                            @foreach($schoolClasses as $schoolClass)
                                            <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                                            @endforeach
                                            <option value="">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                                <label for="profilePicture" class="form-label" style="color:#42b979;"><strong>Add your qualification ducoment <span class="text-danger fs-4">*</span></strong></label> 
                                                <input type="file" class="form-control" id="profilePicture"  
                                                name="profileImage" style="box-shadow: none;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="qualification" class="form-label" style="color:#42b979;"><strong>Courses teaching <span class="text-danger fs-4">*</span></strong></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="teaching" class="form-label" style="color:#42b979;"><strong>Subject You Can Teaching <span class="text-danger fs-4">*</span></strong></label>
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
                                        <div class="col-md-6">
                                             <label for="teaching" class="form-label" style="color:#42b979;"><strong>Language Proifient<span class="text-danger fs-4">*</span></strong></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6">
                                             <label for="teaching" class="form-label" style="color:#42b979;"><strong>Language teaching <span class="text-danger fs-4">*</span></strong></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="other_qualification_input" class="form-label" style="color:#42b979;"><strong>Technology Teaching</strong><span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="other_qualification_input" class="form-label" style="color:#42b979;"><strong>Islamic teaching</strong><span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control" id="other_qualification_input" name="other_qualification_input" />
                                        </div>
                                        <div class="col-md-6 px-2 mb-2">
                                            <label for="experience" class="form-label" style="color:#42b979;"><strong>Experience (in teaching)  <span class="text-danger fs-4">*</span></strong></label>
                                            <input type="number" min="0" class="form-control" id="experience" name="experience"
                                                style="box-shadow: none;border: 1px solid #aaa;">
                                        </div>
                                        <div class="choice col-6">
                                             <label for="experience" class="form-label" style="color:#42b979;"><strong>How We Can Help<span class="text-danger fs-4">*</span></strong></label>
                                            <select class="form-select" aria-label="Default select example" style="width: 100% !important;">
                                                <option value="Online" selected>Online</option>
                                                <option value="Physical">Physical</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>   
                                    </div>
                                    <div class="form-row d-flex flex-column flex-md-row">
                                        
                                        <div class="col-md-6 px-2 mb-2 d-none">
                                            <label for="whatsapp" class="form-label" style="color:#42b979;"><strong>WhatsApp Number  <span class="text-danger fs-4">*</span></strong></label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="e.g +92XXXXXXXXXX"   style="box-shadow: none;border: 1px solid #aaa;">
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="d-none" id="page-3">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="location" class="form-label " style="color:#42b979;"><strong>Country Residence <span class="text-danger fs-4" style="color:#42b979;">*</span></strong></label>
                                                <select name="location" id="location" class="form-select " required style="margin: 0 auto !important; width: 100%; height: 50px;">
                                                        <option value="" class="text-justify">Select Country</option>
                                                            @foreach($countries as $code => $country)
                                                                <option value="{{ $code }}">{{ $country }}</option>
                                                            @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 px-2 mb-2">
                                                <label for="city" class="form-label" style="color:#42b979;"><strong>City <span class="text-danger fs-4">*</span></strong></label> 
                                                <select name="city" id="city" class="form-select" required >
                                                    <option value="" style="color:#42b979;"><strong>Select City</strong></option>
                                                </select>
                                            </div>
                                        </div>
                                    <input required type="email" name="c_email" placeholder="*Email" class="inp-1 d-none" readonly >

                                    <div class="form-row d-flex flex-column flex-md-row">
                                        
                                        <div class="col-md-12 px-2 mb-2">
                                            <label for="teaching" class="form-label" style="color:#42b979;"><strong>Available Time <span class="text-danger fs-4">*</span></strong></label> 
                                            <select class="form-select" id="teaching"   name="availability">
                                                <option selected>Select Time</option>
                                                <option value="9:00AM to 10:00AM">9:00AM to 10:00AM</option>
                                                <option value="10:00AM to 11:00AM">10:00AM to 11:00AM</option>
                                                <option value="10:00AM to 11:00AM">12:00pm to 1:00pm</option>
                                                <option value="10:00AM to 11:00AM">5:00pm to 6:00pm</option>
                                                <option value="10:00AM to 11:00AM">7:00pm to 8:00pm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 px-2 py-2"><label for="curriculum" class="form-label" style="color:#42b979;"><strong>Description (Optional)</strong></label>
                                        <textarea class="form-control" id="curriculum" name="curriculum[]" rows="2" placeholder="Add comma after one" style="box-shadow: none;border: 1px solid #aaa;"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 my-2 d-flex justify-content-center px-5 " style="margin-bottom: 1rem !important;  ">

                                <input onclick="backStep(this)" id="back-btn" type="button" value="Previous"
                                    class="border-0 bg-body-secondary text-dark fs-6 py-1 px-4 rounded d-none">
                                <input onclick="NextStep(this)" id="next-btn" type="button" value="Next"
                                    class="border-0 bg_theme_green text-light fs-6 py-1 px-4 rounded">
                                    
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
// date of birth\
var Days = [31,28,31,30,31,30,31,31,30,31,30,31];// index => month [0-11]
$(document).ready(function(){
    var option = '<option value="day">day</option>';
    var selectedDay="day";
    for (var i=1;i <= Days[0];i++){ //add option days
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $('#day').append(option);
    $('#day').val(selectedDay);

    var option = '<option value="month">month</option>';
    var selectedMon ="month";
    for (var i=1;i <= 12;i++){
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $('#month').append(option);
    $('#month').val(selectedMon);

    var option = '<option value="month">month</option>';
    var selectedMon ="month";
    for (var i=1;i <= 12;i++){
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $('#month2').append(option);
    $('#month2').val(selectedMon);
  
    var d = new Date();
    var option = '<option value="year">year</option>';
    selectedYear ="year";
    for (var i=1970;i <= (d.getFullYear() + 10);i++){// years start i
        option += '<option value="'+ i + '">' + i + '</option>';
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

function change_year(select)
{
    if( isLeapYear( $(select).val() ) )
	  {
		    Days[1] = 29;
		    
    }
    else {
        Days[1] = 28;
    }
    if( $("#month").val() == 2)
		    {
			       var day = $('#day');
			       var val = $(day).val();
			       $(day).empty();
			       var option = '<option value="day">day</option>';
			       for (var i=1;i <= Days[1];i++){ //add option days
				         option += '<option value="'+ i + '">' + i + '</option>';
             }
			       $(day).append(option);
			       if( val > Days[ month ] )
			       {
				          val = 1;
			       }
			       $(day).val(val);
		     }
  } 
</script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@endsection