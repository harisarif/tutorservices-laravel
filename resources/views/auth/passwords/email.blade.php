@extends('layouts.app')
<style>
    #allModal {
            display: none !important;
        }
        #lazzyLoader {
            display: none;
        }
        footer {
        /* display: none !important; */
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #42b979;
        }
    .img-div img{
        width: 75%;
    }
    .img-div{
        display: flex;
        justify-content: center;
    }
    .header-img img{
        width: 100%;
    }
    .row{
        --bs-gutter-x: -0.5rem !important;
    }
    main{
        background: linear-gradient(45deg, #42b979, transparent);
        height: 100vh;
    }
    .forget-button {
        transition: 0.5s !important;
    }
    .forget-button button{
        background: #42b979;
        color: #fff;
    }
    .forget-button:hover {
        background-color: #fff;
        box-shadow: 0 0 15px rgba(66, 185, 121, 0.6);
        transform: scale(1.1);
        color: #42b979;
        border-radius: 5px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-lg-6 col-sm-4">
            <div class="img-div mt-5 mx-4">
                <img src="{{ asset('images/login-pg.jpg') }}" alt="">
            </div>
        </div>
                <div class="col-lg-6 col-sm-4 mt-4">
                    <div class="header-img mt-5 d-flex align-items-center">
                        <a href="">
                            <img src="{{ asset('images/white-logo.jpeg') }}" alt="">
                        </a>
                       
                    </div>
                        <div class="login-heading" >
                            <h3 class="my-2 fw-bold fs-5">Forgot Password</h3>
                        </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="row mb-3 d-block">
                            <label for="email" class="col-md-4 col-form-label text-md-justify">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style=" box-shadow: none;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 forget-button"  style=" margin-left: 0%;">
                                <button type="submit" class="btn  w-100">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
    
@endsection