<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Faculty_Directory
 * @subpackage Faculty_Directory/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Faculty_Directory
 * @subpackage Faculty_Directory/includes
 * @author     Your Name <email@example.com>
 */
function faculty_directory_register_cpt() {

	/**
	 * Post Type: Profiles.
	 */

	$labels = array(
		"name" => __( "Profiles", "profile" ),
		"singular_name" => __( "Profile", "profile" ),
	);

	$args = array(
		"label" => __( "Profiles", "profiles" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "directory", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-id-alt",
		"supports" => array( "title" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "directory", $args );
}

add_action( 'init', 'faculty_directory_register_cpt' );

