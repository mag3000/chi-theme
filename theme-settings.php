<?php
function uchicago_form_system_theme_settings_alter(&$form, &$form_state) {
  // Add a checkbox to toggle the breadcrumb trail.
  $form['toggle_simplehomepage'] = array(
    '#type' => 'checkbox', 
    '#title' => t('Simple homepage'), 
    '#default_value' => theme_get_setting('toggle_simplehomepage'), 
    '#description' => t('Check this box if you would like to have a simple homepage.'),
  );
}
?>