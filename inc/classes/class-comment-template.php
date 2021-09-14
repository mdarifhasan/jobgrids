<?php
/**
 * Assets The Theme
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class Jobgrids_Custom_Comment_Template{
    use Singleton;
    protected function __construct(){
        // Load Classes
        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_filter('comment_form_defaults',[$this,'custom_comment_fields']);
        add_action( 'comment_post', [$this,'saving_comment_meta_data'] );
    }
    public function custom_comment_fields($defaults_field){
        $commentAuthor = wp_get_current_commenter();
        $suject_placeholder=__('Your Subject','jobgrids');
        $default_fields['comment_field'] = <<<EOD
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
    }
    public function saving_comment_meta_data( $comment_id ){

        add_comment_meta( $comment_id, 'comment-subject', $_POST[ 'comment-subject' ] );

    }

    
}
?>