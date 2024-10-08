                    <div class="custom-select-web">
                        <i class="fa-solid fa-globe" style="color:#42b979 " aria-hidden="true" onclick="toggleDropdownWeb()"></i>
                        <div class="custom-options-web p-0" id="language-select">
                            <div class="custom-option d-flex p-1 align-items-center" data-value="en" onclick="changeLanguageWeb('en')">
                                 <img src="{{ asset('images/US.png') }}" alt="" style="width: 20%;">
                             <span class="mx-1">English</span> 
                            </div>
                            <div class="custom-option d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguageWeb('ar')">
                                <img src="{{ asset('images/saudi.png') }}" alt="" style="width: 20%;">
                                <span class="mx-1">عربي</span>
                            </div>
                            <div class="custom-option  d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguage('rs')">
                                <img src="{{ asset('images/russia.png') }}" alt="" style="width: 20%;">
                                <span class="mx-1">Русский</span>
                                
                            </div>
                            <div class="custom-option  d-flex  p-1 align-items-center" data-value="ar" onclick="changeLanguage('ch')">
                                <img src="{{ asset('images/chinese.png') }}" alt="" style="width: 20%;">
                                <span class="mx-1">中国人</span>
                            </div>
                        </div>
                    </div>
                    