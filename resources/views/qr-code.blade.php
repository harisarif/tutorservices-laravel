
@extends('layouts.app')
<style>
    #qrcode {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    #allModal {
      display: none !important;
    }
</style>
@section('content')
@include('layouts.header')
  <div style="height: 515px;">
    <div id="qrcode"></div>
  </div>
@endsection
@section('js')
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script>
    $(document).ready(function(){
      var defaultLink = "https://edexceledu.com"; // Change this to your default website link
      new QRCode(document.getElementById('qrcode'), defaultLink);
    });
  </script>
@endsection
