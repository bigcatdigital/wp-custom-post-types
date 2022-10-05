<?php 
	/* 	Big Cat Custom Post Type 
		* Generates a One column text feature
	*/
	class BCOneColVideo extends BCCustomPostType {	
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
					$o = '';
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<!-- One-col video feature -->';
					$o .= '<section class="bc-feature-component has-shade-01 ' . $do_waves_class . '">';  
					if ($do_waves) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= '	<article class="bc-feature-component__content">';
					$o .= '		<div class="bc-feature-component__content__text-content">';
					if (get_the_title() && strcmp(get_the_title(), '') !== 0) {
						$o .= '			<h1 class="bc-inner-page-content__heading">' . get_the_title() . '</h1>';		
					}//end if get_field('title')
					if (get_field('content_intro') && strcmp(get_field('content_intro'), '') !== 0) {
						$o .= '			<p class="bc-feature-component__intro">' . get_field('content_intro') . '</p>';  
						if ($content_intro['content-intro-second-para'] && strcmp($content_intro['content-intro-second-para'], '') !== 0) {
							$o .= $content_intro['content-intro-second-para'];
						}
					}//end if get_field('content-intro')
					if (get_field('video_url') && strcmp(get_field('video_url'), '') !== 0) {
						$o .= '			<div class="bc-media-embed">';
						$o .= '				<div class="bc-media-embed__media">';
						$o .= '					<video controls currentTime="' . get_field('video_start_time') . '" poster="' . get_field('video_poster') . '">';
						$o .= '						<source src="' . get_field('video_url') . '" type="video/mp4">';	
						$o .= '					</video>';
						$o .= '				</div><!-- // .bc-media-embed__media -->';
						if (get_field('video_caption')) {
							$o .= '			<div class="bc-media-embed__caption">' . get_field('video_caption') . '</div><!-- // .bc-media-embed__caption -->';	
						}
						$o .= '			</div><!-- // .bc-media-embed -->';
					}//end if get_field('video_url')
					if (get_field('content-body') && strcmp(get_field('content-body'), '') !== 0) {
						$o .= get_field('content-body');
					}////end if get_field('content-body')
					$o .= '		</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= '	</article><!-- // .bc-feature-component__content -->';
					if ($do_waves) {
						$o .= '</div><!-- // .bc-feature-component__wrap -->';
						$o .= '<div class="wave-wrap"><!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.0" class="wave-wrap__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 50" xml:space="preserve">				<path id="isd-rainbow-wave" class="wave-wrap__rainbow" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"></path>				<path class="isd-wave wave-wrap__wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"></path></svg></div>';
					}
					$o .= '</section><!-- // One-col video feature -->';
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