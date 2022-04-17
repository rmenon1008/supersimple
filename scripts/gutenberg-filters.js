document.addEventListener('DOMContentLoaded', (event) => {
    [...document.getElementsByClassName("wp-block-video")].forEach(function (videoContainer) {

        if (! videoContainer.querySelector('video').hasAttribute("controls")) {

            index = videoContainer.innerHTML.indexOf("</video>") + 8
            videoContainer.innerHTML = videoContainer.innerHTML.slice(0, index) + '<progress class="progress" max="100" value="0">Progress</progress>'

            videoElem = videoContainer.querySelector('video')
            videoElem.addEventListener("timeupdate", function () {
                videoElem = videoContainer.querySelector('video')
                progBar = videoContainer.getElementsByClassName("progress")[0]
                progBar.value = Math.round((videoElem.currentTime / videoElem.duration) * 100);
                console.log(progBar.value)
            });
        }
    });
})
