<?php global $jamal_admin; ?>
<style>
    :root {
        <?php if(isset($jamal_admin['opt-color-general'])){ ?> --bs-color-sec: <?php echo $jamal_admin['opt-color-general']; ?>;
    <?php } ?> <?php if(isset($jamal_admin['opt-color-primary'])){ ?> --bs-color-secs: <?php echo $jamal_admin['opt-color-primary']; ?>;
    <?php } ?> <?php if(isset($jamal_admin['opt-color-secondary'])){ ?> --bs-color-offer: <?php echo $jamal_admin['opt-color-secondary']; ?>;
    <?php } ?> <?php if(isset($jamal_admin['opt-color-shadow'])){ ?> --bs-color-shadow: <?php echo $jamal_admin['opt-color-shadow']; ?>;
    <?php } ?>
    }
</style>
<header class="d-none d-sm-block">
    <div class="top-menu">
        <div class="container d-flex">
            <div class="m-l-auto">
                <div class="main-menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-menu'
                    )); ?>
                </div>
            </div>
            <div class="m-r-auto">
                <div class="top-left-menu">
                    <ul>
                        <li><a href="/jamalnashr/my-account/"><i class="fal fa-user"></i>حساب المستخدم</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container d-flex">
            <div class="m-l-auto">
                <div class="logo-header">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $jamal_admin['opt-logo']['url']; ?>" alt="انتشارات جمال"
                                                             width="80" height="90"></a>
                </div>
            </div>
            <div class="m-r-auto d-flex gap-2">
                <div class="category-main">
                    <i class="fal fa-ellipsis-h-alt"></i>
                    دسته بندی ها
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="search-header">
                    <?php echo do_shortcode('[yith_woocommerce_ajax_search]'); ?>
                </div>
                <div class="cart-header d-flex">
                    <?php global $woocommerce; ?>
                    <div class="cart">
                        <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
                        <span class="count">
                            <span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count), $woocommerce->cart->cart_contents_count); ?></span>
                        </span>
                            صندوق التسوق
                        <i class="fal fa-shopping-bag"></i>
                        </a>
                    </div>
                    <div class="show-mini-cart">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
                <div class="social-header">
                    <a href="<?php if (isset($jamal_admin['opt-instagram'])) {
                        echo $jamal_admin['opt-instagram'];
                    } else {
                        echo "#";
                    } ?>">
                        <div class="sh-instagram"><i class="fab fa-instagram"></i></div>
                    </a>
                </div>
                <div class="social-header">
                    <a href="<?php if (isset($jamal_admin['opt-phone'])) {
                        echo 'tell:' . $jamal_admin['opt-phone'];
                    } else {
                        echo "#";
                    } ?>">
                        <div class="sh-tell"><i class="fal fa-phone-alt"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="d-sm-none d-md-none d-lg-none d-xl-none">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="col">
                <a class="menu-ico" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                   aria-controls="offcanvasRight">
                    <i class="far fa-align-right"></i>
                </a>
            </div>
            <div class="col">
                <div class="logo-header">
                    <?php
                    if (isset($jamal_admin['opt-logo'])) {
                        ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo $jamal_admin['opt-logo']['url']; ?>" alt="انتشارات جمال"
                                                                 width="80" height="90"></a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo home_url(); ?>"><img
                                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/JamalLogo150.png"
                                    alt="انتشارات جمال" width="80" height="90"></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col">
                <a class="dashboard-top" href="/jamalnashr/my-account/">
                    <i class="fal fa-user"></i>
                </a>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                 aria-labelledby="offcanvasRightLabel">
                <div class="mobile-top-menu">
                    <div class="container">
                        <div class="row">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            <div class="innermenu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'mobile-menu',
                                    'container' => false,
                                    'menu_class' => '',
                                    'fallback_cb' => '__return_false',
                                    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                                    'depth' => 2,
                                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mt-2 row">
                    <div class="col-10 msearch">
                        <div class="search-header">
                            <?php echo do_shortcode('[yith_woocommerce_ajax_search]'); ?>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cart-header cart-mobile d-flex">
                            <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
                            <div class="count"><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count), $woocommerce->cart->cart_contents_count); ?></span></div>
                            <i class="fal fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
