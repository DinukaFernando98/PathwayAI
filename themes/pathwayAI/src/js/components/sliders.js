const Flickity = require('flickity');
require('flickity-fade');
const sliders = document.querySelectorAll('.sliderContainer');

if (sliders) {

	sliders.forEach( (item) => {

		const slider = item.querySelector('.slider');
		const productSlider = item.querySelector('.productSlider');
		const sliderPrev = item.querySelector('.sliderPrev');
		const sliderNext = item.querySelector('.sliderNext');

		if (slider) {
			let flkty = new Flickity(slider, {
				accessibility: true,
				prevNextButtons: false,
				pageDots: true,
				imagesLoaded: true,
				wrapAround: true,
				groupCells: true,
				loop: true,
				cellAlign: 'left',
				fade: slider.dataset.slider,
				on: {
					ready: function() {
						setTimeout( () => {
							setSliderHeightToMax(this);
						}, 100);
					}
				}
			})

			flktyFunctions(flkty);
		}

		if (productSlider) {
			let flkty = new Flickity(productSlider, {
				accessibility: true,
				prevNextButtons: false,
				pageDots: false,
				imagesLoaded: true,
				loop: true,
				cellAlign: 'left',
				fade: true,
				setGallerySize: false,
				on: {
					ready: function() {
						setTimeout( () => {
							setSliderHeightToMax(this);
						}, 100);
					}
				}
			})

			flktyFunctions(flkty);
		}

		function setSliderHeightToMax(slider) {
			slider.cells.forEach(cell => cell.element.style.height = '');

			let heights = slider.cells.map(cell => cell.element.offsetHeight),
				max = Math.max.apply(Math, heights);

			slider.cells.forEach(cell => cell.element.style.height = max + 'px');
		}

		function flktyFunctions(flkty) {
			sliderPrev.addEventListener('click', () => {
				flkty.previous();
			});

			sliderNext.addEventListener('click', () => {
				flkty.next();
			});

			window.addEventListener('resize', () => {
				setSliderHeightToMax(flkty);
			});

			window.addEventListener('load', () => {

				setTimeout( () => {
					setSliderHeightToMax(flkty);
					flkty.resize();
				}, 150);
			});
		}
	})
}
