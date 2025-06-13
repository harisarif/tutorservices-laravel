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
        const MODAL_BOX = document.getElementById('newsletterModal');
        MODAL_BOX.style.display = 'flex';
        MODAL_BOX.children[0].classList.add('dropModal')
    }, 1000)
})
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('newsletterModal');
    const closeBtn = document.querySelector('.closeModal');

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
        setTimeout(() => {
            const MODAL_BOX = document.getElementById('allModal');
            MODAL_BOX.style.display = 'flex';
            MODAL_BOX.children[0].classList.add('dropModal')
        })
    });

});
$('#newsletterForm').on('submit', function (e) {
    e.preventDefault();

    let email = $('#newsletterEmail').val().trim();
    let pattern = /^[\w.\-]+@(gmail|yahoo|outlook)\.com$/i;

    if (!pattern.test(email)) {
        $('#responseMessage').text('Please enter a valid Gmail, Yahoo, or Outlook email.').css('color', 'red');
        return;
    }
    document.getElementById('lazzyLoader').style.display = 'flex';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/newsletter/create', // Make sure this route exists
        method: 'POST',
        data: {
            email: email,
        },
        success: function (response) {
            $('#success').removeClass('d-none')
            $('#messageres').text(response.message).css('color', 'green');
            $('#newsletterForm')[0].reset();
            const modal = document.getElementById('newsletterModal');
            modal.style.display = 'none';
            document.getElementById('lazzyLoader').style.display = 'none';
        },
        error: function (xhr) {
            let message = xhr.responseJSON?.message || 'Something went wrong!';
            const modal = document.getElementById('newsletterModal');
            $('#success').removeClass('d-none');
            $('#success').removeClass('custom-alert');
            $('#success').addClass('custom-alert-danger');
            $('#messageres').text(message).css('color', 'red');
            modal.style.display = 'none';
            document.getElementById('lazzyLoader').style.display = 'none';
        }
    });
});
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

window.addEventListener('load', () => {
    document.getElementById('lazzyLoader').style.display = 'none';
})

