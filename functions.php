<?php

// Registers two menus for the site
register_nav_menus(
    array(
        'primary' => esc_html__('Primary menu', 'rohanmenon'),
        'footer'  => __('Secondary menu', 'rohanmenon'),
    )
);

// Adds support for post thumbnails
add_theme_support('post-thumbnails');

// Allows pages to have experpts
add_post_type_support('page', 'excerpt');

// Adds custom shortcodes, post_grid and post_list
include('shortcodes.php');

// Enqueue jQuery to the site in compatability mode ("jQuery" instead of "$")
// wp_enqueue_script("jquery");

// VERY JANK
// Fixes 404 error when using pagination
// Finds queries with 'page' in them and does some magic with them
// https://wordpress.org/support/topic/wordpress-pagination-functions-are-not-working-lead-to-404-on-links/
function remove_page_from_query_string($query_string)
{
    $logbook = false;
    foreach ($query_string as $query) {
        if (strpos($query, 'page') !== false) {
            $logbook = true;
        }
    }
    if ($logbook) {
        if ($query_string['name'] == 'page' && isset($query_string['page'])) {
            unset($query_string['name']);
            $query_string['paged'] = $query_string['page'];
        }
        return $query_string;
    } else {
        return $query_string;
    }
}
add_filter('request', 'remove_page_from_query_string');


if (!function_exists('post_is_in_descendant_category')) {
    function post_is_in_descendant_category($cats, $_post = null)
    {
        foreach ((array) $cats as $cat) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children((int) $cat, 'category');
            if ($descendants && in_category($descendants, $_post))
                return true;
        }
        return false;
    }
}

// Custom JS mouse cursor
function enqueue_scripts()
{
    // wp_enqueue_script('mouse', get_template_directory_uri() . '/scripts/mouse.js', array(), true);
    if (is_page('rohan-menon')) {
        wp_enqueue_script('rohan-menon', get_template_directory_uri() . '/scripts/front-page.js', array(), true);
    }
    wp_enqueue_script('anime', get_template_directory_uri() . '/scripts/anime.js', array(), true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


// Removes text within heading tags from post excerpts
// It avoids changing the excerpt on posts with custom excerpts
function bac_wp_strip_header_tags($text)
{
    $raw_excerpt = $text;
    if (!has_excerpt()) {
        // if ('' == $text) {
        //Retrieve the post content.
        $text = get_the_content('');
        //remove shortcode tags from the given content.
        $text = strip_shortcodes($text);
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);

        //Regular expression that strips the header tags and their content.
        $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
        $text = preg_replace($regex, '', $text);

        /***Change the excerpt word count.***/
        $excerpt_word_count = 55; //This is WP default.
        $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

        /*** Change the excerpt ending.***/
        $excerpt_end = '[...]'; //This is the WP default.
        $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

        $excerpt = wp_trim_words($text, $excerpt_length, $excerpt_more);
        // }
        return apply_filters('wp_trim_excerpt', $excerpt, $raw_excerpt);
    } else {
        return $raw_excerpt;
    }
}
add_filter('get_the_excerpt', 'bac_wp_strip_header_tags', 5);

// Disable lazy loading site wide
add_filter('wp_lazy_loading_enabled', '__return_false');

// Removes jQuery for non-admins viewing the site
// if (!is_admin()) {
//     add_filter('wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX);
//     function change_default_jquery() {
//         wp_dequeue_script('jquery');
//         wp_deregister_script('jquery');
//     }
// }

// Adds built-in WordPress support for page titles
function theme_slug_setup()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_slug_setup');

// Modifies the default wordpress page titles 
function filter_document_title_parts($title_parts)
{
    include 'title_case.php';
	
    $title_parts['title'] = titleCase($title_parts['title']);

    // Replace the home page URL with just the blog name
    $title_parts['tagline'] = "";
//     if ($title_parts['title'] == "Rohan Menon") {
//         $title_parts = 'Rohan Menon';
//     }
    return $title_parts;
}
add_filter('document_title_parts', 'filter_document_title_parts');

// Disables wordpress emoji optimization 😔
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');



function gutenbergBlockModifications()
{
    wp_enqueue_script('gutenberg-filters', get_template_directory_uri() . '/scripts/gutenberg-filters.js');
}
add_action('wp_enqueue_scripts', 'gutenbergBlockModifications');

// Auto-generates meta description for each page
function create_meta_desc()
{
    global $post;
    if (is_category()) {
        $desc = wp_strip_all_tags(category_description());
        echo "<meta name='description' content=\"$desc\" />";
    }
    if (!is_singular()) {
        return;
    } elseif (!empty($post->post_excerpt)) {
        echo "<meta name='description' content=\"$post->post_excerpt\" />";
    } else {
        $meta = apply_filters('the_content', $post->post_content);
        $meta = wp_strip_all_tags($meta);
        $meta = strip_shortcodes($meta);
        $meta = str_replace(array("\n", "\r", "\t"), ' ', $meta);
        $meta = substr($meta, 0, 155);
        echo "<meta name='description' content='$meta' />";
    }
}
add_action('wp_head', 'create_meta_desc');

function ow_create_sitemap()
{
    $postsForSitemap = get_posts(array(
        'numberposts' => -1,
        'orderby'     => 'modified',
        // 'custom_post' should be replaced with your own Custom Post Type (one or many)
        'post_type'   => array('post', 'page', 'custom_post'),
        'order'       => 'DESC'
    ));

    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

    foreach ($postsForSitemap as $post) {
        setup_postdata($post);

        $postdate = explode(" ", $post->post_modified);

        $sitemap .= '<url>' .
            '<loc>' . get_permalink($post->ID) . '</loc>' .
            '<lastmod>' . $postdate[0] . '</lastmod>' .
            '<changefreq>monthly</changefreq>' .
            '</url>';
    }

    $sitemap .= '</urlset>';

    $fp = fopen(ABSPATH . 'sitemap.xml', 'w');

    fwrite($fp, $sitemap);
    fclose($fp);
}
add_action('publish_post', 'ow_create_sitemap');
add_action('publish_page', 'ow_create_sitemap');
add_action('save_post',    'ow_create_sitemap');