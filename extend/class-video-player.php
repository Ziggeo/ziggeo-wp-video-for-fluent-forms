<?php

use FluentForm\App\Services\FormBuilder\BaseFieldManager;
use FluentForm\Framework\Helpers\ArrayHelper;

class Fluent_Forms_Video_Player extends BaseFieldManager {

	protected $title  = 'Video Player';
	protected $key  = 'video-player';
	protected $group = 'ziggeo';
	protected $icon  = 'dashicons dashicons-controls-play ziggeo-ff-field';
	protected $index = 2;
	protected $tags = ['ziggeo', 'video', 'player'];

	public function __construct() {
		parent::__construct(
			$this->key,						//key
			$this->title,					//title
			$this->tags,					//tags
			'advanced'						//position
		);
	}

	function getComponent() {
		return [
			'index'						=> $this->index,
			'element'					=> $this->key,
			'attributes'				=> [
				'name'						=> $this->key,
				'class'						=> '',
				'type'						=> 'text'
			],
			'settings'					=> [
				'container_class'			=> '',
				'label'						=> $this->title,

				'video_token'				=> '',
				'theme'						=> 'Modern',
				'themecolor'				=> 'Blue',
				'width'						=> '100%',
				'height'					=> '',
				'popup'						=> 'no',
				'popup_width'				=> '',
				'popup_height'				=> '',

				'effect_profiles'			=> '',
				'video_profile'				=> '',
				'client_auth'				=> '',
				'server_auth'				=> '',

				'label_placement'			=> '',
				'help_message'				=> '',
				'admin_field_label'			=> $this->title,
				'validation_rules'			=> [
					'required' 					=> [
						'value'						=> false,
						'message'					=> __('This field is required', 'fluentformpro'),
					]
				],
				'conditional_logics'		=> []
			],
			'editor_options'			=> [
				'title'						=> $this->title,
				'element'					=> $this->key, //<<<<
				'icon_class'				=> $this->icon,
				'template'					=> 'inputText'
			],
		];
	}

	// FORM EDITOR
	////////////////

	//In what section should the field be shown (general||advanced||container)
	public function group() {
		return $this->group; //We try setting it to Ziggeo, however it will move it into the General (default) section
	}

	//What fields should be shown in the General section of our field settings
	public function getGeneralEditorElements() {
		return [
			'video_token',
			'theme',
			'themecolor',
			'width',
			'height',
			'popup',
			'popup_width',
			'popup_height',

			'label',
			'admin_field_label',
			'label_placement',
			'validation_rules'
		];
	}

	//Sets the options for the general field, for those fields we add manually (non system ones)
	public function generalEditorElement() {
		return [
			'video_token' 			=> [
				'template'	=> 'inputText',
				'label'		=> 'Video Token',
				'help_text'	=> 'Add the video token representing video that you want to be shown/played in your form.'
			],
			'theme' 				=> [
				'template'	=> 'select',
				'label'		=> 'Select the player theme',
				'options'	=> [
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
			'themecolor' 			=> [
				'template'	=> 'select',
				'label'		=> 'Video player theme color',
				'options'	=> [
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
			'width'					=> [
				'template'	=> 'inputText',
				'label'		=> 'The width of the player',
				'help_text'	=> 'Set the width in percentages (with % sign) or if added as integer value, then it will be seen as pixels (100% = 100 percent || 100 == 100 pixels)'
			],
			'height'				=> [
				'template'	=> 'inputText',
				'label'		=> 'The height of the player',
				'help_text'	=> 'Set the height of the player in pixels (only integer values)'
			],
			'popup'					=> [
				'template'	=> 'radio',
				'label'		=> 'Turn into popup?',
				'help_text'	=> 'Should the player be used as popup',
				'options'	=> [
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
			'popup_width'			=> [
				'template'	=> 'inputText',
				'label'		=> 'The width of the popup holding the player',
				'help_text'	=> 'Set with a round integer representing the pixels'
			],
			'popup_height'			=> [
				'template'	=> 'inputText',
				'label'		=> 'The height of the popup holding the player',
				'help_text'	=> 'Set with a round integer representing the pixels'
			],
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

			'effect_profiles',
			'video_profile',
			'client_auth',
			'server_auth'
		];
	}

	//Sets the options for the advanced fields
	public function advancedEditorElement() {
		return [
			'effect_profiles' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'Effect Profile Token',
				'help_text'	=> 'Add the key or token of your effect profile.'
			],
			'video_profile' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'Video Profile Token',
				'help_text'	=> 'Add the key or token of your video profile.'
			],
			'client_auth' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'Client Auth Token'
			],
			'server_auth' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'Server Auth Token'
			],
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

		$field_id = $data['attributes']['id'];

		$element_markup = '<input type="hidden" id="' . $field_id . '" ' . $this->buildAttributes($data['attributes'], $form) . ' >';

		$element_markup .= '<ziggeoplayer ' . ziggeofluentforms_get_player_code($settings) . ' ' . 'data-id="' . $field_id . '"' . ' data-is-ff="true"' . '></ziggeoplayer>';

		$html = $this->buildElementMarkup($element_markup, $data, $form);

		echo apply_filters('fluenform_rendering_field_html_' . $elementName, $html, $data, $form);
	}

}

?>