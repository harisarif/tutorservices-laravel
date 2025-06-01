@extends('layouts.app')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Blog Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}" />
@section('content')
    @include('whatsapp')
    <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block; z-index: 66;" onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>    
           
    <header style="background: #42b979;" class="text-center m-0 p-2 d-flex  justify-content-center align-items-center">
                
                <a class="mx-auto" href="{{ route('newhome') }}">
                        <img src="{{ asset('images/white-logo.jpeg') }}" alt="Edexcel-logo" style="height: 100px; border-radius: 60px;width:100px;">
                </a>
                <div class="custom-select-wrapper">
                    <div class="custom-select-web">
                        <i class="fa fa-globe" style="color:#42b979 " aria-hidden="true" onclick="toggleDropdownWeb()"></i>
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
    <div class="container my-4 d-flex justify-content-center">
        <div class="row" style="width:100%">
                 @if($blogs->count() > 0)
                    @foreach($blogs as $blog)
                                        <div class="col-md-4">
                                            <div class="blog-card">
                                                <!-- <div class="blog-number">01</div> -->
                                                <div class="blog-title">{{ $blog->title }}</div>
                                                @if($blog->image)
                                                <div class="blog-image">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                                </div>
                                                @endif
                                                <p class="blog-text">{{ strip_tags($blog->description) }}</p>
                                                <div class="d-flex">
                                                    <small class="text-start">{{ $blog->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                    @endforeach
                @else
                <p> <img src="{{ asset('image/blog.jpeg') }}" class="card-img-top" alt=""></p>
                @endif
                
                
        </div>
    </div>


</div>
    <!--  -->
    

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