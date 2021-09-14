<?php
/**
 * Header Template file of the theme
 * 
 * @package JobGrids
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes( ); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head( ); ?>
    <style>
        .breadcrumbs{
            background-image:url("<?php echo esc_url(get_the_post_thumbnail_url());?>")
        }
    </style>
</head>
<body <?php body_class( ) ?>>
    <?php 
        if(function_exists(wp_body_open( ))){
            wp_body_open( );
        }
    ?>
<div id="page" class="site">
    <header id="masthead" class="site-header header">
        <?php get_template_part('/template-parts/header/nav'); ?>
    </header>
