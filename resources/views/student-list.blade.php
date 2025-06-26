@extends('layouts.admin')
@section('title')
Edexcel Students
@endsection
<!-- Bootstrap CSS -->
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 6; padding: 14px !important;">
        <strong><i class="fas fa-check-circle"></i> Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="progress-line"></div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 6; padding: 14px !important;">
        <strong><i class="fas fa-exclamation-circle"></i> Error!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="progress-line"></div>
    </div>
@endif

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.admin-sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.admin-header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="tab-content" id="myTabContent">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Student') }}</h1>
                        <div class="del-button d-flex">
                            <div>
                                <button type="button" class="btn btn-danger" id="delete-selected-students">Multiple Delete</button>
                            </div>

                        </div>
                    </div>
                    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                    <div class=" AB-sb">

                        <table class="student-table table border">
                            <thead>
                                <tr>
                                    <th class="border"> <input id="select-all-students" class="form-check-input student-checkbox" type="checkbox" style="margin-left: -1px;">
<label class="form-check-label" for="select-all-students" style="margin-bottom:1.5rem !important;margin-left:10px;"></label>

                                    </th>
                                    <th class="border">ID</th>
                                    <th class="border">Name</th>
                                    <th class="border">Email</th>
                                    
                                    <th class="border">Country</th>
                                    
                                    <th class="border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($students as $student)
                                <tr id="student-row-{{ $student->id }}">
                                    <td class="border">
                                        <input style="margin-left:-1px;" class="form-check-input student-checkbox" type="checkbox" value="{{ $student->id }}" id="flexCheckChecked-{{ $student->id }}">
                                        <label class="form-check-label" for="flexCheckChecked-{{ $student->id }}"></label>
                                    </td>
                                    <td class="border">{{ $student->id }}</td>
                                    <td class="border">{{ $student->name }}</td>
                                    <td class="border">{{ $student->email }}</td>
                                    <td class="border">{{ $student->phone }}</td>
                                     <td class="border">{{ $countries[$student->country] ?? 'Unknown' }}</td>
                                    <td class="border">{{ $student->city }}</td>
                                    <td class="border">{{ $student->subject }}</td>
                                    <td class="border">
                                        <div class="dropdown position-relative">
                                            <button class="btn btn-link border-0 no-caret dropdown-toggle-btn" type="button">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>

                                            <ul class="dropdown-action dropdown-menu position-absolute shadow-sm" style="display: none; z-index: 1000;">
                                                <li>
                                                    <a href="{{ route('edit-student', $student->id) }}" class="dropdown-item">
                                                        <i class="fa-regular fa-pen-to-square"></i> 
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li style="border-bottom:unset !important;">
                                                    <form method="POST" action="{{ route('students.destroy', $student->id) }}" class="delete-student-form mb-0" id="delete-student-form-{{ $student->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item text-danger delete-student-btn me-0 pe-0 ps-3" data-student-id="{{ $student->id }}">
                                                            <i class="fa-solid fa-trash-can"></i> 
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                               

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded text-white bg-success" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js') <!-- Bootstrap Bundle JS (with Popper) -->


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-toggle-btn').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const dropdownMenu = button.nextElementSibling;

                // Hide all other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) {
                        menu.style.display = 'none';
                    }
                });

                // Toggle this dropdown
                dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
            });
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function () {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.style.display = 'none';
            });
        });
    });
        $(document).ready(function () {
            document.getElementById('dropdownButton').addEventListener('click', function() {
                var dropdownMenu = document.getElementById('dropdownMenu');
                dropdownMenu.classList.toggle('show');
            });
            // When the "Select All" checkbox in the header is clicked
            $('#select-all-students').on('change', function () {
                // Toggle all student row checkboxes based on header checkbox
                $('.student-checkbox').not('#select-all-students').prop('checked', this.checked);
            });

            // When any individual student checkbox is changed
            $('.student-checkbox').not('#select-all-students').on('change', function () {
                let totalCheckboxes = $('.student-checkbox').not('#select-all-students').length;
                let totalChecked = $('.student-checkbox:checked').not('#select-all-students').length;

                // If all student checkboxes are checked, check the header checkbox
                $('#select-all-students').prop('checked', totalCheckboxes === totalChecked);
            });
        });

    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.dropdown-toggle-btn');

        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();

                const parent = btn.closest('.student-dropdown');
                const menu = parent.querySelector('.custom-dropdown-menu');

                // Hide all other open dropdowns
                document.querySelectorAll('.custom-dropdown-menu').forEach(m => {
                    if (m !== menu) m.classList.add('d-none');
                });

                // Toggle current one
                menu.classList.toggle('d-none');
            });
        });

        // Hide on outside click
        document.addEventListener('click', function() {
            document.querySelectorAll('.custom-dropdown-menu').forEach(menu => {
                menu.classList.add('d-none');
            });
        });
    });
    $(document).ready(function() {
        // Select/Deselect All
        $('#select-all-students').click(function() {
            $('.student-checkbox').prop('checked', this.checked);
        });

        // Delete selected students
        $('#delete-selected-students').click(function() {
            var selected = [];

            $('.student-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                Swal.fire('No Students Selected', 'Please select at least one student to delete.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will permanently delete the selected students.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete them!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('student.destroy.bulk') }}", // Make sure this route exists
                        type: 'DELETE',
                        data: {
                            ids: selected,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            selected.forEach(id => $('#student-row-' + id).remove());

                            Swal.fire('Deleted!', 'Selected students have been deleted.', 'success');
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    function updateStatus(tutorId) {
        let statusToggle = document.getElementById(`statusToggle_${tutorId}`);
        let statusInput = document.getElementById(`statusInput_${tutorId}`);
        let form = document.getElementById(`statusForm_${tutorId}`);

        // Update the hidden status input based on the checkbox state
        statusInput.value = statusToggle.checked ? 'active' : 'inactive';

        // Submit the form
        form.submit();
    }
    $('#countryTeacher').on('change', function() {

        var country_id = $(this).val(); // Get the selected country ID

        // Make an AJAX request to find tutors based on the selected country
        $.ajax({
            url: '/find-tutors', // Your route for finding tutors
            type: 'GET', // HTTP method (can be POST if needed)
            data: {
                country_id: country_id
            }, // Send selected country ID
            success: function(response) {
                // Handle the response, e.g., display the tutors on the page
                console.log('sadsads', response);
                // You can dynamically update the DOM with the returned data here
                $('.teachers-table tbody').html(response.html);
            },
            error: function(xhr) {
                console.log('Error:', xhr);
            }
        });
    });
    $(document).ready(function() {

        $('.notification-dropdown').on('click', 'li', function() {
            var notificationId = $(this).data('id');
            var isRead = $(this).hasClass('read');

            $.ajax({
                url: "{{ route('mark.notifications.read') }}", // Define this route in your web.php
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    notification_id: notificationId,
                    read: !isRead
                },
                success: function(response) {
                    // Update the notification style based on the new read status
                    if (response.status === 'success') {
                        if (isRead) {
                            $(this).removeClass('read').addClass('unread');
                            updateNotificationCount(1); // Increment the count for unread
                        } else {
                            $(this).removeClass('unread').addClass('read');
                            updateNotificationCount(-1); // Decrement the count for read
                        }
                    }
                }.bind(this) // Bind `this` to refer to the clicked notification item
            });
        });

        function updateNotificationCount(change) {
            var countElement = $('#notificationCount');
            var currentCount = parseInt(countElement.text());
            countElement.text(currentCount + change);
        }
    });

    function cancel() {
        $('.alert').addClass('d-none')
    }
    $(document).on('select2:open', function(e) {
        let scrollPos = $(window).scrollTop();
        setTimeout(function() {
            $(window).scrollTop(scrollPos);
        }, 0);
    });
</script>
<script>
    
</script>
<script>
    $(document).ready(function() {
        // Existing bulk delete logic here...

        // Single delete confirmation
        $('.delete-student-btn').on('click', function() {
            const studentId = $(this).data('student-id');
            const form = $('#delete-student-form-' + studentId);

            Swal.fire({
                title: 'Are you sure?',
                text: 'This student will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script><script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        autoHideAlert("success");
        autoHideAlert("error");
    }, 200); 
    // Added a delay to ensure alerts are available in the DOM

    document.querySelectorAll(".custom-alert .close-btn").forEach((btn) => {
        btn.addEventListener("click", function() {
            let alertBox = this.closest(".custom-alert");
            if (alertBox) {
                alertBox.classList.add("fade-out");
                setTimeout(() => alertBox.remove(), 500);
            }
        });
    });
});

function autoHideAlert(alertId) {
    let alert = document.getElementById(alertId);
    if (alert) {
        let progressBar = alert.querySelector('.progress-line');

        if (progressBar) {
            // Make the progress bar fill over 30 seconds
            progressBar.style.transition = "width 20s linear";
            progressBar.style.width = "100%";
        }

        // Hide the alert after 30 seconds
        setTimeout(() => {
            alert.classList.add("fade-out");
        }, 20000); // 30 seconds visible

        // Remove the alert completely after fading out
        setTimeout(() => {
            alert.remove();
        }, 20500); // 30.5 seconds total
    }
}



function cancel() {
    let alert = document.getElementById("error");
    if (alert) alert.remove();
}
</script>

@endsection