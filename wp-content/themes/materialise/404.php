<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_anesc_attr_error_404_Page
 *
 * @package materialise
 */

get_header(); 
get_template_part('breadcrumbs'); ?>
	
<!-- 404 Start -->
<div class="container-fluid bs-margin bs-404">
	<div class="container blog_gallery">
		<div class="row ep-error">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<h1 class="error-title"><?php esc_attr_e('404','materialise'); ?> <span> <?php esc_attr_e('Error','materialise'); ?> </span></h1>
				<h3><?php esc_attr_e('Content Not Found','materialise'); ?></h3>
				<p><i class="fa fa-info-circle"></i> <?php esc_attr_e('Oops! The page you requested was not found.','materialise'); ?> </p>
				<a class="error-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i> <?php esc_attr_e('Go To Home Page','materialise'); ?></a>
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</div>
<!-- 404 End -->
<?php
get_footer();
