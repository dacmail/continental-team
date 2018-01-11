<?php
/**
 * Plugin Name: Social Stream Post Type - Grid and Carousel for WordPress
 * Description: Social Stream Post Type - Grid and Carousel for WordPress.
 * Version: 1.0
 * Author: Hitesh Khunt
 * Author URI: http://www.saragna.com/Hitesh-Khunt
 * Plugin URI: http://plugin.saragna.com/blog
 * Text Domain: ssocial
 * License: GPLv2 or later
 * 
 */
$anisliderVersion = "1.0";
$currentFile = __FILE__;
$currentFolder = dirname($currentFile);
$animate_slider_table = 'wps_social_grid';
require_once $currentFolder . '/inc/comman_class.php';
require_once $currentFolder . '/inc/admin_class.php';
require_once $currentFolder . '/inc/slider-tinymce.php';
require_once $currentFolder . '/inc/all_function.php';
require_once $currentFolder . '/inc/social-grid-shortcode.php';
include_once ('framework/admin/generators/metabox-generator.php');
include_once ('framework/metaboxes/metabox-posts.php');
require_once $currentFolder . '/inc/featured-media.php';
if (!class_exists('ssocial_grid')) {
class ssocial_grid extends spost_class_grid {
	const doc_link = 'http://plugin.saragna.com/vc-addon';
	var $exclude_img = array();
	function __construct() {
		parent::__construct();
		add_action('admin_menu', array( $this, 'add_animate_setting_page'));
		add_action( 'admin_enqueue_scripts', array( $this, 'ssocial_add_metaboxes_script_admin' ));
		add_action('wp_dashboard_setup', array( $this, 'ssocial_other_premium_plugin'));
		add_shortcode('social_grid','ssocial_grid_shortcode');
		add_shortcode('social_layout','ssocial_layout_shortcode');
	}
	function ssocial_add_metaboxes_script_admin() {
		wp_enqueue_script('ssocial-attrchange', plugins_url( ltrim( '/framework/admin/assets/js/attrchange.js', '/' ), __FILE__ ), array('jquery'), '1', true);
		wp_enqueue_script('ssocial-options-dependency', plugins_url( ltrim( '/framework/admin/assets/js/options-dependency.js', '/' ), __FILE__ ), array('jquery'), '1', true);
		wp_enqueue_script('ssocial-backend-scripts', plugins_url( ltrim( '/framework/admin/assets/js/backend-scripts.js', '/' ), __FILE__ ), array('jquery'), '1', true);
		wp_enqueue_style('ssocial-options-style', plugins_url( ltrim( '/framework/admin/assets/stylesheet/css/theme-backend-styles.css', '/' ), __FILE__ ),array() , '1');
	}
	public function add_animate_setting_page() {
		add_menu_page( 'Social Grid', 'Social Grid', 'manage_options', 'ssocial-grid', array( $this, 'my_spost_grid_page'), self::animate_plugin_url( '../assets/image/icon.png' ), 82);
	}
	function ssocial_other_premium_plugin(){
		add_screen_option('layout_columns', array('max' => 3, 'default' => 2));
		add_meta_box('ssocial_layout_dashboard_widget', __('Saragna Premium Plugins', 'ssocial'), array($this,'ssocial_dashboard_widgets'), 'dashboard', 'normal', 'high');
	}
	
	function ssocial_dashboard_widgets() {
		ob_start();
		?>
		<div class="ssocial-dashboard-container">
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/visual-composer-social-streams-with-carousel/11471294?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/vc-social_logo.jpg" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/visual-composer-post-gridlist-layout-with-carousel/11030539?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/vc-post_logo.png" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/saragna-visual-composer-addons/14352106?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/vc-addons_logo.jpg" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/portfolio-and-gallery-grid-layout-with-carousel-for-wordpress/16704147?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/wp-portfolio_logo.jpg" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/visual-composer-addons-bundle/11943219?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/vc-bundle_logo.png" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/instagram-gallery-with-carousel-for-wordpress/12253042?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/wp-instagram.jpg" /></a></div>
			<div class="ssocial-dashboard-div"><a href="https://codecanyon.net/item/visual-composer-all-in-one-carousel/11330151?ref=saragna" target="_blank"><img src="http://plugin.saragna.com/plugin-icon/vc-carousel_logo.png" /></a></div>
			<a href="https://codecanyon.net/user/saragna/portfolio?ref=saragna" target="_blank" class="saragna_profile">Saragna Portfolio</a>
		</div>
		<?php
		$m = ob_get_clean();
		echo $m;
	}
	public function my_spost_grid_page(){
		global $wpdb,$anisliderVersion;
		include('admin/setting.php');
	}
}
$ssocial_grid = new ssocial_grid();
}
add_action('init', 'do_output_buffer');
if(!function_exists('do_output_buffer')){
	function do_output_buffer() {
		ob_start();
	}
}
