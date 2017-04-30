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
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'admin_init', $n( 'editor_styles' ) );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	remove_theme_support( 'post-formats' );

	add_theme_support( 'title-tag' );

	disable_wp_emojicons();

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

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @return void
 */
function styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool wpid_style_debug
	 */
	$debug = apply_filters( 'wpid_style_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'wpid',
		esc_url( WPID_URL . "/assets/css/wpid{$min}.css" ),
		array(),
		WPID_VERSION
	);
}

/**
 * Enqueue styles for editor.
 *
 * @uses add_editor_style() to load editor styles.
 *
 * @since 0.1.0
 *
 * @return void
 */
function editor_styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool wpid_style_debug
	 */
	$debug = apply_filters( 'wpid_style_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	add_editor_style( esc_url( "/assets/css/editor{$min}.css" ) );
}

/**
 * Disable wp_emoji
 */
function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\disable_emojicons_tinymce' );
}

/**
 * Disable wp_emoji from tinymce
 *
 * @return array
 */
function disable_emojicons_tinymce(){
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
