<?php 
	/* 	Big Cat Custom Post Type 
		* Generates a One column text feature
	*/
	class BCFeatureQuote extends BCCustomPostType {	
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
					$bg_fill = ' ';
					if (get_field('has-shade-gradient') !== 'None') {
						$bg_fill = ' ' . get_field('has-shade-gradient');
					} elseif (get_field('has-shade') !== 'None') {
						$bg_fill = ' ' . get_field('has-shade');
					}
					$do_waves_class = (get_field('has-waves') === 'yes') ? ' has-waves ' : ' ';
					$o .= '<section class="bc-feature-component'. $bg_fill . $do_waves_class .'" aria-label="'. get_the_title() .'"> ';
					if (strcmp($do_waves_class, ' ') !== 0) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= '<article class="bc-feature-component__content"> ';
					$o .= '	<div class="bc-feature-component__content__text-content">';
					$o .= '		<h1 class="bc-inner-page-content__heading--large">' . get_the_title() . '</h1>';
					$o .= '		<div class="bc-featured-quote ">';
					if (get_field('featured-quote-heading') && strcmp(get_field('featured-quote-heading'), '') !== 0) {
						$o .= '				<h2 class="bc-featured-quote__heading">' . get_field('featured-quote-heading') . '</h2>';	
					}//end if featured-quote-heading
					$o .= '			<div class="bc-featured-quote__icon">';
					$o .=	'				<svg class="bc-svg-icon">';
					$o .=	'					<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#quotes"></use>'; 
					$o .=	'				</svg>';
					$o .=	'			</div><!-- // .bc-featured-quote__icon -->';
					$o .= '			<div class="bc-featured-quote__body">';
				
					if (get_field('featured-quote-intro') && strcmp(get_field('featured-quote-intro'), '') !== 0) {
						$o .= '				<p class="bc-inner-page-content__intro">' . get_field('featured-quote-intro') . '</p>';	
					}//end if featured-quote-heading
					$o .= get_field('featured-quote-body');
					$o .= '			</div><!-- // .bc-featured-quote__body -->';
					$o .= '		</div><!-- // .bc-featured-quote -->';
					$o .= '	</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= '</article><!-- // .bc-feature-component__content -->';
			
					
					if (strcmp($do_waves_class, ' ') !== 0) {
						$o .= '</div><!-- // .bc-feature-component__wrap -->';
						$o .= '<div class="wave-wrap"><!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.0" class="wave-wrap__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 50" xml:space="preserve">				<path id="isd-rainbow-wave" class="wave-wrap__rainbow" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"></path>				<path class="isd-wave wave-wrap__wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"></path></svg></div>';
					}
					$o .= '</section><!-- // .bc-one-col-feature -->';
				} else {
					$o .= 'No content found for shortcode id#' . $shorcode_atts['id'];
				}
				return $o;
			} else {
				return NULL;
			}
		}//bc_cpt_shortcode()
		
		
	}//abstract class BCCustomPostType
?>