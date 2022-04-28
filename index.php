<?php global $jamal_admin; ?>
<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-lg-9 col-sm-12 col-12 d-flex">
                        <?php get_template_part('template-parts/block/top-slider'); ?>
                    </div>
                    <div class="col-md-3 d-md-none d-lg-block col-12 d-flex">
                        <?php get_template_part('template-parts/block/promot-slider'); ?>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-12 col-12">-->
<!--                <div class="ages-slider">-->
<!--                    <div class="owl-carousel owl-theme age-slider" id="age-slider">-->
<!--                        <a href="#" class="item age-item">-->
<!--                            <div class="age-image">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/image/1.png" alt="رده سنی">-->
<!--                            </div>-->
<!--                            <div class="age-title">-->
<!--                                رده سنی-->
<!--                                <span>1 تا 3 سال</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <a href="#" class="item age-item">-->
<!--                            <div class="age-image">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/image/2.png" alt="رده سنی">-->
<!--                            </div>-->
<!--                            <div class="age-title">-->
<!--                                رده سنی-->
<!--                                <span>1 تا 3 سال</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <a href="#" class="item age-item">-->
<!--                            <div class="age-image">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/image/3.png" alt="رده سنی">-->
<!--                            </div>-->
<!--                            <div class="age-title">-->
<!--                                رده سنی-->
<!--                                <span>1 تا 3 سال</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <a href="#" class="item age-item">-->
<!--                            <div class="age-image">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/image/4.png" alt="رده سنی">-->
<!--                            </div>-->
<!--                            <div class="age-title">-->
<!--                                رده سنی-->
<!--                                <span>1 تا 3 سال</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <a href="#" class="item age-item">-->
<!--                            <div class="age-image">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/image/5.png" alt="رده سنی">-->
<!--                            </div>-->
<!--                            <div class="age-title">-->
<!--                                رده سنی-->
<!--                                <span>1 تا 3 سال</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    <div class="container-fluid w-bg">
            <div class="container">
                <div class="row">
                    <?php get_template_part('template-parts/block/sale-product') ?>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="banner mb-4">
                <a href="<?php echo $jamal_admin['opt-banner1_link']; ?>"><img src="<?php echo $jamal_admin['opt-banner1']['url']; ?>" alt="بنر"></a>
            </div>
            <?php get_template_part('template-parts/block/product-slider') ?>
            <div class="banner mb-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <a href="<?php echo $jamal_admin['opt-banner2_link']; ?>"><img src="<?php echo $jamal_admin['opt-banner2']['url']; ?>" alt="بنر"></a>
                        </div>
                        <div class="col-md-6 col-12">
                            <a href="<?php echo $jamal_admin['opt-banner3_link']; ?>"><img src="<?php echo $jamal_admin['opt-banner3']['url']; ?>" alt="بنر"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php //get_template_part('template-parts/block/other-slider') ?>
            <?php get_template_part('template-parts/block/blog-slider') ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
