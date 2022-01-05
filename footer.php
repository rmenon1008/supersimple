<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #page -->
<footer>

    <style>
        <?php
            $number = (get_the_ID() + 2) % 3 + 1;
            if ($number == 1) {
                $image = get_template_directory_uri() . "/images/footer-1.svg";
                $text = '42°40\'13.8"N 73°04\'08.2"W';
                $link = "https://www.google.com/maps/place/42%C2%B040'13.8%22N+73%C2%B004'08.2%22W/";
            } elseif ($number == 2) {
                $image = get_template_directory_uri() . "/images/footer-2.svg";
                $text = '63°32\'50.0"N 18°49\'41.0"W';
                $link = "https://www.google.com/maps/place/63%C2%B032'50.0%22N+18%C2%B049'41.0%22W/";
            } elseif ($number == 3) {$image = get_template_directory_uri() . "/images/footer-1.svg";
                $image = get_template_directory_uri() . "/images/footer-3.svg";
                $text = '42°35\'26.1"N 74°21\'33.5"W';
                $link = "https://www.google.com/maps?q=loc:42.590586,-74.359296";
            }
        ?>
        .footer-image {
            background-image: url('<?php echo $image?>');
        }
    </style>
    <div class="footer-image">
        <p>
            <a href="<?php echo $link?>">
                <?php echo $text?>
            </a>
        </p>
    </div>

    <div class="footer-content">
        <div class="content">

            <table class="footer-table">
                <tr>
                    <td class="td1">
                        <div class="footer-search">
                            <?php get_search_form(); ?>
                        </div>
                        <!-- <h3>rohan menon</h3> -->
                        <br>I’m a student at The University of Washington with interests in robotics, electronics, design, politics and more. This website documents some of my past and current projects.
                        <!-- <a style="line-height:2" href="mailto:me@rohanmenon.com" target="_blank">me@rohanmenon.com</a> -->
                    </td>
                    <td class="td2">
                        <h3>pages</h3>
                        <a href="/">Home</a> <br>
                        <a href="/spotlight">Spotlight</a> <br>
                        <a href="/projects">Projects</a> <br>
                        <a href="/log-book">Log Book</a> <br>
                    </td>
                    <td class="td3">
                        <h3>connect</h3>
                        <a href="https://www.linkedin.com/in/rohan-menon-46518415a/"> LinkedIn ↗</a> <br>
                        <a href="https://hackaday.io/rohanmenon"> Hackaday ↗</a> <br>
                        <a target="_blank" href="mailto:me@rohanmenon.com"> Email ↗</a> <br>
						<a target="_blank" href="https://rohanmenon.com/feed/"> RSS Feed</a> <br>
                    </td>
                    <td class="td4">
                        <h3><a class="back-to-top" href="#">back to top</a></h3>
                        2021 Rohan Menon
                    </td>
                </tr>
            </table>

        </div>
    </div>
</footer>
<!-- <div class="cursor"></div>
<div class="dot"></div> -->
<noscript>
    <style>
        img {
            opacity: 1 !important;
        }
    </style>
</noscript>
<script>
    function isVisible(element) {
        return (element.offsetWidth > 0 ||
            element.offsetHeight > 0 ||
            element.getClientRects().length > 0);
    }

    var elements = Array.from(document.querySelectorAll('.batch-load')).filter(isVisible).slice(0, 6)
    Promise.all(elements.filter(img => !img.complete).map(img => new Promise(resolve => {
        img.onload = img.onerror = resolve;
    }))).then(() => {
        setImageOpacity(1)
    });

    setTimeout(function() {
        setImageOpacity(1)
    }, 3500);

    function setImageOpacity(opacity) {
        document.querySelectorAll('.batch-load').forEach(function(image) {
            image.style.opacity = opacity;
        });
    }
</script>
<?php wp_footer(); ?>
</body>

</html>