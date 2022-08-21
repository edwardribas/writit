const menuToggler = document.querySelector('header nav button'),
menuNav = document.querySelector('header nav');

menuToggler.onclick = () => {
    menuToggler.classList.toggle('active');
    menuNav.classList.toggle('active');
}