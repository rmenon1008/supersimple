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


    <div class="footer-image"></div>
    <div class="footer-content">
        <div class="content">

            <table class="footer-table">
                <tr>
                    <td class="td1">
                        <h3>rohan menon</h3>
                        I’m a freshman at The University of Washington with interests in robotics, electronics, design, politics and more. This website documents some of my past and current projects.
                    </td>
                    <td class="td2">
                        <h3>pages</h3>
                        <a href="/"> Home</a> <br>
                        <a href="/research"> Research</a> <br>
                        <a href="/projects"> Projects</a> <br>
                        <a href="/log-book"> Log Book</a> <br>
                    </td>
                    <td class="td3">
                        <h3>connect</h3>
                        <a href="https://www.linkedin.com/in/rohan-menon-46518415a/"> LinkedIn ↗</a> <br>
                        <a href="https://hackaday.io/rohanmenon"> Hackaday ↗</a> <br>
                        <a href="mailto:me@rohanmenon.com"> Email ↗</a> <br>
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
    Promise.all(Array.from(document.querySelectorAll('.batch-load')).filter(img => !img.complete).map(img => new Promise(resolve => {
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