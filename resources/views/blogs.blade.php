@extends('layouts.admin')
@section('title')
   Edexcel Blogs
@endsection 
<script src="{{asset('js/js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/admin-blog.css')}}"/>

@if (session('success'))
        <div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

            {{ session('success') }}
            <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
        </div>
    @endif
@section('content')
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
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
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

    <!-- Bootstrap core JavaScript-->
     <!-- Select2 JS -->
@section('js')
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
@endsection