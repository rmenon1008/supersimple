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

<style>
</style>

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
</script>