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
        $link = get_term_link( esc_attr($instance['category']) , 'product_cat' );
        // outputs the content of the widget
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            // Get Title
            echo '<div class="gach_ngang"></div>';
            echo '<a class="widget_category_title" href='.$link.' style="text-decoration: none">' . $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'] . '</a>';
            echo '<div class="gach_ngang"></div>';
        }
        $args = array('post_type' => 'product', 'posts_per_page' => esc_attr($instance['post_number']), 'product_cat' => esc_attr($instance['category']));
        $loop = new WP_Query($args);

        /**
         * Description.
         */
        $args = array(
            'taxonomy' => 'product_cat',
            'slug' => 'thiet-ke-nha',
        );
        $terms = get_terms('product_cat', $args);
        $count = count($terms);
        if ($count > 0) {
            foreach ($terms as $term) {
                $description = $term->description;
                $pieces = explode(" ", $description);
                $first_part = implode(" ", array_splice($pieces, 0, 100));
                echo '<div class="st_description_category">' . $first_part . '</div>';
            }

        }

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
        echo '<div class="MBTreadmore"><a href='.$link.'>xem thêm...</a></div></ul></div>';
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
        $default= array(
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
                foreach ($categories as $cat) { ?>
                    <option <?php selected($instance['category'], $cat->slug ); ?> value='<?php echo esc_attr($cat->slug); ?>'>
                        <?php echo $cat->name; ?>
                    </option>
                <?php }
                ?>
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
