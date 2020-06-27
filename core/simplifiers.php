<?php

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();

//returns back the player code based on the field data
function ziggeofluentforms_get_player_code($field) {
	$code = '';

	//if video token is present, lets add it
	if(isset($field['video_token']) && $field['video_token'] !== '') {
		$code .= ' ziggeo-video="' . $field['video_token'] . '" ';
	}

	//if theme is set
	if(isset($field['theme']) && $field['theme'] !== '') {
		$code .= ' ziggeo-theme="' . $field['theme'] . '" ';
	}

	//if theme color is set
	if(isset($field['theme_color']) && $field['theme_color'] !== '') {
		$code .= ' ziggeo-themecolor="' . $field['theme_color'] . '" ';
	}

	//if width is set
	if(isset($field['width']) && $field['width'] !== '') {
		$code .= ' ziggeo-width="' . $field['width'] . '" ';
	}

	//if height is set
	if(isset($field['height']) && $field['height'] !== '100%' && $field['height'] !== '') {
		$code .= ' ziggeo-height="' . $field['height'] . '" ';
	}

	//if popup is set
	if(isset($field['popup']) && $field['popup'] === 'yes') {
		$code .= ' ziggeo-popup="true" ';

		//if popup_width is set
		if(isset($field['popup_width']) && $field['popup_width'] !== '') {
			$code .= ' ziggeo-popup-width="' . $field['popup_width'] . '" ';
		}

		//if popup_height is set
		if(isset($field['popup_height']) && $field['popup_height'] !== '') {
			$code .= ' ziggeo-popup-height="' . $field['popup_height'] . '" ';
		}
	}

	//if effect profile is present
	if(isset($field['effect_profiles']) && $field['effect_profiles'] !== '') {
		$code .= ' ziggeo-effect-profile="' . $field['effect_profiles'] . '" ';
	}

	//if video profile is present
	if(isset($field['video_profile']) && $field['video_profile'] !== '') {
		$code .= ' ziggeo-video-profile="' . $field['video_profile'] . '" ';
	}

	//if client auth is present
	if(isset($field['client_auth']) && $field['client_auth'] !== '') {
		$code .= ' ziggeo-client-auth="' . $field['client_auth'] . '" ';
	}

	//if client auth is present
	if(isset($field['server_auth']) && $field['server_auth'] !== '') {
		$code .= ' ziggeo-server-auth="' . $field['server_auth'] . '" ';
	}

	//Lets return it
	return $code;
}

//function to return the recorder parameters code using provided field data
function ziggeofluentforms_get_recorder_code($field) {
	$code = '';

	//if theme is set
	if(isset($field['theme'])) {
		$code .= ' ziggeo-theme="' . $field['theme'] . '" ';
	}

	//if theme color is set
	if(isset($field['theme_color'])) {
		$code .= ' ziggeo-themecolor="' . $field['theme_color'] . '" ';
	}

	//if width is set
	if(isset($field['width'])) {
		$code .= ' ziggeo-width="' . $field['width'] . '" ';
	}

	//if height is set
	if(isset($field['height']) && $field['height'] !== '100%') {
		$code .= ' ziggeo-height="' . $field['height'] . '" ';
	}

	//if popup is set
	if(isset($field['popup'])) {
		$code .= ' ziggeo-height="' . $field['height'] . '" ';

		//if popup_width is set
		if(isset($field['popup_width'])) {
			$code .= ' ziggeo-popup-width="' . $field['popup_width'] . '" ';
		}

		//if popup_height is set
		if(isset($field['popup_height'])) {
			$code .= ' ziggeo-popup-height="' . $field['popup_height'] . '" ';
		}
	}

	//if faceoutline is set
	if(isset($field['faceoutline'])) {
		$code .= ' ziggeo-faceoutline="true" ';
	}


	//if recording_width is set
	if(isset($field['recording_width'])) {
		$code .= ' ziggeo-recordingwidth="' . $field['recording_width'] . '" ';
	}

	//if recording_height is set
	if(isset($field['recording_height'])) {
		$code .= ' ziggeo-recordingheight="' . $field['recording_height'] . '" ';
	}

	//if timelimit is set
	if(isset($field['recording_time_max'])) {
		$code .= ' ziggeo-timelimit="' . $field['recording_time_max'] . '" ';
	}

	//if mintimelimit is set
	if(isset($field['recording_time_min'])) {
		$code .= ' ziggeo-mintimelimit="' . $field['recording_time_min'] . '" ';
	}

	//if countdown is set
	if(isset($field['recording_countdown'])) {
		$code .= ' ziggeo-countdown="' . $field['recording_countdown'] . '" ';
	}

	//if recordings (number of allowed recordings) is set
	if(isset($field['recording_amount'])) {
		$code .= ' ziggeo-recordings="' . $field['recording_amount'] . '" ';
	}

	//if effect profile is present
	if(isset($field['effect_profiles'])) {
		$code .= ' ziggeo-effect-profile="' . $field['effect_profiles'] . '" ';
	}

	//if video profile is present
	if(isset($field['video_profile'])) {
		$code .= ' ziggeo-video-profile="' . $field['video_profile'] . '" ';
	}

	//if meta profile is present
	if(isset($field['meta_profile'])) {
		$code .= ' ziggeo-meta-profile="' . $field['meta_profile'] . '" ';
	}

	//if client auth is present
	if(isset($field['client_auth'])) {
		$code .= ' ziggeo-client-auth="' . $field['client_auth'] . '" ';
	}

	//if client auth is present
	if(isset($field['server_auth'])) {
		$code .= ' ziggeo-server-auth="' . $field['server_auth'] . '" ';
	}

	//Lets return it
	return $code;
}

//function to return the videowall parameters code using provided field data
function ziggeofluentforms_get_videowall_code($field) {
	$code = '';

	//Walls are processed on backend and entire code is placed on the front page, unlike the player and recorder which are processed by JavaScript.
	$wall = '[ziggeovideowall ';

	if($field['design'] !== '') {
		$wall .=	'wall_design="' . $field['design'] . '" ';
	}
	if($field['videos_per_page'] !== '') {
		$wall .=	'videos_per_page="' . $field['videos_per_page'] . '" ';
	}
	if($field['videos_to_show'] !== '') {
		$wall .=	'videos_to_show="' . $field['videos_to_show'] . '" ';
	}
	if($field['message'] !== '') {
		$wall .=	'message="' . $field['message'] . '" ';
	}
	if($field['no_videos'] !== '') {
		$wall .=	'on_no_videos="' . $field['no_videos'] . '" ';
	}
	if($field['show_videos'] !== '') {
		$wall .=	'show_videos="' . $field['show_videos'] . '" ';
	}
	if($field['show'] === 'yes') {
		$wall .=	'show="true" ';
	}
	if($field['autoplay'] === 'yes') {
		$wall .=	'autoplay="true" ';
	}
	if($field['title'] !== '') {
		$wall .=	'title="' . $field['title'] . '" ';
	}
	if($field['videowidth'] !== '') {
		$wall .=	'video_width="' . $field['videowidth'] . '" ';
	}
	if($field['videoheight'] !== '') {
		$wall .=	'video_height="' . $field['videoheight'] . '" ';
	}
	if($field['template_name'] !== '') {
		$wall .=	'template_name="' . $field['template_name'] . '" ';
	}

	$replace = array();
	$replace[] = array(
		'from'	=> '<',
		'to'	=> '&lt;'
	);
	$replace[] = array(
		'from'	=> '>',
		'to'	=> '&gt;'
	);

	$code = ziggeo_line_min(videowallsz_content_parse_videowall($wall, false));

	//Lets return it
	return $code;
}

//Function that helps with our preferences
function ziggeofluentforms_get_plugin_options($specific = null) {
	$options = get_option('ziggeogravityforms');

	$defaults = array(
		'capture_content'	=> 'embed_wp'
	);

	//in case we need to get the defaults
	if($options === false || $options === '') {
		// the defaults need to be applied
		$options = $defaults;
	}

	// In case we are after a specific one.
	if($specific !== null) {
		if(isset($options[$specific])) {
			return $options[$specific];
		}
		elseif(isset($defaults[$specific])) {
			return $defaults[$specific];
		}
	}
	else {
		return $options;
	}

	return false;
}

?>