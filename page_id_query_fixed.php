<?php
/**
 * Build safe query arguments for a single post/page lookup.
 *
 * @param int|string|null $page_id     The post/page ID to query.
 * @param string|null     $post_type   The post type to query. Defaults to 'page'.
 * @param string|null     $post_status The post status to query. Defaults to 'publish'.
 * @return array|false                 Query args on success, false when the input is invalid.
 */
if (!function_exists('wp_main_build_page_query_args')) {
    function wp_main_build_page_query_args($page_id = 12, $post_type = 'page', $post_status = 'publish')
    {
        $validated_page_id = 0;

        if (is_numeric($page_id)) {
            $validated_page_id = (int) $page_id;
        }

        if ($validated_page_id <= 0) {
            return false;
        }

        $validated_post_type = 'page';
        $allowed_post_types = array('page', 'post');
        if (is_string($post_type) && $post_type !== '') {
            $sanitized_post_type = function_exists('sanitize_key')
                ? sanitize_key($post_type)
                : preg_replace('/[^a-z0-9_\-]/i', '', $post_type);

            if ($sanitized_post_type !== '' && in_array($sanitized_post_type, $allowed_post_types, true)) {
                $validated_post_type = $sanitized_post_type;
            }
        }

        $allowed_post_statuses = array('publish');
        $validated_post_status = 'publish';
        if (is_string($post_status) && $post_status !== '') {
            $sanitized_post_status = function_exists('sanitize_key')
                ? sanitize_key($post_status)
                : preg_replace('/[^a-z0-9_\-]/i', '', $post_status);

            if (in_array($sanitized_post_status, $allowed_post_statuses, true)) {
                $validated_post_status = $sanitized_post_status;
            }
        }

        return array(
            'p' => $validated_page_id,
            'post_type' => $validated_post_type,
            'post_status' => $validated_post_status,
            'posts_per_page' => 1,
            'no_found_rows' => true,
            'ignore_sticky_posts' => true,
        );
    }
}

/**
 * Render the content of a single page/post using WP_Query when available.
 *
 * @param int|string|null $page_id     The post/page ID to query.
 * @param string|null     $post_type   The post type to query. Defaults to 'page'.
 * @param string|null     $post_status The post status to query. Defaults to 'publish'.
 * @return bool                        True when content was rendered, false otherwise.
 */
if (!function_exists('wp_main_render_page_content')) {
    function wp_main_render_page_content($page_id = 12, $post_type = 'page', $post_status = 'publish')
    {
        $query_args = wp_main_build_page_query_args($page_id, $post_type, $post_status);
        if ($query_args === false) {
            return false;
        }

        if (!class_exists('WP_Query')) {
            return false;
        }

        $query = new WP_Query($query_args);

        if (!$query->have_posts()) {
            $message = function_exists('__') ? __('No content found.', 'textdomain') : 'No content found.';
            echo '<p>' . esc_html($message) . '</p>';
            return false;
        }

        while ($query->have_posts()) {
            $query->the_post();
            the_content();
        }

        wp_reset_postdata();

        return true;
    }
}
