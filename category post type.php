1.  Create a loop

<?php while($national->have_posts()) : $national->the_post(); ?>
    <?php the_title(); ?>
<?php endwhile; ?>

2. Call WP Query
<?php
    $national = new WP_Query(array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'category_name'     =>  $leftcategory,
        'default'           =>  1,
    ));
?>

3. Add to Redux
<?php
    Redux::setSection( $opt_name, array(
        'title'            =>   __( 'News Options', 'redux-framework-demo'),
        'fields'           =>   array(
            array(
                'title'     =>  'Left Section Category',
                'type'      =>  'select',
                'id'        =>  'left-side-category',
                'data'      =>  'category',
            ),
            array(
                'title'     =>  __( 'Right Section Category'),
                'type'      =>  'select',
                'id'        =>  'right-side-categoty',
                'data'      =>  'category',
            ),
        )
    ));
?>

4. Add below code
<?php $leftcategory = get_the_category_by_id($redux_demo['left-side-category']); ?>













5. All Code
<?php $leftcategory = get_the_category_by_id($redux_demo['left-side-category']); ?>

<?php
    $national = new WP_Query(array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'category_name'     =>  $leftcategory,
    ));
?>

<?php while($national->have_posts()) : $national->the_post(); ?>
    <?php the_title(); ?>
<?php endwhile; ?>
<!--First Column-->

<?php $rightcategory = get_the_category_by_id($redux_demo['right-side-categoty']); ?>

<?php
    $international = new WP_Query(array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'category_name'     =>  $rightcategory,
));
?>

<?php while($international->have_posts()) : $international->the_post(); ?>
    <?php the_title(); ?>
<?php endwhile; ?>
<!--Second Column-->

<?php
    Redux::setSection( $opt_name, array(
        'title'            =>   __( 'News Options', 'redux-framework-demo'),
        'fields'           =>   array(
            array(
                'title'     =>  'Left Section Category',
                'type'      =>  'select',
                'id'        =>  'left-side-category',
                'data'      =>  'category',
                'default'   =>  1,
            ),
            array(
                'title'     =>  __( 'Right Section Category'),
                'type'      =>  'select',
                'id'        =>  'right-side-categoty',
                'data'      =>  'category',
                'default'   =>  1,
            ),
        )
    ));
?>