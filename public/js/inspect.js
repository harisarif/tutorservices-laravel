
    // document.addEventListener("contextmenu", (event) => event.preventDefault());
    
    // // Disable Keyboard Shortcuts
    // document.addEventListener("keydown", function (event) {
    //     if (
    //         event.ctrlKey && 
    //         (event.key === "u" || event.key === "U" ||  // View Source
    //          event.key === "s" || event.key === "S" ||  // Save Page
    //          event.key === "i" || event.key === "I" ||  // DevTools
    //          event.key === "j" || event.key === "J" ||  // Console
    //          event.key === "c" || event.key === "C")    // Copy
    //     ) {
    //         event.preventDefault();
    //     }
    
    //     // Disable F12
    //     if (event.key === "F12") {
    //         event.preventDefault();
    //     }
    // });
    
    // // Block Developer Console (Anti Debugging)
    // (function() {
    //     let openConsole = false;
    //     setInterval(() => {
    //         console.profile();
    //         console.profileEnd();
    //         if (console.clear) console.clear();
    //         if (openConsole) {
    //             document.body.innerHTML = "";
    //             alert("Developer tools are disabled!");
    //             window.location.reload();
    //         }
    //     }, 1000);
    //     Object.defineProperty(console, 'profile', {
    //         get: function() {
    //             openConsole = true;
    //             throw new Error("Console is disabled!");
    //         }
    //     });
    // })();  