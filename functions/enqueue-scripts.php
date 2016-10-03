<?php
function site_scripts() {
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		wp_register_script('prod-js', get_template_directory_uri() . '/assets/js/production.min.js', array(), '1.2.1', true); // Custom
		wp_enqueue_script('prod-js'); // Enqueue it!
	}

    // Comment reply script for threaded comments
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
	
	if (is_page('staff')) {
		wp_register_script('staff-page', get_template_directory_uri() . '/assets/js/staff-page.min.js', array('jquery') , '1.0.0', true);
		wp_enqueue_script('staff-page'); // Enqueue it!
	}
	if (is_page('submit')) {
		wp_register_script('submit-page', get_template_directory_uri() . '/assets/js/submit-page.min.js', array() , '1.0.4', true);
		wp_enqueue_script('submit-page'); // Enqueue it!
	}
	
	// MAIN CSS
	wp_register_style('plant', get_template_directory_uri() . '/assets/css/main.css', array() , '1.2.5', 'all');
	wp_enqueue_style('plant'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);


function plant_dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}
add_action( 'wp_default_scripts', 'plant_dequeue_jquery_migrate' );