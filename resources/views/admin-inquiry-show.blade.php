@extends('layouts.admin')
@section('title')
   Edexcel Dashboard
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
                        <a href="{{ route('admin.inquiry') }}" class="btn btn-success mb-5">Back To Dashboard</a>
                    </div>
    
            </section>


        </div>


        <div class="sticky-footer  bg-gradient-success" style="padding:2rem 0">
            <div class="container my-auto">
                <div class="copyright text-center my-auto text-white">
                    <span>Copyright &copy;Edexcel Academy & Educational Consultancy</span>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('js')

<!-- Select2 JS -->
<script src="{{asset('js/select2.min.js')}}"></script>
<!-- Include jQuery (if not already) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#subject').select2({
            placeholder: "Select subjects",
            allowClear: true
        });
    });
</script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@endsection

          