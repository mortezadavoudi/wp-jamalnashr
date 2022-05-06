<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3 d-lg-block col-12 d-flex">
                        <?php get_template_part('/template-parts/page/sidebar-page')?>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12 col-lg-9 col-sm-12 col-12 d-flex">
                        <div class="pages">
                            <div class="blog_top">
                                <div class="blog_icon">

                                </div>
                                <h1 class="blog_title"> <?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
