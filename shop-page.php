<?php /* Template Name: shop-page */ ?>
<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-shop">
                    <?php the_title(); ?>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 d-flex">
                        <div class="promot">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>