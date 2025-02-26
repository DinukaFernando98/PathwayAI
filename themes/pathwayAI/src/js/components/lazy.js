if ('loading' in HTMLIFrameElement.prototype) {
	const iframes = document.querySelectorAll('iframe[loading="lazy"]');
	iframes.forEach(iframe => {
		iframe.src = iframe.dataset.src;
	});
} else {
	// Dynamically import the LazySizes library
	const script = document.createElement('script');
	script.src =
		'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
	document.body.appendChild(script);
}
