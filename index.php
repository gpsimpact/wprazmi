<?php
get_header();
?>
<?php while(have_posts()): the_post();?>
    <section id="home">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <?php
		the_content();?>
    </section>


</div>

<div class="col-md-1"></div>
<div class="col-md-2"></div>
<div class="col-md-3"></div>
<div class="col-md-4"></div>
<div class="col-md-5"></div>
<div class="col-md-6"></div>
<div class="col-md-7"></div>
<div class="col-md-8"></div>
<div class="col-md-9"></div>
<div class="col-md-10"></div>
<div class="col-md-11"></div>
<div class="col-md-12"></div>

    <?php endwhile;?>
<?php
get_footer();
?>