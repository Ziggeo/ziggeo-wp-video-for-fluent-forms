=== Ziggeo Video for Fluent Forms ===
Contributors: oliverfriedmann, baned, carloscsz409, natashacalleia
Tags: ziggeo, video, video field, form builder, video form, Fluent Forms
Requires at least: 3.0.1
Tested up to: 5.4.2
Stable tag: 1.4
Requires PHP: 5.2.4
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin brings video player and recorder (including screen recording) to your Fluent Forms by utilizing the powerful and award winning Ziggeo for video.

Please note that you need to install and setup [Ziggeo plugin](https://wordpress.org/plugins/ziggeo/) first. This plugin is offered as an extension of the same.

== Who is this for? ==

Are you using Fluent Forms by WPManageNinja and want to add a touch of video to your forms?
Need something simple?
While a fan of simple you also want it to be powerful?
You know the benefits of the video in a form and want to get onto the bandwagon for the same?

If your answers are "true" or "yes" then you want this plugin! Utilize all of the power of Ziggeo and Fluent Forms in a way that is super simple and efficient.

= Benefits =

Playback and recording added to forms with no development required
Simple Drag-and-drop integration of Ziggeo to your Fluent Forms
It features various embedding types, Video Player, Camera Recorder, Screen Recorder, combo recorder, playlists and much more ;)
Native integration, clean imlpementation and great support

== Screenshots ==

1. Fluent Forms Editor > Fields list
2. Fluent Forms Editor with fields on form
3. Submitted entries (template was showing another recorder)

== Installation ==
 
1. Upload plugin zip file to your plugins directory. Usually that would be to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That is it or
1. Use the Plugins Add new section to find the plugin and install
 
== Frequently Asked Questions ==

= How does it work? =

This plugin will provide you with the Ziggeo Fields section in your form editor. Once you open it, it will reveal all of the different types of fields that we support.

By a simple drag and drop you can quickly add multimedia to your forms.

= Where does integration happen? =

Integration happens within your website. All the data you gather will still be available to you in same panels and integrations as before.

As always we will host multimedia that is captured within your Ziggeo account and link to the same will be used as a submitted value on your form.

= How to use Dynamic Custom Data =

Ziggeo internally supports the ability of adding custom data to your videos. This can be anything as long as it is provided as valid JSON field. Now with form builders you might want to add custom data based on the data in the fields as well. To do this, we bring you dynamic custom data field.

* Please note that this field should not be used in combination with the custom data. You should use either `Custom Data` or `Dynamic Custom Data`.

The way you would set it up is by using key:field_id. For example if you want your JSON to be formed as:

[javascript]
{
	"first_name": "Mike",
	"last_name": "Wazowski"
}
[/javascript]

and let's say that your first name has `<input id="ff_1_names_first_name_" ...>` and last name has `<input id="ff_1_names_last_name_" ...>`. It means that we need `ff_1_names_first_name_` and `ff_1_names_last_name_` to get those values. So our field can be set as:

`first_name:ff_1_names_first_name_,last_name:ff_1_names_last_name_`

As you save your recorder field it will remember this and try to find the values. If the fields with ID are not found, the value will be saved as "" (empty string)

= How can I get some support =

We provide active support to all that have any questions or need any assistance with our plugin or our service.
To submit your questions simply go to our [Help Center](https://support.ziggeo.com/hc/en-us). Alternatively just send us an email to [support@ziggeo.com](mailto:support@ziggeo.com).

= I have an idea or suggestion =

Please go to our [WordPress forum](https://support.ziggeo.com/hc/en-us/community/topics/200753347-WordPress-plugin) and add your suggestion within it. This allows everyone to see and vote on it and us to determine what should be next.

== Upgrade Notice ==

= 1.4 =
* Improvement: Changed the API calls to use V2 flavor only.
* Improvement: Made Dashboard page creation for settings only work if the Ziggeo core plugin is installed with newer version supporting the call, helping avoid hidden error if it is not.

== Changelog ==

= 1.3 =
* Fixed: The recorder would not properly fill out the form field with token, causing the form to not collect the token.
* Fixed: The recorder body would not be properly built making some of the options utilized even when they are turned off.

= 1.2 =
* Added dynamic custom data handling. Allows you to pick up other fields on the form as your custom data.
* Revised the verified event firing, so that it is possible for anyone to subscribe to the same and run their code which are specific to the verified event firing on Fluent Forms. This is possible through `ziggeofluentforms_verified` JavaScript hook.
* Admin scripts are now loaded only on admin.
* Added a fix where the Ziggeo Fields would be shown even when editing the field properties. Now they are no longer shown in such case and only shown when list of fields is shown.

= 1.1 =
* Added Custom tags handling. Comma separated strings accepted.

= 1.0 =
Initial commit
