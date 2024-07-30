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
</style>
@section('content')
<header class="main_header d-flex  py-2 align-items-end justify-content-center">  
        <a class="arrow" href="{{ route('newhome') }}">
          <img style="height: 50px" src="{{asset('images/logo.png')}}" alt="EDEXCEL-logo" height="50px">
        </a>
    </header>
<div class="container">
    <div class="row justify-content-center" style="margin: 8px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style=" background: #42b979; color: #fff; font-size: 18px;">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
