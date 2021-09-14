<?php
/**
 * Template for displaying a message when there will no be content found
 * 
 * @package JobGrids
 */
?>
<div class="not-found no-result">
    <header class="page-header">
        <h3 class="page-title">
            <?php
                esc_html_e( 'Not Found','jobgrids' );
            ?>
        </h3>
    </header>
    <div class="page-content">
        <?php
            if(is_home(  ) && current_user_can('publish_posts')){
                ?>
                    <p>
                        <?php
                            printf(wp_kses(
                                __('Ready to publish new post?<a href="%s">Get started</a>'),
                                [
                                    'a'=>[
                                        'href'=>[]
                                        ]
                                    ]
                                    ),
                                    esc_url(admin_url('post-new.php'))
                                );
                        ?>
                    </p>
                <?php
            }elseif(is_search()){
                ?>
                    <p><?php esc_html_e( 'It seems that we can not fint what you are searching.Please try with different keyword', 'jobgrids' ) ?></p>
                <?php
                get_search_form();
            }else{
                ?>
                    <p><?php esc_html_e( 'It seems that we can not find what you are searching.Perhaps search can help you', 'jobgrids' ) ?></p>
                <?php
                get_search_form();
            }
        ?>
    </div>
</div>