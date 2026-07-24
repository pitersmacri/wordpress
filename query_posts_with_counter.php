<?php 
// Get current page for pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Initialize counter
$i = 0; 

// Use WP_Query instead of deprecated query_posts for better performance and reliability
$custom_query = new WP_Query(array(
    'cat' => 15,
    'posts_per_page' => 3,
    'paged' => absint($paged)
)); 

if ($custom_query->have_posts()) : 
    while ($custom_query->have_posts()) : $custom_query->the_post();
        
        // CALL TITLE, CONTENT, PAGINATION AND OTHERS FUNCTIONS 
        // Example usage:
        // the_title();
        // the_content();
        // etc.
        
        $i++; 
    endwhile; 
else:
    // Handle case when no posts are found
    echo '<p>' . __('No posts found.', 'textdomain') . '</p>';
endif; 

// Reset post data to restore global $post object
wp_reset_postdata(); 
?>