<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="Home Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <title>Edexcel Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}"/>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png" />
    <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
</head>
@php
$notifications = auth()->user()->unreadNotifications()->latest()->take(10)->get();
@endphp
@if (session('success'))
    <div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

        {{ session('success') }}
        <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
    </div>
@endif
<body id="page-top">

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
        <li class="nav-item active">
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
                <ul  class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow mx-1">

                        <div class="notification-icon" >
                            <a href="#" class="nav-link dropdown-toggle"  id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-success"></i> {{-- Replace with your icon --}}
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="badge badge-danger badge-counter" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>


                        </div>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in BD notification-dropdown " id="notificationDropdown" aria-labelledby="alertsDropdown "  style="display: none;">
                            <h6 class="dropdown-header bg-success border-success text-center">
                                {{ __('messages.Notification') }}
                            </h6>
                            <a class="dropdown-item px-0 justify-content-center @if(auth()->user()->notifications->count() === 0) no-notifications @endif" href="#">
                                @if(auth()->user()->notifications->count() > 0)
                                    @foreach(auth()->user()->notifications as $notification)
                                        <div class="classic d-flex py-2 px-3 @if(!$loop->last) border-bottom @endif">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div class="ntf">
                                                <div class="small">{{ $notification->data['message'] }}</div>
                                                <span class="font-weight-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="mt-2 text-center">
                                        <div class="small no-message">No notifications available.</div>
                                    </div>
                                @endif
                            </a>

                            <a class="dropdown-item-fector  small" href="#">Show All Notifications </a>
                        </div>
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

                            <a class="dropdown-item text-success" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-success" ></i>
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
            <div class="container-fluid" >
                <div class="tab-content" id="myTabContent">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('messages.Blogs') }}</h1>
                        <div class="del-button d-flex">
                            <div>
                                <button type="button" class="btn btn-danger" id="delete-selected-students">Multiple Delete</button>
                            </div>

                        </div>
                    </div>
                    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                    <div class=" AB-sb">

                    <table class="table teachers-table">
                        <thead>
                        <tr>
                            <th><input class="form-check-input" type="checkbox" id="select-all">
                                <label class="form-check-label" for="select-all"></label></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @if($blogs->isEmpty())
    <tr>
        <td colspan="5" class="text-center p-4">
            <img src="{{ asset('images/not-found.jpeg') }}" alt="No Blogs Found" style="width: 100%; max-width: 400px; height: auto; margin: 0 auto;">
            <p class="mt-3">No blogs found.</p>
        </td>
    </tr>
@else
    @foreach ($blogs as $blog)
        <tr id="student-row-{{ $blog->id }}">
            <td>
                <input class="form-check-input blog-checkbox" type="checkbox" value="{{ $blog->id }}" id="flexCheckChecked-{{ $blog->id }}">
                <label class="form-check-label" for="flexCheckChecked-{{ $blog->id }}"></label>
            </td>
            <td>{{ $blog->title }}</td>
            <td>{{ strip_tags($blog->description) }}</td>
            <td>
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 50px; height: auto;">
                @else
                    <span>No image</span>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="dropdown-icon" id="dropdownButton-{{ $blog->id }}" onclick="toggleDropdown({{ $blog->id }})">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-action d-none" id="dropdownMenu-{{ $blog->id }}">
                        <li>
                            <a href="{{ route('edit-teacher', $blog->id) }}" class="btn btn-sm text-justify">
                                <i class="fa-regular fa-pen-to-square" style="color: #4e73df;"></i>
                                <span class="mx-1">Edit</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm d-flex align-items-center px-0" onclick="return confirm('Are you sure?')" style="color: black;">
                                    <i class="fa-solid fa-trash-can mx-1" style="color: #e74a3b;"></i>
                                    <span class="mx-1">Delete</span>
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

</body>

</html>

<!-- Bootstrap core JavaScript-->


<!-- Custom scripts for all pages-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script>
$(document).ready(function () {
    $('#select-all').click(function () {
        $('.blog-checkbox').prop('checked', this.checked);
    });

    $('#delete-selected-students').click(function () {
        var selected = [];

        $('.blog-checkbox:checked').each(function () {
            selected.push($(this).val());
        });

        if (selected.length === 0) {
            Swal.fire('No Blogs Selected', 'Please select at least one blog to delete.', 'warning');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the selected blogs.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete them!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('blogs.destroy.bulk') }}",
                    type: 'DELETE',
                    data: {
                        ids: selected,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        selected.forEach(id => $('#blog-row-' + id).remove());
                        Swal.fire('Deleted!', 'Selected blogs have been deleted.', 'success');
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });
});
</script>
<script>
        $('.notification-icon').on('click', function(e) {
                    e.preventDefault();
                    $('#notificationDropdown').toggleClass('d-block');
                });
    function toggleDropdown(id) {
        const dropdownMenu = document.getElementById(`dropdownMenu-${id}`);

        // Hide all other dropdowns first
        document.querySelectorAll('.dropdown-action').forEach(menu => {
            if (menu !== dropdownMenu) {
                menu.classList.add('d-none');
            }
        });

        // Toggle the selected dropdown menu
        dropdownMenu.classList.toggle('d-none');
    }

    // Close all dropdowns if clicking outside
    document.addEventListener('click', function(event) {
        const isDropdownButton = event.target.closest('.dropdown-icon');
        const isDropdownMenu = event.target.closest('.dropdown-action');

        // Close all dropdowns if the click is outside dropdown buttons/menus
        if (!isDropdownButton && !isDropdownMenu) {
            document.querySelectorAll('.dropdown-action').forEach(menu => menu.classList.add('d-none'));
        }
    });
    
    $('.country-select').select2()
    $('#countryTeacher').on('change', function() {

        var country_id = $(this).val(); // Get the selected country ID

        // Make an AJAX request to find tutors based on the selected country
        $.ajax({
            url: '/find-tutors', // Your route for finding tutors
            type: 'GET', // HTTP method (can be POST if needed)
            data: { country_id: country_id }, // Send selected country ID
            success: function(response) {
                // Handle the response, e.g., display the tutors on the page
                console.log('sadsads',response);
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
                data: { notification_id: notificationId, read: !isRead },
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
    function cancel(){
        $('.alert').addClass('d-none')
    }
    $(document).on('select2:open', function(e) {
        let scrollPos = $(window).scrollTop();
        setTimeout(function() {
            $(window).scrollTop(scrollPos);
        }, 0);
    });
</script> <!-- Select2 JS -->
<script src="{{asset('js/inspect.js')}}"></script>