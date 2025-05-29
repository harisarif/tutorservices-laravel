@extends('layouts.admin')
@section('title')
Edexcel Inquires
@endsection
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')


@if (session('success'))
<div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

    {{ session('success') }}
    <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
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
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="button-div">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 bg-success text-white">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- Sidebar Toggle (Topbar) -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow mx-1">

                    <li class="nav-item dropdown no-arrow mx-1">

                        <div class="notification-icon">
                            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                <!-- @if(auth()->user()->unreadNotifications->count() > 0) -->
                                <span class="badge badge-danger badge-counter"
                                    id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                <!-- @endif -->
                            </a>


                        </div>
                        <!-- Dropdown - Alerts -->
                        @include('notifications')
                    </li>
                    </li>
                    <li class="nav-item dropdown no-arrow d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if(auth()->check())
                                    {{ auth()->user()->name}}@endif</span> -->
                            <img class="img-profile rounded-circle"
                                src="{{asset('images/undraw_profile.svg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in md"
                            aria-labelledby="userDropdown" style="left: -95px !important; width: 0;">

                            <a class="dropdown-item text-success" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
                                {{ __('messages.Logout') }}
                            </a>
                        </div>

                    </li>

                </ul>

            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">@csrf
            </form>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="tab-content" id="myTabContent">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('Inquiry') }}</h1>
                        <div class="mt-3">
                            <button type="button" class="btn btn-danger" id="delete-selected">Multiple Delete</button>
                        </div>
                    </div>
                    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                    <div class=" AB-sb">

                        <table class="student-table table">
                            <thead>
                                <tr>
                                    <th> <input class="form-check-input inquiry-checkbox" type="checkbox" id="select-all-inquiry" style="margin-left: -1px;">
                                        <label class="form-check-label" for="select-all" style="margin-bottom:1.5rem !important;margin-left:10px;"></label>
                                    </th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($inquires as $inquiry)
                                <tr id="inquiry-row-{{ $inquiry->id }}">
                                    <td>
                                        <input class="form-check-input inquiry-checkbox" type="checkbox" value="{{ $inquiry->id }}" id="flexCheckChecked-{{ $inquiry->id }}" style="margin-left: -1px;">
                                        <label class="form-check-label" for="flexCheckChecked-{{ $inquiry->id }}"></label>
                                    </td>
                                    <td>{{ $inquiry->id }}</td>
                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>{{ $inquiry->phone }}</td>
                                    <td>{{ $inquiry->description ?? 'No description' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link border-0 no-caret" type="button" data-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-action dropdown-menu" id="dropdownInq">
                                                <li class="d-flex align-items-center dropdown-item" style="border-bottom: 1px solid #ddd; color: black;">
                                                    <a href="{{ route('inqury.edit', $inquiry->id) }}" class="dropdown-item">
                                                        <i class="fa-regular fa-pen-to-square" style="color: #4e73df;"></i>
                                                        <span class="mx-1">Edit</span>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                   <button type="button"
    class="btn btn-sm btn-danger single-delete-btn"
    data-id="{{ $inquiry->id }}">
    <i class="fa fa-trash"></i> Delete
</button>

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
@section('js')
<script>
    $(document).ready(function() {
        $('#select-all-inquiry').click(function() {
            $('.inquiry-checkbox').prop('checked', this.checked);
        });

        $('#delete-selected').click(function() {
            var selected = [];

            $('.inquiry-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                Swal.fire('No Inquiries Selected', 'Please select at least one inquiry to delete.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will delete the selected inquiries permanently.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete them!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('inquiry.destroy.bulk') }}",
                        type: 'DELETE',
                        data: {
                            ids: selected,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            selected.forEach(id => $('#inquiry-row-' + id).remove());
                            Swal.fire('Deleted!', 'Selected inquiries have been deleted.', 'success');
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });$(document).ready(function () {
    // When header checkbox is clicked
    $('#select-all-inquiry').on('change', function () {
        // Only select row checkboxes (exclude the header one)
        $('.inquiry-checkbox').not('#select-all-inquiry').prop('checked', this.checked);
    });

    // Handle individual checkbox change
    $('.inquiry-checkbox').not('#select-all-inquiry').on('change', function () {
        let totalCheckboxes = $('.inquiry-checkbox').not('#select-all-inquiry').length;
        let totalChecked = $('.inquiry-checkbox:checked').not('#select-all-inquiry').length;

        $('#select-all-inquiry').prop('checked', totalCheckboxes === totalChecked);
    });
});



</script>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('show');
    });

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
$(document).on('click', '.single-delete-btn', function () {
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This inquiry will be permanently deleted.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74a3b',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/inquiry-destroy/" + id, // matches your route
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    $('#inquiry-row-' + id).remove();
                    Swal.fire('Deleted!', 'Inquiry has been deleted.', 'success');
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
});
</script>


@endsection