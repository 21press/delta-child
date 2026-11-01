<?php
/**
 * Delta Child functions.
 *
 * WordPress loads this file before Delta's functions.php, so Delta's constants
 * and classes do not exist yet at the top level. Put code that needs them inside
 * a hook, such as after_setup_theme or init.
 *
 * @package DeltaChild
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load the child stylesheet after Delta's styles.
 *
 * Delta enqueues at the default priority and never loads a style.css, so the
 * child loads its own at a later one. The file's modified time is the version,
 * so an edit reaches visitors without a version bump.
 */
function delta_child_enqueue_styles(): void {
	$path = get_stylesheet_directory() . '/style.css';
	$time = filemtime( $path );

	wp_enqueue_style(
		'delta-child',
		get_stylesheet_uri(),
		array(),
		false !== $time ? (string) $time : wp_get_theme()->get( 'Version' )
	);

	// A design system such as Automatic.css prints site.css at the end of the head. Stay after it.
	$late_styles = '\TwentyOnePress\Delta\Design_System\Late_Styles';
	if ( class_exists( $late_styles ) && $late_styles::is_active() ) {
		$late_styles::hold( 'delta-child' );
	}
}
add_action( 'wp_enqueue_scripts', 'delta_child_enqueue_styles', 20 );

/**
 * Bring Delta's theme settings over when the child theme is activated.
 *
 * WordPress stores Additional CSS and other theme settings per theme, so a new
 * child theme starts without them. A setting the child already has stays as it is.
 */
function delta_child_inherit_parent_settings(): void {
	$parent = get_option( 'theme_mods_' . get_template() );
	if ( ! is_array( $parent ) ) {
		return;
	}

	// WordPress manages the widget state of each theme itself.
	unset( $parent['sidebars_widgets'] );

	$child = get_option( 'theme_mods_' . get_stylesheet() );
	update_option( 'theme_mods_' . get_stylesheet(), ( is_array( $child ) ? $child : array() ) + $parent );
}
add_action( 'after_switch_theme', 'delta_child_inherit_parent_settings', 20 );

// Your code goes below.
