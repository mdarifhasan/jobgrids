<?php
/**
 * Bootstraps The Theme
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class JobGrids_Theme{
    use Singleton;
    protected function __construct(){
        // Load Classes
        Assets::get_instance();
        Menus::get_instance();
        Sidebars::get_instance();
        Customize_Comments::get_instance();
        Social_Widget::get_instance();
        Category_Widget::get_instance();
        Popular_Post_Widget::get_instance();
        // JobGrids_Customizer::get_instance();
        JobGrids_Kirki_Customizer::get_instance();
 


        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_action('after_setup_theme',[$this,'theme_setup']);
    }
    public function theme_setup(){
        // Tittle
        add_theme_support( 'title-tag');
        // Html5
        add_theme_support('HTML5',[
            'comments-form',
            'comments-list',
            'gallery',
            'search-form',
            'style',
            'scripts'
        ]);
        // Post Thumbnails
        add_theme_support('post-thumbnails');
        // Automatic Feed Links
        global $wp_version;
        if(version_compare($wp_version,'3.0','>=')){
            add_theme_support('automatioc-feed-links');
        }else{
            automatic_feed_links();
        }
        // Customizer Refresh Widget
        add_theme_support('customizer-refresh-widgets');
        // Align Wide support for post block
        add_theme_support('align-wide');
        // Editor-style
        add_editor_style( );
        // Custom Logo
        add_theme_support('custom-logo',[
            'header-text'=>['site-title','site-description'],
            'height'     =>250,
            'width'      =>250,
            'flex-height'=>true,
            'flex-width' =>true
        ]);
        remove_theme_support( 'widgets-block-editor' );
        // Adding excerpt for page
        add_post_type_support( 'page', 'excerpt' );
    }
}
?>