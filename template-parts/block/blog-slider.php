<div class="blog">
    <div class="sec-title float-end">
        <div class="head-title">
            عنوان الويب لدار الجمال
            <span>احدث الأخبار</span>
        </div>
    </div>
    <a href="#" class="slide-more float-start">
        <div href="/blog" class="btn-slide-more">
            المقالات
        </div>
    </a>
    <div class="clearfix"></div>
    <div class="owl-carousel owl-theme blog-slider">
        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="item blog-item">
            <div class="blog-item-top">
                <a href="<?php the_permalink(); ?>" class="blog-image">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
            <div class="blog-item-bottom">
                <a href="<?php the_permalink(); ?>" class="blog-title"><h3><?php the_title(); ?></h3></a>
            </div>
        </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>