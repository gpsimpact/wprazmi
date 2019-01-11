<?php 
add_filter( 'allowed_block_types', 'wprazmi_allowed_block_types', 10, 2 );
 
function wprazmi_allowed_block_types( $allowed_blocks, $post ) {
 
	$allowed_blocks = array(
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/gallery',
        'core/list',
        'core/quote',
        'core/audio',
        'core/cover-image',
        'core/file',
        'core/video',
        'core/table',
        'core/verse',
        'core/code',
        'core/freeform',
        'core/html',
        'core/preformatted',
        'core/pullquote',
        'core/button',
        'core/text-columns',
        'core/media-text',
        'core/more',
        'core/nextpage',
        'core/separator',
        'core/spacer',
        'core/shortcode',
        'core/archives',
        'core/categories',
        'core/latest-comments',
        'core/latest-posts',
        'core/embed',
        'core-embed/twitter',
        'core-embed/youtube',
        'core-embed/facebook',
        'core-embed/instagram',
        'core-embed/wordpress',
        'core-embed/soundcloud',
        'core-embed/spotify',
        'core-embed/flickr',
        'core-embed/vimeo',
        'core-embed/animoto',
        'core-embed/cloudup',
        'core-embed/collegehumor',
        'core-embed/dailymotion',
        'core-embed/funnyordie',
        'core-embed/hulu',
        'core-embed/imgur',
        'core-embed/issuu',
        'core-embed/kickstarter',
        'core-embed/meetup-com',
        'core-embed/mixcloud',
        'core-embed/photobucket',
        'core-embed/polldaddy',
        'core-embed/reddit',
        'core-embed/reverbnation',
        'core-embed/screencast',
        'core-embed/scribd',
        'core-embed/slideshare',
        'core-embed/smugmug',
        'core-embed/speaker',
        'core-embed/ted',
        'core-embed/tumblr',
        'core-embed/videopress',
        'core-embed/wordpress-tv',
	);
 
	if( $post->post_type === 'page' ) {
		// $allowed_blocks[] = 'core/shortcode';
    };
    
    if ( function_exists( 'wprazmi_cgb_block_assets' ) ) {
        array_push($allowed_blocks, 
            "wprazmi/grid",
            "wprazmi/col-one",
            "wprazmi/col-two",
            "wprazmi/col-three",
            "wprazmi/col-four",
            "wprazmi/col-five",
            "wprazmi/col-six",
            "wprazmi/col-seven",
            "wprazmi/col-eight",
            "wprazmi/col-nine",
            "wprazmi/col-ten",
            "wprazmi/col-eleven",
            "wprazmi/col-twelve"
        );
    };
 
	return $allowed_blocks;
 
}