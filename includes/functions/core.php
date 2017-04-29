<?php

namespace WPID\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void
 */
function setup() {

	//We setup nodeifywp before everything
	setup_nodeifywp();

	//This is where to include WordPress Themes capability
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_head', $n( 'header_meta' ) );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	remove_theme_support( 'post-formats' );

	add_theme_support( 'title-tag' );

	do_action( 'wpid_loaded' );
}

/**
 * This is where the nodeifywp magic in place
 */
function setup_nodeifywp() {
	if ( ! class_exists( '\NodeifyWP\App' ) ) {
		if ( is_admin() ) {
			return;
		} else {
			wp_die( esc_html__( 'WPIDThemes requires the NodeifyWP plugin.', 'wpidthemes' ) );
		}
	}

	\NodeifyWP\App::setup( WPID_PATH . '/assets/js/server.js', WPID_URL . '/assets/js/client.js', WPID_PATH . '/assets/js/includes.js', WPID_URL . '/assets/js/includes.js' );
}

/**
 * Add humans.txt to the <head> element.
 *
 * @uses apply_filters()
 *
 * @since 0.1.0
 *
 * @return void
 */
function header_meta() {
	/**
	 * Filter the path used for the site's humans.txt attribution file
	 *
	 * @param string $humanstxt
	 */
	$humanstxt = apply_filters( 'wpid_humans', WPID_TEMPLATE_URL . '/humans.txt' );

	echo '<link type="text/plain" rel="author" href="' . esc_url( $humanstxt ) . '" />';
}
