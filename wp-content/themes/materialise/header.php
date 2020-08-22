<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialise
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()){ ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } wp_head();
$materialise_topbar= get_theme_mod( 'materialise_display_topbar_setting', 0);
$materialise_social = get_theme_mod( 'materialise_display_social_setting', 0);
$materialise_mail = get_theme_mod( 'materialise_mail_address');
$materialise_contact = get_theme_mod( 'materialise_contact_number');
$materialise_social_right = get_theme_mod( 'materialise_social_right');
$materialise_logo_center = get_theme_mod( 'materialise_logo_center', 1);
if($materialise_social_right!=0){
	$materialise_social_class='social_right';
	$materialise_detail_class='detail_left';
}else{
	$materialise_social_class='social_left';
	$materialise_detail_class='detail_right';
}
if($materialise_logo_center!=0){
	$logo_position='col-md-12 col-sm-12 col-xs-12 text-center';
	$menu_position='col-md-12 col-sm-12 col-xs-12 menu_center';
}else{
	$logo_position='col-md-2 col-sm-2 col-xs-12 text-center';
	$menu_position='col-md-10 col-sm-10 col-xs-12 menu_right';
}
 ?>
</head>
<body <?php body_class(); ?>>
<!-- Wrapper Start -->
<div class="wrapper">
<header id="home1top">
		<div class="container-fluid top">
				<div class="container">
				<?php if($materialise_topbar!=0){ ?>
					<div class="col-md-12 col-sm-12 col-xs-12 top-space">
						<div class="col-md-4 col-sm-4 col-xs-12 top-header <?php echo esc_attr($materialise_social_class); ?>">
						<?php if($materialise_social!=0){ ?>
							<div class="social-share">
							<?php for($i=1; $i<=5; $i++){
								$materialise_social_icon= get_theme_mod( 'materialise_social_icon_'.$i);
								$materialise_social_link = get_theme_mod( 'materialise_social_link_'.$i);
							if($materialise_social_icon!='' && $materialise_social_link!=''){ ?>
								<a href="<?php echo esc_url($materialise_social_link); ?>" target="_blank"> <i class="<?php echo esc_attr($materialise_social_icon); ?>"></i> </a>
							<?php } } ?>
							</div>
						<?php } ?>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12 top-search <?php echo esc_attr($materialise_detail_class); ?>">
						<?php if($materialise_contact!=''){ ?>
						  <span class="top-phn"><i class="fa fa-phone"> <?php echo esc_attr($materialise_contact); ?></i></span>
						<?php } if($materialise_mail!=''){ ?>
						  <span class="top-mail"><i class="fa fa-envelope"> <?php echo esc_attr($materialise_mail); ?></i></span>
						<?php } ?>
						</div>
					</div>
				<?php } ?>
					<div class="col-md-12 col-sm-12 col-xs-12 main-menu">
						<?php $materialise_logo_id = get_theme_mod( 'custom_logo' );
								$materialise_logo_data = wp_get_attachment_image_src( $materialise_logo_id , 'full' );
								$materialise_logo = $materialise_logo_data[0];	?>
						<div class="<?php echo esc_attr($logo_position); ?> logo">
							<a class="logo-wrapper" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if(isset($materialise_logo)){ ?>
							<img src="<?php echo esc_url($materialise_logo); ?>" class="img-responsive" alt="<?php bloginfo( 'name' ); ?>" >
							<?php }else{ 
							bloginfo( 'name' ); } ?></a>
						</div>
				<div class="<?php echo esc_attr($menu_position); ?> site-menu">
				<nav class="navbar navbar-default menu">
					<div class="menu-head">
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						  </button>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
						<?php wp_nav_menu( array(
									'theme_location' => 'materialise_primary',
									'menu_class' => 'nav navbar-nav materialise-menu',
									'fallback_cb' => 'materialise_fallback_page_menu',
									'walker' => new materialise_nav_walker(),
									)
								);	?>
						</div>
					</div>
				</nav>
			</div>
				</div>
				</div>
		</div>
	</header>