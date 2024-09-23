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
    .ad-line {
        border: 5px solid var(--primary-color);
        width: 60px;
        margin: 17px 0;
    }
    .ad-heading-div h3 {
    font-size: 23px;
    color: var(--primary-color);    
    }
    .fb-ad {
        margin: 0 40px;
    }
</style>
<body>
@include('whatsapp')
        <header class="text-center bg-white m-0 p-2 d-flex align-items-end justify-content-center">
            <a class="mx-auto" href="{{ route('newhome') }}"><img src="/images/logo.png" alt="EDEXCEL-logo" height="50px"></a>
        </header>
        <button class="goToTop fw-20px" style="background-color: rgb(66, 185, 121); display: block;" onclick="window.scrollTo(0, 0)"><i class="fa-solid fa-chevron-up"></i></button>
 <section class="ad-heading">
    <div class="fb-ad ">
        <div class="row">
            <div class="ad-heading-child">
                <div class="ad-line"></div>
                <h1 class="fw-bold">Privacy Policy</h1>
                <h4><b>For Edexcel Academy &amp; Educational Consultancy</b></h4>
            </div>
        </div>
    </div>
 </section>
    <section class="ad-slexx-sec" style=" display: flex; margin: 10px 30px;">
    <section class="container">
        <div class="ad-line"></div>
            <div class="ad-heading-div">
                <h3 ><b>Privacy Policy for Edexcel Academy &amp; Educational Consultancy
                    </b></h3>
                <span>Effective Date: 26.7.2024</span>
            </div>
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