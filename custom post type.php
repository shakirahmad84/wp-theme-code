<?php

// Register a custom post type.

function themename_custom_post() {
    
    register_post_type( 'book', array(
        'labels'     => array(
            'name'  =>  'Book',
            'add_new_item' => __( 'Add New Book', 'textdomain' ),
        ),
        'public'    => true,
        'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_position' =>  7,
        'menu_icon'     => 'dashicons-welcome-widgets-menus',
    ) );
    
}
add_action( 'init', 'themename_custom_post' );
?>




<?php 
    // Call custom post type
    $block = new WP_Query(array(
        'post_type'         =>  'zboomservices',
        'posts_per_page'    =>  3,
    ));
?>

<?php while( $block->have_posts()) : $block->the_post(); ?>
    <div class="col-1-3">
        <div class="wrap-col box">
            <h2><?php the_title(); ?></h2>
            <?php read_more(10); ?>
            <div class="more"><a href="<?php the_permalink(); ?>">[...]</a></div>
        </div>
    </div>
<?php endwhile; ?>
