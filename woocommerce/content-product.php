<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
global $jamal_admin;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-12 col-md-4 col-lg-4 item arloop-item">
    <div class="loop-item">
        <div class="product-item-top">
            <?php if ( $product->is_on_sale() )  { ?><div class="porduct-offer"><?php display_discount_percentage(); ?></div><?php } ?>
            <a href="<?php the_permalink(); ?>" class="product-image">
                <?php the_post_thumbnail(); ?>
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
</div>
