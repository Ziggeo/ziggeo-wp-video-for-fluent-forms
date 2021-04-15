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
				'allowupload'              => 'yes',
				'allowrecord'              => 'yes',
				'allowscreen'              => 'no',
				'allowmultistreams'        => 'no',
				'multistreamdraggable'     => 'no',
				'addstreamminheight'       => 95,
				'addstreamminwidth'        => 120,
				'addstreampositionheight'  => 95,
				'addstreampositionwidth'   => 120,
				'addstreampositionx'       => 5,
				'addstreampositiony'       => 5,
				'addstreamproportional'    => 'yes',
				'flip-camera'              => 'yes',
				'flipscreen'               => 'yes',

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
				'transcript-language'      => 'en-US',
				'audio-test-mandatory'     => 'no',

				'video_title'              => '',
				'video_description'        => '',
				'video_tags'               => '',
				'custom_data'              => '',
				'ff_custom_tags'           => '',
				'ff_custom_data'           => '',

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
			'allowupload',
			'allowrecord',
			'allowscreen',
			'allowmultistreams',
			'multistreamdraggable',
			'addstreamminheight',
			'addstreamminwidth',
			'addstreampositionheight',
			'addstreampositionwidth',
			'addstreampositionx',
			'addstreampositiony',
			'addstreamproportional',
			'flip-camera',
			'flipscreen',

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
			],
			'allowupload'              => [
				'template'  => 'radio',
				'label'     => 'Do you want to enable upload option?',
				'help_text' => 'Uploading of video is great option if someone already has a perfect video ready on their device.',
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
			'allowrecord'              => [
				'template'  => 'radio',
				'label'     => 'Do you want to enable video recording?',
				'help_text' => 'In some cases you might prefer not to allow recording from camera to be done.',
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
			'allowscreen'              => [
				'template'  => 'radio',
				'label'     => 'Do you want to enable screen capture?',
				'help_text' => 'This option adds a button that helps capture the screen.',
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
			'allowmultistreams'        => [
				'template'  => 'radio',
				'label'     => 'Allow multi stream recording',
				'help_text' => 'This option allows you to capture both screen and camera together',
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
			'multistreamdraggable'     => [
				'template'  => 'radio',
				'label'     => 'Allow dragging second stream?',
				'help_text' => 'This option allows you make the additional streams draggable. Used only when allow multi stream option is enabled',
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
			'addstreampositionx'  => [
				'template'  => 'inputText',
				'label'     => 'The x axis position of the additional stream',
				'help_text' => 'Helps pre-set the position of the additional stream. Used only when allow multi stream option is enabled'
			],
			'addstreampositiony'  => [
				'template'  => 'inputText',
				'label'     => 'The y axis position of the additional stream',
				'help_text' => 'Helps pre-set the position of the additional stream. Used only when allow multi stream option is enabled'
			],
			'addstreampositionheight'  => [
				'template'  => 'inputText',
				'label'     => 'The height of the additional stream',
				'help_text' => 'Helps pre-set the height of the additional streams. Used only when allow multi stream option is enabled'
			],
			'addstreampositionwidth'  => [
				'template'  => 'inputText',
				'label'     => 'The width of the additional stream',
				'help_text' => 'Helps pre-set the width of the additional streams. Used only when allow multi stream option is enabled'
			],
			'addstreamminheight'       => [
				'template'  => 'inputText',
				'label'     => 'The minimal height of the additional stream',
				'help_text' => 'Helps pre-set the minimal height of the additional streams. Used only when allow multi stream option is enabled'
			],
			'addstreamminwidth'        => [
				'template'  => 'inputText',
				'label'     => 'The minimal width of the additional stream',
				'help_text' => 'Helps pre-set the minimal width of the additional streams. Used only when allow multi stream option is enabled'
			],
			'addstreamproportional'    => [
				'template'  => 'radio',
				'label'     => 'Keep additional streams proportional',
				'help_text' => 'Sometimes your width and heigh would distort the recording of smaller stream because of ratio available and you set. Using this option makes it ignore one of the pre-set options to make sure things look normal.',
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
			'flip-camera'              => [
				'template'  => 'radio',
				'label'     => 'Do you want to flip the camera?',
				'help_text' => 'When you flip the camera and raise left arm, it shows as left to viewer. Standard way of recording makes you seem to raise right hand instead.',
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
			'flipscreen'               => [
				'template'  => 'radio',
				'label'     => 'Do you want to flip the screen?',
				'help_text' => 'Flip camera and flip screen work together when capturing multiple streams.',
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
			'transcript-language',
			'audio-test-mandatory',

			'video_title',
			'video_description',
			'video_tags' ,
			'custom_data',
			'ff_custom_tags',
			'ff_custom_data'
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
			'transcript-language'      => [
				'template'  => 'inputText',
				'label'	    => 'Transcript Language',
				'help_text' => 'If you are using meta profiles to create text from spoken words use this to set what language you want the transcript to be in'
			],
			'audio-test-mandatory'      => [
				'template'  => 'radio',
				'label'	    => 'Make audio test mandatory?',
				'help_text' => 'Audio test is made before recording starts to make sure audio is available'
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
			],
			'ff_custom_tags'           => [
				'template'  => 'inputText',
				'label'	    => 'Custom Tags',
				'help_text' => 'Add tags based on the fields on your form. Use the HTML ID of the field. Separate multiple IDs with comma'
			],
			'ff_custom_data'           => [
				'template'  => 'inputText',
				'label'	    => 'Dynamic Custom Data',
				'help_text' => 'Add custom data based on the example in plugin\'s readme/info. It should be provided as "key": field_ID. Multiple fields are separated by comma'
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

		$custom_data = '';
		if(isset($settings['ff_custom_data'])) {
			$custom_data = $settings['ff_custom_data'];
		}

		$field_id = $data['attributes']['id'];

		$element_markup = '<input type="hidden" id="' . $field_id . '" ' . $this->buildAttributes($data['attributes'], $form) . ' >';

		$element_markup .= '<ziggeorecorder ' .
			' data-id="' . $field_id . '"' .
			' data-is-ff="true"' . 
			' data-custom-tags="' . $custom_tags . '" ' .
			' data-custom-data="' . $custom_data . '" ' .
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