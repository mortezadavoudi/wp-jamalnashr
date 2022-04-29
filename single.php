<?php get_header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 d-lg-block col-12">
                        <?php get_template_part('/template-parts/page/sidebar-page')?>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12 col-lg-9 col-sm-12 col-12">
                        <article class="post-wrapper">
                            <div class="blog_top">
                                <?php the_title(); ?>
                            </div>
                            <div class="entry-content">
                                <div class="single_blog_thumb">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <?php the_content(); ?>
                            </div>
                            <div class="blog_bottom">
                                <i class="meta-items-i">
                                    <i class="fal fa-user"></i>
                                    <?php the_author() ?>
                                </i>
                                <i class="meta-items-i">
                                    <i class="fal fa-clock"></i>
                                    <time datetime="<?php the_date() ?>"><?php the_date() ?></time>
                                </i>
                                <div class="social_icons blog_social">
                                    <i class="fal fa-share-alt"></i>
                                    <div class="blog_socials">
                                        <ul>
                                            <li><a class="fab fa-facebook"
                                                   href="https://www.facebook.com/sharer/sharer.php?u="
                                                   target="_blank"></a></li>
                                            <li><a class="fab fa-twitter"
                                                   href="https://twitter.com/share?url="
                                                   target="_blank"></a></li>
                                            <li><a class="fab fa-telegram"
                                                   href="https://telegram.me/share/url?url="
                                                   target="_blank"></a></li>
                                            <li><a class="fab fa-whatsapp"
                                                   href="whatsapp://send?text="
                                                   target="_blank"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="related-wrap">
                            <div class="block-title">
                                <div class="title">
                                    <i class="small fal fa-retweet"></i>
                                    مطالب مرتبط
                                </div>
                            </div>
                            <div class="related-content">
                                <?php example_cats_related_post(); ?>
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
