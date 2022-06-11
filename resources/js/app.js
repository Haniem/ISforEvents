// const menuBtn = document.querySelector('.header__menuBtn')
// const headerNav = document.querySelector('.header__nav')
// const headerAuth = document.querySelector('.header__auth')
// const headerSecLogo = document.querySelector('.header__secLogo')

// menuBtn.addEventListener('click', function( ) {
//     headerNav.classList.toggle('active')
//     headerAuth.classList.toggle('active')
//     headerSecLogo.classList.toggle('active')
// })

const menu__icon = document.querySelector('.menu__icon')
const adminHeader__nav = document.querySelector('.adminHeader__nav')
const adminHeader__auth = document.querySelector('.adminHeader__auth')

menu__icon.addEventListener('click', function( ) {
    adminHeader__nav.classList.toggle('active')
    menu__icon.classList.toggle('menu_active')
    adminHeader__auth.classList.toggle('auth_hidden')
})