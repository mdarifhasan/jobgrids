<?php
/**
 * Social Widget
 * 
 * @package JobGrids
 */

/**
 *  Problem is i cant accessing form method value ($social_label and $label_store) outside of it.i want to use it in widget method 
 * another problem is $instance[$social_widge_field]
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Social_Widget extends WP_Widget{
    use Singleton;
    public function __construct(){
        parent::__construct(
            'jobgrids-social-widget',       //Unique id
            __('JobGrids Social widget','jobgrids')  //Name of the widget
        );
    }
    /**
     * Declaring variable to store the name of the field which will use in the social icon class
     */
    public $label_store=[]; 
    public $social_label=[];
    public function form($instance){
        // Display the output in the admin panel
        $social_widget_fields=[
            'social-facebook-url',
            'social-twitter-url',
            'social-linkedin-url',
            'social-pinterest-url',
        ];
        echo esc_html_e( "Please use solid url.Otherwise it won't work ", 'jobgrids' ).'<br>' ;
        foreach($social_widget_fields as $social_widget_field){
            $social_link=!empty("$social_widget_field")?$instance["$social_widget_field"]:get_home_url();
            $social_label=ucwords(str_replace('social-','',$social_widget_field));
            $social_label=str_replace('-',' ',$social_label);
            $social_placeholder=str_replace('url','',$social_label);
            
            ?>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id("$social_widget_field")) ?>">
                        <?php echo esc_html($social_label);?>
                    </label>
                    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id("$social_widget_field")) ?>" name="<?php echo esc_attr($this->get_field_name("$social_widget_field")); ?>" value="<?php echo esc_attr($social_link); ?>" placeholder="<?php echo $social_placeholder; ?>" >
                </p>
            <?php
           
            
            $this->label_store[]=$social_label;   
        }
        
        return $this->label_store;
        
    }
    public function widget($args,$instance){
        // Display out of the widget in the frontend
        $args['before_widget'];

        
        ?>
            <div class="footer-social">
                <ul>
                    <?php
                        
                            foreach($this->label_store as $this->lable){
                                ?>
                                    <li>
                                        <a href="#"><i class="lni lni-<?php echo esc_attr( $label )?>-original"></i></a>
                                    </li>
                                <?php
                            }
                        
                            
                    ?>
                </ul>
            </div>
        <?php
        $args['after_widget'];
    }
    public function update($new_instance,$old_instance){
        // Update and save widget data to database

        $instance=[];
        $instance["$social_widget_field"]=isset($new_instance["$social_widget_field"])?strip_tags($new_instance["$social_widget_field"]) : '';
        return $instance;


    }

    

   
}
?>