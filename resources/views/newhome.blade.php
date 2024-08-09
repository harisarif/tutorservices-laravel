
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
                    <div class="image-wrapper d-flex justify-content-end">
                        <!-- <img src="images/Banner.png" class="full-img" alt="Banner.png" /> -->
                        <video src="images/banner-video.mp4" class="object-fit-cover mt-2" autoplay muted loop
                        width="100%" style="width: 510px; height: 335px;"></video>

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
                    {{__('messages.World Wide Tutor')}}
                        <i onclick="hideNShow('filter-col')" class="fa fa-filter text-secondary d-inline-block d-md-none"
                            aria-hidden="true"></i>
                    </h3>
                    <p class="border p-2 description-tutor"style="    color: #42b979; background: #fff;font-size: 17px;">
                    {{__('messages.Edexcel is a platform that connects students with qualified tutors across the globe. It leverages online tools and technologies to provide personalized, flexible, and accessible educational support. The platform offers a wide range of subjects, catering to different educational levels, from primary school to High school. Edexcel ensures high-quality instruction by vetting tutors for their expertise and teaching skills. This global reach allows students to access diverse teaching styles and perspectives, fostering a richer learning experience. Additionally, the platform often includes features like one-on-one sessions, group classes, and customized lesson plans to meet individual learning needs.')}} 
                    </p>
                </div>

                <div class="col-12">
                    <hr />
                    <h3>{{__('messages.tutor_list')}}</h3>
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
                                <div class="ad-form">
                                    <div class="ad-img-card">
                                        <div style="display: flex; justify-content: center;">
                                            <img src="{{ asset('storage/' . $item->profileImage) }}" alt="..." class="img-thumbnail" style="max-width: 100%; height: 100px; width: 100px; border-radius: 70px;">
                                        </div>
                                    <div class="ad-icons">
                                        <span><i class="fa-regular fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fa-regular fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fa-regular fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fa-regular fa-star" aria-hidden="true"></i></span>
                                        <span><i class="fa-regular fa-star" aria-hidden="true"></i></span>
                                    </div>
                                
                                    </div>
                                    <div class="ad-detail">
                                    <div style="margin: 5px 3px;">Tutor <u>{{ $item->f_name }} {{$item->l_name}}</u> [Tut2340]</div>

                                        <span><i class="fa-solid fa-graduation-cap"></i><strong style="margin-left: 7px;">Qualification :</strong> {{ $item->qualification }} </span>
                                        
                                        <span><i class="fa-solid fa-book-open"></i><strong style="margin-left: 8px;">Subject :</strong> English</span>

                                        <span><i class="fa-solid fa-globe"></i><strong>Country :</strong> {{ $item->location }}</span>
                                        <span><i class="fa-solid fa-location-dot"></i></i><strong style="margin-left: 14px;">City :</strong> {{ $item->city }}</span>

                                        <span><i class="fa-regular fa-clock"></i><strong >Time Available :</strong>{{ $item->availability }}</span>
                                        <span><i class="fa-solid fa-person"></i><strong style="margin-left: 15px;">Gender :</strong>{{ $item->gender }}</span>

                                        <span style="background: #42b979; padding: 10px 0;border-radius: 5px; color: #fff; width: 80%;"><i class="fa-solid fa-location-dot" style="color:#fff;"></i></i><strong style="margin-left: 14px;  color: #fff;">Available For :</strong> Onlline </span>
                                    </div>
                                </div>
                                    <div class="d-none tutor_profile rounded overflow-hidden mb-3 mt-3">
                                        <div class="d-flex justify-content-between">
                                            <button class="p-1 bg_theme_green text-light border border-0" style="display:none;">
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
                                                            <tr class="title-1 col col-md-3" style="display:none;">
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
                                                            <tr class="title-1 col col-md-3" style="display:none;">
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
               
                          <!-- end job section  -->
                        

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
                       
                        <!-- <video src="images/edexcel.mp4" class="object-fit-cover mt-2" autoplay muted loop
                            width="100%"></video> -->
                            <video src="images/video.mp4" class="object-fit-cover mt-2" autoplay muted loop
                            width="100%"></video>

                    </div>
                </div>

                
                <!-- FAQ -->
                <div class="section_our_solution">
                    <div class="ai-heading">
                        <h3><strong>Get the Best Tutors for Both Physical and Online Tutoring</strong></h3>
                        <p>More than 50K students have found tutors already. From English to Mathematics, from History to French, from C++ to Node JS, we have it all. Find a tutor now in less than 60 seconds.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 g-0">
                        <div class="our_solution_category">
                            <div class="solution_cards_box">
                                <a href="{{ route('hire.tutor') }}">
                                    <div class="solution_card">
                                    <div class="hover_color_bubble"></div>
                                    <div class="so_top_icon">
                                    <svg id="Layer_1" enable-background="new 0 0 512 512" height="50" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                        <g>
                                            <g>
                                            <g>
                                                <path d="m47.478 452.317 295.441 19.76c5.511.369 10.277-3.8 10.645-9.31l28.393-424.517c.369-5.511-3.8-10.276-9.31-10.645l-295.441-19.76c-5.511-.369-10.276 3.8-10.645 9.31l-28.394 424.517c-.368 5.511 3.8 10.277 9.311 10.645z" fill="#fae19e" />
                                            </g>
                                            <g>
                                                <g>
                                                <g>
                                                    <g>
                                                    <g>
                                                        <path d="m17.5 504.177h226.14l79.96-79.605v-355.86c0-5.523-4.477-10-10-10h-296.1c-5.523 0-10 4.477-10 10v425.466c0 5.522 4.477 9.999 10 9.999z" fill="#fff9e9" />
                                                    </g>
                                                    <path d="m313.601 58.712h-40c5.523 0 10 4.477 10 10v355.861l-.258 40.078 40.258-40.078v-355.861c0-5.523-4.477-10-10-10z" fill="#fff4d6" />
                                                    </g>
                                                </g>
                                                </g>
                                                <path d="m243.64 504.177v-70.253c0-5.523 4.477-10 10-10h69.96z" fill="#ffeec2" />
                                            </g>
                                            </g>
                                            <g>
                                            <path d="m468.636 248.58-33.372.165v-50.826c0-9.183 7.463-16.662 16.673-16.708h.007c9.217-.046 16.693 7.371 16.693 16.562v50.807z" fill="#fed23a" />
                                            <path d="m451.96 504.177c-10.362-10.277-16.196-24.263-16.208-38.857l-.062-73.973c0-.644.524-1.169 1.171-1.173l30.038-.149c.647-.003 1.171.517 1.171 1.161l.062 74.079c.012 14.531-5.749 28.472-16.015 38.756z" fill="#54b1ff" />
                                            <path d="m451.959 469.333h-.01c-14.434.072-26.14-11.542-26.14-25.935v-213.527c0-6.778 5.477-12.283 12.255-12.316l27.626-.137c6.826-.034 12.378 5.49 12.378 12.316v213.436c0 14.38-11.687 26.091-26.109 26.163z" fill="#fdf385" />
                                            <path d="m465.69 217.417-23.769.118c6.037.79 10.708 5.94 10.708 12.198v213.437c0 9.823-5.455 18.397-13.507 22.87 3.79 2.115 8.164 3.317 12.826 3.293h.01c14.422-.072 26.109-11.783 26.109-26.163v-213.436c.001-6.826-5.551-12.351-12.377-12.317z" fill="#faee6e" />
                                            <path d="m491.274 247.925-71.615.355c-7.305.036-13.226 5.968-13.226 13.248 0 7.281 5.921 13.153 13.226 13.117l58.389-.29v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c0-7.28-5.922-13.152-13.226-13.116z" fill="#54b1ff" />
                                            <g>
                                                <path d="m491.274 247.925-38.441.188-.167 26.311 25.381-.067v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c.001-7.282-5.921-13.154-13.225-13.118z" fill="#3da7ff" />
                                            </g>
                                            </g>
                                        </g>
                                        <g fill="#060606">
                                            <path d="m373.147 20.122-295.44-19.761c-9.631-.638-17.984 6.665-18.629 16.293l-2.311 34.557h-39.267c-9.649 0-17.5 7.851-17.5 17.5v425.466c0 9.649 7.851 17.5 17.5 17.5h226.141c1.96 0 3.902-.801 5.292-2.185l34.138-33.987c.347.074.701.133 1.065.157l58.282 3.898c9.302.614 18.005-6.952 18.629-16.293l28.393-424.515c.639-9.528-6.766-17.993-16.293-18.63zm-122.006 465.902v-52.1c0-1.378 1.122-2.5 2.5-2.5h51.9zm94.939-23.757c-.244 1.51-1.131 2.286-2.66 2.327l-46.28-3.096 31.752-31.611c1.414-1.407 2.209-3.32 2.209-5.315v-355.86c0-9.649-7.851-17.5-17.5-17.5h-77.993c-9.697 0-9.697 15 0 15h77.993c1.379 0 2.5 1.122 2.5 2.5v347.712h-62.46c-9.649 0-17.5 7.851-17.5 17.5v62.753h-218.641c-1.378 0-2.5-1.122-2.5-2.5v-425.465c0-1.378 1.122-2.5 2.5-2.5h178.168c9.697 0 9.697-15 0-15h-123.868l2.244-33.556c.244-1.511 1.131-2.286 2.661-2.327l295.44 19.76c1.511.244 2.287 1.131 2.328 2.661z" />
                                            <path d="m267.827 237.047h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m267.827 289.332h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m55.774 192.262c0 4.142 3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-204.553c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m91.807 139.977c0 4.142 3.358 7.5 7.5 7.5h132.487c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-132.487c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m194.755 438.787c-13.489.036-26.978.065-40.467.086-4.534.007-9.067.013-13.6.016-8.215.006-13.75-1.643-15.59-10.679-1.556-7.64-12.364-6.613-14.464 0-5.19 16.337-13.774 9.936-18.582-1.053-4.797-10.963-6.027-23.233-8.122-34.9-1.54-8.573-14.506-6.17-14.732 1.994-.298 10.751-1.302 21.331-4.031 31.758-2.815 10.758-7.034 21.097-11.222 31.376-3.651 8.961 10.867 12.816 14.464 3.988 3.711-9.108 7.427-18.266 10.193-27.714 5.14 12.36 15.774 26.34 30.927 18.101 2.819-1.533 5.452-3.712 7.763-6.253 7.88 9.106 19.609 8.388 30.584 8.375 15.627-.02 31.254-.054 46.881-.095 9.649-.025 9.667-15.025-.002-15z" />
                                            <path d="m505.932 246.439c-3.897-3.878-9.255-5.867-14.695-6.014l-5.668.028v-10.719c0-6.529-3.878-13.427-9.433-16.862v-15.098c0-31.069-48.372-30.934-48.372.146v15.1c-5.659 3.498-9.455 9.741-9.455 16.852v10.982c-24.966 1.7-25.037 39.745.028 41.232.16 33.575.152 66.6-.028 100.737-.049 9.414 14.949 9.966 15 .079.18-34.166.188-67.22.029-100.823l37.211-.185s-.048 110.848-.048 160.784c0 24.338-37.219 24.5-37.219-.253l.013-13.677c.585-9.68-14.387-10.583-14.973-.904v12.834c0 11 3.402 20.316 9.988 26.869.586 15.693 7.198 30.878 18.369 41.956 3.205 3.18 7.642 2.208 10.744-.182 11.365-11.385 17.769-26.394 18.169-42.414 4.951-4.931 9.908-9.896 9.908-26.896l.006-68.351c12.97 3.689 26.494-6.348 26.494-19.946v-90.672c0-5.523-2.155-10.709-6.068-14.603zm-72.623-5.727v-10.841c0-2.219 1.523-4.08 3.573-4.633l30.025-.149c.84.208 1.615.605 2.243 1.231.915.911 1.419 2.123 1.419 3.414v10.794zm18.671-52c4.604 0 9.155 4.514 9.155 9.062v12.166l-18.372.091v-12.111c.001-5.053 4.133-9.183 9.217-9.208zm-.011 303.901c-3.487-4.942-6.009-10.531-7.417-16.406 2.322.503 4.674.765 7.027.765 2.627 0 5.253-.326 7.839-.957-1.374 5.964-3.892 11.587-7.449 16.598zm45.031-140.899c0 7.101-11.452 7.66-11.452.131 0 0 .013-70.974.021-77.48.005-4.196-3.483-7.509-7.558-7.509l-58.389.29c-7.242 0-7.073-11.331.074-11.366l71.615-.355c3.463.295 5.359 2.168 5.688 5.617v90.672z" />
                                        </g>
                                        </g>
                                    </svg>
                                    </div>
                                    <div class="solu_title">
                                    <h3><strong>Sciences</strong></h3>
                                    </div>
                                    <div class="solu_description">
                                   <ol>
                                    <li>Math</li>
                                    <li>Physic</li>
                                    <li>Computer science</li>
                                    <li>Biology</li>
                                    <li>Chemistry</li>
                                   </ol>
                                    <button type="button" class="read_more_btn">View All</button>
                                    </div>
                                </div>
                                </a>
                            
                            <a href="{{ route('hire.tutor') }}">
                                <div class="solution_card">
                                    <div class="hover_color_bubble"></div>
                                    <div class="so_top_icon">
                                    <svg id="Layer_1" enable-background="new 0 0 512 512" height="50" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                        <g>
                                            <g>
                                            <g>
                                                <path d="m47.478 452.317 295.441 19.76c5.511.369 10.277-3.8 10.645-9.31l28.393-424.517c.369-5.511-3.8-10.276-9.31-10.645l-295.441-19.76c-5.511-.369-10.276 3.8-10.645 9.31l-28.394 424.517c-.368 5.511 3.8 10.277 9.311 10.645z" fill="#fae19e" />
                                            </g>
                                            <g>
                                                <g>
                                                <g>
                                                    <g>
                                                    <g>
                                                        <path d="m17.5 504.177h226.14l79.96-79.605v-355.86c0-5.523-4.477-10-10-10h-296.1c-5.523 0-10 4.477-10 10v425.466c0 5.522 4.477 9.999 10 9.999z" fill="#fff9e9" />
                                                    </g>
                                                    <path d="m313.601 58.712h-40c5.523 0 10 4.477 10 10v355.861l-.258 40.078 40.258-40.078v-355.861c0-5.523-4.477-10-10-10z" fill="#fff4d6" />
                                                    </g>
                                                </g>
                                                </g>
                                                <path d="m243.64 504.177v-70.253c0-5.523 4.477-10 10-10h69.96z" fill="#ffeec2" />
                                            </g>
                                            </g>
                                            <g>
                                            <path d="m468.636 248.58-33.372.165v-50.826c0-9.183 7.463-16.662 16.673-16.708h.007c9.217-.046 16.693 7.371 16.693 16.562v50.807z" fill="#fed23a" />
                                            <path d="m451.96 504.177c-10.362-10.277-16.196-24.263-16.208-38.857l-.062-73.973c0-.644.524-1.169 1.171-1.173l30.038-.149c.647-.003 1.171.517 1.171 1.161l.062 74.079c.012 14.531-5.749 28.472-16.015 38.756z" fill="#54b1ff" />
                                            <path d="m451.959 469.333h-.01c-14.434.072-26.14-11.542-26.14-25.935v-213.527c0-6.778 5.477-12.283 12.255-12.316l27.626-.137c6.826-.034 12.378 5.49 12.378 12.316v213.436c0 14.38-11.687 26.091-26.109 26.163z" fill="#fdf385" />
                                            <path d="m465.69 217.417-23.769.118c6.037.79 10.708 5.94 10.708 12.198v213.437c0 9.823-5.455 18.397-13.507 22.87 3.79 2.115 8.164 3.317 12.826 3.293h.01c14.422-.072 26.109-11.783 26.109-26.163v-213.436c.001-6.826-5.551-12.351-12.377-12.317z" fill="#faee6e" />
                                            <path d="m491.274 247.925-71.615.355c-7.305.036-13.226 5.968-13.226 13.248 0 7.281 5.921 13.153 13.226 13.117l58.389-.29v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c0-7.28-5.922-13.152-13.226-13.116z" fill="#54b1ff" />
                                            <g>
                                                <path d="m491.274 247.925-38.441.188-.167 26.311 25.381-.067v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c.001-7.282-5.921-13.154-13.225-13.118z" fill="#3da7ff" />
                                            </g>
                                            </g>
                                        </g>
                                        <g fill="#060606">
                                            <path d="m373.147 20.122-295.44-19.761c-9.631-.638-17.984 6.665-18.629 16.293l-2.311 34.557h-39.267c-9.649 0-17.5 7.851-17.5 17.5v425.466c0 9.649 7.851 17.5 17.5 17.5h226.141c1.96 0 3.902-.801 5.292-2.185l34.138-33.987c.347.074.701.133 1.065.157l58.282 3.898c9.302.614 18.005-6.952 18.629-16.293l28.393-424.515c.639-9.528-6.766-17.993-16.293-18.63zm-122.006 465.902v-52.1c0-1.378 1.122-2.5 2.5-2.5h51.9zm94.939-23.757c-.244 1.51-1.131 2.286-2.66 2.327l-46.28-3.096 31.752-31.611c1.414-1.407 2.209-3.32 2.209-5.315v-355.86c0-9.649-7.851-17.5-17.5-17.5h-77.993c-9.697 0-9.697 15 0 15h77.993c1.379 0 2.5 1.122 2.5 2.5v347.712h-62.46c-9.649 0-17.5 7.851-17.5 17.5v62.753h-218.641c-1.378 0-2.5-1.122-2.5-2.5v-425.465c0-1.378 1.122-2.5 2.5-2.5h178.168c9.697 0 9.697-15 0-15h-123.868l2.244-33.556c.244-1.511 1.131-2.286 2.661-2.327l295.44 19.76c1.511.244 2.287 1.131 2.328 2.661z" />
                                            <path d="m267.827 237.047h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m267.827 289.332h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m55.774 192.262c0 4.142 3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-204.553c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m91.807 139.977c0 4.142 3.358 7.5 7.5 7.5h132.487c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-132.487c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m194.755 438.787c-13.489.036-26.978.065-40.467.086-4.534.007-9.067.013-13.6.016-8.215.006-13.75-1.643-15.59-10.679-1.556-7.64-12.364-6.613-14.464 0-5.19 16.337-13.774 9.936-18.582-1.053-4.797-10.963-6.027-23.233-8.122-34.9-1.54-8.573-14.506-6.17-14.732 1.994-.298 10.751-1.302 21.331-4.031 31.758-2.815 10.758-7.034 21.097-11.222 31.376-3.651 8.961 10.867 12.816 14.464 3.988 3.711-9.108 7.427-18.266 10.193-27.714 5.14 12.36 15.774 26.34 30.927 18.101 2.819-1.533 5.452-3.712 7.763-6.253 7.88 9.106 19.609 8.388 30.584 8.375 15.627-.02 31.254-.054 46.881-.095 9.649-.025 9.667-15.025-.002-15z" />
                                            <path d="m505.932 246.439c-3.897-3.878-9.255-5.867-14.695-6.014l-5.668.028v-10.719c0-6.529-3.878-13.427-9.433-16.862v-15.098c0-31.069-48.372-30.934-48.372.146v15.1c-5.659 3.498-9.455 9.741-9.455 16.852v10.982c-24.966 1.7-25.037 39.745.028 41.232.16 33.575.152 66.6-.028 100.737-.049 9.414 14.949 9.966 15 .079.18-34.166.188-67.22.029-100.823l37.211-.185s-.048 110.848-.048 160.784c0 24.338-37.219 24.5-37.219-.253l.013-13.677c.585-9.68-14.387-10.583-14.973-.904v12.834c0 11 3.402 20.316 9.988 26.869.586 15.693 7.198 30.878 18.369 41.956 3.205 3.18 7.642 2.208 10.744-.182 11.365-11.385 17.769-26.394 18.169-42.414 4.951-4.931 9.908-9.896 9.908-26.896l.006-68.351c12.97 3.689 26.494-6.348 26.494-19.946v-90.672c0-5.523-2.155-10.709-6.068-14.603zm-72.623-5.727v-10.841c0-2.219 1.523-4.08 3.573-4.633l30.025-.149c.84.208 1.615.605 2.243 1.231.915.911 1.419 2.123 1.419 3.414v10.794zm18.671-52c4.604 0 9.155 4.514 9.155 9.062v12.166l-18.372.091v-12.111c.001-5.053 4.133-9.183 9.217-9.208zm-.011 303.901c-3.487-4.942-6.009-10.531-7.417-16.406 2.322.503 4.674.765 7.027.765 2.627 0 5.253-.326 7.839-.957-1.374 5.964-3.892 11.587-7.449 16.598zm45.031-140.899c0 7.101-11.452 7.66-11.452.131 0 0 .013-70.974.021-77.48.005-4.196-3.483-7.509-7.558-7.509l-58.389.29c-7.242 0-7.073-11.331.074-11.366l71.615-.355c3.463.295 5.359 2.168 5.688 5.617v90.672z" />
                                        </g>
                                        </g>
                                    </svg>
                                    </div>
                                    <div class="solu_title">
                                    <h3><strong>Languages</strong></h3>
                                    </div>
                                    <div class="solu_description">
                                    <ol>
                                      <li>Arabic</li>
                                      <li>English</li>
                                      <li>urdu</li>
                                      <li>Hindi</li>
                                      <li>chienes</li>  
                                    </ol>
                                    <button type="button" class="read_more_btn">View All</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('hire.tutor') }}">
                                <div class="solution_card">
                                    <div class="hover_color_bubble"></div>
                                    <div class="so_top_icon">
                                    <svg id="Layer_1" enable-background="new 0 0 512 512" height="50" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                        <g>
                                            <g>
                                            <g>
                                                <path d="m47.478 452.317 295.441 19.76c5.511.369 10.277-3.8 10.645-9.31l28.393-424.517c.369-5.511-3.8-10.276-9.31-10.645l-295.441-19.76c-5.511-.369-10.276 3.8-10.645 9.31l-28.394 424.517c-.368 5.511 3.8 10.277 9.311 10.645z" fill="#fae19e" />
                                            </g>
                                            <g>
                                                <g>
                                                <g>
                                                    <g>
                                                    <g>
                                                        <path d="m17.5 504.177h226.14l79.96-79.605v-355.86c0-5.523-4.477-10-10-10h-296.1c-5.523 0-10 4.477-10 10v425.466c0 5.522 4.477 9.999 10 9.999z" fill="#fff9e9" />
                                                    </g>
                                                    <path d="m313.601 58.712h-40c5.523 0 10 4.477 10 10v355.861l-.258 40.078 40.258-40.078v-355.861c0-5.523-4.477-10-10-10z" fill="#fff4d6" />
                                                    </g>
                                                </g>
                                                </g>
                                                <path d="m243.64 504.177v-70.253c0-5.523 4.477-10 10-10h69.96z" fill="#ffeec2" />
                                            </g>
                                            </g>
                                            <g>
                                            <path d="m468.636 248.58-33.372.165v-50.826c0-9.183 7.463-16.662 16.673-16.708h.007c9.217-.046 16.693 7.371 16.693 16.562v50.807z" fill="#fed23a" />
                                            <path d="m451.96 504.177c-10.362-10.277-16.196-24.263-16.208-38.857l-.062-73.973c0-.644.524-1.169 1.171-1.173l30.038-.149c.647-.003 1.171.517 1.171 1.161l.062 74.079c.012 14.531-5.749 28.472-16.015 38.756z" fill="#54b1ff" />
                                            <path d="m451.959 469.333h-.01c-14.434.072-26.14-11.542-26.14-25.935v-213.527c0-6.778 5.477-12.283 12.255-12.316l27.626-.137c6.826-.034 12.378 5.49 12.378 12.316v213.436c0 14.38-11.687 26.091-26.109 26.163z" fill="#fdf385" />
                                            <path d="m465.69 217.417-23.769.118c6.037.79 10.708 5.94 10.708 12.198v213.437c0 9.823-5.455 18.397-13.507 22.87 3.79 2.115 8.164 3.317 12.826 3.293h.01c14.422-.072 26.109-11.783 26.109-26.163v-213.436c.001-6.826-5.551-12.351-12.377-12.317z" fill="#faee6e" />
                                            <path d="m491.274 247.925-71.615.355c-7.305.036-13.226 5.968-13.226 13.248 0 7.281 5.921 13.153 13.226 13.117l58.389-.29v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c0-7.28-5.922-13.152-13.226-13.116z" fill="#54b1ff" />
                                            <g>
                                                <path d="m491.274 247.925-38.441.188-.167 26.311 25.381-.067v77.489c0 7.281 5.921 13.153 13.226 13.117 7.305-.036 13.226-5.968 13.226-13.248v-90.672c.001-7.282-5.921-13.154-13.225-13.118z" fill="#3da7ff" />
                                            </g>
                                            </g>
                                        </g>
                                        <g fill="#060606">
                                            <path d="m373.147 20.122-295.44-19.761c-9.631-.638-17.984 6.665-18.629 16.293l-2.311 34.557h-39.267c-9.649 0-17.5 7.851-17.5 17.5v425.466c0 9.649 7.851 17.5 17.5 17.5h226.141c1.96 0 3.902-.801 5.292-2.185l34.138-33.987c.347.074.701.133 1.065.157l58.282 3.898c9.302.614 18.005-6.952 18.629-16.293l28.393-424.515c.639-9.528-6.766-17.993-16.293-18.63zm-122.006 465.902v-52.1c0-1.378 1.122-2.5 2.5-2.5h51.9zm94.939-23.757c-.244 1.51-1.131 2.286-2.66 2.327l-46.28-3.096 31.752-31.611c1.414-1.407 2.209-3.32 2.209-5.315v-355.86c0-9.649-7.851-17.5-17.5-17.5h-77.993c-9.697 0-9.697 15 0 15h77.993c1.379 0 2.5 1.122 2.5 2.5v347.712h-62.46c-9.649 0-17.5 7.851-17.5 17.5v62.753h-218.641c-1.378 0-2.5-1.122-2.5-2.5v-425.465c0-1.378 1.122-2.5 2.5-2.5h178.168c9.697 0 9.697-15 0-15h-123.868l2.244-33.556c.244-1.511 1.131-2.286 2.661-2.327l295.44 19.76c1.511.244 2.287 1.131 2.328 2.661z" />
                                            <path d="m267.827 237.047h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m267.827 289.332h-204.553c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                            <path d="m55.774 192.262c0 4.142 3.358 7.5 7.5 7.5h204.553c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-204.553c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m91.807 139.977c0 4.142 3.358 7.5 7.5 7.5h132.487c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-132.487c-4.142 0-7.5 3.358-7.5 7.5z" />
                                            <path d="m194.755 438.787c-13.489.036-26.978.065-40.467.086-4.534.007-9.067.013-13.6.016-8.215.006-13.75-1.643-15.59-10.679-1.556-7.64-12.364-6.613-14.464 0-5.19 16.337-13.774 9.936-18.582-1.053-4.797-10.963-6.027-23.233-8.122-34.9-1.54-8.573-14.506-6.17-14.732 1.994-.298 10.751-1.302 21.331-4.031 31.758-2.815 10.758-7.034 21.097-11.222 31.376-3.651 8.961 10.867 12.816 14.464 3.988 3.711-9.108 7.427-18.266 10.193-27.714 5.14 12.36 15.774 26.34 30.927 18.101 2.819-1.533 5.452-3.712 7.763-6.253 7.88 9.106 19.609 8.388 30.584 8.375 15.627-.02 31.254-.054 46.881-.095 9.649-.025 9.667-15.025-.002-15z" />
                                            <path d="m505.932 246.439c-3.897-3.878-9.255-5.867-14.695-6.014l-5.668.028v-10.719c0-6.529-3.878-13.427-9.433-16.862v-15.098c0-31.069-48.372-30.934-48.372.146v15.1c-5.659 3.498-9.455 9.741-9.455 16.852v10.982c-24.966 1.7-25.037 39.745.028 41.232.16 33.575.152 66.6-.028 100.737-.049 9.414 14.949 9.966 15 .079.18-34.166.188-67.22.029-100.823l37.211-.185s-.048 110.848-.048 160.784c0 24.338-37.219 24.5-37.219-.253l.013-13.677c.585-9.68-14.387-10.583-14.973-.904v12.834c0 11 3.402 20.316 9.988 26.869.586 15.693 7.198 30.878 18.369 41.956 3.205 3.18 7.642 2.208 10.744-.182 11.365-11.385 17.769-26.394 18.169-42.414 4.951-4.931 9.908-9.896 9.908-26.896l.006-68.351c12.97 3.689 26.494-6.348 26.494-19.946v-90.672c0-5.523-2.155-10.709-6.068-14.603zm-72.623-5.727v-10.841c0-2.219 1.523-4.08 3.573-4.633l30.025-.149c.84.208 1.615.605 2.243 1.231.915.911 1.419 2.123 1.419 3.414v10.794zm18.671-52c4.604 0 9.155 4.514 9.155 9.062v12.166l-18.372.091v-12.111c.001-5.053 4.133-9.183 9.217-9.208zm-.011 303.901c-3.487-4.942-6.009-10.531-7.417-16.406 2.322.503 4.674.765 7.027.765 2.627 0 5.253-.326 7.839-.957-1.374 5.964-3.892 11.587-7.449 16.598zm45.031-140.899c0 7.101-11.452 7.66-11.452.131 0 0 .013-70.974.021-77.48.005-4.196-3.483-7.509-7.558-7.509l-58.389.29c-7.242 0-7.073-11.331.074-11.366l71.615-.355c3.463.295 5.359 2.168 5.688 5.617v90.672z" />
                                        </g>
                                        </g>
                                    </svg>
                                    </div>
                                    <div class="solu_title">
                                    <h3><strong>Technology</strong></h3>
                                    </div>
                                    <div class="solu_description">
                                    <ol>
                                     <li>Teach HTML onlline</li>
                                      <li>Teach CSS onlline</li>
                                      <li>Teach Java onlline</li>
                                      <li>Teach Web development  onlline</li>
                                      <li>Teach Laravel onlline</li>
                                    </ol>
                                    <button type="button" class="read_more_btn">View All</button>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <!--  -->
                           
                        </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom py-2 d-none">
                                <h3 class="py-2" style="color:42b979; text-align: center; margin: 10px;"><strong>Discover the Perfect Tutor for Your Needs</strong></h3>
                            </div>
                <div class="form col rounded p-4 align-item-center d-none">
                            
                            <form class=" g-3">
                                <p class="fs-5 text-secondary pt-2">
                                    Tell us your learning needs and get immediate response from
                                    qualified tutors
                                </p>
                                <div class="row " id="page-1">
                                   <h3 class="text-center form-headings" style="text-align: left !important; font-size:  16px;">What are you looking for?<b style="color: red;
                                    font-size: 20px;">*</b></h3>
                                    <div class="choice col-12 ">

                                        <ul class="p-0 mb-0">
                                            <li class="d-flex align-items-center fs-5 py-2">
                                                <input class="m-2 d-none chose-subject" type="radio" value="Online Tutor" name="subjects"
                                                    id="option-1">
                                                <label for="option-1" style="font-size:16px;">Online Tutor </label>
                                            </li>
                                            <li class="d-flex align-items-center fs-5 py-2">
                                                <input class="m-2 d-none chose-subject" type="radio" value="Tutor for home" name="subjects"
                                                    id="option-2">
                                                <label for="option-2"  style="font-size:16px;">Tutor for Home</label>
                                            </li>
                                            <li class="d-flex align-items-center fs-5 py-2">
                                                <input class="m-2 d-none chose-subject" type="radio" value="Both" name="subjects"
                                                    id="option-3">
                                                <label for="option-3"  style="font-size:16px;">Both</label>
                                            </li>
                                        </ul>
                                </div>

                                <div class="col-md-6 pt-3">
                                    <label for=""><strong class="form-headings">Enter your name <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input required="" name="name" type="text" placeholder="*Name" class="inp-1" style="width:100%;">
                                </div>

                                <div class="col-md-6 pt-3">
                                    <label for=""><strong class="form-headings">Enter your email <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                  <input required="" name="email" type="email" placeholder="*Email" class="inp-1" style="width:100%;">
                                </div>
                                <div class="col-ma-6 pt-3" style="width:100%;">
                                <label for=""><strong class="form-headings">Enter your number <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="text" placeholder="Mobile*" class="form-control py-3"
                                        id="inputPassword4" />
                                </div>

                                <div class="col-md-6 ">
                                 <label for=""><strong class="form-headings">Select your country <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <select class="px-2 h-100 w-100" style="border: 1px solid #ddd; border-radius: 4px;height: 57px !important; margin-top: 17px; color:#857979;">
                                        
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="pakistan">Pakistan</option>
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
                                 <label for=""><strong class="form-headings">Enter your city <b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                    <input type="text" placeholder="City" id="inputPassword4" class="form-control py-3">
                                </div>

                                <div class="col-md-6 ">
                                   <label for="dropdown1" class=" pb-1">
                                    <strong class="form-headings">Select your grade <b style="color: red;
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
                                  <label for=""><strong class="form-headings">Enter your subject<b style="color: red;
                                    font-size: 20px;">*</b></strong></label>
                                   <input type="text" placeholder="Subject" id="inputPassword4" class="form-control py-3" style="height: 53px;">
                               </div>
                        <div class="chk-box col-12 py-2 d-flex">
                                    <input type="checkbox" class="mb-3 d-none mx-2 common_checkbox" id="agreeWithTerm" />
                                    <label class="checkBox_label pointer d-flex align-item-center"
                                        for="agreeWithTerm"><a style="text-decoration:none" href="{{route('terms.condition')}}" class="px-1 b-text">I agree to the Edexcel Academy & Educational Consultancy<b
                                                class="text-danger">Terms &
                                                Conditions</b></a>
                                    </label>
                                </div>
                                <div class="col d-flex  py-3">
                                    <button type="submit" class="btn bg_theme_green text-light fw-bold">Submit Form</button>
                </div>
                            </form>
                           
                        </div>
            </section>
            <div class="p-0" id="FAQ">
                    <div class="col-12">
                        <h2 class="py-0 my-4 text-center text-capitalize fw-bold" style="color:#42b979;">
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

                <div class="testimonial-slider">
        <div id="carouselExampleControls" class="carousel carousel-dark">
          <div class="container-fluid">
            <div class="row">
                <div>
                    <h2 class="happy-clients my-2" style="color: #42b979; text-align: center;"><b>Happy Clients</b></h2>
               </div>
              <div class="col-md-4">
                <div class="testimonial-title">
                    
                  <i class="bi bi-quote display-1"></i>
                  <h2 class="fw-bold display-6">Edexcel Customers</h2>
                  <p>Our customers are at the heart of everything we do. We're thrilled to have a growing community of satisfied clients who have experienced our services.</p>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="background: #42b979;">
                  <span class="" aria-hidden="true" >
                  <i class="fa-solid fa-arrow-left"></i>
                  </span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="background: #42b979;">
                  <span class="" aria-hidden="true">
                  <i class="fa-solid fa-arrow-right"></i>
                  </span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <div class="col-md-8">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-1-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <i class="bi bi-star-fill text-warning pe-1"></i>
                        <i class="bi bi-star-fill text-warning pe-1"></i>
                        <i class="bi bi-star-fill text-warning pe-1"></i>
                        <i class="bi bi-star-fill text-warning pe-1"></i>
                        <i class="bi bi-star-fill text-warning pe-1"></i>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-2-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-3-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-4-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 4</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-5-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 5</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card">
                      <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-6-scaled.jpg" class="d-block w-100" alt="..."> </div>
                      <div class="card-body">
                        <h5 class="card-title">Card title 6</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="goToTop fw-20px" style="background-color:#42B979" onclick="window.scrollTo(0, 0)"><i
            class="fa-solid fa-chevron-up"></i></button>

    <!-- footer start... -->

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!-- Your custom script -->
    <script>
        var multipleCardCarousel = document.querySelector("#carouselExampleControls");

        if (window.matchMedia("(min-width: 576px)").matches) {
          var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false
          });
          var carouselWidth = document.querySelector(".carousel-inner").scrollWidth;
          var cardWidth = document.querySelector(".carousel-item").offsetWidth;
          var scrollPosition = 0;
          document.querySelector("#carouselExampleControls .carousel-control-next").addEventListener("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 3) {
              scrollPosition += cardWidth;
              document.querySelector("#carouselExampleControls .carousel-inner").scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
              });
            }
          });
          document.querySelector("#carouselExampleControls .carousel-control-prev").addEventListener("click", function () {
            if (scrollPosition > 0) {
              scrollPosition -= cardWidth;
              document.querySelector("#carouselExampleControls .carousel-inner").scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
              });
            }
          });
        } else {
          multipleCardCarousel.classList.add("slide");
        }
    </script>

    
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
