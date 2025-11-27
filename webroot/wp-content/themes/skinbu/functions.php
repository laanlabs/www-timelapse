<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<div id="box"><h2>',
        'after_title' => '</h2>',
    ));
?>