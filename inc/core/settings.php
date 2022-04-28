<?php
add_action('admin_menu', function () {
    add_menu_page(
        esc_html__('تنظیمات قالب', 'textdomain'),
        esc_html__('تنظیمات قالب', 'textdomain'),
        'jamal_options',
        'jamal-options',
        'prefix_render_admin_menu_page'
    );
});
add_action('cmb2_admin_init', 'jamal_register_theme_options_metabox');
function jamal_register_theme_options_metabox()
{
    $cmb_options = new_cmb2_box(array(
        'id' => 'jamal_option_metabox',
        'title' => esc_html__('عمومی', 'jamal'),
        'object_types' => array('options-page'),
        'option_key' => 'jamal-general', // The option key and admin menu page slug.
        'parent_slug' => 'jamal-options',
    ));
    $shop_options = new_cmb2_box(array(
        'id' => 'jamal_option_shop',
        'title' => esc_html__('تنظیمات فروشگاه', 'jamal'),
        'object_types' => array('options-page'),
        'option_key' => 'jamal_optionsـshop', // The option key and admin menu page slug.
        'parent_slug' => 'jamal-options',
    ));
    $group_header = $cmb_options->add_field(array(
        'id' => 'jamal_header_group',
        'type' => 'group',
        'description' => __('توضیحات هدر', 'cmb2'),
        'repeatable' => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => __('هدر', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => false,
            'closed' => false, // true to have the groups closed by default
        )));
    $group_banner = $cmb_options->add_field(array(
        'id' => 'jamal_banner_group',
        'type' => 'group',
        'description' => __('بنر های سایت', 'cmb2'),
        'repeatable' => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => __('بنر', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => false,
            'closed' => false, // true to have the groups closed by default
        )));
    $cmb_options->add_group_field($group_header, array(
        'name' => 'تصویر لوگو',
        'desc' => 'تصویر لوگوی خود را در این قسمت آپلود کنید',
        'id' => 'logo-header',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text' => array(
            'add_upload_file_text' => 'انتخاب تصویر'
        ),
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => __('رنگ اصلی سایت', 'jamal'),
        'desc' => __('field description (optional)', 'jamal'),
        'id' => 'maincolor',
        'type' => 'colorpicker',
        'default' => '#20cda2',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => __('رنگ ثانویه سایت', 'jamal'),
        'desc' => __('field description (optional)', 'jamal'),
        'id' => 'secondcolor',
        'type' => 'colorpicker',
        'default' => '#eef4f4',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => __('رنگ تخفیف ها', 'jamal'),
        'desc' => __('field description (optional)', 'jamal'),
        'id' => 'offercolor',
        'type' => 'colorpicker',
        'default' => '#ff1e1e',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => 'علاقه مندی ها',
        'id' => 'hedaerfavorit',
        'type' => 'radio_inline',
        'options' => array(
            'on' => __('فعال', 'cmb2'),
            'off' => __('غیر فعال', 'cmb2'),
        ),
        'default' => 'standard',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => 'شماره تلفن',
        'desc' => '0253 - ------',
        'id' => 'phoneheader',
        'type' => 'text',
    ));
    $cmb_options->add_group_field($group_header, array(
        'name' => 'اینستاگرام',
        'desc' => 'https://instagram.com',
        'id' => 'instagramheader',
        'type' => 'text',
    ));
    $cart_message = $shop_options->add_field(array(
        'id' => 'cart_message_options',
        'type' => 'group',
        'description' => __('پیام های صفحه سبد خرید', 'cmb2'),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => __('پیام {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('اضافه کردن پیام جدید', 'cmb2'),
            'remove_button' => __('حذف پیام', 'cmb2'),
            'sortable' => true,
            'closed' => true,
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ));
    $shop_options->add_group_field($cart_message, array(
        'name' => 'متن پیام',
        'desc' => 'پیام ها در بالای سبد خرید نمایش داده میشوند',
        'id' => 'cart_messages',
        'type' => 'wysiwyg',
        'options' => array(),
    ));
    $Slider_rep = $cmb_options->add_field(array(
        'id' => 'slider_slide_options',
        'type' => 'group',
        'description' => __('مدیریت اسلایدر', 'cmb2'),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => __('اسلاید {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('اضافه کردن اسلاید', 'cmb2'),
            'remove_button' => __('حذف اسلاید', 'cmb2'),
            'sortable' => true,
            'closed' => true,
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ));
    $cmb_options->add_group_field($Slider_rep, array(
        'name' => 'تصویر اسلاید',
        'desc' => 'تصویر اسلاید خود را در این قسمت آپلود کنید',
        'id' => 'slide_slider',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text' => array(
            'add_upload_file_text' => 'انتخاب تصویر'
        ),
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ));
    $cmb_options->add_group_field($Slider_rep, array(
        'name' => 'لینک اسلاید',
        'desc' => 'لینک اسلاید روی اسلایدر اعمال میشود',
        'id' => 'slider_link',
        'type' => 'text',
        'options' => array(),
    ));
    $cmb_options->add_group_field($group_banner, array(
        'name' => ' لینک بنر بزرگ وسط',
        'desc' => 'لینک روی بنر اعمال میشود',
        'id' => 'banner1_link',
        'type' => 'text',
        'options' => array(),
    ));
    $cmb_options->add_group_field($group_banner, array(
        'name' => 'تصویر بنر بزرگ وسط',
        'desc' => 'تصویر بنر خود را در این قسمت آپلود کنید',
        'id' => 'banner1_slider',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text' => array(
            'add_upload_file_text' => 'انتخاب تصویر'
        ),
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ));

    $cmb_options->add_group_field($group_banner, array(
        'name' => ' لینک بنر کوچک راست',
        'desc' => 'لینک روی بنر اعمال میشود',
        'id' => 'banner2r_link',
        'type' => 'text',
        'options' => array(),
    ));
    $cmb_options->add_group_field($group_banner, array(
        'name' => 'تصویر کوچک راست',
        'desc' => 'تصویر بنر خود را در این قسمت آپلود کنید',
        'id' => 'banner2r_slider',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text' => array(
            'add_upload_file_text' => 'انتخاب تصویر'
        ),
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ));

    $cmb_options->add_group_field($group_banner, array(
        'name' => ' لینک بنر کوچک چپ',
        'desc' => 'لینک روی بنر اعمال میشود',
        'id' => 'banner3l_link',
        'type' => 'text',
        'options' => array(),
    ));
    $cmb_options->add_group_field($group_banner, array(
        'name' => 'تصویر بنر کوچک چپ',
        'desc' => 'تصویر بنر خود را در این قسمت آپلود کنید',
        'id' => 'banner3l_slider',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text' => array(
            'add_upload_file_text' => 'انتخاب تصویر'
        ),
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ));

}


/**
 * Wrapper function around cmb2_get_option
 * @param string $key Options array key
 * @param mixed $default Optional default value
 * @return mixed           Option value
 * @since  0.1.0
 */
function jamal_get_option($key = '', $default = false)
{
    if (function_exists('cmb2_get_option')) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option('jamal-general', $key, $default);
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option('jamal-general', $default);

    $val = $default;

    if ('all' == $key) {
        $val = $opts;
    } elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
        $val = $opts[$key];
    }

    return $val;
}

function jamal_get_option_shop($key = '', $default = false)
{
    if (function_exists('cmb2_get_option')) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option('jamal_optionsـshop', $key, $default);
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option('jamal_optionsـshop', $default);

    $val = $default;

    if ('all' == $key) {
        $val = $opts;
    } elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
        $val = $opts[$key];
    }

    return $val;
}