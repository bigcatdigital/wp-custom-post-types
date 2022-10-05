<?php 
	/* 	Big Cat Custom Post Type example class
		* Shows implementation of create_bc_cpt_shortcode
		* The Shortcode is used for custom formatting
	*/
	class BCFAQCPT extends BCCustomPostType {	
		
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
				$query_atts = array('p' => $query_atts['id'], 'post_type' => $this->bc_cpt_post_type);
				$query = new WP_Query($query_atts);
				if ($query->have_posts()) {
					/** 
					 * Do formatting here 
					 * This part should be overridden with formatter 
					**/
					$o .= '<div>';
					while ($query->have_posts()) {
							$query->the_post();
							$o .= '<h3>' . get_the_title() . '</h3>';
					}
					$o .= '</div>';
					/** End Do formatting here **/
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