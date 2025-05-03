<?php




get_header();

?>


<!--  breadcrumb-area  start -->
<div class="wrapper-box p-relative ">
    <div class="breadcrumb__bg breadcrumb__bg__overlay pt-130 pb-130 "
        data-background="assets/img/breadcrumb/breadcrumb-bg-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1 ">
                        <div class="breadcrumb__list mb-10">
                            <?php
                            if (is_page()) {
                                $title = get_the_title();
                            } elseif (is_single()) {
                                $title = get_the_title();
                            } else {
                                $title = get_bloginfo('name');
                            }
                            ?>
                            <h3 class="breadcrumb__title mb-15"><?php echo esc_html($title); ?></h3>
                            <div class="breadcrumb__item">
                                <span><a href="index.html">Home </a></span>
                                <span class="dvdr"> / </span>
                                <span class="sub-page-black">Blog Sidebar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  breadcrumb-area  end -->

<!-- postbox area start -->
<section class="postbox__area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="postbox__wrapper pr-20 mb-40">

                    <?php if (have_posts()):
                        while (have_posts()):
                            the_post(); ?>

                            <?php get_template_part('template-parts/content', get_post_format()); ?>

                        <?php endwhile;
                    else: ?>
                        <p class="no-content-found">No content found</p>
                    <?php endif;
                    ?>

                    <div class="col-xl-12">
                        <?php

                        if (function_exists('portx_pagination')) {
                            portx_pagination();
                        }

                        ?>
                    </div>

                </div>

            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__wrapper">

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- postbox area end -->

<!-- footer area start -->
<?php

get_footer();