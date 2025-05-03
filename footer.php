<?php

$showCar = get_theme_mod('portx_show_car_png', true);

?>


<footer>
    <div class="footer-area theme-background pt-120 pb-80 p-relative fix">
        <div class="tp-footer__right-bg wow slideInLeft   ">
            <img src="<?php echo get_template_directory_uri() ?> /assets/img/footer/footer-left-trns.png" alt="">
        </div>

        <?php if ($showCar): ?>
            <div class="tp-footer__car">
                <img class=" tp-footer__shape-1 movingX"
                    src="<?php echo get_template_directory_uri() ?> /assets/img/footer/footer-car.png" alt="">
            </div>
        <?php endif; ?>

        <div class="container">

            <?php get_template_part('template-parts/footer/footer-widgets'); ?>

        </div>
    </div>

    <?php get_template_part('template-parts/footer/footer-bottom'); ?>
</footer>


<?php wp_footer(); ?>

</body>

</html>