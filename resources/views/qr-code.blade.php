
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test QR Code</title>
</head>

<link rel="stylesheet" href="./css/new-home.css">
@extends('layouts.app')
@section('content')
<style>
    .modalBox{
        display: none !important;
    }
  footer{
    position: fixed;
    top: 92%;
  }
</style>
  <body>
    @include('whatsapp')
<header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="http://127.0.0.1:8000"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
        </header>
    <div>
        <!-- QR code container -->
        <div id="qrcode" style="display: flex;
    justify-content: center;
    margin: 60px 0;">
          
        </div>
    </div>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        var number = "+971 56 642 8066";
        var websiteLink = "https://edexceledu.com";
        var encodedData = "Whatsapp: " + number + "      Website: " + websiteLink;

        // Generate the QR code
        new QRCode(document.getElementById('qrcode'), encodedData);
    </script>

  </body>
  </html>
@endsection