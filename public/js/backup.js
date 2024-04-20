
const NextStep = (button) => {

    if (stepCounter == 3) {
        for (let a = 0; a < subjects.length; a++) {
            if (subjects[a].checked) {
                subjectsselect = 'selected';
            }
        }
        if (subjectsselect != 'selected') {
            alert('sghjkl')
        }else{
            // console.log(`next page ap ko mill geya`);

            step = document.getElementById('page-' + stepCounter);
            step.classList.add('d-none')
            secondStep = document.getElementById('page-' + (stepCounter + 1))
            secondStep.classList.remove('d-none')
            stepCounter++
            stepPersentage.style.width = (persentage + 20) + '%';
            persentage_num.innerHTML = (persentage + 20) + '%';
            console.log(persentage);
            persentage = persentage + 20;
        }

    }else 
    if (firstPageSearch.value != '' && firstPageSearch.value != ' ') {
        if (stepCounter == 1) {
            backBtn.classList.remove('d-none')
        }
        if (stepCounter < 5) {
            step = document.getElementById('page-' + stepCounter);
            step.classList.add('d-none')
            secondStep = document.getElementById('page-' + (stepCounter + 1))
            secondStep.classList.remove('d-none')
            stepCounter++
            stepPersentage.style.width = (persentage + 20) + '%';
            persentage_num.innerHTML = (persentage + 20) + '%';
            console.log(persentage);
            persentage = persentage + 20;
            if (stepCounter == 5) {
                button.type = 'submit'
                button.innerHTML = 'Submit'
            }
        }
        
    } else {
        alert('Please fill the input');
    }
    //  else {
    //     alert('all pages done')
    // }
}

const backStep = (button) => {
    if (stepCounter == 2) {
        button.classList.add('d-none')
    }
    if (stepCounter > 1) {
        step = document.getElementById('page-' + stepCounter)
        step.classList.add('d-none');
        backPage = document.getElementById('page-' + (stepCounter - 1))
        backPage.classList.remove('d-none')
        stepCounter--
        // console.log(stepCounter);
        persentage = persentage - 20;

        stepPersentage.style.width = persentage + '%'
        persentage_num.innerHTML = (persentage) + '%';
        // persentage = persentage + 20;
        nextBtn.type = "button"
        nextBtn.innerHTML = 'Next'
    }
}

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