<?php
/*
Plugin Name: Ziggeo Video for Fluent Forms
Plugin URI: https://ziggeo.com/integrations/wordpress
Description: Add the Powerful Ziggeo video service platform to your Fluent Forms form builder and forms
Author: Ziggeo
Version: 1.6.2
Author URI: https://ziggeo.com
*/

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();


//rooth path
define('ZIGGEOFLUENTFORMS_ROOT_PATH', plugin_dir_path(__FILE__) );

//Setting up the URL so that we can get/built on it later on from the plugin root
define('ZIGGEOFLUENTFORMS_ROOT_URL', plugins_url('', __FILE__) . '/');

//plugin version - this way other plugins can get it as well and we will be updating this file for each version change as is
define('ZIGGEOFLUENTFORMS_VERSION', '1.6.2');

//Include files
include_once(ZIGGEOFLUENTFORMS_ROOT_PATH . 'core/run.php');

?>