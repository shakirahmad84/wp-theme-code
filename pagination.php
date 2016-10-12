Without paramiter without numbarign:
<?php the_posts_navigation(); ?>

With paramiter without numbaring:
<?php the_posts_navigation(array(
    'prev_text'         =>  'PREV',
    'next_text'         =>  'NEXT',
    'screen_reader_text'=> '  ',
)); ?>

Without paramiter with numbering:
<?php the_posts_pagination(); ?>

with paramiter with numbering:

<?php the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => __( 'Newer', 'textdomain' ),
    'next_text' => __( 'Older', 'textdomain' ),
    'screen_reader_text'=>  ' ',
    'before_page_number'=>  '',
    'after_page_number' =>  ''
)); ?>
