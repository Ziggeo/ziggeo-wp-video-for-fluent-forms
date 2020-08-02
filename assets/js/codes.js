//
// INDEX
//********
// 1. Helper functions
//		* jQuery.ready()
//		* ziggeofluentformsIsOfForm()



/////////////////////////////////////////////////
// 1. HELPER FUNCTIONS                         //
/////////////////////////////////////////////////

jQuery( document ).ready(function() {

	//Check if the ziggeo_app was defined
	if(typeof ziggeo_app === 'undefined') {
		return false;
	}

	//Handling video recorders
	ziggeo_app.embed_events.on("verified", function (embedding_object) {
		//lets get the embedding element
		var embedding = embedding_object.activeElement();

		if(!ziggeofluentformsIsOfForm(embedding)) {
			//Not to be handled by us
			return false;
		}

		var element = document.getElementById( embedding.getAttribute('data-id').trim() );

		if(ZiggeoWP && ZiggeoWP.fluent_forms) {
			element.value = ZiggeoWP.fluent_forms.capture_format.replace('{token}', embedding_object.get("video"));
		}
		else {
			element.value = "[ziggeoplayer]" + embedding_object.get("video") + "[/ziggeoplayer]"
		}

		//Get tags
		var tags = embedding.getAttribute('data-custom-tags');

		if(tags) {
			var _tags = [];
			tags = tags.split(',');

			for(i = 0, c = tags.length; i < c; i++) {
				try {
					var value = document.getElementById(tags[i]).value;

					if(value.trim() !== '') {
						_tags.push(value);
					}
				}
				catch(err) {
					console.log(err);
				}
			}

			if(_tags.length > 0) {

				if(embedding_object.get('tags') !== '' && embedding_object.get('tags') !== null) {
					_tags.concat(embedding_object.get('tags'));
				}

				//Create tags for the video
				ZiggeoApi.Videos.update(embedding_object.get("video"), {
					tags: _tags
				});
			}
		}
	});

	//Handling video players
	ziggeo_app.embed_events.on("ended", function (embedding_object) {
		//lets get the embedding element
		var embedding = embedding_object.activeElement();

		if(embedding.nodeName === "ZIGGEORECORDER") {
			return false;
		}

		if(!ziggeofluentformsIsOfForm(embedding)) {
			//Not to be handled by us
			return false;
		}

		var element = document.getElementById( embedding.getAttribute('data-id').trim() );
		element.value = "Video was seen";
	});
});

// Just a simple function to check for signs of this embedding actually being part of Fluent Forms form
function ziggeofluentformsIsOfForm(embedding) {

	if(embedding.getAttribute("data-is-ff")) {
		return true;
	}

	return false;
}