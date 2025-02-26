const navBtn = document.querySelector('#navBtn');
const nav = document.querySelector('#nav');
const headerSidebar = document.querySelector('#headerSidebar');

if (navBtn) {

    navBtn.addEventListener('click', () => {
        navBtn.classList.toggle('is-active');
        nav.classList.toggle('is-active');
		headerSidebar.classList.toggle('is-active');
    })
}
