
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
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff !important;
        }
        #allModal {
            display: none !important;
        }
        main {
            background: url(./images/bg_image_1.png), #000000a0;
            background-blend-mode: screen;
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
        <div class="row">
            <div class="col-lg-6">
                <div class="image-div">
                    <img src="mountain.jpg" alt="">
                </div>
            </div>
        </div>    
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