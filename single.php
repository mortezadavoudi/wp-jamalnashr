<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_title(); ?>
                <div class="row">
                    <div class="col-md-3 d-lg-block col-12 d-flex">
                        <?php get_template_part('/template-parts/page/sidebar-page')?>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12 col-lg-9 col-sm-12 col-12 d-flex">
                        <div class="promot">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
