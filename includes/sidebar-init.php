<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebar(array('name' => 'Sidebar Full Width', 'id' => 'sidebar-1', 'before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array('name' => 'Sidebar Sub Column Left', 'id' => 'sidebar-2', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_title">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'Sidebar Sub Column Right', 'id' => 'sidebar-3', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget_title">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'Sidebar Navigation Right', 'id' => 'sidebar-4', 'before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));

}

add_action( 'init', 'the_widgets_init' );


    
?>