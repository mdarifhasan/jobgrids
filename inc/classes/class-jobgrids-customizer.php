<?php
/**
 * Theme Customizer
 * 
 * @package JobGrids
 */


namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;

class JobGrids_Customizer{
    use Singleton;
   public function __construct(){

    $this->setup_hooks();
   }
   public function setup_hooks(){
       /**
        * Actions and filter
        */
        add_action('customize_register',[$this,'customizer_register']);
        add_action( 'wp_head',[$this,'customize_css'] );
        add_action('customize_preview_init',[$this,'customizer_live_preview']);
   }
   public function customizer_live_preview(){
       wp_enqueue_style('theme-customizer',JobGrids_DIR_PATH_URI.'/assets/js/theme-customize.js',['jquery','customize-preview'],filemtime(JobGrids_DIR_PATH.'/assets/js/theme-customize.js'),true);
   }
   public function customizer_register($wp_customize){
       /**
        * Header Options
        */

        // Panel
        $wp_customize->add_panel('jobgrids_header_panel',[
            'title'         =>__('Header Options','jobgirds'),
            'priority'      =>50
        ]);
        // Menu Section
        $wp_customize->add_section('jobgrids_header_menu_section',[
            'title'         =>__('Header Menu','jobgrids'),
            'panel'         =>'jobgrids_header_panel'
            
        ]);
            // Menu Alignment
        $wp_customize->add_setting('jobgrids_header_menu_alignment',[
            'default'       =>'right-menu'
        ]);
        $wp_customize->add_control('jobgrids_header_menu_alignment',[
            'label'         =>__('Header menu alignment','jobgrids'),
            'section'       =>'jobgrids_header_menu_section',
            'setting'       =>'jobgrids_header_menu_alignment',
            'type'          =>'radio',
            'choices'       =>[
                'right-menu'    =>__('Right Menu','jobgrids'),
                'left-menu'     =>__('Left Menu','jobgrids'),
            ]
        ]);
        // Header contact section
        $wp_customize->add_section('jobgrids_header_contact_btn_section',[
            'title'         =>__('Header Contact Button','jobgrids'),
            'panel'         =>'jobgrids_header_panel'
            
        ]);
            // Header contact button hidden option
        $wp_customize->add_setting('jobgrids_header_contact_btn_show',[
            'default'       =>'d-block'
        ]);
        $wp_customize->add_control('jobgrids_header_contact_btn_show',[
            'label'         =>__('Contact button show','jobgrids'),
            'section'       =>'jobgrids_header_contact_btn_section',
            'type'          =>'radio',
            'choices'       =>[
                'd-block'       =>__('Show','jobgrids'),
                'd-none'        =>__('Hide','jobgrids')
            ]
            ]);
            // Header contact button text
        $wp_customize->add_setting('jobgrids_header_contact_btn_txt',[
            'default'       =>'Contact Me'
        ]);
        $wp_customize->add_control('jobgrids_header_contact_btn_txt',[  
            'label'         =>__('Header contact button text','jobgrids'),
            'section'       =>'jobgrids_header_contact_btn_section',
            'setting'       =>'jobgrids_header_contact_btn_txt',
            'type'          =>'text'
        ]);
            // Header contact button url
        $wp_customize->add_setting('jobgrids_header_contact_btn_url',[
            'default'       =>get_home_url( )
        ]);
        $wp_customize->add_control('jobgrids_header_contact_btn_url',[
            'label'         =>__('Header contact button url','jobgrids'),
            'section'       =>'jobgrids_header_contact_btn_section',
            'setting'       =>'jobgrids_header_contact_btn_url',
            'type'          =>'url',
            'input_attrs'   =>[
                'placeholder'    =>__('Input button url','jobgrids')
            ]
        ]);
        
        /**
         * Footer Customizer Option
         */   
        // Footer Panel
        $wp_customize->add_panel('jobgrids_footer_panel',[
            'title'         =>__('Footer Options','jobgrids'),
            'priority'      =>100
        ]);
        // Footer Section
        $wp_customize->add_section('jobgrids_footer_bootom_section',[
            'title'         =>__('Footer Bottom','jobgrids'),
            'panel'         =>'jobgrids_footer_panel'
        ]);
        // Copyright text
        $wp_customize->add_setting('jobgrids_copyright_txt',[
            'default'       =>__('Designed and Developed by Arif Hasan'),
            'transport'     =>'postMessage'
        ]);
        $wp_customize->add_control('jobgrids_copyright_txt',[
            'section'       =>'jobgrids_footer_bootom_section',
            'label'         =>__('Copyright text'),
            'type'          =>'text'
            
        ]);
        // Copyright text alignment
        $wp_customize->add_setting('jobgrids_copyright_txt_align',[
            'default'       =>'center',
            'transport'     =>'postMessage'
        ]);
        $wp_customize->add_control('jobgrids_copyright_txt_align',[
            'section'       =>'jobgrids_footer_bootom_section',
            'label'         =>__('Copyright text Alignment'),
            'type'          =>'radio',
            'choices'       =>[
                'right'         =>__('Right','jpbgrids'),
                'center'        =>__('Center','jobgrids'),
                'left'          =>__('Left','jobgrids')
            ]
            
        ]);

        // Theme default customizer transport is changed to postMessage to increase user interface
       
   }
   public function customize_css(){

   }


    

   
}
?>