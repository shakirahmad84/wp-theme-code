<?php

function read_more($limit){
    $content = explode( ' ', get_the_content() );
    $less_con = array_slice( $content, 0, $limit );
    echo implode( ' ',  $less_con);
}
?>

<?php while(have_posts()) : the_post(); ?>
    <article>
        <?php the_post_thumbnail(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="info">By <?php the_author(); ?> on <?php the_time('F d, Y'); ?> with <?php comments_popup_link(); ?></div>
        <p><?php read_more(20); ?></p>
    </article>
<?php endwhile; ?>