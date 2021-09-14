<?php
/**
 * Comments Template of the Theme
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class Customize_Comments{
    use Singleton;
    protected function __construct(){
        // Load Classes
        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_filter('comment_form_default_fields',[$this,'custom_comment_fields']);
        add_action('comment_form_default_fields',[$this,'unset_url_field']);
        add_action( 'comment_post', [$this,'saving_comment_meta_data'] );
    }
    public function custom_comment_fields($defaults_field){
        $commentAuthor = wp_get_current_commenter();

        $name_placeholder=__('Your Name','jobgrids');
        $suject_placeholder=__('Your Subject','jobgrids');

        echo '<div class="row">';
            $default_fields['name'] = <<<EOD
                <div class="col-lg-6 col-12">
                    <div class="form-box form-group">
                    <input
                        type="text"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="Your Name"
                    />
                    </div>
                </div>
            EOD;
            $default_fields['email'] = <<<EOD
                <div class="col-lg-6 col-12">
                    <div class="form-box form-group">
                    <input
                        type="email"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="Your Email"
                    />
                    </div>
                </div>
            EOD;
            $default_fields['comment-subject'] = <<<EOD
                <div class="col-12">
                    <div class="form-box form-group">
                    <input
                        id="comment-subject"
                        type="email"
                        name="#"
                        class="form-control form-control-custom"
                        placeholder="{$suject_placeholder}"
                    />
                    </div>
                </div>
            EOD;
            $default_fields['comment'] = <<<EOD
                <div class="col-12">
                    <div class="form-box form-group">
                    <textarea
                        name="#"
                        rows="6"
                        class="form-control form-control-custom"
                        placeholder="Your Comments"
                    ></textarea>
                    </div>
                </div>
            EOD;
        echo '<div>';
       
        return $default_fields;

    }
    public function saving_comment_meta_data( $comment_id ){
        $commentAuthor = wp_get_current_commenter();
        $comment_id=get_comment_ID(  );
        echo $comment_id;
        wp_die();

        add_comment_meta( $comment_id, 'name', $_POST[ 'name-field' ] );
        add_comment_meta( $comment_id, 'comment-subject', $_POST[ 'comment-subject' ] );

    }
    public function unset_url_field($fields){
        /**
         * Remove wordpress default url field
         */
        if( isset($fields['url']) ){

            unset($fields['url']);
        }
        return $fields;
    }
    
}
?>