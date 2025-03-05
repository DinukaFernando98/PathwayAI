const body = document.querySelector('body');
const backToTop = document.querySelector('.backToTop');

// Get the current breakpoint
function getBreakpoint() {
	return window.getComputedStyle(document.body, ':before').content.replace(/"/g, '');
}

window.addEventListener('load', () => {
	body.classList.remove('no-transition');
});

window.addEventListener('scroll', () => {
	if(window.pageYOffset <= 250) {
		backToTop.classList.remove('is-active');
	} else {
		backToTop.classList.add('is-active');
	}
})

export default getBreakpoint;
