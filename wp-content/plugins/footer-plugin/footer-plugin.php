<?php
/*
* Plugin Name: Footer Plugin
* Author: TrungHa
*/
add_action('widgets_init', 'create_footer_widget');
function create_footer_widget(){
    register_widget('Footer_Widget');
}
class Footer_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
                'footer_widget',
                'Footer Widget',
                array('description'=> 'Footer plugin')
                );
        
    }
    function widget($args, $instance) {
        //parent::widget($args, $instance);
        include "include/show_footer.php";
    }
}
?>