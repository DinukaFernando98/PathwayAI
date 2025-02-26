const dropdowns = document.querySelectorAll('.jsDropdown');

if (dropdowns) {

	dropdowns.forEach( (item) => {
		const trigger = item.querySelector('.dropdownTrigger');

		trigger.addEventListener('click', () => {
			item.classList.toggle('is-active');
			trigger.classList.toggle('is-active');
		})
	})
}
