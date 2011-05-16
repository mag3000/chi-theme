<?php

/**
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system folder.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see uchicago_process_page()
 */
?>
<?php $toggle_simplehomepage = theme_get_setting('toggle_simplehomepage'); ?>
<div id="page-wrapper"><div id="page">

  <div id="header"><div class="clearfix container_12">

    <?php if ($site_name): ?>
      <div id="name-and-slogan">
        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="grid_8" id="dept-title"><?php print $site_name; ?></a>
                <a href="http://www.uchicago.edu/" title="University of Chicago Home" id="wordmark" class="grid_4">The University of Chicago</a>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
          <div id="site-name">
                <h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="grid_8" id="dept-title"><?php print $site_name; ?></a></h1>
                <a href="http://www.uchicago.edu/" title="University of Chicago Home" id="wordmark" class="grid_4">The University of Chicago</a>
          </div>
          <?php endif; ?>
        <?php endif; ?>
      </div> <!-- /#name -->
    <?php endif; ?>

  </div></div> <!-- /#header -->

	<div id="main-wrapper" class="clearfix">
		<div id="main" class="clearfix container_12">

			<?php if ($messages): ?>
				<div id="messages">
						<?php print $messages; ?>
				</div> <!-- /#messages -->
			<?php endif; ?>

			<div id="content" class="column grid_9 push_3 <?php if ($toggle_simplehomepage) { print 'notfancy'; } ?>">
				<a id="main-content"></a>
				<?php if (!$toggle_simplehomepage): ?>
					<?php if ($page['home_features']): ?>
						<div id="mainfeature" class="clearfix">    
								<?php print render($page['home_features']); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if (!empty($node) || !$is_front): ?>
					<?php print render($title_prefix); ?>
						<?php if ($title): ?>
							<h1 class="title" id="page-title">
								<?php print $title; ?>
							</h1>
						<?php endif; ?>
					<?php print render($title_suffix); ?>
				<?php endif; ?>
				<?php if ($tabs): ?>
					<div class="tabs">
						<?php print render($tabs); ?>
					</div>
				<?php endif; ?>
				<div id="bottomrow" class="clearfix">
					<div class="<?php if (!(!empty($node) && $node->type == 'multi_column_basic_page')) { print 'grid_6 alpha'; } ?>">
					
						<?php if ($page['highlighted'] || $page['home_center'] || $page['help'] || $action_links): ?>
								<?php if ($page['highlighted']): ?>
									<?php print render($page['highlighted']); ?>
								<?php endif; ?>
								<?php if (!$toggle_simplehomepage): ?>
									<?php if ($page['home_center']): ?>
											<?php print render($page['home_center']); ?>
									<?php endif; ?>
								<?php endif; ?>
								<?php print render($page['help']); ?>
								<?php if ($action_links): ?>
									<ul class="action-links">
										<?php print render($action_links); ?>
									</ul>
								<?php endif; ?>
						<?php endif; ?>
					
						<?php if(!$is_front || $toggle_simplehomepage): ?>
							<?php //if (!empty($node)): ?>
									<?php print render($page['content']); ?>
									<?php print $feed_icons; ?>
							<?php //endif; ?>
						<?php endif; ?>
						
					</div>

					<?php if (!(!empty($node) && $node->type == 'multi_column_basic_page')): ?>
						<div id="sidebar-second" class="column sidebar grid_3 omega">
							<?php print render($page['sidebar_second']); ?>
						</div> <!-- /#sidebar-second -->
					<?php endif; ?>
					
				</div> <!-- bottomrow -->
			</div> <!-- /#content -->
			
			<div id="sidebar-first" class="column sidebar grid_3 pull_9"> 
				<?php if($page['sidebar_first']): ?>
					<?php print render($page['sidebar_first']); ?>
				<?php endif; ?>
			</div> <!-- /#sidebar-first -->
	
  	</div> <!-- /#main -->
	</div> <!-- /#main-wrapper -->
<div id="clearfoot">&nbsp;</div>
</div></div> <!-- /#page, /#page-wrapper -->

<div id="footer-wrapper"><div class="container_12">
	<div id="footer" class="clearfix">
		<div class="grid_3">
			<p><a href="/user/" id="loginlink">&copy;</a> 2011 <a href="http://www.uchicago.edu/">The University of Chicago</a><br /><a href="/"><?php print $site_name; ?></a></p>
			<div class="social clearfix">
				<?php print render($page['footer_column1']); ?>
			</div>
		</div>
		<div class="grid_3">	
			<?php print render($page['footer_column2']); ?>
		</div>
		<div class="grid_3">
			<?php print render($page['footer_column3']); ?>
		</div>
		<div class="grid_3">
			<?php print render($page['footer_column4']); ?>
		</div>
	</div> <!-- /#footer -->
</div></div> <!-- /#footer-wrapper -->