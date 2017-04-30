<?php
namespace WPID\Core\TemplateTags;

/**
 * template tags
 */

/**
 * Setup all the functionality
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	\NodeifyWP\App::instance()->register_template_tag( 'wpid_the_custom_logo', $n( 'wpid_the_custom_logo' ) );
}

function wpid_the_custom_logo(){
	if ( function_exists( '\the_custom_logo' ) ) {
		ob_start();

		\the_custom_logo();

		return ob_get_clean();
	}
	return false;
}

add_action( 'wpid_loaded', __NAMESPACE__ . '\setup' );
