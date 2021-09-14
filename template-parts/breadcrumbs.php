<?php 
/**
 * Breadcrumbs template 
 * 
 * @package JobGrids
 */
?>
<div class="breadcrumbs overlay">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <div class="breadcrumbs-content" style="background-image:">
            <h1 class="page-title">
                <?php 
                    if(is_category( ) || is_tag( )){
                        single_cat_title( );
                    }else{
                            ucwords(single_post_title());
                    }
                ?>
            </h1>
                <?php
                    if(has_excerpt( ) ){
                        echo '<p>'.esc_html__( wp_trim_words( get_the_excerpt( ), 20,''), 'jobgrids' ).'</p>';
                    }
                ?>
           
        </div>
        <ul class="breadcrumb-nav">
            <li>
                <a href="<?php echo esc_url(get_home_url()) ?>">
                    <?php
                       echo esc_html_e(get_the_title( get_option('page_on_front') ),'jobgrids' );
                    ?>
                </a>
            </li>
            <li>
                <?php 
                    if(is_category( ) || is_tag( )){
                        single_cat_title( );
                    }else{
                        single_post_title();
                    }
                ?>
            </li>
        </ul>
        </div>
    </div>
    </div>
</div>