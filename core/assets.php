<?php

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();

function ziggeofluentforms_global() {
	//local assets
	wp_register_script('ziggeofluentforms-js', ZIGGEOFLUENTFORMS_ROOT_URL . 'assets/js/codes.js', array());
	wp_enqueue_script('ziggeofluentforms-js');
}

//Load the admin scripts (and local)
function ziggeofluentforms_admin() {

	ziggeofluentforms_global();

	wp_register_script('ziggeofluentforms-adminjs', ZIGGEOFLUENTFORMS_ROOT_URL . 'assets/js/admin-codes.js', array());
	wp_enqueue_script('ziggeofluentforms-adminjs');
}

add_action('wp_enqueue_scripts', "ziggeofluentforms_global");
//add_action('admin_enqueue_scripts', "ziggeofluentforms_admin");
//Non standard however needed ;)
if(is_admin()) {
	add_action('wp_print_scripts', "ziggeofluentforms_admin", 20);
}


?>