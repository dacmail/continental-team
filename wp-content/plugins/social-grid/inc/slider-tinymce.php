<?php
/*	 TinyMCE Shortcode Custom Button Settings
 *   Author: Saragna
 *   Profile: http://codecanyon.net/user/saragna?ref=saragna
 */
/**
 * tinymce external plugin js file
 */
function ssocial_grid_add_tinymce_plugin($plugin_array) {
	$plugin_array['socialgridshortcodes'] = plugins_url( ltrim( '../assets/js/slider-tinymce.js', '/' ), __FILE__ );
	return $plugin_array;
}
/**
 * tinymce add buttons
 */
function ssocial_grid_add_tinymce_button($buttons) {
	array_push($buttons, 'socialgridshortcodes');
	return $buttons;
}
/**
 * Adding tinymce
 */
function ssocial_grid_add_tinymce() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
		return;
		
	add_filter('mce_external_plugins', 'ssocial_grid_add_tinymce_plugin');
	add_filter('mce_buttons', 'ssocial_grid_add_tinymce_button');
}
add_action('admin_head', 'ssocial_grid_add_tinymce');
function ssocial_grid_print_shortcodes_in_js() {	
	global $wpdb,$animate_slider_table;
	$shortcodes = $wpdb->get_results("select * from ".$wpdb->prefix.$animate_slider_table);
	?>
	<style type="text/css">.mce-i-spost-grid { background:url(<?php echo plugins_url( ltrim( '../assets/image/icon.png', '/' ), __FILE__ );?>) no-repeat !important; }</style>
	<script type="text/javascript">
		var ssocial_grid_shortcodes = [];
		<?php if($shortcodes) {
			$shortcode_count = 0;
			foreach($shortcodes as $shortcode) { ?>
				ssocial_grid_shortcodes[<?php echo $shortcode_count; ?>] = {
					'text'		: '<?php echo ($shortcode_count+1).': '.$shortcode->slider_title; ?>',
					'onclick'	: function() {
						tinymce.execCommand('mceInsertContent', false, '[social_grid id="<?php echo $shortcode->id; ?>"]');
					}
				}
		<?php $shortcode_count++;
			}
		}?>
	</script>
	<?php
}
add_action('admin_head', 'ssocial_grid_print_shortcodes_in_js');

function vc_ssocial_layout_init(){
	global $wpdb,$animate_slider_table;
	$team_array = array();
	$shortcodes = $wpdb->get_results("select * from ".$wpdb->prefix.$animate_slider_table);
	$team_array['Select Grid'] = '0';
	foreach($shortcodes as $shortcode) {
		$team_array[$shortcode->slider_title] = $shortcode->id;
	}
	if (defined('WPB_VC_VERSION')){
		if(function_exists('vc_map')){
			vc_map( array(
				"name" => __('Social Grid and Carousel','js_composer'),		
				"base" => 'social_grid',		
				"icon" => 'svc_social_logo',		
				//"category" => __('Meet The Team','js_composer'),
				'description' => __( 'Set your Social Grid and Carousel.','js_composer' ),
				"params" => array(
					array(
						"type" => "dropdown",
						"heading" => __("Shortcode" , 'js_composer' ),
						"param_name" => "id",
						"value" =>$team_array,
						"holder" => 'div',
						"description" => __("Choose Social Grid and Carousel.", 'js_composer' ),
					)
				),
				));
		}
	}
}
add_action('admin_init','vc_ssocial_layout_init');