<?php
/**
 * Sidebar of the theme
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class Sidebars{
    use Singleton;
    protected function __construct(){
        // Load Classes
        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_action( 'widgets_init' , [$this, 'register_sidebars'] );
        // Register custom widget
        add_action( 'widgets_init' , [$this, 'widget_register'] );
        add_action( 'widgets_init' , [$this, 'categories_widget_register'] );
    }
    public function register_sidebars(){
        register_sidebar(
            [
                'name'          => __( 'Right Sidebar', 'jobgrids' ),
                'id'            => 'right-sidebar',
                'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'jobgrids' ),
                'before_widget' => '<div class="widget ">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title"><span>',
                'after_title'   => '</span></h5>',
            ]
            );
        register_sidebar(
            [
                'name'          => __( 'Footer Widget area-1', 'jobgrids' ),
                'id'            => 'footer-widget-1',
                'description'   => __( 'Footer column one widget area', 'jobgrids' ),
                'before_widget' => '<div class="single-footer f-about f-link">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ]
            );
        register_sidebar(
            [
                'name'          => __( 'Footer Widget area-2', 'jobgrids' ),
                'id'            => 'footer-widget-2',
                'description'   => __( 'Footer column two widget area', 'jobgrids' ),
                'before_widget' => '<div class="single-footer f-about f-link">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ]
            );
        register_sidebar(
            [
                'name'          => __( 'Footer Widget area-3', 'jobgrids' ),
                'id'            => 'footer-widget-3',
                'description'   => __( 'Footer column three widget area', 'jobgrids' ),
                'before_widget' => '<div class="single-footer f-about f-link">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ]
            );
        register_sidebar(
            [
                'name'          => __( 'Footer Widget area-4', 'jobgrids' ),
                'id'            => 'footer-widget-4',
                'description'   => __( 'Footer column four widget area', 'jobgrids' ),
                'before_widget' => '<div class="single-footer f-about f-link">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ]
            );
    }
    public function widget_register(){
        register_widget('JobGrids_THEME\Inc\Social_Widget');
        register_widget('JobGrids_THEME\Inc\Popular_Post_Widget');
    }
    function categories_widget_register() {
        unregister_widget( 'WP_Widget_Categories' );
        register_widget( 'JobGrids_THEME\Inc\Category_Widget' );
    }
}
?>