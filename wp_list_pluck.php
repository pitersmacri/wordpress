<?php
// Variable receives an array of titles from child pages of ID 79
$parent_page_id = 79; // Could be made configurable
$pages = get_pages(array(
    'child_of' => absint($parent_page_id),
    'post_status' => 'publish'
));

// Extract titles using wp_list_pluck
$lists = wp_list_pluck($pages, 'post_title');

// Loop through the array
if (!empty($lists)) {
    foreach ($lists as $list) {
        // Safely print the value
        echo esc_html($list);
    }
} else {
    echo __('No child pages found.', 'textdomain');
}
?>