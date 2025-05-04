<?php
// Check if comments are allowed and post is not password-protected
if (comments_open() && !post_password_required()) :
?>

<div id="comments" class="postbox-details-comment-wrapper">
    <?php if (have_comments()) : ?>
    <h3 class="postbox-details-comment-title">
        <?php
            $comment_count = get_comments_number();
            echo sprintf(
                esc_html(_n('%02d Comment', '%02d Comments', $comment_count, 'exdos')),
                number_format_i18n($comment_count)
            );
            ?>
    </h3>
    <div class="postbox-details-comment-inner">
        <ul>
            <?php
                wp_list_comments([
                    'style' => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 80,
                    'callback' => 'custom_comment_list',
                    'max_depth' => get_option('thread_comments_depth', 5),
                ]);
                ?>
        </ul>

        <?php
            the_comments_pagination([
                'prev_text' => esc_html__('Previous', 'exdos'),
                'next_text' => esc_html__('Next', 'exdos'),
                'screen_reader_text' => esc_html__('Comments navigation', 'exdos'),
            ]);
            ?>
    </div>
    <?php endif; ?>

    <?php
    // Comment form configuration
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');

    $fields = [
        'author' => '<div class="col-xxl-6 col-xl-6 col-lg-6"><div class="postbox__comment-input"><input id="author" name="author" type="text" placeholder="' . esc_attr__('Your Name', 'exdos') . '" value="' . esc_attr($commenter['comment_author']) . '" ' . ($req ? 'required' : '') . '></div></div>',
        'email' => '<div class="col-xxl-6 col-xl-6 col-lg-6"><div class="postbox__comment-input"><input id="email" name="email" type="email" placeholder="' . esc_attr__('Email Address', 'exdos') . '" value="' . esc_attr($commenter['comment_author_email']) . '" ' . ($req ? 'required' : '') . '></div></div>',
    ];

    comment_form([
        'fields' => $fields,
        'comment_field' => '<div class="col-xxl-12"><div class="postbox__comment-input"><textarea id="comment" name="comment" placeholder="' . esc_attr__('Write Your Comment', 'exdos') . '" required></textarea></div></div>',
        'submit_button' => '<div class="col-xxl-12"><div class="postbox__comment-btn"><button type="submit" class="thm-btn">' . esc_html__('SUBMIT COMMENTS', 'exdos') . '</button></div></div>',
        'title_reply' => esc_html__('Leave Your Comment', 'exdos'),
        'title_reply_before' => '<h3 class="postbox__comment-form-title">',
        'title_reply_after' => '</h3>',
        'class_form' => 'postbox__comment-form',
        'class_container' => 'postbox__comment-form',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'logged_in_as' => '',
        'format' => 'html5',
        'action' => site_url('/wp-comments-post.php'), // WordPress comment processing URL
    ]);
    ?>
</div><!-- #comments -->

<?php endif; ?>

<?php
// Move comment textarea to the bottom
function move_comment_textarea_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'move_comment_textarea_to_bottom');

// Custom callback to list each comment
function custom_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    if ($comment->comment_type === 'pingback' || $comment->comment_type === 'trackback') : ?>
<li class="pingback">
    <p><?php esc_html_e('Pingback:', 'exdos'); ?> <?php comment_author_link(); ?></p>
</li>
<?php else : ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <div class="postbox-details-comment-box d-sm-flex align-items-start">
        <div class="postbox-details-comment-thumb">
            <?php echo get_avatar($comment, $args['avatar_size']); ?>
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
                        comment_reply_link(array_merge($args, [
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => esc_html__('Reply', 'exdos'),
                        ]));
                        ?>
            </div>
        </div>
    </div>
</li>
<?php endif;
}
?>