<?php
/**
 * The shop page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Materialise
 */
$materialise_slider= get_theme_mod( 'materialise_display_slider', 1);
$materialise_service= get_theme_mod( 'materialise_display_service', 1);
$materialise_widget1= get_theme_mod( 'materialise_display_widget1', 1);
$materialise_widget2= get_theme_mod( 'materialise_display_widget2', 1);
get_header();
if($materialise_slider==1){
get_template_part('template/materialise','slider');
} if($materialise_service==1){
get_template_part('template/materialise','services');
} if($materialise_widget1==1){
get_template_part('template/materialise','widget1');
}
get_template_part('template/materialise','blog');
if($materialise_widget2==1){
get_template_part('template/materialise','widget2');
}
get_footer();
?>