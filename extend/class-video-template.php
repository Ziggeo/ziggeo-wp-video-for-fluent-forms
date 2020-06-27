<?php

use FluentForm\App\Services\FormBuilder\BaseFieldManager;
use FluentForm\Framework\Helpers\ArrayHelper;

class Fluent_Forms_Ziggeo_Template extends BaseFieldManager {

	protected $title  = 'Ziggeo Templates';
	protected $key  = 'ziggeo-template';
	protected $group = 'ziggeo';
	protected $icon  = 'dashicons dashicons-editor-code ziggeo-ff-field';
	protected $index = 2;
	protected $tags = ['ziggeo', 'video', 'templates'];

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

				'template_name'				=> '',

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
			'template_name',

			'label',
			'admin_field_label',
			'label_placement',
			'validation_rules'
		];
	}

	//Sets the options for the general field, for those fields we add manually (non system ones)
	public function generalEditorElement() {

		$list = ziggeo_p_templates_index();
		$templates = array();
		if($list) {
			foreach($list as $template_id => $template_code)
			{
				if($template_id !== '') {
					$templates[] = [
						'label' => $template_id,
						'value' => $template_id
					];
				}
			}
		}

		if(count($templates) == 0) {
			$templates[] = [
				'label' => 'No Templates Found',
				'value' => ''
			];
		}

		return [
			'template_name' 		=> [
				'template'	=> 'select',
				'label'		=> 'Template Name',
				'options'	=> $templates,
				'help_text'	=> 'Pick the template to be used in this location.'
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
			'conditional_logics'
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

		$_tmp_field = ziggeo_p_content_parse_templates( '[ziggeo ' . ziggeo_p_template_params($settings['template_name']));

		$element_markup .= ziggeo_p_integrations_field_add_custom_tag($_tmp_field, 'data-id="' . $field_id . '"' . ' data-is-ff="true" ');

		$html = $this->buildElementMarkup($element_markup, $data, $form);
		echo apply_filters('fluenform_rendering_field_html_' . $elementName, $html, $data, $form);
	}

}