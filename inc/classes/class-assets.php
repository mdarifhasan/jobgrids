<?php
/**
 * Assets The Theme
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class Assets{
    use Singleton;
    protected function __construct(){
        // Load Classes
        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_action('wp_enqueue_scripts',[$this,'register_style']);
        add_action('wp_enqueue_scripts',[$this,'register_script']);
        add_action('wp_enqueue_scripts',[$this,'register_fonts']);
    }
    public function register_style(){
        // Registering style
        wp_register_style('stylesheet',get_stylesheet_uri(),[],filemtime(JobGrids_DIR_PATH.'/style.css'),'all');
        wp_register_style('bootstrap-min-css',JobGrids_DIR_PATH_URI.'/assets/css/bootstrap.min.css',[],false,'all');
        wp_register_style('LineIcons',JobGrids_DIR_PATH_URI.'/assets/css/LineIcons.2.0.css',[],false,'all');
        wp_register_style('animate.css',JobGrids_DIR_PATH_URI.'/assets/css/animate.css',[],false,'all');
        wp_register_style('tiny-slider',JobGrids_DIR_PATH_URI.'/assets/css/tiny-slider.css',[],false,'all');
        wp_register_style('glightbox',JobGrids_DIR_PATH_URI.'/assets/css/glightbox.min.css',[],false,'all');
        wp_register_style('main',JobGrids_DIR_PATH_URI.'/assets/css/main.css',[],filemtime(JobGrids_DIR_PATH.'/assets/css/main.css'),'all');
        // Enqueuing style
        wp_enqueue_style('styleshhet');
        wp_enqueue_style('bootstrap-min-css');
        wp_enqueue_style('LineIcons');
        wp_enqueue_style('animate.css');
        wp_enqueue_style('tiny-slider');
        wp_enqueue_style('glightbox');
        wp_enqueue_style('main');
        
    }
    public function register_script(){
        // Registering Scripts
        wp_register_script('bootstrap.min',JobGrids_DIR_PATH_URI.'/assets/js/bootstrap.min.js',['jquery'],false,true);
        wp_register_script('wow.min',JobGrids_DIR_PATH_URI.'/assets/js/wow.min.js',['jquery'],false,true);
        wp_register_script('tiny-slider',JobGrids_DIR_PATH_URI.'/assets/js/tiny-slider.js',['jquery'],false,true);
        wp_register_script('glightbox',JobGrids_DIR_PATH_URI.'/assets/js/glightbox.min.js',['jquery'],false,true);
        wp_register_script('main',JobGrids_DIR_PATH_URI.'/assets/js/glightbox.min.js',[],filemtime(JobGrids_DIR_PATH.'/assets/js/main.js'),true);
        // Enqueueing Scripts
        wp_enqueue_script('bootstrap.min');
        wp_enqueue_script('wow.min');
        wp_enqueue_script('tiny-slider');
        wp_enqueue_script('glightbox');
        wp_enqueue_script('main');
    }
    public function register_fonts(){
        wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap',false);
    }
}
?>