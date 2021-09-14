<?php
/**
 * Popular Post Widget
 * 
 * @package JobGrids
 */


namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;
use WP_Widget;
use WP_Query;

class Popular_Post_Widget extends WP_Widget{
    use Singleton;
    public function __construct(){
        parent::__construct(
            'jobgrids-popular-post-widget',       //Unique id
            __('JobGrids Popular Post Widget','jobgrids')  //Name of the widget
        );
    }
    public function form($instance){
        // Display the output in the admin panel
      $title=!empty($instance['title'])?$instance['title']:'';
      $tot=!empty($instance['tot'])?absint($instance['tot']):4;

      ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>">
                <?php esc_html_e( 'Popular Post Title', 'jobgrids' ) ?>
            </label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')) ?>" id="<?php echo esc_attr($this->get_field_id('title')) ?>" value='<?php echo esc_attr($title) ?>' placeholder="<?php esc_html_e( 'Title', 'jobgrids' ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tot')) ?>">
                <?php esc_html_e( 'Number of Popolar posts', 'jobgrids' ) ?>
            </label>
            <input class="widefat" type="number" name="<?php echo esc_attr($this->get_field_name('tot')) ?>" id="<?php echo esc_attr($this->get_field_id('tot')) ?>" value='<?php echo esc_attr($tot) ?>' placeholder="<?php esc_html_e( 'Number of posts', 'jobgrids' ) ?>">
        </p>
      <?php
        
    }
    public function widget($args,$instance){
        // Display out of the widget in the frontend
        $tot=absint($instance['tot']);
        $title=$instance['title'];

        $args['before_widget'];
        
            $post_args = [
                'meta_key'  => 'jobgrids_post_views_count', // set custom meta key
                'orderby'    => 'meta_value_num',
                'order'      => 'DESC',
                'posts_per_page' => $tot
            ];
            $post_query = new WP_Query( $post_args );
            if( $post_query->have_posts(  ) ){
                ?>
                    <div class="widget popular-feeds">
                        <?php echo $args['before_title'].esc_html( $title,'jobgrids' ).$args['after_title'];?>
                        <?php
                            while($post_query->have_posts(  )){
                                $post_query->the_post(  );
                                ?>
                                    <div class="single-popular-feed">
                                        <div class="feed-desc">
                                            <h6 class="post-title">
                                                <a href="<?php esc_attr_e( get_permalink(),'jobgrids' ) ?>" >
                                                    <?php
                                                        esc_html( the_title(),'jobgrids' )
                                                    ?>
                                                </a >
                                            </h6>
                                            <span class="time">
                                                <i class="lni lni-calendar"></i> 
                                                <?php
                                                    esc_html_e(get_the_date( ));
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata(  );
                        ?>
                        
                    </div>
                <?php
            }
            
            
        $args['after_widget'];
    }
    public function update($new_instance,$old_instance){
        // Update and save widget data to database
        $instance=[];
        $instance["title"]=isset($new_instance["title"])?strip_tags($new_instance["title"]) : '';
        $instance["tot"]=isset($new_instance["tot"])?strip_tags($new_instance["tot"]) : '';
        return $instance;
        


    }

    

   
}
?>