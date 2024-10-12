@extends('layouts.app')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Blog Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<style>
    .modalBox{
        display: none !important;
    }
    .container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        width: 940px;
        margin: auto;
    }
    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 380px;
        height: 98% !important;
    }
    .card-header img {
        width: 100%;
        height: 170px;
        object-fit: cover;
    }
    .card-body {
        display: flex;
        flex-direction: column;
        align-items: start;
        padding: 20px;
    }
    .cards-div{
        margin: 3% 5%;
    }
    .tag {
        background-color: #ccc;
        color: #fff;
        border-radius: 50px;
        font-size: 12px;
        margin: 0;
        padding: 2px 10px;
        text-transform: uppercase;
    }
    .tag-teal {
        background-color: #92d4e4;
    }
    .tag-purple {
        background-color: #3d1d94;
    }
    .tag-pink {
        background-color: #c62bcd;
    }
    .card-body h4 {
        margin: 10px 0;
    }
    .card-body p {
        font-size: 14px;
        margin: 0 0 8px 0;
        font-weight: 500;
        color: rgb(70, 68, 68);
    }
    .user {
        display: flex;
        margin-top: auto;
    }
    .user img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
        object-fit: cover;
    }
    .user-info h5 {
        margin: 0;
    }
    .user-info small {
        color: #888785;
    }
    @media (max-width: 940px) {
    .container {
            grid-template-columns: 1fr;
            justify-items: center;
        }
    }
    @media (max-width: 425px) {
        .links-footer{
            text-align: justify;
            width: 100% !important;
        }
        .cards-div{
            margin: 7% 0;
        }
        .ad-heading-div{
            border-radius: 0 !important;
        }
    }
    .links-footer{
        width: 1100px;
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
    [dir="rtl"] .ad-heading-div{
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 170px;
    }
    [dir="rtl"] .custom-options-web {
        left: 10px;
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
    [dir="rtl"] .main-footer  {
        text-align: justify;
    }
    .ad-heading-div {
        background-color: #fafafa;
        border-bottom-right-radius: 170px;
    }
    .fb-ad {
        margin: 0 5%;
    }
    .ad-line-child {
        border: 5px solid #42b979;
        width: 60px;
        margin: 10px 0;
    }
    
</style>
@section('content')
    @include('whatsapp')
    <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 66;" onclick="window.scrollTo(0, 0)"><i class="fa-solid fa-chevron-up"></i></button>    
           
    <header class="text-center bg-white m-0 p-2 d-flex  justify-content-center align-items-center">
                
                <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
                <div class="custom-select-wrapper">
                    <div class="custom-select-web">
                        <i class="fa-solid fa-globe" style="color:#42b979 " aria-hidden="true" onclick="toggleDropdownWeb()"></i>
                        <div class="custom-options-web p-0" id="language-select">
                            <div class="custom-option d-flex p-1 align-items-center" data-value="en" onclick="changeLanguageWeb('en')">
                                 <img src="/images/US.png" alt="" style="width: 20%;">
                             <span class="mx-1">English</span> 
                            </div>
                            <div class="custom-option d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguageWeb('ar')">
                                <img src="/images/saudi.png" alt="" style="width: 20%;">
                                <span class="mx-1">عربي</span>
                            </div>
                            <div class="custom-option  d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguage('rs')">
                                <img src="/images/russia.png" alt="" style="width: 20%;">
                                <span class="mx-1">Русский</span>
                                
                            </div>
                            <div class="custom-option  d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguage('ch')">
                                <img src="/images/chinese.png" alt="" style="width: 20%;">
                                <span class="mx-1">中国人</span>
                            </div>
                        </div>
                    </div>
                </div>
    </header>
    <section class="ad-heading-div">
        <div class="fb-ad">
            <div class="row">
                <div class="col-12">
                    <div class="ad-line-child"></div>
                    <h1 class="py-0 my-3 text-left text-capitalize fw-bold" style="color:#42b979; font-size: 50px;">
                            Blogs
                    </h1>
                    <h4><b>For Edexcel Academy  Educational Consultancy</b></h4>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid my-4 d-flex justify-content-center">
        <div class="row">
            @if($blogs->count() > 0)
            @foreach($blogs as $blog)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header p-0">
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                        @endif
                        </div>
                        <div class="card-body">
                            <span class="tag tag-teal">Education</span>
                            <h4>{{ $blog->title }}</h4>
                            <p>
                            {{ strip_tags($blog->description) }}
                            </p>
                            
                        </div>
                        <div class="border-top d-flex justify-content-start p-3">
                        <div class="user">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Outdoors-man-portrait_%28cropped%29.jpg" alt="" />
                            </div>
                            <div class="user-info">
                                <h5>Jerome Walton</h5>
                                <small>2h ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>No blogs available.</p>
                @endif
                
        </div>
    </div>
    

@endsection
@section('js')
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