<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic HTML Editor with CKEditor</title>
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
</style>
<body>
<div class="container my-3 px-3 blogs-div">
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


   

    <script>
        // Initialize CKEditor on the textarea
        CKEDITOR.replace('editor1');
    </script>
</body>
</html>
 <!-- jQuery Library -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Other Libraries or Plugins (e.g., Select2) -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
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