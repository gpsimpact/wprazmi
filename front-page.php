<?php get_header(); ?>

<section id="hero">
	
	<?php 
		$hero_img = get_field('hero_image');
	
	?>

	<figure>
		<picture>
			<source media="(min-width: 768px)"
    				  srcset="<?php echo $fallback_img['url']; ?>" />
      <img srcset="<?php echo $hero_img['sizes']['large']; ?>" alt="<?php echo $hero_img['alt']; ?>" width="100%" class="" />
    </picture>
		
  </figure>
  <div class="container">
   <div class="row justify-content-center">
   <div class="col-md-8">
        <h1> <?php the_field('hero_title');?></h1>
        <h3> <?php the_field('hero_subtitle');?></h3>

        <?php $link = get_field('hero_link'); ?>
				<?php if($link):?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn btn-primary">
						<?php echo $link['title']; ?>
					</a>
		<?php endif;?>


   </div>
</div>
        
  </div>
</section>

<?php if( have_rows('scrollbar_rows') ):?>

<script>
jQuery(function (){
    console.log('hi');
  var qs = [];
  jQuery('.hqs-item').each(function(i, obj) {
    qs.push(obj);
});

var listTicker = function(options) {

    var listTickerInner = function(index) {

        if (options.list.length == 0) return;

        if (!index || index < 0 || index > options.list.length) index = 0;

        var value= options.list[index];

        options.trickerPanel.fadeOut(function() {
            jQuery(this).html(value).fadeIn();
        });

        var nextIndex = (index + 1) % options.list.length;

        setTimeout(function() {
            listTickerInner(nextIndex);
        }, options.interval);

    };

    listTickerInner(options.startIndex);
}


jQuery(function() {
    listTicker({
        list: qs ,
        startIndex: 0,
        trickerPanel: jQuery('#hqs'),
        interval: 8000,
    });
});
});


</script>
  <section id="hqs-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
    <div id="hqs"></div>
  </div>
  </div>
  </div>
    <div class="d-none">
    <?php while ( have_rows('scrollbar_rows') ) : the_row();?>
      <div class="hqs-item">
        <h3 class="hqs-quote"><?php the_sub_field('scroller_quote');?></h3>
        <h4 class="hqs-cite"><?php the_sub_field('scroller_citation');?></h4>
      </div>
  <?php  endwhile;?>
  </div>
  </section>
<?php endif;?>


<section class="factoid bg-accent">
  <div class="container">
  <div class="row align-items-center justify-content-center">
  <div class="col-md-3">
  <img src="<?php the_field('fact_image');?>"/>
  </div>
    <div class="col-md-7">
    <h2><?php the_field('fact_headline'); ?></h2>
    <p><?php the_field('fact_text'); ?></p>
    </div>
</div>
  </div>
</section>

<section class="quoters">
<div class="row no-gutters">
    <div class="col-md-6">
        <img src="<?php the_field('image_quote_one');?>"/>
    </div>
    <div class="col-md-6">
    <img src="<?php the_field('image_quote_two');?>"/>

    </div>

</div>
</section>

<?php get_footer(); ?>