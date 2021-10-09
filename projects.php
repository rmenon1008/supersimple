<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();

/**
 *
 * @package Rohan_Menon
 */


get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>">
            <div id="path">
                <h1 id="pathString">/</h1>
                <div id="haze"></div>
            </div>
            <h1 id="title"><?php the_title(); ?></h1>
            <script>
                var path = ("/rohan-menon" + window.location.pathname).split("-").join(" ").split("/");
                var elem = document.getElementById("pathString")
                var sliced = path.slice(0, path.length - 2).join("/") + "/"
                elem.innerHTML = sliced
                elem.addEventListener("click", function(event) {
                    window.location.href = sliced.replace(' ', '-');
                });
            </script>
            <div class="project-page">
                <div class="detail"><?php the_content(); ?></div>
                <div class="logs">
                    <h3>Project Logs</h3>
                    <?php
                    echo do_shortcode("[post_list category='$title']");
                    ?>
                </div>
            </div>
        </div>

<?php endwhile;
endif;

get_footer();


get_footer();
