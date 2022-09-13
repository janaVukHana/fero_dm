// working on mobile menu icon
const navMenu = document.querySelector('.navbar-menu')
const mobileMenuIcon = document.querySelector('.mobile-menu-icon');

const lineTop = document.querySelector('.line-top');
const lineMiddle = document.querySelector('.line-middle');
const lineBottom = document.querySelector('.line-bottom');
// set current year on footer copyright
const copyRightYear = document.querySelector('.copyright-year');
const date = new Date();



mobileMenuIcon.addEventListener('click', (e) => {
    lineMiddle.classList.toggle('middle-line-animation');
    lineTop.classList.toggle('top-line-animation');
    // show menu on mobile
    navMenu.classList.toggle('show-menu');

    // hide scroll bar when menu button is pressed
    if(navMenu.classList.contains('show-menu')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'visible';
    }
})

// fixing problems with mobile menu
window.addEventListener('resize', ()=> {
    if(window.innerWidth > 768) {
        navMenu.classList.remove('show-menu');
        
        lineMiddle.classList.remove('middle-line-animation');
        lineTop.classList.remove('top-line-animation');

        document.body.style.overflow = 'visible';
    }
})

// set footer year
copyRightYear.innerHTML = date.getFullYear();

