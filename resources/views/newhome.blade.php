<link rel="stylesheet" href="./css/new-home.css">
@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">
            
            {{ session('success') }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
        </div>
    @endif
    
    <div class="row mini_header m-0 p-0 container-fluid position-relative">
        <div class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">
            <ul class="p-2 m-0 d-sm-inline d-block text-center header-ul">
                <li class=" p-2">
                    <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
                    <a class="text-decoration-none text-light" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
                </li>
             <li>
             <a href="{{ route('hire.tutor') }}" class="hiring-button">
                        Book A demo
                            </a>
             </li>
             <li>
             <!-- <a href="{{ route('hiring-tutor') }}" class="hiring-button">
                        New page
                            </a> -->
             </li>
            </ul>
            <div>
            <!-- <h1>{{ __('messages.welcome') }}</h1> -->
            

                <ul  class="icons d-flex p-2 m-0 justify-content-center align-items-center gap-3" style="list-style:none;">   
                  
                <div>
                    <label class="text-white" style="font-size:12px;">Swtich language from there</label>
                    <select id="language-select" onchange="changeLanguage()">
                        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                    </select>
                    </div>
                    <li class=" p-2 header-phone-number">
                    
                        <i class="fa-solid fa-phone text-light" aria-hidden="true"></i>
                        <a class="text-decoration-none text-light" href="tel:+971566428066">+971 56 642 8066</a>
                    </li>
                </ul>
                <div class="fixed" id="social">
                        <a target="_blank"
                            href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d"
                        >
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a target="_blank"
                            href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a target="_blank" href="https://www.linkedin.com/in/edexcel-edu-130983310/">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                        </a>
                </div>
                {{-- <a href="#" class="btn notify position-relative"><i class="fa-regular fa-bell text-white"></i><span class="position-absolute top-10 start-60 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span></a> --}}
            </div>
        </div>
        <div class="notification mb-2 w-25 p-2 bg-info-subtle position-absolute end-0 top-100 z-1">This is a demo</div>
    </div>
    <div class="wrapper container">
            <!-- WhatsApp Button html start -->
            @include('whatsapp')

            <nav class="navbar navbar-expand-lg">

                <div class="container-fluid">


                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" height="50px" alt="logo" style="height: 50px" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav align-items-md-center">

                    <div class="row nav-item-row">
                        <div class="col-6 ">    
                            <li class="nav-item m-1 btn-an text-center rounded w-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('login') }}">{{__('messages.login')}}</a>
                            </li>
                        </div>
                        <div class="col-6 ">
                            <li class="nav-item m-1 btn-an text-center rounded w-1">
                                <a class="nav-link text-decoration-none solid_btn" href="{{ route('basicsignup') }}">{{__('messages.sign_up')}}</a>
                            </li>
                        </div>
                    </div>
                            <!-- <li class="nav-item">
                                            </li> -->
                        
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- header end -->

            <!-- banner start -->
            <section class="row banner-section">
                <div class="col-12 col-md-6 intro_lines mx-0 my-5">
                    <h1><span>{{__('messages.academy_name')}}</span></h1>
                    <p>
                    {{__('messages.about_us')}}
                    </p>
                    {{-- <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                        Student
                    </button> --}}
                    <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                        <a class="text-light text-decoration-none active solid_btn" aria-current="page"
                            href="{{ route('hire.tutor') }}">{{__('messages.hire_tutor')}}</a>

                    </button>
                </div>
                <div class="col-12 col-md-6 p-0">
                    <div class="image-wrapper">
                        <img src="images/banner-php.jpeg" class="full-img" alt="banner-php" />
                        <!-- <video src="images/banner.mp4" class="object-fit-cover mt-2" autoplay muted loop
                        width="100%" style="width:300px;height:400px;"></video> -->

                    </div>
                </div>
            </section>
            <!--  -->

            <section class="row justify-content-center">
                <div class="col-12 row-gap-1 p-1 d-none">
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="{{ route('hire.tutor') }}">Browse
                        Tutor</a>
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#FAQ">FAQ</a>
                    <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#">How it works</a>
                    <hr />
                </div>
                <div class="col-12">
                    <h3 class="d-flex justify-content-between align-items-center" style="color: #42b979;      font-size: 30px;">
                        World Wide Tutor
                        <i onclick="hideNShow('filter-col')" class="fa fa-filter text-secondary d-inline-block d-md-none"
                            aria-hidden="true"></i>
                    </h3>
                    <p class="border p-2 description-tutor"style="    color: #42b979; background: #fff;font-size: 17px;">
                        Edexcel is a platform that connects students with qualified tutors across the globe. It leverages online tools and technologies to provide personalized, flexible, and accessible educational support. The platform offers a wide range of subjects, catering to different educational levels, from primary school to High school. Edexcel ensures high-quality instruction by vetting tutors for their expertise and teaching skills. This global reach allows students to access diverse teaching styles and perspectives, fostering a richer learning experience. Additionally, the platform often includes features like one-on-one sessions, group classes, and customized lesson plans to meet individual learning needs.
                    </p>
                </div>

                <div class="col-12">
                    <hr />
                    <h3>Tutor's List</h3>
                    <hr />
                </div>

                <div class="row justify-content-center px-0">
                    
                    
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="m-0 pt-1 tutors-range"> {{ $tutors->firstItem() }} to {{ $tutors->lastItem() }}
                                    0f <span class="total-tutors-count">{{ $totalTutorsCount }}</span> tutors</p>
                            </div>
                            <div class="mb-2">
                                <button id="resetFilterBtn" class="btn btn-secondary bg_theme_green">Reset Filter</button>
    
                            </div>
                        </div>
                        <div class="bg-body-secondary">
                               
                                <div class="row  country-row">
                                    <div class="col-lg-6 country-drop-down" >

                                        <select name="country" id="country" class="country">
                                            <option value="all">All Countries</option>

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
                                    </div>
                                    <div class="col-lg-6 adjust-filters-wrap ">
                                        <div class="col-md-6 px-2 col-lg-6">
                                            {{-- <label for="citysearch" class="form-label">City</label> --}}
                                            <input placeholder="Search city" type="text" class="form-control"
                                                id="citysearch" name="citysearch" required />
                                        </div>
                                        <div class="col-md-6 px-2 col-lg-6">
                                            {{-- <label for="citysearch" class="form-label">City</label> --}}
                                            <input placeholder="Search Subject" type="text" class="form-control"
                                                id="subjectsearch" name="subjectsearch" required />
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                               
                            </div>

                        <!-- Tutor profile -->
                        @if ($tutors->count() > 0)
                            <div id="tutorsContainer">
                                @foreach ($tutors as $item)
                                    <div class="tutor_profile rounded overflow-hidden mb-3 mt-3">
                                        <div class="d-flex justify-content-between">
                                            <button class="p-1 bg_theme_green text-light border border-0">
                                                Sponsored
                                            </button>
                                            <span class="p-1 text-secondary">
                                                <i class="fa fa-bookmark text-body-tertiary"></i>
                                                Watchlist
                                            </span>
                                        </div>

                                        <div class="py-2 px-5">
                                            <div class="row d-flex">
                                                <div
                                                    class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">
                                                    <div class="imgBox col-sm-4 d-grid mx-3">
                                                        <img class="img-1 rounded-circle"
                                                            src="{{ asset('storage/' . $item->profileImage) }}"
                                                            alt="" />
                                                        <p class="d-flex align-items-center m-auto">
                                                            Verified
                                                            <span
                                                                class="mx-1 varified bg-primary rounded-circle text-light"><i
                                                                    class="fa fa-check"></i></span>
                                                        </p>
                                                    </div>
                                                    <div class="personal_detail text-center text-md-start">
                                                        <!-- <div> -->

                                                        <h5>{{ $item->f_name }} {{$item->l_name}}</h5>
                                                        <span>{{ $item->gender }}
                                                            @if ( $item->experience >= 1 )
                                                                <span style="background-color: red"
                                                                class="text-light font-s px-1">Pro</span></span>
                                                            @endif
                                                        <p class="m-0">{{ $item->experience }} 
                                                            @if ( $item->experience > 1 )
                                                            years
                                                            @else
                                                            year
                                                        @endif of teaching
                                                            experience</p>
                                                        <!-- stars -->
                                                        <span
                                                            class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                        <p class="text-danger m-0">( 10 reviews )</p>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>

                                                <div class="qualification col-lg-6">
                                                    <div class="row p-0">
                                                        <table class="col-12">
                                                            <tr class="title-1 col col-md-3">
                                                                <td class="text-dark fw-bold font-s">Qualification</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->qualification }}
                                                                </td>
                                                            </tr>
                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s text-dark fw-bold">Country</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->location }}
                                                                </td>
                                                            </tr>
                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s text-dark fw-bold">City</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->city }}
                                                                </td>
                                                            </tr>
                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s text-dark fw-bold">Mobile</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->phone }}
                                                                    <button
                                                                        class="text-success bg-transparent fw-bold border-0">
                                                                        view contact
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s fw-bold">WhatsApp</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->whatsapp }}
                                                                    <button
                                                                        class="text-success bg-transparent fw-bold border-0">
                                                                        view contact
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s fw-bold">Availability</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->availability }}

                                                                </td>
                                                            </tr>

                                                            <tr class="title-1 col col-md-3">
                                                                <td class="font-s fw-bold">Date of Birth</td>
                                                                <td class="d-none d-md-block px-2">:</td>
                                                                <td class="font-s text-secondary">
                                                                    {{ $item->dob }}

                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div
                                                    class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">
                                                    <div class="option d-flex align-items-start py-1">
                                                        <h5
                                                            class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
                                                            Teaches
                                                        </h5>
                                                        <span class="d-none d-sm-block">:</span>
                                                    </div>

                                                    <div class="d-flex flex-column flex-md-row flex-wrap">

                                                        @php
                                                            // Assuming $item->teaching is a JSON string
                                                            // Serialized string
                                                            $serializedData = $item->teaching;

                                                            // Convert the serialized string to an array
                                                            $arrayData = unserialize($serializedData);
                                                        @endphp
                                                        @foreach ($arrayData as $teaching)
                                                            <span
                                                                class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">{{ $teaching }}</span>
                                                        @endforeach


                                                        <button class="m-1 text-danger border-0 bg-transparent">
                                                            +1 more
                                                        </button>
                                                    </div>
                                                </div>
                                                @php
                                                // Assuming $item->curriculum is a serialized string
                                                $serializedCurriculum = $item->curriculum;
                                            
                                                // Check if the serialized string is not equal to the specific value
                                                $showCurriculum = $serializedCurriculum !== 'a:1:{i:0;N;}';
                                            
                                                if ($showCurriculum) {
                                                    // Convert the serialized string to an array
                                                    $curriculumData = unserialize($serializedCurriculum);
                                            
                                                    // Initialize an empty array to hold the modified curriculum data
                                                    $modifiedCurriculumData = [];
                                            
                                                    // Loop through each element in the curriculum data
                                                    foreach ($curriculumData as $curriculum) {
                                                        // Split the curriculum string by commas
                                                        $splitCurriculum = explode(',', $curriculum);
                                            
                                                        // Trim each element to remove any leading or trailing spaces
                                                        $splitCurriculum = array_map('trim', $splitCurriculum);
                                            
                                                        // Merge the split curriculum into the modified array
                                                        $modifiedCurriculumData = array_merge($modifiedCurriculumData, $splitCurriculum);
                                                    }
                                                }
                                            @endphp
                                            
                                            @if ($showCurriculum && !empty($modifiedCurriculumData))
                                                <div class="col-12 d-flex m-1 align-items-center flex-column flex-sm-row " style="padding-left: 25px;">
                                                    <h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
                                                        Curriculum
                                                    </h5>
                                                    <span class="d-none d-sm-block">:</span>
                                                    @foreach ($modifiedCurriculumData as $curriculums)
                                                        <span class="bg-body-secondary d-inline-block rounded font-s mx-1 p-1 bg_green_hover text-center">{{ $curriculums }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            
                                            </div>
                                            <div class="d-flex flex-column flex-lg-row mt-5 py-1 bd_top_dashed">
                                                <div
                                                    class="d-flex align-items-center flex-column flex-sm-row justify-content-between">
                                                    <span class="d-flex align-items-center px-2 py-2">
                                                        Expand
                                                        <i class="fa fa-chevron-down mx-1" aria-hidden="true"></i>
                                                    </span>

                                                    <div class="d-flex">
                                                        <p
                                                            class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                            <i class="fa fa-mobile"></i>
                                                        </p>

                                                        <p
                                                            class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                            <i class="fas fa-envelope"></i>
                                                        </p>

                                                        <p
                                                            class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                            <i class="fas fa-location"></i>
                                                        </p>

                                                        <p
                                                            class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                                                            <i class="fas fa-certificate"></i>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col d-flex align-items-center justify-content-center justify-content-lg-end flex-column flex-sm-row py-2">
                                                    <a class="text-success text-decoration-none text-center px-2 py-2"
                                                        href="#">Request a callback</a>
                                                    <button class="bg_theme_green border border-0 text-light rounded p-2">
                                                        Send Message
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Display pagination links -->
                            <div id="paginationContainer">
                                {{ $tutors->links('custom-pagination') }}
                            </div>
                            <!-- tutor profile end -->
                        @else
                            <p>No tutors found.</p>
                        @endif

                        <!-- Here is form -->

                        <div class="form col rounded p-4 align-item-center">
                            <div class="border-bottom py-2">
                                <h3 class="py-2">Let us guide you find an expert Tutor</h3>
                            </div>
                            <form class="row g-3">
                                <p class="fs-5 text-secondary pt-2">
                                    Tell us your learning needs and get immediate response from
                                    qualified tutors
                                </p>

                                <div class="col-md-6 pt-3">
                                    <label for=""><strong>Enter your name <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="text" placeholder="Name*" class="form-control py-3"
                                        id="inputEmail4"/>
                                </div>

                                <div class="col-md-6 pt-3">
                                    <label for=""><strong>Enter your email <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="email" placeholder="Enter Email" class="form-control py-3"
                                        id="inputPassword4" />
                                </div>
                                <div class="col-ma-6 pt-3" style="width:100%;">
                                <label for=""><strong>Enter your number <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="text" placeholder="Mobile*" class="form-control py-3"
                                        id="inputPassword4" />
                                </div>

                                <div class="col-md-6 ">
                                 <label for=""><strong>Select your country <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <select class="px-2 h-100 w-100" style="border: 1px solid #ddd; border-radius: 4px;height: 57px !important; margin-top: 17px; color:#857979;">
                                        <option value="pakistan">pakistan</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="India">India</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>\
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Ecuador">France</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Réunion">Réunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthélemy">Saint Barthélemy</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Rwanda">Saint Martin (French part)</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Sudan">South Sudan</option>
                                         <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="RwandaSwaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>

                               <div class="col-md-6 pt-3">  
                                 <label for=""><strong>Enter your city <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="text" placeholder="City" id="inputPassword4" class="form-control py-3">
                                </div>

                                <div class="col-md-6 ">
                                   <label for="dropdown1" class=" pb-1">
                                    <strong>Select your class <b style="color: red;
                                    font-size: 20px;">*</b></strong>
                                   </label>
                                  <select style="height: 55px;" class="form-control" name="school_class" id="school_class">
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">FSc Pre-Medical</option>
                                    <option value="5">FSc Pre-Engineering</option>
                                    <option value="6">ICS</option>
                                    <option value="7">BSc</option>
                                    <option value="8">BSCS</option>
                                    <option value="9">F.A</option>
                                    <option value="10">I.Com</option>
                                  </select>
                                </div>

                                <div class="col-md-6" style="padding-top:5px;">
                                  <label for=""><strong>Select your grad <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                   <input type="text" placeholder="Subject" id="inputPassword4" class="form-control py-3" style="height: 53px;">
                               </div>
                        
                               <div class="col-12 " id="page-1">
                                   <h3 class="text-center " style="text-align: left !important; font-size:  15px;">What are you looking for?</h3>
                                  <div class="choice col-12 ">

                                 <ul class="p-0 ">
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Online Tutor" name="subjects"
                                            id="option-1">
                                        <label for="option-1" style="font-size:13px;">Online Tutor </label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Tutor for home" name="subjects"
                                            id="option-2">
                                        <label for="option-2"  style="font-size:13px;">Tutor for Home</label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Both" name="subjects"
                                            id="option-3">
                                        <label for="option-3"  style="font-size:13px;">Both</label>
                                    </li>
                                 </ul>
                            </div>

                        </div>

                                <!-- <div class="col-12">
                                    <span><b>Note :</b>Check Email Inbox/Spam Folder for OTP</span>
                                    <input type="text" class="form-control mt-4 py-3"
                                        placeholder="I need Tution at or near*" />
                                </div>
                                <div class="col-12">
                                    <textarea rows="5" class="col-12 p-1 border" placeholder="Elaborate tution requirments*"></textarea>
                                </div> -->
                                <div class="chk-box col-12 py-2 d-flex">
                                    <input type="checkbox" class="mb-3 d-none mx-2 common_checkbox" id="agreeWithTerm" />
                                    <label class="checkBox_label pointer d-flex align-item-center"
                                        for="agreeWithTerm"><a style="text-decoration:none" href="{{route('terms.condition')}}" class="px-1 b-text">I agree to the Edexcel Academy & Educational Consultancy<b
                                                class="text-danger">Terms &
                                                Conditions</b></a>
                                    </label>
                                </div>
                            </form>
                            <div class="d-flex d-sm-block justify-content-center">
                                <button class="fs-5 mx-1 py-2 px-5 border-0 text-light rounded bg_theme_green">
                                    Submit
                                </button>
                            </div>
                            <span class="d-flex py-3 text-center">
                                <!-- <span>Do you offer Tuition?<b class="text-success">REGISTER HERE!</b></span> -->
                            </span>
                        </div>

                        <!-- form end -->
                    </div>
                    <!-- col-9 end -->

                    <!-- Filter -->
                    <div id="filter-col" class="d-none col col-lg-3 d-md-block my-0 p-0">
                        <div class="filter-1 border d-none">
                            <div class="col bg-body-secondary p-2 d-flex align-items-center justify-content-between">
                                <span><i class="fas fa-filter"></i> Filter</span>
                                <span onclick="hideNShow('filter-col')"
                                    class="fs-1 text-secondary d-md-none">&times;</span>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                                    onclick="toggleList(this,'ul-toggle-1')">
                                    Subject
                                    <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)"
                                        aria-hidden="true"></i>
                                </h5>
                                <ul style="height: 200px" id="ul-toggle-1" class="border rounded filter_ul p-0">
                                    <li>English</li>
                                    <li>Maths</li>
                                    <li>Physic</li>
                                    <li>Chemistry</li>
                                    <li>social sutdy</li>
                                    <li>Islammiat</li>
                                    <li>Urdu</li>
                                    <li>Computer</li>
                                    <li>Biology</li>
                                    <!-- <li></li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li> -->
                                </ul>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                                    onclick="toggleList(this,'ul-toggle-2')">
                                    Curriculum
                                    <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)"
                                        aria-hidden="true"></i>
                                </h5>
                                <ul style="height: 200px" id="ul-toggle-2" class="border rounded filter_ul p-0">
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                </ul>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                                    onclick="toggleList(this,'ul-toggle-3')">
                                    Area
                                    <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
                                </h5>
                                <ul id="ul-toggle-3" class="rounded filter_ul p-0">
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                </ul>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                                    onclick="toggleList(this,'ul-toggle-4')">
                                    Cagtegories
                                    <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
                                </h5>
                                <ul id="ul-toggle-4" class="rounded filter_ul p-0">
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                </ul>
                            </div>

                        </div>
                       
                        <video src="images/edexcel.mp4" class="object-fit-cover mt-2" autoplay muted loop
                            width="100%"></video>
                            <video src="images/student.mp4" class="object-fit-cover mt-2" autoplay muted loop
                            width="100%"></video>

                    </div>
                </div>

                <!-- FQA Section -->
                <!-- <div class="p-0">
                    <div class="col-12">
                        <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                            Find tutors near your locality
                        </h2>
                    </div>

                    <ul class="row mx-0 p-0 justify-content-center">
                        <li
                            class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                            <a class="text-decoration-none text py-1" href="#" aria-current="true">
                                5320 tutors in <b class="text-danger">All Areas</b> </a>
                        </li>
                        <li
                            class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                            <a class="text-decoration-none text py-1" href="#">
                                2072 tutors in
                                <b class="text-danger">Sheikh Zayed Road</b> </a>
                        </li>
                        <li
                            class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                            <a class="text-decoration-none text py-1" href="#">
                                1285 tutors in
                                <b class="text-danger">Jumerirah Luke Towers</b> </a>
                        </li>
                    </ul>
                </div> -->
                <!-- FAQ -->
                <div class="p-0" id="FAQ">
                    <div class="col-12">
                        <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                            Frequently Asked Questions
                        </h2>
                    </div>

                    <div class="col-12 ms-1 ">
                        <div class="list-group-item border rounded my-2 px-2">
                            <div class="d-flex justify-content-between align-items-center"
                                onclick="toggle('para','toggle-arrow')">
                                <h6 class="fw-bold py-3">
                                    How can students improve their knowledge?
                                </h6>
                                <i class="fa fa-chevron-down" id="toggle-arrow"></i>
                            </div>
                            <div id="para">
                                <p>
                                    Students can improve their knowledge and skills in a number
                                    of ways like:
                                </p>
                                <ul>
                                    <li>Practicing solutions regularly.</li>
                                    <li>
                                        Understand the underlying concepts/formulas clearly.
                                    </li>
                                    <li>Solving additional exercises.</li>
                                    <li>Sharing a positive attitude about the subject.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="list-group-item border rounded my-2 px-2">
                            <div class="d-flex justify-content-between align-items-center"
                                onclick="toggle('para1','toggle-arrow1')">
                                <h6 class="fw-bold py-3">
                                    How can tutors help students improve their score and skills?
                                </h6>
                                <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                            </div>
                            <div id="para1">
                                <p>
                                    There are many ways students can improve their skills. But
                                    experienced tutors in Dubai can help to:
                                </p>
                                <ul>
                                    <li>Build confidence in the student.</li>
                                    <li>Encourage questioning and make space for curiosity.</li>
                                    <li>Emphasize conceptual understanding over procedure.</li>
                                    <li>
                                        Provide authentic problems that increase students’ drive
                                        to engage with the subject.
                                    </li>
                                    <li>Share a positive attitude about the subject.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="list-group-item border rounded my-2 px-2">
                            <div class="d-flex justify-content-between align-items-center"
                                onclick="toggle('para2','toggle-arrow2')">
                                <h6 class="fw-bold py-3">
                                Want to know what we can offer?
                                </h6>
                                <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                            </div>
                            <div id="para2">
                                <p>
                                    There are many ways students can improve their skills. But
                                    experienced tutors in Dubai can help to:
                                </p>
                                <ul>
                                    <li>Build confidence in the student.</li>
                                    <li>Encourage questioning and make space for curiosity.</li>
                                    <li>Emphasize conceptual understanding over procedure.</li>
                                    <li>
                                        Provide authentic problems that increase students’ drive
                                        to engage with the subject.
                                    </li>
                                    <li>Share a positive attitude about the subject.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="list-group-item border rounded my-2 px-2">
                            <div class="d-flex justify-content-between align-items-center"
                                onclick="toggle('para3','toggle-arrow3')">
                                <h6 class="fw-bold py-3">
                                If you have tried all means and yet looking for a tutor❓
                                </h6>
                                <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                            </div>
                            <div id="para3">
                                <p>
                                    There are many ways students can improve their skills. But
                                    experienced tutors in Dubai can help to:
                                </p>
                                <ul>
                                    <li>Build confidence in the student.</li>
                                    <li>Encourage questioning and make space for curiosity.</li>
                                    <li>Emphasize conceptual understanding over procedure.</li>
                                    <li>
                                        Provide authentic problems that increase students’ drive
                                        to engage with the subject.
                                    </li>
                                    <li>Share a positive attitude about the subject.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="carouselExampleCaptions" class="carousel slide text-center mb-3" data-bs-ride="carousel">
                    <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                        Reviews
                    </h2>
                    <div class="carousel-indicators mx-5">
                        <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                            data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner px-0 mx-2 d-flex ">
                        <div class="carousel-item  active">
                            <div class="main-card d-flex justify-content-center">
                                <div class="card-item bg-body-secondary py-3 ms-0  shadow rounded">
                                    <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px"
                                        height="100px" alt="... " />
                                    <div>
                                        <h3>Frank Burke</h3>
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <p>All Areas</p>
                                    </div>

                                    <h5>First slide label</h5>
                                    <p>
                                        Some representative placeholder content for the first slide.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="main-card d-flex justify-content-center">
                                <div class="card-item bg-body-secondary py-3 mx-2 rounded">
                                    <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px"
                                        height="100px" alt="... " />
                                    <div>
                                        <h3>Frank Burke</h3>
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <p>All Areas</p>
                                    </div>

                                    <h5>First slide label</h5>
                                    <p>
                                        Some representative placeholder content for the first slide.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="main-card d-flex justify-content-center ">
                                <div class="card-item bg-body-secondary py-3 mx-2  shadow rounded">
                                    <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px"
                                        height="100px" alt="... " />
                                    <div>
                                        <h3>Frank Burke</h3>
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <p>All Areas</p>
                                    </div>

                                    <h5>First slide label</h5>
                                    <p>
                                        Some representative placeholder content for the first slide.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev " type="button"
                        data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" style="filter: invert(1);" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" style="filter: invert(1); " aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
    </div>

    <button class="goToTop fw-20px" style="background-color:#42B979" onclick="window.scrollTo(0, 0)"><i
            class="fa-solid fa-chevron-up"></i></button>

    <!-- footer start... -->

@endsection

@section('js')
    {{-- <script>
        $(document).ready(function() {
            
        });
    </script> --}}

    
    <script>
        

        $(document).ready(function($) {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            // Your jQuery code here
            $('#country').change(function(e) {
                e.preventDefault();
                var selectedCountry = $(this).val();
                var locationData = {};

                // Check if "All Countries" is selected
                if (selectedCountry !== "all") {
                    // If a specific country is selected, send its value
                    locationData = {
                        location: selectedCountry,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    };
                } else {
                    // If "All Countries" is selected, send "all" as the location
                    locationData = {
                        location: "all",
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    };
                }

                // Send AJAX request with the appropriate location data
                $.ajax({
                    type: 'POST',
                    url: '{{ route('fetch-data') }}',
                    data: locationData,
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success function triggered', response);
                        if (response && response.tutors) {
                            $('#tutorsContainer').empty();

                            // Check if there are tutors
                            if (response.tutors.length > 0) {
                                // Iterate over tutors and update content
                                response.tutors.forEach(function(item) {


                                    // Assuming item represents each tutor object
                                    // Assuming item.teaching is a PHP serialized array
                                    var serializedTeaching =
                                    '<?php echo $item->teaching; ?>'; // Assuming you're echoing PHP data into JavaScript

                                    // Parse the serialized PHP array into a JavaScript array
                                    var teachingArray = [];

                                    // Extract individual values from serializedTeaching
                                    var matches = serializedTeaching.match(
                                        /s:\d+:"(.*?)";/g);
                                    if (matches) {
                                        matches.forEach(function(match) {
                                            teachingArray.push(match.match(
                                                /s:\d+:"(.*?)";/)[1]);
                                        });
                                    }
                                    const data = item.curriculum;

                                    let newData = data;
                                    newData = newData.split('"');

                                    let sorttedArry = [];
                                    newData.forEach(element => {

                                        if (!element.includes(':') && !element
                                            .includes(';')) {
                                            sorttedArry.push(element);


                                        }
                                    });
                                    sorttedArry = sorttedArry[0].split(',');

                                    console.log(sorttedArry)


                                    var tutorHTML =
                                        '<div class="tutor_profile rounded overflow-hidden mb-3">';
                                    tutorHTML +=
                                        '<div class="d-flex justify-content-between">';
                                    tutorHTML +=
                                        '<button class="p-1 bg_theme_green text-light border border-0">Sponsored</button>';
                                    tutorHTML +=
                                        '<span class="p-1 text-secondary"><i class="fa fa-bookmark text-body-tertiary"></i> Watchlist</span>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="py-2 px-5">';
                                    tutorHTML += '<div class="row d-flex">';
                                    tutorHTML +=
                                        '<div class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">';
                                    tutorHTML +=
                                        '<div class="imgBox col-sm-4 d-grid mx-3">';
                                    tutorHTML +=
                                        '<img class="img-1 rounded-circle" src="storage/' +
                                        item.profileImage + '" alt="" />';
                                    tutorHTML +=
                                        '<p class="d-flex align-items-center m-auto">Verified<span class="mx-1 varified bg-primary rounded-circle text-light"><i class="fa fa-check"></i></span></p>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="personal_detail text-center text-md-start">';
                                    tutorHTML += '<h5>' + item.f_name +  item.l_name + '</h5>';
                                    tutorHTML += '<span>' + item.gender + ', ' +
                                        item.age +
                                        ' years <span style="background-color: red" class="text-light font-s px-1">Pro</span></span>';
                                    tutorHTML += '<p class="m-0">' + item
                                        .experience +
                                        ' years of teaching experience</p>';
                                    tutorHTML +=
                                        '<span class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">';
                                    for (var i = 0; i < item.starRating; i++) {
                                        tutorHTML += '<i class="fa fa-star"></i>';
                                    }
                                    tutorHTML += '</span>';
                                    tutorHTML += '<p class="text-danger m-0">(' +
                                        item.reviews + ' reviews)</p>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="qualification col-lg-6">';
                                    tutorHTML += '<div class="row p-0">';
                                    tutorHTML += '<table class="col-12">';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="text-dark fw-bold font-s">Qualification</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.qualification + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Country</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.location + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">City</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.city + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Mobile</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.phone +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">WhatsApp</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.whatsapp +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Availability</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.availability + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Date of Birth</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.dob + '</td></tr>';
                                    tutorHTML += '</table>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="row mt-3">';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">';
                                    tutorHTML +=
                                        '<div class="option d-flex align-items-start py-1"><h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Teaches</h5><span class="d-none d-sm-block">:</span></div>';
                                    teachingArray.forEach(function(subject) {
                                        // Add each subject to the tutorHTML
                                        tutorHTML +=
                                            '<span class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">' +
                                            subject + '</span>';
                                    });

                                    // After adding all subjects, add the "+1 more" button and other HTML elements
                                    tutorHTML +=
                                        '<button class="m-1 text-danger border-0 bg-transparent">+1 more</button>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center flex-column flex-sm-row ps-5">';
                                    tutorHTML +=
                                        '<h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Curriculum</h5>';
                                    tutorHTML +=
                                        '<span class="d-none d-sm-block">:</span>';
                                    // Unserialize the serialized data

                                    // Add a span for each curriculum item to tutorHTML
                                    sorttedArry.forEach(element => {
                                        tutorHTML +=
                                            '<span class="bg-body-secondary d-inline-block rounded font-s mx-1 p-1 bg_green_hover text-center">' +
                                            element + '</span>';

                                    })

                                    tutorHTML += '</div>';
                                    // Append tutor HTML to container
                                    $('#tutorsContainer').append(tutorHTML);
                                    var totalTutorsCount = response.pagination
                                        .total;

                                    // Update the perPage value with the count returned in the response
                                    var perPage = response.pagination.perPage;
                                    console.log(perPage)
                                    // Calculate firstItem
                                    var firstItem = (response.pagination
                                        .currentPage - 1) * perPage + 1;

                                    // Calculate lastItem
                                    var lastItem = Math.min(response.pagination
                                        .currentPage * perPage, totalTutorsCount
                                    );

                                    // Update the totalTutorsCount displayed in the UI
                                    $('.total-tutors-count').text(totalTutorsCount);

                                    // Update the range displayed in the UI
                                    $('.tutors-range').text(firstItem + ' to ' +
                                        lastItem + ' of ' + totalTutorsCount +
                                        ' tutors');

                                    // Hide pagination if totalTutorsCount is less than or equal to perPage
                                    if (totalTutorsCount <= perPage) {
                                        $('#paginationContainer').hide();
                                    } else {
                                        $('#paginationContainer').show();
                                    }


                                });
                            } else {
                                // Handle case where no tutors are found
                                $('#tutorsContainer').html(
                                    '<p>No tutors found for the selected country.</p>');
                            }

                            // Update pagination links
                            $('#paginationContainer').html(response.pagination);
                        } else {
                            // Handle case where no tutors are found
                            console.log('No tutors found for the selected country.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                    }
                });
                
            });
            $('#citysearch').keyup(function() {
                var searchQuery = $(this).val(); // Get the value from the city search input field
                var locationData = {
                    citysearch: searchQuery,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                };

                // Send AJAX request with the appropriate location data
                $.ajax({
                    type: 'POST',
                    url: '{{ route('fetch-data') }}',
                    data: locationData,
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success function triggered', response);
                        if (response && response.tutors) {
                            $('#tutorsContainer').empty();

                            // Check if there are tutors
                            if (response.tutors.length > 0) {
                                // Iterate over tutors and update content
                                response.tutors.forEach(function(item) {


                                    // Assuming item represents each tutor object
                                    // Assuming item.teaching is a PHP serialized array
                                    var serializedTeaching =
                                    '<?php echo $item->teaching; ?>'; // Assuming you're echoing PHP data into JavaScript

                                    // Parse the serialized PHP array into a JavaScript array
                                    var teachingArray = [];

                                    // Extract individual values from serializedTeaching
                                    var matches = serializedTeaching.match(
                                        /s:\d+:"(.*?)";/g);
                                    if (matches) {
                                        matches.forEach(function(match) {
                                            teachingArray.push(match.match(
                                                /s:\d+:"(.*?)";/)[1]);
                                        });
                                    }
                                    const data = item.curriculum;

                                    let newData = data;
                                    newData = newData.split('"');

                                    let sorttedArry = [];
                                    newData.forEach(element => {

                                        if (!element.includes(':') && !element
                                            .includes(';')) {
                                            sorttedArry.push(element);


                                        }
                                    });
                                    sorttedArry = sorttedArry[0].split(',');

                                    console.log(sorttedArry)


                                    var tutorHTML =
                                        '<div class="tutor_profile rounded overflow-hidden mb-3">';
                                    tutorHTML +=
                                        '<div class="d-flex justify-content-between">';
                                    tutorHTML +=
                                        '<button class="p-1 bg_theme_green text-light border border-0">Sponsored</button>';
                                    tutorHTML +=
                                        '<span class="p-1 text-secondary"><i class="fa fa-bookmark text-body-tertiary"></i> Watchlist</span>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="py-2 px-5">';
                                    tutorHTML += '<div class="row d-flex">';
                                    tutorHTML +=
                                        '<div class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">';
                                    tutorHTML +=
                                        '<div class="imgBox col-sm-4 d-grid mx-3">';
                                    tutorHTML +=
                                        '<img class="img-1 rounded-circle" src="storage/' +
                                        item.profileImage + '" alt="" />';
                                    tutorHTML +=
                                        '<p class="d-flex align-items-center m-auto">Verified<span class="mx-1 varified bg-primary rounded-circle text-light"><i class="fa fa-check"></i></span></p>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="personal_detail text-center text-md-start">';
                                    tutorHTML += '<h5>' + item.f_name +  item.l_name + '</h5>';
                                    tutorHTML += '<span>' + item.gender + ', ' +
                                        item.age +
                                        ' years <span style="background-color: red" class="text-light font-s px-1">Pro</span></span>';
                                    tutorHTML += '<p class="m-0">' + item
                                        .experience +
                                        ' years of teaching experience</p>';
                                    tutorHTML +=
                                        '<span class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">';
                                    for (var i = 0; i < item.starRating; i++) {
                                        tutorHTML += '<i class="fa fa-star"></i>';
                                    }
                                    tutorHTML += '</span>';
                                    tutorHTML += '<p class="text-danger m-0">(' +
                                        item.reviews + ' reviews)</p>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="qualification col-lg-6">';
                                    tutorHTML += '<div class="row p-0">';
                                    tutorHTML += '<table class="col-12">';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="text-dark fw-bold font-s">Qualification</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.qualification + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Country</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.location + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">City</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.city + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Mobile</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.phone +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">WhatsApp</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.whatsapp +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Availability</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.availability + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Date of Birth</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.dob + '</td></tr>';
                                    tutorHTML += '</table>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="row mt-3">';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">';
                                    tutorHTML +=
                                        '<div class="option d-flex align-items-start py-1"><h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Teaches</h5><span class="d-none d-sm-block">:</span></div>';
                                    teachingArray.forEach(function(subject) {
                                        // Add each subject to the tutorHTML
                                        tutorHTML +=
                                            '<span class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">' +
                                            subject + '</span>';
                                    });

                                    // After adding all subjects, add the "+1 more" button and other HTML elements
                                    tutorHTML +=
                                        '<button class="m-1 text-danger border-0 bg-transparent">+1 more</button>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center flex-column flex-sm-row ps-5">';
                                    tutorHTML +=
                                        '<h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Curriculum</h5>';
                                    tutorHTML +=
                                        '<span class="d-none d-sm-block">:</span>';
                                    // Unserialize the serialized data

                                    // Add a span for each curriculum item to tutorHTML
                                    sorttedArry.forEach(element => {
                                        tutorHTML +=
                                            '<span class="bg-body-secondary d-inline-block rounded font-s mx-1 p-1 bg_green_hover text-center">' +
                                            element + '</span>';

                                    })

                                    tutorHTML += '</div>';
                                    // Append tutor HTML to container
                                    $('#tutorsContainer').append(tutorHTML);
                                    var totalTutorsCount = response.pagination
                                        .total;

                                    // Update the perPage value with the count returned in the response
                                    var perPage = response.pagination.perPage;
                                    console.log(perPage)
                                    // Calculate firstItem
                                    var firstItem = (response.pagination
                                        .currentPage - 1) * perPage + 1;

                                    // Calculate lastItem
                                    var lastItem = Math.min(response.pagination
                                        .currentPage * perPage, totalTutorsCount
                                    );

                                    // Update the totalTutorsCount displayed in the UI
                                    $('.total-tutors-count').text(totalTutorsCount);

                                    // Update the range displayed in the UI
                                    $('.tutors-range').text(firstItem + ' to ' +
                                        lastItem + ' of ' + totalTutorsCount +
                                        ' tutors');

                                    // Hide pagination if totalTutorsCount is less than or equal to perPage
                                    if (totalTutorsCount <= perPage) {
                                        $('#paginationContainer').hide();
                                    } else {
                                        $('#paginationContainer').show();
                                    }


                                });
                            } else {
                                // Handle case where no tutors are found
                                $('#tutorsContainer').html(
                                    '<p>No tutors found for the selected city.</p>');
                            }

                            // Update pagination links
                            $('#paginationContainer').html(response.pagination);
                        } else {
                            // Handle case where no tutors are found
                            console.log('No tutors found for the selected city.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                    }
                });
            });

            $('#subjectsearch').keyup(function() {
                var searchQuery = $(this).val(); // Get the value from the city search input field
                var locationData = {
                    subjectsearch: searchQuery,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                };
                console.log('searchQuery',searchQuery)
                // Send AJAX request with the appropriate location data
                $.ajax({
                    type: 'POST',
                    url: '{{ route('fetch-data') }}',
                    data: locationData,
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success function triggered', response);
                        if (response && response.tutors) {
                            $('#tutorsContainer').empty();

                            // Check if there are tutors
                            if (response.tutors.length > 0) {
                                // Iterate over tutors and update content
                                response.tutors.forEach(function(item) {


                                    // Assuming item represents each tutor object
                                    // Assuming item.teaching is a PHP serialized array
                                    var serializedTeaching =
                                    '<?php echo $item->teaching; ?>'; // Assuming you're echoing PHP data into JavaScript

                                    // Parse the serialized PHP array into a JavaScript array
                                    var teachingArray = [];

                                    // Extract individual values from serializedTeaching
                                    var matches = serializedTeaching.match(
                                        /s:\d+:"(.*?)";/g);
                                    if (matches) {
                                        matches.forEach(function(match) {
                                            teachingArray.push(match.match(
                                                /s:\d+:"(.*?)";/)[1]);
                                        });
                                    }
                                    const data = item.curriculum;

                                    let newData = data;
                                    newData = newData.split('"');

                                    let sorttedArry = [];
                                    newData.forEach(element => {

                                        if (!element.includes(':') && !element
                                            .includes(';')) {
                                            sorttedArry.push(element);


                                        }
                                    });
                                    sorttedArry = sorttedArry[0].split(',');

                                    console.log(sorttedArry)


                                    var tutorHTML =
                                        '<div class="tutor_profile rounded overflow-hidden mb-3">';
                                    tutorHTML +=
                                        '<div class="d-flex justify-content-between">';
                                    tutorHTML +=
                                        '<button class="p-1 bg_theme_green text-light border border-0">Sponsored</button>';
                                    tutorHTML +=
                                        '<span class="p-1 text-secondary"><i class="fa fa-bookmark text-body-tertiary"></i> Watchlist</span>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="py-2 px-5">';
                                    tutorHTML += '<div class="row d-flex">';
                                    tutorHTML +=
                                        '<div class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">';
                                    tutorHTML +=
                                        '<div class="imgBox col-sm-4 d-grid mx-3">';
                                    tutorHTML +=
                                        '<img class="img-1 rounded-circle" src="storage/' +
                                        item.profileImage + '" alt="" />';
                                    tutorHTML +=
                                        '<p class="d-flex align-items-center m-auto">Verified<span class="mx-1 varified bg-primary rounded-circle text-light"><i class="fa fa-check"></i></span></p>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="personal_detail text-center text-md-start">';
                                    tutorHTML += '<h5>' + item.f_name +  item.l_name + '</h5>';
                                    tutorHTML += '<span>' + item.gender + ', ' +
                                        item.age +
                                        ' years <span style="background-color: red" class="text-light font-s px-1">Pro</span></span>';
                                    tutorHTML += '<p class="m-0">' + item
                                        .experience +
                                        ' years of teaching experience</p>';
                                    tutorHTML +=
                                        '<span class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">';
                                    for (var i = 0; i < item.starRating; i++) {
                                        tutorHTML += '<i class="fa fa-star"></i>';
                                    }
                                    tutorHTML += '</span>';
                                    tutorHTML += '<p class="text-danger m-0">(' +
                                        item.reviews + ' reviews)</p>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="qualification col-lg-6">';
                                    tutorHTML += '<div class="row p-0">';
                                    tutorHTML += '<table class="col-12">';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="text-dark fw-bold font-s">Qualification</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.qualification + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Country</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.location + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">City</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.city + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s text-dark fw-bold">Mobile</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.phone +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">WhatsApp</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.whatsapp +
                                        '<button class="text-success bg-transparent fw-bold border-0">view contact</button></td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Availability</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.availability + '</td></tr>';
                                    tutorHTML +=
                                        '<tr class="title-1 col col-md-3"><td class="font-s fw-bold">Date of Birth</td><td class="d-none d-md-block px-2">:</td><td class="font-s text-secondary">' +
                                        item.dob + '</td></tr>';
                                    tutorHTML += '</table>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '<div class="row mt-3">';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">';
                                    tutorHTML +=
                                        '<div class="option d-flex align-items-start py-1"><h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Teaches</h5><span class="d-none d-sm-block">:</span></div>';
                                    teachingArray.forEach(function(subject) {
                                        // Add each subject to the tutorHTML
                                        tutorHTML +=
                                            '<span class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">' +
                                            subject + '</span>';
                                    });

                                    // After adding all subjects, add the "+1 more" button and other HTML elements
                                    tutorHTML +=
                                        '<button class="m-1 text-danger border-0 bg-transparent">+1 more</button>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML += '</div>';
                                    tutorHTML +=
                                        '<div class="col-12 d-flex m-1 align-items-center flex-column flex-sm-row ps-5">';
                                    tutorHTML +=
                                        '<h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">Curriculum</h5>';
                                    tutorHTML +=
                                        '<span class="d-none d-sm-block">:</span>';
                                    // Unserialize the serialized data

                                    // Add a span for each curriculum item to tutorHTML
                                    sorttedArry.forEach(element => {
                                        tutorHTML +=
                                            '<span class="bg-body-secondary d-inline-block rounded font-s mx-1 p-1 bg_green_hover text-center">' +
                                            element + '</span>';

                                    })

                                    tutorHTML += '</div>';
                                    // Append tutor HTML to container
                                    $('#tutorsContainer').append(tutorHTML);
                                    var totalTutorsCount = response.pagination.total;

                                    // Update the perPage value with the count returned in the response
                                    var perPage = response.pagination.perPage;
                                    console.log(perPage)
                                    // Calculate firstItem
                                    var firstItem = (response.pagination
                                        .currentPage - 1) * perPage + 1;

                                    // Calculate lastItem
                                    var lastItem = Math.min(response.pagination
                                        .currentPage * perPage, totalTutorsCount
                                    );

                                    // Update the totalTutorsCount displayed in the UI
                                    $('.total-tutors-count').text(totalTutorsCount);

                                    // Update the range displayed in the UI
                                    $('.tutors-range').text(firstItem + ' to ' +
                                        lastItem + ' of ' + totalTutorsCount +
                                        ' tutors');

                                    // Hide pagination if totalTutorsCount is less than or equal to perPage
                                    if (totalTutorsCount <= perPage) {
                                        $('#paginationContainer').hide();
                                    } else {
                                        $('#paginationContainer').show();
                                    }


                                });
                            } else {
                                // Handle case where no tutors are found
                                $('#tutorsContainer').html(
                                    '<p>No tutors found for the selected country.</p>');
                            }

                            // Update pagination links
                            $('#paginationContainer').html(response.pagination);
                        } else {
                            // Handle case where no tutors are found
                            console.log('No tutors found for the selected country.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                    }
                });
            });
            $('#resetFilterBtn').click(function() {
                // Send an AJAX request to fetch data without applying the filter
                // AJAX request to reset filters
                $.ajax({
                    type: 'POST',
                    url: '{{ route('fetch-data') }}',
                    data: {
                        reset: true,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle success response for reset
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response for reset
                    }
                });

            });

            $('.notification').hide();

            $('.notify').click(function () {
                $('.notification').toggle();
                
            })

        });
        
    </script>
   <script>
    function changeLanguage() {
        var locale = document.getElementById('language-select').value;
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
</script>
@endsection
