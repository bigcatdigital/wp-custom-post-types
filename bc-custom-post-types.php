<?php
/*
	* Big Cat Custom Post types
	* 
	* @author				Michael Mason Big Cat Design			
	* Plugin Name: 	Big Cat Custom Post types
	* Plugin URI: 	example.com
	* Version: 			0.1.0
	* Author: 			Michael Mason Big Cat Design
	* Description: 	Adds Custom post types to a Wordpress build
*/

define('CPTSHOME', plugin_dir_path(__FILE__));

//Base class 
require CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-cpt.php';

/* 
 * ISD Custom Post Types:
 */
//One col feature
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-OneCol-cpt.php';
$one_col_labels = array(
	'name'               => 'One Column Features',
	'singular_name'      => 'One Column Feature',
	'menu_name'          => 'One Column Features',
	'name_admin_bar'     => 'One Column Feature',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Features',
	'search_items'       => 'Search One Column Features',
	'parent_item_colon'  => 'Parent One Column Feature',
	'not_found'          => 'No One Column Features Found',
	'not_found_in_trash' => 'No One Column Features Found in Trash'
);

$one_col_args = array(
	'labels'              => $one_col_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'one-col-features' ),
	'query_var'           => true
);

new BCOneColumn('One Column Feture', 'onecolfeature', $one_col_args);

//One col video feature
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-OneColVideo-cpt.php';
$one_col_video_labels = array(
	'name'               => 'One Column Video Features',
	'singular_name'      => 'One Column Video Feature',
	'menu_name'          => 'One Column Video Features',
	'name_admin_bar'     => 'One Column Video Feature',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Features',
	'search_items'       => 'Search One Column Video Features',
	'parent_item_colon'  => 'Parent One Column Video Feature',
	'not_found'          => 'No One Column Video Features Found',
	'not_found_in_trash' => 'No One Column Video Features Found in Trash'
);

$one_col_video_args = array(
	'labels'              => $one_col_video_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-video-alt2',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'one-col-video-features' ),
	'query_var'           => true
);

new BCOneColVideo('One Column Video Feture', 'onecolivdeofeature', $one_col_video_args);

//One col with text slider
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-OneColSlider-cpt.php';
$one_col_labels = array(
	'name'               => 'One Col Text Sliders',
	'singular_name'      => 'One Col Text Slider',
	'menu_name'          => 'One Col Text Sliders',
	'name_admin_bar'     => 'One Col Text Slider',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Features',
	'search_items'       => 'Search One Col Text Sliders',
	'parent_item_colon'  => 'Parent One Col Text Slider',
	'not_found'          => 'No One Col Text Sliders Found',
	'not_found_in_trash' => 'No One Col Text Sliders Found in Trash'
);
$one_col_args = array(
	'labels'              => $one_col_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array('title'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'one-col-text-sliders' ),
	'query_var'           => true
);
new BCOneColSlider('One Col Text Slider', 'onecoltextslider', $one_col_args);

//Featured quote
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-FeatureQuote-cpt.php';
$feature_quote_labels = array(
	'name'               => 'Feature Quotes',
	'singular_name'      => 'Feature Quote',
	'menu_name'          => 'Feature Quotes',
	'name_admin_bar'     => 'Feature Quote',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature Quote',
	'new_item'           => 'New Feature Quote',
	'edit_item'          => 'Edit Feature Quote',
	'view_item'          => 'View Feature Quote',
	'all_items'          => 'All Feature Quote',
	'search_items'       => 'Search Feature Quotes',
	'parent_item_colon'  => 'Parent Feature Quote',
	'not_found'          => 'No Feature Quotes Found',
	'not_found_in_trash' => 'No Feature Quotes Found in Trash'
);
$feature_quote_args = array(
	'labels'              => $feature_quote_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-format-quote',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array('title'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'feature-quote' ),
	'query_var'           => true
);
new BCFeatureQuote('Feature Quote', 'feature-quote', $feature_quote_args);

//One-col expander
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-OneColExpander-cpt.php';
$one_col_expander_labels = array(
	'name'               => 'One-Col Expanders',
	'singular_name'      => 'One-Col Expander',
	'menu_name'          => 'One-Col Expanders',
	'name_admin_bar'     => 'One-Col Expander',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add One-Col Expander',
	'new_item'           => 'New One-Col Expander',
	'edit_item'          => 'Edit One-Col Expander',
	'view_item'          => 'View One-Col Expander',
	'all_items'          => 'All One-Col Expanders',
	'search_items'       => 'Search One-Col Expanders',
	'parent_item_colon'  => 'Parent One-Col Expander',
	'not_found'          => 'No One-Col Expanders Found',
	'not_found_in_trash' => 'No One-Col Expanders Found in Trash'
);
$one_col_expander_args = array(
	'labels'              => $one_col_expander_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-format-quote',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array('title'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'one-col-expander' ),
	'query_var'           => true
);
new BCOneColExpander('Feature Quote', 'one-col-expander', $one_col_expander_args);

/** Two col feature **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-TwoCol-cpt.php';
$two_col_labels = array(
	'name'               => 'Two Columns Features',
	'singular_name'      => 'Two Columns Feature',
	'menu_name'          => 'Two Columns Features',
	'name_admin_bar'     => 'Two Columns Feature',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Features',
	'search_items'       => 'Search Two Columns Features',
	'parent_item_colon'  => 'Parent Two Columns Feature',
	'not_found'          => 'No Two Columns Features Found',
	'not_found_in_trash' => 'No Two Columns Features Found in Trash'
);

$two_col_args = array(
	'labels'              => $two_col_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'two-col-features' ),
	'query_var'           => true
);
new BCTwoColumn('Two Column Feature', 'twocolfeature', $two_col_args);

/** Expandable Blocks feature **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-ExpandableBlocks-cpt.php';
$expandable_blocks_labels = array(
	'name'               => 'Expanadable Features',
	'singular_name'      => 'Expanadable Feature',
	'menu_name'          => 'Expanadable Features',
	'name_admin_bar'     => 'Expanadable Feature',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Features',
	'search_items'       => 'Search Expanadable Features',
	'parent_item_colon'  => 'Parent Expanadable Feature',
	'not_found'          => 'No Expanadable Features Found',
	'not_found_in_trash' => 'No Expanadable Features Found in Trash'
);

$expandable_blocks_args = array(
	'labels'              => $expandable_blocks_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'expandable-features' ),
	'query_var'           => true
);
new BCExpandableFeatures('Expandable Features', 'expandablefeatures', $expandable_blocks_args);

/** In-page hero **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-InPageHero-cpt.php';
$in_page_hero_labels = array(
	'name'               => 'In Page Hero',
	'singular_name'      => 'In Page Hero',
	'menu_name'          => 'In Page Heroes',
	'name_admin_bar'     => 'In Page Hero',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Hero',
	'new_item'           => 'New Hero',
	'edit_item'          => 'Edit Hero',
	'view_item'          => 'View Hero',
	'all_items'          => 'All In Page Heroes',
	'search_items'       => 'Search In Page Heroes',
	'parent_item_colon'  => 'Parent In Page Hero',
	'not_found'          => 'No In Page Heroes Found',
	'not_found_in_trash' => 'No In Page Heroes Found in Trash'
);

$in_page_hero_args = array(
	'labels'              => $in_page_hero_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true,
	'rewrite'             => array( 'slug' => 'in-page-hero' ),
	'query_var'           => true
);
new BCInPageHero('In Page Hero', 'inpagehero', $in_page_hero_args);

/** Feature CTA **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-FeatureCTA-cpt.php';
$feature_cta_labels = array(
	'name'               => 'Feature CTA',
	'singular_name'      => 'Feature CTA',
	'menu_name'          => 'Feature CTA',
	'name_admin_bar'     => 'Feature CTA',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Feature',
	'new_item'           => 'New Feature',
	'edit_item'          => 'Edit Feature',
	'view_item'          => 'View Feature',
	'all_items'          => 'All Feature CTAs',
	'search_items'       => 'Search Feature CTAs',
	'parent_item_colon'  => 'Parent Feature CTA',
	'not_found'          => 'No Feature CTAs Found',
	'not_found_in_trash' => 'No Feature CTAs Found in Trash'
);

$feature_cta_args = array(
	'labels'              => $feature_cta_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'feature-cta' ),
	'query_var'           => true
);
new BCFeatureCTA('Feature CTA', 'feature-cta', $feature_cta_args, true);

/** Feature Daily Schedule CPT **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-DailyScheduleCPT-cpt.php';
$daily_schedule_labels = array(
	'name'               => 'Daily Schedule',
	'singular_name'      => 'Daily Schedule',
	'menu_name'          => 'Daily Schedule',
	'name_admin_bar'     => 'Daily Schedule',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Schedule',
	'new_item'           => 'New Schedule',
	'edit_item'          => 'Edit Schedule',
	'view_item'          => 'View Schedule',
	'all_items'          => 'All Schedules',
	'search_items'       => 'Search Daily Schedules',
	'parent_item_colon'  => 'Parent Daily Schedules',
	'not_found'          => 'No Daily Schedules Found',
	'not_found_in_trash' => 'No Daily Schedules Found in Trash'
);

$daily_schedule_args = array(
	'labels'              => $daily_schedule_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-calendar',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'daily-schedule' ),
	'query_var'           => true
);
new BCDailySchedule('Daily Schedule', 'dailyschedule', $daily_schedule_args);

/** Staff Profile **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-StaffProflie-cpt.php';
$staff_profile_labels = array(
	'name'               => 'Staff Profile',
	'singular_name'      => 'Staff Profile',
	'menu_name'          => 'Staff Profiles',
	'name_admin_bar'     => 'Staff Profile',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Staff Profile',
	'new_item'           => 'New Staff Profile',
	'edit_item'          => 'Edit Staff Profile',
	'view_item'          => 'View Staff Profile',
	'all_items'          => 'All Staff Profiles',
	'search_items'       => 'Search Staff Profiles',
	'parent_item_colon'  => 'Parent Staff Profiles',
	'not_found'          => 'No Staff Profiles Found',
	'not_found_in_trash' => 'No Staff Profiles Found in Trash'
);

$staff_profile_args = array(
	'labels'              => $staff_profile_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-businessperson',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'staff'),
	'query_var'           => true
);
new BCStaffProflie('Staff Profile', 'staffprofile', $staff_profile_args, false);

/** Staff Profile Getter **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-StaffProfilesGetter-cpt.php';
$staff_profiles_getter_labels = array(
	'name'               => 'Staff Profiles Getter',
	'singular_name'      => 'Staff Profiles Getter',
	'menu_name'          => 'Staff Profiles Getter',
	'name_admin_bar'     => 'Staff Profiles Getter',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Staff Profiles Getter',
	'new_item'           => 'New Staff Profiles Getter',
	'edit_item'          => 'Edit Staff Profiles Getter',
	'view_item'          => 'View Staff Profiles Getter',
	'all_items'          => 'All Staff Profiles Getters',
	'search_items'       => 'Search Staff Profiles Getters',
	'parent_item_colon'  => 'Parent Staff Profiles Getter',
	'not_found'          => 'No Staff Profiles Getters Found',
	'not_found_in_trash' => 'No Staff Profiles Getters Found in Trash'
);

$staff_profiles_getter_args = array(
	'labels'              => $staff_profiles_getter_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-businessperson',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'staff-profiles-getter' ),
	'query_var'           => true
);
new BCStaffProfilesGetterCPT('Staff Profiles Getter', 'staffprofilesgetter', $staff_profiles_getter_args);

/** Card slider **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-CardSlider-cpt.php';
$card_slider_labels = array(
	'name'               => 'Card Slider',
	'singular_name'      => 'Card Slider',
	'menu_name'          => 'Card Sliders',
	'name_admin_bar'     => 'Card Slider',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Card Slider',
	'new_item'           => 'New Card Slider',
	'edit_item'          => 'Edit Card Slider',
	'view_item'          => 'View Card Slider',
	'all_items'          => 'All Card Sliders',
	'search_items'       => 'Search Card Sliders',
	'parent_item_colon'  => 'Parent Card Sliders',
	'not_found'          => 'No Card Sliders Found',
	'not_found_in_trash' => 'No Card Sliders Found in Trash'
);

$card_slider_args = array(
	'labels'              => $card_slider_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-appearance',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'card-slider' ),
	'query_var'           => true
);
new BCCardSlider('Card Slider', 'card-slider', $card_slider_args);

/** Admissions process **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-AdmissionsProcess-cpt.php';
$admissions_labels = array(
	'name'               => 'Admissions Process',
	'singular_name'      => 'Admissions Process',
	'menu_name'          => 'Admissions Processes',
	'name_admin_bar'     => 'Admissions Process',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Admissions Process',
	'new_item'           => 'New Admissions Process',
	'edit_item'          => 'Edit Admissions Process',
	'view_item'          => 'View Admissions Process',
	'all_items'          => 'All Admissions Processes',
	'search_items'       => 'Search Admissions Processes',
	'parent_item_colon'  => 'Parent Admissions Processes',
	'not_found'          => 'No Admissions Processes Found',
	'not_found_in_trash' => 'No Admissions Processes Found in Trash'
);

$admissions_args = array(
	'labels'              => $admissions_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-text-page',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'card-slider' ),
	'query_var'           => true
);
new BCAdmissionsProcess('Admissions Process', 'admissions-process', $admissions_args);

/** Hompage quicklinks **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-QuickNav-cpt.php';
$quicknav_labels = array(
	'name'               => 'Quick Navigation',
	'singular_name'      => 'Quick Navigation',
	'menu_name'          => 'Quick Navigation',
	'name_admin_bar'     => 'Quick Navigation',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Quick Navigation',
	'new_item'           => 'New Quick Navigation',
	'edit_item'          => 'Edit Quick Navigations',
	'view_item'          => 'View Quick Navigation',
	'all_items'          => 'All Quick Navigations',
	'search_items'       => 'Search Quick Navigations',
	'parent_item_colon'  => 'Parent Quick Navigations',
	'not_found'          => 'No Quick Navigations Found',
	'not_found_in_trash' => 'No Quick Navigations Found in Trash'
);

$quicknav_args = array(
	'labels'              => $quicknav_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-menu',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'quicknav' ),
	'query_var'           => true
);
new BCQuickNavCPT('QuickNav', 'quicknav', $quicknav_args, false);

/** Frequently Asked Question **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-FAQ-cpt.php';
$faq_labels = array(
	'name'               => 'FAQ',
	'singular_name'      => 'FAQ',
	'menu_name'          => 'FAQs',
	'name_admin_bar'     => 'FAQ',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add FAQ',
	'new_item'           => 'New FAQ',
	'edit_item'          => 'Edit FAQs',
	'view_item'          => 'View FAQ',
	'all_items'          => 'All FAQs',
	'search_items'       => 'Search FAQs',
	'parent_item_colon'  => 'Parent FAQs',
	'not_found'          => 'No FAQs Found',
	'not_found_in_trash' => 'No FAQs Found in Trash'
);

$faq_args = array(
	'labels'              => $faq_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-format-quote',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'faq' ),
	'query_var'           => true
);
new BCFAQCPT('FAQ', 'faq', $faq_args, false);

/** FAQs getter **/
include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-FAQ-Getter-cpt.php';
$faq_getter_labels = array(
	'name'               => 'FAQ Getter',
	'singular_name'      => 'FAQ Getter',
	'menu_name'          => 'FAQ Getter',
	'name_admin_bar'     => 'FAQ Getter',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add FAQ Getter',
	'new_item'           => 'New FAQ Getter',
	'edit_item'          => 'Edit FAQ Getters',
	'view_item'          => 'View FAQ Getter',
	'all_items'          => 'All FAQ Getters',
	'search_items'       => 'Search FAQ Getters',
	'parent_item_colon'  => 'Parent FAQ Getters',
	'not_found'          => 'No FAQ Getters Found',
	'not_found_in_trash' => 'No FAQ Getters Found in Trash'
);

$faq_getter_args = array(
	'labels'              => $faq_getter_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-list-view',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'faq-getter' ),
	'query_var'           => true
);
new BCFAQGetterCPT('FAQ Getter', 'faq-getter', $faq_getter_args);

include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-MainNav-cpt.php';
$main_navigation_labels = array(
	'name'               => 'Site Header',
	'singular_name'      => 'Site Header',
	'menu_name'          => 'Site Header',
	'name_admin_bar'     => 'Site Header',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Site Header',
	'new_item'           => 'New Site Header',
	'edit_item'          => 'Edit Site Headers',
	'view_item'          => 'View Site Header',
	'all_items'          => 'All Site Headers',
	'search_items'       => 'Search Site Headers',
	'parent_item_colon'  => 'Parent Site Headers',
	'not_found'          => 'No Site Headers Found',
	'not_found_in_trash' => 'No Site Headers Found in Trash'
);
$main_navigation_args = array(
	'labels'              => $main_navigation_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-menu-alt3',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'site-header' ),
	'query_var'           => true
);
new BCMainNavigationCPT('Site header', 'site-header', $main_navigation_args, false);

include CPTSHOME . 'bc-custom-post-types/CPT-Classes/class-BC-Footer-cpt.php';
$site_footer_labels = array(
	'name'               => 'Site Footer',
	'singular_name'      => 'Site Footer',
	'menu_name'          => 'Site Footer',
	'name_admin_bar'     => 'Site Footer',
	'add_new'            => 'Add New',
	'add_new_item'       => 'Add Site Footer',
	'new_item'           => 'New Site Footer',
	'edit_item'          => 'Edit Site Footers',
	'view_item'          => 'View Site Footer',
	'all_items'          => 'All Site Footers',
	'search_items'       => 'Search Site Footers',
	'parent_item_colon'  => 'Parent Site Footers',
	'not_found'          => 'No Site Footers Found',
	'not_found_in_trash' => 'No Site Footers Found in Trash'
);
$site_footer_args = array(
	'labels'              => $site_footer_labels,
	'public'              => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'show_in_nav_menus'   => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-megaphone',
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'supports'            => array( 'title', 'author', 'thumbnail'),
	'has_archive'         => true, 
	'rewrite'             => array( 'slug' => 'site-footer' ),
	'query_var'           => true
);
new BCMainNavigationCPT('Site footer', 'site-footer', $site_footer_args, false);


/* Activation */
//Check version, upgrades

/* Deactivation */
//Unregister postypes

/* Uninstall */
//Ensure data is not deleted, moves to Post

?>
