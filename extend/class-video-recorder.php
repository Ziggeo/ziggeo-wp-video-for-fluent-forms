<?php

use FluentForm\App\Services\FormBuilder\BaseFieldManager;
use FluentForm\Framework\Helpers\ArrayHelper;

class Fluent_Forms_Video_Recorder extends BaseFieldManager {

	protected $title  = 'Video Recorder';
	protected $key  = 'video-recorder';
	protected $group = 'ziggeo';
	protected $icon  = 'dashicons dashicons-video-alt2 ziggeo-ff-field';
	protected $index = 2;
	protected $tags = ['ziggeo', 'video', 'recorder'];

	public function __construct() {
		parent::__construct(
			$this->key,                //key
			$this->title,              //title
			$this->tags,               //tags
			'advanced'                 //position
		);
	}

	function getComponent() {
		return [
			'index'                    => $this->index,
			'element'                  => $this->key,
			'attributes'               => [
				'name'                     => $this->key,
				'class'                    => '',
				'type'                     => 'text'
			],
			'settings'                 => [
				'container_class'          => '',
				'label'                    => $this->title,

				'theme'                    => 'Modern',
				'themecolor'               => 'Blue',
				'width'                    => '100%',
				'height'                   => '',
				'popup'                    => 'no',
				'popup_width'              => '',
				'popup_height'             => '',
				'faceoutline'              => 'no',

				'recording_width'          => '',
				'recording_height'         => '',
				'recording_time_max'       => '',
				'recording_time_min'       => '',
				'recording_countdown'      => '3',
				'recording_amount'         => '',
				'effect_profiles'          => '',
				'video_profile'            => '',
				'meta_profile'             => '',
				'client_auth'              => '',
				'server_auth'              => '',
				'ff_custom_tags'           => '',

				'video_title'              => '',
				'video_description'        => '',
				'video_tags'               => '',
				'custom_data'              => '',

				'label_placement'          => '',
				'help_message'             => '',
				'admin_field_label'        => $this->title,
				'validation_rules'         => [
					'required' 	               => [
						'value'                    => false,
						'message'                  => __('This field is required', 'fluentformpro'),
					]
				],
				'conditional_logics'       => []
			],
			'editor_options'           => [
				'title'                    => $this->title,
				//'element'                => $this->key, //<<<<
				'icon_class'               => $this->icon,
				'template'                 => 'inputText'
			],
		];
	}

	// On submission - We do not really need this
	//public function onSubmit($formData, $formId, $config) {
	//
	//}

	//To change the value in the entries list - could be useful to 
	//public function formatEntryValue($value, $field, $formId) {
	//	return $value;
	//}

	//??
	//public function template($data) {}


	// FORM EDITOR
	////////////////

	//In what section should the field be shown (general||advanced||container)
	public function group() {
		return $this->group; //We try setting it to Ziggeo, however it will move it into the General (default) section
	}

	//What fields should be shown in the General section of our field settings
	public function getGeneralEditorElements() {
		return [
			'theme',
			'themecolor',
			'width',
			'height',
			'popup',
			'popup_width',
			'popup_height',
			'faceoutline',

			'label',
			'admin_field_label',
			'label_placement',
			'validation_rules'
		];
	}

	//Sets the options for the general field, for those fields we add manually (non system ones)
	public function generalEditorElement() {
		return [
			'theme'                    => [
				'template'  => 'select',
				'label'     => 'Select the player theme',
				'options'   => [
					[
						'label' => 'Modern',
						'value' => 'modern'
					],
					[
						'label' => 'Cube',
						'value' => 'cube'
					],
					[
						'label' => 'Space',
						'value' => 'space'
					],
					[
						'label' => 'Minimalist',
						'value' => 'minimalist'
					],
					[
						'label' => 'Elevate',
						'value' => 'elevate'
					],
					[
						'label' => 'Theatre',
						'value' => 'theatre'
					],
				]
			],
			'themecolor'               => [
				'template'  => 'select',
				'label'     => 'Video player theme color',
				'options'   => [
					[
						'label' => 'Blue',
						'value' => 'blue'
					],
					[
						'label' => 'Red',
						'value' => 'red'
					],
					[
						'label' => 'Green',
						'value' => 'green'
					]
				]
			],
			'width'                    => [
				'template'  => 'inputText',
				'label'     => 'The width of the player',
				'help_text' => 'Set the width in percentages (with % sign) or if added as integer value, then it will be seen as pixels (100% = 100 percent || 100 == 100 pixels)'
			],
			'height'                   => [
				'template'  => 'inputText',
				'label'     => 'The height of the player',
				'help_text' => 'Set the height of the player in pixels (only integer values)'
			],
			'popup'                    => [
				'template'  => 'radio',
				'label'     => 'Turn into popup?',
				'help_text' => 'Should the player be used as popup',
				'options'   => [
					[
						'label' => 'Yes',
						'value' => 'yes'
					],
					[
						'label' => 'No',
						'value' => 'no'
					]
				]
			],
			'popup_width'              => [
				'template'  => 'inputText',
				'label'     => 'The width of the popup holding the player',
				'help_text' => 'Set with a round integer representing the pixels'
			],
			'popup_height'             => [
				'template'  => 'inputText',
				'label'     => 'The height of the popup holding the player',
				'help_text' => 'Set with a round integer representing the pixels'
			],
			'faceoutline'              => [
				'template'  => 'radio',
				'label'     => 'Do you want to turn on faceoutline?',
				'help_text' => 'Faceoutline is shown above the video being recorder to help people position themselves on camera. This is however not part of the recorded video.',
				'options'   => [
					[
						'label' => 'Yes',
						'value' => 'yes'
					],
					[
						'label' => 'No',
						'value' => 'no'
					]
				]
			]
		];
	}

	//What fields should be shown in the Advanced section of our field settings
	public function getAdvancedEditorElements() {
		return [
			'help_message',
			'container_class',
			'class',
			'value',
			'conditional_logics',

			'recording_width',
			'recording_height',
			'recording_time_max',
			'recording_time_min',
			'recording_countdown',
			'recording_amount',
			'effect_profiles',
			'video_profile',
			'meta_profile',
			'client_auth',
			'server_auth',
			'ff_custom_tags',

			'video_title',
			'video_description',
			'video_tags' ,
			'custom_data'
		];
	}

	//Sets the options for the advanced fields
	public function advancedEditorElement() {
		return [
			'recording_width'         => [
				'template'  => 'inputText',
				'label'     => 'Recording Width',
				'help_text' => 'The width that you want to record at (default is 640 pixels). If set it has to be a whole number'
			],
			'recording_height'         => [
				'template'  => 'inputText',
				'label'     => 'Recording Height',
				'help_text' => 'The height that you want to record at (default is 480 pixels). If set it has to be a whole number'
			],
			'recording_time_max'       => [
				'template'  => 'inputText',
				'label'     => 'Maximum time for your recording',
				'help_text' => 'At this time recording stops automatically. Set it in seconds.'
			],
			'recording_time_min'       => [
				'template'  => 'inputText',
				'label'	    => 'Minimum time for your recording',
				'help_text' => 'It would not be possible to stop recording until this time runs out. Set it in seconds.'
			],
			'recording_countdown'      => [
				'template'  => 'inputText',
				'label'	    => 'Countdown time',
				'help_text' => 'This is the countdown time from clicking record to recording starting. Default is 3 seconds. Set it in seconds.'
			],
			'recording_amount'         => [
				'template'  => 'inputText',
				'label'	    => 'Number of recordings allowed',
				'help_text' => 'This is recording + re-recording(s) and by default you can make any number of re-recordings. Setting this to 1 would make it only allow a single recording without redo.'
			],
			'effect_profiles'          => [
				'template'  => 'inputText',
				'label'	    => 'Effect Profile Token',
				'help_text' => 'Add the key or token of your effect profile.'
			],
			'video_profile'            => [
				'template'  => 'inputText',
				'label'	    => 'Video Profile Token',
				'help_text' => 'Add the key or token of your video profile.'
			],
			'meta_profile'             => [
				'template'  => 'inputText',
				'label'	    => 'Meta Profile Token',
				'help_text' => 'Add the key or token of your meta profile.'
			],
			'client_auth'              => [
				'template'  => 'inputText',
				'label'	    => 'Client Auth Token'
			],
			'server_auth'              => [
				'template'  => 'inputText',
				'label'	    => 'Server Auth Token'
			],
			'ff_custom_tags'           => [
				'template'  => 'inputText',
				'label'	    => 'Custom Tags'
			],

			//Video data
			'video_title'              => [
				'template'  => 'inputText',
				'label'	    => 'Title of your video'
			],
			'video_description'        => [
				'template'  => 'inputText',
				'label'	    => 'Description of your video'
			],
			'video_tags'               => [
				'template'  => 'inputText',
				'label'	    => 'Tags to be added to video'
			],
			'custom_data'              => [
				'template'  => 'inputText',
				'label'	    => 'Custom Data to be added to video',
				'help_text' => 'This has to be data in proper JSON format, or it will be rejected.'
			]
		];
	}

 	public function searchBy() {
		return $this->tags;
	}




	//FRONTEND
	////////////

	// Render the element on form when it is shown on frontend (and in preview)
	public function render($data, $form) {

		$settings = $data['settings'];

		$elementName = $data['element'];
		$data = apply_filters('fluenform_rendering_field_data_' . $elementName, $data, $form);

		$data['attributes']['class'] = @trim('ff-el-form-control ff-el-color ' . $data['attributes']['class']);
		$data['attributes']['id'] = $this->makeElementId($data, $form);
		$data['attributes']['readonly'] = 'true';

		if ($tabIndex = \FluentForm\App\Helpers\Helper::getNextTabIndex()) {
			$data['attributes']['tabindex'] = $tabIndex;
		}

		$custom_tags = '';

		if(isset($settings['ff_custom_tags'])) {
			$custom_tags = $settings['ff_custom_tags'];
		}

		$field_id = $data['attributes']['id'];

		$element_markup = '<input type="hidden" id="' . $field_id . '" ' . $this->buildAttributes($data['attributes'], $form) . ' >';

		$element_markup .= '<ziggeorecorder ' .
			' data-id="' . $field_id . '"' .
			' data-is-ff="true"' . 
			' data-custom-tags="' . $custom_tags . '" ' .
			ziggeofluentforms_get_recorder_code($settings) .
			'></ziggeorecorder>';

		$html = $this->buildElementMarkup($element_markup, $data, $form);
		//$this->pushScripts($data, $form);
		echo apply_filters('fluenform_rendering_field_html_' . $elementName, $html, $data, $form);
	}

	//Adds the scripts that might need to be added to the frontend that might be connected to the form.
	/*private function pushScripts($data, $form) {
		add_action('wp_footer', function () use ($data, $form) {
			?>
			<script type="text/javascript">
				jQuery(document).ready(function ($) {
					//Do some action
					
				});
			</script>
			<?php
		}, 9999);
	}*/
}