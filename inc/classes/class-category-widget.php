<?php
/**
 * Category Widget 
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;


use JobGrids_THEME\Inc\Traits\Singleton;

use WP_Widget_Categories;

class Category_Widget extends WP_Widget_Categories{
	
    use Singleton;
    public function __construct(){
        parent::__construct(
            'jobgrids-category-widget' , //Unique Id
            __('JobGrids Category Widget','jobgrids') //Name of the widget
		);
		$this->setup_hooks();

    }
	public function setup_hooks(){
			add_filter( 'widget_title', [$this,'widget_title_base'],10,3);
	}
	public function widget_title_base( $title, $instance, $id_base ){
		// Target the categories base
		if( 'categories' === $id_base ) // Just make sure the base is correct, I'm not sure here
			add_filter( 'wp_list_categories', [$this,'jobgrids_list_category'], 11, 2 );
			
		return $title;
	}
	function jobgrids_list_category( $output, $args )
	{
		// Only run the filter once
		remove_filter( current_filter(), __FUNCTION__ );
	
		// Get all the categories
		$categories = get_categories( $args );

	
		$output = '';
		
		$output .= '<div class="widget categories-widget"><ul class="custom">';
		foreach ( $categories as $category ) {
			
			$output .= '<li><a href="'.get_category_link($category->cat_ID).'">'.$category->name;

			$output .= '<span>'.$category->count.'</span></a></li>';
			
		}
		$output .= '</ul></div>';
	
		return $output;
	}

}
?>