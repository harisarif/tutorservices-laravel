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
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label><br>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label><br>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
        </div>

        <div class="form-group">
            <label for="class_start_time">Class Start Time:</label><br>
            <input type="time" class="form-control" id="class_start_time" name="class_start_time" value="{{ $student->class_start_time }}">
        </div>

        <div class="form-group">
            <label for="class_end_time">Class End Time:</label><br>
            <input type="time" class="form-control" id="class_end_time" name="class_end_time" value="{{ $student->class_end_time }}">
        </div>

        <div class="form-group">
            <label for="whatsapp_number">Whatsapp Number:</label><br>
            <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $student->whatsapp_number }}">
        </div>

        <div class="form-group">
            <label for="country">Country:</label><br>
            <select name="country" id="country" class="form-select">
                @foreach($countries as $country)
                    <option value="{{ $country }}" {{ $student->country == $country ? 'selected' : '' }}>{{ $country }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">City:</label><br>
            <input type="text" class="form-control" id="city" name="city" value="{{ $student->city }}">
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label><br>
            {{-- <input type="text" class="form-control" id="subject" name="subject" value="{{ $student->subject }}"> --}}
            <select name="subject" id="subject" class="form-select">
                <option value="English" {{ $student->subject == "English" ? 'selected' : '' }}>English</option>
                <option value="Mathematics" {{ $student->subject == "Mathematics" ? 'selected' : '' }}>Mathematics</option>
                <option value="Physics" {{ $student->subject == "Physics" ? 'selected' : '' }}>Physics</option>
                <option value="Chemistry" {{ $student->subject == "Chemistry" ? 'selected' : '' }}>Chemistry</option>
                <option value="Urdu" {{ $student->subject == "Urdu" ? 'selected' : '' }}>Urdu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="city">Password:</label><br>
            <input type="password" class="form-control" id="password" name="password" value="{{ $student->password }}">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="./js/hire_tutor.js"></script>
@endsection
@section('js')
<script>
     $(document).ready(function($) {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            })
</script><script>// Disable Right Click
    document.addEventListener("contextmenu", (event) => event.preventDefault());
    
    // Disable Keyboard Shortcuts
    document.addEventListener("keydown", function (event) {
        if (
            event.ctrlKey && 
            (event.key === "u" || event.key === "U" ||  // View Source
             event.key === "s" || event.key === "S" ||  // Save Page
             event.key === "i" || event.key === "I" ||  // DevTools
             event.key === "j" || event.key === "J" ||  // Console
             event.key === "c" || event.key === "C")    // Copy
        ) {
            event.preventDefault();
        }
    
        // Disable F12
        if (event.key === "F12") {
            event.preventDefault();
        }
    });
    
    // Block Developer Console (Anti Debugging)
    (function() {
        let openConsole = false;
        setInterval(() => {
            console.profile();
            console.profileEnd();
            if (console.clear) console.clear();
            if (openConsole) {
                document.body.innerHTML = "";
                alert("Developer tools are disabled!");
                window.location.reload();
            }
        }, 1000);
        Object.defineProperty(console, 'profile', {
            get: function() {
                openConsole = true;
                throw new Error("Console is disabled!");
            }
        });
    })();  </script>
@endsection