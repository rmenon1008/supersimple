<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();
?>


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page.css">

<div id="top">
    <div id="path">
        <h1 id="pathString">/</h1>
        <div id="haze"></div>
    </div>
    <?php $title_string = "rohan menon" ?>

    <h1 id="title" class="glide-in">
        <span class="text-wrapper">
            <span class="letters"><?php echo $title_string; ?></span>
        </span>
    </h1>
</div>

<script>
    var path = (window.location.pathname).split("/");
    var elem = document.getElementById("pathString")
    var haze = document.getElementById("haze")
    var sliced = path.slice(0, path.length - 2).join("/")
    var string = sliced.split("-").join(" ")
    var skipAnimation = false;
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

    // if (window.location.search.includes("?")) {
    //     skipAnimation = true;
    // }

    if (document.referrer.split('?')[0] == window.location.href.split('?')[0]) {
        skipAnimation = true;
    }

    var title = document.getElementById("title")

    function animateLetters() {
        var ogText = document.querySelector('.glide-in .letters').textContent;
        document.querySelector('.glide-in .text-wrapper').setAttribute("aria-hidden", "true")
        document.querySelector('.glide-in').setAttribute("aria-label", ogText)
        var textWrapper = document.querySelector('.glide-in .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S+/g, "<span class='word'>$&</span>");
        var words = document.querySelectorAll('.glide-in .word')
        for (i = 0; i < words.length; ++i) {
            words[i].innerHTML = words[i].textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        }
        if (!skipAnimation) {
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
        }

    }
    animateLetters();

    var pathElem = document.getElementById("path");
    var haze = document.getElementById("haze");
    var hazeWidth = 0;
    var pos = 0;
    var prevLink = pathElem.textContent.split("/").at(-2);
</script>

<div class="detail">
    <div class="message show" text="rohan menon">
        <h5 class="wide" id="description">I’m a freshman at The University of Washington with interests in robotics, electronics, design, politics and more. This website documents some of my past and current projects.<br>&nbsp;&nbsp;</h5>
        <h3 class="wide" style="margin-bottom:-8px; margin-top:40px"><span>Featured</span></h3>
        <?php echo do_shortcode("[post_grid specific_posts='aquametric, flame-throwing-pumpkin, foresight']") ?>
    </div>
    <div class="message" text="let me introduce myself">
    <h5 class="wide" id="description">I was raised in Upstate NY, where I went to high school. Now I attend the University of Washington in Seattle, studying electrical engineering.
</h5>

    </div>
    <div class="message" text="research">
    </div>
    <div class="message" text="volunteer work">
    </div>
    <div class="message" text="awards">
    </div>
</div>

<?php
get_footer();
