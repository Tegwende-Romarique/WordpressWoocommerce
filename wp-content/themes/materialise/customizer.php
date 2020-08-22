<?php
/**
 * materialise Theme Customizer.
 *
 * @package materialise
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function materialise_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	//general settings
	
	$wp_customize->add_section( 'materialise_general_section' , array(
		'title'       => __( 'General Options', 'materialise' ),
		'priority'    => 20,
		'description' => __( 'Theme\'s general settings ', 'materialise' ),
	) );
	
	$wp_customize->add_setting( 'materialise_theme_color_setting', array (
		'default'     => '#446084',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'materialise_theme_color', array(
		'label'    => __( 'Theme Color', 'materialise' ),
		'section'  => 'materialise_general_section',
		'settings' => 'materialise_theme_color_setting',
	) ) );

	$wp_customize->add_setting('materialise_google_font', array(
		'default' => 'Philosopher',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control(new Materialise_Font_Control($wp_customize, 'materialise_google_font', array(
	'label' =>  __('Font for Theme:','materialise'),
	'section' => 'materialise_general_section',
	'settings' => 'materialise_google_font',
	)));
	
	$wp_customize->add_setting('materialise_archive_layout', array(
		'default' => 'masonry',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_archive_layout', array(
		'settings' => 'materialise_archive_layout',
		'type' => 'select',
		'label' => __('Select Archive Page Layout:','materialise'),
		'description' => __('This layout is applied to all archive pages, like Category, Search, Blog and Tag etc.','materialise'),
		'section' => 'materialise_general_section',
		'choices' => array(
			'masonry'=> __('Masonry layout','materialise'),
			'regular'=> __('Simple layout','materialise'),		
			),
		'priority'	=> 25
	));
	
	$wp_customize->add_setting('materialise_archive_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_archive_sidebar', array(
		'settings' => 'materialise_archive_sidebar',
		'type' => 'select',
		'label' => __('Archive Page Sidebar Position:','materialise'),
		'section' => 'materialise_general_section',
		'choices' => array(
			'right'=> __('Right Sidebar','materialise'),
			'left'=> __('Left Sidebar','materialise'),		
			),
		'priority'	=> 25
	));
	
	$wp_customize->add_setting('materialise_post_layout', array(
		'default' => 'right',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_post_layout', array(
		'settings' => 'materialise_post_layout',
		'type' => 'select',
		'label' => __('Select Post Layout:','materialise'),
		'section' => 'materialise_general_section',
		'choices' => array(
			'right'=> __('Right Sidebar','materialise'),
			'left'=> __('Left Sidebar','materialise'),		
			),
		'priority'	=> 25
	));
	
	//Header settings
	$wp_customize->add_section( 'materialise_header_section' , array(
		'title'       => __( 'Header', 'materialise' ),
		'priority'    => 20,
		'description' => __( 'Header settings ', 'materialise' ),
	) );
	
	$wp_customize->add_setting('materialise_logo_center', array(
		'default'        => 0,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_logo_center', array(
		'settings' => 'materialise_logo_center',
		'label'    => __('Show logo on Center', 'materialise'),
		'section'  => 'materialise_header_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_display_topbar_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_topbar_setting', array(
		'settings' => 'materialise_display_topbar_setting',
		'label'    => __('Display TopBar', 'materialise'),
		'section'  => 'materialise_header_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_mail_address', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_mail_address', array(
		'settings' => 'materialise_mail_address',
		'label' => __('Email:','materialise'),
		'section' => 'materialise_header_section',
		'active_callback' =>'materialise_topbar_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_contact_number', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_contact_number', array(
		'settings' => 'materialise_contact_number',
		'label' => __('Contact Number:','materialise'),
		'section' => 'materialise_header_section',
		'active_callback' =>'materialise_topbar_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_social_right', array(
		'default'        => 0,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_social_right', array(
		'settings' => 'materialise_social_right',
		'label'    => __('Display Social Icons on Right', 'materialise'),
		'section'  => 'materialise_header_section',
		'type'     => 'checkbox',
		'active_callback' =>'materialise_topbar_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_display_social_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_social_setting', array(
		'settings' => 'materialise_display_social_setting',
		'label'    => __('Display Social Icons', 'materialise'),
		'section'  => 'materialise_header_section',
		'type'     => 'checkbox',
		'active_callback' =>'materialise_topbar_active_callback',
		'priority'	=> 24
	));
	for($i=1; $i<=5; $i++){
	$wp_customize->add_setting('materialise_social_icon_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_social_icon_'.$i, array(
		'settings' => 'materialise_social_icon_'.$i,
		'label' => __('Header Social Icon ','materialise').$i,
		'description' => __( 'Please add <strong>FontAwesome</strong> Class of respective social. Like  <strong>fa fa-facebook</strong>', 'materialise' ),
		'section' => 'materialise_header_section',
		'active_callback' =>'materialise_social_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_social_link_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('materialise_social_link_'.$i, array(
		'settings' => 'materialise_social_link_'.$i,
		'label' => __('Social Icon Link ','materialise').$i,
		'description' => __( 'Please add Social Icon Link', 'materialise' ),
		'section' => 'materialise_header_section',
		'active_callback' =>'materialise_social_active_callback',
		'priority'	=> 24
	));
	}
	
	//front page panel
	$wp_customize->add_panel( 'materialise_frontpage_panel', array(
	    'priority' => 20,
	    'title' => __( 'Front Page Option', 'materialise' ),
	    'description' => __( 'Manage Theme\'s front page.', 'materialise' ),
	) );
	
	//home slider
	$wp_customize->add_section( 'materialise_slider_section', array(
	    'priority' => 20,
	    'title' => __( 'Materialise Slider', 'materialise' ),
	    'description' => __( 'Manage theme slider and it\'s features', 'materialise' ),
	    'panel' => 'materialise_frontpage_panel',
	) );
	
	$wp_customize->add_setting('materialise_display_slider', array(
		'default'        => 1,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_slider', array(
		'settings' => 'materialise_display_slider',
		'label'    => __('Show theme slider', 'materialise'),
		'section'  => 'materialise_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	
	$wp_customize->add_setting( 'materialise_slider_posts', array (
		'default'     => '',
		'sanitize_callback' => 'materialise_sanitize_post_control',
	) );

	$wp_customize->add_control(
		new WP_Customize_Post_Control(
			$wp_customize,
			'materialise_slider_posts',
			array(
				'label'    => __('Select Posts', 'materialise'),
				'settings' => 'materialise_slider_posts',
				'section'  => 'materialise_slider_section',
				'active_callback' =>'materialise_slider_active_callback',
				'priority'	=> 24
			)
		)
	);
	
	//service section
	$wp_customize->add_section( 'materialise_service_section', array(
	    'priority' => 20,
	    'title' => __( 'Materialise Services', 'materialise' ),
	    'description' => __( 'Manage theme Services.', 'materialise' ),
	    'panel' => 'materialise_frontpage_panel',
	) );
	
	$wp_customize->add_setting('materialise_display_service', array(
		'default'        => 1,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_service', array(
		'settings' => 'materialise_display_service',
		'label'    => __('Show theme Services', 'materialise'),
		'section'  => 'materialise_service_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_service_title', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_service_title', array(
		'settings' => 'materialise_service_title',
		'label' => __('Service Section Heading','materialise'),
		'section' => 'materialise_service_section',
		'active_callback' =>'materialise_service_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting( 'materialise_service_pages', array (
		'default'     => __('Our Services', 'materialise'),
		'sanitize_callback' => 'materialise_sanitize_post_control',
	) );

	$wp_customize->add_control(
		new WP_Customize_Page_Control(
			$wp_customize,
			'materialise_service_pages',
			array(
				'label'    => __('Select Pages', 'materialise'),
				'settings' => 'materialise_service_pages',
				'section'  => 'materialise_service_section',
				'active_callback' =>'materialise_service_active_callback',
				'priority'	=> 24
			)
		)
	);
	
	//home-widget section 1
	$wp_customize->add_section( 'materialise_widget1_section', array(
	    'priority' => 20,
	    'title' => __( 'Widget Sections', 'materialise' ),
	    'description' => __( 'Manage theme Widget Sections.', 'materialise' ),
	    'panel' => 'materialise_frontpage_panel',
	) );
	
	$wp_customize->add_setting('materialise_display_widget1', array(
		'default'        => 1,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_widget1', array(
		'settings' => 'materialise_display_widget1',
		'label'    => __('Show Widget 1 Area', 'materialise'),
		'section'  => 'materialise_widget1_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_widget1_title', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_widget1_title', array(
		'settings' => 'materialise_widget1_title',
		'label' => __('Widget Section 1 Heading','materialise'),
		'section' => 'materialise_widget1_section',
		'active_callback' =>'materialise_widget1_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_display_widget2', array(
		'default'        => 1,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_widget2', array(
		'settings' => 'materialise_display_widget2',
		'label'    => __('Show Widget 2 Area', 'materialise'),
		'section'  => 'materialise_widget1_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	//blog section 1
	$wp_customize->add_section( 'materialise_blog_section', array(
	    'priority' => 20,
	    'title' => __( 'Materialise Blog Section', 'materialise' ),
	    'description' => __( 'Manage theme Blog Section.', 'materialise' ),
	    'panel' => 'materialise_frontpage_panel',
	) );
	
	$wp_customize->add_setting('materialise_blog_title', array(
		'default' => __('Latest Posts','materialise'),
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_blog_title', array(
		'settings' => 'materialise_blog_title',
		'label' => __('Blog Section Heading','materialise'),
		'section' => 'materialise_blog_section',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_title_img', array(
		'default' => get_template_directory_uri().'/images/title-bg.png',
		'sanitize_callback' => 'esc_url_raw',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 
		'materialise_title_img', 
		array(
			'label'      => __( 'Image for Section Titles', 'materialise' ),
			'section'    => 'materialise_blog_section',
			'settings'   => 'materialise_title_img',
			'priority'   => 24
		)
	));
	
	//Breadcrumbs settings
	$wp_customize->add_section( 'materialise_breadcrumbs_section' , array(
		'title'       => __( 'Breadcrumbs', 'materialise' ),
		'priority'    => 20,
		'description' => __( 'Breadcrumbs settings ', 'materialise' ),
	) );
	
	$wp_customize->add_setting('materialise_breadcrumbs_layout', array(
		'default' => 'text-left',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_breadcrumbs_layout', array(
		'settings' => 'materialise_breadcrumbs_layout',
		'type' => 'select',
		'label' => __('Breadcrumbs Layout:','materialise'),
		'section' => 'materialise_breadcrumbs_section',
		'choices' => array(
			'text-left'=> __('Left','materialise'),
			'text-center'=> __('Center','materialise'),
			'text-right'=> __('Right','materialise'),		
			),
		'priority'	=> 25
	));	
	
	//footer
	$wp_customize->add_section( 'materialise_footer_section' , array(
		'title'       => __( 'Footer', 'materialise' ),
		'priority'    => 25,
		'description' => __( 'Footer Option', 'materialise' ),
	) );
	
	$wp_customize->add_setting('materialise_display_footer_menu', array(
		'default'        => 0,
		'sanitize_callback' => 'materialise_sanitize_checkbox',
	));
	$wp_customize->add_control('materialise_display_footer_menu', array(
		'settings' => 'materialise_display_footer_menu',
		'label'    => __('Display Footer Manu', 'materialise'),
		'section'  => 'materialise_footer_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('materialise_footer_layout', array(
		'default' => 'left',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_footer_layout', array(
		'settings' => 'materialise_footer_layout',
		'type' => 'select',
		'label' => __('Footer Bar Layout:','materialise'),
		'section' => 'materialise_footer_section',
		'choices' => array(
			'left'=> __('Credit Left, Menu Right','materialise'),
			'right'=> __('Credit Right, Menu Left','materialise'),
			'center'=> __('Menu and Credit Center','materialise'),		
			),
		'priority'	=> 25
	));

	$wp_customize->add_setting('materialise_footer_credit', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_footer_credit', array(
		'settings' => 'materialise_footer_credit',
		'label' => __('Footer Credit Text:','materialise'),
		'section' => 'materialise_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('materialise_footer_company', array(
		'default' => '',
		'sanitize_callback' => 'materialise_sanitize_text_field',
	));

	$wp_customize->add_control('materialise_footer_company', array(
		'settings' => 'materialise_footer_company',
		'label' => __('Footer Company Name:','materialise'),
		'section' => 'materialise_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('materialise_footer_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('materialise_footer_link', array(
		'settings' => 'materialise_footer_link',
		'label' => __('Footer Company Link:','materialise'),
		'section' => 'materialise_footer_section',
		'priority'	=> 30
	));
}
add_action( 'customize_register', 'materialise_customize_register' );

//custom control
if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Post_Control extends WP_Customize_Control {
		public function render_content() {
		$materialise_post_list= array('post_type'=>'post', 'posts_per_page'=>-1);
		$materialise_posts= new WP_Query($materialise_post_list);
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php if($materialise_posts->have_posts()){
					while($materialise_posts->have_posts()){
					$materialise_posts->the_post();
					if(has_post_thumbnail()):
					?>
					<option value="<?php the_ID(); ?>" <?php if(is_array($this->value())):foreach($this->value() as $post_id){ if($post_id== get_the_ID()) echo 'selected'; } endif; ?>><?php the_title(); ?></option>
					<?php endif;
					}
					} ?>
				</select>
			</label>
		<?php
		}
	}
endif;

if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Page_Control extends WP_Customize_Control {
		public function render_content() {
		$materialise_post_list= array('post_type'=>'page', 'posts_per_page'=>-1);
		$materialise_posts= new WP_Query($materialise_post_list);
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php if($materialise_posts->have_posts()){
					while($materialise_posts->have_posts()){
					$materialise_posts->the_post();
					?>
					<option value="<?php the_ID(); ?>" <?php if(is_array($this->value())):foreach($this->value() as $post_id){ if($post_id== get_the_ID()) echo 'selected'; } endif; ?>><?php the_title(); ?></option>
					<?php }
					} ?>
				</select>
			</label>
		<?php
		}
	}
endif;


function materialise_topbar_active_callback() {
	if ( get_theme_mod( 'materialise_display_topbar_setting', 0 ) ) {
		return true;
	}
	return false;
}
function materialise_social_active_callback() {
	if ( get_theme_mod( 'materialise_display_social_setting', 0 ) ) {
		return true;
	}
	return false;
}
function materialise_slider_active_callback() {
	if ( get_theme_mod( 'materialise_display_slider', 0 ) ) {
		return true;
	}
	return false;
}

function materialise_service_active_callback() {
	if ( get_theme_mod( 'materialise_display_service', 0 ) ) {
		return true;
	}
	return false;
}

function materialise_widget1_active_callback() {
	if ( get_theme_mod( 'materialise_display_widget1', 0 ) ) {
		return true;
	}
	return false;
}


/**
 * 1Sanitize checkbox
 */

if (!function_exists( 'materialise_sanitize_checkbox' ) ) :
	function materialise_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize integer input
 */
function materialise_sanitize_post_control( $input ) {
	if(is_array($input)){
		return $input;
	}else{
		$input= array();
		return $input;
	}
    
}

function materialise_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function materialise_customize_preview_js() {
	wp_enqueue_script( 'materialise_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'materialise_customize_preview_js' );

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Materialise_Font_Control' ) ) :
class Materialise_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <?php  $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC8GQW0seCcIYbo8xt_gXuToPK8xAMx83A';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
			if($response==''){ echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>'; }
			if( is_wp_error( $response ) ) {
			   esc_attr_e('Something went wrong!','materialise');
			} else {
			$json_fonts = json_decode($response,  true);
			// that's it
			$items = $json_fonts['items'];
			$i = 0; ?>
   <select <?php $this->link(); ?> >
   <?php foreach( $items as $item) { $i++; $str = $item['family']; ?>
    <option  value="<?php echo esc_attr($str); ?>" <?php if($this->value()== $str) echo 'selected="selected"';?>><?php echo esc_attr($str); ?></option>
   <?php } ?>
    </select>
	<?php 
 }
}
}
endif;