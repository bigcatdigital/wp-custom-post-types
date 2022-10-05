<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCDailySchedule extends BCCustomPostType {	
		
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
					$o .= '<article class="bc-feature-component__content">';
			 		$o .= 	'<div class="bc-responsive-table-wrap isd-timetable-wrap">';
			 		if (get_field('daily-schedule-table')) {
						$o .= get_field('daily-schedule-table');	
					}// end if 'daily-schedule-table'
			 		$o .= 	'</div><!-- // .bc-responsive-table-wrap -->';
					$o .= '</article>';
				} else {
					$o .= '<p>No content found for shortcode id#' . $shorcode_atts['id'] . '</p>';
				}
				return $o;
			} else {
				return 'NULL';
			}
		}//bc_cpt_shortcode()
	}//abstract class BCCustomPostType
?>