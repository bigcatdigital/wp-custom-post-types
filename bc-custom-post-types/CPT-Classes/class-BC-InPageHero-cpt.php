<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCInPageHero extends BCCustomPostType {	
		
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
					//** CPT formatter **//
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<section class="bc-hero bc-hero--inpage has-mid-green-grad' . $do_waves_class . '">'; 
					if ($do_waves) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= 	'<div class="bc-hero__content">';
					$o .= 		'<div class="bc-hero__body">';
					if (get_field('content_label_text')) {
						$o .= 			'<div class="bc-hero__body__text__IB bc-content-label bc-fade-in-up--is-not-visible">';
						if (get_field('content_label_image')) {
							$o .= '<img src="' . esc_url(get_field('content_label_image')['url']) .'" alt="' . get_field('content_label_image')['alt'] . '" />';
						} else {
							$o .= '<svg class="bc-svg-icon">' ;	
							$o .= '	<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . get_field('content_label_icon') . '"></use>';
							$o .= '</svg>';	
						}
						$o .= 				get_field('content_label_text'); 
						$o .= 			'</div><!-- // .bc-content-label -->';
					}//end if 'content_label_icon'
					$o .= 			'<div class="bc-hero__body__text bc-fade-in-up--is-not-visible">';
					$o .= 				'<h1 class="bc-hero__heading">' . get_field('feature-title') . '</h1>';
					if (get_field('feature-sub-title-tagline')) {
						$o .= 				'<p class="bc-hero__tagline">' . get_field('feature-sub-title-tagline') . '</p>';	
					}
					if (get_field('feature-leader-text')) {
						$o .= 				'<p>' . get_field('feature-leader-text') . '</p>';	
					}
					if (get_field('button-link')) {
						$cta_link = get_field('button-link');
						$o .= '<a class="bc-button" href="' . $cta_link['url'] . '">';
						$o .= $cta_link['title'];				
						$o .= 	'<svg class="bc-svg-icon">';
						$o .= 		'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
						$o .= 	'</svg>';
						$o .= '</a>';
					}
					$o .= 			'</div><!-- // .bc-hero__body__text -->'; 
					$o .= 		'</div><!-- // .bc-hero__body -->';
					$o .= 		'<img class="bc-hero__image" src="' . get_field('feature-image')['url'] . '" alt="' . get_field('feature-image')['alt'] . '">';
					$o .= 		'<div class="media-overlay"></div>';
					$o .= 	'</div><!-- // .bc-hero__content -->';
					if ($do_waves) {
						$o .= 	'</div><!-- // .bc-feature-component__wrap -->';
						$o .= '<div class="wave-wrap"><!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.0" class="wave-wrap__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 50" xml:space="preserve">				<path id="isd-rainbow-wave" class="wave-wrap__rainbow" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"></path>				<path class="isd-wave wave-wrap__wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"></path></svg></div>';
					}
					$o .= '</section><!-- // .bc-hero--inpage -->';
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