<!-- Breadcum start -->
<?php $materialise_breadcrumbs_color= get_theme_mod( 'materialise_theme_color_setting', '#446084');
$materialise_breadcrumbs_layout= get_theme_mod( 'materialise_breadcrumbs_layout', 'text-left'); 
?>
<div class="container-fluid page-heading-inner" style="<?php if(get_header_image()!=''){?> background-image:url(<?php header_image(); ?>); <?php }else{ ?>background-color:<?php echo esc_html( $materialise_breadcrumbs_color ); ?>;<?php } ?>">
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12 materialise-breadcrumbs <?php echo esc_attr($materialise_breadcrumbs_layout); ?>">
		<?php if(is_singular()){ ?>
			<h1><span><?php the_title(); ?></span></h1>
		<?php }else{
			the_archive_title( '<h1><span>', '</span></h1>' );
			} if (function_exists('materialise_breadcrumbs')){ materialise_breadcrumbs(); } ?>
		</div>
	</div>
</div>
<!-- Breadcum End -->

