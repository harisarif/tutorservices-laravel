<link rel="stylesheet" href="./css/new-home.css">
@extends('layouts.app')
@section('content')
<style>    
     .modalBox{
        display: none !important;
     }
    :root {
    --primary-color: #42b979;
}
.ad-heading-child h1{
    font-size: 45px;
    color: var(--primary-color);
    padding: 10px 0;
}
.ad-detail-child p{
    margin: 20px 0;
}
.ad-detail-child p b{
    font-size: 50px;
}
.ad-line{
    border: 5px solid var(--primary-color);
    width: 60px;
    margin: 10px 0;
}
.ad-heading{
    border-bottom-right-radius: 170px;
    background: #fafafa;
}

</style>
<body>
@include('whatsapp')
        <header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
        </header>

 <section class="ad-heading">
    <div class="container">
        <div class="row">
            <div class="ad-heading-child">
                <div class="ad-line"></div>
            <h1>Privacy Policy</h1>
            </div>
        </div>
    </div>
 </section>
    <section class="ad-slexx-sec" style=" display: flex; margin: 10px 30px;">
    <section class="container">
        <div data-aos="fade-left" class="ad-detail-child">
            <p>Edexcel Academy & Educational Consultancy, a company registered in Pakistan and Wales (No. +971566428066),
                herein referred to as Spires. We have created this privacy statement ("Statement"™) in order to
                demonstrate our firm commitment to the privacy of the details that you provide to us when using this
                website.</p>

            <p>This policy applies where we are acting as a data controller with respect to the personal data of our
                website visitors and service users; in other words, where we determine the purposes and means of the
                processing of that personal data.</p>

            <p>We may change this Privacy Policy from time to time. We may provide you with additional notice (such as
                adding a statement to the homepages of our websites or sending you an email notification). We encourage
                you to review the Privacy Policy whenever you interact with us to stay informed about our information
                practices and the ways you can help protect your privacy.</p>

            <p>WHAT IS PERSONAL INFORMATION
                Personal information means information about an identifiable individual or information that permits an
                individual to be identified. It does not include business contact information, such as name, title,
                business address and business telephone number when used for business communications.</p>

            <p>OUR COMMITMENT
                Spires takes responsibility for maintaining and protecting the personal information under our control.
                We have appointed a Data Controller who can be contacted directly by the public . Our Data Protection
                Officer is responsible for our day to day compliance. We review this policy and our personal data
                protection practices regularly to ensure that we are in compliance with applicable legislation and
                current best practices.</p>

            <p>HOW WE COLLECT, USE AND DISCLOSE PERSONAL INFORMATION
                We only collect and process personal information as required to meet the purposes that we have
                identified. We do not indiscriminately collect or retain personal information and will delete all
                provided information within 6 years of the termination of the usage of our services, save for
                information required for tax and regulatory purposes for a longer period of limitation.</p>

            <p>Spires typically collects personal information that is voluntarily provided by the individual in
                question. At times, however, personal information is obtained from other sources, such as government
                bodies or third parties such as employers, references and service providers, as permitted by law. Where
                the purpose for the collection of personal information is unclear, you can ask the Spires representative
                with whom you are dealing to provide an explanation of the purpose for the data collection. More
                generally, we are happy to provide you with all personal information we hold upon request in writing to
                suppor</p>

            <p>Our reason for collecting personal information about tutors, students, parents, staff and consultants is
                to establish and maintain our contractual or other business relationship with that individual.</p>

            <p>The purpose for collecting personal information about tutors and students is primarily to facilitate the
                provision of educational tutoring services online, including to allow students to quickly and easily
                assess the professional and educational background of tutors, as well as allowing us to communicate
                effectively with tutors, students and parents and to maintain mailing lists. We may also use your
                personal information to:</p>
                <p>As appropriate, Spires will ask for specific consent to collect, use and disclose personal information. Such a request, and your consent to such request, may be given in writing, orally or through the Spires platform. In some cases, consent can be implied through an individual relationship or conduct with us, depending on the sensitivity of the information.</p>
                <p>We may also share aggregated or de-identified information, which cannot reasonably be used to identify you.</p>
                <p>Generally, personal information supplied to us is confidential and we do not disclose the information to unconnected third parties except with actual or implied consent, or as permitted or required by law. We do not exchange or sell personal information.</p>
                <p>Spires may use third party service providers from time to time to carry out certain functions for us such as printing, storage, shredding or document scanning. Where we use such outside service providers, we require those third parties to protect personal information in the same manner in which we protect it and to not use or disclose it for any purposes except as directed by Spires.</p>
                
                <p>We may process data about your use of our website and services ("usage data"). The usage data may include your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views and website navigation paths, as well as information about the timing, frequency and pattern of your use of our website or services. The source of the usage data is Google Analytics, Mix Panel, Smartlook and Facebook. This usage data may be processed for the purposes of analysing the use of our website and services. The legal basis for this processing is the legitimate interest of our platform and website, namely the monitoring and improvement of our website and services.</p>
                <p>We may process information needed to set up and maintain an account with Spires, in order to provide you with our services ("account data"). This account data may include your name, phone number and email address. The source of the account data is the information you provide. The account data may be processed for the purposes of providing our services, ensuring the security of our website and services, maintaining back-ups of our databases and communicating with you. The legal basis for this processing is to allow the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract.</p>

                <p>We may process information to be included in your personal client profile on our website ("profile data"). This profile data may include your name, address, telephone number, email address, profile pictures, gender, date of birth, educational details and employment details. Profile data may be processed for the purposes of enabling your use of our services. The legal basis for this processing is to allow the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract.</p>
                <p>We may process your personal data that are provided in the course of the use of our services ("service data"). This service data may include information about your classes, academic performance and any factors relevant to this, your current, past or future academic institutions, your availability for tuition sessions, your preferred tuition location, and your experience or qualifications. We gather this information directly from you. Service data may be processed for the purpose of effectively providing our services. The legal basis for this processing to facilitate the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract.</p>
                <p>We may process your personal data that are provided in the course of the use of our services ("service data"). This service data may include information about your classes, academic performance and any factors relevant to this, your current, past or future academic institutions, your availability for tuition sessions, your preferred tuition location, and your experience or qualifications. We gather this information directly from you. Service data may be processed for the purpose of effectively providing our services. The legal basis for this processing to facilitate the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract.</p>
                <p>We may process information contained in any enquiry you submit to us regarding our services ("enquiry data"). Enquiry data may be processed for the purposes of offering or providing relevant services to you. The legal basis for this processing is the legitimate interest of our platform, namely to respond to enquiries concerning our services and to make our services available to potential clients.</p>
                <p>We may process information relating to our customer relationships, including customer contact information ("customer relationship data"). The customer relationship data may include your name, your contact details, and information contained in communications between us and you. The source of the customer relationship data is you. The customer relationship data may be processed for the purposes of managing our relationships with customers, communicating with customers, keeping records of those communications and promoting our services to customers. The legal basis for this processing is the legitimate interest of our platform, namely the proper management of our customer relationships.</p>

                <p>We may process information relating to transactions, including purchases of goods and services, that you enter into with us and/or through our website ("transaction data"). Transaction data may include your contact details, details of the payment method used, including details of specific payment cards, your billing address, and the details of the transaction itself. The transaction data may be processed for the purpose of supplying the purchased goods and services and keeping proper records of those transactions. The legal basis for this processing is the performance of a contract between you and us and/or taking steps, at your request, to enter into such a contract and our legitimate interests, namely the proper administration of our website and business.</p>

                <p>We may process information that you provide to us for the purpose of subscribing to our email notifications ("notification data"). The notification data may be processed for the purposes of sending you the relevant notification. The legal basis for this processing is the legitimate interests of our platform, namely the need to inform clients of relevant developments in relation to their use of our services, for example any charges to be levied in respect of those services.</p>

                <p>We may process information that you provide to us for the purpose of subscribing to our email newsletters and job, class, account, message and payment emails (“notification data”). This data may be processed for the purposes of sending you the relevant newsletters. The legal basis for this processing is consent.</p>

                <p>We may process information contained in or relating to any communication that you send to us and/or other users ("correspondence data"). The correspondence data includes the communication content, video recordings, phone recordings and message transcipts and metadata associated with these communications. Our website will generate the metadata associated with communications made using the website. The correspondence data may be processed for the purposes of communicating with you, dispute resolution and record-keeping. The legal basis for this processing is our legitimate interests, namely the proper administration of our website and business and communications with users and protecting the integrity of our platform and brand.</p>
                <p>We may process any of your personal data identified in this policy where necessary for the purposes of obtaining or maintaining insurance coverage, managing risks, reporting misconduct or obtaining professional advice. The legal basis for this processing is our legitimate interests, namely the proper protection of our business against risk.</p>
                <p>In addition to the specific purposes for which we may process your personal data set out in this Section, we may also process any of your personal data where such processing is necessary for compliance with a legal obligation to which we are subject, or in order to protect your vital interests or the vital interests of another natural person. Please do not supply any other person's personal data to us, unless we prompt you to do so.</p>
                <p>PROTECTING YOUR PERSONAL INFORMATION
                    We strive to maintain personal information in an accurate, complete and up-to-date a form as necessary to fulfil the purposes for which it was collected. We protect personal information by security safeguards appropriate to the sensitivity of the personal information, regardless of format. Our security safeguards include premises security and restricted access to files containing personal information. Depending upon the information under our control, we also use technological safeguards such as security software and firewalls to prevent hacking or unauthorized computer access, internal passwords and security policies.</p>
                <p>We may disclose your personal data to our insurers and/or professional advisers in so far as reasonably necessary for the purposes of obtaining or maintaining insurance coverage, managing risks, obtaining professional advice, or the establishment, exercise or defence of legal claims, whether in court proceedings or in an administrative or out-of-court procedure.</p>
                <p>We may disclose enquiry data, profile data, service data or correspondence data to another or multiple clients of our paltform in so far as reasonably necessary to affect an introduction between tutor and student for the purposes of arranging tuition, and to facilitate and administer that relationship, and to assist in the performance of the contract between tutor and student. The legal basis for this is the legitimate interest of our platform, namely the provision of our services.</p>
        </div>
    </section>
    <div id="filter-col" class="d-none col col-lg-3 d-md-block my-0 p-0" style="overflow: hidden;">
                        <div class="filter-1 border d-none">
                            <div class="col bg-body-secondary p-2 d-flex align-items-center justify-content-between">
                                <span><i class="fas fa-filter"></i> Filter</span>
                                <span onclick="hideNShow('filter-col')" class="fs-1 text-secondary d-md-none">×</span>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-1')">
                                    Subject
                                    <i class="fa fa-chevron-down text-secondary" style="transform: rotate(180deg)" aria-hidden="true"></i>
                                </h5>
                                <ul style="height: 200px" id="ul-toggle-1" class="border rounded filter_ul p-0">
                                    <li>English</li>
                                    <li>Maths</li>
                                    <li>Physic</li>
                                    <li>Chemistry</li>
                                    <li>social sutdy</li>
                                    <li>Islammiat</li>
                                    <li>Urdu</li>
                                    <li>Computer</li>
                                    <li>Biology</li>
                                    <!-- <li></li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li>
                                    <li>English</li> -->
                                </ul>
                            </div>

                            <div class="p-0 m-0 mx-2 px-2">
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-2')">
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
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-3')">
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
                                <h5 class="m-0 mt-2 pointer d-flex align-items-center justify-content-between font-s fw-bold" onclick="toggleList(this,'ul-toggle-4')">
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
                       
                        <!-- <video src="images/edexcel.mp4" class="object-fit-cover mt-2" autoplay muted loop
                            width="100%"></video> -->
                            <video src="images/video.mp4" class="object-fit-cover mt-2" autoplay="" muted="" loop="" width="100%"></video>

                    </div>
    </section>
   
</body>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection