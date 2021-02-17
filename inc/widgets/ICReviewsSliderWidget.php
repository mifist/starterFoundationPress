<?php

if ( ! function_exists( 'reviews_slider_template' ) ) {
	// Create Reviews Slider
	function reviews_slider_template() { ?>

		<script async defer type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#reviews_slider').slick({
					cssEase: 'ease', // 'ease', 'linear'
					easing: 'linear',
					fade: false,
					arrows: true,
					dots: false,
					infinite: false,
					speed: 500,
					draggable: true,
					swipe: true,
					autoplay: true,
					autoplaySpeed: 5000,
					slidesToShow: 3,
					slidesToScroll: 1,
					prevArrow: '<div class="slick-prev arrow-left"></div><span class="lines"></span>',
					nextArrow: '<div class="slick-next"></div><span class="lines"></span>',
					responsive: [
						{
							breakpoint: 1280,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
							}
						},
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
						// You can unslick at a given breakpoint now by adding:
						// settings: "unslick"
						// instead of a settings object
					]
				});

			});
		</script>

		<?php
		$arg    = [
			'post_type'      => 'reviews',
			'order'          => 'ASC',
			'orderby'        => 'date',
			'posts_per_page' => -1,
		];
		$slider = new WP_Query( $arg );
		if ( $slider->have_posts() ) :
			?>

			<div id="reviews_slider" class="slick-slider">
				<?php
				while ( $slider->have_posts() ) :
					$slider->the_post();
					$the_post_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
					$reviews_position   = get_field( 'position' );
					$reviews_raiting   = get_field( 'raiting' );
					?>
					<div class="slick-slide" >
						<div class="review-wrap">
							<div class="about-review">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="reviews-thumb">
										<img src="<?php echo $the_post_thumbnail; ?>" alt="<?php the_title(); ?>">
									</div>
								<?php endif; ?>
								<div class="review-title">
									<h6><?php the_title(); ?></h6>
									<?php if ( $reviews_position ) : ?>
										<span class="review-position"><?php echo $reviews_position; ?></span>
									<?php endif; ?>
								</div>
							</div>
							<div class="review-container">
								<span class="review-raiting">
									<?php if( $reviews_raiting ) : ?>
										<div class="reviews-stars">
											<?php if( $reviews_raiting == '1' ) : ?>
												<span class="stars"></span>
											<?php elseif ( $reviews_raiting == '2' ) : ?>
												<span class="stars"></span>
												<span class="stars"></span>
											<?php elseif ( $reviews_raiting == '3' ) : ?>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
											<?php elseif ( $reviews_raiting == '4' ) : ?>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
											<?php elseif ( $reviews_raiting == '5' ) : ?>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
												<span class="stars"></span>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</span>
								<div class="review-content"><?php the_content(); ?></div>
							</div>

						</div><!--end of .columns -->
					</div>
				<?php endwhile; ?>
			</div><!-- END of  #home-slider-->

		<?php
		endif;
		wp_reset_query();
		?>

		<?php
	}
}
// Reviews Slider Shortcode
//add_shortcode( 'reviews_slider', 'reviews_slider_shortcode' );
function reviews_slider_shortcode() {
	ob_start();
	reviews_slider_template();
	$reviews_slider = ob_get_clean();
	return $reviews_slider;
}


class ICReviewsSliderWidget extends \WP_Widget {
	function __construct() {
		/* Widget settings. */
		$widget_ops = array(
			'classname' => 'review-slider-widget',
			'description' => 'Review Slider Widget',
		);
		/* Widget control settings. */
		$control_ops = array(
			'id_base' => 'review-slider-widget'
		);
		/* Create the widget. */
		parent::__construct( 'review-slider-widget', 'Review Slider', $widget_ops, $control_ops );
	}

	// Widget Backend
	public function form( $instance ) {
		return $instance;
	}


	public function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		echo do_shortcode( '[reviews_slider]' );
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance                    = [];
		return $instance;
	}

}
