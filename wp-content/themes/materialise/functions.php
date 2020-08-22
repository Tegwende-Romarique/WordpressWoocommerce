<?php
/**
 * materialise functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materialise
 */

if ( ! function_exists( 'materialise_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function materialise_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'materialise', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-width' => true,
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'materialise_primary' => esc_html__( 'Primary Menu', 'materialise' ),
		'materialise_footer' => esc_html__( 'Footer Menu', 'materialise' ),
	) );
	//Enable support for custom header.
	$defaults = array(
	'width'         => 1920,
	'height'        => 250,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-image'          => get_template_directory_uri() .'/images/blog2.jpg',
	);
	add_theme_support( 'custom-header', $defaults );
	
	add_image_size( 'materialise_thumb', 600, 400, true );
	add_image_size( 'materialise_page_thumb', 1200, 400, true );
}
endif;
add_action( 'after_setup_theme', 'materialise_setup' );


//including customizer
require( get_template_directory().'/customizer.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function materialise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materialise_content_width', 640 );
}
add_action( 'after_setup_theme', 'materialise_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function materialise_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Home Widget Area 1', 'materialise' ),
		'id'            => 'materialise-home-widget1',
		'description'   => __( 'Home 2 column Widget', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-6 col-sm-6 col-xs-12 w_area-item %2$s"><div class="col-md-12 w_area-widget"><div class="row w_area-widget-data">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h2 class="w_area-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home Widget Area 2', 'materialise' ),
		'id'            => 'materialise-home-widget2',
		'description'   => __( 'Home full-width Widget', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 col-sm-12 col-xs-12 w_area2-item %2$s"><div class="row w_area2-widget"><div class="row w_area2-widget-data">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="row blogs-title"><h1>',
		'after_title'   => '</h1><div class="title-bg"><div class="materialise-img"></div></div></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'materialise' ),
		'id'            => 'materialise-sidebar',
		'description'   => __( 'Main Sidebar', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 col-sm-6 col-xs-12 theme-widget %2$s"><div class="theme-widget-data">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Left', 'materialise' ),
		'id' => 'materialise-footer-widget',
		'description'   => __( 'Footer widget Left area', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Center', 'materialise' ),
		'id' => 'materialise-footer-widget-center',
		'description'   => __( 'Footer widget Center area', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Right', 'materialise' ),
		'id' => 'materialise-footer-widget-right',
		'description'   => __( 'Footer widget area', 'materialise' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'materialise_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialise_scripts() {
	$materialise_google_font= get_theme_mod( 'materialise_google_font', 'Philosopher');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() .'/css/swiper.min.css' );
	wp_enqueue_style( 'materialise-google-font', 'https://fonts.googleapis.com/css?family='.esc_attr($materialise_google_font) );
	wp_enqueue_style('materialise-stylesheet', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('materialise-media-css', get_template_directory_uri() . '/css/media-screen.css' );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js');
	wp_enqueue_script( 'masonry');
	
	// on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
	
}
add_action( 'wp_enqueue_scripts', 'materialise_scripts' );

function materialise_footer_scripts() {
	
	wp_enqueue_script( 'materialise-script', get_template_directory_uri() . '/js/script.js');
	
}
add_action( 'wp_footer', 'materialise_footer_scripts' );

//color css 
function materialise_color_css(){
	$color= get_theme_mod( 'materialise_theme_color_setting', '#446084');
	$materialise_title_img= get_theme_mod( 'materialise_title_img', get_template_directory_uri().'/images/title-bg.png');
	$materialise_google_font= get_theme_mod( 'materialise_google_font', 'Philosopher');
	?>
<style>
body{
font-family: "<?php echo esc_attr($materialise_google_font); ?>";
}
.materialise-img{
	background-image:url('<?php echo esc_url( $materialise_title_img ); ?>');
}
.blog-temp1 .blog-data .icon {
    color: <?php echo esc_html( $color ); ?>;
}
.single_blogs  .theme-blog-desc ul li a:hover {
	background-color:<?php echo esc_html( $color ); ?>;
}
.single_blogs  .theme-blog-desc ul li a {
    color: <?php echo esc_html( $color ); ?>;
}
  .cat-desc.text-center {
    background-color: <?php echo esc_html( $color ); ?>;
}
.single_blogs  .cor_comment .icon, 
.single_blogs  .cor_comment .icon1 {
    color: <?php echo esc_html( $color ); ?>;
}
.single_blogs  .month{
    background-color: <?php echo esc_html( $color ); ?>a8;
}
.theme-sidebar a:hover {
    color: <?php echo esc_html( $color ); ?>;
}
.theme-widget h2 {
    background-color: <?php echo esc_html( $color ); ?>;
	}
	.blog-temp2-top .blog-right-side .icon,
.blog-temp2-top .blog-right-side .icon1 {
    color: <?php echo esc_html( $color ); ?>;
	}
	.blog-temp1-top  .icon {
    color: <?php echo esc_html( $color ); ?>;
	}
	.blog-temp1-top .blog-content-side .icon {
    color: <?php echo esc_html( $color ); ?>;
	}
	.single_blogs  .cor_comment .icon, 
.single_blogs  .cor_comment .icon1 {
    color: <?php echo esc_html( $color ); ?>;
}
.single_blogs  .w_comment_form .btn {
    color: <?php echo esc_html( $color ); ?>;
}
.single_blogs  .w_comment_form .btn:hover {
    background-color: <?php echo esc_html( $color ); ?>;
}
.single_blogs .w_about_author h3 {
    color: <?php echo esc_html( $color ); ?>;
}
.form-control:focus {
    border-color:<?php echo esc_html( $color ); ?> !important;
}
footer .footer-social li a{
    background-color: <?php echo esc_html( $color ); ?>;
	}
	footer .quick-link-widget li a:hover{
color: <?php echo esc_html( $color ); ?>;
}
footer .latest-post a:hover{
    color: <?php echo esc_html( $color ); ?>;
}
footer .widget-title:before{
	    background-color: <?php echo esc_html( $color ); ?>;
}
.button.active {
    background-color: <?php echo esc_html( $color ); ?>;
}
.cd-pagination li{
	border:1px solid <?php echo esc_html( $color ); ?>;
}

.cd-pagination li a:hover{
 color: <?php echo esc_html( $color ); ?>;	
}
div.widget_search button.btn.btn-search {
    background-color: <?php echo esc_html( $color ); ?>;
}
.services .more-btn {
    background-color: <?php echo esc_html( $color ); ?>;
}
.theme-widget-data {
    border: 1px solid <?php echo esc_html( $color ); ?>;
}
.back-to-top {
    background-color: <?php echo esc_html( $color ); ?>;
}
.carousel-caption .btn {
background-color: <?php echo esc_html( $color ); ?>;
}
@media(min-width:1200px){
  #home1top .menu .navbar-nav li a:hover {
    color: <?php echo esc_html( $color ); ?> !important;
}
  #home1top .menu.navbar-default .navbar-nav > .active > a, #home1top .menu.navbar-default .navbar-nav > .active > a:focus {
    color: <?php echo esc_html( $color ); ?> !important;
}
}
@media (max-width:480px){
#home1top .navbar-default .navbar-nav>li>a,
#home1top .navbar-default .navbar-nav .open .dropdown-menu>li>a,
#home1top .menu .navbar-nav li a{
    background-color: <?php echo esc_html( $color ); ?> !important;
}
}
</style>
<?php }

add_action( 'wp_head', 'materialise_color_css',999);

// menu setup	
function materialise_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'materialise_page_menu_args' );

 
function materialise_fallback_page_menu( $args = array() ) {

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','materialise');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' .   esc_url( home_url('/')) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new materialise_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_attr($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}
class materialise_walker_page_menu extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='dropdown-menu'>\n";
	}
	function start_el( &$output, $page, $depth=0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . esc_url(get_permalink($page->ID)) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}

class materialise_nav_walker extends Walker_Nav_Menu {	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children && $depth > 0) {
			$classes[] = 'dropdown dropdown-submenu';
		} else if($args->has_children && $depth === 0) {
			$classes[] = 'dropdown';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';	
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children) ? '<i class="fa fa-angle-down"></i></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}
function materialise_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'materialise_nav_menu_css_class' );

/****--- Navigation ---***/
function materialise_navigation() { 
?>
	<div class="row navi">
		<ul class="pager">
			<li class="next"><?php next_posts_link(__('Older Entries &raquo;','materialise')); ?></li>
			<li class="previous"><?php previous_posts_link(__('&laquo; Newer Entries ','materialise')); ?></li>
		</ul>
	</div>
<?php }

// post/page navigation
function materialise_link_pages(){
	$defaults = array(
		'before'           => '<p class="link-content">' . __( 'Pages:','materialise' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page','materialise'),
		'previouspagelink' => __( 'Previous page','materialise'),
		'pagelink'         => '%',
		'echo'             => 1
	);
				wp_link_pages( $defaults );
}

function materialise_post_link(){ 
	global $post; 
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<div class="row bs-pager">
		<ul class="pager">
			<li class="previous"><?php next_post_link( '%link', _x( '<i class="fa fa-angle-double-left"></i> New Post', 'Next post link', 'materialise' ) ); ?></li>
			<li class="next"><?php previous_post_link( '%link', _x( 'Old Post <i class="fa fa-angle-double-right"></i>', 'Previous post link', 'materialise' ) ); ?></li>
		</ul>
	</div>
	<?php }
	

require( get_template_directory() . '/inc/breadcrumbs.php' );

if ( ! function_exists( 'materialise_comment' ) ){
require( get_template_directory() . '/comment-function.php' );
}