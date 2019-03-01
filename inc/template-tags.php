<?php

if ( ! function_exists( 'theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'theme' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'theme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function theme_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'theme' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function theme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'theme' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'theme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'theme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail d-flex flex-column justify-content-center mb-3">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


function bootstrap_breadcrumb() {
    global $post;
    
    $html = '<ol class="breadcrumb">';
    
    if ( (is_front_page()) || (is_home()) ) {
      $html .= '<li class="breadcrumb-item active">Home</li>';
    }
    
    else {
      $html .= '<li class="breadcrumb-item"><a href="'.esc_url(home_url('/')).'">Home</a></li>';
      
      if ( is_attachment() ) {
        $parent = get_post($post->post_parent);
        $categories = get_the_category($parent->ID);
        
        if ( $categories[0] ) {
          $html .= custom_get_category_parents($categories[0]);
        }
        
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a></li>';
        $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
      }
      
      elseif ( is_category() ) {
        $category = get_category( get_query_var( 'cat' ) );
        
        if ( $category->parent != 0 ) {
          $html .= custom_get_category_parents( $category->parent );
        }
        
        $html .= '<li class="breadcrumb-item active">' . single_cat_title( '', false ) . '</li>';
      }
      
      elseif ( is_page() && !is_front_page() ) {
        $parent_id = $post->post_parent;
        $parent_pages = array();
        
        while ( $parent_id ) {
          $page = get_page($parent_id);
          $parent_pages[] = $page;
          $parent_id = $page->post_parent;
        }
        
        $parent_pages = array_reverse( $parent_pages );
        
        if ( !empty( $parent_pages ) ) {
          foreach ( $parent_pages as $parent ) {
            $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent->ID ) ) . '">' . get_the_title( $parent->ID ) . '</a></li>';
          }
        }
        
        $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
      }
      
      elseif ( is_singular( 'post' ) ) {
        $categories = get_the_category();
        
        if ( $categories[0] ) {
          $html .= custom_get_category_parents($categories[0]);
        }
        
        $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
      }
      
      elseif ( is_tag() ) {
        $html .= '<li class="breadcrumb-item active">' . single_tag_title( '', false ) . '</li>';
      }
      
      elseif ( is_day() ) {
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'm' ) . '</a></li>';
        $html .= '<li class="breadcrumb-item active">' . get_the_time('d') . '</li>';
      }
      
      elseif ( is_month() ) {
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
        $html .= '<li class="breadcrumb-item active">' . get_the_time( 'F' ) . '</li>';
      }
      
      elseif ( is_year() ) {
        $html .= '<li class="breadcrumb-item active">' . get_the_time( 'Y' ) . '</li>';
      }
      
      elseif ( is_author() ) {
        $html .= '<li class="breadcrumb-item active">' . get_the_author() . '</li>';
      }
      
      elseif ( is_search() ) {
        
      }
      
      elseif ( is_404() ) {
        
      }
      
    }
    
    $html .= '</ol>';
    
    echo $html;
  }