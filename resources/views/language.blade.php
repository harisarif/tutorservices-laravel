                    <div class="custom-select-web">
                        <i class="fa fa-globe" style="color:#42b979 " aria-hidden="true" onclick="toggleDropdownWeb()"></i>
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