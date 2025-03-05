const hotspotMarkers = document.querySelectorAll('.hotspotsMarker');
const hotspotBlocks = document.querySelectorAll('.hotspotBlock');
const mobHotspotBlocks = document.querySelectorAll('.mobHotspotBlock');
const hotspotImageBanner = document.querySelector('.hotspotImageBanner');
const plusIcon = document.querySelectorAll('.plusIcon');

if (hotspotMarkers) {

    hotspotMarkers.forEach( (item) => {
        item.addEventListener('click', () => {
            markerAnim(item)
        })

        item.addEventListener('mouseover', () => {
            markerAnim(item)
        })

        function markerAnim (item) {
            // reset plus icon
            plusIcon.forEach( (item) => {
                item.classList.remove('is-active');
            })

            // reset hotspot blocks
            hotspotBlocks.forEach( (item) => {
                item.classList.remove('is-active');
            })

            // reset mob hotspot blocks
            mobHotspotBlocks.forEach( (item) => {
                item.classList.remove('is-active');
            })

            //reset hotspot markers
            hotspotMarkers.forEach( (item) => {
                item.classList.remove('is-active');
                item.parentElement.classList.remove('z-2');
                // reset aria labels
                item.setAttribute('aria-expanded', 'false');
            })

            // get hotspots
            let hotspotData = item.dataset.hotspot;
            hotspotData = hotspotData.split(';');

            // get hotspots mob
            let mobHotspotData = item.dataset.hotspotMob;
            mobHotspotData = mobHotspotData.split(';');

            // get plus icon data
            let plusIconData = item.dataset.plusIcon;
            plusIconData = plusIconData.split(';');

            // add active class to chosen marker
            item.classList.toggle('is-active');
            item.parentElement.classList.toggle('z-2');

            // add active class to hotspot blocks
            hotspotData.forEach( (item) => {
                document.getElementById(item).classList.toggle('is-active');
            });

            // add active class to mobile blocks
            mobHotspotData.forEach( (item) => {
                document.getElementById(item).classList.toggle('is-active');
            });

            // add active class to mobile blocks
            plusIconData.forEach( (item) => {
                document.getElementById(item).classList.toggle('is-active');
            });

            // accessibility
            item.setAttribute('aria-expanded', 'true');
        }
    })

    if(hotspotImageBanner) {
        // Clear hotposts when background image clicked
        hotspotImageBanner.addEventListener('click', () => {
            // reset office blocks
            hotspotBlocks.forEach( (item) => {
                item.classList.remove('is-active');
            })

            // reset office blocks
            mobHotspotBlocks.forEach( (item) => {
                item.classList.remove('is-active');
            })

            //reset map markers
            hotspotMarkers.forEach( (item) => {
                item.classList.remove('is-active');
                item.parentElement.classList.toggle('z-2');
                // reset aria labels
                item.setAttribute('aria-expanded', 'false');
            })

            // reset plus icon
            plusIcon.forEach( (item) => {
                item.classList.remove('is-active');
            })
        })
    }
}