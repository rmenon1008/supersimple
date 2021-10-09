<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();
?>
<div id="top">
    <header id="font-masthead" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">
        <?php get_template_part('template-parts/header/site-nav'); ?>
    </header><!-- #masthead -->

    <div id="path">
        <h1 id="pathString">/</h1>
        <div id="haze"></div>
    </div>
    <h1 id="title"></h1>
</div>
<div class="detail" style="padding-top:400px;">
    <div class="message">

    </div>
    <div class="message">
        <div class="post_grid show">
            <div class="image-grid">
                <div class="image-grid-item" style="--animation-order:0;">
                    <a class="nostyle grid-link" href="https://www.rohanmenon.com/projects/personal-site/" role="button"></a>
                    <div class="scaleable">
                        <div class="image-contain shimmer">
                            <img width="1920" height="1440" src="https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup.jpg" class="batch-load wp-post-image" alt="" srcset="https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup.jpg 1920w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-300x225.jpg 300w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-1024x768.jpg 1024w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-150x113.jpg 150w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-768x576.jpg 768w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-1800x1350.jpg 1800w, https://www.rohanmenon.com/wp-content/uploads/2021/05/Mockup-1536x1152.jpg 1536w" sizes="(max-width: 1920px) 100vw, 1920px" style="opacity: 1;">
                        </div>
                        <div class="gallery-text">
                            <h3>personal site</h3>
                            <a class="status" href="https://www.rohanmenon.com/tag/active/">active </a>
                            <p>My personal website to showcase projects and help people find me.</p>
                        </div>
                    </div>
                </div>

                <div class="image-grid-item" style="--animation-order:1;">
                    <a class="nostyle grid-link" href="https://www.rohanmenon.com/projects/ny-steam-bus/" role="button"></a>
                    <div class="scaleable">
                        <div class="image-contain shimmer">
                            <img width="1280" height="763" src="https://www.rohanmenon.com/wp-content/uploads/2021/05/2_thumbnail.png" class="batch-load wp-post-image" alt="" srcset="https://www.rohanmenon.com/wp-content/uploads/2021/05/2_thumbnail.png 1280w, https://www.rohanmenon.com/wp-content/uploads/2021/05/2_thumbnail-300x179.png 300w, https://www.rohanmenon.com/wp-content/uploads/2021/05/2_thumbnail-1024x610.png 1024w, https://www.rohanmenon.com/wp-content/uploads/2021/05/2_thumbnail-768x458.png 768w" sizes="(max-width: 1280px) 100vw, 1280px" style="opacity: 1;">
                        </div>
                        <div class="gallery-text">
                            <h3>ny steam bus</h3>
                            <a class="status" href="https://www.rohanmenon.com/tag/active/">active </a>
                            <p>A program bringing STEAM lessons to students via our retrofitted school bus.</p>
                        </div>
                    </div>
                </div>

                <div class="image-grid-item" style="--animation-order:2;">
                    <a class="nostyle grid-link" href="https://www.rohanmenon.com/research/aquametric/" role="button"></a>
                    <div class="scaleable">
                        <div class="image-contain shimmer">
                            <img width="720" height="960" src="https://www.rohanmenon.com/wp-content/uploads/2021/03/thumbnail.jpg" class="batch-load wp-post-image" alt="" srcset="https://www.rohanmenon.com/wp-content/uploads/2021/03/thumbnail.jpg 720w, https://www.rohanmenon.com/wp-content/uploads/2021/03/thumbnail-225x300.jpg 225w" sizes="(max-width: 720px) 100vw, 720px" style="opacity: 1;">
                        </div>
                        <div class="gallery-text">
                            <h3>aquametric</h3>
                            <a class="status" href="https://www.rohanmenon.com/tag/active/">active </a>
                            <p>Low cost and distributed stream and river monitoring.</p>
                        </div>
                    </div>
                </div>

                <div class="image-grid-item invisible"></div>
                <div class="image-grid-item invisible"></div>
                <div class="image-grid-item invisible"></div>
                <div class="image-grid-item invisible"></div>
            </div>
        </div>
    </div>
    <div class="message">
    </div>
    <div class="message">
    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/TextPlugin.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>

<script>
    jQuery(document).ready(function() {

        var h = window.innerHeight / 100;

        // init controller
        gsap.registerPlugin(TextPlugin);
        var controller = new ScrollMagic.Controller({
            addIndicators: true
        });

        // function typeIn(event, text, dur=(text.length * 0.08)) {

        //     tl = gsap.timeline();
        //     tl.add(
        //         gsap.to("#title", {
        //             duration: dur,
        //             text: {
        //                 value: text
        //             },
        //             ease: "none"
        //         }));

        //     setTimeout(function() {
        //         tl.timeScale(3);
        //         tl.reverse(0)
        //     }, text.length * 170)

        // }

        function type(text, reversed = false) {
            tl = gsap.timeline();
            dur = text.length * 0.012

            tl.add(gsap.fromTo("#title", {
                    text: {
                        value: ""
                    },
                }, {
                    text: {
                        value: text
                    },
                    duration: dur,
                    ease: "none"
                }

            ))

            if (reversed) {
                tl.timeScale(2.5)
                tl.reverse()
            }

            return tl
        }


        function typewriter(text, page) {
            new ScrollMagic.Scene({
                    triggerElement: page,
                    offset: 30 * h
                })
                .setTween(type(text))
                // .on("enter", type(text))
                .addTo(controller);

            new ScrollMagic.Scene({
                    triggerElement: page,
                    offset: page.offsetHeight - 20 * h
                })
                .setTween(type(text, reversed = true))
                // .on("enter", type(text, reversed = true))
                .addTo(controller);
        }

        function fadeIn(page) {

            new ScrollMagic.Scene({
                    triggerElement: page,
                    offset: 40 * h,
                    duration: 30 * h
                })
                .setClassToggle(page.children[0], "show")
                .addTo(controller);

            console.log(page.children)

        }

        // Darken animation to start
        new ScrollMagic.Scene({
                offset: 0
            })
            .setPin('#top')
            .addTo(controller);

        new ScrollMagic.Scene({
                offset: 50
            })
            .setClassToggle("body", "dark")
            .addTo(controller);


        // typewriter("i'm rohan, a student at the university of washington", 200)

        // typewriter("through projects, i explore my interests in electronics, software, design and politics", 200)

        // typewriter("sometimes a project will even win an award!", 200)

        // typewriter("most of the time though, they're just for fun", 200)


        // typewriter("")

        let messages = ["i'm rohan, a student at the university of washington", "through projects, i explore my interests in electronics, software, design and politics", "sometimes a project will even win an award!", "most of the time though, they're just for fun"]

        var pages = document.getElementsByClassName("message");
        Array.prototype.forEach.call(pages, function(page, index) {
            fadeIn(page)
            typewriter(messages[index], page)
        });

        let offset = 500;

    });
</script>
<style>
    .message>* {

        opacity: 0;
        transition: opacity 1s !important;
    }

    .message>.show {
        opacity: 1;
    }

    .message {
        min-height: 100vh;
        /* border-top: solid 2px green;
        border-bottom: solid 2px red; */
        position: relative;
    }

    .message>* {
        position: absolute;
        bottom: 0;
    }


    #top {
        position: relative;
        z-index: 999;
    }

    #masthead {
        height: 0;
        display: none;
    }

    body {
        transition: background-color 1s, color 1s;
    }

    body.dark {
        color: white;
        background-color: #222;
    }

    .cursor {}

    body.dark .cursor {
        background-color: rgba(255, 255, 255, 0.05);
    }

    #haze {
        display: none;
    }

    #path {
        transition: color 1s;
    }

    body.dark #path {
        color: #444;
    }
</style>
<?php
get_footer();
