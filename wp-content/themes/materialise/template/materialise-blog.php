<?php $materialise_blog_title= get_theme_mod( 'materialise_blog_title','Latest Post');

?>

<div class="container home-blogs">

<?php if($materialise_blog_title!=''){ ?>

	<div class="col-md-12 blogs-title">

		<h1><?php echo esc_attr($materialise_blog_title); ?></h1>

		<div class="title-bg">

			<div class="materialise-img"></div>

		</div>

	</div>

<?php } ?>

	<div class="col-md-12 col-sm-12 col-xs-12 home-blogs-posts">

	<?php $materialise_blog_args= array('post_type'=>'post','posts_per_page' => 3,'post__not_in' => get_option( 'sticky_posts' )); 

	$materialise_blog= new WP_Query($materialise_blog_args);

	if($materialise_blog->have_posts()){

		while($materialise_blog->have_posts()){

			$materialise_blog->the_post(); ?>

		<div class="col-md-4 col-sm-6 col-xs-12 blog3-data">

			<div class="row blog3-content">

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

			<?php if(has_post_thumbnail()){ ?>

					<?php $data= array('class' =>'img-responsive post_image'); 

					the_post_thumbnail('materialise_thumb', $data); ?>

			<?php }else{ ?>

				<img src="http://via.placeholder.com/600x400?text=<?php echo get_the_title(); ?>" class="img-responsive"  alt="<?php the_title(); ?>" >

			<?php } ?>

				</a>

				<figcaption>

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>

				</figcaption>

			</div>

		</div>

	<?php } } wp_reset_postdata(); ?>

	</div>

</div>