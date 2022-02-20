<?php

if (!function_exists('titleCase')) {
function titleCase($string) {
    // Start with a completely lowercase title
    $string = strtolower($string);

    // Separate on spaces
    $string_array = explode(" ", $string);

    $no_capitalization = ["of", "a", "an", "the", "but", "or", "at", "on", "in", "by", "for", "to", "and"];
    $all_caps = ["ny", "stem", "steam", "un", "edaas", "wisp", "uw"];

    foreach ($string_array as &$word) {
        // Capitalize all first letters in all words
        $word = ucfirst($word);

        // Change back special words to lower case
        if (in_array(strtolower($word), $no_capitalization)){
            $word = lcfirst($word);
        }

        if (in_array(strtolower($word), $all_caps)){
            $word = strtoupper($word);
        }
    }
    return implode(" ", $string_array);
}
}
