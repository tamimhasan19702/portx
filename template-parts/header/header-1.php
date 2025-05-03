<?php

$header_logo = get_theme_mod('portx_header_logo', esc_url(get_template_directory_uri() . '/assets/img/logo/footer-logo.png'));
$contact_info = get_theme_mod('portx_contact_info');
$header_button = get_theme_mod('portx_header_button_text');
$header_button_url = get_theme_mod('portx_header_button_url');
?>


<?php get_template_part('template-parts/header/tpoffcanvas-area'); ?>
<?php get_template_part('template-parts/header/searchform') ?>



<header>
    <div class="main-header d-none d-xl-block">
        <div class="tp-header__top tp-header__he pt-20 pb-20 p-relative">
            <div class="tp-header-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4">
                            <div class="main-logo ">
                                <?php if ($header_logo) { ?><a href="<?php echo esc_url(home_url('/')); ?>"><img
                                            src="<?php echo esc_url($header_logo); ?>" alt=""></a> <?php } ?>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="tp-header">
                                <div class="tp-header__right  d-flex justify-content-end">

                                    <?php
                                    $contact_info = get_theme_mod('portx_contact_info');

                                    if (!empty($contact_info) && is_array($contact_info)):
                                        foreach ($contact_info as $contact):
                                            $flaticon_class = !empty($contact['flaticon_class']) ? $contact['flaticon_class'] : '';
                                            $header = !empty($contact['header']) ? $contact['header'] : '';
                                            $description = !empty($contact['description']) ? $contact['description'] : '';
                                            ?>
                                            <div class="tp-header__contact mr-20">
                                                <div class="tp-header__contact d-flex align-items-center">
                                                    <?php if ($flaticon_class): ?>
                                                        <span class="tp-header__icon">
                                                            <i class="<?php echo esc_attr($flaticon_class); ?>"></i>
                                                        </span>
                                                    <?php endif; ?>

                                                    <div class="tp-header__icon-info ml-20">
                                                        <?php if ($header): ?>
                                                            <label><?php echo esc_html($header); ?></label>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url($contact['url']); ?>">
                                                            <?php if ($description): ?>
                                                                <span><?php echo esc_html($description); ?></span>
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="tp-header">
            <div id="header-sticky" class="header-bottom black-bg d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="tp-header__main-menu main-menu">


                                <?php
                                portx_header_menu();
                                ?>


                            </div>
                        </div>


                        <div class="col-xl-4">
                            <div class="tp-header__right text-end d-flex align-items-center justify-content-end">
                                <div class="search-img f-left mr-30">
                                    <button class="search-open-btn">
                                        <i class="flaticon-loupe"></i>
                                    </button>
                                </div>
                                <?php if ($header_button): ?>
                                    <div class="tp-header__btn">
                                        <a class="tp-btn"
                                            href="<?php echo esc_url($header_button_url); ?>"><?php echo esc_html($header_button); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mobile-header d-xl-none pt-20 pb-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="main-logo ">
                        <a href="index.html"><img
                                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/footer-logo.png'); ?>"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile__menu d-flex align-items-center justify-content-end">
                        <button class="search-open-btn mr-30 d-none d-sm-block">
                            <i class="flaticon-loupe"></i>
                        </button>
                        <a class="tp-menu-bar" href="javascript:void(0)"><i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>