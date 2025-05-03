<?php

$gallery = function_exists('get_field') ? get_field('post_gallery') : [];

?>

<article style="margin-bottom: 20px;" class="<?php post_class("postbox__item format-image mb-50 transition-3"); ?>"
    id="post-<?php the_ID(); ?>">
    <div class="postbox__thumb m-img">


        <div class="postbox__thumb-slider p-relative">
            <div
                class="swiper-container postbox__thumb-slider-active swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                <div class="swiper-wrapper">
                    <?php foreach ($gallery as $image): ?>
                        <div class="swiper-slide">
                            <img class="w-100 max-w-100" src="<?php echo $image['url']; ?>"
                                alt="<?php echo $image['alt']; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="postbox__slider-arrow-wrap">
                <button class="postbox-arrow-prev">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                </button>
                <button class="postbox-arrow-next">
                    <i class="fa-sharp fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

    </div>
    <div class="postbox__content">
        <div class="postbox__meta">
            <span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i
                        class="fa-light fa-user"></i> <?php the_author(); ?></a></span>
            <span><i class="fa-light fa-location-dot"></i> <?php the_category(', '); ?></span>
            <span><a href="<?php comments_link(); ?>"><i class="fal fa-comments"></i>
                    <?php comments_number(); ?></a></span>
        </div>
        <h3 class="postbox__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="postbox__text">
            <p><?php the_excerpt(); ?> </p>
        </div>
        <div class="tp-slide-btn-box">
            <a class="thm-btn" href="<?php the_permalink(); ?>"><?php _e('Read More', 'portx'); ?></a>
        </div>
    </div>
</article>