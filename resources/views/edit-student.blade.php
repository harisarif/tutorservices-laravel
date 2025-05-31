@extends('layouts.admin')
@section('title')
Edexcel Dashboard

@endsection
<style>
    
    .section-title {
        font-size: 1.5rem;
        color: #4a90e2;
        margin-bottom: 20px;
        font-weight: bold;
    }
    .custom-class label {
        font-weight: bold
    }
</style>
<script src="{{asset('js/js/jquery.min.js')}}"></script>

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
                <form action="{{route('students.update', $student->id) }}" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="profile-header text-center">
                        <div class="profile-pic-container">
                            <label for="imageUpload" style="cursor: pointer;">
                                <img src="{{ asset('storage/' . $student->profileImage) }}" alt="Avatar" class="avatar img-thumbnail" id="profilePreview">
                                <div class="upload-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </label>

                            <!-- File input -->
                            <input type="file" name="profileImage" id="imageUpload" class="form-control d-none" accept="image/*">

                            <!-- Hidden input to retain old image -->
                            <input type="hidden" name="oldImage" value="{{ $student->profileImage }}">
                        </div>
                    </div>

                    <!-- Personal Information & Education -->
                    <div class="row mt-4 mx-2">
                        <div class="col-md-6 d-flex">
                            <div class="card h-100 w-100 ms-3">
                                <div class="card-body">
                                    <h5 class="section-title"><i class="fas fa-user icon"></i> Personal Information</h5>

                                    <div class="mb-2 custom-class">
                                        <label class="form-label"><strong style="color: #1cc88a;">First name:</strong></label>
                                        <input type="text" class="form-control" id="fullName" name="name" value="{{ $student->name}}">
                                    </div>

                                    <div class="mb-2 custom-class">
                                        <label class="form-label"><strong style="color: #1cc88a;">Email:</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $student->email}}">
                                    </div>

                                    <div class="mb-2 custom-class">
                                        <label class="form-label"><strong style="color: #1cc88a;">Phone:</strong></label>
                                        <input class="form-control w-100" name="phone" value="{{ $student->phone}}" id="phone" type="text" placeholder="e.g +92XXXXXXXXXX" style="border: 1px solid #ddd; height: 44px; box-shadow: none;">
                                    </div>
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="mb-2 custom-class">
                                                    <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Status</label>
                                                    <select class="form-select school_class select2" id="qualification" name="availability_status">
                                                        @php
                                                        $selectedStatus = $student->availability_status ?? ''; // Ensure it's defined
                                                        @endphp

                                                        @if($selectedStatus && !in_array($selectedStatus, ['Online', 'Physical', 'Both']))
                                                        <option value="{{ $selectedStatus }}" selected>{{ ucfirst($selectedStatus) }}</option>
                                                        @endif

                                                        <option value="Physical" @if($selectedStatus==='Physical' ) selected @endif>Physical</option>
                                                        <option value="Both" @if($selectedStatus==='Both' ) selected @endif>Both</option>
                                                        <option value="">Others</option>
                                                    </select>

                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="mb-2 custom-class">
                                                        <label for="gender" class="form-label fw-bold" style="color: #1cc88a;">Gender</label>
                                                        <select name="gender" id="gender" class="form-select select2">
                                                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                            <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                            </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex">
                            <div class="card h-100 w-100 mx-3">
                                <div class="card-body">
                                    <h5 class="section-title">
                                        <i class="fas fa-graduation-cap icon"></i> Education & Qualifications
                                    </h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2 custom-class">
                                                <label for="grade" class="form-label fw-bold" style="color: #1cc88a;">Grade</label>
                                                <select name="grade" class="form-select select2" id="grade">
                                                    @foreach($schoolClasses as $class)
                                                    <option value="{{ $class->id }}" {{ (isset($student->grade) && $student->grade == $class->id) ? 'selected' : '' }}>
                                                        {{ $class->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2 custom-class">
                                                <label for="country" class="form-label fw-bold" style="color: #1cc88a;">Country</label>
                                                <select name="country" class="form-select select2" id="country">
                                                    @php
                                                    $countries = config('countries_assoc.countries');
                                                    $selectedCountry = $student->country ?? '';
                                                    @endphp

                                                   @foreach($countries as $code => $name)
    <option value="{{ $code }}" {{ $selectedCountry === $code ? 'selected' : '' }}>
        {{ ucfirst(str_replace('_', ' ', $name)) }}
    </option>
@endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2 custom-class">
                                                <label for="city" class="form-label fw-bold" style="color: #1cc88a;">City</label>
                                               <label for="city" class="form-label fw-bold" style="color: #1cc88a;">City</label>
    <select class="form-select select2" id="city" name="city">
        <option value="{{ $student->city }}" selected>{{ $student->city }}</option>
        {{-- Other cities will be populated by AJAX --}}
    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2 custom-class">
                                                <label for="subject" class="form-label fw-bold" style="color: #1cc88a;">Subject</label>
                                                <select name="subject[]" class="form-control select2" id="subject" multiple>
                                                    @php
                                                    // Safely decode stored value
                                                    $selectedsubjects = is_array($student->subject)
                                                    ? $student->subject
                                                    : explode(',', $student->subject ?? '');

                                                    // Get all available subjects with fallback
                                                    $allSubjects = config('subjects.subjects', []);
                                                    @endphp

                                                    @foreach($allSubjects as $subject)
                                                    <option value="{{ $subject }}" {{ in_array($subject, $selectedsubjects) ? 'selected' : '' }}>
                                                        {{ ucfirst(str_replace('_', ' ', $subject)) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 custom-class">
                                        <label for="address" class="form-label fw-bold" style="color: #1cc88a;">Description</label>
                                        <textarea type="text" class="form-control" id="address" name="description" value="{{$student->description}}" style="border: 2px solid #dee2e6;">{{$student->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4 mb-3 w-100">
                            <button type="submit" class="btn mt-2 mb-2 custom-class" style="background-color: #198754; color: white; margin-right: 25px;">
                                Submit
                            </button>
                        </div>
                </form>
            </section>


        </div>


        
    </div>


</div>
@endsection

@section('js')
<script>
    var selectedCity = @json($student->city);
</script>
<script>
    $(document).ready(function () {
        $('#country, #city').select2();

        var $country = $('#country');
        var $city = $('#city');

        // On change of country
        $country.on('change', function () {
            var countryCode = $(this).val();
            if (!countryCode) return;

            $.ajax({
                url: '{{ route('get.country.cities') }}',
                type: 'GET',
                data: { country: countryCode },
                success: function (cities) {
                    $city.empty();
                    $city.append('<option value="">Select City</option>');

                    $.each(cities, function (index, city) {
                        var selected = city === selectedCity ? 'selected' : '';
                        $city.append('<option value="' + city + '" ' + selected + '>' + city + '</option>');
                    });

                    // Trigger Select2 update
                    $city.trigger('change.select2');
                },
                error: function () {
                    $city.empty().append('<option value="">No cities available</option>');
                }
            });
        });

        // Trigger population of cities on page load
        if ($country.val()) {
            $country.trigger('change');
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#subject').select2({
            placeholder: "Select subjects",
            allowClear: true
        });
    });
</script>
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