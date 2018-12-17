<?php
get_header();
?>
<?php while(have_posts()): the_post();?>
    <section id="home">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <?php
		the_content();?>
    </section>
    <?php echo init_wprazmi_blocks();?>
    <?php echo init_wprazmi_blocks_theme();?>

    <?php endwhile;?>
<?php
get_footer();
?>