export function contactForm7ThankYou() {
    const form = document.querySelector('.wpcf7-form');
    if (form) {
        form.addEventListener('wpcf7mailsent', function (event) {
        const formId = event.detail.contactFormId;
        const form = document.querySelector(`.wpcf7-form-${formId}`);
        const thankYouMessage = document.querySelector('.thank-you-message');
    
        if (form && thankYouMessage) {
            form.style.display = 'none';
            thankYouMessage.style.display = 'block';
        }
        });
    }
}