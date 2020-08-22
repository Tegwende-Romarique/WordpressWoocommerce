<?php
/**
 * The template for displaying author pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialise
 */
get_header(); 
get_template_part('breadcrumbs');
$materialise_archive_layout= get_theme_mod( 'materialise_archive_layout', 'masonry');
$materialise_archive_sidebar = get_theme_mod( 'materialise_archive_sidebar', 'right'); ?>
	<div class="container-fluid blog-temp2-top">
		<div class="container blog_gallery">
		<?php if(get_the_author_meta('description')) : ?>
				<div class="col-md-12 author-intro">
					<div class="row">
						<div class="col-md-2 col-sm-4 w_abt_pics">
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
							<div class="img-thumbnail">
								<?php echo get_avatar( get_the_author_meta('email'),150 ,'Mystery Person', get_the_author(), array('class'=>'img-responsive') ); ?>
							</div>
							</a>
						</div>
						<div class="col-md-10 col-sm-8">
							<h3 class="a_name"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></h3>
							<p><?php the_archive_description( '<div class="author-description">', '</div>' ); ?> </p>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php if($materialise_archive_sidebar=='left'){ get_sidebar(); } ?>
			<div class="col-md-8">
			<?php if($materialise_archive_layout=='masonry'){ ?>
				<div class="col-md-12 blog-right-side">
			<?php }else{ ?>
				<div class="col-md-12 regular-blog">
			<?php } ?>
				<?php if(have_posts()){ 
				while(have_posts()){ the_post();
					get_template_part('template/'.$materialise_archive_layout,'layout');
				} }else{
					get_template_part('no','content');
				} ?>
				</div>
				<div class="col-md-12 ws-pagination">
				<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
				</div>
			</div>
			<?php if($materialise_archive_sidebar=='right'){ get_sidebar(); } ?>
		</div>
	</div>
<?php get_footer(); ?>