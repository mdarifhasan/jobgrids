<?php
/**
 * Content to display blog or index file
 */

if(have_posts(  )){
  while(have_posts(  )){
    $i=3;
    
    the_post(  );
    ?>
      <div class=" <?php if(is_archive()){ echo 'col-lg-4 col-md-6 col-12'; } ?>col-lg-6 col-12">
        <div class="single-news wow fadeInUp" data-wow-delay="<?php echo ($i/10); ?>s">
          <?php
            get_template_part('/template-parts/blog/entry-header');
            get_template_part('/template-parts/blog/entry-meta');
            get_template_part('/template-parts/blog/entry-content');
          ?>
        </div>
      </div>
    <?php
    $i=($i+1);
  }
}else{
  get_template_part('/template-parts/content-none');
}


