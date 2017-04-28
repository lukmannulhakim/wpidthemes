<?php
/**
 * WPIDThemes functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage WPIDThemes
 * @since 0.1.0
 */

if ( ! class_exists( '\NodeifyWP\App' ) ) {
	if ( is_admin() ) {
		return;
	} else {
		wp_die( esc_html__( 'Twenty Sixteen React requires the NodeifyWP plugin.', 'twentysixteen' ) );
	}
}

\NodeifyWP\App::setup( __DIR__ . '/js/server.js', get_stylesheet_directory_uri() . '/js/client.js', __DIR__ . '/js/includes.js', get_stylesheet_directory_uri() . '/js/includes.js' );

