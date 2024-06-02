<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edexcel Academy</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/sign-up.css">
    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *, ::after, ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after, ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1, h2, h3, h4, h5, h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b, strong {
            font-weight: bolder
        }

        code, kbd, pre, samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub, sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button, input, optgroup, select, textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button, select {
            text-transform: none
        }

        [type=button], [type=reset], [type=submit], button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu, ol, ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder, textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button], button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio, canvas, embed, iframe, img, object, svg, video {
            display: block;
            vertical-align: middle
        }

        img, video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *, ::before, ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        .z-10 {
            z-index: 10
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style>
    <!-- main css-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <!-- whatsapp button css -->
    <link rel="stylesheet" href="{{asset('css/whatsApp-buttons.css')}}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>

<body>
<main>
    <header class="main_header d-flex  align-items-end">
        <a class="nav-link active px-3 py-0 fw-bold" aria-current="page" href="{{ route('hire.tutor') }}"><i>&#8592; Hire
                Tutor</i></a>
        <a class="m-auto" href="{{ route('newhome') }}"><img style="height: 50px" src="{{asset('images/logo.png')}}" alt="EDEXCEL-logo"
                                                          height="50px"></a>

    </header>
    <section class="inner">
        <h1>Let's get started!</h1>
        <div class="inner_wrapper">
            <div class="signup_holder">
                <div class="icon_holder">
                    <img src="{{asset('images/student_parent_normal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/student_parent_active.png')}}" alt="" class="active">
                </div>
                <h4>Students & Parents</h4>
                <p class="para">Discover amazing teachers, post tuition jobs, take enriching courses</p>
                <a href="{{ route('hire.tutor') }}" class="signup_typ">Find a Great Teacher</a>
            </div>
            <div class="signup_holder">
                <div class="icon_holder">
                    <img src="{{asset('images/ttnormal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/tt_active.png')}}" alt="" class="active">
                </div>
                <h4>Tutors & Trainers</h4>
                <p>Find tuition jobs, build your teaching career, teach online courses</p>
                <a href="#" class="learn_more">Learn More</a>
                <a href="{{route('tutor')}}" class="signup_typ">Sign Up</a>
            </div>
            <div class="signup_holder">
                <div class="icon_holder">
                    <img src="{{asset('images/center_normal.png')}}" alt="" class="normal">
                    <img src="{{asset('images/center_active.png')}}" alt="" class="active">
                </div>
                <h4>Centers & Training Institutes</h4>
                <p>Get students, sell your courses, launch online tutoring, grow your business</p>
                <a href="#" class="learn_more">Learn More</a>
                <a href="{{route('tutor')}}" class="signup_typ">Sign Up</a>

                <!-- <a href="#" class="signup_typ" style="background-color: #ddd; color: #999; border: 0;">Sign Up</a> -->
            </div>

        </div>
        <div class="login">
            <a href="{{route('login')}}" class="login_typ">Already Have an Account? <span>SIGN IN</span></a>
        </div>
    </section>
    <!-- <section class="tutor_work px-2 m-0">
      <ul>
        <li><img src="https://www.myprivatetutor.ae/images/2020/icon/study_color.svg" alt=""><a href="#">Post Learning
            Requirement</a></li>
        <li><img src="https://www.myprivatetutor.ae/images/2020/icon/bullhorn_color.svg" alt=""><a href="#">How It
            Works</a></li>
        <li><img src="https://www.myprivatetutor.ae/images/2020/icon/hire-icon.png" alt=""><a href="#">Sign Up</a></li>
      </ul>
    </section> -->

    <!-- footer start
        <div class="container">
        <footer class="mt-4 row text-center text-lg-start justify-content-center">
          <div onclick="toggle('footer-ul-1', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-1">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>

          <div onclick="toggle('footer-ul-2', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-2">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>

          <div onclick="toggle('footer-ul-3', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-3">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>

          <div onclick="toggle('footer-ul-4', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-4">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>

          <div onclick="toggle('footer-ul-5', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-5">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>

          <div onclick="toggle('footer-ul-6', '')" class="col-12 col-sm-6 col-md-3 col-lg-2">
            <h5 class="text-secondary py-2">Tutors by City</h5>
            <ul class="footer-ul d-sm-block" id="footer-ul-6">
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Dubai</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Abu Dhabi</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Sharjah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#">Al Ain</a>
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Ras Al Khaimah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Fujairah</a
                >
              </li>
              <li class="d-block d-inline py-1">
                <a class="text-decoration-none text-secondary" href="#"
                  >Umm Al Quwain</a
                >
              </li>
            </ul>
          </div>


          <div class="col-12">
            <ul class="text-center p-2">
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#"
                  >About Us</a
                >
              </li>
              <li class="d-inline">|</li>
              <li class="d-inline">
                <i
                  class="fa fa-envelope-square text-secondary"
                  aria-hidden="true"
                ></i>
                Email:<a class="text-decoration-none text-secondary" href="#"
                  >support@edexcelacademy.ae</a
                >
              </li>
              <li class="d-inline">|</li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#"
                  >Contact Us</a
                >
              </li>
            </ul>
            <hr />
          </div>
          <div class="col-12">
            <ul class="p-2 text-center">
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#">USA,</a>
              </li>
            </ul>
          </div>
          <div class="col-12">
            <ul class="p-2 text-center">
              <li class="d-inline text-secondary">© Copyright 2002 - 2024.</li>
              <li class="d-inline text-secondary">All Rights Reserved.</li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#"
                  >Privacy Policy</a
                >
              </li>
              <li class="d-inline text-secondary">|</li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#"
                  >Terms & Conditions</a
                >
              </li>
              <li class="d-inline text-secondary">|</li>
              <li class="d-inline text-secondary">Managed by</li>
              <li class="d-inline">
                <a class="text-decoration-none text-secondary" href="#"
                  >Learnpick Technologies lnc</a
                >
              </li>
            </ul>
          </div>
          <div class="col-12 d-flex">
            <h6 class="fw-bold">Disclaimer:</h6>
            <p class="px-2 text-start">
              Students can find the best tutors and instructors through
              MyPrivateTutor's online tutoring marketplace. We neither supply nor
              recommend tutors to those in search of such services, and
              vice-versa. MyPrivateTutor does not verify the identity or
              authenticity of information posted by tutors or students. You can
              learn more about verifying the identity of other users in our Safety
              Center.
            </p>
          </div>
        </footer> -->

    <footer class="row text-center text-lg-start justify-content-center m-0 p-0">
        <!-- <div onclick="toggle('footer-ul-1', '')" class="col-12 col-sm-6 "> -->
        <!-- <ul class=" col-12 social-network social-circle text-center py-5 bg-dark">
          <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="#" class="icoGoogle" title="Google +"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
        <div class="col-12 bg-dark">
          <ul class="text-center p-2 text-light">
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">About Us</a>
            </li>
            <li class="d-inline">|</li>
            <li class="d-inline">
              <i class="fa fa-envelope-square text-light" aria-hidden="true"></i>
              Email:<a class="text-decoration-none text-light" href="#">support@edexcelacademy.ae</a>
            </li>
            <li class="d-inline">|</li>
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">Contact Us</a>
            </li>
          </ul>
          <hr />
        </div> -->
        <!-- <div class="col-12 footer-bottom text-light">
          <ul class="p-2 text-center">
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">USA,</a>
            </li>
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">UAE,</a>
            </li>
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">UK,</a>
            </li>
            <li class="d-inline">
              <a class="text-decoration-none text-light" href="#">ASIA</a>
            </li>
        </div> -->

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
                    <a class="text-decoration-none text-light" href="#">Tecktrack</a>
                </li>
            </ul>
        </div>
    </footer>
</main>
<script src="./js/app.js"></script>
</body>
</html>
