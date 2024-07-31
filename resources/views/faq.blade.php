<link rel="stylesheet" href="./css/new-home.css">
@extends('layouts.app')
@section('content')
<style>
footer{
    position: fixed;
    top: 92%;
}
.modalBox{
        display: none !important;
    }
</style>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<div  data-aos="fade-left" class="row mini_header m-0 p-0 container-fluid position-relative">
        <div data-aos="fade-left" class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">
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
             </li>
            </ul>
            <div>
            

                <ul  class="icons d-flex p-2 m-0 justify-content-center align-items-center gap-3" style="list-style:none;">   
                  
                <div data-aos="fade-left">
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
                <div data-aos="fade-left" class="fixed" id="social" style="position: fixed;
    top: 200px;
    right: 0;">
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
               
            </div>
        </div>
    </div>
    <div data-aos="fade-left" class="wrapper container">
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
            
@endsection