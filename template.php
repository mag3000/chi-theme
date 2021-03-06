<?php

/**
 * Add body classes if certain regions have content.
 */
function uchicago_preprocess_html(&$variables) {
  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  // Add the selected theme stylesheets
	$colorscheme =  theme_get_setting('colorscheme');
  drupal_add_css(path_to_theme() . '/css/colors/' . $colorscheme. '.css', array('group' => CSS_THEME, 'every_page' => TRUE));
  drupal_add_css(path_to_theme() . '/css/colors/' . $colorscheme. '_ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/small.css', array('group' => CSS_THEME, 'every_page' => TRUE));
  drupal_add_css((variable_get('file_public_path', conf_path() . '/files') . '/template/background.css'), array('group' => CSS_THEME, 'every_page' => TRUE));
}

/**
 * Override or insert variables into the page template.
 */
function uchicago_process_page(&$variables) {
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
  // Change the title of the contact form
  if (module_exists('contact')) {
	  if ( arg(0) == 'contact' ) { $variables['title'] = t('Contact Us'); }
	}
	// If you're on the events page, set fullwidth to true
	$curr_uri = check_plain(request_uri());
  if (($curr_uri == '/events') || ($curr_uri == '/events/')) { $variables['fullwidth'] = TRUE; } else { $variables['fullwidth'] = FALSE; }
  // Get the https version of the login page
  global $base_url;
  $variables['secure_login'] = str_replace("http:", "https:", $base_url) . "/user";
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function uchicago_preprocess_maintenance_page(&$variables) {
  if (!$variables['db_is_active']) {
    unset($variables['site_name']);
  }
  drupal_add_css(drupal_get_path('theme', 'uchicago') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the node template.
 */
function uchicago_preprocess_node(&$variables) {
	$formatted_date = format_date($variables['created'], 'custom', 'M j, Y');
  $variables['submitted'] = t('Published on !datetime', array('!username' => $variables['name'], '!datetime' => $formatted_date));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function uchicago_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function uchicago_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function uchicago_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}