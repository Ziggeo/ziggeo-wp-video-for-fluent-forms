<?php

//
//	This file represents the integration module for Fluent Forms and Ziggeo
//

// Index
//	1. Hooks
//		1.1. ziggeo_list_integration
//		1.2. plugins_loaded
//	2. Functionality
//		2.1. ziggeofluentforms_get_version()
//		2.2. ziggeofluentforms_init()
//		2.3. ziggeofluentforms_run()

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();

//Show the entry in the integrations panel
add_filter('ziggeo_list_integration', function($integrations) {

	$current = array(
		//This section is related to the plugin that we are combining with the Ziggeo, not the plugin/module that does it
		'integration_title'		=> 'Fluent Forms', //Name of the plugin
		'integration_origin'	=> 'https://wpmanageninja.com/', //Where you can download it from

		//This section is related to the plugin or module that is making the connection between Ziggeo and the other plugin.
		'title'					=> 'Ziggeo Video for Fluent Forms', //the name of the module
		'author'				=> 'Ziggeo', //the name of the author
		'author_url'			=> 'https://ziggeo.com/', //URL for author website
		'message'				=> 'Add video to form builder and your forms', //Any sort of message to show to customers
		'status'				=> true, //Is it turned on or off?
		'slug'					=> 'ziggeo-video-for-fluent-forms', //slug of the module
		//URL to image (not path). Can be of the original plugin, or the bridge
		'logo'					=> ZIGGEOFLUENTFORMS_ROOT_URL . 'assets/images/logo.png',
		'version'				=> ZIGGEOFLUENTFORMS_VERSION
	);

	//Check current Ziggeo version
	if(ziggeofluentforms_run() === true) {
		$current['status'] = true;
	}
	else {
		$current['status'] = false;
	}

	$integrations[] = $current;

	return $integrations;
});

add_action('plugins_loaded', function() {
	ziggeofluentforms_run();
});

//Checks if the Fluent Forms exists and returns the version of it
function ziggeofluentforms_get_version() {

	if(!defined( 'FLUENTFORM_VERSION' ) ) {
		return 0;
	}

	return FLUENTFORM_VERSION;
}

//Include all of the needed plugin files
function ziggeofluentforms_include_plugin_files() {

	//Include the files only if we are running this plugin
	include_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'core/simplifiers.php');
	include_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'core/assets.php');
	include_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'core/hooks.php');

	//Fields specific
	require_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'extend/class-video-recorder.php');
	require_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'extend/class-video-player.php');
	require_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'extend/class-video-template.php');

	new Fluent_Forms_Video_Recorder();
	new Fluent_Forms_Video_Player();
	new Fluent_Forms_Ziggeo_Template();

	//Check if there is VideoWalls plugin present or not and include additional field(s) if so
	if(defined('VIDEOWALLSZ_VERSION')) {
		require_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'extend/class-video-wall.php');
		new Fluent_Forms_Video_Wall();
	}
}

//We add all of the hooks we need
function ziggeofluentforms_init() {

	//Lets include all of the files we need
	ziggeofluentforms_include_plugin_files();
}

//Function that we use to run the module 
function ziggeofluentforms_run() {

	//Needed during activation of the plugin
	if(!function_exists('ziggeo_get_version')) {
		add_action( 'admin_notices', function() {
			?>
			<div class="error notice">
				<p><?php _e( 'Please install <a href="https://wordpress.org/plugins/ziggeo/">Ziggeo plugin</a>. It is required for this plugin (Ziggeo Video For Fluent Forms) to work properly!', 'ziggeofluentforms' ); ?></p>
			</div>
			<?php
		});

		return false;
	}

	//Check current Ziggeo version
	if( version_compare(ziggeo_get_version(), '2.0') >= 0 &&
		//check the Fluent Forms version
		version_compare(ziggeofluentforms_get_version(), '3.5.6') >= 0) {

		if(ziggeo_integration_is_enabled('ziggeo-video-for-wpforms')) {
			ziggeofluentforms_init();
			return true;
		}
	}

	return false;
}


?>