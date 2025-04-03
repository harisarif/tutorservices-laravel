
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
    <div class="row mini_header m-0 p-0 container-fluid position-relative">
        <div class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">
            <ul class="p-2 m-0 d-sm-inline d-block text-center header-ul">
                <li class=" p-2">
                    <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
                    <a class="text-decoration-none text-light" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
                </li>
             <li>
             <a href="http://127.0.0.1:8000/hire-tutor" class="hiring-button">
                        Book A demo
                            </a>
             </li>
             <li>
             <!-- <a href="http://127.0.0.1:8000/hiring" class="hiring-button">
                        New page
                            </a> -->
             </li>
            </ul>
            <div>
            <!-- <h1>Welcome to our application!</h1> -->
            

                <ul class="icons d-flex p-2 m-0 justify-content-center align-items-center gap-3" style="list-style:none;">   
                  
                <div>
                    <label class="text-white" style="font-size:12px;">Swtich language from there</label>
                    <select id="language-select" onchange="changeLanguage()">
                        <option value="en">English</option>
                        <option value="ar">Arabic</option>
                    </select>
                    </div>
                    <li class=" p-2 header-phone-number">
                    
                        <i class="fa fa-phone text-light" aria-hidden="true"></i>
                        <a class="text-decoration-none text-light" href="tel:+971566428066">+971 56 642 8066</a>
                    </li>
                </ul>
                <div class="fixed" id="social">
                        <a target="_blank" href="https://www.facebook.com/share/4TeUP95tKrtC9fUa/?mibextid=LQQJ4d">
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a target="_blank" href="https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&amp;utm_source=qr">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a target="_blank" href="https://www.linkedin.com/in/edexcel-edu-130983310/">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                        </a>
                </div>
                
            </div>
        </div>
        <div class="notification mb-2 w-25 p-2 bg-info-subtle position-absolute end-0 top-100 z-1" style="display: none;">This is a demo</div>
    </div>
        <header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
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
<script>// Disable Right Click
    document.addEventListener("contextmenu", (event) => event.preventDefault());
    
    // Disable Keyboard Shortcuts
    document.addEventListener("keydown", function (event) {
        if (
            event.ctrlKey && 
            (event.key === "u" || event.key === "U" ||  // View Source
             event.key === "s" || event.key === "S" ||  // Save Page
             event.key === "i" || event.key === "I" ||  // DevTools
             event.key === "j" || event.key === "J" ||  // Console
             event.key === "c" || event.key === "C")    // Copy
        ) {
            event.preventDefault();
        }
    
        // Disable F12
        if (event.key === "F12") {
            event.preventDefault();
        }
    });
    
    // Block Developer Console (Anti Debugging)
    (function() {
        let openConsole = false;
        setInterval(() => {
            console.profile();
            console.profileEnd();
            if (console.clear) console.clear();
            if (openConsole) {
                document.body.innerHTML = "";
                alert("Developer tools are disabled!");
                window.location.reload();
            }
        }, 1000);
        Object.defineProperty(console, 'profile', {
            get: function() {
                openConsole = true;
                throw new Error("Console is disabled!");
            }
        });
    })();  </script>
  </body>
  </html>
@endsection