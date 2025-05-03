<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Check if comments are allowed
if (comments_open()):
    ?>
    <div id="comments" class="postbox-details-comment-wrapper">
        <?php if (have_comments()): ?>
            <h3 class="postbox-details-comment-title">
                <?php
                $comment_count = get_comments_number();
                echo esc_html($comment_count) . ' ' . _n('Comment', 'Comments', $comment_count, 'exdos');
                ?>
            </h3>
            <div class="postbox-details-comment-inner">
                <ul>
                    <?php
                    wp_list_comments(array(
                        'style' => 'ul',
                        'short_ping' => true,
                        'callback' => 'custom_comment_list',
                    ));
                    ?>
                </ul>
                <?php
                // Display comment pagination if needed
                the_comments_pagination(array(
                    'prev_text' => esc_html__('Previous', 'exdos'),
                    'next_text' => esc_html__('Next', 'exdos'),
                ));
                ?>
            </div>
        <?php endif; ?>

        <?php
        // Comment form (unchanged from previous version)
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');

        $fields = array(
            'author' => '<div class="col-xxl-6 col-xl-6 col-lg-6"><div class="postbox__comment-input"><input type="text" name="author" id="author" placeholder="' . esc_attr__('Your Name', 'exdos') . '" value="' . esc_attr($commenter['comment_author']) . '" ' . ($req ? 'required' : '') . '></div></div>',
            'email' => '<div class="col-xxl-6 col-xl-6 col-lg-6"><div class="postbox__comment-input"><input type="email" name="email" id="email" placeholder="' . esc_attr__('Email Address', 'exdos') . '" value="' . esc_attr($commenter['comment_author_email']) . '" ' . ($req ? 'required' : '') . '></div></div>',
        );

        $defaults = array(
            'fields' => $fields,
            'comment_field' => '<div class="col-xxl-12"><div class="postbox__comment-input"><textarea id="comment" name="comment" placeholder="' . esc_attr__('Write Your Comment', 'exdos') . '" required></textarea></div></div>',
            'submit_button' => '<div class="col-xxl-12"><div class="postbox__comment-btn"><button type="submit" class="thm-btn">' . esc_html__('SUBMIT COMMENTS', 'exdos') . '</button></div></div>',
            'class_form' => 'postbox__comment-form',
            'title_reply' => '<h3 class="postbox__comment-form-title">' . esc_html__('Leave Your Comment', 'exdos') . '</h3>',
            'cookies' => '<div class="col-xxl-12"><div class="postbox__comment-agree d-flex align-items-start mb-25"><input class="e-check-input" type="checkbox" id="e-agree" name="wp-comment-cookies-consent" value="1" checked><label class="e-check-label" for="e-agree">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'exdos') . '</label></div></div>',
        );

        comment_form($defaults);
        ?>
    </div><!-- .postbox-details-comment-wrapper -->
<?php endif; ?>

<?php
// Move comment textarea to the bottom
function move_comment_textarea_to_bottom($fields)
{
    if (isset($fields['comment'])) {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;
    }
    return $fields;
}
add_filter('comment_form_fields', 'move_comment_textarea_to_bottom');

// Custom comment list callback
function custom_comment_list($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;

    if ($comment->comment_type === 'pingback' || $comment->comment_type === 'trackback'):
        ?>
        <li class="pingback">
            <p><?php esc_html_e('Pingback:', 'exdos'); ?>         <?php comment_author_link(); ?></p>
        </li>
    <?php else: ?>
        <li <?php comment_class('postbox-details-comment-box d-sm-flex align-items-start'); ?>
            id="comment-<?php comment_ID(); ?>">
            <div class="postbox-details-comment-thumb">
                <?php echo get_avatar($comment, 80, '', '', ['class' => 'rounded-circle']); ?>
            </div>
            <div class="postbox-details-comment-content">
                <div class="postbox-details-comment-top d-flex justify-content-between align-items-start">
                    <div class="postbox-details-comment-avater">
                        <h4 class="postbox-details-comment-avater-title"><?php comment_author(); ?></h4>
                    </div>
                </div>
                <p><?php comment_text(); ?></p>
                <div class="postbox-details-comment-reply">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => esc_html__('Reply', 'exdos'),
                        'before' => '<a href="#" class="reply-link">',
                        'after' => '</a>',
                    )));
                    ?>
                </div>
            </div>
            <?php
    endif;
}