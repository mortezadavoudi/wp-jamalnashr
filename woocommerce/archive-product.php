<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
            <div class="col-lg-3 fix-search col-12 col-sm-3">
                <div class="woocommerce-products-header">
                    <div class="shop-page-title">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="shop-page-breadcrumb"><?php woocommerce_breadcrumb(); ?></div>
                </div>
                <?php get_template_part('/template-parts/shop/sidebar-shop')?>
            </div>
            <div class="col-lg-9 col-12 col-sm-9">

                <?php
                if ( woocommerce_product_loop() ) {
                    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
                    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action( 'woocommerce_before_shop_loop' );
                    ?>

                    <div class="sortShop">

                        <div class="filter">
                            <i class="fas fa-filter"></i>مشاهدة الطلب :
                            <ul>
                                <?php
                                $catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
                                    'popularity' => __( ' حسب الشعبية', 'woocommerce' ),
                                    'date'       => __( ' حسب الأحدث', 'woocommerce' ),
                                    'price'      => __( ' من الأقل إلى الأعلى', 'woocommerce' ),
                                    'price-desc' => __( ' من الأعلى إلى الأقل', 'woocommerce' )
                                ) );
                                if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
                                    unset( $catalog_orderby['rating'] );

                                foreach ( $catalog_orderby as $id => $name )
                                    echo '<li><a href="' . get_permalink( wc_get_page_id( 'shop' ) ) . '?orderby=' . $id . '" >' . esc_attr( $name ) . '</a></li>';
                                ?>
                            </ul>
                        </div>
                        <div class="countProduct">
                            <?php woocommerce_result_count(); ?>
                        </div>
                    </div>

                    <?php
                    woocommerce_product_loop_start();

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }
                    }

                    woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }

                /**
                 * Hook: woocommerce_after_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );

                /**
                 * Hook: woocommerce_sidebar.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                ?>

            </div>
<div class="container">
    <div class="cat-box-bot">
        <?php do_action( 'woocommerce_archive_description' ); ?>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */


get_footer( 'shop' );
