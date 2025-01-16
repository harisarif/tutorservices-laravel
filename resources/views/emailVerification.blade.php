<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Email Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .modal-open .modal{
        margin-top: 10rem;
    }
    .footer-bottom{
        background: #42b979;
        position: fixed;
        top: 89%;
    }
    
    .foucs{
        color: #ffff;
        width: 30px;
        transition: 0.5s;
        display: flex;
        justify-content: center;
        height: 30px;
        border-radius: 24px;
         align-items: end;
         background-color: #42b979;
         font-size: 25px;
    }
        .foucs:hover{
            cursor: pointer;
            transform: scale(1.3);
        }
</style>
<header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="{{ asset('images/logo.png') }}" alt="EDEXCEL-logo"height="50px"></a>
                <div class="custom-select-wrapper">
        </header>
<div class="container mt-5">
    <h3 class="text-success" style=" text-align: center;">Please verify your email to access the Tutor Signup page</h3>
</div>

<!-- Email Verification Modal -->
<div class="modal fade" id="emailVerificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Enter your email</h5>
                <span class="fs-2 pointer foucs" id="close"> &times;</span>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('send.verification.email') }}" id="emailForm">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" required id="emailInput">
                    </div>
                    <button type="submit" class="btn btn-success">Send Verification Link</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="col-12 footer-bottom border-top">
        <ul class="p-3 text-center">
            <li class="d-inline text-light">© Copyright 2024.</li>
            <li class="d-inline text-light">All Rights Reserved.</li>        
            <li class="d-inline text-light">|</li>
            <li class="d-inline text-light">Managed by</li>
            <li class="d-inline">
                <a class="text-decoration-none text-light" href="https://techtrack.online/">Techtrack</a>
            </li>
           
            
        </ul>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@if(!request()->query('email_verification'))
    <script>
        $(document).ready(function() {
            $('#emailVerificationModal').modal('show');  // Show modal only if not coming from email link
        });
    </script>
@endif
<script>
    $(document).ready(function() {// Show modal on page load
        $('#close').on('click',function(){
            $('#emailVerificationModal').modal('hide');
        })
        $('#emailForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var email = $('#emailInput').val();
            localStorage.setItem('email', email);
            $.ajax({
                url: "{{ route('send.verification.email') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.success || 'Verification link sent to your email!');
                    $('#emailVerificationModal').modal('hide'); // Optionally hide the modal
                    window.location.href = '/'
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message || 'An error occurred. Please try again.');
                }
            });
        });
    });
</script>

