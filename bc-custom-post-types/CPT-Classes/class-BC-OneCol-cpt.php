<?php 
	/* 	Big Cat Custom Post Type 
		* Generates a One column text feature
	*/
	class BCOneColumn extends BCCustomPostType {	
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
					$bg_fill = '';
					$bg_image = '';
					if (get_field('has-high-chroma') !== 'None') {
						$bg_fill = ' ' . get_field('has-high-chroma');
					} elseif (get_field('has-shade-gradient') !== 'None') {
						$bg_fill = ' ' . get_field('has-shade-gradient');
					} elseif (get_field('has-coloured-background') !== 'None') {
						$bg_fill = ' ' . get_field('has-coloured-background');
					} elseif (get_field('has-shade') !== 'None') {
						$bg_fill = ' ' . get_field('has-shade');
					}
					
					$do_bg_image = (get_field('show-dublin-skyline') && strcmp(get_field('show-dublin-skyline')[0], 'no') !== 0) ? ' has-background-svg isd-dublin-skyline ' : '';
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<section class="bc-one-col-feature bc-feature-component has-background-svg isd-dublin-skyline'. $bg_fill . $do_waves_class . $do_bg_image . '" aria-label="'. get_the_title() .'"> ';
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
					$o .=  get_field('content-body');		
					if (get_field('button-link')) {
					$o .= '<p>';
					$o .= '			<a class="bc-button" href="' . get_field('button-link')['url'] .'">';
						$o .= get_field('button-link')['title'];
						$o .= '				<svg class="bc-svg-icon">';
						$o .= '					<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';  
						$o .= '				</svg>';
						$o .= '			</a>';	
					}
					$o .= '</p>';
					$o .= 		'</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= 	'</article><!-- // .bc-feature-component__content -->';
					if (strcmp($do_bg_image, '') !== 0) {
						$o .= '<img class="isd-background-svg isd-dublin-skyline" src="' . get_theme_file_uri('/media/dublin.svg'). '" aria-role="presentation" />';
					}
					if (get_field('has-elipses')[0] == 'Yes') {
						$o .= '<div class="bc-elipses">'; 
						$o .= '	<svg class="bc-elipses__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 280">'; 
						$o .= '		<title>Elipses</title>';
						$o .= '		<!-- fill:url(#linear-gradient) -->';
						$o .= '		<circle class="bc-elipses__elipse" />'; 
						$o .= '		<circle class="bc-elipses__elipse" />'; 
						$o .= '		<circle class="bc-elipses__elipse" />'; 
						$o .= '		<circle class="bc-elipses__elipse" />'; 
						$o .= '		<circle class="bc-elipses__elipse" />'; 
						$o .= '	</svg>';
						$o .= '</div>';
					}
					if ($do_waves) {
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