@extends('layouts.app')

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
    <h2>Edit Teacher</h2>

    <form action="{{ route('teachers.update', $tutor->id) }}" method="POST">
        @csrf
        @method('PUT')

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
            <label for="qualification">Recent Degree:</label><br>
            <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $tutor->qualification }}" required>
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
            <label for="city">City:</label><br>
            <input type="text" class="form-control" id="city" name="city" value="{{ $tutor->city }}" required>
        </div>

        <div class="form-group">
            <label for="experience">Experience (in years):</label><br>
            <input type="text" class="form-control" id="experience" name="experience" value="{{ $tutor->experience }}" required>
        </div>

        <div class="form-group">
            <label for="availability" class="form-label">Available Time</label> <span class="text-danger fs-4">*</span>
            <select class="form-select" id="availability" required name="availability" required>
                <option selected>Select Time</option>
                <option value="9:00AM to 10:00AM" {{ $tutor->availability == "9:00AM to 10:00AM" ? 'selected' : '' }}>9:00AM to 10:00AM</option>
                <option value="10:00AM to 11:00AM" {{ $tutor->availability == "10:00AM to 11:00AM" ? 'selected' : '' }}>10:00AM to 11:00AM</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Mobile Number:</label>
            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $tutor->phone }}" required>
        </div>

        <div class="form-group">
            <label for="whatsapp">Whatsapp Number:</label><br>
            <input type="tel" class="form-control" id="whatsapp" name="whatsapp" value="{{ $tutor->whatsapp }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@section('js')
<script>
     $(document).ready(function($) {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            })
</script>
@endsection