@extends('layouts.app')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}"/>


    <style>
        .modalBox {
            display: none !important;
        }
        footer {
            display: none !important;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Icon Button */
        .dropdown-icon {
            border: none;
            padding: 10px;
            background: transparent;
            font-size: 16px;
            cursor: pointer;
        }

        /* Hide dropdown menu by default */
        .dropdown-action {
            display: none;
            position: absolute;
            top: 40px; /* Adjust based on your design */
            left: -7px;
            background-color: white;
            min-width: 100px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Dropdown menu items */
        .dropdown-action li {
            display: block;
            padding: 3px 8px;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-action li a {
            color: black;
            text-decoration: none;
            display: block;
        }

        /* Show dropdown menu when the dropdown is active */
        .dropdown-action.show {
            display: block;
            z-index: 66;
            top: 50px;
            border-radius: 5px;
        }

        /* Hover effect on dropdown items */
        .dropdown-action li:hover {
            background-color: #f1f1f1;
        }
        .dropdown-action li a{
            margin-left: -9%;
        }
            .switch {
            display: inline-block;
            position: relative;
            width: 50px;
            height: 25px;
            border-radius: 20px;
            background: #dfd9ea;
            transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            vertical-align: middle;
            cursor: pointer;
        }
        .switch::before {
            content: '';
            position: absolute;
            top: 1px;
            left: 2px;
            width: 22px;
            height: 22px;
            background: #fafafa;
            border-radius: 50%;
            transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .switch:active::before {
            box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
        }
        input:checked + .switch {
            background: #72da67;
        }
        input:checked + .switch::before {
            left: 27px;
            background: #fff;
        }
        input:checked + .switch:active::before {
            box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
        }

        /* The switch - custom styled checkbox */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 20px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc; /* Default color */
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 17px;
            top: 2px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        /* When the switch is checked, make the slider green */
        input:checked + .slider {
            background-color: #4CAF50; /* Green color when active */
        }

        /* Move the slider circle to the right when checked */
        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .alert {
            position: fixed !important;
            padding: .75rem 1.25rem;
            /* margin-bottom: 1rem; */
            border: 1px solid transparent;
            border-radius: .35rem;
            float: right;
            right: -2px !important;
            display:flex;
            width:20%;
        }
        /* Dropdown container */

    </style>
@php
    $notifications = auth()->user()->unreadNotifications;
@endphp
@if (session('success'))
        <div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

            {{ session('success') }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
        </div>
    @endif
    @section('content')
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
            <li class="nav-item active">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-1">
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

                                <a class="dropdown-item text-success" id="drop" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
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
                    <div class="tab-content mt-4" id="myTabContent">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                                <h1 class="h3 mb-0 text-gray-800">{{ __('Teachers List') }}</h1>
                                <div class="del-button d-flex">
                                    <div class="mt-3">
                                    <button type="button" class="btn btn-danger" id="delete-selected">Multiple Delete</button>
                                    </div>
                                    <div style="display:grid;margin-left:10px;margin-top:-7px;">
                                        <label class="mb-0">Search By Country</label>
                                        <select name="countryTeacher" id="countryTeacher" class="form-select select2 country-select w-50"  >
                                                        @foreach ($countries as $key => $country)
                                                            <option value="{{ $key }}">{{ $country }}</option>
                                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                        <div class=" AB-sb">

                            <table class="table teachers-table border">
                                <thead>
                                    <tr>
                                        <th class="border"> <input class="form-check-input" type="checkbox" id="select-all" style="margin-left: -1px;">
                                        <label class="form-check-label" for="select-all" style="margin-bottom:1.5rem !important;margin-left:10px;"></label></th>
                                        <th class="border">ID</th>
                                        <th class="border">Name</th>
                                        <th class="border">Degree</th>
                                        <th class="border">Gender</th>
                                        <th class="border">Country</th>
                                        <th class="border">Document</th>
                                        <th class="border">Email</th>
                                        <th class="border">Phone</th>
                                        <th class="border">Status</th>
                                        <th class="border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tutors as $tutor)
                                    <tr>
                                    <td class="border">
                                        <input style="margin-left:-1px;" class="form-check-input tutor-checkbox" type="checkbox" value="{{ $tutor->id }}" id="flexCheckChecked-{{ $tutor->id }}">
                                        <label class="form-check-label" for="flexCheckChecked-{{ $tutor->id }}"></label>
                                    </td>

                                    <td class="border">{{ $tutor->id }}</td>
                                    <td class="border">{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                                    <td class="border">{{ $tutor->qualification }}</td>
                                    <td class="border">{{ $tutor->gender }}</td>
                                    <td class="border">{{ $tutor->location }}</td>
                                    <td class="border"><a href="{{ url($tutor->document) }}" target="_blank">View PDF Document</a></td>
                                   
                                    <td class="border">{{ $tutor->email }}</td>
                                    <!-- <td>{{ $tutor->experience }} {{ $tutor->experience > 1 ? 'years' : 'year' }}</td> -->

                                    <td class="border">{{ $tutor->phone }}</td>
                                    <!-- Toggle Switch -->
                                    <td class="border">
                                    <form action="{{ route('update.tutor.status') }}" method="POST" id="statusForm_{{ $tutor->id }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $tutor->id }}">
                                        <input type="hidden" name="status" id="statusInput_{{ $tutor->id }}" value="{{ $tutor->status }}">

                                        <!-- Switch -->
                                        <label class="switch mb-0 mt-2">
                                            <input type="checkbox" id="statusToggle_{{ $tutor->id }}"
                                                {{ $tutor->status === 'active' ? 'checked' : '' }}
                                                onchange="updateStatus({{ $tutor->id }})">
                                            <span class="slider round"></span>
                                        </label>

                                        <button type="submit" style="display:none;"></button> <!-- Optional submit button (hidden) -->
                                    </form>
                                    </td>

                                    <td class="border">
                                        <div class="dropdown">
                                            <button class="dropdown-icon dropdownButton">
                                                <i class="fa fa-ellipsis-v"></i> <!-- You can replace this with any icon -->
                                            </button>
                                            <ul class="dropdown-action dropdownMenu">
                                                <li>
                                                    <a href="{{ route('view-teacher', $tutor->id) }}" class="btn btn-sm text-justify">
                                                    <i class="fa fa-eye" style="color: #4e73df;"></i>
                                                    <span class="mx-1">View</span>
                                                </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('edit-teacher', $tutor->id) }}" class="btn btn-sm text-justify">
                                                    <i class="fa fa-edit" style="color: #4e73df;"></i>
                                                    <span class="mx-1">Edit</span>
                                                </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('teachers.destroy', $tutor->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm d-flex align-items-center" onclick="return confirm('Are you sure?')" style="color: black; margin-left: -11%;">
                                                            <i class="fa fa-trash mx-1" style="color: #e74a3b;"></i>
                                                            <span class="mx-1">Delete</span>
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
@endsection
@section('js')

    <!-- Bootstrap core JavaScript-->


    <!-- Custom scripts for all pages-->
    <!-- <script src="{{asset('js/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

    <script src="{{asset('js/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/js/dataTables.bootstrap4.min.js')}}"></script>
    
    <script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>
<script>
        document.querySelectorAll(".dropdownButton").forEach((button) => {
            button.addEventListener("click", (event) => {
                // Find the nearest dropdown menu relative to the clicked button
                const dropdownMenu = event.target.nextElementSibling;

                if (dropdownMenu && dropdownMenu.classList.contains("dropdownMenu")) {
                    dropdownMenu.classList.toggle("show");
                }
            });
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
        $('#select-all').click(function() {
            // Check/uncheck all checkboxes based on the main checkbox
            $('.tutor-checkbox').prop('checked', this.checked);
        });
        $('#delete-selected').click(function() {
            // Gather all checked checkbox values
            var selected = [];
            $('.tutor-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {

                Swal.fire({
                    title: 'Error!',
                    text: 'Please select at least one tutor to delete.',
                    icon: 'error', // Use 'error' instead of 'danger'
                    confirmButtonText: 'OK'
                });

                return;
            }

            // Confirm deletion
            if (confirm('Are you sure you want to delete the selected tutors?')) {
                $.ajax({
                    url: "{{ route('teachers.destroy.bulk') }}", // Update with your route
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
                        alert('Error occurred while deleting tutors.');
                    }
                });
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
                $('#alertsDropdown').on('click', function(e) {
                    e.preventDefault();
                    $('#notificationDropdown').toggle();
                });

        // Optionally, close the dropdown if clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.notification-icon').length) {
                $('#notificationDropdown').hide();
            }
        });
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
    </script>

@endsection