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

define( 'WPID_VERSION', '0.1.0' );
define( 'WPID_URL', get_stylesheet_directory_uri() );
define( 'WPID_TEMPLATE_URL', get_template_directory_uri() );
define( 'WPID_PATH', get_template_directory() . '/' );
define( 'WPID_INC', WPID_PATH . 'includes/' );


// Include compartmentalized functions
require_once WPID_INC . 'functions/core.php';


// Run the setup functions
WPID\Core\setup();
