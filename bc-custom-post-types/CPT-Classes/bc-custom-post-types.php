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

$bc_one_col = new BCOneColumn('One Column Feture', 'onecolfeature', $one_col_args);

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
$bc_one_col_text_slider = new BCOneColSlider('One Col Text Slider', 'onecoltextslider', $one_col_args);

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
$bc_two_col = new BCTwoColumn('Two Column Feature', 'twocolfeature', $two_col_args);

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
$bc_expandable_blocks = new BCExpandableFeatures('Expandable Features', 'expandablefeatures', $expandable_blocks_args);

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
$in_page_hero = new BCInPageHero('In Page Hero', 'inpagehero', $in_page_hero_args);

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
$bc_feature_cta = new BCFeatureCTA('Feature CTA', 'feature-cta', $feature_cta_args, true);

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
$daily_schedule_cta = new BCDailySchedule('Daily Schedule', 'dailyschedule', $daily_schedule_args);

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
	'rewrite'             => array( 'slug' => 'staff-profiles' ),
	'query_var'           => true
);
$staff_profile_cta = new BCStaffProflie('Staff Profile', 'staffprofile', $staff_profile_args, false);

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
$card_slider_cta = new BCCardSlider('Card Slider', 'card-slider', $card_slider_args);

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
$admissions_process_cta = new BCAdmissionsProcess('Admissions Process', 'admissions-process', $admissions_args);

/* Activation */
//Check version, upgrades

/* Deactivation */
//Unregister postypes

/* Uninstall */
//Ensure data is not deleted, moves to Post







?>
