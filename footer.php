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

        //check if page is front page
        if (is_front_page()) {
            $number = 1;
        }

        if ($number == 1) {
            $image = get_template_directory_uri() . "/images/footer-1.svg";
            $text = '42°40\'13.8"N 73°04\'08.2"W';
            $link = "https://earth.google.com/web/search/42.670500,+-73.068944/@42.67067778,-73.06927802,765.11741098a,968.46282437d,35y,49.61675811h,74.30133834t,0r/data=ClkaLxIpGef7qfHSVUVAIVlQGJRpRFLAKhU0Mi42NzA1MDAsIC03My4wNjg5NDQYASABIiYKJAnxGc_O5rRFQBGKAcHZ4EVFQBlUOMzfsTlSwCFs2m_RZdJSwA";
        } elseif ($number == 2) {
            $image = get_template_directory_uri() . "/images/footer-2.svg";
            $text = '63°32\'50.0"N 18°49\'41.0"W';
            $link = "https://earth.google.com/web/search/63%c2%b032%2750.0%22N+18%c2%b049%2741.0%22W/@63.5424708,-18.83109461,191.32970845a,1743.6139011d,35y,-164.64795813h,77.17998003t,0r/data=CigiJgokCb4L1HFRTEVAEc0sJFj4SkVAGWLWZ3Q2llLAIQKuVXxPl1LA";
        } elseif ($number == 3) {
            $image = get_template_directory_uri() . "/images/footer-1.svg";
            $image = get_template_directory_uri() . "/images/footer-3.svg";
            $text = '42°35\'26.1"N 74°21\'33.5"W';
            $link = "https://earth.google.com/web/search/42.590586,+-74.359296/@42.58226419,-74.3577924,194.50071051a,1695.06109512d,35y,-163.46754185h,72.96910739t,0r/data=CigiJgokCd4IPXFUV0VAEfeU9xc2VUVAGWGKoZV0Q1LAIfJ2NEbvRFLA";
        }
        ?>.footer-image {
            background-image: url('<?php echo $image ?>');
        }
    </style>
    <div class="footer-image">
        <p>from a photo taken at
            <a href="<?php echo $link ?>">
                <?php echo $text ?>
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

                        <div class="body-content">
                            <br>
                            <b style="display:inline-block; margin-top:5px; color:var(--footer1)">rohan menon</b>
                            — <?php echo html_entity_decode(get_bloginfo('description', 'raw')) ?>
                        </div>
                    </td>
                    <td class="td2">
                        <h3>pages</h3>
                        <div class="body-content">
                            <a href="/">Home</a> <br>
                            <a href="/spotlight">Spotlight</a> <br>
                            <a href="/projects">Projects</a> <br>
                            <a href="/log-book">Log Book</a> <br>
                        </div>
                    </td>
                    <td class="td3">
                        <h3>connect</h3>
                        <div class="body-content">
                            <a href="https://www.linkedin.com/in/rohan-menon-46518415a/"> LinkedIn ↗</a> <br>
                            <a href="https://github.com/rmenon1008"> GitHub ↗</a> <br>
                            <a target="_blank" href="mailto:me@rohanmenon.com"> Email ↗</a> <br>
                            <a target="_blank" href="https://rohanmenon.com/feed/"> RSS Feed</a> <br>
                        </div>
                    </td>
                    <td class="td4">
                        <h3><a class="back-to-top" href="#">back to top</a></h3>
                        <div class="body-content">
                            <br><br><br>2022 Rohan Menon
                        </div>
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

    // let batchLoadImages = document.querySelectorAll('img.batch-load, .batch-load img, .detail figure:first-of-type img')
    let batchLoadImages = document.querySelectorAll('img.batch-load, .batch-load img')


    // add class to every batch-load image

    var elements = Array.from(batchLoadImages).filter(isVisible).slice(0, 6)
    Promise.all(elements.filter(img => !img.complete).map(img => new Promise(resolve => {
        img.onload = img.onerror = resolve;
    }))).then(() => {
        setImageOpacity(1)
    });

    setTimeout(function() {
        setImageOpacity(1)
    }, 3500);

    function setImageOpacity(opacity) {
        batchLoadImages.forEach(function(image) {
            image.style.opacity = opacity;
        });
    }
</script>
<?php wp_footer(); ?>
</body>

</html>