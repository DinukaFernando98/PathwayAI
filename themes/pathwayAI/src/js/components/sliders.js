const Flickity = require('flickity');
const sliders = document.querySelectorAll('.jsSlider');

if (sliders) {

	sliders.forEach( (item) => {
		let flky = new Flickity( item, {
			accessibility: true,
			prevNextButtons: true,
			pageDots: true,
			imagesLoaded: true,
		})

		window.addEventListener('load', () => {
			flky.resize();
		})
	})
}
