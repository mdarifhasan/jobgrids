<?php
/**
 * Theme Menus
 * 
 * @package JobGrids
 */

namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class Menus{
    use Singleton;
    protected function __construct(){
        // Load Classes
        $this->setup_hooks();

    }
    protected function setup_hooks(){
        /**
         * Actions And Filter
         */
        add_action('init',[$this,'register_menus']);
    }
    public function register_menus(){
        register_nav_menus( 
            [
                'jobgrids-header-menu'  =>esc_html__( 'Header Menu','jobgrids' ),
                'jobgrids-footer-menu'  =>esc_html__( 'Footer Menu', 'jobgrids' )
            ]
            );
    }
    public function get_menu_id($location){
        // Get all menu locations
        $locations=get_nav_menu_locations();
        // Get menu id from their locations 
        $menu_id=$locations[$location];
        return $menu_id;
    }
    public function get_child_menu_items($menu_array,$parent_id){
        $child_menus=[];
        if(!empty($menu_array) && is_array($menu_array)){
            foreach ($menu_array as $menu) {
                if(intval($menu->menu_item_parent)===$parent_id){
                    array_push($child_menus,$menu);
                }
            }
        }
       return $child_menus;
    }

}
?>