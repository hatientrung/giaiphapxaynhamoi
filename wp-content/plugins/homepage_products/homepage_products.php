<?php
/**
 * Plugin Name: Widget Product Display
 * Author: BestVuTru
 */
add_action('widgets_init', function () {
    register_widget('Widget_Product_ThietKe_Nha');
});

/**
 * Class Widget_Product_ThietKe_Nha
 */
class Widget_Product_ThietKe_Nha extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'wid_thieket_nha',
            'description' => 'Hiển Thị Product',
        );

        parent::__construct('wid_thieket_nha', 'Product Display', $widget_ops);
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $link = get_term_link(esc_attr($instance['category']), 'product_cat');
        // outputs the content of the widget
        echo $args['before_widget'];

        if ($instance['category'] == 'Đội Ngũ') {
            // Get Title
            $page = get_page_by_title($instance['category'], OBJECT, 'post');
            $post_id = get_post($page->ID);
            // Get Introduce
            $string = get_post_field('post_content', $post_id);
            $final_string = substr( $string, strpos($string, "h1>") + 3);
            echo '<div class="gach_ngang"></div>';
            echo '<a class="doingu_vattu_title" href=' . get_permalink( $post_id ) . ' 
            style="text-decoration: none"><h1>'. $instance['category'] .'</h1></a>';
            echo '<div class="gach_ngang"></div>';
            echo '<div class="doingu_vattu">


                    <div class="doingu_vattu_content">'.
                        wp_trim_words( $final_string , $num_words = 250, $more = '...' )
                    .'</div>
                    <div class="MBTreadmore">
                        <a href=' .  get_permalink( $post_id ) . '>xem thêm...</a>
                    </div>
                    <div class="doingu_vattu_image">
                       '.  get_the_post_thumbnail( $post_id ) .'
                    </div>
                </div>';
        }
        else if ($instance['category'] == 'Sửa chữa') {
            // Get Title
            $page = get_page_by_title($instance['category'], OBJECT, 'post');
            $post_id = get_post($page->ID);
            // Get Introduce
            $string = get_post_field('post_content', $post_id);
            $final_string = substr( $string, strpos($string, "h1>") + 3);
            echo '<div class="gach_ngang"></div>';
            echo '<a class="doingu_vattu_title" href=' . get_permalink( $post_id ) . ' 
            style="text-decoration: none"><h1>'. $instance['category'] .'</h1></a>';
            echo '<div class="gach_ngang"></div>';
            echo '<div class="doingu_vattu">
                    <div class="doingu_vattu_content">'.
                wp_trim_words( $final_string , $num_words = 250, $more = '...' )
                .'</div>
                    <div class="MBTreadmore">
                        <a href=' .  get_permalink( $post_id ) . '>xem thêm...</a>
                    </div>
                    <div class="doingu_vattu_image">
                       '.  get_the_post_thumbnail( $post_id ) .'
                    </div>
                </div>';
            echo '<div class="gach_ngang"></div>';
            echo '<p href=""><h1 class="video_show"> Video Tham Khao </h1></p>';
            echo '<div class="gach_ngang"></div>';
            echo do_shortcode( '[tnt_video_list id=1]' );
        }
        else if (!empty($instance['title'])){
            // Get Title
            echo '<div class="gach_ngang"></div>';
            echo '<a class="widget_category_title" href=' . $link . ' style="text-decoration: none">' . $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'] . '</a>';
            echo '<div class="gach_ngang"></div>';

            $args = array('post_type' => 'product', 'posts_per_page' => esc_attr($instance['post_number']), 'product_cat' => esc_attr($instance['category']));
            $loop = new WP_Query($args);
            //Show Products.
            echo '<div><ul class="st_show_product_home_page">';
            while ($loop->have_posts()) : $loop->the_post();
                echo '
                        <li>
                            <a href="' . get_permalink() . '">
                                ' . woocommerce_get_product_thumbnail() . '
                            </a>
                            <a class="st_title" href="' . get_permalink() . '">
                                <span class="st_post_title">
                                    ' . get_the_title() . '
                                </span>
                            </a>
                        </li>
            ';
            endwhile;
            //Button readmore.
            echo '<div class="MBTreadmore"><a href=' . $link . '>xem thêm...</a></div></ul></div>';
        }
        
        echo $args['after_widget'];
    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        // outputs the options form on admin
        $default = array(
            'title' => 'Tên hiển thị',
            'category' => '',
            'post_number' => '8',
            'product_link' > ''
        );
        //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định
        $instance = wp_parse_args((array)$instance, $default);

        // init value
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'text_domain');
        $post_number = esc_attr($instance['post_number']);
        ?>

        <!--         Title-->

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Tiêu Đề:'); ?> <br/></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p><p></p>

        <!--        Number of post-->

        <p>
            <label
                for="<?php echo $this->get_field_id('post_number'); ?>"><?php _e('Số Bài Viết Hiển Thị ( 4, 8, 12)'); ?>
                <br/></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>"
                   name="<?php echo $this->get_field_name('post_number'); ?>" type="text"
                   value="<?php echo esc_attr($post_number); ?>">
        </p><p></p>

        <!--        Category-->
        <p>

            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Lựa Chọn Danh Mục:'); ?> <br/></label>
            <select id="<?php echo $this->get_field_id('category'); ?>"
                    name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">
                <?php
                $args = array('taxonomy' => 'product_cat');
                $categories = get_terms('product_cat', $args);
                ?>
                <?php
                foreach ($categories as $cat) { ?>
                    <option <?php selected($instance['category'], $cat->slug); ?>
                        value='<?php echo esc_attr($cat->slug); ?>'>
                        <?php echo $cat->name; ?>
                    </option>
                <?php } ?>

                <?php
                $titles = array('Đội Ngũ', 'Sửa chữa');
                foreach ($titles as $title) {
                    $page = get_page_by_title($title, OBJECT, 'post');
                    $post_id = get_post($page->ID);
                    $title = $post_id->post_title; ?>
                    <option <?php selected($instance['category'], $title); ?> value='<?php echo $title ?>'>
                        <?php echo $title ?>
                    </option>
                <?php } ?>
            </select>
        <hr/>
        </p>

        <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        foreach ($new_instance as $key => $value) {
            $updated_instance[$key] = sanitize_text_field($value);
        }

        return $updated_instance;
    }

}
