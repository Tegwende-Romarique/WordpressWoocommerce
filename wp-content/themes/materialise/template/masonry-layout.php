<div class="col-md-6 col-sm-6 blog-content">
	<?php if(has_post_thumbnail()): ?>
	<div class="blog-img">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="img-thumbnail">
			<?php $data= array('class' =>'img-responsive post_image'); 
			the_post_thumbnail('materialise_thumb', $data); ?>
		</div>
			</a>
	</div>
	<?php endif; ?>
	<div class="blog-data">
		<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="col-md-12">
		<i class="fa fa-user icon"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><span class="auth"><?php the_author(); ?></span></a>
		 <i class="fa fa-clock-o icon1"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><span class="auth"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
		 <i class="fa fa-comments-o icon1"></i> <a href="<?php comments_link(); ?>"><span class="auth"><?php echo esc_attr(get_comments_number()); ?></span></a>
		 </div>
		<?php the_excerpt(); ?>
	</div>
</div>