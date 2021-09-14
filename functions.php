<?php
/**
 * Theme Functions
 * 
 * @package JobGrids
 */
if(!defined('JobGrids_DIR_PATH')){
    define('JobGrids_DIR_PATH',untrailingslashit( get_template_directory() ));
}
if(!defined('JobGrids_DIR_PATH_URI')){
    define('JobGrids_DIR_PATH_URI',untrailingslashit( get_template_directory_uri() ));
}
require_once  JobGrids_DIR_PATH.'/inc/helpers/autoloader.php';
require_once JobGrids_DIR_PATH.'/inc/helpers/template-tags.php';
function JobGrids_theme_get_instance(){
    JobGrids_THEME\Inc\JobGrids_Theme::get_instance();
}
JobGrids_theme_get_instance();

