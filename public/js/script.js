const toggler = document.querySelector('.navbar-toggler')
const menu = document.querySelector('.menu-block')
const menu_wrapper = document.querySelector('.menu-wrapper')
const menu_close = document.getElementById('menu-close')
const body = document.querySelector('body')
if(toggler) {
    toggler.addEventListener('click',(e) => {
        if(menu.classList.contains('d-none')){
            menu_wrapper.classList.add('d-block')
            menu_wrapper.classList.remove('d-none')
            menu.classList.add('d-block')
            menu.classList.remove('d-none')
            body.classList.add('overflow-hidden')
        } else {
            menu_wrapper.classList.remove('d-block')
            menu_wrapper.classList.add('d-none')
            menu.classList.remove('d-block')
            menu.classList.add('d-none')
            body.classList.remove('overflow-hidden')
        }
    })
}
if(menu_wrapper) {
    menu_wrapper.addEventListener('click',(e)=>{
        e.stopPropagation()
        menu_wrapper.classList.remove('d-block')
        menu_wrapper.classList.add('d-none')
        menu.classList.remove('d-block')
        menu.classList.add('d-none')
        body.classList.remove('overflow-hidden')
    })
}
if(menu_close) {
    menu_close.addEventListener('click', () => {
        menu_wrapper.classList.remove('d-block')
        menu_wrapper.classList.add('d-none')
        menu.classList.remove('d-block')
        menu.classList.add('d-none')
        body.classList.remove('overflow-hidden')
    })
}

const btn__detail = document.getElementById('btn__detail')
const detail__info = document.getElementById('detail__info')

if(btn__detail) {
    btn__detail.addEventListener('click',() => {
        if(detail__info.classList.contains('d-none')) {
            detail__info.classList.add('d-block')
            detail__info.classList.remove('d-none')
        } else {
            detail__info.classList.add('d-none')
            detail__info.classList.remove('d-block')
        }
    })
}

const eye = document.getElementById('eye')
const eye2 = document.getElementById('eye2')
const pass = document.getElementById('password')
const pass2 = document.getElementById('password2')
if(eye) {
    eye.addEventListener('click', () => {
        if (pass.getAttribute("type") == 'password') {
            pass.setAttribute("type", "text");
        } else {
            pass.setAttribute("type", "password");
        }
    })
}
if(eye2){
    eye2.addEventListener('click', () =>{
        if(pass2.getAttribute("type") == 'password') {
            pass2.setAttribute("type", "text");
        } else {
            pass2.setAttribute("type", "password");
        }
    })
}

const questions = document.querySelectorAll('.card__question')
const answers = document.querySelectorAll('.answer')
if(questions) {
    questions.forEach(q => {
        q.addEventListener('mouseover',()=>{
            answers.forEach(a => {
                if(q.getAttribute('data-number') == a.getAttribute('data-number')) {
                    a.style.opacity = '1'
                    setTimeout(() => a.style.opacity = '0', 1500)
                }
            })
        })
    })
}
(function() {
    'use strict';
function trackScroll() {
        let scrolled = window.pageYOffset;
        let coords = 300;

        if (scrolled > coords) {
            goTopBtn.classList.add('back_to_top-show');
        }
        if (scrolled < coords) {
            goTopBtn.classList.remove('back_to_top-show');
        }
    }

    function backToTop() {
        if (window.pageYOffset > 0) {
            console.log('window.pageYOffset',window.scroll)
            window.scrollBy(0, -40);
            setTimeout(backToTop, 0);
        }
    }

    let goTopBtn = document.querySelector('.back_to_top');

    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
})();