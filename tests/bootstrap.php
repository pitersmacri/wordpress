<?php
// Minimal bootstrap for tests: shims for WordPress helper functions

if (!function_exists('wp_strip_all_tags')) {
    function wp_strip_all_tags($string)
    {
        return strip_tags((string) $string);
    }
}

if (!function_exists('sanitize_text_field')) {
    function sanitize_text_field($str)
    {
        $str = (string) $str;
        // remove control characters
        $str = preg_replace('/[\x00-\x1F\x7F]/u', '', $str);
        return trim($str);
    }
}

// Load the functions file under test
require_once __DIR__ . '/../functions_limit_words.php';
