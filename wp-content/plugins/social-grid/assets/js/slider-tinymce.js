/* Map tinymce scripts */
(function() {
	"use strict";
	tinymce.PluginManager.add( 'socialgridshortcodes', function( editor, url ) {
		editor.addButton( 'socialgridshortcodes', {
			type	: 'menubutton',
			text	: '',
			icon	: 'spost-grid',
			tooltip	: 'Social Grid and Carousel',
			onselect: function(e) {
			},
			menu: ssocial_grid_shortcodes
		});
	});
})();