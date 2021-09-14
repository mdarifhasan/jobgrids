<?php
/**
 * Kirki Customizer to add customizer field and do customization
 * 
 * @package JobGrids
 * 
 */


namespace JobGrids_THEME\Inc;

use JobGrids_THEME\Inc\Traits\Singleton;
use Kirki;

class JobGrids_Kirki_Customizer{
    use Singleton;
   public function __construct(){

    $this->kirki_customizer();
   }
   public function kirki_customizer(){
    $config_id='jobgrids_config_id';

    Kirki::add_config( $config_id, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    /**
     * Header Options
     */
    Kirki::add_panel('header_options',[
        'priority'      =>100,
        'title'         =>esc_html__( 'Header Options','jobgrids' ),
        'description'   =>esc_html__( 'Header All options are here','jobgrids' )
    ]);
    // Header functionlity
    Kirki::add_section('header_functionality',[
        'title'         =>esc_html__( 'Header functionality','jobgrids' ),
        'panel'         =>'header_options'
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'switch',
        'label'         =>esc_html__( 'Header button show','jobgrids' ),
        'settings'      =>'header_btn_show',
        'section'       =>'header_functionality',
        'default'       =>'on',
        'choices'       =>[
            'on'          =>esc_html__( 'Show','jobgrids' ),
            'off'          =>esc_html__('Hide','jobgrids')
        ]
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'link',
        'section'       =>'header_functionality',
        'settings'      =>'header_btn_link',
        'label'         =>esc_html__('Header button URL','jobgrids'),
        'default'       =>esc_url(get_home_url(  ))
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'text',
        'section'       =>'header_functionality',
        'settings'      =>'header_btn_txt',
        'label'         =>esc_html__('Header button text','jobgrids'),
        'default'       =>esc_html__('Contact Me','jobgrids')
    ]);
    // Header menu position 
    Kirki::add_field($config_id,[
        'type'          =>'select',
        'section'       =>'header_functionality',
        'label'         =>esc_html__( 'Menu postition','jobgrids' ),
        'settings'      =>'header_menu_position',
        'default'       =>'right-menu',
        'choices'       =>[
            'right-menu'    =>esc_html__( 'Right Menu', 'jobgrids' ),
            'left-menu'     =>esc_html__( 'Left Menu', 'jobgrids' )
        ]
    ]);
    /**
     * Faq panel
     */
    Kirki::add_section('faq_section',[
        'priority'      =>160,
        'title'         =>esc_html__( 'Faq','jobgrids' ),
        'description'   =>esc_html__('Faq page section','jobgrids')
    ]);
    // Faq repeater field
    Kirki::add_field( $config_id, [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Add new faq', 'jobgrids' ),
        'section'     => 'faq_section',
        'priority'    => 10,
        'transport'   =>'auto',
        'row_label' => [
            'type'  => 'text',
            'value' => esc_html__( 'Faq', 'jobgrids' ),
        ],
        'button_label' => esc_html__('"Add new Faq" ', 'jobgrids' ),
        'settings'     => 'faqs',
        'default'      => [
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
            [
                'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
                'faq_desc'  =>esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids' )
            ],
        ],
        'fields' => [
            'faq_title' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Ttitle', 'kirki' ),
                'description' => esc_html__( 'This will be the title for your faq', 'jobgrids' ),
                'default'     => esc_html__('Lorem ipsum dolor sit amet consectetur','jobgrids')
            ],
            'faq_desc'  => [
                'type'        => 'textarea',
                'label'       => esc_html__( 'Description', 'jobgrids' ),
                'description' => esc_html__( 'This will be the description ', 'jobgrids' ),
                'default'     => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit molestie, metus ultrices tincidunt imperdiet quis suscipit potenti orci velit, fermentum consequat hac feugiat quisque interdum sociis. Cum','jobgrids')
            ],
        ],
            'choices' => [
                'limit' => 6
            ],
    ] );
    /**
     * Footer options
     */
    Kirki::add_panel('footer_options',[
        'priority'      =>170,
        'title'         =>esc_html__( 'Footer Options','jobgrids' ),
    ]);
    // Footer top
    Kirki::add_section('footer_top',[
        'title'         =>esc_html__( 'Footer Top','jobgrids' ),
        'panel'         =>'footer_options'
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'text',
        'settings'      =>'download_txt_title',
        'label'         =>esc_html__( 'Download Text', 'jobgrids' ),
        'default'       =>esc_html__( 'Download Our Best Apps', 'jobgrids'),
        'section'       =>'footer_top'
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'textarea',
        'settings'      =>'download_txt_desc',
        'label'         =>esc_html__( 'Download Description', 'jobgrids' ),
        'default'       =>esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed  do eiusmod tempor incididunt ut labore et dolore', 'jobgrids'),
        'section'       =>'footer_top'
    ]);
    Kirki::add_field($config_id,[
        'type'          =>'repeater',
        'label'         =>esc_html__( 'Add new download button', 'jobgrids' ),
        'section'       =>'footer_top',
        'row_label'     =>[
            'type'          =>'text',
            'value'         =>esc_html__( 'Download button', 'jobgrids' )
        ],
        'button_label'  =>esc_html__( 'Add new button','jobgrids' ),
        'settings'      =>'download_btns',
        'default'      =>[
            [
                'download_btn_link'  =>esc_url('https://www.google.com/'),
                'download_btn_txt'   =>esc_html__( 'App Store','jobgrids' ),
                'download_btn_icon'  =>esc_html('dashicons-controls-play')
            ],
            [
                'download_btn_link'  =>esc_url('https://www.google.com/'),
                'download_btn_txt'   =>esc_html__( 'Play Store','jobgrids' ),
                'download_btn_icon'  =>esc_html('dashicons-controls-play')

            ],
            
        ],
        'fields'        =>[
            'download_btn_link'      =>[
                'type'               =>'link',
                'label'              =>esc_html__('Download Button URL','jobgrids'),
                'default'            =>esc_url( 'https://www.google.com/' )
                
            ],
            'download_btn_txt'       =>[
                'type'               =>'text',
                'label'              =>esc_html__('Download Button text','jobgrids'),
                'default'            =>esc_html__('App Store','Jobgrids')
            ],
            'download_btn_icon'      =>[
                'type'               =>'dashicons',
                'label'              =>esc_html__('Icon','jobgrids'),
                'default'            =>'dashicons-controls-play'
            ]
        ],
        'choices'=>[
            'limit'                  =>3
        ]

    
    ]);

   }
   

   
}
?>