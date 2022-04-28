<?php
require_once get_template_directory() . '/inc/bootstrap-nav.php';
require_once get_template_directory() . '/inc/core/settings.php';
require_once get_template_directory() . '/inc/redux/redux-core/framework.php';
require_once get_template_directory() . '/inc/redux/sample/config.php';

//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/wpc-smart-compare.php';
//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/index.php';
//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/includes/wpc-dashboard.php';
//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/includes/wpc-kit.php';
//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/includes/wpc-menu.php';
//include_once get_template_directory() . '/inc/plugins/woo-smart-compare/includes/wpc-notice.php';
function admin_style()
{
    wp_enqueue_style('adminstyle', get_template_directory_uri() . '/assets/css/adminwpstyle.css', array(), '1.1', 'all');
    wp_enqueue_script('cmb2-conditional', get_template_directory_uri() . '/assets/js/cmb2-conditional.js', ['jquery'], false, true);
}

add_action('admin_enqueue_scripts', 'admin_style');
function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-icon', get_template_directory_uri() . '/assets/css/all.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-icon-brands', get_template_directory_uri() . '/assets/css/brands.min.css', array(), '1.1', 'all');
    wp_enqueue_style('remodal', get_template_directory_uri() . '/assets/css/remodal.css', array(), '1.1', 'all');
    wp_enqueue_style('remodal-theme', get_template_directory_uri() . '/assets/css/remodal-default-theme.css', array(), '1.1', 'all');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], false, true);
    wp_enqueue_script('remodal-js', get_template_directory_uri() . '/assets/js/remodal.min.js', ['jquery'], false, true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], false, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');
add_action('after_setup_theme', 'theme_setup');
function theme_setup(){
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-lightbox' );
//    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
//	add_image_size('blog-home-slider', 317, 191, true, array('top', 'center'));
//	add_image_size('product-home-slider', 195, 195, true, array('top', 'center'));
//	add_image_size('image-single-post', 791, 522, true, array('top', 'center'));
//	add_image_size('image-search-post', 261, 191, true, array('top', 'center'));
//	add_image_size('image-gallery-product', 355, 355, true, array('top', 'center'));
    register_nav_menu('main-menu', 'Main Menu');
    register_nav_menu('mobile-menu', 'Main Menu Mobile');
//	register_sidebar(array(
//		'name' => __('سایدبار پست های وبلاگ', 'textdomain'),
//		'id' => 'sidebar-posts',
//		'description' => __('پست های وبلاگ', 'textdomain'),
//		'before_widget' => '<div id="%1$s" class="sidebarBox %2$s">',
//		'after_widget' => '</div>',
//		'before_title' => '<div class="sidebarTop"><h3 class="sideTitle">',
//		'after_title' => '</h3></div>',
//	));
    register_sidebar(array(
        'name' => __('سایدبار پست های وبلاگ', 'textdomain'),
        'id' => 'sidebar-posts',
        'description' => __('پست های وبلاگ', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="sidebarBox %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebarTop"><h3 class="sideTitle">',
        'after_title' => '</h3></div>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار فروشگاه', 'textdomain'),
        'id' => 'sidebar-shop',
        'description' => __('فروشگاه', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="sidebarBox %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebarTop"><h3 class="sideTitle">',
        'after_title' => '</h3></div>',
    ));
    register_sidebar(array(
        'name' => __('فوتر یک', 'textdomain'),
        'id' => 'footer_one',
        'description' => __('ناحیه فوتر یک', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="col menu-footer-one %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-w-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('فوتر دو', 'textdomain'),
        'id' => 'footer_two',
        'description' => __('ناحیه فوتر دو', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="col menu-footer-one %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-w-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('فوتر سه', 'textdomain'),
        'id' => 'footer_three',
        'description' => __('ناحیه فوتر سه', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="col menu-footer-one %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-w-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('درباره ما فوتر', 'textdomain'),
        'id' => 'footer_about',
        'description' => __('ناحیه درباره ما فوتر', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-w-title">',
        'after_title' => '</div>',
    ));
}

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    global $woocommerce;
    ?>
    <span class="count">
        <span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count), $woocommerce->cart->cart_contents_count); ?></span>
    </span>
    <?php
    $fragments['span.count'] = ob_get_clean();
    return $fragments;
});
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="show-mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.show-mini-cart'] = ob_get_clean();
    return $fragments;
});
function display_discount_percentage()
{
    global $product;
    if (!$product->is_on_sale()) return;
    if ($product->is_type('simple')) {
        $max_percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
    } elseif ($product->is_type('variable')) {
        $max_percentage = 0;
        foreach ($product->get_children() as $child_id) {
            $variation = wc_get_product($child_id);
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ($price != 0 && !empty($sale)) $percentage = ($price - $sale) / $price * 100;
            if ($percentage > $max_percentage) {
                $max_percentage = $percentage;
            }
        }
    }
    if ($max_percentage > 0) echo round($max_percentage) . '%';
}
// To change add to cart text on single product page
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
//function woocommerce_custom_single_add_to_cart_text() {
//    return __( 'Buy Now', 'woocommerce' );
//}
// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
function woocommerce_custom_product_add_to_cart_text() {
    return '';
}
//add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
//function custom_add_to_cart_message() {
//    global $woocommerce;
//    $return_to  = get_permalink(woocommerce_get_page_id('shop'));
//    $message    = sprintf('<a href="%s" class="button pup wc-forwards">%s</a> %s', $return_to, __('Continue Shopping', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
//    return $message;
//}
//function change_js_view_cart_button( $params, $handle )  {
//    if( 'wc-add-to-cart' !== $handle ) return $params;
//    // Changing "view_cart" button text and URL
//    $params['i18n_view_cart'] = '<div class="sadsad">sdfsfsdf</div>'; // Text
//    return $params;
//}
//add_filter( 'woocommerce_get_script_data', 'change_view_cart_link', 10, 2 );
function change_view_cart( $params, $handle )
{
    switch ($handle) {
        case 'wc-add-to-cart':
            $params['i18n_view_cart'] = ''; //chnage Name of view cart button
            break;
    }
    return $params;
}
add_filter( 'woocommerce_get_script_data', 'change_view_cart',10,2 );
add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

add_action( 'woocommerce_before_add_to_cart_quantity', 'insertcart_display_quantity_minus' );
function insertcart_display_quantity_minus() {
    echo '<div class="plus-minus">';
    echo '<div class="increase items fal fa-plus"></div>';
    echo '<div class="reduced items fal fa-minus"></div>';
    echo '</div>';
}
add_action( 'wp_footer', 'insertcart_add_cart_quantity_plus_minus' );
function insertcart_add_cart_quantity_plus_minus() {
// Only run this on the single product page
    if ( ! is_product() ) return;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('form.cart').on( 'click', 'div.increase, div.reduced', function() {
// Get current quantity values
                var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                if ( $( this ).is( '.increase' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }}
            });
        });
    </script>

<?php }
add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
    if(isset($fields['url']))
        unset($fields['url']);
    return $fields;
}

add_filter('comment_form_default_fields', 'email_filtered');
function email_filtered($fields)
{
    if(isset($fields['email']))
        unset($fields['email']);
    return $fields;
}
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

function show_attribute_terms ($atts, $content = null)	{

    global $a;
    global $terms;
    global $tt;


    $a = shortcode_atts( array(
        'attribute_slug' => '&#1606;&#1608;&#1740;&#1587;&#1606;&#1583;&#1607;',
        'orderby' => 'title',
        'order' => 'ASC'
    ), $atts );


    $terms = get_terms( 'pa_'.$a['attribute_slug'] );

    if(in_array("ناشر",$a)){
        $GLOBALS['tt'] = "الناشر";
    }else{
        $GLOBALS['tt'] = "المؤلفون";
    }

    echo $GLOBALS['tt'];

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

        echo '<div class="row">';
        echo '<select class="selectpicker moalef" data-live-search="true" onChange="window.location.href=this.value">';
        echo '<option>بحث ...</option>';
        foreach ($terms as $term) {

            echo '<option data-tokens="' . $term->name . '" value="http://daroljamal.com/shop/?filter_'.$a['attribute_slug'].'='.$term->slug.'"> ' . $term->name . ' </option>';
        }
        echo '</select>';
        echo '</div>';
        echo '<ul class="row ltnum">';
        foreach ($terms as $term) {

            echo '<li class="col-md-6 hnum"><a href="http://daroljamal.com/shop/?filter_'.$a['attribute_slug'].'='.$term->slug.'"> ' . $term->name . '<div class="count-number">' .  $term->count . '</div><div class="icon-grid"><a href="http://daroljamal.com/shop/?filter_'.$a['attribute_slug'].'='.$term->slug.'&shop_view=list&per_page='.$term->count.'"></a></div> </a></li>';
        }
        echo '</ul>';
    }

}
add_shortcode('show_attribute_terms', 'show_attribute_terms');

add_action( 'woocommerce_product_meta_end', 'wc_show_attribute_links' );
// if you'd like to show it on archive page, replace "woocommerce_product_meta_end" with "woocommerce_shop_loop_item_title"

function wc_show_attribute_links() {
    global $post;
    $attribute_names = array( '<ATTRIBUTE_NAME>', '<ANOTHER_ATTRIBUTE_NAME>' ); // Add attribute names here and remember to add the pa_ prefix to the attribute name

    foreach ( $attribute_names as $attribute_name ) {
        $taxonomy = get_taxonomy( $attribute_name );

        if ( $taxonomy && ! is_wp_error( $taxonomy ) ) {
            $terms = wp_get_post_terms( $post->ID, $attribute_name );
            $terms_array = array();

            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    $archive_link = get_term_link( $term->slug, $attribute_name );
                    $full_line = '<a href="' . $archive_link . '">'. $term->name . '</a>';
                    array_push( $terms_array, $full_line );
                }
                echo $taxonomy->labels->name . ' ' . implode( ', ', $terms_array);
            }
        }
    }
}

//show attributes after summary in product single view
add_action('woocommerce_single_product_summary', function() {
    //template for this is in storefront-child/woocommerce/single-product/product-attributes.php
    global $product;
    echo $product->list_attributes();
}, 25);




function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );


function wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
    $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
    $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
    $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
    $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
    $image             = wp_get_attachment_image(
        $attachment_id,
        $image_size,
        false,
        apply_filters(
            'woocommerce_gallery_image_html_attachment_image_params',
            array(
                'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-src'                => esc_url( $full_src[0] ),
                'data-large_image'        => esc_url( $full_src[0] ),
                'data-large_image_width'  => esc_attr( $full_src[1] ),
                'data-large_image_height' => esc_attr( $full_src[2] ),
                'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
            ),
            $attachment_id,
            $image_size,
            $main_image
        )
    );

    return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
}



