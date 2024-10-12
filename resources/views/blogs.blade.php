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
        width: 75%;
    }
    .cke_notifications_area{
        display: none;
    }
</style>
<body>
<div class="container my-3 px-3 blogs-div">
    <div class="blog-heading">
        <h1 class="text-center border-bottom text-success fw-bold">Blog Add</h1>
    </div>
  <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{route('blogs.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Blog title</label>
          <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
            <label for="">Blog description</label>
           <!-- Textarea that will be replaced by CKEditor -->
            <textarea id="editor1" name="description"></textarea>
        </div>
        <div class="form-group">
          <label> Image </label>
          <div class="input-group">
            
            <!-- <span class="input-group-btn">
              <span class="btn btn-success btn-file">
                Browse <input type="file" name="bimgs" multiple>
              </span>
             </span> -->
            <input type="file" name="image" class="form-control">
           </div>
        </div>
        <div class="form-group">
           <input type="submit" name="Submit" value="Publish" class="btn btn-success form-control Bg-button" />
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
</script>