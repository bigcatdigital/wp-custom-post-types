<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCCardSlider extends BCCustomPostType {	
		
		/* 
			Handle all matters for CPT shortcode 
		*/
		//Create shortcode: this part *** should be overridden with formatter ***
		public function create_bc_cpt_shortcode($atts = [], $content = null, $tag = 'bc_cpt_shortcode') {
			//Normalize attribute keys to lowercase
			$atts = array_change_key_case((array) $atts, CASE_LOWER);
			//Override default attributes with user attributes
			$shorcode_atts = shortcode_atts(['id' => null], $atts, $tag);
			if ($shorcode_atts['id'] != NUll) {
				$query_atts = array('p' => $shorcode_atts['id'], 'post_type' => $this->bc_cpt_post_type);
				$shortcode_query = new WP_Query($query_atts);
				if ($shortcode_query->have_posts()) {
					$shortcode_query->the_post();
					//** CPT Formatter **//
					$has_shade = (get_field('has-shade')&& strcmp(get_field('has-waves'), 'none') !== 0) ? ' ' . get_field('has-shade') . ' ' : '';
					$do_waves_class = (get_field('has-waves') && strcmp(get_field('has-waves'), 'no') !== 0) ? ' ' . 'has-waves' . ' ' : '';
					$o .= '<section class="bc-feature-component  bc-feature-component--slider' . $has_shade . $do_waves_class . '" aria-label="' . get_the_title() . '"> ';
					if (strcmp($do_waves_class, '') !== 0) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					
					$o .= '	<div class="bc-feature-component__content__text-content">';
					$o .= '		<h1 class="bc-inner-page-content__heading">' . get_the_title() . '</h1>';
					if (get_field('content_intro') && strcmp(get_field('content_intro'), '') !== 0) {
						$o .= '		<p class="bc-inner-page-content__intro">' . get_field('content_intro') . '</p>';
					}
					if (get_field('content-body') && strcmp(get_field('content-body'), '') !== 0) {
						$o .= get_field('content-body');
					}
					$o .= '	</div>';
					$o .= '<div class="bc-feature-component__content ">';
					$o .= '	<div class="bc-flickty-slider bc-card-slider has-colored-text">'; 
					$o .= '		<div class="bc-flickty-slider__slider">';
					
					$slider_cards = get_field('slider_cards');
					$slider_card = '';
					
					if ($slider_cards['slider_card_#1'] && $slider_cards['slider_card_#1']['card-image']) {
						$slider_card = $slider_cards['slider_card_#1'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
						if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #1 -->';
					}
					if ($slider_cards['slider_card_#2'] && $slider_cards['slider_card_#2']['card-image']) {
						$slider_card = $slider_cards['slider_card_#2'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #2 -->';
					}
					if ($slider_cards['slider_card_#3'] && $slider_cards['slider_card_#3']['card-image']) {
						$slider_card = $slider_cards['slider_card_#3'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #3 -->';
					}
					if ($slider_cards['slider_card_#4'] && $slider_cards['slider_card_#4']['card-image']) {
						$slider_card = $slider_cards['slider_card_#4'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #4 -->';
					}
					if ($slider_cards['slider_card_#5'] && $slider_cards['slider_card_#5']['card-image']) {
						$slider_card = $slider_cards['slider_card_#5'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #5 -->';
					}
					if ($slider_cards['slider_card_#6'] && $slider_cards['slider_card_#6']['card-image']) {
						$slider_card = $slider_cards['slider_card_#6'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
						if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #6 -->';
					}
					
					if ($slider_cards['slider_card_#7'] && $slider_cards['slider_card_#7']['card-image']) {
						$slider_card = $slider_cards['slider_card_#7'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #7 -->';
					}
					if ($slider_cards['slider_card_#8'] && $slider_cards['slider_card_#8']['card-image']) {
						$slider_card = $slider_cards['slider_card_#8'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #8 -->';
					}
					if ($slider_cards['slider_card_#9'] && $slider_cards['slider_card_#9']['card-image']) {
						$slider_card = $slider_cards['slider_card_#9'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
							if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #9 -->';
					}
					if ($slider_cards['slider_card_#10'] && $slider_cards['slider_card_#10']['card-image']) {
						$slider_card = $slider_cards['slider_card_#10'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
						if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #10 -->';
					}
					if ($slider_cards['slider_card_#11'] && $slider_cards['slider_card_#11']['card-image']) {
						$slider_card = $slider_cards['slider_card_#11'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
						if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #11 -->';
					}
					if ($slider_cards['slider_card_#12'] && $slider_cards['slider_card_#12']['card-image']) {
						$slider_card = $slider_cards['slider_card_#12'];	
						$o .= '<div class="bc-card has-image bc-flickty-slider__slide">';	
						$o .= '	<picture class="bc-card__media is-4x3">';
						$o .= '		<img src="' . esc_url($slider_card['card-image']['url']) . '" alt="' . esc_html($slider_card['card-image']['alt']) . '">';
						$o .= '	</picture>';
						if (strcmp($slider_card['card-title'], '') !== 0) {
							$o .= '	<h2 class="bc-card__heading">' . $slider_card['card-title'] . '</h2>';	
						}
						if (strcmp($slider_card['card-text'], '') !== 0) {
							$o .= '	<p>' . $slider_card['card-text'] . '</p>';	
						}
						if ($slider_card['card-link'] && !empty($slider_card['card-link'])) {
							$o .= '<p>'; 
							$o .= '	<a class="bc-icon-link" href="' . $slider_card['card-link']['url'] . '">'; 
							$o .= 		$slider_card['card-link']['title'];
							$o .= '		<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
							$o .=	'			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
							$o .=	'		</svg>';
							$o .= '	</a>';
							$o .= '</p>';	
						}
						$o .= '</div><!-- // card #12 -->';
					}
					$o .= '		</div><!-- // .bc-flickty-slider__slider -->';
					$o .= '		<div class="bc-flickty-slider__controls">'; 
					$o .=	'			<a href="javascript:void(0)" class="bc-flickty-slider__prev is-inactive">';
					$o .=	'				<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
					$o .=	'					<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#carat"></use>';
					$o .=	'				</svg>';
					$o .=	'			</a>';
					$o .=	'			<a href="javascript:void(0)" class="bc-flickty-slider__next">'; 
					$o .=	'				<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">'; 
					$o .=	'					<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#carat"></use>'; 
					$o .=	'				</svg>';
					$o .=	'			</a>';
					$o .=	'		</div><!-- // .bc-flickty-slider__controls -->';
					$o .= '	</div><!-- // .bc-flickty-slider -->';
					$o .= '</div><!-- // .bc-feature-component__content -->';
					if (strcmp($do_waves_class, '') !== 0) {
						$o .= '</div><!-- // .bc-feature-component__wrap -->';
						$o .= '<div class="wave-wrap"><!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.0" class="wave-wrap__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 50" xml:space="preserve">				<path id="isd-rainbow-wave" class="wave-wrap__rainbow" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"></path>				<path class="isd-wave wave-wrap__wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"></path></svg></div>';
					}
					$o .= '</section>';
				} else {
					$o .= '<p>No content found for shortcode id#' . $shorcode_atts['id'] . '</p>';
				}
				return $o;
			} else {
				return NULL;
			}
		}//bc_cpt_shortcode()
		
		
	}//abstract class BCCustomPostType
?>