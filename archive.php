<?php
/**
 * Archieve Template 
 * 
 * @package JobGrids
 */
get_header( );
get_template_part('/template-parts/breadcrumbs');

?>
 <section class="section latest-news-area blog-list">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-6 col-12">
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
        </div>
      </div>
</section>
<?php get_footer( );?>
 