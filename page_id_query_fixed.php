<!--  query post type page with ID 12 - querie do tipo page com ID 12 -->
<?php $my_query = new WP_Query(array('p' => 12,'post_type' => 'page')); ?>
<?php if ( $my_query->have_posts() ) : ?>
<?php while ( $my_query->have_posts() ) : ?>
<?php $my_query->the_post(); ?>

	<!-- print content page ID 12 - exibe conteúdo da página ID 12 -->
	<?php the_content(); ?>
						
<?php endwhile;	?>
<!--  reset query - reseta a querie -->
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<!-- end loop - fim do laço -->