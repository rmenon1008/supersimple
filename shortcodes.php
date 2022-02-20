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
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'batch-load')); ?>
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
        echo '<div class="image-grid-item log" style="--animation-order:' . $animate_order . ';">';
      } else {
        echo '<div class="image-grid-item" style="--animation-order:' . $animate_order . ';" tags="'. $tag_string .'">';
      }
    ?>

      <a class="nostyle grid-link no-text" href="<?php the_permalink() ?>" role="button"><?php the_title(); ?></a>
      <div class="scaleable">
        <div class="image-contain shimmer">
          <?php the_post_thumbnail('post-thumbnail', array('class' => 'batch-load')); ?>
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

    <script>
      var posts = document.querySelectorAll('.image-grid-item');
      var selected_tag = new URLSearchParams(window.location.search).get('tag');
      
      var selected_link = document.querySelector('.tag_filter a[tag="' + selected_tag + '"]');
      selected_link.classList.add('selected');
      selected_link.href = window.location.href.split('?')[0];
      
      if (selected_tag) {
        var j = 0;
        for (var i = 0; i < posts.length; i++) {
          var tags = posts[i].getAttribute('tags');
          if (!tags.includes(selected_tag)) {
            posts[i].style.display='none';
          }
          else {
            posts[i].style.setProperty('--animation-order', j);
            j++;
          }
        }
      }
    </script>

    <?php
    echo "</div>";
    return ob_get_clean();
    wp_reset_postdata();

  else :
    return ('<p>No Posts</p>');
  endif;
}
add_shortcode('post_grid', 'post_grid_function');

// Add Shortcode
function text_shortcode($atts = array(), $content = null)
{
  extract(shortcode_atts(array(
    'link' => '#'
  ), $atts));

  return '<a class="block-link nostyle" href=' . $link . ' ><div class="block-link-container" >' . $content . '</div></a>';
}
add_shortcode('card', 'text_shortcode');
