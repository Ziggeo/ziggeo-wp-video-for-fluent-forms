This file contains the change log info for the `Ziggeo - Fluent Forms` Bridge plugin


=======

= 1.6 =
* Fixed: Added change to the form builder integration to support changes in the newer updates
* Improvement: Added support for lazyload feature of our WP Core plugin
* Improvement: Added support for the v2 version of the templates provided by core plugin

= 1.5 =
* Improvement: Added additional options for video recorder
* Improvement: Added additional options for video player
* Fixed: The parsing of templates did not work, with the new updates you can pull your templates properly to your form.

= 1.4.1 =
* Fixed: Theme color setting was not respected. With the fix, it is now working right.

= 1.4 =
* Improvement: Changed the API calls to use V2 flavor only.
* Improvement: Made Dashboard page creation for settings only work if the Ziggeo core plugin is installed with newer version supporting the call, helping avoid hidden error if it is not.
* Improvement: Added a check to make sure core plugin is available instead of the behavior so far where it would just silently stop loading the files.

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