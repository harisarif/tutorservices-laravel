@extends('layouts.admin')
@section('title')
   Edexcel Dashboard
@endsection 
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')
@php
$cleanDescription = strip_tags($blogs->description);
@endphp


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

<div id="wrapper">
@include('layouts.admin-sidebar')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="contents">

            <!-- Topbar -->
            @include('layouts.admin-header')


            <section>
                <form action="{{route('blogs.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="profile-header text-center">
                        <div class="profile-pic-container">
                            <label for="imageUpload" style="cursor: pointer;">
                                <img src="{{ asset('storage/' .  $blogs->image) }}" alt="Avatar" class="avatar img-thumbnail" id="profilePreview">
                                <div class="upload-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </label>

                            <!-- File input -->
                            <input type="file" name="profileImage" id="imageUpload" class="form-control d-none" accept="image/*">

                            <!-- Hidden input to retain old image -->
                            <input type="hidden" name="oldImage" value="{{ $blogs->image }}">
                        </div>
                    </div>
                    <!-- Personal Information & Education -->
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">
                            <div class="card h-100 w-100 ms-3">
                                <div class="card-body row">
                                    <h5 class="section-title"><i class="fas fa-user icon"></i> Blogs Information</h5>

                                    <div class=" col-md-12 mb-2">
                                        <label class="form-label"><strong style="color: #1cc88a;">Title:</strong></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $blogs->title}}">
                                    </div>



                                    <div class="col-md-12 mb-2">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="5">{{ strip_tags($cleanDescription) }}</textarea>
                                    </div>



                                </div>
                            </div>
                        </div>




                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button type="submit" class="btn mt-2 mb-2 animated-button" style="background-color: #198754;color: white;margin-right: 25px;">Submit</button>
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

<script>
    document.getElementById('imageUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('profilePreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection