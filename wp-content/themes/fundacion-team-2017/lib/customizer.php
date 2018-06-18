<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

  $wp_customize->add_section('ungrynerd_social', array(
    'title' => __('Enlaces sociales', 'ungrynerd')
  ));

  $wp_customize->add_setting('ungrynerd_social_facebook');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_facebook', array(
    'type' => 'text',
    'label' => __('Facebook URL', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_social_facebook'
  )));

  $wp_customize->add_setting('ungrynerd_social_twitter');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_twitter', array(
    'type' => 'text',
    'label' => __('Twitter URL', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_social_twitter'
  )));

  $wp_customize->add_setting('ungrynerd_social_youtube');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_youtube', array(
    'type' => 'text',
    'label' => __('Youtube URL', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_social_youtube'
  )));

  $wp_customize->add_setting('ungrynerd_social_instagram');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_social_instagram', array(
    'type' => 'text',
    'label' => __('Instagram URL', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_social_instagram'
  )));

  $wp_customize->add_setting('ungrynerd_legal');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_legal', array(
    'type' => 'text',
    'label' => __('Aviso legal', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_legal'
  )));

  $wp_customize->add_setting('ungrynerd_policy');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_policy', array(
    'type' => 'text',
    'label' => __('Politica de privacidad', 'ungrynerd'),
    'section' => 'ungrynerd_social',
    'settings' => 'ungrynerd_policy'
  )));

}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
