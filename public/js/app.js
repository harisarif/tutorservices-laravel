const toggleList = (heading, ToggleUl) => {
    const ul = document.getElementById(ToggleUl);
    if (ul.style.height != '200px') {
        ul.classList.add('border')
        ul.style.height = '200px'
    } else {
        ul.style.height = '0'
        ul.classList.remove('border')
    }
    if (heading.children[0].style.transform != 'rotate(180deg)') {
        heading.children[0].style.transform = 'rotate(180deg)';
    } else {
        heading.children[0].style.transform = 'rotate(0deg)'
    };
}

const hideNShow = (toggleItem) => {
    const vToggleItem = document.getElementById(toggleItem);
    vToggleItem.classList.toggle('mb_filter');
}

/* FAQ */
// footer//

const toggle = (para, arr) => {
    const dropcontent = document.getElementById(para);
    const arrow = document.getElementById(arr);
    if (dropcontent.style.height != 'auto') {
        dropcontent.style.height = 'auto';
        arrow.style.transform = 'rotate(180deg)';
    } else {
        dropcontent.style.height = '0';
        arrow.style.transform = 'rotate(0deg)';
    }
}

window.addEventListener('load', () => {
    setTimeout(() => {
        const MODAL_BOX = document.getElementById('allModal');
        MODAL_BOX.style.display = 'flex';
        MODAL_BOX.children[0].classList.add('dropModal')
    }, 1000)
})

const goToTop = document.getElementsByClassName('goToTop')[0];


window.addEventListener('scroll', () => {
    // console.log(window.scrollY);
    if (window.scrollY > 200) {
        // header.classList.add('stiky_header');
        goToTop.style.display = 'block';
    } else {
        // header.classList.remove('stiky_header');
        goToTop.style.display = 'none';
    }
})

window.addEventListener('load', ()=>{
    document.getElementById('lazzyLoader').style.display = 'none';
})
