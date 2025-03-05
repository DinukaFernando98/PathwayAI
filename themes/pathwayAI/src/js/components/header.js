import getBreakpoint from './breakpoints.js'
const header = document.querySelector('#header');
const navBtn = document.querySelector('#navBtn');
const navBtnText = navBtn.querySelector('.navBtnText');
const nav = document.querySelector('#nav');
const secondaryNavTriggers = document.querySelectorAll('.secondaryNavTrigger');
const searchTrigger = document.querySelector('.searchTrigger');
const searchForm = document.querySelector('.searchForm');
// const scrollBtn = document.querySelector('.scrollBtn');

if (navBtn) {

    navBtn.addEventListener('click', () => {
		// change aria-expanded on click
		let ariaExpanded = navBtn.getAttribute('aria-expanded');

		if (ariaExpanded === "true") {
			ariaExpanded = "false"
		} else {
			ariaExpanded = "true"
		}

		navBtn.setAttribute('aria-expanded', ariaExpanded);

        navBtn.classList.toggle('is-active');
        nav.classList.toggle('is-active');
		header.classList.toggle('is-active');

		if (navBtnText.innerHTML === 'Menu') {
			navBtnText.innerHTML = 'Close';
		} else {
			navBtnText.innerHTML = 'Menu';
		}
    })
}

if (searchTrigger) {

	searchTrigger.addEventListener('click', () => {
		// change aria-expanded on click
		let ariaExpanded = navBtn.getAttribute('aria-expanded');

		if (ariaExpanded === "true") {
			ariaExpanded = "false"
		} else {
			ariaExpanded = "true"
		}

		searchTrigger.setAttribute('aria-expanded', ariaExpanded);

		searchTrigger.classList.toggle('is-active');
		searchForm.classList.toggle('is-active');
	})
}

if (secondaryNavTriggers) {

	secondaryNavTriggers.forEach( (item) => {
		item.addEventListener('click', () => {
			let breakpoint = getBreakpoint();

			if (breakpoint === 'thumb') {
				// change aria-expanded on click
				let ariaExpanded = item.getAttribute('aria-expanded');

				if (ariaExpanded === "true") {
					ariaExpanded = "false"
				} else {
					ariaExpanded = "true"
				}

				item.setAttribute('aria-expanded', ariaExpanded);

				item.classList.toggle('is-active');
				item.nextElementSibling.classList.toggle('is-active');
			}
		})
	});

	window.addEventListener('resize', () => {
		let breakpoint = getBreakpoint();

		if (breakpoint !== 'thumb') {
			setTimeout( () => {
				secondaryNavTriggers.forEach( (item) => {
					item.classList.remove('is-active');
					item.nextElementSibling.classList.remove('is-active');
				})
			}, 100)
		}
	})
}

// if (scrollBtn) {
//
// 	if (!scrollBtn.classList.contains('hidden')) {
// 		window.addEventListener('scroll', () => {
// 			scrollBtn.classList.add('hidden');
// 		})
// 	}
//
// 	scrollBtn.addEventListener('click', () => {
// 		window.scroll({
// 			top: window.scrollY + screen.height,
// 			behavior: "smooth",
// 		});
//
// 		scrollBtn.classList.add('hidden');
// 	})
// }
