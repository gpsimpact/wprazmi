<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
	  <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control input-lg">
	  <span class="input-group-btn">	    
	    <button type="submit" id="searchsubmit" class="btn btn-primary" type="button">Search</button>
	  </span>
	</div>
</form>