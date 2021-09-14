<?php
/**
 * Entry Header file of blog post
 * 
 * @package JobGrids
 */
?>
<div class="image">
  <?php
    if(is_single( )){
      ?>
        <div class="post-thumbnils">
          <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="" />
        </div>
      <?php
    }else{
      if(has_post_thumbnail( )){
        ?>
          <img class="thumb" src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="" loading="lazy" />
        <?php
       
      } 
    }
  ?>
</div>
<div class="content-body">
  <?php
    if(is_single()){
      printf('<h4 class="post-title" style="margin:35px 0 25px 0;"><a href="%1$s">%2$s</a></h4>',
        esc_url(get_permalink()),
        wp_kses_post(get_the_title())
      );
    }else{
      printf('<h4 class="title"><a href="%1$s">%2$s</a></h4>',
        esc_url(get_permalink()),
        wp_kses_post(get_the_title())
      );
    }
    
  ?>

