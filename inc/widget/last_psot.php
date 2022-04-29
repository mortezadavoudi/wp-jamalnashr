<?php

// Creating the widget
class wpb_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

// Base ID of your widget
            'wpb_widget',

// Widget name will appear in UI
            __('آخرین مطالب جمال', 'wpb_widget_domain'),

// Widget description
            array('description' => __('ابزار اختصاصی نمایش آخرین مطالب جمال', 'wpb_widget_domain'),)
        );
    }

// Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

        ?>
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 4, // Number of recent posts thumbnails to display
                'post_status' => 'publish' // Show only the published posts
            ));
            foreach( $recent_posts as $post_item ) : ?>
                <div class="post_with_thumb">
                        <div class="is-image post-thumb">
                            <a href="<?php echo get_permalink($post_item['ID']) ?>" title="تاثیر هوش مصنوعی بر بازاریابی دیجیتال" rel="bookmark">
                                <?php echo get_the_post_thumbnail($post_item['ID'], 'post-thumbnail'); ?>
                            </a>
                        </div>
                        <div class="inner"><a href="<?php echo get_permalink($post_item['ID']) ?>"><?php echo $post_item['post_title'] ?></a></div>
                </div>
            <?php endforeach; ?>
        <?php

        echo $args['after_widget'];
    }

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('آخرین مطالب', 'wpb_widget_domain');
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

// Class wpb_widget ends here
}

// Register and load the widget
function wpb_load_widget()
{
    register_widget('wpb_widget');
}

add_action('widgets_init', 'wpb_load_widget');