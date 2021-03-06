<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage JBlog
 * @since JBlog 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="comment-form">
	<?php

	//Text Translate
	$jblog_author_placeholder  = __( 'Your Name*', 'jblog' );
	$jblog_email_placeholder   = __( 'Your Email*', 'jblog' );
	$jblog_url_placeholder     = __( 'Your Website*', 'jblog' );
	$jblog_comment_placeholder = __( 'Your Comments*', 'jblog' );
	$jblog_submit              = __( 'Post Comment', 'jblog' );
	$jblog_error_message       = __( 'Field Cannot Be Empty', 'jblog' );
	$jblog_success_message     = __( 'Comment Successful', 'jblog' );

	$jblog_comment_fields            = array();
	$jblog_comment_fields['author']  = <<<EOD
        <div class="row">
        <div class="error-message alert alert-danger"
             style="display:none">{$jblog_error_message}</div>
        <div class="success-message alert alert-success"
             style="display:none">{$jblog_success_message}</div>
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="text" name="author" id="author" class="form-control form-control-custom"
                           placeholder="{$jblog_author_placeholder}" required="required"/>
                </div>
            </div>
EOD;
	$jblog_comment_fields['email']   = <<<EOD
        <div class="col-lg-6 col-12">
            <div class="form-box form-group">
                <input type="email" name="email" id="email" class="form-control form-control-custom"
                       placeholder="{$jblog_email_placeholder}" required="required"/>
            </div>
        </div>
EOD;
	$jblog_comment_fields['url']     = <<<EOD
        <div class="col-12">
            <div class="form-box form-group">
                <input type="url" name="url" id="url" class="form-control form-control-custom"
                       placeholder="{$jblog_url_placeholder}"/>
            </div>
        </div>
EOD;
	$jblog_comment_field             = <<<EOD
        <div class="col-12">
            <div class="form-box form-group">
                <textarea name="comment" id="comment" rows="6" class="form-control form-control-custom"
                          placeholder="{$jblog_comment_placeholder}" required="required"></textarea>
            </div>
        </div>
EOD;
	$jblog_comment_submit_button     = <<<EOD
            <div class="col-12">
                <div class="button">
                    <button type="submit" class="btn mouse-dir white-bg">{$jblog_submit} <span
                                class="dir-part"></span></button>
                </div>
            </div>
        </div>
EOD;
	$jblog_comment_fields['cookies'] = ' ';

	$jblog_comment_form_arguments = array(
		'title_reply'          => __( 'Leave a comment', 'jblog' ),
		'fields'               => $jblog_comment_fields,
		'comment_field'        => $jblog_comment_field,
		'submit_button'        => $jblog_comment_submit_button,
		'comment_notes_before' => ' ',
		'class_form'           => ' ',
		'title_reply_before'   => '<h3 class="comment-reply-title"><span>',
		'title_reply_after'    => '</span></h3>',

	)
	?>
	<?php comment_form( $jblog_comment_form_arguments ); ?>
</div>