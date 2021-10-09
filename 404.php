<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();
?>
<div>
    <div id="path">
        <h1 id="pathString">/</h1>
        <div id="haze"></div>
    </div>
    <h1 id="title" class="glide-in">
        <span class="text-wrapper">
            <span class="letters">404 — page not found</span>
        </span>
    </h1>
</div>

<script>
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

<?php

get_footer();
