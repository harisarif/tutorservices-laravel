<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description"
        content="Home Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <title>Edexcel Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <script src="{{asset('js/select2.min.js')}}"></script>
</head>

<style>
</style>
@php
$notifications = auth()->user()->unreadNotifications()->latest()->take(10)->get();
@endphp

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="nav nav-tabs navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <li class=" py-2 mx-2 d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src=" {{asset('images/white-logo.jpeg')}}" class="d-lg-block d-none" id="toggleImage"
                        height="50px" alt="logo" style="height: 50px; border-radius: 10px; width: 100%;">
                </a>
                <a href="{{ route('home') }}">
                    <img src=" {{asset('images/favicon.png')}}" id="toggleImage" class="d-lg-none d-sm-block AB-img"
                        alt="Image" style="width:70%;">
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
            <li class="nav-item active">
                <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                    aria-controls="dashboard" aria-selected="false">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('messages.Dashboard') }}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2" href="{{route('all.tutors')}}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>{{ __('messages.Teacher') }}</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
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


                            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                <!-- @if(auth()->user()->unreadNotifications->count() > 0) -->
                                <span class="badge badge-danger badge-counter"
                                    id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                <!-- @endif -->
                            </a>

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
            <footer class="sticky-footer  bg-gradient-success">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy;Edexcel Academy & Educational Consultancy</span>
                    </div>
                </div>
            </footer>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/js/jquery.min.js')}}"></script>
    <script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 JS -->
    <script src="{{asset('js/inspect.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('js/js/demo/Chart.min.js')}}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('js/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function() {


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

</body>

</html>
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