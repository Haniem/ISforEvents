require('./bootstrap');

let menuBtn = document.querySelector('.header__menuBtn')

let headerNav = document.querySelector('.header__nav')
let headerAuth = document.querySelector('.header__auth')
let headerSecLogo = document.querySelector('.header__secLogo')


menuBtn.addEventListener('click', function( ) {
    headerNav.classList.toggle('active')
    headerAuth.classList.toggle('active')
    headerSecLogo.classList.toggle('active')
})
