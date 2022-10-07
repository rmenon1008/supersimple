<?php

function post_list_function($atts = array())
{
  // set up default parameters
  extract(shortcode_atts(array(
    'archive' => 0,
    'category' => '',
    'exclude' => -1,
    'posts' => 999,
  ), $atts));

  $the_query = new WP_Query(array(
    'category_name' => $category,
    'post_status' => 'publish',
    'posts_per_page' => $posts,
    'category__not_in' => $exclude,
  ));

  if ($category == '') {
    $category = 'recent';
  }

  if ($the_query->have_posts()) :
    ob_start();
    if ($archive == 1) {
      echo "<div class='post_list archive'>";
    } else {
      echo "<div class='post_list'>";
    }
    //echo "<div class='post_list_haze'></div>";
    echo "<div class='scroll-window'>";
    $stringed_cat = str_replace('-', ' ', $category);
    echo "<div class='posts-list-title'>Related <b>" . $stringed_cat . "</b> posts</div>";
    // "<p>project logs</p>";
    $animate_order = -1;
    while ($the_query->have_posts()) : $the_query->the_post();
      $animate_order++;
      $myExcerpt = get_the_excerpt();
      $tags = array("<p>", "</p>");
      $myExcerpt = str_replace($tags, "", $myExcerpt);
      if ($archive) {
        $category = get_the_category()[0]->name;
        $title = $category . " - " . get_the_title();
      } else {
        $title = get_the_title();
      }
?>
      <a class="nostyle block" href="<?php the_permalink() ?>" role="button">
        <div class="image-gallery-small" style="--animation-order:<?php echo $animate_order ?>;">
          <div class="image-contain">
            <?php the_post_thumbnail('medium', array('class' => 'batch-load')); ?>
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
    echo "</div></div>";
    return ob_get_clean();
    wp_reset_postdata();

  else :
    return ('<p style="text-align: center;"> ----- No blog posts yet ----- </p>');
  endif;
}
add_shortcode('post_list', 'post_list_function');


function post_grid_function($atts = array())
{
  // set up default parameters
  extract(shortcode_atts(array(
    'log' => '0',
    'category' => '',
    'tag' => '',
    'specific_posts' => null,
    'posts' => 999,
    'tag_filters' => null,
  ), $atts));

  if ($specific_posts) {
    $the_query = new WP_Query(array(
      'post_name__in' => explode(",", $specific_posts),
      'post_status' => 'publish',
      'orderby' => 'post_name__in',
    ));
  } elseif ($tag) {
    $the_query = new WP_Query(array(
      'tag' => $tag,
      'post_status' => 'publish',
      'posts_per_page' => $posts,
    ));
  } else {
    $the_query = new WP_Query(array(
      'category_name' => $category,
      'post_status' => 'publish',
      'posts_per_page' => $posts,
    ));
  }

  if ($the_query->have_posts()) :
    ob_start();
    echo "<div class='post_grid'>";

    if ($tag_filters) {
      $tags = get_tags();
      echo "<div class='tag_filter'>";
      // echo "<a tag='all' href='?tag=all'>all</a>";
      $animate_order = count($tags);
      foreach ($tags as $tag) {
        $animate_order--;
        echo "<a style='--animation-order:" . $animate_order . ";' tag='" . $tag->name . "' href='?tag=" . $tag->name . "'>" . $tag->name . "</a>";
      }

      echo "</div>";
    }

    echo "<div class='image-grid'>";
    $animate_order = -1;
    while ($the_query->have_posts()) : $the_query->the_post();
      $animate_order++;
      $posttags = get_the_tags();
      $tag_string = '';
      if ($posttags) {
        foreach ($posttags as $tag) {
          $tag_string .= $tag->name . ' ';
        }
      }
      if ($log) {
        $posttags = get_the_date();
        echo '<div class="image-grid-item log" style="--animation-order:' . $animate_order . '; --color: #defcf4">';
      } else {
        echo '<div class="image-grid-item" style="--animation-order:' . $animate_order . '; --color: #defcf4" tags="' . $tag_string . '">';
      }
    ?>

      <a class="nostyle grid-link no-text" href="<?php the_permalink() ?>" role="button"><?php the_title(); ?></a>
      <div class="scaleable">
        <div class="image-contain shimmer">
          <?php the_post_thumbnail('medium', array('class' => 'batch-load')); ?>
        </div>
        <div class="gallery-text">
          <h3><?php the_title(); ?></h3>
          <?php
          // $posttags = array_slice($posttags, 0, 1);
          // if ($posttags) {
          //   if (gettype($posttags) == 'array') {
          //     foreach ($posttags as $tag) {
          //       $status = $tag->name . ' ';
          //       $link =  get_tag_link($tag->term_id);
          //       echo "<a class='status' href='{$link}'>{$status}</a>";
          //     }
          //   } else if (gettype($posttags) == 'string') {
          //     echo "<a class='status' href='{#}'>{$posttags}</a>";
          //   }
          // }
          ?>
          <?php the_excerpt();
          if ($log) {
            echo '<div class="small-haze"></div>';
          }
          ?>
        </div>
      </div>
      </div>

    <?php
    endwhile;
    echo "<div class='image-grid-item invisible'></div>";
    echo "<div class='image-grid-item invisible'></div>";
    echo "<div class='image-grid-item invisible'></div>";
    echo "<div class='image-grid-item invisible'></div>";
    echo "</div>";
    ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.2/color-thief.min.js" integrity="sha512-mMe7BAZPOkGbq+zhRBMNV3Q+5ZDzcUEOJoUYXbHpEcODkDBYbttaW7P108jX66AQgwgsAjvlP4Ayb/XLJZfmsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function rgbToHsl(r, g, b) {
        r /= 255, g /= 255, b /= 255;
        var max = Math.max(r, g, b),
          min = Math.min(r, g, b);
        var h, s, l = (max + min) / 2;

        if (max == min) {
          h = s = 0; // achromatic
        } else {
          var d = max - min;
          s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
          switch (max) {
            case r:
              h = (g - b) / d + (g < b ? 6 : 0);
              break;
            case g:
              h = (b - r) / d + 2;
              break;
            case b:
              h = (r - g) / d + 4;
              break;
          }
          h /= 6;
        }

        return [h * 360, "80%", "98%"];
      }
      // wait for document to be ready
      var gridItems = document.querySelectorAll('.image-grid-item');
      var colorThief = new ColorThief();

      window.addEventListener("load", function(event) {
        // iterate through each image
        for (var i = 0; i < gridItems.length; i++) {
          var item = gridItems[i];
          var image = item.querySelector('img');
          if (image) {
            var color = colorThief.getColor(image);
            var colorHSL = rgbToHsl(color[0], color[1], color[2]);
            item.style.setProperty('--color', 'hsl(' + colorHSL[0] + ', ' + colorHSL[1] + ', ' + colorHSL[2] + ')');

            item.addEventListener('mouseenter', function(event) {
              console.log(colorHSL);
              document.body.style.setProperty('--bg', this.style.getPropertyValue('--color'));
            });

            item.addEventListener('mouseleave', function(event) {
              // document.body.style.setProperty('--bg', '#ffffff');
            });
          }

        }
      });
    </script> -->


    <?php
    if ($tag_filters) :
    ?>

      <script>
        document.addEventListener('DOMContentLoaded', (event) => {

          var posts = document.querySelectorAll('.image-grid-item');
          var selected_tag = new URLSearchParams(window.location.search).get('tag');

          var selected_link = document.querySelector('.tag_filter a[tag="' + selected_tag + '"]');
          if (selected_link) {
            selected_link.classList.add('selected');
            selected_link.href = window.location.href.split('?')[0];
          }

          if (selected_tag) {
            var j = 0;
            for (var i = 0; i < posts.length; i++) {
              var tags = posts[i].getAttribute('tags');
              if (tags) {
                if (!tags.includes(selected_tag)) {
                  posts[i].style.display = 'none';
                } else {
                  posts[i].style.setProperty('--animation-order', j);
                  j++;
                }
              }
            }
          }
        })
      </script>

  <?php
    endif;

    echo "</div>";
    return ob_get_clean();
    wp_reset_postdata();

  else :
    return ('<p>No Posts</p>');
  endif;
}
add_shortcode('post_grid', 'post_grid_function');


function connect_card_function($atts)
{
  ob_start();
  $atts = shortcode_atts(array(
    'title' => '',
    'hours' => '',
  ), $atts);
  $title = $atts['title'];
  $hours = $atts['hours'];
  ?>
  <div class="connect_card">
    <?php
    $path = get_template_directory_uri() . "/images/pfp.svg";
    echo file_get_contents($path);
    ?>
    <div class="card-details">
      <h2>Rohan Menon</h2>
      <h3>rohan@rohanmenon.com</h3>
      <p>
        An engineering student with a focus on embedded devices, sensors, and wireless technologies who thrives in fast-paced, collaborative environments.
      </p>
      <ul class="wp-block-social-links has-medium-icon-size is-style-pill-shape" style="padding-left: 0px; margin-bottom: 0 !important; margin-top: 10px !important;">
        <li class="wp-social-link wp-social-link wp-block-social-link" id="resume-pdf" style="animation-delay: 0.1s;">
          <a slide-label="PDF Resume" aria-label="Resume PDF" href="https://www.rohanmenon.com/wp-content/uploads/2022/08/Resume-Rohan-Menon-Website.pdf" target="_blank" class="wp-block-social-link-anchor">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
            </svg>
          </a>
        </li>
      </ul>
    </div>

  </div>
<?php
  return ob_get_clean();
}
add_shortcode('connect_card', 'connect_card_function');

function sticky_text_function($atts)
{
  ob_start();
  $atts = shortcode_atts(array(
    'text' => '',
  ), $atts);
  $text = $atts['text'];
?>
  <div class="sticky-box">
    <h2 class="sticky">
      <?php echo $text; ?>
    </h2>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('sticky_text', 'sticky_text_function');

// Add Shortcode
function text_shortcode($atts = array(), $content = null)
{
  extract(shortcode_atts(array(
    'link' => '#'
  ), $atts));

  return '<a class="block-link nostyle" href=' . $link . ' ><div class="block-link-container" >' . $content . '</div></a>';
}
add_shortcode('card', 'text_shortcode');


function pageless_doc_embed_function($atts = array())
{
  extract(shortcode_atts(array(
    'url' => '#'
  ), $atts));

  $content = file_get_contents($url);
  $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
  $content = str_replace('<style type="text/css">', '<style type="text/css"> @import url("https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap"); p { line-height: 1.4 !important; } .pageless-doc * { border-right: none !important; }', $content);
  $content = str_replace('h1', 'doc-h1', $content);
  $content = str_replace('h2', 'doc-h2', $content);
  $content = str_replace('h3', 'doc-h3', $content);
  $content = str_replace('h4', 'doc-h4', $content);
  // $content = str_replace('<head>', '<head><base href="' . $url . '">', $content);

  return '<div class="pageless-doc">' . $content . '</div>';
}
add_shortcode('pageless_doc', 'pageless_doc_embed_function');

function site_desc_sc()
{
  return html_entity_decode(get_bloginfo('description', 'raw'));
}
add_shortcode('site_desc', 'site_desc_sc');

function resume_js_animator_function($atts)
{
  ob_start();
  $atts = shortcode_atts(array(
    'title' => '',
    'hours' => '',
  ), $atts);
  $title = $atts['title'];
  $hours = $atts['hours'];
?>
  <script>
    const rows = document.querySelectorAll('.resume');
    console.log(rows);
    for (let i = 0; i < rows.length; i++) {
      rows[i].style.setProperty('--animation-order', i);
    }
  </script>
<?php
  return ob_get_clean();
}
add_shortcode('resume_js_animator', 'resume_js_animator_function');
