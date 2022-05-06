<div class="product">
    <div class="sec-title float-end">
        <div class="head-title">
            از دیگر انتشارات
            <span>لوازم التحریر و کتاب ها</span>
        </div>
    </div>
    <a href="/shop" class="slide-more float-start">
        <div href="/shop" class="btn-slide-more">
            محصولات بیشتر
        </div>
    </a>
    <div class="clearfix"></div>
    <div class="owl-carousel owl-theme product-slider">
        <?php
        $args = array(
            'post__not_in'          => array( get_the_ID() ), // Exclude displayed product
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'posts_per_page'        => '6',
            'tax_query' => array( array(
                'taxonomy' => 'pa_ناشر',
                'field' => 'id',
                'terms' => array('جمال'), // HERE the product category to exclude
                'operator' => 'NOT IN',
            ) ),
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="item product-item">
                <div class="product-item-top">
                    <?php if ( $product->is_on_sale() )  { ?><div class="porduct-offer"><?php display_discount_percentage(); ?></div><?php } ?>
                    <a href="<?php the_permalink(); ?>" class="product-image">
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
                    </a>
                </div>
                <a href="<?php the_permalink(); ?>" class="product-title"><h3><?php the_title(); ?></h3></a>
                <div class="product-item-bottom d-flex">
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
                        <div class="item-quick-view prevtool" data-bs-toggle="tooltip"
                             title="پیش نمایش">
                            <a href="#" class="button add_to_cart_button">
                                <i class="fal fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>