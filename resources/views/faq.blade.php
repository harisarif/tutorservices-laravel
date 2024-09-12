<link rel="stylesheet" href="./css/new-home.css">
@extends('layouts.app')
@section('content')
    <style>    
     .modalBox{
        display: none !important;
     }
     .ad-heading-div{
        background-color: #fafafa;
        border-bottom-right-radius: 170px;
     }
     .ad-line-child{
        border:5px solid #42b979;
        width: 60px;
        margin: 10px 0;
     }
      */
    </style>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
    </script>
    <body>
    @include('whatsapp')
    <header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
        </header>
        <section class="ad-heading-div">
                <div class="container">
                    <div class="row">
                       <div class="col-12">
                        <div class="ad-line-child"></div>
                        <h2 class="py-0 my-4 text-left text-capitalize fw-bold" style="color:#42b979;">
                            Frequently Asked Questions
                        </h2>
                       </div>
                    </div>
                </div>
    </section>
    <section class="ad-flex" style="display: flex;  margin: 10px 50px;">
        <div data-aos="fade-left" class="wrapper container" style="margin: 0 30px;">
            <div class="p-0" id="FAQ">
                    <div class="col-12 ms-1 ">
                        <div class="list-group-item border rounded my-2 px-2">
                            <div class="d-flex justify-content-between align-items-center"
                                onclick="toggle('para','toggle-arrow')">
                                <h6 class="fw-bold py-3">
                                    How can students improve their knowledge?
                                </h6>
                                <i class="fa fa-chevron-down" id="toggle-arrow"></i>
                            </div>
                            <div id="para" style="height:auto;">
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
            </div>
            <div id="filter-col" class="d-none col col-lg-3 d-md-block my-0 p-0" style="overflow: hidden;    width: 280px;">
                        <div class="filter-1 border d-none">
                            <div class="col bg-body-secondary p-2 d-flex align-items-center justify-content-between">
                                <span><i class="fas fa-filter"></i> Filter</span>
                                <span onclick="hideNShow('filter-col')" class="fs-1 text-secondary d-md-none">×</span>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-1')">
                                    Subject
                                    <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)" aria-hidden="true"></i>
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
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-2')">
                                    Curriculum
                                    <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)" aria-hidden="true"></i>
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
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-3')">
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
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-4')">
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
                            <video src="images/video.mp4" class="object-fit-cover mt-2" autoplay="" muted="" loop="" width="100%"></video>

                    </div>
    </section>
    <footer>
            <div class="container" style="width: 1100px;">
                <div class="row py-5">
                    <div class="col-lg-4 col-sm-12">
                        <ul class="my-2">
                            <li class="AB-footer text-white fs-5 d-block fw-bold ">{{ __('messages.Other Pages') }}</li>
                            <li class="ad-footer d-block py-1 ease-in-out duration-300">
                                
                                <a class="text-decoration-none text-light ease-in-out duration-300 ... "href="{{route('faq.index')}}">{{ __('messages.FAQ') }}</a>
                            </li>
                            <li class="ad-footer d-block py-1">
                            <a class="text-decoration-none text-light " href="{{route('policy.index')}}">{{ __('messages.Privacy Policy') }}</a>
                            </li>
                            <li class="ad-footer d-block py-1 ">
                                <a class="text-decoration-none text-light" href="{{route('terms.condition')}}">{{ __('messages.Terms & Conditions') }}</a>
                            </li>
                        </ul>
                    
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <ul class="my-2">
                            <li class="AB-footer text-white fs-5 d-block fw-bold">{{ __('messages.Edexcel Socials') }}</li>
                            <li class="ad-footer d-block py-1">
                                <a target="_blank"
                                    href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d"class="text-decoration-none">
                                    <i class="fa-brands fa-facebook text-light" aria-hidden="true"></i>
                                    <span class="text-light ">{{ __('messages.Facebook') }}</span>
                                </a>  
                            </li>
                                <li class="ad-footer d-block py-1">
                                        <a target="_blank"
                                        href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr" class="text-decoration-none">
                                            <i class="fa-brands fa-instagram text-light"></i>
                                            <span class="text-light">{{ __('messages.Instagram') }}</span>
                                        </a>
                                </li>

                                <li class="ad-footer d-block py-1">
                                    <a target="_blank" href="https://www.linkedin.com/in/edexcel-edu-130983310/" class="text-decoration-none">
                                        <i class="fa-brands fa-linkedin text-light" aria-hidden="true"></i>

                                    <span class="text-light ">{{ __('messages.LinkedIn') }}</span>
                                    </a>
                                </li>

                                <li class="ad-footer d-block py-1">
                                    <a target="-blank" href="#" class="text-decoration-none">
                                    <i class="fa-brands fa-youtube text-white" aria-hidden="true"></i>
                                    <span class="text-light ">{{ __('messages.Youtube') }}</span>
                                    </a>
                                </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-12col-4">
                        <ul class="my-2">
                            <li class="AB-footer text-white fs-5 d-block fw-bold">{{ __('messages.Contact Us') }} </li>
                            <li class="ad-footer d-block py-1">
                            <i class="fa-solid fa-location-dot text-white"></i>
                            <span class="text-white">{{ __('messages.Dubai') }}</span>
                            </li>
                            <li class="ad-footer d-block py-1 d-flex" style="align-items: center;">
                                <i class="fa fa-envelope-square text-white" aria-hidden="true" ></i>
                                <a class=" text-decoration-none text-white mx-1" href="mailto:info@eduexceledu.com" >{{ __('messages.info@eduexceledu.com') }}</a>
                            </li>
                            <li class="ad-footer d-block py-1">
                            <i class="fa-solid fa-phone text-white" aria-hidden="true" ></i>
                            <a class=" text-decoration-none text-white" href="tel:+971566428066" >+971 56 642 8066</a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    
 @endsection
 