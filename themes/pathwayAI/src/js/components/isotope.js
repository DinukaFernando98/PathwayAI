const Isotope = require('isotope-layout');
const blogArticles = document.querySelector('.blogArticles');
const blogNavItems = document.querySelectorAll('.blogNavItem');
const filterMessage = document.querySelector('.filterMessage');
let category = null;

if (blogArticles) {

    window.addEventListener('load', () => {
        let searchParams = new URLSearchParams(window.location.search);

        if (searchParams.has('category')) {
            category = searchParams.get('category');
        }

        if (category !== null) {
            category = '.' + category;
        }

        let iso = new Isotope(blogArticles, {
            // options
            itemSelector: '.blogItem',
            layoutMode: 'fitRows',
            filter: category
        });

        if (searchParams.has('category')) {
            blogNavItems.forEach( (item) => {
                blogNavItems.forEach( (item) => {
                    item.classList.remove('is-active');
                })

                setTimeout( () => {
                    if (item.getAttribute('data-filter') === category) {
                        item.classList.add('is-active');
                    }
                }, 150);
            });

            console.log(iso);

            if (iso.filteredItems.length === 0) {
                filterMessage.classList.remove('hidden');
            }
        }

        blogNavItems.forEach( (item) => {
            item.addEventListener('click', () => {
                let filterValue = item.getAttribute('data-filter');

                filterMessage.classList.remove('active');

                blogNavItems.forEach( (item) => {
                    item.classList.remove('is-active');
                })

                item.classList.add('is-active');

                iso.arrange({
                    filter: filterValue
                });

                iso.on('arrangeComplete', (filteredItems) => {
                    if (filteredItems.length === 0) {
                        filterMessage.classList.remove('hidden');
                    } else {
                        filterMessage.classList.add('hidden');
                    }
                });
            });
        });
    });
}
