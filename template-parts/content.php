<?php if (is_single()): ?>



<?php else: ?>

    <article style="margin-bottom: 20px;" class="<?php post_class("postbox__item format-image mb-50 transition-3"); ?>"
        id="post-<?php the_ID(); ?>">
        <dhpclass="postbox__thumb m-img">
            <a href="<?php the_permalink(); ?>">
                <img class="w-100 max-w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
            </dhpclass=>
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

<?php endif; ?>