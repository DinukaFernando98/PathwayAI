const tabs = document.querySelectorAll('.jsTabs');

if (tabs) {
	tabs.forEach( (item ) => {
		const tabInfos = item.querySelectorAll('.tabsContent');
		const tabLinks = item.querySelectorAll('.tabsTrigger');

		tabLinks.forEach( (linkItem) => {
			linkItem.addEventListener('click', () => {
				tabInfos.forEach( (infoItemReset) => {
					infoItemReset.classList.add('hidden');
					infoItemReset.setAttribute('aria-hidden', 'true');
				});

				tabLinks.forEach( (linkItemReset) => {
					linkItemReset.classList.remove('is-active');
					linkItemReset.setAttribute('aria-selected', 'false');
				});

				linkItem.classList.toggle('is-active');
				linkItem.setAttribute('aria-selected', 'true');

				document.getElementById(linkItem.dataset.tab).classList.remove('hidden');
				document.getElementById(linkItem.dataset.tab).setAttribute('aria-hidden', 'false');
				document.getElementById(linkItem.dataset.tab).querySelector('div').setAttribute('tabindex', '-1');
				document.getElementById(linkItem.dataset.tab).querySelector('div').focus();
			});
		});
	});
}
