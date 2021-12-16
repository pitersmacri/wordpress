<!-- variável recebe um array de títulos das páginas filho de ID 79 -->
<?php $lists = wp_list_pluck( get_pages("child_of=79"), 'post_title' ); ?>

<!-- varrendo o array -->
<?php foreach ($lists as $list) { ?>

	<!-- imprimindo o valor -->
    <?php echo $list; ?>

<?php } ?>