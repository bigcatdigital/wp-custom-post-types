<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCAdmissionsProcess extends BCCustomPostType {	
		/* 
			Handle all matters for CPT shortcode 
		*/
		//Create shortcode: this part *** should be overridden with formatter ***
		public function create_bc_cpt_shortcode($atts = [], $content = null, $tag = 'bc_cpt_shortcode') {
			//Normalize attribute keys to lowercase
			$atts = array_change_key_case((array) $atts, CASE_LOWER);
			//Override default attributes with user attributes
			$shorcode_atts = shortcode_atts(['id' => null], $atts, $tag);
			
			$o = null;
			if ($shorcode_atts['id'] != NUll) {
				$query_atts = array('p' => $shorcode_atts['id'], 'post_type' => $this->bc_cpt_post_type);
				$shortcode_query = new WP_Query($query_atts);
				if ($shortcode_query->have_posts()) {
					$shortcode_query->the_post(); 
					//** CPT Formatter **//
					$o = null;
					if (get_field('admissions-process-title') && strcmp(get_field('admissions-process-title'), '') !== 0) {
						$o .= '<h2>' . get_field('admissions-process-title') . '</h2>';
						
					}// end if 'admissions-process-title'
					$o .= '<div class="bc-stepped-process">';
						if (get_field('admissions-step-#1') && count(get_field('admissions-step-#1')) > 0) {
							$o .= '<h3 class="bc-stepped-process__heading is-orange-text"><span class="bc-stepped-process__number">1</span>' . esc_html(get_field('admissions-step-#1')['step-title']) . '</h3>';
							
							/* Each process step */
							$process_step = get_field('admissions-step-#1');
							if ($process_step['step-instructions'] && strcmp($process_step['step-instructions'], '') !== 0) {
								$o .= $process_step['step-instructions'];
							}//end if 'step-instructions' 
							if ($process_step['step-link-#1'] && is_array($process_step['step-link-#1']) && count($process_step['step-link-#1']) > 0) {
								$process_step_link = $process_step['step-link-#1'];
								$o .=  '<p>'; 
								$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
								$o .= $process_step_link['title'];
								$o .=  		'<svg class="bc-svg-icon">';
								$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
								$o .=  		'</svg>';
								$o .=  	'</a>';
								$o .=  '</p>';
								
							}//end if 'step-link#1' 
							if ($process_step['step-link-#2'] && is_array($process_step['step-link-#2']) && count($process_step['step-link-#2']) > 0) {
								$process_step_link = $process_step['step-link-#2'];
								$o .=  '<p>'; 
								$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
								$o .= $process_step_link['title'];
								$o .=  		'<svg class="bc-svg-icon">';
								$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
								$o .=  		'</svg>';
								$o .=  	'</a>';
								$o .=  '</p>';
							}//end if 'step-link#2'
							
							/* Step 2 */
							if (get_field('admissions-step-#2') && count(get_field('admissions-step-#2')) > 0) {
								$process_step = get_field('admissions-step-#2');
								$o .= '<h3 class="bc-stepped-process__heading is-red-text"><span class="bc-stepped-process__number">2</span>' . esc_html($process_step['step-title']) . '</h3>';
								if ($process_step['step-instructions'] && strcmp($process_step['step-instructions'], '') !== 0) {
									$o .= $process_step['step-instructions'];
								}//end if 'step-instructions' 
								if ($process_step['step-link-#1'] && is_array($process_step['step-link-#1']) && count($process_step['step-link-#1']) > 0) {
									$process_step_link = $process_step['step-link-#1'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#1' 
								if ($process_step['step-link-#2'] && is_array($process_step['step-link-#2']) && count($process_step['step-link-#2']) > 0) {
									$process_step_link = $process_step['step-link-#2'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#2'
							}// end if 'admissions-step-#2'
							/* Step 3 */
							if (get_field('admissions-step-#3') && count(get_field('admissions-step-#3')) > 0) {
								$process_step = get_field('admissions-step-#3');
								$o .= '<h3 class="bc-stepped-process__heading is-primary-text"><span class="bc-stepped-process__number">3</span>' . esc_html($process_step['step-title']) . '</h3>';
								if ($process_step['step-instructions'] && strcmp($process_step['step-instructions'], '') !== 0) {
									$o .= $process_step['step-instructions'];
								}//end if 'step-instructions' 
								if ($process_step['step-link-#1'] && is_array($process_step['step-link-#1']) && count($process_step['step-link-#1']) > 0) {
									$process_step_link = $process_step['step-link-#1'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#1' 
								if ($process_step['step-link-#2'] && is_array($process_step['step-link-#2']) && count($process_step['step-link-#2']) > 0) {
									$process_step_link = $process_step['step-link-#2'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#2'
								
							}// end if 'admissions-step-#3'
							
							/* Step 4 */
							if (get_field('admissions-step-#4') && count(get_field('admissions-step-#4')) > 0) {
								$process_step = get_field('admissions-step-#4');
								$o .= '<h3 class="bc-stepped-process__heading is-mid-green-text"><span class="bc-stepped-process__number">4</span>' . esc_html($process_step['step-title']) . '</h3>';
								if ($process_step['step-instructions'] && strcmp($process_step['step-instructions'], '') !== 0) {
									$o .= $process_step['step-instructions'];
								}//end if 'step-instructions' 
								if ($process_step['step-link-#1'] && is_array($process_step['step-link-#1']) && count($process_step['step-link-#1']) > 0) {
									$process_step_link = $process_step['step-link-#1'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#1' 
								if ($process_step['step-link-#2'] && is_array($process_step['step-link-#2']) && count($process_step['step-link-#2']) > 0) {
									$process_step_link = $process_step['step-link-#2'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#2'
							}// end if 'admissions-step-#4'
							
							/* Step 5 */
							if (get_field('admissions-step-#5') && count(get_field('admissions-step-#5')) > 0) {
								$process_step = get_field('admissions-step-#5');
								$o .= '<h3 class="bc-stepped-process__heading is-indigo-text"><span class="bc-stepped-process__number">5</span>' . esc_html($process_step['step-title']) . '</h3>';
								if ($process_step['step-instructions'] && strcmp($process_step['step-instructions'], '') !== 0) {
									$o .= $process_step['step-instructions'];
								}//end if 'step-instructions' 
								if ($process_step['step-link-#1'] && is_array($process_step['step-link-#1']) && count($process_step['step-link-#1']) > 0) {
									$process_step_link = $process_step['step-link-#1'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#1' 
								if ($process_step['step-link-#2'] && is_array($process_step['step-link-#2']) && count($process_step['step-link-#2']) > 0) {
									$process_step_link = $process_step['step-link-#2'];
									$o .=  '<p>'; 
									$o .=  	'	<a href="' . $process_step_link['url'] .'" class="bc-icon-link">';
									$o .= $process_step_link['title'];
									$o .=  		'<svg class="bc-svg-icon">';
									$o .=  			'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use> ';
									$o .=  		'</svg>';
									$o .=  	'</a>';
									$o .=  '</p>';
								}//end if 'step-link#2'
								
							}// end if 'admissions-step-#5'
							/** End steps **/
							
							/* Further information */
							if (get_field('admissions-further-information')) {
								$o .= get_field('admissions-further-information');
							}
							
							/* Contact information */
							if (get_field('admissions-contact') && is_array(get_field('admissions-contact')) && count(get_field('admissions-contact')) > 0) {
								$contact_info = get_field('admissions-contact');
								if ($contact_info['contact-name'] && strcmp($contact_info['contact-name'], '') !== 0) {
									$o .= '<p><b>Team lead</b>: ' . $contact_info['contact-name'] . '<br />';
								}
								if ($contact_info['contact-email'] && strcmp($contact_info['contact-email'], '') !== 0) {
									$o .= '<b>Email</b>: <a href="mailto:' . $contact_info['contact-email'] . '">' . $contact_info['contact-email'] . '</a><br />';
								}
								if ($contact_info['contact-number'] && strcmp($contact_info['contact-number'], '') !== 0) {
									$o .= '<b>Phone</b>: <a href="tel:' . $contact_info['contact-number'] . '">' . $contact_info['contact-number'] .'</a><br>'; 
								}
								if ($contact_info['contact-international-number'] && strcmp($contact_info['contact-international-number'], '') !== 0) {
									$o .= '<b>From an international number</b>: (your international dialling code) ' . $contact_info['contact-international-number'] . '</p>'; 
								}  
							}//end if 'admissions-contact'
							
							/** CTA Buttons **/
							$admissions_link = '';
							if (get_field('admissions-form-link-#1') && is_array(get_field('admissions-form-link-#1')) && count(get_field('admissions-form-link-#1')) > 0) {
								$admissions_link = get_field('admissions-form-link-#1');
								$o .= '<p>';
								$o .= '	<a href="' . esc_url($admissions_link['url']) . '" class="bc-button is-mid-green">';
								$o .= 		$admissions_link['title'];
								$o .= '		<svg class="bc-svg-icon">';
								$o .= '			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
								$o .= '		</svg>';
								$o .= '	</a>';
								$o .= '</p>';
							}//end if 'admissions-form-link-#1'
							if (get_field('admissions-form-link-#2') && is_array(get_field('admissions-form-link-#2')) && count(get_field('admissions-form-link-#2')) > 0) {
								$admissions_link = get_field('admissions-form-link-#2');
								$o .= '<p>';
								$o .= '	<a href="' . esc_url($admissions_link['url']) . '" class="bc-button is-mid-green">';
								$o .= 	$admissions_link['title'];
								$o .= '		<svg class="bc-svg-icon">';
								$o .= '			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
								$o .= '		</svg>';
								$o .= '	</a>';
								$o .= '</p>';
							}//end if 'admissions-form-link-#1'
							
						} else {
							'<p>Empty process</p>';
						}// end if 'admissions-step-#1' -- end if admissions process
					$o .= '</div><!-- // .bc-stepped-process -->';
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