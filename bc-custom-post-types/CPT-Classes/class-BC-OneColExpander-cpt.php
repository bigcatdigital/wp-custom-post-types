<?php 
	/* 	Big Cat Custom Post Type 
		* Generates a One column text feature
	*/
	class BCOneColExpander extends BCCustomPostType {	
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
					$bg_fill = (strcmp(get_field('has-shade'), 'none') !== 0) ? get_field('has-shade') : ' ';
					$o .= '<section class="bc-feature-component'. $bg_fill . '" aria-label="'. get_the_title() .'"> ';
					
					$o .= '	<div class="bc-feature-component__content"> ';
					$o .= '		<div class="bc-feature-component__content__text-content"> ';
					$o .= '			<h1 class="bc-inner-page-content__heading--large">' . get_the_title() . '</h1>';
					if (get_field('content_intro')) {
						$o .= '			<p class="bc-feature-component__intro">' . get_field('content_intro') . '</p>';	
					}
					if (get_field('content_intro_#2')) {
						$o .= '			<p class="bc-feature-component__intro">' . get_field('content_intro_#2') . '</p>';	
					}
					$o .= '			<article class="bc-1-columns bc-expandible-block">';
					$o .= '				<div class="bc-column">';
					$o .= '					<div class="bc-expandible-block__body">';
					$o .=  get_field('expandable-block');		
					$o .= '					</div><!-- // .bc-expandible-block__body --> ';
					$o .= '					<div class="bc-expandible-block__expander">';
					$o .= '									<a href="javascript:void(0)" class="bc-expandible-block__expander__button">';
					$o .= '										<span class="bc-expandible-block__expander__button__text">';
					$o .= '											<span class="inactive-text">Show more</span>';
					$o .= '											<span class="active-text">Show less</span>';
					$o .= '										</span>';
					$o .= '										<span class="bc-expandible-block__expander__button__icon">';
					$o .= '											<svg class="bc-svg-icon">';
					$o .= '												<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#close-x"></use>'; 	
					$o .= '											</svg>';	
					$o .= '										</span>';
					$o .= '									</a>';
					$o .= '								</div><!-- // .bc-expandible-block__expander -->';
					$o .= '				</div><!-- // .bc-column --> ';
					$o .= '			</article><!-- // .bc-1-columns bc-expandible-block -->';
					$o .= '		</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= '	</div><!-- // .bc-one-col-feature__content -->';
					$o .= '</section><!-- // .bc-one-col-feature expander -->';
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