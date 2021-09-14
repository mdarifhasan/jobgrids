<?php
/**
 * Main Template file of the theme
 * 
 * @package JobGrids
 */
get_header( );
get_template_part('/template-parts/breadcrumbs');

?>
 <section class="section latest-news-area blog-list">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-12">
            <div class="row">
                <!-- Content template -->
              <?php get_template_part('/template-parts/content'); ?>
            </div>

            <div class="pagination center">
              <?php
                jobgrids_pagination();
              ?>
            </div>
          </div>
          <aside class="col-lg-4 col-md-5 col-12">
            <div class="sidebar">
              <?php get_sidebar( ); ?>
            </div>
          </aside>
        </div>
      </div>
</section>
<?php get_footer( );?>
 