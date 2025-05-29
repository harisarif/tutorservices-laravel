@extends('layouts.admin')
@section('title')
   Edexcel Dashboard
@endsection 
<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')
@if (session('success'))
<div class="alert alert-success  justify-content-between" style="z-index: 6;
    padding: 14px !important;">
    <div>
        {{ session('success') }}
    </div>
    <div>
        <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
    </div>
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
                    <button id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3 bg-success text-white">
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
                                    <i class="fas fa-bell fa-fw text-success"></i>
                                    <span class="badge badge-danger badge-counter"
                                        id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                
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
                            <img class="img-profile rounded-circle" src="{{asset('images/undraw_profile.svg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in md"
                            aria-labelledby="userDropdown" style="left: -95px !important; width: 0;">

                            <a class="dropdown-item text-success"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success"></i>
                                {{ __('messages.Logout') }}
                            </a>
                        </div>

                    </li>

                </ul>

            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
            </form>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Dashboard') }} </h1>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 col-sm-6 col-12 my-2">
                                <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex" style=" justify-content: space-between;">
                                                <div class="media-body text-left counter">
                                                    <h3 class="danger text-success" id="teacher-count">{{$tutors->count()}}</h3>
                                                    <span>{{ __('messages.Teachers') }} </span>
                                                </div>
                                                <div class="align-self-center animated-icons">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="40" height="64" fill="#42b979">
                                                        <path
                                                            d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-2.67 0-8 1.337-8 4v3h16v-3c0-2.663-5.33-4-8-4zm-8 6v-1c0-1.721 3.468-3 8-3s8 1.279 8 3v1H4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 my-2">
                                <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex text-success"
                                                style=" justify-content: space-between;">
                                                <div class="media-body text-left counter">

                                                    <h3 class="success text-success" id="count">{{$students->count()}}</h3>
                                                    <span>{{ __('messages.Students') }}</span>
                                                </div>
                                                <div class="align-self-center animated-icons">
                                                    <svg width="40" height="64" viewBox="0 0 64 64" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="32" cy="20" r="12" fill="#42b979"></circle>
                                                        <path d="M32 36C22 36 14 44 14 54H50C50 44 42 36 32 36Z"
                                                            fill="#42b979"></path>
                                                        <path d="M32 4L14 14L32 24L50 14L32 4Z" fill="#42b979">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12 my-2">
                                <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex" style=" justify-content: space-between;">
                                                <div class="media-body text-left counter">
                                                    <h3 class="warning text-success" id="subject-count">{{$inquires->count()}}</h3>
                                                    <span>Inquiries</span>
                                                </div>
                                                <div class="align-self-center animated-icons">
                                                    <i class="fa-solid fa-book-open "
                                                        style="color:#42b979; font-size:25px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12 my-2">
                                <div class="MH card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex " style=" justify-content: space-between;">
                                                <div class="media-body text-left counter">
                                                    <h3 class="danger text-success" id="lang-count">{{$blog->count()}}</h3>
                                                    <span>{{ __('messages.Blogs') }}</span>
                                                </div>
                                                <div class="align-self-center animated-icons">
                                                    <i class="fas fa-globe" aria-hidden="true"
                                                        style="    font-size: 25px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-success">
                                        <h6 class="m-0 font-weight-bold text-white">
                                            {{ __('messages.Edexcel Overview') }}
                                        </h6>
                                        <div class="dropdown no-arrow">

                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-success">
                                        <h6 class="m-0 font-weight-bold text-white">
                                            {{ __('messages.Revenue Sources') }}
                                        </h6>
                                        <div class="dropdown no-arrow">

                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2"><i class="fas fa-circle text-primary"></i>
                                                Direct </span>
                                            <span class="mr-2"> <i class="fas fa-circle text-success"></i>
                                                Social</span>
                                            <span class="mr-2"><i class="fas fa-circle text-info"></i>
                                                Referral</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="inquiry" role="tabpanel" aria-labelledby="inquiry-tab">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Inquiry') }}</h1>
                            <div class="del-button">
                                <button type="button" class="btn btn-danger" id="delete-inquiry">Multiple
                                    Delete</button>
                            </div>
                        </div>
                        @include('inquiry-list')

                    </div>

                    <div class="tab-pane fade" id="blogs" role="tabpanel" aria-labelledby="blogs">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Blogs') }}</h1>
                            <div class="del-button">
                                <button type="button" class="btn btn-danger" id="delete-inquiry">Multiple
                                    Delete</button>
                            </div>
                        </div>
                        @include('blogs')

                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Student') }}</h1>
                            <div class="del-button">
                                <button type="button" class="btn btn-danger" id="delete-student">Multiple
                                    Delete</button>
                            </div>
                        </div>
                        @include('student-list')

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Teacher') }}</h1>
                            <div class="del-button d-flex">
                                <div>
                                    <button type="button" class="btn btn-danger" id="delete-selected">Multiple
                                        Delete</button>
                                </div>
                                <div>
                                    <label>Select By Country</label>
                                    <select name="countryTeacher" id="countryTeacher"
                                        class="form-select select2 country-select w-50">
                                        @foreach ($countries as $key => $country)
                                        <option value="{{ $key }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @include('teacher-list')
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
    <a class="scroll-to-top rounded text-white bg-success" href="#page-top">
        <i class="fas fa-angle-up mt-3"></i>
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
        $('.text-success').on('click', function (e) {
    e.preventDefault();
    const dropdown = $('#notificationDropdown');
    
    if (dropdown.hasClass('d-block')) {
        dropdown.removeClass('d-block').addClass('d-none');
    } else {
        dropdown.removeClass('d-none').addClass('d-block');
    }
});

        $('#select-all-student').click(function() {
            // Check/uncheck all checkboxes based on the main checkbox
            $('.student-checkbox').prop('checked', this.checked);
        });
        $('#select-all-inquiry').click(function() {
            // Check/uncheck all checkboxes based on the main checkbox
            $('.inquiry-checkbox').prop('checked', this.checked);
        });

        // Optional: Uncheck "Select All" if one of the checkboxes is unchecked
        $('.tutor-checkbox').click(function() {
            if (!$(this).prop('checked')) {
                $('#select-all').prop('checked', false);
            }
        });


        $('#delete-inquiry').click(function() {
            // Gather all checked checkbox values
            var selected = [];
            $('.inquiry-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Please select at least one inquiry to delete.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });

                return;
            }

            // Confirm deletion
            if (confirm('Are you sure you want to delete the selected inquiries?')) {
                $.ajax({
                    url: "{{ route('inquiry.destroy.bulk') }}", // Update with your route
                    type: 'DELETE',
                    data: {
                        ids: selected,
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function(response) {
                        // Handle success (e.g., reload the page or remove deleted rows)
                        location.reload(); // Reload page after successful deletion
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('Error occurred while deleting inquires.');
                    }
                });
            }
        });
        $('#delete-student').click(function() {
            // Gather all checked checkbox values
            var selected = [];
            $('.student-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                // alert('Please select at least one student to delete.');
                Swal.fire({
                    title: 'Error!',
                    text: 'Please select at least one tutor to delete.',
                    icon: 'error', // Use 'error' instead of 'danger'
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Confirm deletion
            if (confirm('Are you sure you want to delete the selected students?')) {
                $.ajax({
                    url: "{{ route('student.destroy.bulk') }}", // Update with your route
                    type: 'DELETE',
                    data: {
                        ids: selected,
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function(response) {
                        // Handle success (e.g., reload the page or remove deleted rows)
                        location.reload(); // Reload page after successful deletion
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('Error occurred while deleting students.');
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('.teachers-table').DataTable({
            responsive: true
        });
        $('.student-table').DataTable({
            responsive: true
        });

    });
</script>
<script>
    $(document).ready(function() {


        // Optionally, close the dropdown if clicking outside of it
        // $(d9876
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
    $(document).ready(function($) {
        $('.country').select2();
    });
</script>
@endsection