const accordionItems = document.querySelectorAll('.accordionItem');

if (accordionItems) {
    accordionItems.forEach((item) => {
        let accordionTitle = item.querySelector('.accordionTitle');
        let accordionContent = item.querySelector('.accordionContent');

        accordionTitle.addEventListener('click', () => {
            let ariaExpanded = item.classList.contains('is-active') ? 'false' : 'true';
            item.classList.toggle('is-active');
            accordionTitle.classList.toggle('is-active');
            accordionTitle.setAttribute('aria-expanded', ariaExpanded)
            accordionContent.classList.toggle('is-active');
        })
    })
}