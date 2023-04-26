<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pet Care Zone
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $pet_care_zone_comments_number = get_comments_number();
            if ( '1' === $pet_care_zone_comments_number ) {
                /* translators: %s: post title */
                printf( esc_html__( 'One thought on &ldquo;%s&rdquo;', 'pet-care-zone' ), esc_html( get_the_title() ) );
            } else {
                printf(
                    esc_html(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s thought on &ldquo;%2$s&rdquo;',
                            '%1$s thoughts on &ldquo;%2$s&rdquo;',
                            $pet_care_zone_comments_number,
                            'comments title',
                            'pet-care-zone'
                        )
                    ),
                    esc_html( number_format_i18n( $pet_care_zone_comments_number ) ),
                    esc_html( get_the_title() )
                );
            }
            ?>
        </h2>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pet-care-zone' ); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'pet-care-zone' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'pet-care-zone' ) ); ?></div>
                </div>
            </nav>
        <?php endif; // Check for comment navigation. ?>
        <ul class="comment-list">
            <?php
                wp_list_comments( array( 'callback' => 'pet_care_zone_comment', 'avatar_size' => 50 ));
            ?>
        </ul>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pet-care-zone' ); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'pet-care-zone' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'pet-care-zone' ) ); ?></div>
                </div>
            </nav>
        <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pet-care-zone' ); ?></p>
    <?php
    endif; ?>

    <?php
        comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        ) );
    ?>
</div>
