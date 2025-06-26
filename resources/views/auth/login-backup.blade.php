@extends('layouts.app')
<style>
    #cookie-banner {
        display:none;
    }
    footer {
        /* display: none !important; */
        position: fixed;
        bottom: 0;
        left: 0; 
    }
    .container{
        display: none;
    }
    .alert-danger{ 
        z-index: 6 !important;
        display: flex;
        justify-content: space-between;
        font-size: 13px !important;
        cursor: pointer;
        align-items: center;
    }
    .fa-times{
        margin-left: 0 !important;
    }
    .modalBox{
        display: none !important;
    }
    .card-header{
        background: #42b979 !important;
        color: white !important;
    }
    .login-button{
        background: #42b979 !important;
        border: none !important;
    }
    @media(max-width: 425px){
        footer{
            top: 409px;
        }
    }
    .img-cards img{
        width: 85%;
    }
    .header-img img{
        width: 75%;
    }
   
    .row{
        --bs-gutter-x: none !important;
    }
    .login-button{
        width: 350px;
    }
    .form-check-input{
        cursor: pointer;
    }
    .input-div{
        display: flex;
        align-items: center;
        width: 350px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
    }
    .login-button {
        transition: 0.5s !important;
    }

    /* Pulse effect on hover */
    .login-button:hover {
        background-color: #36a367;
        box-shadow: 0 0 15px rgba(66, 185, 121, 0.6);
        transform: scale(1.1);
    }
    main{
        background: linear-gradient(45deg, #42b979, transparent);
        height: 100vh;
    }
    [dir="rtl"] .form-check  {
       width: 77%;
    }
    [dir="rtl"] .btn {
       margin: 0 !important;
    }
    [dir="rtl"] .form-check-label {
      width: 69%;
    }
    .login-heading h3{
        margin-left: -2%;
    }
    
</style>
@if (session('error'))
        <div class="alert alert-danger" style="z-index: 6;
    padding: 14px !important;">
            
            {{ session('error') }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
        </div>
    @endif
@section('content')
                
        <div  id="login bg-gradient-success">
            <div class="row align-items-center" >
                <div class="col-lg-6 col-sm-4  img-cards  mx-0 d-flex justify-content-start ">
                    <img src="{{ asset('images/login-new.jpeg') }}" alt="">
                </div>
                
                <div class="col-lg-5 col-sm-4">
                <div class="" style="margin-left:-18px;">
                        <a href="{{ route('social.redirect','google') }}" class="" style="border:1px solid #000;text-decoration:none; font-size: 14px;padding:10px;border-radius:10px;">
                            <!-- <i class="fab fa-google me-2"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                                <path fill="#EA4335" d="M24 9.5c3.09 0 5.88 1.06 8.06 2.82l6.03-6.03C34.77 3.66 29.7 1.5 24 1.5 14.84 1.5 6.98 7.59 3.89 16.09l7.09 5.51C12.72 14.2 17.86 9.5 24 9.5z"/>
                                <path fill="#34A853" d="M46.5 24c0-1.56-.14-3.07-.41-4.5H24v9h12.64c-1.06 3.01-2.99 5.55-5.51 7.3l7.09 5.51C43.61 37.01 46.5 30.98 46.5 24z"/>
                                <path fill="#4A90E2" d="M10.98 27.6a14.58 14.58 0 010-7.2l-7.09-5.51a22.48 22.48 0 000 18.22l7.09-5.51z"/>
                                <path fill="#FBBC05" d="M24 46.5c5.7 0 10.77-1.89 14.8-5.14l-7.09-5.51C29.88 37.44 27.09 38.5 24 38.5c-6.14 0-11.28-4.7-12.02-10.1l-7.09 5.51C6.98 40.41 14.84 46.5 24 46.5z"/>
                            </svg>

                            <span class="text-dark"> Sign in with Google </span>
                        </a>

                        <!-- <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-outline-success d-flex align-items-center justify-content-center"
                            style="border-color: #42b979; color: #42b979; font-size: 14px;">
                            <i class="fab fa-facebook me-2"></i> Sign up with Facebook
                        </a> -->
                    </div>
                    <div class="login-heading mt-4">
                            <h3 class="my-2 fw-bold fs-4 text-dark">{{ __('messages.Login Your Account') }}</h3>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}"  style="margin-left: -2%;">
                        @csrf

                        <div class="row mb-1 d-block">
                            <label for="email" class="col-md-4 col-form-label text-md-justify" style="white-space: nowrap; text-decoration: none;">{{ __('messages.Email Address') }} </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 350; box-shadow: none;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-block">
                            <label for="password" class="col-md-4 col-form-label text-md-justify ">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                               <div class="input-div">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="width: 350px; border: none; box-shadow: none;">
                                 <span style="cursor: pointer; color: #dd;><i class="fa-regular fa-eye mx-2 cursor-pointer"></i></span>
                               </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div >
                                <div class="form-check ">
                                    <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="box-shadow: none;">

                                    <label class="form-check-label" for="remember" style="font-size: 13px;">
                                    {{ __('messages.Remember Me') }}
                                    </label>
                                    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-nowrap text-decoration-none text-black" href="{{ route('password.request') }}" style="margin-left: 12%; font-size: 13px;">
                                        {{ __('messages.Forgot Your Password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary login-button">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection
<script>
    function cancel(){
            $('.alert').addClass('d-none')
        }
$(document).on('select2:open', function(e) {
            let scrollPos = $(window).scrollTop();
            setTimeout(function() {
                $(window).scrollTop(scrollPos);
            }, 0);
        });
    $(document).ready(function($) { $('.country').select2(); });
</script>