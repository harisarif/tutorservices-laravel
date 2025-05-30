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
               <form action="{{route('inquiry.update', $inqury->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
    
            <!-- Personal Information & Education -->
            
                <div class="col-md-12 d-flex">
                    <div class="card h-100 w-100 ms-3">
                        <div class="card-body">
                            <h5 class="section-title"><i class="fas fa-user icon"></i> Inqury Information</h5>
                        
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">First name:</strong></label>
                                <input type="text" class="form-control" id="fullName" name="name"  value="{{ $inqury->name}}">
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Email:</strong></label>
                                <input type="email" class="form-control"  name="email"id="email" value="{{ $inqury->email}}">
                            </div>         
                        
                            <div class="mb-2">
                                <label class="form-label"><strong style="color: #1cc88a;">Phone:</strong></label>
                               <input  class="form-control w-100" required name="phone" value="{{ $inqury->phone}}" id="phone" type="text" placeholder="e.g +92XXXXXXXXXX" style="border: 1px solid #ddd; height: 44px; box-shadow: none;">
                            </div>
                        
                           <div class="mb-2">
                            <label for="desciption" class="form-label fw-bold"  style="color: #1cc88a;">Description</label>
                        <input type="text" class="form-control" id="desciption" name="description" value="{{$inqury->description}}" style="border: 2px solid #dee2e6;">
                        </div> 
                            
                        </div>
                    </div>
                </div>
    
               
    
            <div class="d-flex justify-content-end mt-4 mb-3">
        <button type="submit" class="btn mt-2 mb-2 animated-button" style="background-color: #198754; color: white; margin-right: 25px;">
            Submit
        </button>
    </div>
</form>
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