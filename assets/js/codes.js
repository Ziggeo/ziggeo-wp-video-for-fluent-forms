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