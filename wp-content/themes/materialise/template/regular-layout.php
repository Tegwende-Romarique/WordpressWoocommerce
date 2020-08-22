<div class="row theme-blog-desc">
	<?php if(has_post_thumbnail()): ?>
		<div class="col-md-12 col-sm-12 theme-blog-text blog-gallerys">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<div class="img-thumbnail">
					<?php $data= array('class' =>'img-responsive post_image'); 
					the_post_thumbnail('materialise_thumb', $data); ?>
				</div>
			</a>
			<div class="ws-cats">
			<?php if(get_the_category_list() != '') { 
			the_category(); 
		} ?>
		</div>
		</div>
	<?php endif; ?>
	<div class="col-md-12 materialise-post">
		<div class="row">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="cor_comment">
			<i class="fa fa-user icon"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><span class="auth"><?php the_author(); ?></span></a>
			 <i class="fa fa-clock-o icon"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><span class="auth"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
			 <?php if(!has_post_thumbnail() && get_the_category_list() != ''): ?>
			 <i class="fa fa-tag icon"></i> <?php the_category(', '); ?></a>
			 <?php endif; ?>
			 <i class="fa fa-comments-o icon"></i> <a href="<?php comments_link(); ?>"><span class="auth"><?php echo esc_attr(get_comments_number()); ?></span></a>
		</div>
		<?php the_excerpt(); ?>
		</div>
	</div>
</div>