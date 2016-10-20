<?php

load_theme_textdomain( 'text-domain', get_template_directory() . '/languages' );

if (function_exists('register_nav_menus')){
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'theme-slug' ),
      'extra-menu' => __( 'Extra Menu', 'theme-slug' )
    )
  );  
}



if(function_exists('wp_nav_menu')){
    wp_nav_menu(array(
        'theme_location'    =>  'header-menu',
    ));
}  