<?php 
	/* 	Big Cat Custom Post Type example class
		* Shows implementation of create_bc_cpt_shortcode
		* The Shortcode is used for custom formatting
	*/
	class BCStaffProfilesGetterCPT extends BCCustomPostType {	
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
				$staff_getter_query_atts = array('p' => $query_atts['id'], 'post_type' => $this->bc_cpt_post_type);
				$staff_getter_id = $query_atts['id'];
				//Staff Getter query
				$staff_getter_query = new WP_Query($staff_getter_query_atts);
				//Staff Getter query has posts
				if ($staff_getter_query->have_posts()) {
					while ($staff_getter_query->have_posts()) {
						//Staff query post
						$staff_getter_query->the_post();
						$bg_fill = ' ';
						if (get_field('has-shade') !== 'None') {
							$bg_fill = ' ' . get_field('has-shade');
						}
						$o = '';
						if (get_field('staff-group', $staff_getter_id) && get_field('staff-group', $staff_getter_id) !== null) {
							$staff_group = get_field('staff-group');
							//Set up the block & header
							
							$o .= '	<section class="bc-feature-component' . $bg_fill . '" id="our-team">';
							if (get_field('profiles-header', $staff_getter_id) && strcmp(get_field('profiles-header', $staff_getter_id), '') !== 0) {
								$o .= '<header class="bc-feature-component__header">';
								$o .= '	<div class="bc-feature-component__content__text-content">';
								$o .= '		<h1 class="bc-inner-page-content__heading">' . get_field('profiles-header', $staff_getter_id) . '</h1>';
								if (get_field('profiles-leader', $staff_getter_id)) {
									$o .= '<p class="bc-inner-page-content__intro">' . get_field('profiles-leader', $staff_getter_id) . '</p>';
								}
								if (get_field('profiles-leader-link', $staff_getter_id) && empty(get_field('profiles-leader-link', $staff_getter_id)) !== true) {
									$o .= '	<p><a class="bc-icon-link" href="' . esc_url(get_field('profiles-leader-link')['url'], $staff_getter_id) . '">';
									$o .= get_field('profiles-leader-link', $staff_getter_id)['title'];
									$o .= '		<svg class="bc-svg-icon">';
									$o .= '			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';  
									$o .= '		</svg>';
									$o .= '	</a></p>';
								}
								$o .= '	</div>';
								$o .= '</header><!-- // .bc-feature-component__header -->';
							}
							
							//Staff posts query
							$staff_query = new WP_Query([
								'posts_per_page' => -1,
								'post_type' => 'staffprofile',
								'meta_key'		=> 'staff-group',
								'meta_value'	=> $staff_group
							]);

							//if Staff query has posts
							if ($staff_query->have_posts()) {
								//profiles
								$o .= '<div class="bc-feature-component__content">'; 
								$o .= '	<article class="bc-3-columns ">';
								//Staff profiles
								while ($staff_query->have_posts()) {
									$staff_query->the_post();
									$pr_image = '';
									$has_image = '';
									if (get_field('profile-image') && count(get_field('profile-image'))) { 
										$pr_image = get_field('profile-image');
										$has_image = ' has-image ';
									} else {
										$has_image = ' ';
									}
									$first_name = get_field('first-name');
									$name = get_field('first-name') . ' ' . get_field('last-name');
									$o .= '<div class="bc-column bc-card' . $has_image . 'bc-fade-in-up--is-not-visible">';
									if ($pr_image && is_array($pr_image)) {
										$o .= '	<picture class="bc-card__media">';
										$o .= '		<img src="' . esc_url($pr_image['url']) . '" alt="' . esc_html($pr_image['alt']) . '">'	;
										$o .= '	</picture>';
									}
									$o .= '<h2 class="bc-card__heading">' . $name . '</h2>';
									if (get_field('profile-role') && strcmp(get_field('profile-role'), '') !== 0) {
										$o .= '<h3 class="bc-card__sub-heading">'. get_field('profile-role') . '</h3>';	
									}
									$o .= '<div class="bc-card__cta">';
									$o .= '	<a href="' . get_the_permalink() . '" class="bc-icon-link"> ';
									$o .= '		Read more about ' . $first_name .'';
									$o .= '		<svg class="bc-svg-icon"> ';
									$o .= '			<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
									$o .= '		</svg>';
									$o .= '	</a>';
									$o .= '</div>';
									$o .= '</div><!-- // '. $name . ' -->';	
								}
								$o .= '		</article><!-- // .bc-3-columns -->';
								$o .= '</div><!-- // .bc-feature-component__content -->';
								//close the block wrappers
							} else {
								$o .= '<p>Staff group: ' . $staff_group . '</p>';
								$o .= '<p>No matching Staff found</p>';
								
							}//end if else Staff query has posts
							$o .= '	</section><!-- // .bc-feature-component -->';
						}//end while $staff_getter_query have_posts()
						
					}//end if get staff-group
					return $o;
					wp_reset_postdata();
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