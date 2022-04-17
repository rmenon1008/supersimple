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
                    <li style="animation-delay: 0s;" class="wp-social-link wp-social-link wp-block-social-link" id="social-hackaday"><a slide-label="Hackaday" href="https://hackaday.io/rohanmenon" target="_blank" aria-label="Hackaday" class="wp-block-social-link-anchor"> <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" preserveAspectRatio="xMidYMin slice" focusable="false">
                                <path xmlns="http://www.w3.org/2000/svg" style=" stroke:none;fill-rule:evenodd;fill:currentColor;fill-opacity:1;" d="M 3.359375 1.433594 C 3.085938 1.433594 2.824219 1.476562 2.574219 1.546875 L 4.425781 3.191406 L 2.351562 5.488281 L 0.460938 3.816406 C 0.425781 4 0.40625 4.191406 0.40625 4.390625 C 0.40625 6.019531 1.730469 7.34375 3.359375 7.34375 C 3.671875 7.34375 3.96875 7.292969 4.253906 7.203125 L 6.640625 9.320312 C 7.097656 8.332031 7.765625 7.488281 8.585938 6.863281 L 6.28125 4.824219 C 6.304688 4.683594 6.316406 4.535156 6.316406 4.390625 L 6.316406 4.371094 C 6.300781 2.746094 4.984375 1.433594 3.359375 1.433594 Z M 17.558594 14.804688 C 17.179688 15.832031 16.570312 16.726562 15.800781 17.421875 L 17.726562 19.125 C 17.703125 19.28125 17.683594 19.445312 17.683594 19.609375 C 17.683594 21.242188 19.007812 22.566406 20.640625 22.566406 C 20.933594 22.566406 21.21875 22.519531 21.488281 22.441406 L 19.5625 20.730469 L 21.628906 18.445312 L 23.546875 20.144531 C 23.578125 19.96875 23.59375 19.792969 23.59375 19.609375 L 23.59375 19.585938 C 23.582031 17.960938 22.261719 16.65625 20.640625 16.65625 C 20.34375 16.65625 20.058594 16.699219 19.789062 16.78125 Z M 17.558594 14.804688 " />
                                <path xmlns="http://www.w3.org/2000/svg" style=" stroke:none;fill-rule:evenodd;fill:currentColor;fill-opacity:1;" d="M 20.640625 1.433594 C 19.015625 1.433594 17.699219 2.746094 17.683594 4.371094 L 17.683594 4.390625 C 17.683594 4.535156 17.695312 4.683594 17.71875 4.824219 L 15.414062 6.863281 C 16.234375 7.488281 16.902344 8.332031 17.359375 9.320312 L 19.746094 7.203125 C 20.03125 7.292969 20.328125 7.34375 20.640625 7.34375 C 22.269531 7.34375 23.59375 6.019531 23.59375 4.390625 C 23.59375 4.191406 23.574219 4 23.539062 3.816406 L 21.648438 5.488281 L 19.574219 3.191406 L 21.425781 1.546875 C 21.175781 1.476562 20.914062 1.433594 20.640625 1.433594 Z M 6.441406 14.804688 L 4.210938 16.78125 C 3.941406 16.699219 3.65625 16.65625 3.359375 16.65625 C 1.738281 16.65625 0.417969 17.960938 0.40625 19.585938 L 0.40625 19.609375 C 0.40625 19.792969 0.421875 19.96875 0.453125 20.144531 L 2.371094 18.445312 L 4.4375 20.730469 L 2.511719 22.441406 C 2.78125 22.519531 3.066406 22.566406 3.359375 22.566406 C 4.992188 22.566406 6.316406 21.242188 6.316406 19.609375 C 6.316406 19.445312 6.296875 19.28125 6.273438 19.125 L 8.199219 17.421875 C 7.429688 16.726562 6.820312 15.832031 6.441406 14.804688 Z M 6.441406 14.804688 " />
                                <path xmlns="http://www.w3.org/2000/svg" style=" stroke:none;fill-rule:nonzero;fill:currentColor;fill-opacity:1;" d="M 12 6.199219 C 8.953125 6.199219 6.480469 8.9375 6.480469 12.316406 C 6.480469 14.40625 7.429688 16.25 8.871094 17.355469 C 8.773438 17.515625 8.71875 17.707031 8.71875 17.90625 C 8.71875 18.5 9.191406 18.984375 9.777344 18.984375 C 10.363281 18.984375 10.835938 18.5 10.835938 17.90625 C 10.835938 17.863281 10.832031 17.824219 10.828125 17.78125 L 10.972656 17.78125 C 10.964844 17.835938 10.960938 17.890625 10.960938 17.945312 C 10.960938 18.519531 11.425781 18.984375 12 18.984375 C 12.574219 18.984375 13.039062 18.519531 13.039062 17.945312 C 13.039062 17.890625 13.035156 17.835938 13.027344 17.78125 L 13.210938 17.78125 C 13.203125 17.835938 13.199219 17.890625 13.199219 17.945312 C 13.199219 18.519531 13.664062 18.984375 14.238281 18.984375 C 14.816406 18.984375 15.28125 18.519531 15.28125 17.945312 C 15.28125 17.734375 15.214844 17.535156 15.109375 17.371094 C 16.5625 16.269531 17.519531 14.417969 17.519531 12.316406 C 17.519531 8.9375 15.046875 6.199219 12 6.199219 Z M 9.628906 10.765625 C 9.9375 10.765625 10.25 10.863281 10.515625 11.019531 C 10.742188 11.1875 10.921875 11.414062 11.054688 11.65625 C 11.171875 11.964844 11.007812 12.3125 10.761719 12.503906 C 10.574219 12.628906 10.394531 12.773438 10.171875 12.839844 C 9.902344 12.929688 9.644531 13.054688 9.390625 13.183594 C 9.269531 13.253906 9.175781 13.355469 9.140625 13.496094 C 9.054688 13.640625 9.136719 13.828125 9.039062 13.960938 C 8.894531 14.066406 8.730469 13.9375 8.613281 13.847656 C 8.367188 13.664062 8.144531 13.410156 8.082031 13.101562 C 8.035156 12.835938 7.980469 12.566406 8.011719 12.300781 C 8.015625 11.972656 8.167969 11.671875 8.371094 11.425781 C 8.597656 11.117188 8.929688 10.847656 9.320312 10.800781 C 9.421875 10.777344 9.523438 10.765625 9.628906 10.765625 Z M 14.371094 10.765625 C 14.476562 10.765625 14.578125 10.777344 14.679688 10.800781 C 15.070312 10.847656 15.402344 11.117188 15.628906 11.425781 C 15.832031 11.671875 15.984375 11.972656 15.988281 12.300781 C 16.019531 12.566406 15.964844 12.835938 15.917969 13.101562 C 15.855469 13.410156 15.632812 13.664062 15.386719 13.847656 C 15.269531 13.9375 15.105469 14.066406 14.960938 13.960938 C 14.863281 13.828125 14.945312 13.640625 14.859375 13.496094 C 14.824219 13.355469 14.730469 13.253906 14.609375 13.183594 C 14.355469 13.054688 14.097656 12.929688 13.828125 12.839844 C 13.605469 12.773438 13.425781 12.628906 13.238281 12.503906 C 12.992188 12.3125 12.828125 11.964844 12.945312 11.65625 C 13.078125 11.414062 13.257812 11.1875 13.484375 11.019531 C 13.75 10.863281 14.0625 10.765625 14.371094 10.765625 Z M 12.015625 13.90625 C 12.3125 13.914062 12.605469 15.140625 12.53125 15.621094 C 12.285156 16.347656 12.328125 15.148438 12.015625 15.136719 C 11.691406 15.136719 11.632812 16.320312 11.460938 15.625 C 11.410156 15.097656 11.746094 13.898438 12.015625 13.90625 Z M 12.015625 13.90625 " />
                            </svg></a></li>
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

                    copyToClipboard("me@rohanmenon.com");
                    var spanElement = document.querySelector(".wp-social-link#email-copy span");
                    spanElement.setAttribute("slide-label", "Copied");
                    spanElement.style.width = "80px";
                    // document.querySelector(".wp-social-link#email-copy span::after").style.opacity = 1;
                    document.getElementById("email-success").innerHTML = '<path xmlns="http://www.w3.org/2000/svg" style=" stroke:none;fill-rule:nonzero;fill:currentColor;fill-opacity:1;" d="M 15 21 L 15 22.875 C 15 23.496094 14.496094 24 13.875 24 L 1.125 24 C 0.503906 24 0 23.496094 0 22.875 L 0 5.625 C 0 5.003906 0.503906 4.5 1.125 4.5 L 4.5 4.5 L 4.5 18.375 C 4.5 19.824219 5.675781 21 7.125 21 Z M 15 4.875 L 15 0 L 7.125 0 C 6.503906 0 6 0.503906 6 1.125 L 6 18.375 C 6 18.996094 6.503906 19.5 7.125 19.5 L 19.875 19.5 C 20.496094 19.5 21 18.996094 21 18.375 L 21 6 L 16.125 6 C 15.507812 6 15 5.492188 15 4.875 Z M 20.671875 3.421875 L 17.578125 0.328125 C 17.367188 0.117188 17.082031 0 16.785156 0 L 16.5 0 L 16.5 4.5 L 21 4.5 L 21 4.214844 C 21 3.917969 20.882812 3.632812 20.671875 3.421875 Z M 20.671875 3.421875 "/>'
                    setTimeout(function(reduceSize) {
                        spanElement.style.width = "";
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
