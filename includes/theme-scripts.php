<?php

// Remove jquery migrate
add_action( 'wp_default_scripts', 'scrap_remove_jquery_migrate' );
function scrap_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'scrap_register_back_end_scripts');

function scrap_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'scrap-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'scrap_register_front_end');

function scrap_register_front_end() {

	/*
	* Start font google
	* */
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap', array(), null );

	/* Start main Css */
	wp_enqueue_style( 'scrap-library', get_theme_file_uri( '/assets/css/library.min.css' ), array(), '' );
	/* End main Css */

    /* Start main Css */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/fonts/fontawesome/css/all.min.css' ), array(), '5.12.1' );
    /* End main Css */

	/*  Start Style Css   */
	wp_enqueue_style( 'scrap-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */
    wp_enqueue_script( 'scrap-library', get_theme_file_uri( '/assets/js/library.min.js' ), array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'scrap-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0.0', true );

	/*
   * End Get Js Front End
   * */

}