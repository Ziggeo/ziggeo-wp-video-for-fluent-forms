// This file holds the codes that are used on backend (admin) side and help with Fluent Forms editor changes
//
// INDEX
//********
// 1. Helper functions
//		* jQuery.ready()
//		* ziggeofluentformsEditorSectionInit()
// 2. Editor functions
//		* ziggeofluentformsEditorSectionToggle()




/////////////////////////////////////////////////
// 1. HELPER FUNCTIONS                         //
/////////////////////////////////////////////////

	jQuery(document).ready( function() {
		//Detect if we are within the Ziggeo Video settings
		if(document.getElementsByClassName('wrap ff_form_wrap ff_screen_editor').length > 0) {
			setTimeout(function() {
				ziggeofluentformsEditorSectionInit();
			}, 8000);
		}
	});


	function ziggeofluentformsEditorSectionInit() {
		var fields = document.getElementsByClassName('ziggeo-ff-field');

		if(!fields) {
			return false;
		}

		//grab the reference to the sections wrapper
		var _wrapper = document.getElementsByClassName('sidebar_elements_wrapper')[0];

		if(typeof _wrapper === 'undefined') {
			// Support for newer versions
			_wrapper = document.getElementsByClassName('option-fields-section')[0].parentElement;
		}

		//Create our own section
		var _section = document.createElement('div');
		_section.className = 'option-fields-section';
		_section.setAttribute('ziggeo_field', true);
		_section.id = 'ziggeo-fluentforms-editor-section';

		//Let's show the title
		var _h5 = document.createElement('h5');
		_h5.className = 'option-fields-section--title';
		_h5.innerHTML = 'Ziggeo Fields';

		//We should now build the fields section
		var _section_content = document.createElement('div');
		_section_content.className = 'option-fields-section--content';
		_section_content.style.display = 'none';

		//We need to have a row for every 3 fields, while we can have many fields, we will allways have 1st row.
		var _row = document.createElement('div');
		_row.className = 'v-row mb15';
		_section_content.appendChild(_row);

		var _f_count = 1;

		for(i = fields.length-1; i > -1; i--, _f_count++) {
			if(_f_count % 4 === 0) {
				var _row = document.createElement('div');
				_row.className = 'v-row mb15';
				_section_content.appendChild(_row);
			}

			_row.appendChild(fields[i].parentElement.parentElement);
		}

		_section.appendChild(_h5);
		_section.appendChild(_section_content);
		_wrapper.appendChild(_section);

		//append events to all h5 elements
		var _all_sections = document.getElementsByClassName('option-fields-section');

		for(i = 0; i < _all_sections.length; i++) {
			_all_sections[i].addEventListener('click', ziggeofluentformsEditorSectionToggle);
		}
	}




/////////////////////////////////////////////////
// 2. EDITOR FUNCTIONS                         //
/////////////////////////////////////////////////

	//Handler for toggling the sections
	function ziggeofluentformsEditorSectionToggle(e) {

		var _section = e.currentTarget;

		if(_section.getAttribute('ziggeo_field')) {
			var _pre_h5 = document.getElementsByClassName('option-fields-section--title active')[0];
			if(_pre_h5) {
				_pre_h5.className = 'option-fields-section--title';
				_pre_h5.parentElement.className = 'option-fields-section';
				_pre_h5.nextElementSibling.style.display = 'none';
			}

			_section.className = 'option-fields-section option-fields-section_active';
			_section.children[0].className = 'option-fields-section--title active';
			_section.children[1].style.display = 'block';
		}
		else {
			_section = document.getElementById('ziggeo-fluentforms-editor-section');
			_section.className = 'option-fields-section';
			_section.children[0].className = 'option-fields-section--title';
			_section.children[1].style.display = 'none';
		}
	}