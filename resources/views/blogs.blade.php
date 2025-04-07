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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
    <style>
         .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    input[readonly] {
        background-color: white !important;
        cursor: text !important;
    }
    .Bg-button{
        width: 20%;
        display: flex;
        margin: 0 auto;
    }
    /* this is only due to codepen display don't use this outside of codepen */
    .blogs-div {
        padding-top: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 90%;
    }
    .cke_notifications_area{
        display: none;
    }
    .Lb-heading{
        color: black;
    }
    .upload-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            padding: 30px;
            text-align: center;
            margin: auto;
        }
        .upload-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .upload-box {
            border: 2px dashed #ccc;
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
        }
        .upload-box.dragover {
            border-color: #00aaff;
            background-color: #e0f7ff;
        }
        .upload-box input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        .upload-box i {
            font-size: 50px;
            color: #42b979;
            margin-bottom: 10px;
        }
        .upload-box p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }
        .upload-box p strong {
            color: purple;
        }
        .preview {
            margin-top: 20px;
        }
        .preview img {
            max-width: 100px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .progress-container {
            margin-top: 20px;
            display: none;
        }
        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #f1f1f1;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress {
            width: 0%;
            height: 100%;
            background-color: #00aaff;
            border-radius: 5px;
            transition: width 0.4s ease;
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
                    <img src=" {{asset('{{asset('images/favicon.pn')}')}}" id="toggleImage" class="d-lg-none d-sm-block AB-img" alt="Image" style="width:70%;">
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
                <a class="nav-link py-2" id="profile-tab" data-toggle="tab"
                href="#profile" role="tab" aria-controls="profile" aria-selected="false">
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
            <li class="nav-item active">
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
                    <div class="blog-heading">
        <h1 class="text-center border-bottom text-success fw-bold">Add New Blog</h1>
    </div>
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="{{route('blogs.store')}}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="Lb-heading">Blog title</label>
                <input type="text" class="form-control" name="title" placeholder="Title"/>
                </div>
                <div class="form-group">
                    <label class="Lb-heading">Blog description</label>
                <!-- Textarea that will be replaced by CKEditor -->
                    <textarea id="editor1" name="description"></textarea>
                </div>
                <div class="form-group">
                <label class="Lb-heading">Blogs Image </label>
                    <div class="upload-container">
                        <h3 class="upload-title">Upload Your File</h3>
                        <div class="upload-box" id="dropZone">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Drag & Drop your file or <strong>Browse</strong></p>
                            <input type="file" id="image" name="image" multiple>
                        </div>
                        <div class="preview" id="preview"></div>
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress" id="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <input type="submit" name="Submit" value="Add" class="btn btn-success form-control Bg-button" />
                </div>
            </form>
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
    <script src="{{asset('js/js/jquery.min.js')}}"></script>
    <script src="{{asset('js/js/sb-admin-2.min.js')}}"></script>

    <script src="{{asset('js/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/js/bootstrap.bundle.min.js')}}"></script>
<script>
        CKEDITOR.replace('editor1');
        $(function() {
  $(".bcontent").wysihtml5({
    toolbar: {
      "image": false
    }
  });

  $(document).on('change', '.btn-file :file', function() {
    var input = $(this);
    var numFiles = input.get(0).files ? input.get(0).files.length : 1;
    console.log(input.get(0).files);
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  $('.btn-file :file').on('fileselect', function(event, numFiles, label){
    var input = $(this).parents('.input-group').find(':text');
    var log = numFiles > 1 ? numFiles + ' files selected' : label;

    if( input.length ) {
      input.val(log);
    } else {
      if( log ){ alert(log); }
    }

  });
});

const image = document.getElementById('image');
        const dropZone = document.getElementById('dropZone');
        const preview = document.getElementById('preview');
        const progress = document.getElementById('progress');
        const progressContainer = document.querySelector('.progress-container');

        // Handle drag and drop functionality
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        image.addEventListener('change', (e) => {
            const files = e.target.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            progressContainer.style.display = 'block';
            preview.innerHTML = '';
            progress.style.width = '0%';

            Array.from(files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);

                // Fake progress update
                let percentage = 0;
                const interval = setInterval(() => {
                    percentage += 10;
                    progress.style.width = percentage + '%';

                    if (percentage === 100) {
                        clearInterval(interval);
                    }
                }, 100);
            });
        }

    </script>
