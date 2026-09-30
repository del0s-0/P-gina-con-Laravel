const navbar = document.getElementById('navbar');
const toggle = document.querySelector('.navbar-toggle');

if (navbar && toggle) {
    toggle.addEventListener('click', () => {
        const open = navbar.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    });
}
