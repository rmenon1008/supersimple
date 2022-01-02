<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();
?>

<div id="path">
    <h1 id="pathString">/</h1>
    <div id="haze"></div>
</div>
<h1 id="title" class="glide-in">
    <span class="text-wrapper">
        <span class="letters"><?php single_cat_title() ?></span>
    </span>
</h1>
<script>
    var path = (window.location.pathname).split("-").join(" ").split("/");
    document.getElementById("pathString").innerHTML = (path.slice(0, path.length - 2).join("/") + "/");

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
        if (moved > maxSwipe - 10 || moved > window.innerWidth * 0.7) {
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
<div class='post_list archive'>
    <div class='scroll-window'>
        <?php
        if (have_posts()) :
            $animate_order = -1;
            while (have_posts()) : the_post();
                $animate_order++;
                $myExcerpt = get_the_excerpt();
                $tags = array("<p>", "</p>");
                $myExcerpt = str_replace($tags, "", $myExcerpt);
                $category = get_the_category()[0]->name;
                $title = '<gray>' . $category . "/" . '</gray>' . get_the_title();

        ?>

                <a class="nostyle block" href="<?php the_permalink() ?>" role="button">
                    <div class="image-gallery-small" style="--animation-order:<?php echo $animate_order ?>;">
                        <div class="image-contain">
                            <?php the_post_thumbnail('large', array('class' => 'batch-load')); ?>
                        </div>
                        <div class="gallery-text">
                            <h3><?php echo $title ?></h3>
                            <span class='status'><?php the_date() ?></span>
                            <div class="image-gallery-small-haze"></div>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </a>

        <?php
            endwhile;
        endif;
        ?>

    </div>
</div>

<?php

the_posts_pagination(array(
    'mid_size' => 5,
    'prev_text' => __('<b>❬</b>', 'textdomain'),
    'next_text' => __('<b>❭</b>', 'textdomain'),
    'before_page_number' => '',
    'after_page_number'  => '',
));

get_footer();
