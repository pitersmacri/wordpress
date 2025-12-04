<!--  Query post type page with ID 12 - Querie do tipo page com ID 12 -->
<?php 
// Sanitize the page ID to prevent potential security issues
$page_id = 12; // Fixed ID, but could be made configurable

// Create a new WP_Query instance with proper parameters
$my_query = new WP_Query(array(
    'p' => absint($page_id),
    'post_type' => 'page',
    'post_status' => 'publish'
)); 
?>
<?php if ( $my_query->have_posts() ) : ?>
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

	<!-- Print content page ID 12 - Exibe conteúdo da página ID 12 -->
	<?php the_content(); ?>
								
<?php endwhile; ?>
<!--  Reset query - Reseta a querie -->
<?php wp_reset_postdata(); ?>
<?php else: ?>
	<!-- Handle case when no posts are found -->
	<p><?php _e('No content found.', 'textdomain'); ?></p>
<?php endif; ?>
<!-- End loop - Fim do laço -->