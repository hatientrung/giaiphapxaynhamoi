<?php
/*
* Plugin Name: Categories Services Widget
* Author: TrungHa
*/
add_action('widgets_init', 'create_services_widget');
function create_services_widget(){
    register_widget('Services_Widget');
}
class Services_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
                'services_widget',
                'Services Widget',
                array('description'=> 'Services location')
                );
        
    }
    function widget($args, $instance) {
        //parent::widget($args, $instance);
        include "services/show_services.php";
    }
}
?>