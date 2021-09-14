<?php
/**
 * Blog meta template
 * 
 * @package JobGrids
 */
$post_id=get_the_ID(  );
$article_terms=wp_get_post_terms($post_id,['category']);

if(empty($article_terms) && !is_array($article_terms)){
  return;
}

?>
<div class="meta-details">

        <ul class="<?php if(is_single(  )){ echo 'custom-flex post-meta'; } ?>" >
          <!-- Category and tag -->
          <?php
            foreach($article_terms as $key=>$article_term){
              ?>
                <li>
                  <a href="<?php echo esc_url(get_term_link( $article_term )) ?>">
                    <i class="lni lni-tag"></i>
                    <?php echo esc_html( $article_term->name ); ?>
                  </a>
                </li>
              <?php
            }
          ?>
          <!-- Article post Date -->
          <li>
            <?php jobgrids_posted_on(); ?>
          </li>
          <!-- Article post count -->
          <li>
            <a href="#">
              <i class="lni lni-eye"></i> 
              <?php 
                getPostViews($post_id); 
               echo setPostViews($post_id) ;
              ?>
            </a>
          </li>
        </ul>
   
  
</div>