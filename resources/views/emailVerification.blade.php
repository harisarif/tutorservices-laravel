<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Email Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <style>
        .list-inline-item:not(:last-child) {
            margin-right:unset !important;
        }
        .modal-open .modal { margin-top: 10rem; }
        .footer-bottom { background: #42b979; position: fixed; bottom: 0; width: 100%; }
        
        .foucs {
            color: #fff;
            width: 30px;
            transition: 0.5s;
            display: flex;
            justify-content: center;
            height: 30px;
            border-radius: 24px;
            align-items: center;
            background-color: #42b979;
            font-size: 25px;
        }
        .foucs:hover { cursor: pointer; transform: scale(1.3); }

        /* Position alerts at the top-right corner */
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            width: auto;
            max-width: 350px;
        }
    </style>
</head>
<body>

    <!-- Alert Container (For Errors & Success Messages) -->
    <div class="alert-container">
        <!-- Error Alert -->
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="d-inline-block">Error!</strong>
            <ul class="mb-0 list-unstyled d-inline ml-2"> <!-- Display inline -->
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  
        <!-- Success Alert -->
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-relative" role="alert">
        <strong class="d-inline-block">Success!</strong>
        <span class="ml-2">{{ session('success') }}</span>

        <!-- Close Button -->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <!-- Progress Bar -->
        <div class="progress mt-2" style="height: 3px;">
            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" 
                 role="progressbar" style="width: 100%; transition: width 2s linear;">
            </div>
        </div>
    </div>
@endif

    
    </div>

    <!-- Header -->
    <header style="background: #42b979;" class="text-center m-0 p-2 d-flex align-items-end justify-content-center">
        <a class="mx-auto" href="{{ route('newhome') }}">
            <img src="{{ asset('images/white-logo.jpeg') }}" alt="Edexcel-logo" style="height: 100px; border-radius: 60px;width:100px;">
        </a>
    </header>

    <div class="container mt-5">
        <h3 class="text-success text-center">Please verify your email to access the Tutor Signup page</h3>
    </div>

    <!-- Email Verification Modal -->
    <div class="modal fade" id="emailVerificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="col-12 d-flex justify-content-between align-items-center px-2 text-success" id="exampleModalLabel">
                        Enter your email
                        <span class="fs-5 pointer foucs" data-bs-dismiss="modal" style="align-items: revert;">&times;</span>
                    </h5>
                    
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('send.verification.email') }}" onsubmit="storeEmail()">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input id="email" type="email" name="email" class="form-control" required value="{{ old('email') }}">
                           
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Send Verification Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="col-12 footer-bottom border-top text-center text-light p-3">
        <ul class="list-inline mb-0">
            <li class="list-inline-item">© Copyright 2024.</li>
            <li class="list-inline-item">All Rights Reserved.</li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item">Managed by</li>
            <li class="list-inline-item">
                <a class="text-decoration-none text-light" href="https://techtrack.online/">Techtrack</a>
            </li>
        </ul>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script>
         function storeEmail() {
            let email = document.getElementById('email').value;
            if (email) {
                localStorage.setItem('email', email);
            }
        }
        $(document).ready(function () {
            // Show modal only if the query parameter 'email_verification' is not present
            @if(!request()->query('email_verification'))
                $('#emailVerificationModal').modal('show');
            @endif
        }); 
    </script>
    <script>
        setTimeout(function () {
            $(".alert").fadeOut("slow");
        }, 2000);
    </script>
    <!-- Select2 JS -->
<script src="{{asset('js/inspect.js')}}"></script>
</body>
</html>
