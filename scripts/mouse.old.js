
jQuery( document ).ready(function() {

let mouseCursor = document.querySelector(".cursor")
let mouseCursorDot = document.querySelector(".dot")
let x = 0
let y = 0

let userScrolled = false

window.addEventListener("mousemove", cursor)

function cursor(e) {
    x = e.clientX
    y = e.clientY
    mouseCursorDot.style.display = "block"
    mouseCursorDot.style.top = e.clientY + "px"
    mouseCursorDot.style.left = e.clientX + "px"

    mouseCursor.style.display = "block"
    if (!mouseCursor.classList.contains("hover")) {
        mouseCursor.style.top = e.clientY + "px"
        mouseCursor.style.left = e.clientX + "px"
    }
}

Array.from(document.querySelectorAll('a')).forEach(item => {

    item.addEventListener('mouseenter', function (event) {
        userScrolled = false;
        mouseCursor.classList.add("hover");
        mouseCursor.style.width = item.offsetWidth + 12 + "px"
        mouseCursor.style.height = item.offsetHeight + 12 + "px"

        itemRect = item.getBoundingClientRect()
        mouseCursor.animate([
            {
                marginTop: 0,
                marginLeft: 0
            },
            {
                marginTop: (itemRect.top + (item.offsetHeight / 2.0) - y) + "px",
                marignLeft: (itemRect.left + (item.offsetWidth / 2.0) - x) + "px"
            }
        ], {
            // timing options
            easing: 'ease',
            duration: 350,
            iterations: 1
        });

        mouseCursor.style.marginTop = (itemRect.top + (item.offsetHeight / 2.0) - y) + "px"
        mouseCursor.style.marginLeft = (itemRect.left + (item.offsetWidth / 2.0) - x) + "px"
    }, false);

    item.addEventListener('mouseleave', function (event) {
        if (!userScrolled) {
            itemRect = item.getBoundingClientRect()
            mouseCursor.animate([
                {
                    marginTop: (itemRect.top + (item.offsetHeight / 2.0) - y) + "px",
                    marignLeft: (itemRect.left + (item.offsetWidth / 2.0) - x) + "px"
                },
                {
                    marginTop: '0',
                    marginLeft: '0'
                }
            ], {
                // timing options
                easing: 'ease',
                duration: 350,
                iterations: 1
            });

            mouseCursor.style.marginTop = 0
            mouseCursor.style.marginLeft = 0

            mouseCursor.style.width = ""
            mouseCursor.style.height = ""
        }
        userScrolled = false;
        mouseCursor.classList.remove("hover");
    }, false);

    item.addEventListener('mousedown', function (event) {
        mouseCursor.style.width = (item.offsetWidth - 3) + "px"
        mouseCursor.style.height = (item.offsetHeight - 3) + "px"
    }, false);

})

window.onscroll = function (e) {
    userScrolled = true;
    mouseCursor.classList.remove("hover");
    mouseCursor.style.marginTop = 0
    mouseCursor.style.marginLeft = 0
    mouseCursor.style.width = ""
    mouseCursor.style.height = ""
    mouseCursor.style.top = y + "px"
    mouseCursor.style.left = x + "px"
}

if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    mouseCursor.style.display = "none"
    document.body.style.cursor = "auto"
}

});