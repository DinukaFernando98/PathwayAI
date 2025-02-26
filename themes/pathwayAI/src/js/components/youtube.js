const youtubeVideos = document.querySelectorAll('.video-wrapper');

if (youtubeVideos) {

    window.addEventListener('load', () => {

        // loop through all the YouTube videos needed to convert into an iframe
        youtubeVideos.forEach( (item) => {
            let div = document.createElement('div');
            let url = item.dataset.id;
            let id = YouTubeGetID(url);
            div.setAttribute('data-id', id);
            div.innerHTML = getThumbnail(id);
            div.onclick = createIframe;
            item.appendChild(div);
        })

        // get the thumbnail for the video from YouTube
        function getThumbnail(id) {
            let thumbnail = '<img class="video-wrapper__thumbnail" src="https://img.youtube.com/vi/ID/maxresdefault.jpg" alt="">';
            let playButton = '<button class="play" aria-label="Play video"></button>';

            return thumbnail.replace('ID', id) + playButton;
        }

        /**
         * Get YouTube ID from various YouTube URL
         * @author: takien
         * @url: http://takien.com
         * @gist: https://gist.github.com/takien/4077195
         */
        function YouTubeGetID(url){
            let ID = '';
            url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
            if(url[2] !== undefined) {
                ID = url[2].split(/[^0-9a-z_\-]/i);
                ID = ID[0];
            }
            else {
                ID = url;
            }
            return ID;
        }

        // create the iframe
        function createIframe() {
            let iframe = document.createElement('iframe');
            let embed = 'https://www.youtube.com/embed/ID?autoplay=1';
            iframe.setAttribute('src', embed.replace('ID', this.dataset.id));
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allowfullscreen', '1');
            this.parentNode.replaceChild(iframe, this);
        }
    });
}