export function contactForm7() {
    var loader = $('.barba-container').find('.ajax-loader');
    if (!loader.length) {      
        $( 'div.wpcf7 > form' ).each( function() {
            var $form = $( this );
            wpcf7.init($form[0]);
        } );
    } 
}