
let persentage = 100 / 3;
const classStartTime = document.getElementById("classStartTime");
const classEndTime = document.getElementById("classEndTime");
let sEmail = document.querySelectorAll('input[type="email"]');
let stepCounter = 1;
let totalSteps = 4;
const backBtn = document.getElementById("back-btn");
const nextBtn = document.getElementById("next-btn");
const firstPageSearch = document.getElementById("page1-search");

const showToast = (message, type = "info") => {
    const toast = document.createElement("div");
    toast.classList.add("toast", type);
    toast.textContent = message;
    
    if (window.matchMedia("(min-width: 1360px)").matches) {
        toast.style.top = "450px"; 
    } else {
        toast.style.top = "350px"; 
    }

    document.body.appendChild(toast);
    setTimeout(() => {
        toast.classList.add("show");
    }, 300);
    
    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => {
            toast.remove();
        }, 500);
    }, 5000);
};

const NextStep = (button) => { 
    if (stepCounter < totalSteps) {
        const currentStep = document.getElementById("page-" + stepCounter);
        console.log("Before change - stepCounter:", stepCounter);
        console.log("Before change - currentStep:", currentStep);
        
        const nextStep = document.getElementById("page-" + (stepCounter + 1));
        console.log("Before change - nextStep:", nextStep);

        // Ensure elements exist before updating
        if (currentStep && nextStep) {
            // Hide current step
            currentStep.classList.add("d-none");
            console.log(`Added 'd-none' to page-${stepCounter}`);

            // Delay to allow DOM to update
            setTimeout(() => {
                // Show next step
                nextStep.classList.remove("d-none");
                console.log(`Removed 'd-none' from page-${stepCounter + 1}`);
                console.log("After change - nextStep:", nextStep);
                
                stepCounter++;

                // Show Previous button for all steps except the first one
                if (stepCounter > 1) {
                    backBtn.style.display = "block";
                }

                console.log("After change - stepCounter:", stepCounter);

                // Update progress bar
                const progress = (stepCounter / totalSteps) * 100;
                console.log("Updated progress:", progress);

                // Update step classes
                const steps = document.querySelectorAll('.step-item');
                console.log("Step Items Before Update:", steps);

                steps.forEach((stepItem, index) => {
                    if (index + 1 < stepCounter) {
                        stepItem.className = 'step-item step-completed';
                    } else if (index + 1 === stepCounter) {
                        stepItem.className = 'step-item step-current';
                    } else {
                        stepItem.className = 'step-item step-upcoming';
                    }
                });

                console.log("Step Items After Update:", steps);

                // Change button to 'Submit' on the last step
                if (stepCounter === totalSteps) {
                    if (button) {
                        button.type = "submit";
                        button.value = "Submit";
                    } else {
                        console.error("Button is not defined.");
                    }
                }
            }, 50); // Small delay to allow DOM updates
        } else {
            console.error("Error: Step elements not found in the DOM.");
        }
    }
};

const backStep = () => {
    if (stepCounter > 1) {
        const currentStep = document.getElementById("page-" + stepCounter);
        const previousStep = document.getElementById("page-" + (stepCounter - 1));

        if (currentStep && previousStep) {
            currentStep.classList.add("d-none");
            previousStep.classList.remove("d-none");

            stepCounter--;

            // Update progress bar
            const progress = (stepCounter / totalSteps) * 100;
            const progressBar = document.querySelector('.progress-bar');
            if (progressBar) {
                progressBar.style.width = progress + '%';
            }

            // Update step classes
            const steps = document.querySelectorAll('.step-item');
            steps.forEach((stepItem, index) => {
                if (index + 1 < stepCounter) {
                    stepItem.className = 'step-item step-completed';
                } else if (index + 1 === stepCounter) {
                    stepItem.className = 'step-item step-current';
                } else {
                    stepItem.className = 'step-item step-upcoming';
                }
            });

            // Hide the back button on the first step
            if (stepCounter === 1) {
                backBtn.style.display = "none";
            }

            // Reset Next button to its default state
            nextBtn.type = "button";
            nextBtn.value = "Next →";
        }
    }
};