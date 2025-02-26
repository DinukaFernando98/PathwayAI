const body = document.querySelector('body');

// Get the current breakpoint
function getBreakpoint() {
	return window.getComputedStyle(document.body, ':before').content.replace(/"/g, '');
}

window.addEventListener('load', () => {
	body.classList.remove('no-transition');
});

export default getBreakpoint;
