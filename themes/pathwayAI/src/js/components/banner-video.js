const bannerVideo = document.querySelector('.bannerVideo');
const bannerTriggers = document.querySelectorAll('.bannerTrigger');
import getBreakpoint from './breakpoints.js'

if (bannerVideo) {

	window.addEventListener('load', () => {
		const breakpoint = getBreakpoint();

		if (breakpoint !== 'thumb' && breakpoint !== 'stamp') {
			const sources = Array.from(bannerVideo.getElementsByTagName('source'));

			sources.forEach( (item) => {
				item.src = item.dataset.src;
			})

			bannerVideo.load();

			bannerVideo.classList.add('is-loaded');
		}
	})
}

if (bannerTriggers) {

	bannerTriggers.forEach( (item) => {
		const bannerVideo = item.nextElementSibling;
		const text = item.querySelector('.sr-only');

		item.addEventListener('click', () => {
			item.classList.toggle('is-paused');

			if (bannerVideo.paused) {
				bannerVideo.play();
			} else {
				bannerVideo.pause();
			}

			if (text.innerHTML === 'Pause') {
				text.innerHTML = 'Play';
			} else {
				text.innerHTML = 'Pause';
			}
		})
	})
}
