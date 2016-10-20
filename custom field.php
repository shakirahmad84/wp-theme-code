<?php
    $product    =   new WP_Query(array(
        'post_type'     =>  'ebit_product',
        'posts_per_page'=>  3,
    ));
    if($product->have_posts()) : while($product->have_posts()) : $product->the_post();

    $mobile = get_post_meta( get_the_ID(), 'mobile_number', true );  // custom fields
    $email  = get_post_meta( get_the_ID(), 'email', true );          // custom fields
?>

    <h2><?php the_title(); ?></h2>
    <?php echo $mobile; ?>                                            // custom fields
    <?php echo $email; ?>                                             // custom fields
    <?php the_post_thumbnail( 'post-thumb' ); ?>
    <?php the_excerpt(); ?>

<?php endwhile; endif; ?>