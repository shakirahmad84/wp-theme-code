<?php

/*--------------------------------------------------------------
01.0 - Theme information and screenshot.png
--------------------------------------------------------------*/
#Create style.css file and write below comments.
/*
Theme Name: Theme Name
Theme URI: https://example.org/themes/themename/
Author: the Example team
Author URI: https://example.org/
Description: Our 2015 default theme is clean, blog-focused, and designed for clarity. Version: 1.3
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: black, blue, gray, pink, purple, white, yellow, dark, ustom-background
Text Domain: themename
*/

#Create a image & name it screenshot.png
Addone of FireFox: "Awesome Screenshot" for full page screenshot
Width   = 1200 px
height  = 900 px

/*--------------------------------------------------------------
04.0 - Header.php
--------------------------------------------------------------*/
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> // For dynamic Logo
<?php bloginfo( 'description' ); ?>

/*--------------------------------------------------------------
07.0 - Enqueue css and js
--------------------------------------------------------------*/
<?php
function styles_scripts() {
	
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
  wp_enqueue_style('stylesheet', get_stylesheet_uri());
  
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
  
}
add_action( 'wp_enqueue_scripts', 'styles_scripts' );
?>

<?php wp_enqueue_style( $handle, $src, $deps, $ver, $media); ?>
<!--
$handle  = a unique name of file
$src     = location of file
$deps    = array on which file will be depended
$ver     = version of file
$medie   = in which media will be shown
-->
<?php wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer); ?>
<!--
$in_footer = true will show in footer and false in header
-->

<?php //if you want to put any js code after all script use below function & keep code in this function
function footer_extra_script() { ?>
    <script> 
        new WOW().init(); 
    </script>
<?php
}
add_action('wp_footer', 'footer_extra_script', 30);
?>
/*--------------------------------------------------------------
03.0 - Theme Features
--------------------------------------------------------------*/
List of Features
1.  Content Width
2.  Automatic Feed Links
3.  Custom Backgrounds
4.  Custom Headers
5.  Post Thumbnails
6.  Post Formats
7.  Title Tag
8.  Editor Style
9.  Theme Markup
10. Theme Logo
11. Sidebars
12. Navigation Menus

<?php  // Content Width - 1
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
?>

<?php // Custom Backgrounds - 3
add_theme_support( 'custom-background' );

// using args
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );
    
$args = array(
	'default-color' => '000000',
	'default-image' => '%1$s/images/background.jpg',
);
add_theme_support( 'custom-background', $args );
    
?>
<?php  // Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );
?>
<?php // Custom Header - 4
in function.php
$custom_header_args = array(
    'default-image'          => get_template_directory_uri() . 'img/default-image.jpg',
    'random-default'         => false,
    'width'                  => 1000,
    'height'                 => 250,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '000',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header_args );
//    'flex-height' => true, and 'flex-width'  => true, will let the user skip the cropping step when they upload a new photo.
//     'header-text' => false will remove the header text and the option to toggle it.

// write below code in template to show header image
<img alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>">
?>

/*--------------------------------------------------------------
03.0 - Post Formats
--------------------------------------------------------------*/
<?php add_theme_support( $feature, $arguments ); ?>
<?php
    
$args = array(
    ...
    'supports' => array('title', 'editor', 'author', 'post-formats')
); 
register_post_type('book', $args);


// in your theme single.php, page.php or custom post type
if ( has_post_format( 'quote' ) ) {
	echo 'This is a quote.';
}

the_post_thumbnail();

if ( has_post_thumbnail() ) {
	the_post_thumbnail();
}

?>
<?php
function custom_theme_setup() {
    
	add_theme_support( $feature, $arguments );     // Example For Every Theme Support
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );  // Support Various Post Format
    add_post_type_support( 'page', 'post-formats' );    // add post-formats to post_type 'page'
    add_post_type_support( 'my_custom_post_type', 'post-formats' ); // add post-formats to post_type 'my_custom_post_type'
    add_theme_support( 'title-tag' );               // Add Site Title In Browser Header
    add_theme_support( 'automatic-feed-links' );    // Show RSS & Feed Links
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) ); // Support Specific HTML5 Tag 
    add_theme_support( 'html5' );                   // Support All HTML5 Tag 
    add_theme_support( 'custom-logo' );             // Support Custom Logo
    add_theme_support( 'custom-logo', array(        // Support Custom Logo With Various Argument
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    add_theme_support( 'custom-header' );           // Support Custom Header
    add_theme_support( 'custom-header', $defaults );// Support Custom Header With Various Argument
    $defaults = array(
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
    );
    
    add_theme_support( 'custom-background' );           // Support Custom Background
    add_theme_support( 'custom-background', $defaults );// Support Custom Background With Various Arguments
    $defaults = array(
        'default-color'          => '',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
    add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
    add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
?>
/*--------------------------------------------------------------
03.0 - Custom Headers
--------------------------------------------------------------*/
<?php
function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );
?>

<!--Show Custom Header Image-->
<img alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
    
<?php
$defaults = array(
    'default-image'          => '',     // set default image
    'random-default'         => false,
    'width'                  => 0,      // set width for crop          
    'height'                 => 0,      // set height for crop
    'flex-height'            => false,  // true will allow to upload image without crop
    'flex-width'             => false,  // true will allow to upload image without crop
    'default-text-color'     => '',     // 
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
?>

/*--------------------------------------------------------------
03.0 - Image Dynamic
--------------------------------------------------------------*/
<?php
// functions.php
add_theme_support('post-thumbnails');
add_image_size('post-thumb', 600, 400, false );
add_image_size( $name, $width = 0, $height = 0, $crop = false );
?>

<?php // call above function by below code to show images with param(size)
the_post_thumbnail('post-thumb'); 
?>

<?php // call thumbnail image in HTML src to keep css classes well in img HTML tag 
if (have_posts()) :
   while (have_posts()) :
      the_post(); 
        $page_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

        <div class="row container-kamn"> 
            <img src="<?php echo $page_thumb[0]; ?>" width="100%" class="blog-post" alt="Feature-img" align="right"> 
        </div>
        
    <?php
   endwhile;
endif;
?>

<?php
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}?>
/*--------------------------------------------------------------
04.0 - Default theme functions and features.
--------------------------------------------------------------*/
<?php
if ( ! function_exists( 'twentyfifteen_setup' ) ) :
function twentyfifteen_setup() {
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    add_image_size('post-thumb', 250, null, false );
    add_image_size('single-post-thumb', 400, null, false );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );
    
    register_nav_menus( array(
    'primary' => __( 'Primary Menu',      'twentyfifteen' ),
    'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
    ) );
    
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'twentyfifteen_setup' );
?>
/*--------------------------------------------------------------
05.0 - Footer.php
--------------------------------------------------------------*/
<p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></p>
            
<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
            
<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a>

/*--------------------------------------------------------------
05.0 - Register menu
--------------------------------------------------------------*/
<?php // write below code in function.php file under after_setup_theme hook
function register_menus() {
  if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
      'primary_menu'  => 'Primary Menu',
      'footer_menu'   => 'Footer Menu',
    ));
  }
}
add_action( 'after_setup_theme', 'register_menus' );
// write below code in functions.php to show menu as pages with current theme style when won't set menu
function moderna_fallback() {
  echo '<ul class="nav navbar-nav">';
  if ('page' !=get_option('show_on_front')) {
    echo '<li><a href=" ' . home_url( '/') . ' ">Home</a></li>';
  }
  wp_list_pages('title_li=');
  echo '</ul>';
}
// write below code where you want to show menu
  if (function_exists('wp_nav_menu')) {
    wp_nav_menu( array(
      'theme_location'		    => 'primary_menu',  	// Menu Name which is array key in function
      'container'				=> '',	                // Remove default DIV
      'menu_class'				=> 'nav navbar-nav',	// classes of <ul>
      'fallback_cb'				=> 'moderna_fallback',  // fallback functin name
      ));
    }
?>
/*--------------------------------------------------------------
03.0 - Archive.php
--------------------------------------------------------------*/
<?php
    if(have_posts){
        
        if( is_day() ){
            echo "Day Archive";
        }elseif( is_month() ){
            echo "Month Archive";
        }else( is_year() ){
            echo "Year Archive";
        }
        
        while(have_posts){
            the_post();
?>


<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>   
 
<?php
        }
    } else {
        echo "No post found";
    }
?>

/*--------------------------------------------------------------
03.0 - Service Item
--------------------------------------------------------------*/
<?php
function office_master_custom_post(){    
    register_post_type('service', array(
        'labels'      =>array(
            'name'          => 'Main Service',
            'menu_name'     => 'Services',
            'all_items'     => 'All Services',
            'add_new'       => 'Add New Service',
            'add_new_item'  => 'Add New Service Item'
        ),
        'public'    => true,
        'supports'  => array(
            'title', 'revisions', 'custom-fields', 'page-attributes'
        )
    ));
}
add_action('init', 'office_master_custom_post');
?>
<?php   // Service Item
$service = null;
$service = new WP_Query(array(
'post_type'         => 'service',
'posts_per_page'    => 6,
'order'             =>  'ASC'
));

if ($service->have_posts())  {
while($service->have_posts()){
$service->the_post();
$service_icon =         get_post_meta(get_the_ID(), 'service_icon',         true);
$service_description =  get_post_meta(get_the_ID(), 'service_description',  true);
$service_link_url =     get_post_meta(get_the_ID(), 'service_link_url',     true);
$service_link_title =   get_post_meta(get_the_ID(), 'service_link_title',   true);
$animation_type =       get_post_meta(get_the_ID(), 'animation_type',       true);
?>

    <!-- Begin Service item -->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="services-group wow animated <?php echo $animation_type; ?>" data-wow-offset="40">
            <p class="services-icon"><span class="fa <?php echo $service_icon; ?> fa-5x"></span></p>
            <h4 class="services-title"><?php the_title(); ?></h4>
            <p class="services-body"><?php echo $service_description; ?></p>
            <p class="services-more"><a href="<?php echo $service_link_url; ?>"><?php echo $service_link_title; ?></a></p>
        </div>
    </div>
    <!-- End Service item -->

    <?php
}
}  else {
"No Service Item";
}
wp_reset_postdata();
?>             

/*--------------------------------------------------------------
06.0 - Register widgets
--------------------------------------------------------------*/
<?php
function register_widgets() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_widgets' );

    
<?php 
    if (!dynamic_sidebar( 'sidebar-1' )) {
        echo "Set Sidebar";
    }
?>


/*--------------------------------------------------------------
08.0 - loop
--------------------------------------------------------------*/
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        ... Display post content
    <?php endwhile; ?>
<?php endif; ?>
<!-- First -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    ... Display post content
<?php endwhile; endif; ?>
<!-- Second -->

<?php
    get_header();
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
    endif;
    get_sidebar();
    get_footer(); 
?>
<!-- Third -->

<!-- Codex Loop Start -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <h2 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
        <div class="entry">
            <?php the_content('Read the rest of this entry &raquo;'); ?>
        </div>
        <p class="postmetadata">
            Posted in
            <?php the_category(', ') ?><strong>|</strong>
            <?php edit_post_link('Edit','','<strong>|</strong>'); ?>
            <?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?>
        </p>
        <!--
            <?php trackback_rdf(); ?>
            -->
    <?php endwhile; ?>
        <div class="navigation">
            <div class="alignleft">
                <?php previous_posts_link('&laquo; Previous Entries') ?>
            </div>
            <div class="alignright">
                <?php next_posts_link('Next Entries &raquo;','') ?>
            </div>
        </div>
    <?php else : ?>
        <h2 class="center">Not Found</h2>
        <p class="center">
            <?php _e("Sorry, but you are looking for something that isn't here."); ?>
        </p>
    <?php endif; ?>
<!-- Codex Loop End -->

<?php the_post_thumbnail(); ?>
<?php the_excerpt(); ?>
/*--------------------------------------------------------------
08.0 - Register Slider
--------------------------------------------------------------*/
<?php  // Register Slider
    function register_slider_for_theme(){
        register_post_type('slider', array(
        'labels'      =>array(
        'name'          => 'Main Slider',
        'menu_name'     => 'Slider Menu',
        'all_items'     => 'All Slider',
        'add_new'       => 'Add New Slide',
        'add_new_item'  => 'Add New Slide Item'
        ),
        'public'    => true,
        'supports'  => array(
        'title', 'thumbnail', 'revisions', 'custom-fields'
        )
        ));
    }
    add_action('init', 'register_slider_for_theme');
?>

<?php  // Set Slider Image Size
    add_theme_support( 'post-thumbnails' );
    add_image_size('slide_img_size', 1500, 500, true);
?>

// Show Slider
    <div class="carousel-inner">

        <?php   // Show Slider
        $slider = null;
        $slider = new WP_Query(array(
            'post_type'         => 'slider',
            'posts_per_page'    => 3
        ));

        if ($slider->have_posts())  {
            $x = 0;
            while($slider->have_posts()){
                $x++;
                $slider->the_post();

                $slider_caption = get_post_meta(get_the_ID(), 'slider_caption', true);

                ?>

                <!-- Begin Slide item -->
                <div class="item <?php if($x==1){ echo 'active';} ?>">
                    <?php the_post_thumbnail( 'slide_img_size' ); ?>
                    <div class="carousel-caption">
                        <h3 class="carousel-title hidden-xs"><?php the_title(); ?></h3>
                        <p><?php echo $slider_caption; ?></p>
                    </div>
                </div>
                <!-- End Slide item -->

                <?php
            }
        }  else {
            "No Slider";
        }
        wp_reset_postdata();
        ?>

    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators visible-lg">
        <?php
        for($i=0; $i<$x; $i++){ ?>
            <li data-target="#carousel-1" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo"active";} ?>"></li>
            <?php
        }
        ?>
    </ol>
/*--------------------------------------------------------------
09.0 - Register custom post
--------------------------------------------------------------*/
<?php  // Add below code to functions.php to register custom post
function ebit_custom_posts(){
    register_post_type('ebit_product', array(
        'labels'      =>array(
            'name'          => 'Ebit Products',
            'menu_name'     => 'Ebit Menu',
            'all_items'     => 'Ebit all Products',
            'add_new'       => 'Add New Product',
            'add_new_item'  => 'Add New ebit Product'
        ),
        'public'    => true,
        'supports'  => array(
            'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes'
        )
    ));
}
add_action('init', 'ebit_custom_posts'); 
?>

<?php   // Show custom post
    $ebit_post = null;
    $ebit_post = new WP_Query(array(
    'post_type'         => 'ebit_product',
    'posts_per_page'    => 5
    ));
    
    if ($ebit_post->have_posts()) {
    while($ebit_post->have_posts()){
        $ebit_post->the_post();
        
        $mobile = get_post_meta(get_the_ID(), 'mobile_number', true);
        $email = get_post_meta(get_the_ID(), 'email_id', true);
?>

<div class="singel_post" style="margin:10px; border:2px solid red">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
 <?php the_content(); ?>
        
 <h3>Mobile : <?php echo $mobile; ?></h3>
 <h3><?php echo $email; ?></h3>
  </div>
  
<?php        
    }
}  else {
    "No post";
}
wp_reset_postdata();
?>



<?php register_post_type( $post_type, $args ); ?>
<?php
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' 'author', 'excerpt', 'comments' )
	);

	register_post_type( 'book', $args );
}
add_action( 'init', 'codex_book_init' );
?>
/*--------------------------------------------------------------
10.0 - WP_Query
--------------------------------------------------------------*/
    
    
/*--------------------------------------------------------------
11.0 - Post Query by specific category
--------------------------------------------------------------*/
    
    
/*--------------------------------------------------------------
12.0 - Search Form
--------------------------------------------------------------*/
<?php get_search_form(); ?>  // To get default wordwrap search form
<?php add_theme_support('html5'); ?> // for support html5 to the form add to function.php file
<h2><?php printf('Search Result for : %s', get_search_query() ); ?></h2> // To show your search keyword use above code out of loop
/*--------------------------------------------------------------
13.0 - Pagination
--------------------------------------------------------------*/
<?php
the_posts_pagination( array(
  'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
  'next_text'          => __( 'Next page', 'twentyfifteen' ),
  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
) );
?>
/*--------------------------------------------------------------
14.0 - Contact form
--------------------------------------------------------------*/
/*--------------------------------------------------------------
15.0 - Framework
--------------------------------------------------------------*/
/*--------------------------------------------------------------
16.0 - Shortcode
--------------------------------------------------------------*/
/*--------------------------------------------------------------
17.0 - Custom fields
--------------------------------------------------------------*/
/*--------------------------------------------------------------
18.0 - Custom metabox
--------------------------------------------------------------*/
/*--------------------------------------------------------------
19.0 - Customizer API
--------------------------------------------------------------*/
/*--------------------------------------------------------------
20.0 - Settings API
--------------------------------------------------------------*/
/*--------------------------------------------------------------
21.0 - Custom taxonomy
--------------------------------------------------------------*/
/*--------------------------------------------------------------
22.0 - Translate wordpress dashboard
--------------------------------------------------------------*/
/*--------------------------------------------------------------
23.0 - Translate wordpress theme
--------------------------------------------------------------*/
/*--------------------------------------------------------------
24.0 - WPMU
--------------------------------------------------------------*/
/*--------------------------------------------------------------
24.0 - redux-frameword
--------------------------------------------------------------*/
<?php
1.  Extract in inc folder
2.  Delete All without below 2 Folders & 3 Files
    ReduxCore
    sample
    class.redux-plugin.php
    index.php
    redux-framework.php
    
3.  add below code to functions.php file
    require_once( 'inc/redux-framework-master/redux-framework.php' );
    require_once( 'inc/redux-framework-master/sample/sample-config.php' );

4.  cut barebones-config.php from sample file to inc folder & rename it & change to functions.php
    require_once( 'inc/redux-framework-master/redux-framework.php' );
    require_once( 'inc/barebones-config.php' );
    
5.  write below code to redux file for logo image:

Redux::setSection($opt_name, array(
    'id'        =>  'header_options',
    'title'     =>  'Header Options',
    'desc'      =>  'This is header option',
    'icon'      =>  'el el-home-alt',
));

Redux::setSection($opt_name, array(
    'id'        =>  'header_sub_options',
    'title'     =>  'Logo Options',
    'subsection'=>  true,
    'fields'    =>  array(
        array(
            'id'    =>  'site_logo',
            'title' =>  'Site Logo',
            'url'   =>  true,
            'desc'  =>  'Upload Your Logo',
            'type'  =>  'media',
            'default'=> array(
                'url'   =>  get_template_directory_uri().'/img/logo.png'
            )
        )
    )
));

// Show Logo
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    <img src="<?php global $office_master; echo $office_master['site_logo']['url']; ?>" alt="">
</a>




?>