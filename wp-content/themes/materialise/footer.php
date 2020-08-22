<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package materialise
*/
$materialise_display_footer_menu= get_theme_mod( 'materialise_display_footer_menu', 0);
$materialise_footer_layout= get_theme_mod( 'materialise_footer_layout', 'left');
$materialise_footer_credit= get_theme_mod( 'materialise_footer_credit');
$materialise_footer_company= get_theme_mod('materialise_footer_company');
$materialise_footer_link= get_theme_mod( 'materialise_footer_link');
if($materialise_footer_layout=='left'){ 
$credit_class='col-md-6 credit-left'; 
$menu_class='col-md-6 menu-right';}
if($materialise_footer_layout=='right'){ 
$credit_class='col-md-6 credit-right'; 
$menu_class='col-md-6 menu-left';}
if($materialise_footer_layout=='center'){ 
$credit_class='col-md-12 credit-class text-center'; 
$menu_class='col-md-12 menu-class text-center';}
?>
<!-- Footer Start -->
<footer>
	<div class="row footer-color">
		<div class="container footer-content">
		<div class="col-md-4 col-sm-4 col-xs-12 materialise-footer-widget">
			<?php if ( is_active_sidebar( 'materialise-footer-widget' ) ){
						dynamic_sidebar( 'materialise-footer-widget' );
					} ?>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 materialise-footer-widget-center">
			<?php if ( is_active_sidebar( 'materialise-footer-widget-center' ) ){
						dynamic_sidebar( 'materialise-footer-widget-center' );
					} ?>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 materialise-footer-widget-right">
			<?php if ( is_active_sidebar( 'materialise-footer-widget-right' ) ){
						dynamic_sidebar( 'materialise-footer-widget-right' );
					} ?>
		</div>
		</div>
	</div>
	<div class="container-fluid footer-copy">
		<div class="container footer-copy">
			<div class="<?php echo esc_attr($menu_class); ?>">
				<?php if($materialise_display_footer_menu!=0){
				wp_nav_menu( array('theme_location' => 'materialise_footer'));	
				} ?>
			</div>
			<div class="<?php echo esc_attr($credit_class); ?>">
				<p>
				<?php if($materialise_footer_credit!=''){ echo esc_attr($materialise_footer_credit); }
				if($materialise_footer_company!='' && $materialise_footer_link!=''){ ?>
				<a href="<?php echo esc_url($materialise_footer_link); ?>"><?php echo esc_attr($materialise_footer_company); ?></a> | 
				<?php } ?>
				<?php esc_attr_e('Made With','materialise'); ?>
				<a href="<?php echo esc_url('https://darshansaroya.com/product/materialise/'); ?>"><?php esc_attr_e('Materialise Theme','materialise');  ?></a>
				</p>
			</div>
		</div>	
	</div>	
</footer>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>
	<?php wp_footer(); ?>
</body>
</html>