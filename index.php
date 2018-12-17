<?php
get_header();
?>
<?php while(have_posts()): the_post();?>
    <section id="home">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <?php
		the_content();?>
    </section>

    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

    <?php endwhile;?>
<?php
get_footer();
?>