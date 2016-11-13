<?php
/*
* Plugin Name: List post Home Page
* Author: TrungHa
*/
add_action('widgets_init', 'create_list_post_widget');
function create_list_post_widget(){
    register_widget('List_Post_Home_Widget');
}
class List_Post_Home_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
                'create_list_post_widget',
                'List Post Home Widget',
                array('description'=> 'List Post Home Widget')
                );
        
    }
    function widget($args, $instance) {
        //parent::widget($args, $instance);
        include "include/show_list.php";
    }
}
?>