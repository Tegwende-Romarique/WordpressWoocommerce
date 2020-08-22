<?php $materialise_service_title= get_theme_mod( 'materialise_service_title');

$materialise_service_pages= get_theme_mod( 'materialise_service_pages');

if(is_array($materialise_service_pages) && !empty($materialise_service_pages)){

$materialise_service_args= array('post_type'=>'page', 'post__in'=>$materialise_service_pages);

$materialise_services= new WP_Query($materialise_service_args);

if($materialise_services->have_posts()){

	$count=1;

?>

<!-- services strt -->

<div class="container services">

<?php if($materialise_service_title!=''){ ?>

	<div class="col-md-12 blogs-title">

		<h1><?php echo esc_attr($materialise_service_title); ?></h1>

		<div class="title-bg">

			<div class="materialise-img"></div>

		</div>

	</div>

<?php } ?>

	<div class="col-md-12 materialise-service">

	<?php while($materialise_services->have_posts()){

			$materialise_services->the_post(); ?>

		<div class="col-md-3 col-sm-6 col-xs-12 services-data">

			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>

			<a href="<?php the_permalink(); ?>" class="btn btn-sm more-btn"><?php esc_attr_e('Read More','materialise'); ?></a>

		</div>

	<?php if($count%4==0){ ?>

	<div class="col-md-12"></div>

<?php } $count++;

	} wp_reset_postdata(); ?>

	</div>

</div>

<!-- services end -->

<?php } } ?>