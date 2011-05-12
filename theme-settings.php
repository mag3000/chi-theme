<?php
function uchicago_form_system_theme_settings_alter(&$form, &$form_state) {
  // Add a checkbox to toggle the breadcrumb trail.
  $form['toggle_simplehomepage'] = array(
    '#type' => 'checkbox', 
    '#title' => t('Simple homepage'), 
    '#default_value' => theme_get_setting('toggle_simplehomepage'), 
    '#description' => t('Check this box if you would like to have a simple homepage.'),
  );
  // Allow user to select color scheme
	$form['colorscheme'] = array(
		'#type' => 'select',
		'#title' => t('Select your preferred theme'),
		'#default_value' => theme_get_setting('colorscheme'),
		'#options' => array(
			'phoenix' => t('Phoenix'),
			'plumbtree' => t('Plumbtree'),
			'reflectionpool' => t('Reflection Pool'),
			'autumnleaves' => t('Autumn leaves')
		),
		'#description' => t('Your color scheme will be applied when you click Save.'),
	);
}
?>