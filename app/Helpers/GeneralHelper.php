<?php

/**
 * Function To return shorter copy of an text
 * @param string $text the text to be shorten
 * @param int $limit How much charcter of whole text will be shown
 */
if (!function_exists('excerpt')) {
    function excerpt(string $text, int $limit = 12, $dots = false): string
    {
        $dots = $dots ? '...' : '';
        if (strlen($text > $limit)) {
            return mb_substr($text, 0, $limit) . $dots;
        }
        return $text;
    }
}
/**
 * @param array $array
 */
if (!function_exists('array_depth')) {
    function array_depth(array $array)
    {
        $max_depth = 1;

        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = array_depth($value) + 1;

                if ($depth > $max_depth) {
                    $max_depth = $depth;
                }
            }
        }

        return $max_depth;
    }
}