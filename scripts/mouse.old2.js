document.addEventListener("DOMContentLoaded", function (event) {

    function blobNums() {}

    imageGridItems = document.querySelectorAll(".image-grid-item")
    Array.from(imageGridItems).forEach((image) => {
        var hovered = false;
        var a = 50;
        var b = 50;
        var c = 50;
        var d = 50;

        var x = [50, 50, 50, 50]

        function setRandomBlob() {
            var min = 25;
            var max = 75;

            for (let i = 0; i < x.length; i++) {
                x[i] = Math.random() * (max - min) + min
            }

            console.log(x)

            radiusString = x[0] + "% " + (
                100 - x[0]
            ) + "% " + x[1] + "% " + (
                100 - x[1]
            ) + "% /";
            radiusString += x[2] + "% " + (
                100 - x[3]
            ) + "% " + x[3] + "% " + (
                100 - x[2]
            ) + "%";
            image.querySelector(".image-contain").style.borderRadius = radiusString
        }

        image.addEventListener("mouseenter", function (event) {
            hovered = true;
            setTimeout(function () { image.querySelector(".image-contain").style.transition = "1s cubic-bezier(0.37, 0, 0.63, 1)"}, 200);
            setRandomBlob();
            setTimeout(function animate() {
                if (hovered) {
                    setRandomBlob();
                    setTimeout(animate, 1000)
                }
            }, 200)

        }, false);

        image.addEventListener("mouseleave", function (event) {
            hovered = false;
            image.querySelector(".image-contain").style.transition = ""
            setTimeout(function () {
                image.querySelector(".image-contain").style.transition = ""
            }, 200);
            image.querySelector(".image-contain").style.borderRadius = "0"
        }, false);
    })

    var mouseX = 0
    var mouseY = 0

    // document.addEventListener('mousemove', (event) => {
    //     mouseX = event.clientX
    //     mouseY = event.clientY
    // });

    // images = document.querySelectorAll("img")
    // Array.from(images).forEach((image) => {
    //     image.addEventListener("mouseenter", function (event) {
    //         console.log(event)
    //         clipString = "circle(100px at " + mouseX + "px " + mouseY + "px)"
    //         image.style.clipPath = clipString
    //     }, false);
    // })
    //     cursor = document.querySelector(".cursor"); // Get the cursor element
    //     cursor.style.display = "inline-block"; // Make it visible
    //     cursor.style.width = "25px"; // Set it's starting dimentions
    //     cursor.style.height = "25px";

    //     hovered = false; // Create a boolean for whether it's hovering over something clickable
    //     itemX = 0; // Two values for the position of the clickable element
    //     itemY = 0;

    //     x = 0;
    //     y = 0;

    //     window.addEventListener("mousemove", update);
    //     function update(e) {
    //         x = e.clientX; // Each time the mouse moves, get its new position
    //         y = e.clientY;

    //         if (!hovered) { // If it's not hovering over something, just make it follow the real cursor
    //             cursor.style.top = y + "px";
    //             cursor.style.left = x + "px";
    //         } else { // If it is hovering, snap it to the position of the hovered element
    //             cursor.style.top = itemY + "px";
    //             cursor.style.left = itemX + "px";
    //         }
    //     }

    //     Array.from(document.querySelectorAll("a, .wp-social-link span")).forEach((item) => { // Do this for every clickable element (just <a> tags on my site)
    //         item.addEventListener("mouseenter", function (event) { // Create a listener for when the mouse starts hovering
    //             itemRect = item.getBoundingClientRect(); // Get the bounding box of the element and find its center
    //             itemX = itemRect.left + item.offsetWidth / 2.0;
    //             itemY = itemRect.top + item.offsetHeight / 2.0;
    //             hovered = true; // Set the hovered flag
    //             cursor.style.width = item.offsetWidth + 12 + "px"; // Make the cursor the size of the element, plus 12px of padding
    //             cursor.style.height = item.offsetHeight + 12 + "px";
    //             cursor.style.borderRadius = "8px";
    //         }, false);

    //         item.addEventListener("mouseleave", function (event) {
    //             hovered = false; // When the mouse leaves, set the flag back and reset the cursor size
    //             cursor.style.width = "25px";
    //             cursor.style.height = "25px";
    //             cursor.style.borderRadius = "";
    //         }, false);
    //     });

    //     Array.from(document.querySelectorAll("figure")).forEach((item) => { // Do this for every clickable element (just <a> tags on my site)
    //         item.addEventListener("mouseenter", function (event) { // Create a listener for when the mouse starts hovering
    //             cursor.style.width = "70px"; // Make the cursor the size of the element, plus 12px of padding
    //             cursor.style.height = "70px";
    //         }, false);

    //         item.addEventListener("mouseleave", function (event) {
    //             cursor.style.width = "25px";
    //             cursor.style.height = "25px";
    //         }, false);
    //     });

    //     jQuery("*").scroll(function (e) {
    //         hovered = false; // If the user scrolls, reset everything as well so the cursor doesn't stay big
    //         cursor.style.width = "25px";
    //         cursor.style.height = "25px";
    //         cursor.style.top = y + "px";
    //         cursor.style.left = x + "px";
    //         cursor.style.borderRadius = "";
    //     });

    //     window.addEventListener('scroll', function () {
    //         hovered = false; // If the user scrolls, reset everything as well so the cursor doesn't stay big
    //         cursor.style.width = "25px";
    //         cursor.style.height = "25px";
    //         cursor.style.top = y + "px";
    //         cursor.style.left = x + "px";
    //         cursor.style.borderRadius = "";
    //     }, true);

    //     document.addEventListener("mousedown", function (event) { // When the mouse is pressed, make the cursor 8px smaller
    //         cursor.style.width = parseInt(cursor.style.width, 10) - 8 + "px";
    //         cursor.style.height = parseInt(cursor.style.height, 10) - 8 + "px";
    //     }, true);

    //     document.addEventListener("mouseup", function (event) { // Make it bigger again when the mouse is released
    //         cursor.style.width = parseInt(cursor.style.width, 10) + 8 + "px";
    //         cursor.style.height = parseInt(cursor.style.height, 10) + 8 + "px";
    //     }, false);
});
