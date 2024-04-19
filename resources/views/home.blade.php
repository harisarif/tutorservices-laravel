<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edexcel Academy</title>
        <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
        <!-- main css-->
        <link href="css/style.css" rel="stylesheet" />
        <!-- whatsapp button css -->
        <link rel="stylesheet" href="css/whatsApp-buttons.css" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- bootstrap css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    
      <!-- bootstrap js -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- lazzy loader -->
      
        <div class="loader" id="lazzyLoader">
          <img src="./images/loader.gif" alt="lazzyloader">
      </div>
        <!---mini-header-->
        <div class="row mini_header m-0 p-0 container-fluid">
          <div class="col-sm-12  d-flex justify-content-between  my-1 align-items-center flex-sm-row flex-column p-0">
            <ul class="p-2 m-0 d-sm-inline d-block text-center">
              <li class="d-inline p-2">
                <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
                <a class="text-decoration-none text-light" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
              </li>
              <li class="d-inline p-2">
                <i class="fa-solid fa-phone text-light" aria-hidden="true"></i>
                <a class="text-decoration-none text-light" href="tel:+971566428066">+971 56 642 8066</a>
              </li>
            </ul>
            <div class="icons d-flex p-2 m-0 justify-content-center">
              <a href="#" class="icoFacebook text-light  p-2" title="Facebook"><i
                  class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="icoGoogle text-light p-2" title="instagram +"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="icoGoogle text-light p-2" title="Linked-in +"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      
        <div class="wrapper container-fluid">
          <main class="container">
             <!-- WhatsApp Button html start -->
            <div class="whatsApp_button_Warpper12">
              <div class="whatsAppMsgBox12">
                <div class="WhatsApp_Msg_Box_header">
                  <img src="./images/whatsapp_dp.png" alt="whatsapp_dp" />
                  <div class="information">
                    <h4>Edexcel</h4>
                    <p>typing..</p>
                  </div>
                </div>
                <div class="WhatsApp_Msg_Aria">
                  <div class="WhatsApp_button_Msg">
                    <p>
                       Welcome to Edexcel Academy! <br />Empowering futures with
                      Edexcel Academy & Consultancy.
                    </p>
                  </div>
                  <div class="startChat_wrapper">
                    <a href="https://wa.me/+923186785311?text=Hi%20there,%20I%20visited%20the%20website%20of%20Edexcel%20Academy%20&%20Consultancy%20and%20I'm%20interested%20in%20learning%20more%20about%20your%20services.%20Could%20you%20please%20provide%20me%20with%20some%20information%20or%20arrange%20a%20call%20to%20discuss%20further?%20Thanks!"
                      target="_blank" class="start_chat">
                      <i class="fab fa-whatsapp" aria-hidden="true"></i> Start
                      Chat</a>
                  </div>
                </div>
              </div>
      
              <div class="Toggle_WhatsApp_Button_Wrapper">
                <div class="Toggle_WhatApp_Chat_Box">
                  <input type="checkbox" id="toggleWhatsAppChat" />
                  <label for="toggleWhatsAppChat">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                  </label>
                </div>
              </div>
            </div>
            <!-- WhatsApp Button end -->
      
            <!-- header start -->
            
             
      
            <nav class="navbar navbar-expand-lg">
      
              <div class="container-fluid">
      
      
                <a class="navbar-brand" href="#">
                  <img src="images/logo.png" height="50px" alt="logo" style="height: 50px" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                  <ul class="navbar-nav align-items-md-center">
      
      
                    <!-- <li class="nav-item">
                    </li> -->
                    <li class="nav-item m-1 btn-an text-center rounded w-1">
                      <a class="nav-link text-decoration-none solid_btn" href="login.html">Login</a>
                    </li>
                    <li class="nav-item m-1 btn-an text-center rounded w-1">
                      <a class="nav-link text-decoration-none solid_btn" href="sign-up.html">Sign Up</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- header end -->
      
            <!-- banner start -->
            <section class="row banner-section">
              <div class="col-12 col-md-6 intro_lines mx-0 my-5">
                <h1><span>Edexcel</span> Academy & Consultent.</h1>
                <p>
                  Edexcel Academy is more than just a school; it's a vibrant community where students, parents, teachers, and
                  staff come together in a spirit of collaboration and mutual respect. We encourage active involvement in
                  extracurricular activities
                </p>
                <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                  Student
                </button>
                <button class="p-2 bg_theme_green btn-an rounded border-0 text-light">
                  <a class="text-light text-decoration-none active solid_btn" aria-current="page" href="./hire_tutor.html">Hire Tutor</a>
      
                </button>
              </div>
              <div class="col-12 col-md-6 p-0">
                <img src="images/banner_img.png" class="full-img" alt="banner_img" />
              </div>
            </section>
            <!--  -->
      
            <section class="row justify-content-center">
              <div class="col-12 row-gap-1 p-1">
                <a class="tutorLinks d-inline-block text-center text-decoration-none" href="./hire_tutor.html">Browse
                  Tutor</a>
                <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#FAQ">FAQ</a>
                <a class="tutorLinks d-inline-block text-center text-decoration-none" href="#">How it works</a>
                <hr />
              </div>
              <div class="col-12">
                <h3 class="d-flex justify-content-between align-items-center">
                  World Wide Tutor
                  <i onclick="hideNShow('filter-col')" class="fa fa-filter text-secondary d-inline-block d-md-none"
                    aria-hidden="true"></i>
                </h3>
                <p class="border p-2 description-tutor">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos
                  tempore itaque a nemo aliquid dicta, totam similique voluptatem
                  fugiat atque sit? Rem praesentium corrupti nostrum obcaecati
                  cupiditate soluta molestias. Amet voluptatem totam aperiam! Eos
                  consequuntur quisquam quam, commodi recusandae asperiores id illo
                  perspiciatis quasi accusamus voluptas quo iste rerum ducimus! Nam
                  rem nostrum magnam fuga veniam! Minus sed delectus velit?
                </p>
              </div>
      
              <div class="col-12">
                <hr />
                <a class="tutor_navigate text-decoration-none" href="#">Home</a> /
                <a class="tutor_navigate text-decoration-none" href="#">Tutor in Pak</a>
                /
                <a class="tutor_navigate text-decoration-none activeLink fw-bold" href="#">1370+</a>
                <hr />
              </div>
      
              <div class="row justify-content-center px-0">
                <div class="col-md-9">
                  <div class="d-flex justify-content-between mb-2 p-2 bg-body-secondary align-items-center">
                    <div class="d-flex align-item-center">
                      <p class="m-0 pt-1">1 to 100 0f 34753 tutors</p>
                      <li class="nav-item dropdown m-1 d-block px-3">
                        <a class="text-dark text-decoration-none fw-bold dropdown-toggle p-0 m-0" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          Country
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="#">USA</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">UAE</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">UK</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">ASIA</a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown m-1 d-block px-3">
                        <a class="text-dark text-decoration-none fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          More
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li>
                            <a class="dropdown-item" href="#">Another action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown m-1 d-block px-3">
                        <a class="text-dark text-decoration-none fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          City
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li>
                            <a class="dropdown-item" href="#">Another action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </li>
                        </ul>
                      </li>
                    </div>
                    <div class="text-dark">
                      show
                      <select>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>
                      per page
                    </div>
                  </div>
      
                  <!-- Tutor profile -->
      
                  <div class="tutor_profile rounded overflow-hidden mb-3">
                    <div class="d-flex justify-content-between">
                      <button class="p-1 bg_theme_green text-light border border-0">
                        Sponsored
                      </button>
                      <span class="p-1 text-secondary">
                        <i class="fa fa-bookmark text-body-tertiary"></i>
                        Watchlist
                      </span>
                    </div>
      
                    <div class="py-2 px-5">
                      <div class="row d-flex">
                        <div class="col d-flex flex-column flex-md-row align-items-center rmb-3 m-lg-0">
                          <div class="imgBox col-sm-4 d-grid mx-3">
                            <img class="img-1 rounded-circle" src="./images/profile_dp.png" alt="" />
                            <p class="d-flex align-items-center m-auto">
                              Verified
                              <span class="mx-1 varified bg-primary rounded-circle text-light"><i
                                  class="fa fa-check"></i></span>
                            </p>
                          </div>
                          <div class="personal_detail text-center text-md-start">
                            <!-- <div> -->
                            <h5>TutorName</h5>
                            <span>Female, 42 years
                              <span style="background-color: red" class="text-light font-s px-1">Pro</span></span>
                            <p class="m-0">15 years of teaching experience</p>
                            <!-- stars -->
                            <span
                              class="d-flex align-items-center text-warning d-flex justify-content-center justify-content-md-start">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </span>
                            <p class="text-danger m-0">( 10 reviews )</p>
                            <!-- </div> -->
                          </div>
                        </div>
      
                        <div class="qualification col-lg-6">
                          <div class="row p-0">
                            <table class="col-12">
                              <tr class="title-1 col col-md-3">
                                <td class="text-dark fw-bold">Qualification</td>
                                <td class="d-none d-md-block px-2">:</td>
                                <td class="font-s text-secondary">
                                  Master in Teaching
                                </td>
                              </tr>
                              <tr class="title-1 col col-md-3">
                                <td class="font-s text-dark fw-bold">Location</td>
                                <td class="d-none d-md-block px-2">:</td>
                                <td class="font-s text-secondary">
                                  Amin town,Askari plaza, 1st floor
                                </td>
                              </tr>
                              <tr class="title-1 col col-md-3">
                                <td class="font-s text-dark fw-bold">Mobile</td>
                                <td class="d-none d-md-block px-2">:</td>
                                <td class="font-s text-secondary">
                                  +92 318 xxxxxxxxx
                                  <button class="text-success bg-transparent fw-bold border-0">
                                    view contact
                                  </button>
                                </td>
                              </tr>
                              <tr class="title-1 col col-md-3">
                                <td class="font-s fw-bold">WhatsApp</td>
                                <td class="d-none d-md-block px-2">:</td>
                                <td class="font-s text-secondary">
                                  +92 318 xxxxxxxxx
                                  <button class="text-success bg-transparent fw-bold border-0">
                                    view contact
                                  </button>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 d-flex m-1 align-items-center align-items-sm-center flex-column flex-sm-row">
                          <div class="option d-flex align-items-start py-1">
                            <h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
                              Teaches
                            </h5>
                            <span class="d-none d-sm-block">:</span>
                          </div>
      
                          <div class="d-flex flex-column flex-md-row flex-wrap">
                            <span
                              class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">Business</span>
                            <span
                              class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">English
                              as second language</span>
                            <span
                              class="bg-body-secondary rounded font-s m-1 d-inline-block p-1 bg_green_hover text-center">English
                              language</span>
                            <button class="m-1 text-danger border-0 bg-transparent">
                              +1 more
                            </button>
                          </div>
                        </div>
                        <div class="col-12 d-flex m-1 align-items-center flex-column flex-sm-row">
                          <h5 class="label-h m-0 m-1 font-s1 text-center text-md-left fw-bold">
                            Curriculum
                          </h5>
                          <span class="d-none d-sm-block">:</span>
                          <span
                            class="bg-body-secondary d-inline-block rounded font-s mx-1 p-1 bg_green_hover text-center">American
                            Curriculum (AC)</span>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-lg-row mt-5 py-1 bd_top_dashed">
                        <div class="d-flex align-items-center flex-column flex-sm-row justify-content-between">
                          <span class="d-flex align-items-center px-2 py-2">
                            Expand
                            <i class="fa fa-chevron-down mx-1" aria-hidden="true"></i>
                          </span>
      
                          <div class="d-flex">
                            <p
                              class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                              <i class="fa fa-mobile"></i>
                            </p>
      
                            <p
                              class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                              <i class="fas fa-envelope"></i>
                            </p>
      
                            <p
                              class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                              <i class="fas fa-location"></i>
                            </p>
      
                            <p
                              class="d-flex justify-content-center align-items-center box-3 bg_theme_green rounded-circle text-light m-0 mx-1 box-2">
                              <i class="fas fa-certificate"></i>
                            </p>
                          </div>
                        </div>
      
                        <div
                          class="col d-flex align-items-center justify-content-center justify-content-lg-end flex-column flex-sm-row py-2">
                          <a class="text-success text-decoration-none text-center px-2 py-2" href="#">Request a callback</a>
                          <button class="bg_theme_green border border-0 text-light rounded p-2">
                            Send Message
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- tutor profile end -->
      
                  <!-- Here is form -->
      
                  <div class="form col rounded p-4 align-item-center">
                    <div class="border-bottom py-2">
                      <h3 class="py-2">Let us guide you find an expert Tutor</h3>
                    </div>
                    <form class="row g-3">
                      <p class="fs-5 text-secondary pt-2">
                        Tell us your learning needs and get immediate response from
                        qualified tutors
                      </p>
                      <div class="col-md-6 pt-3">
                        <input type="text" placeholder="Name*" class="form-control py-3" id="inputEmail4" />
                      </div>
                      <div class="col-md-6 pt-3">
                        <input type="text" placeholder="Mobile*" class="form-control py-3" id="inputPassword4" />
                      </div>
                      <div class="col-md-6">
                        <input type="email" placeholder="Enter Email" class="form-control py-3" id="inputPassword4" />
                      </div>
                      <div class="col-md-6">
                        <select class="country px-2">
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                          <option value="pakistan">pakistan</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <span><b>Note :</b>Check Email Inbox/Spam Folder for OTP</span>
                        <input type="text" class="form-control mt-4 py-3" placeholder="I need Tution at or near*" />
                      </div>
                      <div class="col-12">
                        <textarea rows="5" class="col-12 p-1 border" placeholder="Elaborate tution requirments*"></textarea>
                      </div>
                      <div class="chk-box col-12 py-2 d-flex">
                        <input type="checkbox" class="mb-3 d-none mx-2 common_checkbox" id="agreeWithTerm" />
                        <label class="checkBox_label pointer d-flex align-item-center" for="agreeWithTerm"><span
                            class="px-1 b-text">I agree to the MyPrivateTutor<b class="text-danger">Terms &
                              Conditions</b></span>
                        </label>
                      </div>
                    </form>
                    <div class="d-flex d-sm-block justify-content-center">
                      <button class="fs-5 mx-1 py-2 px-5 border-0 text-light rounded bg_theme_green">
                        Submit
                      </button>
                    </div>
                    <span class="d-flex py-3 text-center">
                      <span>Do you offer Tuition?<b class="text-success">REGISTER HERE!</b></span>
                    </span>
                  </div>
      
                  <!-- form end -->
                </div>
                <!-- col-9 end -->
      
                <!-- Filter -->
                <div id="filter-col" class="d-none col col-lg-3 d-md-block my-0 p-0">
                  <div class="filter-1 border">
                    <div class="col bg-body-secondary p-2 d-flex align-items-center justify-content-between">
                      <span><i class="fas fa-filter"></i> Filter</span>
                      <span onclick="hideNShow('filter-col')" class="fs-1 text-secondary d-md-none">&times;</span>
                    </div>
      
                    <div class="p-0 m-0 mx-2 px-2">
                      <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                        onclick="toggleList(this,'ul-toggle-1')">
                        Subject
                        <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)" aria-hidden="true"></i>
                      </h5>
                      <ul style="height: 200px" id="ul-toggle-1" class="border rounded filter_ul p-0">
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                      </ul>
                    </div>
      
                    <div class="p-0 m-0 mx-2 px-2">
                      <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                        onclick="toggleList(this,'ul-toggle-2')">
                        Curriculum
                        <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)" aria-hidden="true"></i>
                      </h5>
                      <ul style="height: 200px" id="ul-toggle-2" class="border rounded filter_ul p-0">
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                      </ul>
                    </div>
      
                    <div class="p-0 m-0 mx-2 px-2">
                      <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                        onclick="toggleList(this,'ul-toggle-3')">
                        Area
                        <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
                      </h5>
                      <ul id="ul-toggle-3" class="rounded filter_ul p-0">
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                      </ul>
                    </div>
      
                    <div class="p-0 m-0 mx-2 px-2">
                      <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold"
                        onclick="toggleList(this,'ul-toggle-4')">
                        Cagtegories
                        <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
                      </h5>
                      <ul id="ul-toggle-4" class="rounded filter_ul p-0">
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                        <li>English</li>
                      </ul>
                    </div>
      
                  </div>
                  <video src="images/edexcel.mp4" class="object-fit-cover mt-2" autoplay muted loop width="100%"></video>
      
                </div>
              </div>
      
              <!-- FQA Section -->
              <div class="p-0">
                <div class="col-12">
                  <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                    Find tutors near your locality
                  </h2>
                </div>
      
                <ul class="row mx-0 p-0 justify-content-center">
                  <li
                    class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                    <a class="text-decoration-none text py-1" href="#" aria-current="true">
                      5320 tutors in <b class="text-danger">All Areas</b> </a>
                  </li>
                  <li
                    class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                    <a class="text-decoration-none text py-1" href="#">
                      2072 tutors in
                      <b class="text-danger">Sheikh Zayed Road</b> </a>
                  </li>
                  <li
                    class="col-12 col-lg-3 mx-1 p-2 list-group-item mb-2 rounded d-flex justify-content-between align-items-center box">
                    <a class="text-decoration-none text py-1" href="#">
                      1285 tutors in
                      <b class="text-danger">Jumerirah Luke Towers</b> </a>
                  </li>
                </ul>
              </div>
              <!-- FAQ -->
              <div class="p-0" id="FAQ">
                <div class="col-12">
                  <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                    Frequently Asked Questions
                  </h2>
                </div>
      
                <div class="col-12 ms-1 ">
                  <div class="list-group-item border rounded my-2 px-2">
                    <div class="d-flex justify-content-between align-items-center" onclick="toggle('para','toggle-arrow')">
                      <h6 class="fw-bold py-3">
                        How can students improve their knowledge?
                      </h6>
                      <i class="fa fa-chevron-down" id="toggle-arrow"></i>
                    </div>
                    <div id="para">
                      <p>
                        Students can improve their knowledge and skills in a number
                        of ways like:
                      </p>
                      <ul>
                        <li>Practicing solutions regularly.</li>
                        <li>
                          Understand the underlying concepts/formulas clearly.
                        </li>
                        <li>Solving additional exercises.</li>
                        <li>Sharing a positive attitude about the subject.</li>
                      </ul>
                    </div>
                  </div>
                  <div class="list-group-item border rounded my-2 px-2">
                    <div class="d-flex justify-content-between align-items-center" onclick="toggle('para1','toggle-arrow1')">
                      <h6 class="fw-bold py-3">
                        How can tutors help students improve their score and skills?
                      </h6>
                      <i class="fa fa-chevron-down" id="toggle-arrow1"></i>
                    </div>
                    <div id="para1">
                      <p>
                        There are many ways students can improve their skills. But
                        experienced tutors in Dubai can help to:
                      </p>
                      <ul>
                        <li>Build confidence in the student.</li>
                        <li>Encourage questioning and make space for curiosity.</li>
                        <li>Emphasize conceptual understanding over procedure.</li>
                        <li>
                          Provide authentic problems that increase students’ drive
                          to engage with the subject.
                        </li>
                        <li>Share a positive attitude about the subject.</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
             
              <div id="carouselExampleCaptions" class="carousel slide text-center mb-3" data-bs-ride="carousel">
                <h2 class="py-0 my-4 text-center text-capitalize fw-bold">
                  Reviews
                </h2>
                <div class="carousel-indicators mx-5">
                  <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                    data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" style="filter: invert(1);"
                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner px-0 mx-2 d-flex ">
                  <div class="carousel-item  active">
                    <div class="main-card d-flex justify-content-center">
                      <div class="card-item bg-body-secondary py-3 ms-0  shadow rounded">
                        <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px" height="100px"
                          alt="... " />
                        <div>
                          <h3>Frank Burke</h3>
                          <span class="text-warning">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                          <p>All Areas</p>
                        </div>
      
                        <h5>First slide label</h5>
                        <p>
                          Some representative placeholder content for the first slide.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="main-card d-flex justify-content-center">
                      <div class="card-item bg-body-secondary py-3 mx-2 rounded">
                        <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px" height="100px"
                          alt="... " />
                        <div>
                          <h3>Frank Burke</h3>
                          <span class="text-warning">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                          <p>All Areas</p>
                        </div>
      
                        <h5>First slide label</h5>
                        <p>
                          Some representative placeholder content for the first slide.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="main-card d-flex justify-content-center ">
                      <div class="card-item bg-body-secondary py-3 mx-2  shadow rounded">
                        <img src="images/profile_dp.png" class="my-3 rounded-circle " width="100px" height="100px"
                          alt="... " />
                        <div>
                          <h3>Frank Burke</h3>
                          <span class="text-warning">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                          <p>All Areas</p>
                        </div>
      
                        <h5>First slide label</h5>
                        <p>
                          Some representative placeholder content for the first slide.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev " style="left: -60px;" type="button" data-bs-target="#carouselExampleCaptions"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" style="filter: invert(1);" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="right:-60px;" type="button"
                  data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" style="filter: invert(1); " aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </section>
          </main>
        </div>
      
        <button class="goToTop bg-dark fw-20px" onclick="window.scrollTo(0, 0)"><i
            class="fa-solid fa-chevron-up"></i></button>
      
        <!-- footer start... -->
      
        <footer class="row text-center text-lg-start justify-content-center m-0 p-0">
          <div class="col-12 footer-bottom text-light">
           
          </div>
      
          <div class="col-12 footer-bottom">
            <ul class="p-3 text-center">
              <li class="d-inline text-light">© Copyright 2024.</li>
              <li class="d-inline text-light">All Rights Reserved.</li>
              <li class="d-inline">
                <a class="text-decoration-none text-light" href="#">Privacy Policy</a>
              </li>
              <li class="d-inline text-light">|</li>
              <li class="d-inline">
                <a class="text-decoration-none text-light" href="#">Terms & Conditions</a>
              </li>
              <li class="d-inline text-light">|</li>
              <li class="d-inline text-light">Managed by</li>
              <li class="d-inline">
                <a class="text-decoration-none text-light" href="#">Techtrack</a>
              </li>
            </ul>
          </div>
         
        </footer>
      
        <!-- footer end.. -->
      
        <!-- 
      
      
                      #################################
                      #                               #
                      #          All modal            #
                      #                               #
                      #################################
      
      
                   -->
      
        <div class="modalBox" id="allModal">
          <div class="boxModal-1 col-4 bg-light rounded p-2">
            <h5 class="col-12 d-flex justify-content-between align-items-center px-2">
              Edexcel Academy & Consultent.
              <span class="fs-2 pointer" onclick="document.getElementById('allModal').style.display = 'none'">&times;</span>
            </h5>
      
            <p class="px-2">Are you tutor or student?</p>
      
            <hr />
            <div class="d-flex justify-content-end gap-2">
              <a href="#student" onclick="document.getElementById('allModal').style.display = 'none'"
                class="btn bg-body-secondary">Student</a>
              <a href="./sign-up-for-tutor.html" class="btn btn-success bg_theme_green border-0">Tutor</a>
            </div>
          </div>
        </div>
      
      
        <script src="./js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
</html>
