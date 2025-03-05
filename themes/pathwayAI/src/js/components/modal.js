const MicroModal = require('micromodal'); // commonjs module
const modals = document.querySelectorAll('.modal');
const videoModals = document.querySelectorAll('.videoModal');

if (modals) {
	MicroModal.init({
		disableScroll: true
	});
}

if (videoModals) {

	videoModals.forEach( (modal) => {
		MicroModal.init({
			onShow: modal => {
				modalOpen(modal)
			},
			onClose: modal => {
				modalClose(modal)
			}
		});

		const video = modal.querySelector('iframe');
		const videoSrc = video.src;
		video.src = videoSrc + '&enablejsapi=1';

		function modalOpen(modal) {
			video.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
		}

		function modalClose(modal) {
			video.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
		}
	})
}
