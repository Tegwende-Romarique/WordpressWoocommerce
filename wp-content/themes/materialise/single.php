<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package materialise
 */

get_header(); 
get_template_part('breadcrumbs');
$materialise_post_layout= get_theme_mod( 'materialise_post_layout', 'right'); ?>
<div class="container-fluid single_blogs space">
	<div class="container">
		<div class="row theme-blog-3 blog_gallery">
		<?php if($materialise_post_layout=='left'){ get_sidebar(); } ?>
			<div class="col-md-8 col-sm-12 col-xs-12 theme-left-side">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('row theme-blog-desc'); ?>>
					<?php if(has_post_thumbnail()): ?>
						<div class="col-md-12 col-sm-12 theme-blog-text blog-gallerys">
								<div class="img-thumbnail">
									<?php $data= array('class' =>'img-responsive post_image'); 
									the_post_thumbnail('materialise_thumb', $data); ?>
								</div>
							<div class="ws-cats">
							<?php if(get_the_category_list() != '') { 
							the_category(); 
						} ?>
						</div>
						</div>
					<?php endif; ?>
					<div class="col-md-12 materialise-post">
						<div class="row">
						<h1><?php the_title(); ?></h1>
						<div class="cor_comment">
							<i class="fa fa-user icon"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><span class="auth"><?php the_author(); ?></span></a>
							 <i class="fa fa-clock-o icon"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><span class="auth"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
							 <?php if(!has_post_thumbnail() && get_the_category_list() != ''): ?>
							 <i class="fa fa-tag icon"></i> <?php the_category(', '); ?></a>
							 <?php endif; ?>
							 <i class="fa fa-comments-o icon"></i> <a href="<?php comments_link(); ?>"><span class="auth"><?php echo esc_attr(get_comments_number()); ?></span></a>
						</div>
						<?php the_content();
						materialise_link_pages();
						if(get_the_tag_list()) { 
							echo get_the_tag_list('<div class="col-md-12 cor_tags">',' ','</div>');
						} ?>
						</div>
					</div>
				</div>
				<div class="w_blog_pagination">
				<?php materialise_post_link(); ?>
				</div>
				<?php if(get_the_author_meta('description')) : ?>
				<div class="w_about_author w_abt_detail">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-2 col-sm-4 col-xs-12 w_abt_pics">
								<div class="img-thumbnail">
									<?php echo get_avatar( get_the_author_meta('email') , 150 ); ?>
								</div>
							</div>
							<div class="col-md-10 col-sm-8 col-xs-12 about-author">
								<h3 class="a_name"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></h3>
								<p><?php echo esc_attr(get_the_author_meta('description')); ?> </p>
							</div>
						</div>
					</div>
				</div>
				<?php endif; 
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; 
				endwhile;
				endif; ?>
			</div>
			<?php if($materialise_post_layout=='right'){ get_sidebar(); } ?>
		</div>
	</div>
</div>
<?php
get_footer();
?>