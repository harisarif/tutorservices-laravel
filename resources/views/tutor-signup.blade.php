
@extends('layouts.app')

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" crossorigin="anonymous" /> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        #allModal {
            display: none !important;
        }
        main {
            background: url(./images/bg_image_1.png), #000000a0;
            background-blend-mode: screen;
        }
        .select2-container {
            width: 260px !important;
        }
        .iti__selected-flag {
            top: 6px;
            height: 33px !important;
            border-radius: 4px;
            transition: .3s;
        }
        /* input#phone {
            padding-left: 47px !important;
              top: 6px;
        }   */
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

    <main class="container-fluid m-0 bg-body-secondary p-0">
        <header class="text-center bg-light m-0 p-2 d-flex align-items-end justify-content-center">
            <!-- <a class="nav-link active  px-3" aria-current="page" href="./hire_tutor.html"><i> &#8592; Hire Tutor</i></a> -->
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="{{ asset('images/logo.png') }}" alt="EDEXCEL-logo"
                    height="50px"></a>

        </header>
        <div class="d-flex justify-content-center">
            <form class="bg-light rounded shadow p-3" method="POST" action="{{ route('tutor-create') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <label for="f_name" class="form-label">First Name</label> <span class="text-danger fs-4">*</span>
                        <input type="text" class="form-control" id="f_name" name="f_name" required />
                    </div>
                    <div class="col-md-6 px-2 mb-2">
                        <label for="l_name" class="form-label">Last Name</label> <span class="text-danger fs-4">*</span>
                        <input type="text" class="form-control" id="l_name" name="l_name" required />
                    </div>
                </div>
                {{--            <div class="form-row d-flex flex-column flex-md-row"> --}}
                {{--                <div class="col-md-6 px-2 mb-2"> --}}
                {{--                    <label for="name" class="form-label">Set passward</label> --}}
                {{--                    <input type="password" class="form-control" id="passward" required /> --}}
                {{--                </div> --}}
                {{--                <div class="col-md-6 px-2 mb-2"> --}}
                {{--                    <label for="name" class="form-label">Confirm passward</label> --}}
                {{--                    <input type="password" class="form-control" id="passward" required /> --}}

                {{--                </div> --}}
                {{--            </div> --}}

                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <label for="email" class="form-label">Email</label> <span class="text-danger fs-4">*</span>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>
                    <div class="col-md-6 px-2 mb-2">
                        <label for="gender" class="form-label">Gender</label> <span class="text-danger fs-4">*</span>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <div class="form-group">
                            <label for="dob" class="form-label">DOB <span class="text-danger fs-4">*</span></label>
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" id="date" name="dob" placeholder="Date of Birth" required />
                                <div class="input-group-append">
                                    <span class="input-group-text bg-light d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-2 mb-2">
                        <label for="qualification" class="form-label">Recent Degree</label> <span class="text-danger fs-4">*</span>
                        <input type="text" class="form-control" id="qualification" name="qualification" required />
                    </div>
                </div>

                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <label for="teaching" class="form-label">Teaches</label> <span class="text-danger fs-4">*</span><br>
                        <select class="form-select teaching" id="teaching" name="teaching[]" required>
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
                        <label for="experience" class="form-label">Experience (in years)</label> <span class="text-danger fs-4">*</span>
                        <input type="number" min="0" class="form-control" id="experience" name="experience"
                            required />
                    </div>
                </div>
                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-12 px-2 mb-2">
                        <label for="location" class="form-label">Residence Country</label> <span class="text-danger fs-4">*</span>
                    </br>
                        <select class="form-select" id="location" required name="location">
                            <option value="AE">United Arab Emirates</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="IN">India</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                        </select>
                        {{-- <input type="text" class="form-control" id="location" name="location" required /> --}}
                    </div>
                </div>
                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-12 px-2 mb-2">
                        <label for="mobile" class="form-label">City</label> <span class="text-danger fs-4">*</span>
                        <input type="text" class="form-control" id="city" name="city" required />
                    </div>
                </div>
                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <label for="mobile" class="form-label">Mobile Number</label> <span class="text-danger fs-4">*</span>
                        {{-- <input type="number" class="form-control" id="phone" name="phone" required /> --}}
                        <div class="input-group d-flex justify-content-between align-items-center">
                            
                            {{-- <span class="input-group-text">+1</span> <!-- Replace +1 with the desired country code --> --}}
                            <select name="countrySelect" id="countrySelect" class="form-select w-50" required>
                                @foreach ($countries as $key => $country)
                                    <option value="{{ $key }}">{{ $country }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control w-50" id="phone" name="phone" placeholder="e.g +92XXXXXXXXXX" required />
                        </div>
                    </div>
                    <div class="col-md-6 px-2 mb-2">
                        <label for="whatsapp" class="form-label">WhatsApp Number</label> <span class="text-danger fs-4">*</span>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="e.g +92XXXXXXXXXX" required />
                    </div>
                </div>

                <div class="form-row d-flex flex-column flex-md-row">
                    <div class="col-md-6 px-2 mb-2">
                        <label for="profilePicture" class="form-label">Profile Picture</label> <span class="text-danger fs-4">*</span>
                        <input type="file" class="form-control" id="profilePicture" required
                            name="profileImage" />


                    </div>
                    <div class="col-md-6 px-2 mb-2">
                        <label for="teaching" class="form-label">Available Time</label> <span class="text-danger fs-4">*</span>
                        <select class="form-select" id="teaching" required name="availability">
                            <option selected>Select Time</option>
                            <option value="9:00AM to 10:00AM">9:00AM to 10:00AM</option>
                            <option value="10:00AM to 11:00AM">10:00AM to 11:00AM</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 px-2 py-2"><label for="curriculum" class="form-label">Description (Optional)</label>
                    <textarea class="form-control" id="curriculum" name="curriculum[]" rows="2" placeholder="Add comma after one"></textarea>
                </div>

                <div class="col d-flex justify-content-center py-3">
                    <button type="submit" class="btn bg_theme_green text-light fw-bold">Submit Form</button>
                </div>

            </form>
        </div>
    </main>
</body>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js'></script> --}}
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.teaching').select2({
          multiple: true
        });
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
    
</script>
{{-- <script>
    // International telephone format
    // $("#phone").intlTelInput();
    // get the country data from the plugin
    var countryData = window.intlTelInputGlobals.getCountryData(),
      input = document.querySelector("#phone"),
      addressDropdown = document.querySelector("#country");
    
    // init plugin
    var iti = window.intlTelInput(input, {
      hiddenInput: "full_phone",
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // just for formatting/placeholders etc
    });
    
    // populate the country dropdown
    for (var i = 0; i < countryData.length; i++) {
      var country = countryData[i];
      var optionNode = document.createElement("option");
      optionNode.value = country.iso2;
      var textNode = document.createTextNode(country.name);
      optionNode.appendChild(textNode);
      addressDropdown.appendChild(optionNode);
    }
    // set it's initial value
    addressDropdown.value = iti.getSelectedCountryData().iso2;
    
    // listen to the telephone input for changes
    input.addEventListener('countrychange', function(e) {
      addressDropdown.value = iti.getSelectedCountryData().iso2;
    });
    
    // listen to the address dropdown for changes
    addressDropdown.addEventListener('change', function() {
      iti.setCountry(this.value);
    });
    </script>
    <script>
    //Append Value To Phone Field
    $("#phone").prop('value', '+1');

    // Listen to changes in the input field for updating the country code
    input.addEventListener('countrychange', function(e) {
        var countryCode = iti.getSelectedCountryData().dialCode;
        // Update the country code prefix in the input field
        updateCountryCodePrefix(countryCode);
    });

    // Prevent users from deleting the country code prefix
    input.addEventListener('input', function(e) {
        var countryCode = iti.getSelectedCountryData().dialCode;
        var inputValue = input.value;

        // Check if the input value starts with the country code prefix
        if (!inputValue.startsWith("+" + countryCode)) {
            // If not, update the input value with the country code prefix
            updateCountryCodePrefix(countryCode);
        }
    });

    // Function to update the input value with the country code prefix
    function updateCountryCodePrefix(countryCode) {
        // Check if the input value is empty or doesn't start with the country code prefix
        if (!input.value || !input.value.startsWith("+" + countryCode)) {
            // Update the input value with the country code prefix
            input.value = "+" + countryCode;
        }
    }
</script> --}}

<script>
    const country = document.querySelector('#countrySelect');
    const userNumber = document.querySelector('#phone');

    let countryValue;

    country.addEventListener('change', () => {
        countryValue = country.value;
        userNumber.value = @json($countries_prefix)[countryValue];
    });

    userNumber.addEventListener('input', () => {
        if (userNumber.value.length > @json($countries_number_length)[countryValue]) {
            userNumber.value = userNumber.value.slice(0, @json($countries_number_length)[countryValue]);
        }
    });
</script>

@endsection