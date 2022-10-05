<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCTwoColumn extends BCCustomPostType {	
		
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
					$is_colour = (get_field('is-colour') && strcmp(get_field('is-colour'), 'None') !== 0) ? ' ' . get_field('is-colour') : '' ; 
					$has_shade = (get_field('has-shade') && strcmp(get_field('has-shade'), 'None') !== 0) ? ' ' . get_field('has-shade') : '' ; 
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<section class="bc-feature-component bc-2-col-full-features' . $is_colour . $has_shade . $do_waves_class . '" aria-label="An IB Word School and Student Experience"> ';
					if ($do_waves) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= '	<article class="bc-2-col-full-feature">';
					$o .= '		<div class="bc-feature-component__content">'; 
					$o .= '			<div class="bc-2-col-full-feature__image">';
					$o .= '				<picture>';	
					$o .= '					<img src="' . esc_url(get_field('feature-image')['url']) . '" alt="' . esc_html(get_field('feature-image')['alt']) . '">';
					$o .= '				</picture>';
					$o .= '			</div>';
					$o .= '			<div class="bc-2-col-full-feature__text">';
												if (get_field('content_label_text') != NULL) {
													$o .= '<p class="bc-content-label">' ;
													if (get_field('content_label_image')) {
														$o .= '<img src="' . esc_url(get_field('content_label_image')['url']) .'" alt="' . get_field('content_label_image')['alt'] . '" />';
													} else {
														$o .= '<svg class="bc-svg-icon">' ;	
														$o .= '	<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . get_field('content_label_icon') . '"></use>';
														$o .= '</svg>';	
													}
													$o .= get_field('content_label_text') . '</p>';
												}
												$o .= '<h1 class="bc-2-col-full-feature__heading">' . get_the_title() . '</h1>';
												$content_intro = get_field('content-intro-leader-text');
												$o .= '<p class="bc-feature-component__intro">' . $content_intro['content-intro-first-para'] . '</p>';
												$o .=  ($content_intro['content-intro-second-para'] !== '') ?  $content_intro['content-intro-second-para'] : '' ;	
												if (get_field('button-link')) {
													$o .= '			<a class="bc-button" href="' . get_field('button-link')['url'] .'">';
													$o .= get_field('button-link')['title'];
													$o .= '				<svg class="bc-svg-icon">';
													$o .= '					<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';  
													$o .= '				</svg>';
													$o .= '			</a>';	
												} else {
													$o .= '<!-- // no link -->';
												}
					$o .= '			</div>';
					$o .= '		</div>';
					$o .= '	</article>';
					if ($do_waves) {
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