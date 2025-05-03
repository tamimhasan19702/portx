<?php

$footer_text = get_theme_mod('portx_footer_copyright', '© 2023 Portx. All rights reserved.');

?>

<div class="tp-footer__bottom  pt-25 pb-25">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-lg-6 col-md-7  col-12">

                <?php
                if ($footer_text) {
                    ?>
                    <div class="tp-footer__copyright text-md-start text-center">
                        <p>
                            <?php echo portx_kses($footer_text); ?>
                        </p>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="col-xxl-6 col-lg-6 col-md-5  col-12">
                <?php portx_bottom_footer_menu(); ?>
            </div>
        </div>
    </div>
</div>