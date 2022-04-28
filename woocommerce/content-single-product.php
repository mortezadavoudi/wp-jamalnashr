<div class="mt-5 col-lg-12 col-md-12">
    <div class="notic">
        <?php do_action( 'woocommerce_before_single_product' ); ?>
    </div>
    <div class="breadcrumb"><?php woocommerce_breadcrumb(); ?></div>
    <div class="main-content">
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */


if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row', $product ); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    ?>
    <div class="col-lg-4 sp-gallery-product col-md-12 col-12">
    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
        <div class="btns">
            <a href="#" class="col side-icon"><?php echo do_shortcode('[woosc]'); ?></a>
            <a href="#" data-remodal-target="modal" class="col share side-icon"><i class="fal fa-share-alt"></i></a>
        </div>
    </div>

    <div class="col-lg-8 sp-content-product col-md-12 col-12">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
         /**do_action( 'woocommerce_single_product_summary' );*/
        ?>

        <div class="sp-top-content-product d-flex">
            <div class="m-l-auto">
                <?php woocommerce_template_single_title(); ?>
                <?php woocommerce_template_single_meta(); ?>
            </div>
            <div class="m-r-auto d-flex">
                <div class="product-rating">
                    <?php woocommerce_template_single_rating(); ?>
                </div>
            </div>
        </div>
        <div class="sp-mid-content-product">
            <div class="row">
                <div class="content-product col-9">
                    <?php woocommerce_template_single_excerpt(); ?>
                    <div class="pre-side-top mt-5 row">
                        <div class="attr">
                            <?php
                            $has_row    = false;
                            $attributes = $product->get_attributes();
                            ob_start();
                            ?>
                            <div class="attributes incontent">
                                <?php foreach ( $attributes as $attribute ) :
                                    if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) )
                                        continue;
                                    $values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
                                    $att_val = apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
                                    if( empty( $att_val ) )
                                        continue;
                                    $has_row = true;
                                    ?>
                                    <div class="show_attr">
                                        <div class="att_label"><?php echo wc_attribute_label( $attribute['name'] ); ?></div>
                                        <div class="att_value"><?php echo $att_val; ?></div>
                                    </div>
                                <?php endforeach; ?>
                                <a href="#tab-title-additional_information" class="secondary-link">+ موارد بیشتر</a>
                            </div>
                            <?php
                            if ( $has_row ) {
                                echo ob_get_clean();
                            } else {
                                ob_end_clean();
                            }
                            ?>

                        </div>
                        <?php woocommerce_template_single_price(); ?>
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                </div>
                <div class="col-3 pr">

                </div>
            </div>
        </div>
    </div>
    <div class="sp-bott-content-product">
        <?php woocommerce_output_product_data_tabs(); ?>
<!--        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">-->
<!--            <li class="pr-tabs" role="presentation">-->
<!--                <a href="#" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">توضیحات</a>-->
<!--            </li>-->
<!--            <li class="pr-tabs" role="presentation">-->
<!--                <a href="#" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">اطلاعات محصول</a>-->
<!--            </li>-->
<!--            <li class="pr-tabs" role="presentation">-->
<!--                <a href="#" class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">نظرات کاربران</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <div class="tab-content" id="pills-tabContent">-->
<!--            <div class="tab-pane woocommerce-Tabs-panel--description fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">-->
<!--                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.-->
<!--                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.-->
<!--                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.-->
<!--                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.-->
<!--            </div>-->
<!--            <a class="btn-overflow">بیشتر +</a>-->
<!--            <div class="tab-pane woocommerce-Tabs-panel--additional_information fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>-->
<!--            <div class="tab-pane woocommerce-Tabs-panel--reviews fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>-->
<!--        </div>-->
    </div>
    </div>
</div>
    <?php global $jamal_admin; ?>
    <div class="product">
        <div class="sec-title float-end">
            <div class="head-title">
                منتجات ذات صله
                
            </div>
        </div>
        <a href="/shop" class="slide-more float-start">
            <div href="/shop" class="btn-slide-more">
                منتجات أخرى
            </div>
        </a>
        <div class="clearfix"></div>
        <div class="owl-carousel owl-theme product-slider">
            <?php $cats_array=array(0); $terms=wp_get_post_terms($product->id,'product_cat');
            foreach($terms as $term){$children=get_term_children($term->term_id,'product_cat');
                if(!sizeof($children)) $cats_array[]=$term->term_id;}
            $args=apply_filters('woocommerce_related_products_args',
                array('post_type'=>'product','ignore_sticky_posts'=>1,'no_found_rows'=>1,
                    'posts_per_page'=>7,'orderby'=>'rand',
                    'meta_query'=>array(array('key'=>'_stock_status','value'=>'instock')),
                    'tax_query'=>array(array('taxonomy'=>'product_cat','field'=>'id','terms'=>$cats_array),)));
            $related_items=new WP_Query($args);
            if($related_items->have_posts()):while($related_items->have_posts()):$related_items->the_post(); global $product; ?>
                <div class="item product-item">
                    <div class="product-item-top">
                        <?php if ( $product->is_on_sale() )  { ?><div class="porduct-offer"><?php display_discount_percentage(); ?></div><?php } ?>
                        <a href="<?php the_permalink(); ?>" class="product-image">
                            <?php if (has_post_thumbnail( $related_items->post->ID )) echo get_the_post_thumbnail($related_items->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
                        </a>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="product-title"><h3><?php the_title(); ?></h3></a>
                    <div class="product-item-bottom d-flex">
                        <div class="item-price">
                            <!--                    <span>قیمت :</span>-->
                            <?php echo $product->get_price_html(); ?>
                        </div>
                        <div class="item-shop-button m-r-auto d-flex">
                            <div class="item-add-to-card bgtool" data-bs-toggle="tooltip"
                                 title="افزودن به سبد خرید">
                                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                            </div>
                            <?php if ($jamal_admin['opt-qview'] == true) { ?>
                                <div class="item-quick-view prevtool" data-bs-toggle="tooltip"
                                     title="پیش نمایش">
                                    <a href="#" class="button add_to_cart_button">
                                        <i class="fal fa-eye"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>

    <div class="remodal w-50" data-remodal-id="modal">
        <button data-remodal-action="close" class="remodal-close"></button>
        با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.
    </div>
    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    /**do_action( 'woocommerce_after_single_product_summary' );*/
    ?>


<?php do_action( 'woocommerce_after_single_product' ); ?>
