<?php
http://reduxframework.github.io/docs.redux.io/getting-started/
https://docs.reduxframework.com/category/core/fields/

1. download redux framework from github
2. Delete all without below 2 folders & 4 files
    1. ReduxCore 
    2. sample 
    3. class.redux-plugin.php
    4. index.php
    5. license.txt
    6. redux-framework.php 
3. Add below code to functions.php

	require_once( 'lib/redux/ReduxCore/framework.php' );
	require_once( 'lib/redux/sample/config.php' );

4. Define fields
        Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Options', 'redux-framework-demo' ),
        'desc'             => __( 'You may modify footer options from here', 'redux-framework-demo' ),
        'id'               => 'basic-Text',
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text-example',
                'type'     => 'text',
                'title'    => __( 'Copyright Info', 'redux-framework-demo' ),
                'subtitle' => __( 'Chenge copyright information', 'redux-framework-demo' ),
                'desc'     => __( 'Write Your copyright information', 'redux-framework-demo' ),
                'default'  => 'All Right Reserved',
            ),
        )
    ) );
    

5. Call in your theme like below
<?php 
global $redux_demo;
echo $redux_demo['text-example'];               
?>
