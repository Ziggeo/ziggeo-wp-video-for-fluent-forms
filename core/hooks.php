<?php

//Output the info about the fluent forms that can help us with the form
add_action('ziggeo_add_to_ziggeowp_object', function() {
	$options = ziggeofluentforms_get_plugin_options();
	$format = '';

	if($options['capture_content'] === 'embed_wp') {
		$format = '[ziggeoplayer]{token}[/ziggeoplayer]';
	}
	elseif($options['capture_content'] === 'embed_html') {
		$format = htmlentities('<ziggeoplayer ' . ziggeo_get_player_code('integrations') . ' ziggeo-video="{token}"></ziggeoplayer>');
	}
	elseif($options['capture_content'] === 'video_url') {
		$format = 'https://ziggeo.io/p/{token}';
	}
	elseif($options['capture_content'] === 'video_token') {
		$format = '{token}';
	}

	//Filter to allow you to change the format yourself regardless of the setting
	//Please place {token} where video token should be placed, everything else is up to you
	$format = apply_filters('ziggeo_fluent_forms_capture_content', $format);

	?>
	fluent_forms: {
		capture_content: "<?php echo $options['capture_content']; ?>",
		capture_format: "<?php echo $format; ?>"
	},
	<?php
});

?>