let stepCounter = 1;
let persentage = 100 / 3;
const backBtn = document.getElementById("back-btn");
const nextBtn = document.getElementById("next-btn");
const classStartTime = document.getElementById("classStartTime");
const classEndTime = document.getElementById("classEndTime");
const stepPersentage = document.getElementsByClassName("percentage")[0];
const persentage_num = document.getElementsByClassName("persentage-num")[0];
const firstPageSearch = document.getElementById("page1-search");
let sEmail = document.querySelectorAll('input[type="email"]');

// Toast display function
const showToast = (message, type = "info") => {
    const toast = document.createElement("div");
    toast.classList.add("toast", type);
    toast.textContent = message;
    
    if (window.matchMedia("(min-width: 1360px)").matches) {
        toast.style.top = "450px"; 
    } else {
        toast.style.top = "350px"; 
    }

    // Append the toast to the body
    document.body.appendChild(toast);

    // Show the toast with fade-in
    setTimeout(() => {
        toast.classList.add("show");
    }, 300);

    // Hide the toast after 3 seconds
    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => {
            toast.remove();
        }, 500); // Wait for the fade-out transition before removing it
    }, 5000);
};

const NextStep = (button) => {
    const totalSteps = 3;

    if (stepCounter === totalSteps) {
        localStorage.removeItem("email");
        button.type = "submit"; // Make the button a submit button only on step 3
        return;
    }

    if (firstPageSearch.value.trim() !== "") {
        if (stepCounter === 1) {
            document.getElementById("back-btn").style.display = "block"; // Show Previous button
        }

        if (stepCounter < totalSteps) {
            // Hide the current step
            const currentStep = document.getElementById("page-" + stepCounter);
            currentStep.classList.add("d-none");

            // Show the next step
            const nextStep = document.getElementById("page-" + (stepCounter + 1));
            nextStep.classList.remove("d-none");

            stepCounter++;

            // Update the fraction display
            persentage_num.innerHTML = `Step ${stepCounter}/${totalSteps}`;

            // Adjust the progress bar width
            const progressFraction = (stepCounter / totalSteps) * 100;
            stepPersentage.style.width = progressFraction + "%";

            // Change the button to 'Submit' on the last step
            if (stepCounter === totalSteps) {
                button.type = "submit";
                button.value = "Submit";
            }
        }
    }
};

const backStep = (button) => {
    const totalSteps = 3;

    if (stepCounter > 1) {
        // Hide the current step
        const step = document.getElementById("page-" + stepCounter);
        step.classList.add("d-none");

        // Show the previous step
        const backPage = document.getElementById("page-" + (stepCounter - 1));
        backPage.classList.remove("d-none");

        stepCounter--;

        // Update the fraction display
        persentage_num.innerHTML = `Step ${stepCounter}/${totalSteps}`;

        // Adjust the progress bar width
        const progressFraction = (stepCounter / totalSteps) * 100;
        stepPersentage.style.width = progressFraction + "%";

        // Hide Previous button on the first step
        if (stepCounter === 1) {
            button.style.display = "none";
        }

        // Reset Next button to its default state
        const nextBtn = document.getElementById("next-btn");
        nextBtn.type = "button";
        nextBtn.value = "Next →";
    }
};
