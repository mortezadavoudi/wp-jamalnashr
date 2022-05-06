<?php /* Template Name: page-wide */ ?>
<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_title(); ?>
                <div class="row">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                            <div class="entry-content">
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
