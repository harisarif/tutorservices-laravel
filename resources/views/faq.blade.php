    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Faq Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
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
     .ad-line {
        border: 5px solid #42b979;
        width: 60px;
        margin: 17px 0;
      }
      .ad-heading-te h3 {
        font-size: 23px;
        color:#42b979
      }
      .fb-ad {
        margin: 0 40px;
      }
      .custom-select-wrapper {
        position: relative;
        display: flex;
        cursor: pointer;
        text-align: justify;
      }
      [dir="rtl"] .custom-select-web  {
        margin-left: 25px;
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
    [dir="rtl"] .ad-heading-div  {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 170px;
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
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
    </script>
    <body>
             @include('whatsapp')
             <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;" onclick="window.scrollTo(0, 0)"><i class="fa-solid fa-chevron-up"></i></button>    
            <header class="text-center bg-white m-0 p-2 d-flex  justify-content-center align-items-center">
                
                <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
                <div class="custom-select-wrapper">
                    @include('language')
                </div>
            </header>
            <section class="ad-heading-div">
                <div class="fb-ad">
                    <div class="row">
                       <div class="col-12">
                        <div class="ad-line-child"></div>
                        <h1 class="py-0 my-4 text-left text-capitalize fw-bold" style="color:#42b979; font-size: 50px;">
                            {{ __('messages.Frequently Asked Questions') }}
                        </h1>
                        <h4><b>{{ __('messages.For Edexcel Academy  Educational Consultancy') }}</b></h4>
                       </div>
                    </div>
                </div>
            </section>
            <section class="fb-ad ">
                <div class="ad-line"></div>
                <div class="ad-heading-te">
                    <h3 ><b>Frequently  Questions for Edexcel Academy Educational Consultancy
                    </b></h3>
                    <span>{{ __('messages.Effective Date: 26.7.2024') }}</span>
                </div>
            </section>
            <section class="ad-flex" style="display: flex;  margin: 10px 20px;">
                <div data-aos="fade-left" class="wrapper container">
                    
                    <div class="p-0" id="FAQ">
                            <div class="col-12 ms-1 ">
                                <div class="list-group-item border rounded my-2 px-2">
                                    <div class="d-flex justify-content-between align-items-center"
                                        onclick="toggle('para','toggle-arrow')">
                                        <h6 class="fw-bold py-3">
                                        {{ __('messages.How can students improve their knowledge?') }}
                                        </h6>
                                        <i class="fa fa-chevron-down" id="toggle-arrow"></i>
                                    </div>
                                    <div id="para" style="height:auto;">
                                        <p>
                                        {{ __('messages.Students can improve their knowledge and skills in a number of ways like:') }}
                                        </p>
                                        <ul>
                                            <li> {{ __('messages.Practicing solutions regularly.') }}</li>
                                            <li>
                                            {{ __('messages.Understand the underlying concepts/formulas clearly.') }}
                                            </li>
                                            <li>{{ __('messages.Solving additional exercises.') }}</li>
                                            <li>{{ __('messages.Sharing a positive attitude about the subject.') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-group-item border rounded my-2 px-2">
                                    <div class="d-flex justify-content-between align-items-center"
                                        onclick="toggle('para1','toggle-arrow1')">
                                        <h6 class="fw-bold py-3">
                                        {{ __('messages.How can tutors help students improve their score and skills?') }}
                                        </h6>
                                        <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                                    </div>
                                    <div id="para1">
                                        <p>
                                        {{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}
                                        </p>
                                        <ul>
                                            <li>{{ __('messages.Build confidence in the student.') }}</li>
                                            <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                                            <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                                            <li>
                                            {{ __('messages. Provide authentic problems that increase students’ drive to engage with the subject.') }}
                                            </li>
                                            <li>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="list-group-item border rounded my-2 px-2">
                                    <div class="d-flex justify-content-between align-items-center"
                                        onclick="toggle('para2','toggle-arrow2')">
                                        <h6 class="fw-bold py-3">
                                        {{ __('messages.Want to know what we can offer?') }}
                                        </h6>
                                        <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                                    </div>
                                    <div id="para2">
                                        <p>
                                        {{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}
                                        </p>
                                        <ul>
                                            <li>{{ __('messages.Build confidence in the student.') }}</li>
                                            <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                                            <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                                            <li>{{ __('messages.EProvide authentic problems that increase students’ drive to engage with the subject.') }}
                                                
                                            </li>
                                            <li>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="list-group-item border rounded my-2 px-2">
                                    <div class="d-flex justify-content-between align-items-center"
                                        onclick="toggle('para3','toggle-arrow3')">
                                        <h6 class="fw-bold py-3">
                                        {{ __('messages.If you have tried all means and yet looking for a tutor❓') }}
                                        </h6>
                                        <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                                    </div>
                                    <div id="para3">
                                        <p>{{ __('messages.There are many ways students can improve their skills. But experienced tutors in Dubai can help to:') }}
                                            
                                        </p>
                                        <ul>
                                            <li>{{ __('messages.Build confidence in the student.') }}</li>
                                            <li>{{ __('messages.Encourage questioning and make space for curiosity.') }}</li>
                                            <li>{{ __('messages.Emphasize conceptual understanding over procedure.') }}</li>
                                            <li>{{ __('messages.Provide authentic problems that increase students’ drive
                                                to engage with the subject.') }}
                                            </li>
                                            <li>>{{ __('messages.Share a positive attitude about the subject.') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter-col" class="d-none col col-lg-3 d-md-block my-0 p-0" style="overflow: hidden;">
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
                                <video src="images/video.mp4" class="object-fit-cover mt-2" autoplay="" muted="" loop="" width="100%"></video>

                </div>   
            </section>
    </body>
    
 @endsection
 <script>
    
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