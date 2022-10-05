<?php
	/* Template Name: Homepage template */
	include 'php-includes/global-functions.php';
	get_header();
?>

<body class="bc-feature-page"> 
	<?php get_site_header(); ?>
		<!-- Hero with image -->
		<section class="bc-hero bc-hero--is-feature has-waves">
			<div class="bc-hero__content">
				<div class="bc-hero__body">
					<div class="bc-hero__body__text bc-fade-in-up--is-not-visible"> 
						<h1 class="bc-hero__heading"><?php the_field('hero-title', 18) ?></h1>
						<div class="bc-hero__body__text__IB">
							<?php if (get_field('show-world-school-icon', 18)[0] == 'Yes') { ?>
								<img src="<?php echo get_theme_file_uri('/media/ib-world-school-logo-2-colour.png'); ?>" alt="ISD is an International Baccalaureate World School">
								<p>ISD is an International Baccalaureate World School</p> 
							<?php } ?>
						</div><!-- // .bc-hero__body__text__IB -->
					</div><!-- // .bc-hero__body__text -->
					<img src="<?php echo get_theme_file_uri('/media/kids-carefree--lines.svg'); ?>" alt="Feel the energy at ISD" class="is-kids-lines">		
				</div><!-- // .bc-hero__body -->
				<div class="bc-hero__video">
					<video src="<?php the_field('hero-video', 18); ?>" class="bc-hero__video__video" autoplay muted preload="metadata" playsinline></video>
					<a href="javascript:void(0)" class="bc-hero__video__controls">
						<span class="bc-hero__video__controls__play-icon">
							<svg class="bc-svg-icon ">
								<use xlink:href="<?php echo get_theme_file_uri('/media/svg/icons/bc-svgs.svg'); ?>#play"></use>  
							</svg>	
							<span class="bc-hero__video__controls__text">Play video</span>
						</span>
						<span class="bc-hero__video__controls__pause-icon">
							<svg class="bc-svg-icon bc-hero__video__controls__pause-icon">
								<use xlink:href="<?php echo get_theme_file_uri('/media/svg/icons/bc-svgs.svg'); ?>#pause"></use>  
							</svg>	
							<span class="bc-hero__video__controls__text">Pause video</span>
						</span>
					</a>
				</div>
				<div class="media-overlay"></div><!-- // .media-overlay -->
			</div><!-- // .bc-hero__content -->
			<div class="wave-wrap">
				<?php
					echo '<?xml version="1.0" encoding="utf-8"?>'
				?>
				<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 1440 50" xml:space="preserve">
					<path style="fill: url(#isd-rainbow-grad)" id="isd-rainbow-wave" class="st1" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"/>
					<path class="isd-wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"/>
				</svg>
			</div><!-- // .bc-wave-wrap -->
		</section><!-- // .bc-hero -->
	<section class="bc-feature-component site-quicklinks-component has-waves has-shade-01">
		<div class="bc-feature-component__wrap">
			<div class="bc-feature-component__content">
				<div class="bc-feature-component__content__text-content">
						<nav class="site-quicklinks">
						<h2 class="site-quicklinks__heading">
							<span class="site-quicklinks__heading__label">
								What would you like to know?	
							</span>
							<a href="javascript:void(0)" class="site-quicklinks__toggle bc-navigation-toggle">
									<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>
									<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
									<svg version="1.1" class="bc-menu-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
										<g class="bc-menu-icon__lines">
											<line class="bc-menu-icon__line bc-menu-icon__lines__line bc-menu-icon__lines__line--top" x1="1" y1="25" x2="99" y2="25"/>
											<line class="bc-menu-icon__line bc-menu-icon__lines__line bc-menu-icon__lines__line--middle" x1="1" y1="50" x2="99" y2="50"/>
											<line class="bc-menu-icon__line bc-menu-icon__lines__line bc-menu-icon__lines__line--bottom" x1="1" y1="75" x2="99" y2="75"/>						
										</g>
										<g class="bc-menu-icon__active-lines">
											<line class="bc-menu-icon__line bc-menu-icon__lines__active-line bc-menu-icon__lines__active-line--first" x1="-70" y1="-70" x2="0" y2="0"/>
											<line class="bc-menu-icon__line bc-menu-icon__lines__active-line bc-menu-icon__lines__active-line--second" x1="100" y1="0" x2="170" y2="-70"/>
										</g>
									</svg>
							</a>
						</h2>
						<!-- What would you like to know links -->
						<div class="site-quicklinks__wrapper">
							<ul class="site-quicklinks__list" style="padding-bottom: 0.75rem"> 
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(20) ?>">Admissions</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(13) ?>">About the School</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(86) ?>">Learning and Teaching at ISD</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(176) ?>">Support for your transition</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo rtrim(get_permalink(86), '/') . '#language-support' ?>">Language support for your children</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(15) . '#isd-community' ?>">Parents&apos; Community</a></li> 
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(102) ?>">After School Program</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo get_permalink(13) ?>">Our Mission &amp; Values</a></li>
								<li class="site-quicklinks__item "><a class="is-site-quicklink" href="<?php echo rtrim(get_permalink(13), '/') . '#our-team'?>">Meet the people at ISD</a></li>
							</ul>		
						</div>
						<!-- //What would you like to know links -->
					</nav><!-- // .site-quicklinks --> 
				</div><!-- // .bc-feature-component__content -->
			</div><!-- // .bc-feature-component__content .site-quicklinks --> 
			<div class="media-overlay"></div><!-- // .media-overlay -->
		</div><!-- // .bc-feature-component__wrap -->
		<div class="wave-wrap">
			<?php
				echo '<?xml version="1.0" encoding="utf-8"?>'
			?>
			<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 1440 50" xml:space="preserve">
				<path style="fill: url(#isd-rainbow-grad)" id="isd-rainbow-wave" class="st1" d="M0,1v1v25.2c0,0,200.9-24.7,360-24.7S923.9,50,1080,50s360-23.5,360-23.5V2V1H0z"/>
				<path class="isd-wave" id="isd-wave" d="M0,0v1v24.7C0,25.7,200.9,1,360,1s563.9,47,720,47s360-22.5,360-22.5V1V0H0z"/>
			</svg>
		</div><!-- // .bc-wave-wrap -->
		
	</section><!-- // .bc-feature-component -->
	<?php 
	while (have_posts()) {
		the_post();
		the_content(); 
		if (get_field('show-feature-cta') !== 'no') {
			get_global_CTA();	
		}
		get_footer();
		if (get_field('show-show-to-top') === 'yes') {
			get_floating_section_nav(); 	
		}
	}//end while have_posts() ?>