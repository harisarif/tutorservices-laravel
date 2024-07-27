@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/teacher-detail.css') }}">
@section('content')
<body>
@include('whatsapp')
        <header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('hiring-tutor') }}"><img src="{{ asset('images/logo.png') }}" alt="EDEXCEL-logo"height="50px"></a>

        </header>
    <section class="Banner">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" class="banner">
                    <div class="hadding">
                        <div class="line"></div>
                        <h3><b>HS1</b></h3>
                        <h1><b>AGE 5-7</b></h1>
                        <h2><b>ALL Subjects</b></h2>
                    </div>
                    <div class="img">
                        <div class="position">
                            <div class="img-card">
                                <img src="{{ asset('images/thum-removebg-preview.png') }}"  alt="">
                            </div>
                            <div class="img-div">
                                <img src="{{ asset('images/child1-removebg-preview.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div data-aos="fade-right" class="kids">
            <div class="img-card-div">
                <img src="{{ asset('images/kids.jpg') }}" alt="">
            </div>
            <div class="deatil">
                <div class="line"></div>
                <h1>Get a trusted Indexl Tutor Today!</h1>

                <div class="detail-div">
                    <span><i class="fa fa-check" aria-hidden="true"></i> Learn online with vetted Tutors
                    </span>
                </div>

                <div class="detail-div">
                    <span><i class="fa fa-check" aria-hidden="true"></i><span style="margin-left: 5px;">You're in control, with lessons that fit around
                        your schedule</span>
                    </span>
                </div>

                <div class="detail-div">
                    <span><i class="fa fa-check" aria-hidden="true"></i> Our First 30 mins Lesson is FREE and we also
                        run free assessment every 10 Lessons.
                    </span>
                </div>
                <div data-aos="fade-right">
                    <a href=""><button  class="btn btn-success">Get Start</button></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="container">
        <div data-aos="fade-right" class="education">

            <div class="hadding-div">
                <div data-aos="fade-left" class="line-div"></div>
                <h2>Our tutors cover all aspects of Primary <br> education including</h2>

                <div class="deatil-box-1">
                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Primary Basic Skills in English,
                            Maths and Science</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Grammar, Punctuation &
                            Vocabulary</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Literacy & Language</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Reading & Comprehension</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Spelling & Composition</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>SATs tests</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Primary Numeracy &
                            Mathematics</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Arithmetic's – Addition,
                            Subtraction, Multiplication & Division</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Numbers, shapes and movement,
                            measurement and data</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Problem solving</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>Verbal Reasoning</span>
                    </div>

                    <div class="detail-box">
                        <span><i class="fa-solid fa-circle-dot" aria-hidden="true"></i>11+ Exam Preparation</span>
                    </div>
                </div>
            </div>


            <div class="img-card-div">
                <img src="{{ asset('images/boy.jpg') }}" alt="">
            </div>
        </div>
    </section>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
@endsection