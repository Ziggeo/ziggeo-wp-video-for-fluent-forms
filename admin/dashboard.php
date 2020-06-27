<?php

//Helps us with the options that we offer with Fluent Forms

// Index
//	1. Hooks
//		1.1. admin_init
//		1.2. admin_menu
//	2. Fields and sections
//		2.1. ziggeofluentforms_show_form()
//		2.2. ziggeofluentforms_d_hooks()
//		2.3. ziggeofluentforms_g_captured_content()

//Checking if WP is running or if this is a direct call..
defined('ABSPATH') or die();



/////////////////////////////////////////////////
//	1. HOOKS
/////////////////////////////////////////////////

	//Add plugin options
	add_action('admin_init', function() {
		//Register settings
		register_setting('ziggeofluentforms', 'ziggeofluentforms', 'ziggeofluentforms_validate');

		//Active hooks
		add_settings_section('ziggeofluentforms_section_hooks', '', 'ziggeofluentforms_d_hooks', 'ziggeofluentforms');


			// The type of data that is captured once the video is recorded
			add_settings_field('ziggeofluentforms_captured_content',
								__('Choose the data that is saved once video is recorded', 'ziggeofluentforms'),
								'ziggeofluentforms_g_captured_content',
								'ziggeofluentforms',
								'ziggeofluentforms_section_hooks');

	});

	add_action('admin_menu', function() {
		ziggeo_p_add_addon_submenu(array(
			'page_title'	=> 'Ziggeo Video for Fluent Forms',		//page title
			'menu_title'	=> 'Ziggeo Video for Fluent Forms',		//menu title
			'capability'	=> 'manage_options',					//min capability to view
			'slug'			=> 'ziggeofluentforms',					//menu slug
			'callback'		=> 'ziggeofluentforms_show_form')		//function
		);
	}, 12);




/////////////////////////////////////////////////
//	2. FIELDS AND SECTIONS
/////////////////////////////////////////////////

	//Dashboard form
	function ziggeofluentforms_show_form() {
		?>
		<div>
			<h2>Ziggeo Video for Fluent Forms</h2>

			<form action="options.php" method="post" class="ziggeofluentforms_form">
				<?php
				wp_nonce_field('ziggeofluentforms_nonce_action', 'ziggeofluentforms_video_nonce');
				get_settings_errors();
				settings_fields('ziggeofluentforms');
				do_settings_sections('ziggeofluentforms');
				submit_button('Save Changes');
				?>
			</form>
		</div>
		<?php
	}

		function ziggeofluentforms_d_hooks() {
			?>
			<h3><?php _e('Settings', 'ziggeofluentforms'); ?></h3>
			<?php
			_e('Use settings bellow to fine tune how some settings specific for Ziggeo within Fluent Forms should be set.', 'ziggeofluentforms');
		}

			function ziggeofluentforms_g_captured_content() {
				$option = ziggeofluentforms_get_plugin_options('capture_content');
				?>
				<select id="ziggeofluentforms_capture_content" name="ziggeofluentforms[capture_content]">
					<option value="embed_wp" <?php ziggeo_echo_selected($option, 'embed_wp'); ?>>WP Embed code</option>
					<option value="embed_html" <?php ziggeo_echo_selected($option, 'embed_html'); ?>>HTML Embed code</option>
					<option value="video_url" <?php ziggeo_echo_selected($option, 'video_url'); ?>>Video URL</option>
					<option value="video_token" <?php ziggeo_echo_selected($option, 'video_token'); ?>>Video Token</option>
				</select>
				<label for="ziggeofluentforms_capture_content"><?php _e('Depending on your choice here you will change what is captured once the video is recorded'); ?></label>
				<?php
			}

?>