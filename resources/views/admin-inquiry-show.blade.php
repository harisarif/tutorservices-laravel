@extends('layouts.admin')
@section('title')
   Edexcel Inquiry
@endsection 
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')


@if ($errors->any())
<div class="alert alert-danger opacity-100" id="close">
    <ul style="margin: 0; padding: 10px 0;">
        @foreach ($errors->all() as $error)
        <li style="display:flex; justify-content: space-between; align-items: center;">
            {{ $error }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true"></i>
        </li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div id="wrapper">
@include('layouts.admin-sidebar')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="contents">

            <!-- Topbar -->
            @include('layouts.admin-header') 
            <section>
             <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body" style="height: auto;"> <h3 class="text-success mb-1">Inquiry Details</h3>
                                <div class="row" style="margin-top: 100px;">
                                    <div class="col-md-6">
                                        <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                                            <h6 class="mb-0" style="color: #198754;">Full Name</h6>
                                            <p class="mb-0" style="color: #198754;">{{ $inquiry->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                                            <h6 class="mb-0" style="color: #198754;">Email</h6>
                                            <p class="mb-0" style="color: #198754;">{{ $inquiry->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-md-4">
                                    <div class="col-md-6">
                                        <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                                            <h6 class="mb-0" style="color: #198754;">Phone</h6>
                                            <p class="mb-0" style="color: #198754;">{{ $inquiry->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex pb-3 justify-content-between" style="border-bottom: 1px solid #b7b2b2;">
                                            <h6 class="mb-0" style="color: #198754;">Message</h6>
                                            <p class="mb-0" style="color: #198754;">{{ $inquiry->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="{{ route('admin.inquiry') }}" class="btn btn-success mb-5">Back To Dashboard</a> -->
                    </div>
    
            </section>


        </div>
    </div>
</div>
@endsection

@section('js')

@endsection

          