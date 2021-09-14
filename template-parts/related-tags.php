<?php
/**
 * Template for displaying related tags
 */

$post_id=get_the_ID(  );
$article_terms=wp_get_post_terms($post_id,['post_tag']);

if(!empty($article_terms) && is_array($article_terms)){

?>
  <div class="post-tags popular-tag-widget mb-xl-40">
    <h5 class="tag-title"><?php esc_html_e( 'Related Tags', 'jobgrids' ) ?></h5>

    <div class="tags">
      <?php
        foreach($article_terms as $key=>$article_term){ 
          ?>
            <a href="<?php echo esc_url(get_term_link( $article_term )) ?>">
              <?php echo esc_html( $article_term->name ); ?>
            </a>
        <?php
        }
      ?>
    </div>
  </div>
<?php
}
