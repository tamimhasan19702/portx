<?php if (is_single()): ?>


<article class="postbox__item format-image mb-50 transition-3">
    <div class="postbox__thumb m-img p-relative">
        <a href="<?php the_permalink(); ?>">
            <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <div class="postbox__meta-date ">
                <span><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
            </div>
        </a>
    </div>
    <div class="postbox__content">
        <div class="postbox__meta d-flex justify-content-between">
            <div class="postbox__info">
                <span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i
                            class="fa-regular fa-solid fa-user"></i> <?php the_author(); ?></a></span>
                <span><i class="fa-regular fa-solid fa-location-dot"></i> <?php the_category(', '); ?></span>
                <span><a href="<?php comments_link(); ?>"><i class="fal fa-comments"></i>
                        <?php comments_number(); ?></a></span>
            </div>
        </div>
        <h3 class="postbox__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="postbox__text">
            <p>
                <?php the_content(); ?>
            </p>
        </div>

        <div class="postbox__details-share-wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-12  col-md-12 col-12">
                    <div class="postbox__details-tag tagcloud">
                        <span>Tag:</span>
                        <?php
                            $post_tags = get_the_tags();
                            if ($post_tags) {
                                foreach ($post_tags as $tag) {
                                    echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                                }
                            }
                            ?>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                    <div class="postbox__details-share text-end">
                        <span>Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                            target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>"
                            target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com/?url=<?php the_permalink(); ?>" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>"
                            target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="postbox-details-author d-sm-flex align-items-start">
            <div class="postbox-details-author-thumb">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>">
                </a>
            </div>
            <div class="postbox-details-author-content">
                <h5 class="postbox-details-author-title">
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                </h5>
                <?php if (get_the_author_meta('description')): ?>
                <p><?php the_author_meta('description'); ?></p>
                <?php endif; ?>

                <?php
                    $socials = array('facebook', 'twitter', 'linkedin', 'vimeo');
                    if (get_the_author_meta('facebook') || get_the_author_meta('twitter') || get_the_author_meta('linkedin') || get_the_author_meta('vimeo')): ?>
                <div class="postbox-details-author-social">
                    <?php foreach ($socials as $social): ?>
                    <?php if (get_the_author_meta($social)): ?>
                    <a href="<?php echo get_the_author_meta($social); ?>"><i
                            class="fa-brands fa-<?php echo $social; ?>"></i></a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>


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