@extends('layouts.app')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
<meta name="description" content="Terms and condition Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
<link rel="stylesheet" href="{{ asset('css/terms.css') }}">
@section('content')
<style>
    footer {
        background-color: #42b979;
    }

    .fb-ad {
        margin: 0 40px;
    }

    .custom-select-wrapper {
        position: relative;
        display: flex;
        cursor: pointer;
        text-align: justify;
    }

    [dir="rtl"] .custom-select-web {
        margin-left: 25px;
    }

    #language-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #fff;
        border: 1px solid #ccc;
        color: var(--primary-color) !important;
        border-radius: 4px;
        padding: 5px;
        font-size: 12px;
        color: #333;
        width: 95px;
        max-width: 95px;
        outline: none;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .custom-options-web {
        display: none;
        position: absolute;
        top: 30px;
        left: -109px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    [dir="rtl"] .ad-heading {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 170px;
    }

    [dir="rtl"] .whatsApp_button_Warpper12 {
        right: 94%;
    }

    [dir="rtl"] .whatsapp-help {
        right: -116px;
        white-space: nowrap;
        width: 114px;
    }

    [dir="rtl"] .goToTop {
        right: 94%;
    }

    .custom-options.open {
        display: block;
    }

    .custom-options-web.open {
        display: block;
    }

    [dir="rtl"] .main-footer {
        text-align: justify !important;
    }

    [dir="rtl"] .custom-options-web {
        left: -4px;
    }

    .fa-globe {
        margin-left: -50px;
    }

    @media (max-width: 425px) {
        .ad-banner {
            border-radius: 0;
        }

        .tac {
            font-size: 30px !important;
        }

        .Vl {
            font-size: 19px !important;
        }

        .links-footer {
            text-align: justify;
        }
    }
</style>

<body>
    @include('whatsapp')
    <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;" onclick="window.scrollTo(0, 0)"><i class="fa fa-chevron-up"></i></button>
    <header style="background: #42b979;" class="text-center m-0 p-2 d-flex  justify-content-center align-items-center">

        <a class="mx-auto" href="{{ route('newhome') }}">
            <img src="{{ asset('images/white-logo.jpeg') }}" alt="Edexcel-logo" style="height: 100px; border-radius: 60px;width:100px;">
        </a>
        <div class="custom-select-wrapper">
            @include('language')
        </div>
    </header>
    <section class="ad-banner">
        <div class="fb-ad">
            <div class="row">
                <div data-aos="fade-right" class="ad-banner-child">
                    <div class="ad-heading">
                        <div class="line"></div>
                        <h1 class="tac"><b>Terms and Conditions</b></h1>
                        <h4><b>for Edexcel Academy & Educational Consultancy</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ad-video" style="display: flex; margin: 0 26px;">
        <section class="container ">
            <div data-aos="fade-left" class="ad-trems">
                <div class="ad-line"></div>
                <div class="ad-heading-div">
                    <h3 class="Vl"><b>Terms and Conditions for Edexcel Academy & Educational Consultancy
                        </b></h3>
                    <span>Effective Date: 26.7.2024</span>
                </div>
                <div class="ad-instruction">
                    <div class="ad-para">
                        <p>
                            <strong>Introduction</strong>
                        <p> Welcome to <b>Edexcel Academy & Educational Consultancy</b>, operated by Edexcel (“Company”,
                            “we”, “our”, “us”). By accessing or using our application (“App” ‘Website’), you agree to be
                            bound by these Terms and Conditions (“Terms”). Please read them carefully. If you do not agree
                            with any part of these Terms, you must not use our App."</p>
                        </p>
                        </p>
                        <p>
                            <strong>1. Use of the App</strong>
                        </p>
                        <p>
                            <strong>1.1 Eligibility:</strong>
                            You must be at least 10 years old to use our App. By using our App, you represent and warrant
                            that you meet this age requirement.
                        </p>
                        <p>
                            <strong>1.2 Account Registration:</strong>
                            To access certain features of the App, you may be required to create an account. You agree to
                            provide accurate, current, and complete information during the registration process and to
                            update such information to keep it accurate, current, and complete.
                        </p>
                        <p><strong>1.3 Account Security: </strong>You are responsible for maintaining the confidentiality of
                            your account login information and for all activities that occur under your account. You agree
                            to notify us immediately of any unauthorized use of your account.</p>
                        <p><strong>2. Services Provided</strong></p>

                        <p><strong>2.1 Tutoring Services:</strong> Our App provides access to various tutoring services,
                            including but not limited to online classes, lesson tracking, and subject trackin</p>

                        <p><strong>2.2 Content and Materials:</strong>
                            All content and materials available on our App, including but not limited to text, graphics, images, and videos, are the property of Edexcel Academy & Educational Consultancy or its licensors and are protected by copyright and other intellectual property laws.
                        </p>
                        <p><strong><b>3. User Conduct</b></strong></p>
                        <p>
                            <strong>3.1 Prohibited Activities:</strong>
                            You agree not to:
                            <br>
                            – Use the App for any unlawful purpose.
                            <br>
                            – Post or transmit any content that is defamatory, obscene, offensive, or otherwise
                            objectionable.
                            <br>
                            – Attempt to gain unauthorized access to our systems or networks.
                            <br>
                            – Interfere with the proper functioning of the App.
                        </p>
                        <p><strong>3.2 User Content:</strong>You are solely responsible for any content you post or transmit through the App. You grant us a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, and display such content in connection with the operation of the App.</p>

                        <p><strong><b>4. Payments and Refunds</b></strong></p>
                        <p><strong>4.1 Fees:</strong> Certain features of the App may be subject to fees. All fees are posted on the App and are subject to change at our discretion.</p>

                        <p><strong>4.2 Payments:</strong> All payments are processed through third-party payment processors. You agree to provide accurate payment information and to update such information as necessary.</p>

                        <p><strong>4.3 Refunds:</strong> Refunds for services provided are subject to our refund policy, which is available on our website. All refund requests must be made in accordance with this policy.</p>

                        <p><strong><b>5. Termination</b></strong></p>

                        <p><strong>5.1 Termination by You:</strong>
                            You may terminate your account at any time by following the instructions on the App or by contacting us directly.
                        </p>

                        <p><strong>5.2 Termination by Us:</strong>
                            We reserve the right to terminate or suspend your account and access to the App, with or without notice, if you violate these Terms or engage in any conduct that we, in our sole discretion, consider to be inappropriate or harmful.
                        </p>
                        <p><strong><b>6. Disclaimers and Limitation of Liability</b></strong></p>

                        <p><strong>6.1 Disclaimers:</strong> The App and all content and services provided through the App are provided on an “as is” and “as available” basis. We make no warranties, express or implied, regarding the App or its content.</p>

                        <p><strong>6.2 Limitation of Liability: </strong> To the maximum extent permitted by law, Edexcel Academy & Educational Consultancy shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (i) your use or inability to use the App; (ii) any unauthorized access to or use of our servers and/or any personal information stored therein; (iii) any interruption or cessation of transmission to or from the App; (iv) any bugs, viruses, trojan horses, or the like that may be transmitted to or through the App by any third party; (v) any errors or omissions in any content or for any loss or damage incurred as a result of the use of any content posted, emailed, transmitted, or otherwise made available through the App.</p>

                        <p><strong><b>7. Indemnification</b></strong>
                        <p>You agree to indemnify, defend, and hold harmless Edexcel Academy & Educational Consultancy and its affiliates, directors, officers, employees, and agents from and against any and all claims, damages, obligations, losses, liabilities, costs, or debt, and expenses (including but not limited to attorney’s fees) arising from: (i) your use of and access to the App; (ii) your violation of any term of these Terms; (iii) your violation of any third-party right, including without limitation any copyright, property, or privacy right; or (iv) any claim that your content caused damage to a third party.</p>

                        <p><strong><b>8. Governing Law</b></strong>
                        <p>These Terms shall be governed and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions.</p>
                        </p>
                        </p>

                        <p><strong><b>9. Changes to These Terms</b></strong>
                        <p>We reserve the right to modify these Terms at any time. If we make changes, we will notify you by revising the effective date at the top of these Terms and, in some cases, we may provide additional notice (such as sending you an email notification or providing a notice within the App). Your continued use of the App following the posting of changes constitutes your acceptance of such changes.</p>
                        </p>
                        <p><strong><b>10. Contact Us</b></strong>
                        <p>If you have any questions about these Terms, please contact us at:</p>
                        </p>
                        <p>Edexcel Academy & Educational Consultancy
                            <br>
                            <a class="text-decoration-none" href="mailto:info@eduexceledu.com">info@eduexceledu.com</a>
                            <br>
                            <a class="text-decoration-none text-light" href="#"></a>
                            <br>
                            Dubai , UAE
                        </p>
                        <p>Thank you for using Edexcel Academy & Educational Consultancy.</p>
                        <p>This Terms and Conditions document should be customized with your company’s specific contact information and any additional details relevant to your operations</p>
                    </div>
                </div>
            </div>
        </section>

    </section>

</body>

@endsection
<script>
    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select')) {
            document.querySelector('.custom-options').classList.remove('open');
        }
    });

    function toggleDropdownWeb() {
        document.querySelector('.custom-options-web').classList.toggle('open');
    }

    function changeLanguageWeb(value) {
        document.querySelector('.custom-options-web').classList.remove('open');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.custom-select-web')) {
            document.querySelector('.custom-options-web').classList.remove('open');
        }
    });

    function changeLanguage(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }

    function changeLanguageWeb(locale) {
        var url = "{{ url('lang') }}/" + locale;
        window.location.href = url;
    }
</script>