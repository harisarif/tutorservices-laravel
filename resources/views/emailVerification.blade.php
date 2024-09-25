<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h3>Please verify your email to access the Tutor Signup page</h3>
</div>

<!-- Email Verification Modal -->
<div class="modal fade" id="emailVerificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter your email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('send.verification.email') }}" id="emailForm">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Verification Link</button>
                </form>
            </div>
        </div>
    </div>
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

        $('#emailForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('send.verification.email') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // alert(response.success || 'Verification link sent to your email!');
                    $('#emailVerificationModal').modal('hide'); // Optionally hide the modal
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message || 'An error occurred. Please try again.');
                }
            });
        });
    });
</script>
