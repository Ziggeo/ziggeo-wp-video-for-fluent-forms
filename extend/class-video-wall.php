<?php

use FluentForm\App\Services\FormBuilder\BaseFieldManager;
use FluentForm\Framework\Helpers\ArrayHelper;

class Fluent_Forms_Video_Wall extends BaseFieldManager {

	protected $title  = 'Video Wall';
	protected $key  = 'video-wall';
	protected $group = 'ziggeo';
	protected $icon  = 'dashicons dashicons-playlist-video ziggeo-ff-field';
	protected $index = 2;
	protected $tags = ['ziggeo', 'video', 'videowall', 'playlist', 'wall'];

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

				'title'						=> '',
				'design'					=> 'default',
				'videowidth'				=> '',
				'videoheight'				=> '',
				'videos_per_page'			=> '',

				'autoplay'					=> 'no',
				'show'						=> 'yes',
				'no_videos'					=> 'showmessage',
				'message'					=> 'No videos found',
				'template_name'				=> '',
				'show_videos'				=> 'approved',
				'videos_to_show'			=> '',

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
				//'element'					=> $this->key, //<<<<
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
			'title',
			'design',
			'videowidth',
			'videoheight',
			'videos_per_page',

			'label',
			'admin_field_label',
			'label_placement',
			'validation_rules'
		];
	}

	//Sets the options for the general field, for those fields we add manually (non system ones)
	public function generalEditorElement() {
		return [
			'title' 				=> [
				'template'	=> 'inputText',
				'label'		=> 'Video Wall Title',
				'help_text'	=> 'Optional videowall title to be shown above all videos.'
			],
			'design' 				=> [
				'template'	=> 'select',
				'label'		=> 'Select the videowall design you want to be used',
				'options'	=> [
					[
						'label' => 'Default',
						'value' => 'default'
					],
					[
						'label' => 'Show Pages',
						'value' => 'show_pages'
					],
					[
						'label' => 'Slide Wall',
						'value' => 'slide_wall'
					],
					[
						'label' => 'Mosaic Grid',
						'value' => 'mosaic_grid'
					],
					[
						'label' => 'Chessboard Grid',
						'value' => 'chessboard_grid'
					]
				]
			],
			'videowidth' 			=> [
				'template'	=> 'inputText',
				'label'		=> 'Width of videos in the videowall'
			],
			'videoheight'			=> [
				'template'	=> 'inputText',
				'label'		=> 'Height of videos in the videowall'
			],
			'videos_per_page'		=> [
				'template'	=> 'inputText',
				'label'		=> 'Number of videos per page',
				'help_text'	=> 'Some designs are based on pages. This setting is automated per design, however offers you to force the numbers you wish.'
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

			'autoplay',
			'show',
			'no_videos',
			'message',
			'template_name',
			'show_videos',
			'videos_to_show'
		];
	}

	//Sets the options for the advanced fields
	public function advancedEditorElement() {
		return [
			'autoplay' 				=> [
				'template'	=> 'radio',
				'label'		=> 'Set the videowall to autoplay videos',
				'options'	=> [
					[
						'label' => 'Yes',
						'value' => 'yes'
					],
					[
						'label' => 'No',
						'value' => 'no'
					]
				],
				'help_text'	=> 'Because of ads all browser vendors include some logic into their browser releases that checks and will often block autoplay. We can not do anything about it however our system tries to detect some of the steps browser takes so your videos might start playing after your action, or they might play automatically however be muted until you unmute them.'
			],
			'show' 					=> [
				'template'	=> 'radio',
				'label'		=> 'Do you want to show videowall once page loads?',
				'options'	=> [
					[
						'label' => 'Yes',
						'value' => 'yes'
					],
					[
						'label' => 'No',
						'value' => 'no'
					],
				],
				'help_text'	=> 'If you set it to No then it will hide the videowall until you record a video on the page, after which it will show you the videowall. Yes shows it right away.'
			],
			'no_videos' 			=> [
				'template'	=> 'select',
				'label'		=> 'What happens if there are no videos to show?',
				'options'	=> [
					[
						'label' => 'ShowMessage',
						'value' => 'showmessage'
					],
					[
						'label' => 'ShowTemplate',
						'value' => 'showtemplate'
					],
					[
						'label' => 'HideWall',
						'value' => 'hidewall'
					]
				]
			],
			'message' 				=> [
				'template'	=> 'inputText',
				'label'		=> 'Message to show on no videos'
			],
			'template_name' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'Template to show when no video was found'
			],
			'show_videos' 			=> [
				'template'	=> 'select',
				'label'		=> 'Type of videos to show',
				'options'	=> [
					[
						'label' => 'All',
						'value' => 'all'
					],
					[
						'label' => 'Approved',
						'value' => 'approved'
					],
					[
						'label' => 'Rejected',
						'value' => 'rejected'
					],
					[
						'label' => 'Pending',
						'value' => 'pending'
					]
				],
				'help_text'	=> 'The type of videos to search for and show in your video wall.'
			],
			'videos_to_show' 		=> [
				'template'	=> 'inputText',
				'label'		=> 'The IDs to search the videos by',
				'help_text'	=> 'These are video tags. Leave empty to load all videos or use %CURRENT_ID% to load videos that are tagged with the page ID of the page with video wall.'
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

		$_tmp_field = ziggeofluentforms_get_videowall_code($settings);

		$element_markup .= ziggeo_p_integrations_field_add_custom_tag($_tmp_field, 'data-id="' . $field_id . '"' . ' data-is-ff="true" ');

		// Support for Lazyload
		echo ziggeofluentforms_lazyload_support();

		$html = $this->buildElementMarkup($element_markup, $data, $form);

		echo apply_filters('fluenform_rendering_field_html_' . $elementName, $html, $data, $form);
	}
}