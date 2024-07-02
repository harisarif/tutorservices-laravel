@extends('layouts.app')
<style>
   #allModal {
            display: none !important;
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
    <header class="main_header d-flex  align-items-end">
        {{-- <a class="nav-link active px-3 py-0 fw-bold" aria-current="page" href="./hire_tutor.html"><i>&#8592; Hire
                Tutor</i></a> --}}
        <a class="m-auto" href="{{ route('newhome') }}"><img style="height: 50px" src="{{asset('images/logo.png')}}" alt="EDEXCEL-logo"
                                                          height="50px"></a>

    </header>
    <main class="hireTutor">
        
        <div class="row m-0 px-4">
            <div class="main-page col-12 col-md-6 mx-auto my-3 p-0 text-center ">
                <!-- page-1 header -->
                <div class="col m-1 py-3 text-center flex-column rounded-top bg-body-secondary">
                    <h3>Post Learning Requirement - It's Free!</h3>
                    <p>Post your learning requirement and let interested tutors contact you</p>
                    <span><i> If you are a tutor </i><a href="{{ route('tutor') }}" class="theme_text_green text-decoration-none">
                            <b>Click here</b></a></span>

                </div>
                <!-- loading -->
                <div class="col-12 d-flex justify-content-center py-3 border-bottom">
                    <b class="theme_text_green px-2 persentage-num">25%</b>
                    <div class="loading bg-body-secondary my-2">
                        <div class="percentage bg_theme_green"></div>
                    </div>
                </div>
                <form action="{{ route('student-create') }}" method="POST" class="pages">
                    @csrf
                    <div style="min-height: 350px;">


                        <!-- page-1 -->
                        <div class="col " id="page-1">
                            <h3 class="text-center pt-5">What are you looking for?</h3>
                            <div class="choice col-12 px-3 py-5">

                                <ul class="p-0 ">
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Online Tutor" name="subjects"
                                            id="option-1">
                                        <label for="option-1">Online Tutor </label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Tutor for home" name="subjects"
                                            id="option-2">
                                        <label for="option-2">Tutor for Home</label>
                                    </li>
                                    <li class="d-flex align-items-center fs-5 py-2">
                                        <input class="m-2 d-none chose-subject" type="radio" value="Both" name="subjects"
                                            id="option-3">
                                        <label for="option-3">Both</label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- page-2 -->
                        <div class="col-12 d-none" id="page-2">
                            <h3 class="text-center py-3"><b>Sign Up</b></h3>
                            <div class="col">
                                <input required name="name" type="text" placeholder="*Name"  class="inp-1">
                                <input required name="email" type="email" placeholder="*Email"  class="inp-1">
                                <input required name="phone" type="number" placeholder="*Mobile"  min="0" class="inp-1">
                                <div class="col-12 ">
                                    <!-- <select class="form-select py-2 mx-auto" style="width: 86%;" aria-label="Default select example" name="Time Availbility">
                                        <option selected>Time Availbilty</option>
                                        <option value="10 - 11">10 - 11</option>
                                        <option value="11 - 12">11 - 12</option>
                                        <option value="12 - 01">12 - 01</option>
                                    </select> -->
                               
<label for="classStartTime" class="d-block text-start " style=" width: 86%; margin: 0 auto; font-weight: 600;">Starting time</label>

    <input class="inp-1" title="Class start time" type="time" name="class_start_time" id="classStartTime">

<label for="classEndTime" class="d-block text-start " style=" width: 86%; margin: 0 auto; font-weight: 600;">Ending time</label>

    <input class="inp-1" title="Class end time" type="time" name="class_end_time" id="classEndTime">


                                </div>

                            </div>
                        </div>

                        <!-- page-3 -->
                        <div class="col-12 px-5 py-4 d-none" id="page-3">
                            <h3>Select a Subject</h3>
                            <p>( Which subject tutor are you looking for? )</p>
                            <div class="col-12 mb-2">
                                <input type="number" class="form-control" id="whatsapp" name="whatsapp_number" placeholder="Whatsapp number "
                                    required />
                            </div>
                            <div class="col-12 mb-2">
                                <select name="country" id="country" class="form-select" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-2">
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" required>
                            </div>
                            <div class="form-group" style="text-align:left; ">
                      <label for="dropdown1" class="pt-1 pb-1" > <strong>Select your class</strong></label>
                      <select class="form-control" id="dropdown1">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                      </select>
                    </div>
                            <label class="form-label" style="display: flex;font-size:14px;font-weight:bold; padding:5px 0;">Subject</label>
                            <div class="form-group">
                                
                                <input type="search" value="English" name="subject" class="form-control" id="page1-search" placeholder="Search">
                            </div>
                            <ul class="list-group" id="searchList">
                                <li onclick="page1List(this)" class="list-group-item text-start">English</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Mathematics</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Physics</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Chemistry</li>
                                <li onclick="page1List(this)" class="list-group-item text-start">Urdu</li>
                            </ul>


                        </div>

                        <!-- page-4 -->
                        <div class="col d-none" id="page-4">
                            <h4 class="text-center py-3">Enter password to create an Account<i
                                    class="fs-6 text-secondary">
                                    (Required)</i></h4>
                            <input required type="email" name="c_email" placeholder="*Email" class="inp-1" readonly>
                            <input required type="password" name="password" placeholder="*Password"  class="inp-1">
                            <input required type="password" name="c_password" placeholder="*Confirm Password"  class="inp-1">

                        </div>

                    </div>

                    <div class="col-12 my-5 d-flex justify-content-center px-5">

                        <input onclick="backStep(this)" id="back-btn" type="button" value="Previous"
                            class="border-0 bg-body-secondary text-dark fs-6 py-1 px-4 rounded d-none">
                        <input onclick="NextStep(this)" id="next-btn" type="button" value="Next"
                            class="border-0 bg_theme_green text-light fs-6 py-1 px-4 rounded">
                            
                    </div>
                </form>


            </div>



        </div>
        </div>

        
    </main>
    <script src="./js/hire_tutor.js"></script>
</body>
@endsection
@section('js')
<script>
     $(document).ready(function($) {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            })
</script>
@endsection