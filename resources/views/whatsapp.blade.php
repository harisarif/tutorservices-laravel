<style>
    .whatsapp-help{
        position: absolute; 
        top: 14px; 
        right: 0; 
        left: -98px; 
        font-size: 15px;
        background: #fff;
        width: 94px; 
        color:#000;
        border-radius: 6px; 
        padding: 1px; text-align: center
    }
</style>
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
                            <a href="https://wa.me/+971566428066?text=Hi%20there,%20I%20visited%20the%20website%20of%20Edexcel%20Academy%20&%20Consultancy%20and%20I'm%20interested%20in%20learning%20more%20about%20your%20services.%20Could%20you%20please%20provide%20me%20with%20some%20information%20or%20arrange%20a%20call%20to%20discuss%20further?%20Thanks!"
                                target="_blank" class="start_chat">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i> Start
                                Chat</a>
                        </div>
                    </div>
                </div>

                <div class="Toggle_WhatsApp_Button_Wrapper">
                    <div class="Toggle_WhatApp_Chat_Box">
                        <span class="whatsapp-help">{{ __('messages.Need Help?') }}</span>
                        <input type="checkbox" id="toggleWhatsAppChat" />
                        <label for="toggleWhatsAppChat">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        </label>
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