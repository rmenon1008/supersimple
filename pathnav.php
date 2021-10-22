<?php

/**
 *
 * @package Rohan_Menon
 */

?>

<div id="path">
    <h1 id="pathString">/</h1>
    <div id="haze"></div>
</div>
<?php
$title_string = get_the_title();

?>

<h1 id="title" class="glide-in">
    <span class="text-wrapper">
        <span class="letters"><?php echo $title_string; ?></span>
    </span>
</h1>


<script>
    var path = (window.location.pathname).split("/");
    var elem = document.getElementById("pathString")
    var haze = document.getElementById("haze")
    var sliced = path.slice(0, path.length - 2).join("/")
    var string = sliced.split("-").join(" ")
    elem.innerHTML = string + "/"
    elem.addEventListener("mouseover", function(event) {
        // haze.style.background = "linear-gradient(90deg, white 10%, rgba(255, 255, 255, 0.4) 100%)"
        haze.style.filter = "opacity(0.5)"
    });
    elem.addEventListener("mouseleave", function(event) {
        // haze.style.background = ""
        haze.style.filter = ""
    });
    elem.addEventListener("click", function(event) {
        window.location.href = sliced + "/"
    });

    var ogText = document.querySelector('.glide-in .letters').textContent;
    document.querySelector('.glide-in .text-wrapper').setAttribute("aria-hidden", "true")
    document.querySelector('.glide-in').setAttribute("aria-label", ogText)
    var textWrapper = document.querySelector('.glide-in .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S+/g, "<span class='word'>$&</span>");
    var words = document.querySelectorAll('.glide-in .word')
    for (i = 0; i < words.length; ++i) {
        words[i].innerHTML = words[i].textContent.replace(/\S/g, "<span class='letter'>$&</span>");
    }
    anime.timeline()
        .add({
            targets: '.glide-in .letter',
            translateY: ["1.1em", 0],
            translateX: ["-0.7em", 0],
            translateZ: 0,
            rotateZ: [80, 0],
            duration: 750,
            easing: "easeOutExpo",
            delay: (el, i) => 18 * i
        }).add({
            targets: '.ml7',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });

    var title = document.getElementById("title");
    var pathElem = document.getElementById("path");
    var haze = document.getElementById("haze");
    var hazeWidth = 0;
    var pos = 0;
    var prevLink = pathElem.textContent.split("/").at(-2);

    var fakeText = document.createElement("h1");
    fakeText.className = 'invisible';
    var fakeString = document.createTextNode(prevLink);
    fakeText.appendChild(fakeString);

    document.body.appendChild(fakeText);

    var maxSwipe = document.querySelector('.invisible').clientWidth + 30;
    var moved = 0;

    title.addEventListener("touchstart", function(e) {
        title.style.transition = ""
        pathElem.style.transition = ""
        pos = e.touches[0].clientX;
        console.log("start");
        hazeWidth = haze.clientWidth;
    })
    title.addEventListener("touchmove", function(e) {
        moved = e.touches[0].clientX - pos;
        if (moved > maxSwipe) {
            moved = maxSwipe;
        }
        if (moved < 0) {
            moved = 0;
        }
        title.style.transform = "translate(" + moved + "px)";
        pathElem.style.transform = "translate(" + moved + "px)";
        haze.style.transform = "translate(" + -moved + "px)";
    })
    title.addEventListener("touchend", function(e) {
        pos = 0;
        console.log(document.width)
        if (moved > maxSwipe - 10 || moved > window.innerWidth*0.7) {
            window.location.href = sliced + "/"
        } else {
            title.style.transition = "0.3s ease-out";
            pathElem.style.transition = "0.3s ease-out";
            title.style.transform = "translate(0)";
            pathElem.style.transform = "translate(0)";
            haze.style.transform = "translate(0)";
        }
    })
</script>