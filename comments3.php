<?php
/**
 * Template for displaying comments
 * 
 * @package JobGrids
 * 
 * @since 1.0.0
 */


/**
 *If the current post is password protected and the visitor has not entered the password yet then it wil return withour loading comments 
 */
if(post_password_required( )){
    return;
}
?>
<div class="comment-form">
    <?php
        $jobgrids_comment_author_placholder=__('Your Name','jobgrids');
        $jobgrids_email_placholder=__('Your Email','jobgrids');
        $jobgrids_url_placholder=__('Your Email','jobgrids');
        $jobgrids_comment_placholder=__('Your Email','jobgrids');
        $jobgrids__placholder=__('Your Email','jobgrids');
    ?>
</div>