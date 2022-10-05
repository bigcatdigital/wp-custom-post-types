<?php 
	/* 	Big Cat Custom Post Type example class
		* Shows implementation of create_bc_cpt_shortcode
		* The Shortcode is used for custom formatting
	*/
	class BCFAQGetterCPT extends BCCustomPostType {	
		/* 
			Handle all matters for CPT shortcode 
		*/
		//Create shortcode
		public function create_bc_cpt_shortcode($atts = [], $content = null, $tag = 'bc_cpt_shortcode') {
			//Normalize attribute keys to lowercase
			$atts = array_change_key_case((array) $atts, CASE_LOWER);
			//Override default attributes with user attributes
			$query_atts = shortcode_atts(['id' => null], $atts, $tag);
			if ($query_atts['id'] != null) {
				$faq_getter_query_atts = array('p' => $query_atts['id'], 'post_type' => $this->bc_cpt_post_type);
				//FAQ Getter query
				$faq_getter_query = new WP_Query($faq_getter_query_atts);
				//FAQ Getter query has posts
				if ($faq_getter_query->have_posts()) {
					//FAQ query post
					$faq_getter_query->the_post();
					if (get_field('faq-category') && get_field('faq-category') !== null) {
						$faq_category = get_field('faq-category');	
					}
					//FAQ posts query
					$faqs_query = new WP_Query([
						'posts_per_page' => -1,
						'post_type' => 'faq',
						'meta_key'		=> 'faq-category',
						'meta_value'	=> $faq_category
					]);
					//if FAQ query has posts
					//var_dump($faq_posts);
					if ($faqs_query->have_posts()) {
						//Set up accordion div
						$o = '<div class="bc-accordion">';
						$faqs_idx = 1;
						while ($faqs_query->have_posts()) {
							$faqs_query->the_post();
							if (get_field('faq-question') && strcmp(get_field('faq-question'), '') !== 0) {
								$o .= '<h2 class="bc-accordion__block-heading">';
								$o .= '	<a href="javascript:void(0)" data-target="accordion-body' . $faqs_idx .'" class="bc-accordion__block-trigger">';
								$o .= 		get_field('faq-question');
								$o .= '		<span class="bc-accordion__block-trigger__icon">';
								$o .= '			<svg class="bc-svg-icon">';
								$o .= '				<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#close-x"></use>';
								$o .= '			</svg>';
								$o .= '		</span>';
								$o .= '	</a>';
								$o .= '</h2>';
							}//end if get_field faq-question 
							if (get_field('faq-answer')) {
								$o .= '<div data-accordion-body="accordion-body'. $faqs_idx . '" class="bc-accordion__block-body">';
								$o .= get_field('faq-answer');
								$o .= '	<p class="bc-accordion__close"> ';
								$o .= '		<a href="javascript:void(0)">Close</a>';
								$o .= '	</p>'; 
								$o .= '</div><!-- // .accordion-block#2 -->';
							}//end if get_field faq-answer
							++$faqs_idx;
						}
						$o .= '</div><!-- // .bc-accordion -->';	
						wp_reset_postdata();
					} else {
						$o .= '<p>FAQ category: ' . $faq_category . '</p>';
						$o .= '<p>No matching FAQs found</p>';
					}//end if else FAQ query has posts
					
					return $o;
				//end if $faq_query have_posts()
				} else {
					$o .= '<p>No posts match</p>';
				}
				return $o;
			} else {
				return NULL;
			}
		}//bc_cpt_shortcode()
		
		
	}//abstract class BCCustomPostType
?>