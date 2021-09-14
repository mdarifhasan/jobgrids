<?php
/**
 * Footer Template File
 * 
 * @package JobGrids
 */
$download_deafults = [
    [
        'download_btn_link'  =>esc_url('https://www.google.com/'),
        'download_btn_txt'   =>esc_html__( 'Play Store','jobgrids' ),
        'download_btn_icon'  =>esc_html('dashicons-controls-play')
  ]
  ];
  
  // Theme_mod settings to check.
$download_btns = get_theme_mod( 'download_btns', $download_deafults );
?>
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="download-text">
                <h3><?php echo esc_html(get_theme_mod('download_txt_title')) ?></h3>
                <p>
                    <?php echo esc_html( get_theme_mod('download_txt_desc') ) ?>
                </p>
                </div>
            </div>
            <div class="col-lg-6 col-12 d-flex justify-content-center">
                <div class="download-button">
                <div class="button d-flex flex-sm-row flex-column">
                    <?php 
                        foreach($download_btns as $download_btn){
                            ?>
                                 <a class="btn" href="<?php echo $download_btn['download_btn_link'] ?>">
                                 <?php
                                    if(!empty($download_btn['download_btn_icon'])){
                                        echo '<div class=" d-inline-block dashicons '.$download_btn['download_btn_icon'].'"></div>';
                                    }
                                 ?>
                                      <?php echo $download_btn['download_btn_txt'] ?>
                                </a>
                            <?php
                        }
                    ?>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <?php
                        if(is_active_sidebar('footer-widget-1')){
                            dynamic_sidebar( 'footer-widget-1' );
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <?php
                        if(is_active_sidebar('footer-widget-2')){
                            dynamic_sidebar( 'footer-widget-2' );
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <?php
                        if(is_active_sidebar('footer-widget-3')){
                            dynamic_sidebar( 'footer-widget-3' );
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <?php
                        if(is_active_sidebar('footer-widget-4')){
                            dynamic_sidebar( 'footer-widget-4' );
                        }
                    ?>
                </div> 
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="<?php echo esc_attr( get_theme_mod('jobgrids_copyright_txt_align') ) ?>">
                            <p>
                                <?php echo esc_html(get_theme_mod('jobgrids_copyright_txt')); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer( ); ?>
</body>
</html>