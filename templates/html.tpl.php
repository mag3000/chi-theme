<?php
// $Id: html.tpl.php,v 1.6 2010/11/24 03:30:59 webchick Exp $

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>  
	<!--
	/*
	* MyFonts webfont Build ID 828588, 2011-06-01T09:48:42-0400
	*
	* The fonts listed in this notice are subject to the End User License
	* Agreement(s) entered into by the website owner. All other parties are
	* explicitly restricted from using the Licensed webfonts(s).
	*
	* You may obtain a valid license at the URLs below.
	*
	* webfont: Proxima Nova Thin
	* URL: http://new.myfonts.com/fonts/marksimonson/proxima-nova/thin/
	* Foundry: Mark Simonson
	* Copyright: Copyright (c) Mark Simonson, 2005. All rights reserved.
	* License: http://www.myfonts.com/viewlicense?1056
	* Licensed pageviews: 10,000,000/month
	* CSS font-family: ProximaNovaT-Thin
	* CSS font-weight: normal
	*
	* webfont: Proxima Nova Light
	* URL: http://new.myfonts.com/fonts/marksimonson/proxima-nova/light/
	* Foundry: Mark Simonson
	* Copyright: Copyright (c) Mark Simonson, 2005. All rights reserved.
	* License: http://www.myfonts.com/viewlicense?1056
	* Licensed pageviews: 10,000,000/month
	* CSS font-family: ProximaNova-Light
	* CSS font-weight: normal
	*
	* webfont: Proxima Nova Regular
	* URL: http://new.myfonts.com/fonts/marksimonson/proxima-nova/regular/
	* Foundry: Mark Simonson
	* Copyright: Copyright (c) Mark Simonson, 2005. All rights reserved.
	* License: http://www.myfonts.com/viewlicense?1056
	* Licensed pageviews: 10,000,000/month
	* CSS font-family: ProximaNova-Regular
	* CSS font-weight: normal
	*
	* webfont: Proxima Nova Semibold
	* URL: http://new.myfonts.com/fonts/marksimonson/proxima-nova/semibold/
	* Foundry: Mark Simonson
	* Copyright: Copyright (c) Mark Simonson, 2005. All rights reserved.
	* License: http://www.myfonts.com/viewlicense?1056
	* Licensed pageviews: 10,000,000/month
	* CSS font-family: ProximaNova-Semibold
	* CSS font-weight: norma
	*
	* webfont: Proxima Nova Bold
	* URL: http://new.myfonts.com/fonts/marksimonson/proxima-nova/bold/
	* Foundry: Mark Simonson
	* Copyright: Copyright (c) Mark Simonson, 2005. All rights reserved.
	* License: http://www.myfonts.com/viewlicense?1056
	* Licensed pageviews: 10,000,000/month
	* CSS font-family: ProximaNova-Bold
	* CSS font-weight: normal
	*
	* (c) 2011 Bitstream Inc
	*/
	-->
	<link rel="stylesheet" href="https://identity.uchicago.edu/c/fonts/proximanova.css" />
  <!--[if lt IE 7]>
  <script type="text/javascript" src="<?php print base_path() . path_to_theme(); ?>/scripts/ie6.js"></script>
  <![endif]--> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print $scripts; ?>
</body>
</html>
