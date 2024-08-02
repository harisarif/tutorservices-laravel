
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
  footer{
    position: fixed;
    top: 92%;
  }
</style>
  <body>
    @include('whatsapp')
    <div  data-aos="fade-left" class="row mini_header m-0 p-0 container-fluid position-relative">
        <div data-aos="fade-left" class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">

            <ul class="p-2 m-0 d-sm-inline d-block text-center header-ul">
                <li class=" p-2">
                    <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
                    <a class="text-decoration-none text-light" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
                </li>
             <li>
             <a href="{{ route('hire.tutor') }}" class="hiring-button">
                        Book A demo
                            </a>
             </li>
             <li>
             </li>
            </ul>
            <div>
            

                <ul  class="icons d-flex p-2 m-0 justify-content-center align-items-center gap-3" style="list-style:none;">   
                  
                <div data-aos="fade-left">
                    <label class="text-white" style="font-size:12px;">Swtich language from there</label>
                    <select id="language-select" onchange="changeLanguage()">
                        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                    </select>
                    </div>
                    <li class=" p-2 header-phone-number">
                    
                        <i class="fa-solid fa-phone text-light" aria-hidden="true"></i>
                        <a class="text-decoration-none text-light" href="tel:+971566428066">+971 56 642 8066</a>
                    </li>
                </ul>
                <div data-aos="fade-left" class="fixed" id="social" style="position: fixed; top: 200px; right: 0;">
                        <a target="_blank"
                            href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d"
                        >
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a target="_blank"
                            href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a target="_blank" href="https://www.linkedin.com/in/edexcel-edu-130983310/">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                        </a>
                </div>
               
            </div>
        </div>
</div>

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