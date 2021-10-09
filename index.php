<?php

/**
 *
 * @package Rohan_Menon
 */


get_header();

if (have_posts()) : while (have_posts()) : the_post();
        if (post_is_in_descendant_category(4)) {
            $category = get_the_category()[0]->name;
            $args = array("category_name" => "projects", "name" => $category);
            $query = get_posts($args);
            $project_link = get_permalink($query[0]);
        }
?>

        <div id="post-<?php the_ID(); ?>">
            <?php include(TEMPLATEPATH . '/pathnav.php'); ?>
            <?php if (isset($category)) : ?>
                <div class="post-tags">
                    <span class='status'><?php the_date(); ?></span>
                    <span class='status'><a href="<?php echo $project_link; ?>"><?php echo $category; ?></a></span>
                </div>
            <?php endif; ?>
            <div class="detail">
                <?php
                the_content();
                ?>
            </div>
        </div>

<?php endwhile;
endif;

get_footer();
