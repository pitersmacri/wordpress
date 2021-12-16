<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; $i = 0; ?>
<?php query_posts("cat=15&showposts=3&paged=$paged"); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <!-- CALL TITLE, CONTENT, PAGINATION AND OTHERS FUNCTIONS -->
      <!-- CALL TITLE, CONTENT, PAGINATION AND OTHERS FUNCTIONS -->

    <?php $i++; endwhile; ?>
  <?php endif; ?>
<?php wp_reset_query(); ?>