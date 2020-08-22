<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package materialise
 */
get_header(); 
get_template_part('breadcrumbs');
$materialise_archive_layout= get_theme_mod( 'materialise_archive_layout', 'masonry');
$materialise_archive_sidebar = get_theme_mod( 'materialise_archive_sidebar', 'right'); ?>
	<div class="container-fluid blog-temp2-top">
		<div class="container blog_gallery">
			<?php if($materialise_archive_sidebar=='left'){ get_sidebar(); } ?>
			<div class="col-md-8">
				<?php if(have_posts()){ 
				if($materialise_archive_layout=='masonry'){ ?>
				<div class="col-md-12 blog-right-side">
				<?php }else{ ?>
					<div class="col-md-12 regular-blog">
				<?php }
				while(have_posts()){ the_post();
					get_template_part('template/'.$materialise_archive_layout,'layout');
				} ?>
				</div>
				<?php }else{
					get_template_part('no','content');
				} ?>
				<div class="col-md-12 ws-pagination">
				<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
				</div>
			</div>
			<?php if($materialise_archive_sidebar=='right'){ get_sidebar(); } ?>
		</div>
	</div>
<?php get_footer(); ?>