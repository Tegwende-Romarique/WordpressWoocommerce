<?php $materialise_slider_posts= get_theme_mod( 'materialise_slider_posts');
if(is_array($materialise_slider_posts) && !empty($materialise_slider_posts)){
$materialise_slide_args= array('post_type'=>'post', 'post__in'=>$materialise_slider_posts);
$materialise_slides= new WP_Query($materialise_slide_args);
if($materialise_slides->have_posts()){
?>
<!-- Slider start -->
<div class="row w_slider w_slider_2">
	<div class="swiper-container home-slider">
		<div class="swiper-wrapper">
		<?php while($materialise_slides->have_posts()){
			$materialise_slides->the_post();
			if(has_post_thumbnail()){ ?>
			<div class="swiper-slide">
				<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" data-delay="200" alt="<?php the_title(); ?>" />
				<div class="overlay">
					<div class="container">
						<div class="carousel-caption">
							<h2><?php the_title(); ?></h2>
							<?php if(!wp_is_mobile()){ ?>
							<p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
						<?php } ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-lg slide-btn"><?php esc_attr_e('Full Post','materialise'); ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination1"></div>
		<!-- Add Arrows -->
		<div class="swiper-button-prev swiper-button-white swiper-button-prev1"></div>
		<div class="swiper-button-next swiper-button-white swiper-button-next1"></div>
	</div>	
</div>
<!-- Slider End -->
<script>
jQuery(document).ready(function() {
	/* Slider */
	var swiper = new Swiper('.home-slider', {
		nextButton: '.swiper-button-next1',
        prevButton: '.swiper-button-prev1',
        slidesPerView: '1',
		spaceBetween: 0,
		autoplay:4000,
		loop:true
    });
 });
</script>
<?php } wp_reset_postdata(); } ?>