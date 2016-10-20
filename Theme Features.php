<?php
add_theme_support( $feature, $arguments );     // Example For Every Theme Support

// Content Width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5' );
add_theme_support('post-thumbnails');

add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );
// Output custom logo: 
if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}

add_theme_support( 'custom-header', array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
    )
);
// Show Custom Header Image
<img alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
    
add_theme_support( 'custom-background', array(
        'default-color'          => '',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    ) 
);




