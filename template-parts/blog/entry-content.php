<?php
/**
 * Blog post content template
 * 
 * @package JobGrids
 */

 /**
  * Check if the content has excerpt or not and if the page is single blog page or not.
  * 
  */
    if(has_excerpt( ) && !is_single( )){
        printf('<p>%s</p>',
          esc_html__( wp_trim_words( get_the_excerpt( ), 20,''), 'jobgrids' )
        );
      }elseif(!has_excerpt( ) && !is_single( )){
        printf('<p>%s</p>',
          esc_html__( wp_trim_words( get_the_content( ), 20,''), 'jobgrids' )
        );
      }else{
        esc_html( the_content() );
      }
      /**
       * 
       * Check if the content word is less than 30 or not and check if the page is not a single blog page
       * if it is grater than 30 than its going to print read more
       */
      if(!is_single( )){
        if(str_word_count(get_the_content()) >= 20 || str_word_count(get_the_excerpt()) >= 20 ){
          ?>
            <div class="button">
              <a href="<?php echo esc_url(get_permalink( )); ?>" class="btn">
                <?php echo esc_html('Read More');?>
              </a>
            </div>
          <?php
        }else{
          esc_html( '' );       
      }
    }
        ?>
  <!-- End of the content body -->
    </div>

 
