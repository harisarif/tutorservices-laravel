@extends('layouts.admin')
@section('title')
   Edexcel Students
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
        <ul class="nav nav-tabs navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <li class=" py-2 mx-2 d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src=" {{asset('images/white-logo.jpeg')}}" class="d-lg-block d-none" id="toggleImage" height="50px" alt="logo" style="height: 50px; border-radius: 10px; width: 100%;">
                </a>
                <a href="{{ route('home') }}">
                    <img src=" {{asset('images/favicon.png')}}" id="toggleImage" class="d-lg-none d-sm-block AB-img" alt="Image" style="width:70%;">
                </a>
                <div class="text-center d-none d-md-inline position-relative">
                    <button class="rounded-circle border-0" id="sidebarToggle">
                        <div class="icons d-none">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </button>

                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link"
                    href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('messages.Dashboard') }}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2"
                    href="{{route('all.tutors')}}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>{{ __('messages.Teacher') }}</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link py-2" href="{{route('all.students')}}">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>{{ __('messages.Students') }}</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link py-2" href="{{route('admin.inquiry')}}" role="tab">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <span>{{ __('messages.Direct inquiry') }}
                    </span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link py-2" href="{{route('blogs.create')}}">
                    <i class="fa-solid fa-blog" aria-hidden="true"></i>
                    <span>{{ __('messages.Blogs') }}
                    </span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link py-2" href="{{route('all.blogs')}}">
                    <i class="fa-solid fa-blog" aria-hidden="true"></i>
                    <span>{{ __('Blog List') }}
                    </span>
                </a>
            </li>
        </ul>
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
                                        <th class="border"> <input class="form-check-input student-checkbox" type="checkbox" style="margin-left: -1px;">
                                            <label class="form-check-label" for="select-all" style="margin-bottom:1.5rem !important;margin-left:10px;"></label>
                                        </th>
                                        <th class="border">ID</th>
                                        <th class="border">Name</th>
                                        <th class="border">Email</th>
                                        <th class="border">Phone</th>
                                        <th class="border">Country</th>
                                        <th class="border">City</th>
                                        <th class="border">Subject</th>
                                        <th class="border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($students->isEmpty())
                                    <tr>
                                        <td colspan="11" class="text-center border">
                                            <img src="{{ asset('images/not-found.jpeg') }}" alt="No Blogs Found" style="width: 100%; max-width: 400px; height: auto; margin: 0 auto;">
                                           
                                        </td>
                                    </tr>
                                    @else
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
                                        <td class="border">{{ $student->country }}</td>
                                        <td class="border">{{ $student->city }}</td>
                                        <td class="border">{{ $student->subject }}</td>
                                        <td class="border">
                                            <div class="dropdown student-dropdown">
                                                <button class="btn btn-sm dropdown-toggle-btn" type="button" aria-expanded="false" aria-haspopup="true">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>

                                                <ul class="dropdown-action d-none custom-dropdown-menu" style="min-width: 120px;">
                                                    <li>
                                                        <a href="{{ route('students.update', $student->id) }}" class="dropdown-item">
                                                            <i class="fa-regular fa-pen-to-square"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="margin:0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fa-solid fa-trash-can"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

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
@section('js')
<script>
     document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.dropdown-toggle-btn');

        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
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
        document.addEventListener('click', function () {
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
@endsection
