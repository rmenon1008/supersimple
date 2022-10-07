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
            <div id="path">
                <h1 id="pathString" class="name">/</h1>
                <div id="haze"></div>
            </div>
            <?php
            $title_string = get_the_title();

            ?>
            <div class="title-buttons" style="display:inline; width:100%">
                <h1 class="glide-in name">
                    <span class="text-wrapper">
                        <span class="letters"><?php echo $title_string; ?></span>
                    </span>
                </h1>


                <ul class="wp-block-social-links has-medium-icon-size is-style-pill-shape" style="float: right; margin-top: 17px;">
                    <li tabindex="0" role="button" aria-label="Copy email" class="wp-social-link wp-social-link wp-block-social-link" id="email-copy" style="cursor:pointer; animation-delay: 0.1s;"><span slide-label="Copy email" class="wp-block-social-link-anchor"><svg id="email-success" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                                <path d="M20,4H4C2.895,4,2,4.895,2,6v12c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2V6C22,4.895,21.105,4,20,4z M20,8.236l-8,4.882 L4,8.236V6h16V8.236z"></path>
                            </svg></span></li>
                    <li style="animation-delay: 0.05s;" class="wp-social-link wp-social-link wp-block-social-link" id="social-linkedin"><a slide-label="LinkedIn" href="https://www.linkedin.com/in/rohan-menon-46518415a/" target="_blank" aria-label="LinkedIn" class="wp-block-social-link-anchor"> <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                                <path d="M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z"></path>
                            </svg></a></li>
                    <li style="animation-delay: 0s;" class="wp-social-link wp-social-link wp-block-social-link" id="social-hackaday"><a slide-label="GitHub" href="https://github.com/rmenon1008" target="_blank" aria-label="GitHub" class="wp-block-social-link-anchor">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a></li>
                </ul>
            </div>
            <script>
                const copyToClipboard = str => {
                    const el = document.createElement('textarea');
                    el.value = str;
                    el.setAttribute('readonly', '');
                    el.style.position = 'absolute';
                    el.style.left = '-9999px';
                    document.body.appendChild(el);
                    const selected =
                        document.getSelection().rangeCount > 0 ?
                        document.getSelection().getRangeAt(0) :
                        false;
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);
                    if (selected) {
                        document.getSelection().removeAllRanges();
                        document.getSelection().addRange(selected);
                    }
                };

                document.getElementById("email-copy").addEventListener('keydown', function(evt) {
                    if (evt.keyCode == 13 || evt.keyCode == 32) {
                        document.getElementById("email-copy").click();
                    }
                });

                document.getElementById("email-copy").addEventListener("click", function(event) {

                    copyToClipboard("rohan@rohanmenon.com");
                    document.querySelector(".wp-social-link#email-copy").classList.add("copied");
                    var spanElement = document.querySelector(".wp-social-link#email-copy span");
                    spanElement.setAttribute("slide-label", "Copied");
                    spanElement.style.width = "80px";
                    // document.querySelector(".wp-social-link#email-copy span::after").style.opacity = 1;
                    document.getElementById("email-success").innerHTML = '<path xmlns="http://www.w3.org/2000/svg" style=" stroke:none;fill-rule:nonzero;fill:currentColor;fill-opacity:1;" d="M 15 21 L 15 22.875 C 15 23.496094 14.496094 24 13.875 24 L 1.125 24 C 0.503906 24 0 23.496094 0 22.875 L 0 5.625 C 0 5.003906 0.503906 4.5 1.125 4.5 L 4.5 4.5 L 4.5 18.375 C 4.5 19.824219 5.675781 21 7.125 21 Z M 15 4.875 L 15 0 L 7.125 0 C 6.503906 0 6 0.503906 6 1.125 L 6 18.375 C 6 18.996094 6.503906 19.5 7.125 19.5 L 19.875 19.5 C 20.496094 19.5 21 18.996094 21 18.375 L 21 6 L 16.125 6 C 15.507812 6 15 5.492188 15 4.875 Z M 20.671875 3.421875 L 17.578125 0.328125 C 17.367188 0.117188 17.082031 0 16.785156 0 L 16.5 0 L 16.5 4.5 L 21 4.5 L 21 4.214844 C 21 3.917969 20.882812 3.632812 20.671875 3.421875 Z M 20.671875 3.421875 "/>'
                    setTimeout(function(reduceSize) {
                        spanElement.style.width = "";
                        document.querySelector(".wp-social-link#email-copy").classList.remove("copied");
                        spanElement.setAttribute("slide-label", "Copy email");
                        document.getElementById("email-success").innerHTML = '<path d="M20,4H4C2.895,4,2,4.895,2,6v12c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2V6C22,4.895,21.105,4,20,4z M20,8.236l-8,4.882 L4,8.236V6h16V8.236z"></path>'
                    }, 1000);
                });

                var path = (window.location.pathname).split("/");
                var elem = document.getElementById("pathString")
                var haze = document.getElementById("haze")
                var sliced = path.slice(0, path.length - 2).join("/")
                var string = sliced.split("-").join(" ")
                elem.innerHTML = string + "/"
                elem.addEventListener("mouseover", function(event) {
                    // haze.style.background = "linear-gradient(90deg, white 10%, rgba(255, 255, 255, 0.4) 100%)"
                    haze.style.filter = "opacity(0.5)"
                });
                elem.addEventListener("mouseleave", function(event) {
                    // haze.style.background = ""
                    haze.style.filter = ""
                });
                elem.addEventListener("click", function(event) {
                    window.location.href = sliced + "/"
                });

                var textWrapper = document.querySelector('.glide-in .letters');
                textWrapper.innerHTML = textWrapper.textContent.replace(/\S+/g, "<span class='word'>$&</span>");
                var words = document.querySelectorAll('.glide-in .word')
                for (i = 0; i < words.length; ++i) {
                    words[i].innerHTML = words[i].textContent.replace(/\S/g, "<span class='letter'>$&</span>");
                }
                anime.timeline()
                    .add({
                        targets: '.glide-in .letter',
                        translateY: ["1.25em", 0],
                        translateX: ["-0.7em", 0],
                        translateZ: 0,
                        rotateZ: [80, 0],
                        duration: 750,
                        easing: "cubicBezier(0.190, 1.000, 0.065, 1.000)",
                        delay: (el, i) => 25 * i
                    }).add({
                        targets: '.ml7',
                        opacity: 0,
                        duration: 1000,
                        easing: "cubicBezier(0.190, 1.000, 0.065, 1.000)",
                        delay: 1000
                    });
            </script>
            <div class="detail">
                <?php
                the_content();
                ?>
            </div>
        </div>

<?php endwhile;
endif;

get_footer();
