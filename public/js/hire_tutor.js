
//  hire tutor script
let stepCounter = 1;
let persentage = 100/3;
const backBtn = document.getElementById('back-btn');
const nextBtn = document.getElementById('next-btn');
const classStartTime = document.getElementById('classStartTime');
const classEndTime = document.getElementById('classEndTime');
const stepPersentage = document.getElementsByClassName('percentage')[0]
const persentage_num = document.getElementsByClassName('persentage-num')[0]
const firstPageSearch = document.getElementById('page1-search');
let ul = document.getElementById('searchList');
let li = ul.getElementsByTagName('li');
let sEmail = document.querySelectorAll('input[type="email"]');



const NextStep = (button) => {
    //set email to create account
    sEmail[1].value = sEmail[0].value;

    if (stepCounter == 3) {
        button.type = 'submit'
    }
    if (firstPageSearch.value != '' && firstPageSearch.value != ' ') {
        if (stepCounter == 1) {
            backBtn.classList.remove('d-none')
        }
        if (stepCounter < 3) {
            // alert('dfds')
            step = document.getElementById('page-' + stepCounter);
            step.classList.add('d-none')
            secondStep = document.getElementById('page-' + (stepCounter + 1))
            secondStep.classList.remove('d-none')
            stepCounter++
            stepPersentage.style.width = (persentage + 100/3) + '%';
            persentage_num.innerHTML = ((persentage + 100 / 3).toFixed(0)) + '%';

            // alert(persentage_num.innerHTML)
            button.parentElement.classList.remove('justify-content-center');
            button.parentElement.classList.add('justify-content-between');
            // console.log(persentage);
            persentage = persentage + 100/3;
            
            if (stepCounter == 3) {
                button.type = 'submit'
                button.value = 'Submit'
                // console.log(stepCounter);
            }
        }
    }

}

const backStep = (button) => {
    if (stepCounter == 2) {
        button.classList.add('d-none');
        button.parentElement.classList.remove('justify-content-between');
            button.parentElement.classList.add('justify-content-center');
    }
    if (stepCounter > 1) {
        step = document.getElementById('page-' + stepCounter)
        step.classList.add('d-none');
        backPage = document.getElementById('page-' + (stepCounter - 1))
        backPage.classList.remove('d-none')
        stepCounter--
        // console.log(stepCounter);
        persentage = persentage - 100/3;

        stepPersentage.style.width = persentage + '%'
        persentage_num.innerHTML = (persentage.toFixed(0)) + '%';
        // persentage = persentage + 100/3;
        nextBtn.type = "button"
        nextBtn.value = 'Next'
        
    }
}

// times selector fucntion
classStartTime.addEventListener('change', () => {
    let hours = +classStartTime.value.slice(0,2) + 1;
    let minutes = classStartTime.value.slice(3,5);
    classEndTime.value = `${hours.toString().padStart(2,'0')}:${minutes}`;
});


/* Search Filter Script */

firstPageSearch.addEventListener('input', function () {
    let filter = this.value.toUpperCase();

    for (let i = 0; i < li.length; i++) {
        let textValue = li[i].textContent || li[i].innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = 'block';
        } else {
            li[i].style.display = 'none';
        }
    }
});
// add list value in to search input field
const page1List = (element) => {
    firstPageSearch.value = element.innerHTML
    for (let index = 0; index < li.length; index++) {
        li[index].style.display = 'none';
    }
}