<?php $materialise_widget1_title= get_theme_mod( 'materialise_widget1_title');
?><!-- front-page widget 1 -->
<div class="container-fluid home-widget">
	<div class="container">
		<div class="row">
		<?php if($materialise_widget1_title!=''){ ?>
			<div class="col-md-12 blogs-title">
				<h1><?php echo esc_attr($materialise_widget1_title); ?></h1>
				<div class="title-bg">
					<div class="materialise-img"></div>
				</div>
			</div>
		<?php } ?>
			<div class="col-md-12 col-sm-12 col-xs-12 home-w_area1">
				<?php if ( is_active_sidebar( 'materialise-home-widget1' ) ){
				dynamic_sidebar( 'materialise-home-widget1' );
				} ?>
			</div>
		</div>
	</div>
</div>