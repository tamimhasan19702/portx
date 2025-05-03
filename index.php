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
                            <h3 class="breadcrumb__title mb-15">Blog Sidebar</h3>
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
                        <div class="tp-pagination">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <span class="current">2</span>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__wrapper">
                    <div class="sidebar__widget mb-40">
                        <div class="sidebar__widget-content">
                            <div class="sidebar__search">
                                <form action="#">
                                    <div class="sidebar__search-input-2">
                                        <input type="text" placeholder="Search here">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title">Our Latest Post</h3>
                        <div class="sidebar__widget-content">
                            <div class="sidebar__post">
                                <div class="rc__post d-flex align-items-center">
                                    <div class="rc__post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/sidebar/sidebar-sm-img.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="rc__post-content">
                                        <div class="rc__meta">
                                            <span><i class="fal fa-comments"></i> 02 Comments</span>
                                        </div>
                                        <h3 class="rc__post-title">
                                            <a href="blog-details.html">A Simple Social Media
                                                Marketing List</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="rc__post d-flex align-items-center">
                                    <div class="rc__post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/sidebar/sidebar-sm-img-2.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="rc__post-content">
                                        <div class="rc__meta">
                                            <span><i class="fal fa-comments"></i> 02 Comments</span>
                                        </div>
                                        <h3 class="rc__post-title">
                                            <a href="blog-details.html">Does My Website Need
                                                Any Blog?</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="rc__post d-flex align-items-center">
                                    <div class="rc__post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/sidebar/sidebar-sm-img-3.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="rc__post-content">
                                        <div class="rc__meta">
                                            <span><i class="fal fa-comments"></i> 02 Comments</span>
                                        </div>
                                        <h3 class="rc__post-title">
                                            <a href="blog-details.html">A Simple Social Media
                                                Marketing List</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title">Catagories</h3>
                        <div class="sidebar__widget-content">
                            <ul>
                                <li>
                                    <a href="blog-details.html">Logistics <i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </li>
                                <li><a href="blog-details.html">Business transport <i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="blog-details.html">Application <i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="blog-details.html">Markiting <i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="blog-details.html">Rail freight<i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="blog-details.html">Business<i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__widget mb-40">
                        <h3 class="sidebar__widget-title">Tags</h3>
                        <div class="sidebar__widget-content">
                            <div class="tagcloud">
                                <a href="#">Transport</a>
                                <a href="#">Cargo</a>
                                <a href="#">Business</a>
                                <a href="#">Logistic & idea</a>
                                <a href="#">Service</a>
                                <a href="#">Digital</a>
                                <a href="#">Air</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- postbox area end -->

<!-- footer area start -->
<?php

get_footer();