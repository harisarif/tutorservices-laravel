@extends('layouts.app')
@php
$languages_spoken = json_decode($tutor->language, true) ?? [];
@endphp
<style>
    .modalBox {
     display:none !important;
    }
    .loader {
        display: none !important;
    }
 </style>
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="container">
    <h2>Teacher's Profile</h2>

    <form action="">
        @csrf

        <div class="form-group">
            <label for="f_name">First Name:</label><br>
            <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $tutor->f_name }}" required>
        </div>

        <div class="form-group">
            <label for="l_name">Last Name:</label><br>
            <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $tutor->l_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="email" class="form-control" id="email" name="email" value="{{ $tutor->email }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <select name="gender" id="gender" class="form-select" required>
                <option value="male" {{ $tutor->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $tutor->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $tutor->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ $tutor->dob }}" required>
        </div>

        <div class="form-group">
            <label for="location">Residence Country:</label><br>
            <select name="location" id="location" class="form-select" required>
                @foreach($countries as $index => $country)
                    <option value="{{ $index }}" {{ $tutor->location == $index ? 'selected' : ''}}>{{ $country }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">Country:</label><br>
            <input type="text" class="form-control" id="city" name="city" value="{{ $tutor->country }}" required>
        </div>
         <!-- ========== qualification ========== -->
        <div class="form-group">
            <label for="experience">Experience (in years):</label><br>
            <input type="text" class="form-control" id="experience" name="experience" value="{{ $tutor->experience }}" required>
        </div>

        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $tutor->phone }}" required>

        <label for="qualification" class="form-label">Qualification</label>
        <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $tutor->qualification }}" required>

        <label for="experience" class="form-label">Experience (years)</label>
        <input type="number" class="form-control" id="experience" name="experience" value="{{ $tutor->experience}}">

      

         <div id="language-container">
          @foreach ($languages_spoken as $index => $lang)
        <div class="form-row d-flex flex-column flex-md-row mb-4" id="language-row-{{ $index }}">
            <div class="col-md-6 px-2">
                <label for="language_proficient_{{ $index }}" class="form-label" style="color:#42b979;">
                    <strong>Language Proficient</strong>
                </label>
                <div class="position-relative">
                    <select name="language_proficient[]" class="form-control rounded-md pr-5"
                        id="language_proficient_{{ $index }}" onchange="toggleArrow(this)">
                        <option value="" disabled>Select Language</option>
                        @foreach ($lang as $code => $name)
                            <option value="{{ $code }}" {{ $lang['language'] == $code ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down position-absolute"
                        style="right: 10px; top: 50%; transform: translateY(-50%);"
                        id="arrow-{{ $index }}"></i>
                </div>
            </div>

            <div class="col-md-6 px-2">
                <label for="language_level_{{ $index }}" class="form-label" style="color:#42b979;">
                    <strong>Level</strong>
                </label>
                <div class="position-relative">
                    <select name="language_level[]" class="form-control rounded-md pr-5"
                        id="language_level_{{ $index }}" onchange="toggleArrow(this)">
                        <option value="">Select Level</option>
                        <option value="A1" {{ $lang['level'] == 'A1' ? 'selected' : '' }}>A1</option>
                        <option value="A2" {{ $lang['level'] == 'A2' ? 'selected' : '' }}>A2</option>
                        <option value="B1" {{ $lang['level'] == 'B1' ? 'selected' : '' }}>B1</option>
                        <option value="B2" {{ $lang['level'] == 'B2' ? 'selected' : '' }}>B2</option>
                        <option value="C1" {{ $lang['level'] == 'C1' ? 'selected' : '' }}>C1</option>
                        <option value="C2" {{ $lang['level'] == 'C2' ? 'selected' : '' }}>C2</option>
                        <option value="native" {{ $lang['level'] == 'native' ? 'selected' : '' }}>Native</option>
                    </select>
                    <i class="fas fa-chevron-down position-absolute"
                        style="right: 10px; top: 50%; transform: translateY(-50%);"
                        id="arrow-{{ $index }}"></i>
                </div>
            </div>
        </div>
    @endforeach
</div>

    <!-- ========== Teaching Details ========== -->

        <div class="form-group">
            <label for="language_tech" class="form-label">Language Teaching:</label>
            <input type="text" class="form-control" id="language_tech" name="language_tech" value="{{ $tutor->language_tech}}">
        </div>

        <div class="form-group">
            <label for="selectedSubjects" class="form-label">Teaching Subjects:</label>
            <input type="text" class="form-control" id="selectedSubjects" name="selectedSubjects" 
            value="{{ !empty($tutor->teaching) ? implode(', ', $tutor->teaching) : '' }}" readonly>
        </div>
    <!-- ========== subject ========== -->
    <div class="form-group">
        <label for="curriculum" class="form-label">Curriculum</label>
        <input type="text" class="form-control" id="curriculum" name="curriculum" value="{{ $tutor->curriculum }}">
    </div>
    
    <div class="form-group">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $tutor->specialization }}">
    </div>
    
    <div class="form-group">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ $tutor->location }}">
    </div>
    
    <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $tutor->status }}">
    </div>
    
        <!-- ========== Documents & Media ========== -->
        <div class=" p-3 mb-4">
            <h4>Documents & Media</h4>

            <div class="col-md-6">
                <label for="document" class="form-label">Documents (PDF/DOC):</label>
                <a href="{{ route('view_document', $tutor->id) }}" class="btn btn-primary">View Document</a>
            </div>

            <div class="col-md-6">
                <label for="profileImage" class="form-label">Profile Image:</label>
                @if(isset($tutor->profileImage))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $tutor->profileImage) }}" alt="Profile Image" class="img-thumbnail" width="150">
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="video" class="form-label">Introductory Video:</label>
                @if(isset($tutor->video))
                    <div class="mt-2">
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $tutor->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            </div>
        </div>

<!-- ========== Description & Submission ========== -->
<div class=" p-3 mb-4">
    <h4>Additional Information</h4>

    <label for="description" class="form-label">Description:</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $tutor->description ?? '') }}</textarea>
</div>

<a href="{{ route('all.tutors') }}" class="btn btn-success">Back To Dashboard</a>

</form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function($) {
setTimeout(function() {
    $(".alert").fadeOut("slow");
}, 5000);
});
</script>
@endsection