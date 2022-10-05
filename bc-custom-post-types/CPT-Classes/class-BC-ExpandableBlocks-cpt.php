<?php 
	/* 	Big Cat Custom Post Type base class
		* Template for Cutsom Post Types in Wordpress builds
		* The Shortcode is used for custom formatting
	*/
	class BCExpandableFeatures extends BCCustomPostType {	
		
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
					$do_shade = (get_field('has-shade') !== 'none') ? ' ' . get_field('has-shade') : '' ;
					$do_waves = (get_field('has-waves') === 'yes') ? true : false;
					$do_waves_class = ($do_waves) ? ' has-waves' : '';
					$o .= '<section class="bc-feature-component' . $do_shade . $do_waves_class . '">';   
					if ($do_waves) {
						$o .= '<div class="bc-feature-component__wrap">';
					}
					$o .= 	'<header class="bc-feature-component__header">';
					$o .= 		'<div class="bc-feature-component__content__text-content">';
					$o .= 			'<h1>' . get_the_title() . '</h1>'; 
					$o .= 			'<p class="bc-intro-paragraph">' . get_field('blocks-intro-first-para') . '</p>'; 
					if (get_field('blocks_intro_extended')) {
						$o .= 			get_field('blocks-intro-extended');	
					}
					$o .= 		'</div><!-- // .bc-feature-component__content__text-content -->';
					$o .= 	'</header><!-- // .bc-feature-component__header -->';
					$o .=		'<div class="bc-feature-component__content ">';
					/** Expandable blocks **/
					if (have_rows('expandable-blocks')) {
						$blocks = [];
						while (have_rows('expandable-blocks')) {
							the_row();
							if (get_sub_field('block-#1')) {
								array_push($blocks, get_sub_field('block-#1'));		
							}
							if (get_sub_field('block-#2')) {
								array_push($blocks, get_sub_field('block-#2'));		
							}
							if (get_sub_field('block-#3')) {
								array_push($blocks, get_sub_field('block-#3'));		
							}
							if (get_sub_field('block-#4')) {
								array_push($blocks, get_sub_field('block-#4'));		
							}
							if (get_sub_field('block-#5')) {
								array_push($blocks, get_sub_field('block-#5'));		
							}
							if (get_sub_field('block-#6')) {
								array_push($blocks, get_sub_field('block-#6'));		
							}
							if (get_sub_field('block-#7')) {
								array_push($blocks, get_sub_field('block-#7'));		
							}
							if (get_sub_field('block-#8')) {
								array_push($blocks, get_sub_field('block-#8'));		
							}
						}//end while have rows 'expandable-blocks'
					}//end if have rows 'expandable-blocks'
					if (!empty($blocks)) {
						foreach ($blocks as $block) {
							if ($block['block-image']) {
								$o .=			'<article class="bc-gr-feature bc-gr-columns bc-expandible-block has-colored-text">';
								$o .=				'<picture class="bc-gr-feature__media">';
								$o .=					'<img src="' . $block['block-image']['url'] .  '" alt="The International Baccalaureate">';
								$o .=				'</picture>';
								$o .=				'<div class="bc-gr-feature__text">';
								if ($block['block-title'] !== '') {
									$o .=	'<h2 class="bc-gr-feature__heading">' . $block['block-title'] . '</h2>';
								}
								if ($block['leader-para-#1'] && $block['leader-para-#1'] !== '') {
									$o .=	'<p class="bc-intro-paragraph">' . $block['leader-para-#1'] . '</p>';  
								}
								if ($block['leader-para-#2'] && $block['leader-para-#2'] !== '') {
									$o .=	 $block['leader-para-#2'];  
								}
								if ($block['block-intro-read-more-link'] && is_array($block['block-intro-read-more-link']) && count($block['block-intro-read-more-link']) > 0) {
									$o .=	 '<a class="bc-icon-link" href="' . esc_url($block['block-intro-read-more-link']['url']) . '">'; 
									$o .= 	esc_html($block['block-intro-read-more-link']['title']);
									$o .=	 '	<svg class="bc-svg-icon">';
									$o .=	 '		<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#arrow"></use>';
									$o .=	 '	</svg>';
									$o .=	 '</a>';
								}
								if ($block['expandable-block']) {
									$o .= 				'<div class="bc-expandible-block__expander">';
									$o .= 					'<a href="javascript:void(0)" class="bc-expandible-block__expander__button">';
									$o .= 						'<span class="bc-expandible-block__expander__button__text">';
									$o .= 							'<span class="inactive-text">Show more</span>'; 
									$o .= 							'<span class="active-text">Show less</span>';
									$o .= 						'</span>';
									$o .= 						'<span class="bc-expandible-block__expander__button__icon">';
									$o .= 							'<svg class="bc-svg-icon">';
									$o .= 								'<use xlink:href="' . get_theme_file_uri('/media/svg/icons/bc-svgs.svg') . '#close-x"></use>'; 	
									$o .= 							'</svg>';	
									$o .= 						'</span>';
									$o .=						'</a>';
									$o .=					'</div><!-- // .bc-expandible-block__expander -->';
									$o .= 				'<div class="bc-expandible-block__body">';
									$o .=	$block['expandable-block'];  
									$o .= 				'</div><!-- // .bc-expandible-block__body -->';
								}
							}//end if 'block-image'
							$o .=				'</div><!-- // .bc-gr-feature__text -->';
							$o .= 		'</article><!-- // .bc-expandible-block -->';
						}	//end foreach $blocks as $block
					}//end if is_empty($blocks)
					
					$o .= 	'</div> <!-- // .bc-feature-component__content -->';
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