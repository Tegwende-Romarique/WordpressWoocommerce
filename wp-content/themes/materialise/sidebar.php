<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialise
 */
?>

<div class="col-md-4 col-sm-12 col-xs-12 theme-sidebar">
	<?php if ( is_active_sidebar( 'materialise-sidebar' ) ){
		dynamic_sidebar( 'materialise-sidebar' );
		} ?>
</div>
