<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'plantwp' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'plantwp' ) // Secondary nav in footer
	)
);

// The Top Menu
function plant_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'nav-main-ul',       // Adding custom nav class
        'items_wrap' => '<ul id="primary-menu" class="nav-main-ul">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 1,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Off Canvas Menu
function plant_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'nav-main-ul',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s nav-ul">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 1,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Footer Menu
function plant_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                              // Remove nav container
    	'menu' => __( 'Footer Links', 'plantwp' ),   	// Nav name
    	'menu_class' => 'menu',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} /* End Footer Menu */

// Header Fallback Menu
function plant_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      // Adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // Before each link
        'link_after' => ''                             // After each link
	) );
}

// Footer Fallback Menu
function plant_footer_links_fallback() {
	/* You can put a default here if you like */
}