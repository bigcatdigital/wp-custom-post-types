<?php 
	/* 	Big Cat Custom Post Type 
		* Generates a One column feature with a text slider
	*/
	class BCOneColSlider extends BCCustomPostType {	
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
					//** Do formatting here **//
					$do_shade = get_field('has-shade');
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<section class="bc-one-col-feature bc-feature-component  bc-feature-component--text-slider ' . $do_shade . $do_waves_class .'" aria-label="Welcome to ISD"> ';
					if ($do_waves) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= '<article class="bc-feature-component__content"> ';
					$o .= '<div class="bc-feature-component__content__text-content">';
					if (get_field('content_label_text') != NULL) {
						$o .= '<p class="bc-content-label">' ;
						$o .= '<svg class="bc-svg-icon">' ;
						$o .= '<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . get_field('content_label_icon') . '"></use>';
						$o .= '</svg>';
						$o .= get_field('content_label_text');
						$o .= '</p>';
					}	
					$o .= '<h1 class="bc-inner-page-content__heading--large">' . get_the_title() . '</h1>';
					$o .= '<p class="bc-feature-component__intro">' . get_field('content_intro') . '</p>';
					$o .= get_field('content_body'); 
					
					if (get_field('slide_#1_body')) {
						//The slider
						
						$o .= '<div class="bc-flickty-slider bc-text-slider">';
						$o .= '<div class="bc-flickty-slider__slider">';
						//Prev/next buttons
						$o .= '<a href="" class="bc-flickty-slider__prev is-inactive">' ;
						$o .= '<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
						$o .= '<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#carat"></use>';  
						$o .= '</svg>';
						$o .= '</a><!-- // .bc-flickty-slider__prev -->';
						$o .= '<a href="" class="bc-flickty-slider__next">' ;
						$o .= '<svg version="1.1" class="bc-svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
						$o .= '<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#carat"></use>';  
						$o .= '</svg>';
						$o .= '</a><!-- // .bc-flickty-slider__prev -->';
						//First slide
						$o .= '<div class="bc-flickty-slider__slide has-mark-right--red">';
						$o .= get_field('slide_#1_body');
						$o .= (get_field('slide_#1_name')) ? '<p><strong>' . get_field('slide_#1_name') . '</strong></p>' : '';
						$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						
						//Second slide
						if (get_field('slide_#2_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--orange">';
							$o .= get_field('slide_#2_body');
							$o .= (get_field('slide_#2_name')) ? '<p><strong>' . get_field('slide_#2_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#3_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#3_body');
							$o .= (get_field('slide_#3_name')) ? '<p><strong>' . get_field('slide_#3_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#4_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#4_body');
							$o .= (get_field('slide_#4_name')) ? '<p><strong>' . get_field('slide_#4_name') . '</strong></p>' :  '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#5_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#5_body');
							$o .= (get_field('slide_#5_name')) ? '<p><strong>' . get_field('slide_#5_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#6_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#6_body');
							$o .= (get_field('slide_#6_name')) ? '<p><strong>' . get_field('slide_#6_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#7_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#7_body');
							$o .= (get_field('slide_#7_name')) ? '<p><strong>' . get_field('slide_#7_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#8_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#8_body');
							$o .= (get_field('slide_#8_name')) ? '<p><strong>' . get_field('slide_#8_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#9_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#9_body');
							$o .= (get_field('slide_#9_name')) ? '<p><strong>' . get_field('slide_#9_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						if (get_field('slide_#10_body')) {
							$o .= '<div class="bc-flickty-slider__slide has-mark-right--yellow">';
							$o .= get_field('slide_#10_body');
							$o .= (get_field('slide_#10_name')) ? '<p><strong>' . get_field('slide_#10_name') . '</strong></p>' : '';
							$o .= '</div><!-- // .bc-flickty-slider__slide -->';
						}
						$o .= '	</div><!-- // .bc-flickty-slider__slider -->';	
						$o .= '</div><!-- // .bc-flickty-slider -->';	
					}// if (slide_#1_body)
					$o .= 		'</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= 	'</article><!-- // .bc-feature-component__content -->';
					if ($do_waves) {
						$o .= '</div><!-- // .bc-feature-component__wrap -->';
						$o .= '<div class="wave-wrap"><!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.0" class="wave-wrap__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 50" xml:space="preserve">				<path id="isd-rainbow-wave" class="wave-wrap__rainbow" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"></path>				<path class="isd-wave wave-wrap__wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"></path></svg></div>';
					}
					$o .= '</section><!-- // .bc-one-col-feature -->';
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