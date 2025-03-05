const PhotoSwipe = require('photoswipe');
const PhotoSwipeUI_Default = require('photoswipe/dist/photoswipe-ui-default');
const galleries = document.querySelectorAll('.jsGallery');
const photoSwipeModal = document.querySelector('.photoSwipeModal');

if (galleries) {

	galleries.forEach( (gallery) => {
		const galleryItems = gallery.querySelectorAll('.galleryItem');
		const items = [];

		if (galleryItems) {
			// Loop over gallery items and push it to the array
			galleryItems.forEach( (item) => {

				let metadata = {
					src: item.href,
					w: item.dataset.width,
					h: item.dataset.height,
					title: `<p><strong>${item.dataset.title}</strong></p>`
				}

				items.push(metadata);

				// on click of gallery item
				item.addEventListener('click', (e) => {
					// Prevent location change
					e.preventDefault();

					let posStartsZero = parseInt(item.dataset.pos, 10) - 1;

					// Add options
					const options = {
						// get index and convert to integer
						index: posStartsZero,
						bgOpacity: 0.85,
						showHideOpacity: true,
						closeOnScroll: false,
					};

					// Initialise PhotoSwipe
					const gallery = new PhotoSwipe(photoSwipeModal, PhotoSwipeUI_Default, items, options);
					gallery.init();
				})
			})
		}
	})
}
