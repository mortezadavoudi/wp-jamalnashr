<?php global $jamal_admin; ?>
<div class="promot">
    <div class="promot-title">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/JamalLogo20.png"
             alt="اخرین تخفیف هایی جمال">
        دارالجمال
    </div>
    <div class="slide-progress"></div>
    <div class="owl-carousel owl-theme promot-slider" id="promot-slider">
        <?php
        $args = array(
            'post_type' => 'product',
            'stock' => 1,
            'posts_per_page' => 6,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'tax_query' => array( //do not return results from this category
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => array('catalogues'),
                    'operator' => 'NOT IN'
                )
            ),
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <div class="item promot-item">
            <div class="pro-item-image">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
            </div>
           
            <div class="pro-item-bottom d-flex">
                <div class="item-price">
                    <?php if ( $product->is_on_sale() )  { ?>
                        <?php echo $product->get_price_html(); ?>
                    <?php }else{ ?>
                        <span>قیمت :</span>
                        <?php echo $product->get_price_html(); ?>
                    <?php } ?>
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
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>