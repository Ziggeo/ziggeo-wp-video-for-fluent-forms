<?php

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();

function ziggeofluentforms_use_parameter($field, $key, $not_as = '', $type = 'string') {

	if(!isset($field[$key])) {
		return false;
	}

	if($type === 'string') {
		if($field[$key] !== $not_as) {
			return true;
		}
	}
	elseif($type === 'bool') {
		return true;
	}

	return false;
}

//returns back the player code based on the field data
function ziggeofluentforms_get_player_code($field) {
	$code = '';

	//if video token is present, lets add it
	if(ziggeofluentforms_use_parameter($field, 'video_token')) {
		$code .= ' ziggeo-video="' . $field['video_token'] . '" ';
	}

	//if theme is set
	if(ziggeofluentforms_use_parameter($field, 'theme')) {
		$code .= ' ziggeo-theme="' . $field['theme'] . '" ';
	}

	//if theme color is set
	if(ziggeofluentforms_use_parameter($field, 'theme_color')) {
		$code .= ' ziggeo-themecolor="' . $field['theme_color'] . '" ';
	}

	//if width is set
	if(ziggeofluentforms_use_parameter($field, 'width')) {
		$code .= ' ziggeo-width="' . $field['width'] . '" ';
	}

	//if height is set
	if(ziggeofluentforms_use_parameter($field, 'height' && $field['height'] !== '100%')) {
		$code .= ' ziggeo-height="' . $field['height'] . '" ';
	}

	//if popup is set
	if(ziggeofluentforms_use_parameter($field, 'popup', 'no')) { //No or yes
		$code .= ' ziggeo-popup="true" ';

		//if popup_width is set
		if(ziggeofluentforms_use_parameter($field, 'popup_width')) {
			$code .= ' ziggeo-popup-width="' . $field['popup_width'] . '" ';
		}

		//if popup_height is set
		if(ziggeofluentforms_use_parameter($field, 'popup_height')) {
			$code .= ' ziggeo-popup-height="' . $field['popup_height'] . '" ';
		}
	}

	//if effect profile is present
	if(ziggeofluentforms_use_parameter($field, 'effect_profiles')) {
		$code .= ' ziggeo-effect-profile="' . $field['effect_profiles'] . '" ';
	}

	//if video profile is present
	if(ziggeofluentforms_use_parameter($field, 'video_profile')) {
		$code .= ' ziggeo-video-profile="' . $field['video_profile'] . '" ';
	}

	//if client auth is present
	if(ziggeofluentforms_use_parameter($field, 'client_auth')) {
		$code .= ' ziggeo-client-auth="' . $field['client_auth'] . '" ';
	}

	//if client auth is present
	if(ziggeofluentforms_use_parameter($field, 'server_auth')) {
		$code .= ' ziggeo-server-auth="' . $field['server_auth'] . '" ';
	}

	//if subtitles should be used
	if(ziggeofluentforms_use_parameter($field, 'audio-transcription-as-subtitles', 'no')) {
		$code .= ' ziggeo-audio-transcription-as-subtitles="' . $field['audio-transcription-as-subtitles'] . '" ';
	}

	//if fullscreen should be disabled
	if(ziggeofluentforms_use_parameter($field, 'nofullscreen', 'no')) {
		$code .= ' ziggeo-nofullscreen="' . $field['nofullscreen'] . '" ';
	}

	//if duration of video should be shown upfront
	if(ziggeofluentforms_use_parameter($field, 'showduration', 'no')) {
		$code .= ' ziggeo-showduration="' . $field['showduration'] . '" ';
	}

	//if player settings should be shown
	if(ziggeofluentforms_use_parameter($field, 'showsettings', 'yes')) {
		$code .= ' ziggeo-showsettings="' . $field['showsettings'] . '" ';
	}

	//if airplay is to be supported
	if(ziggeofluentforms_use_parameter($field, 'airplay', 'no')) {
		$code .= ' ziggeo-airplay="' . $field['airplay'] . '" ';
	}

	//if PiP is to be supported
	if(ziggeofluentforms_use_parameter($field, 'allowpip', 'no')) {
		$code .= ' ziggeo-allowpip="' . $field['allowpip'] . '" ';
	}

	//if chromecast is to be supported
	if(ziggeofluentforms_use_parameter($field, 'chromecast', 'no')) {
		$code .= ' ziggeo-chromecast="' . $field['chromecast'] . '" ';
	}

	//if pause should be disabled
	if(ziggeofluentforms_use_parameter($field, 'disablepause', 'no')) {
		$code .= ' ziggeo-disablepause="' . $field['disablepause'] . '" ';
	}

	//if seeking should be disabled
	if(ziggeofluentforms_use_parameter($field, 'disableseeking', 'no')) {
		$code .= ' ziggeo-disableseeking="' . $field['disableseeking'] . '" ';
	}

	//if initial seek is set
	if(ziggeofluentforms_use_parameter($field, 'initialseek', '')) {
		$code .= ' ziggeo-initialseek="' . $field['initialseek'] . '" ';
	}

	//if media loop is enabled
	if(ziggeofluentforms_use_parameter($field, 'loop', 'no')) {
		$code .= ' ziggeo-loop="' . $field['loop'] . '" ';
	}

	//if playlist loop is enabled
	if(ziggeofluentforms_use_parameter($field, 'loopall', 'no')) {
		$code .= ' ziggeo-loopall="' . $field['loopall'] . '" ';
	}

	//if playback on mobile is fullscreen
	if(ziggeofluentforms_use_parameter($field, 'playfullscreenonmobile', 'no')) {
		$code .= ' ziggeo-playfullscreenonmobile="' . $field['playfullscreenonmobile'] . '" ';
	}

	//if player should be a playlist
	if(ziggeofluentforms_use_parameter($field, 'playlist', '')) {
		$code .= ' ziggeo-playlist="' . $field['playlist'] . '" ';
	}

	//if player should be played only when visible
	if(ziggeofluentforms_use_parameter($field, 'playwhenvisible', 'no')) {
		$code .= ' ziggeo-playwhenvisible="' . $field['playwhenvisible'] . '" ';
	}

	//if we should prevent all interaction
	if(ziggeofluentforms_use_parameter($field, 'preventinteraction', 'no')) {
		$code .= ' ziggeo-preventinteraction="' . $field['preventinteraction'] . '" ';
	}

	//if volume is set
	if(ziggeofluentforms_use_parameter($field, 'volume', '')) {
		//This is needed because we accept 0 to 1 and we want to make it easy to set, randing from 0 to 100.
		$field['volume'] = ($field['volume'] / 100);
		$code .= ' ziggeo-volume="' . $field['volume'] . '" ';
	}

	//Lets return it
	return $code;
}

//function to return the recorder parameters code using provided field data
function ziggeofluentforms_get_recorder_code($field) {
	$code = '';

	//if theme is set

	if(ziggeofluentforms_use_parameter($field, 'theme')) {
		$code .= ' ziggeo-theme="' . $field['theme'] . '" ';
	}

	//if theme color is set
	if(ziggeofluentforms_use_parameter($field, 'themecolor')) {
		$code .= ' ziggeo-themecolor="' . $field['themecolor'] . '" ';
	}

	//if width is set
	if(ziggeofluentforms_use_parameter($field, 'width')) {
		$code .= ' ziggeo-width="' . $field['width'] . '" ';
	}

	//if height is set
	if(ziggeofluentforms_use_parameter($field, 'height') && $field['height'] !== '100%') {
		$code .= ' ziggeo-height="' . $field['height'] . '" ';
	}

	//if popup is set
	if(ziggeofluentforms_use_parameter($field, 'popup', 'no')) {
		$code .= ' ziggeo-popup="' . $field['popup'] . '" ';

		//if popup_width is set
		if(ziggeofluentforms_use_parameter($field, 'popup_width')) {
			$code .= ' ziggeo-popup-width="' . $field['popup_width'] . '" ';
		}

		//if popup_height is set
		if(ziggeofluentforms_use_parameter($field, 'popup_height')) {
			$code .= ' ziggeo-popup-height="' . $field['popup_height'] . '" ';
		}
	}

	//if faceoutline is set
	if(ziggeofluentforms_use_parameter($field, 'faceoutline', 'no')) {
		$code .= ' ziggeo-faceoutline="true" ';
	}

	//if we allow file uploads
	if(ziggeofluentforms_use_parameter($field, 'allowupload', 'no')) {
		$code .= ' ziggeo-allowupload="true" ';
	}

	//if we allow recording from camera
	if(ziggeofluentforms_use_parameter($field, 'allowrecord', 'no')) {
		$code .= ' ziggeo-allowrecord="true" ';
	}

	//if we want screen capture to be made
	if(ziggeofluentforms_use_parameter($field, 'allowscreen', 'no')) {
		$code .= ' ziggeo-allowscreen="true" ';
	}

	//if both camera and screen are allowed to be captured together
	if(ziggeofluentforms_use_parameter($field, 'allowmultistreams', 'no')) {
		$code .= ' ziggeo-allowmultistreams="true" ';

		//if the additional screen can be dragged around
		if(ziggeofluentforms_use_parameter($field, 'multistreamdraggable', 'no')) {
			$code .= ' ziggeo-multistreamdraggable="true" ';
		}

		//if the additional video stream height is set
		if(ziggeofluentforms_use_parameter($field, 'addstreamminheight')) {
			$code .= ' ziggeo-addstreamminheight="' . $field['addstreamminheight'] . '" ';
		}

		//if the additional stream width is set
		if(ziggeofluentforms_use_parameter($field, 'addstreamminwidth')) {
			$code .= ' ziggeo-addstreamminwidth="' . $field['addstreamminwidth'] . '" ';
		}

		//if the heigh of the additional stream is set
		if(ziggeofluentforms_use_parameter($field, 'addstreampositionheight')) {
			$code .= ' ziggeo-addstreampositionheight="' . $field['addstreampositionheight'] . '" ';
		}

		//if the width of the additional stream is set
		if(ziggeofluentforms_use_parameter($field, 'addstreampositionwidth')) {
			$code .= ' ziggeo-addstreampositionwidth="' . $field['addstreampositionwidth'] . '" ';
		}

		//if the additional stream position on x-axis is set
		if(ziggeofluentforms_use_parameter($field, 'addstreampositionx')) {
			$code .= ' ziggeo-addstreampositionx="' . $field['addstreampositionx'] . '" ';
		}

		//if the additional stream position on y-axis is set
		if(ziggeofluentforms_use_parameter($field, 'addstreampositiony')) {
			$code .= ' ziggeo-addstreampositiony="' . $field['addstreampositiony'] . '" ';
		}

		//if the additional stream should be proportional
		if(ziggeofluentforms_use_parameter($field, 'addstreamproportional', 'no')) {
			$code .= ' ziggeo-addstreamproportional="true" ';
		}
	}

	//if the camera should be flipped (left is left right is right)
	if(ziggeofluentforms_use_parameter($field, 'flip-camera', 'no')) {
		$code .= ' ziggeo-flip-camera="true" ';
	}

	//if the screen should be flipped 
	if(ziggeofluentforms_use_parameter($field, 'flipscreen', 'no')) {
		$code .= ' ziggeo-flipscreen="true" ';
	}

	//if recording_width is set
	if(ziggeofluentforms_use_parameter($field, 'recording_width')) {
		$code .= ' ziggeo-recordingwidth="' . $field['recording_width'] . '" ';
	}

	//if recording_height is set
	if(ziggeofluentforms_use_parameter($field, 'recording_height')) {
		$code .= ' ziggeo-recordingheight="' . $field['recording_height'] . '" ';
	}

	//if timelimit is set
	if(ziggeofluentforms_use_parameter($field, 'recording_time_max')) {
		$code .= ' ziggeo-timelimit="' . $field['recording_time_max'] . '" ';
	}

	//if mintimelimit is set
	if(ziggeofluentforms_use_parameter($field, 'recording_time_min')) {
		$code .= ' ziggeo-mintimelimit="' . $field['recording_time_min'] . '" ';
	}

	//if countdown is set
	if(ziggeofluentforms_use_parameter($field, 'recording_countdown')) {
		$code .= ' ziggeo-countdown="' . $field['recording_countdown'] . '" ';
	}

	//if recordings (number of allowed recordings) is set
	if(ziggeofluentforms_use_parameter($field, 'recording_amount')) {
		$code .= ' ziggeo-recordings="' . $field['recording_amount'] . '" ';
	}

	//if effect profile is present
	if(ziggeofluentforms_use_parameter($field, 'effect_profiles')) {
		$code .= ' ziggeo-effect-profile="' . $field['effect_profiles'] . '" ';
	}

	//if video profile is present
	if(ziggeofluentforms_use_parameter($field, 'video_profile')) {
		$code .= ' ziggeo-video-profile="' . $field['video_profile'] . '" ';
	}

	//if meta profile is present
	if(ziggeofluentforms_use_parameter($field, 'meta_profile')) {
		$code .= ' ziggeo-meta-profile="' . $field['meta_profile'] . '" ';
	}

	//if client auth is present
	if(ziggeofluentforms_use_parameter($field, 'client_auth')) {
		$code .= ' ziggeo-client-auth="' . $field['client_auth'] . '" ';
	}

	//if client auth is present
	if(ziggeofluentforms_use_parameter($field, 'server_auth')) {
		$code .= ' ziggeo-server-auth="' . $field['server_auth'] . '" ';
	}

	//if client auth is present
	if(ziggeofluentforms_use_parameter($field, 'server_auth')) {
		$code .= ' ziggeo-server-auth="' . $field['server_auth'] . '" ';
	}

	//The transcript language to be set
	if(ziggeofluentforms_use_parameter($field, 'transcript-language', '')) {
		//No need to set the defaults
		if($field['transcript-language'] !== 'en-US') {
			$code .= ' ziggeo-transcript-language="' . $field['transcript-language'] . '" ';
		}
	}

	//If the audio test is to be madatory or not
	if(ziggeofluentforms_use_parameter($field, 'audio-test-mandatory', 'no')) {
		$code .= ' ziggeo-audio-test-mandatory="' . $field['audio-test-mandatory'] . '" ';
	}

	//Lets return it
	return $code;
}

//function to return the videowall parameters code using provided field data
function ziggeofluentforms_get_videowall_code($field) {
	$code = '';

	//Walls are processed on backend and entire code is placed on the front page, unlike the player and recorder which are processed by JavaScript.
	$wall = '[ziggeovideowall ';

	if(ziggeofluentforms_use_parameter($field, 'design')) {
		$wall .=	'wall_design="' . $field['design'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'videos_per_page')) {
		$wall .=	'videos_per_page="' . $field['videos_per_page'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'videos_to_show')) {
		$wall .=	'videos_to_show="' . $field['videos_to_show'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'message')) {
		$wall .=	'message="' . $field['message'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'no_videos')) {
		$wall .=	'on_no_videos="' . $field['no_videos'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'show_videos')) {
		$wall .=	'show_videos="' . $field['show_videos'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'show', 'no')) {
		$wall .=	'show="true" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'autoplay', 'no')) {
		$wall .=	'autoplay="true" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'title')) {
		$wall .=	'title="' . $field['title'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'videowidth')) {
		$wall .=	'video_width="' . $field['videowidth'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'videoheight')) {
		$wall .=	'video_height="' . $field['videoheight'] . '" ';
	}

	if(ziggeofluentforms_use_parameter($field, 'template_name')) {
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

// A helper function for the plugin when the lazy load is used
function ziggeofluentforms_lazyload_support() {

	$result = '<!--
					ziggeo-info: Lazyload was not processed.
				-->';

	if(!defined('ZIGGEO_FOUND_POST')) {

		if(!defined('ZIGGEO_FOUND')) {
			define('ZIGGEO_FOUND', true);
		}

		// Now we also check few more things
		if(function_exists('ziggeo_get_version') && version_compare(ziggeo_get_version(), '3.0') >= 0) {
			$result = ziggeo_p_get_lazyload_activator();

			// We check it again here
			if(!defined('ZIGGEO_FOUND_POST')) {
				define('ZIGGEO_FOUND_POST', true);
			}
		}
		else {
			$result = '<!--
				ziggeo-info: Ziggeo Core plugin does not have lazyload option
				reason: Lazyload was introduced into Ziggeo Core plugin in version 3.0
				solution: This is OK. Since the lazyload was not present in earlier versions no additional output is required
			-->';
		}
	}

	return $result;
}

?>