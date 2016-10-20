<?php get_header(); ?>
<?php get_footer(); ?>
<?php echo esc_url( get_template_directory_uri() ); ?>
<?php wp_head(); ?>
<?php body_class(); ?>
<?php wp_footer(); ?>
<?php
function ebit_theme_init(){
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ebit_theme_init' );

function ebit_css_js(){
    wp_enqueue_style( 'ebit-test-style', get_template_directory_uri().'/css/test.css', null, '0.1', 'all');
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), null, '0.1', 'all' );
    
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'ebit-test-script', get_template_directory_uri().'/js/javascript.js', array('jquery'), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'ebit_css_js' );
?>
<header> 
    <h2><a href="<?php echo esc_url( home_url('/' ) ); ?>"><?php bloginfo('name'); ?></a></h2>
</header>