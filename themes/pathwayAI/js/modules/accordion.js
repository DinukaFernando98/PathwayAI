export default function accordion() {
    // Initially open the first item if it's part of an active accordion
    $('.accordion.accordion-active > li:first-child').addClass('active').find('.accordion-item').slideDown();

    // Click event on accordion headers
    $('.accordion li > a').click(function(e) {
        e.preventDefault(); // Prevent the default anchor behavior

        var dropDown = $(this).closest('li').find('.accordion-item');

        // Slide up all other accordion items
        $(this).closest('.accordion').find('.accordion-item').not(dropDown).slideUp();

        // Remove 'active' class from all other items except the current one
        $(this).closest('.accordion').find('li').not($(this).parent()).removeClass('active');

        // Toggle 'active' class on the current item's parent <li>
        $(this).parent().toggleClass('active');

        // Slide toggle the current accordion item
        dropDown.stop(false, true).slideToggle();

        // Refresh ScrollTrigger after a delay
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 600);
    });
}