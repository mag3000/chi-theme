/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 WARNING: clear browser's cache after you modify this file.
 If you don't do this, you may notice that browser is ignoring all your changes.
 */
CKEDITOR.editorConfig = function(config) {
    config.indentClasses = [ 'rteindent1', 'rteindent2', 'rteindent3', 'rteindent4' ];

    // [ Left, Center, Right, Justified ]
    config.justifyClasses = [ 'rteleft', 'rtecenter', 'rteright', 'rtejustify' ];

    // The minimum editor width, in pixels, when resizing it with the resize handle.
    config.resize_minWidth = 450;

    // Protect PHP code tags (<?...?>) so CKEditor will not break them when
    // switching from Source to WYSIWYG.
    // Uncommenting this line doesn't mean the user will not be able to type PHP
    // code in the source. This kind of prevention must be done in the server
    // side
    // (as does Drupal), so just leave this line as is.
    config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP Code
    config.extraPlugins = '';
    if (Drupal.ckeditorCompareVersion('3.1')) {
        config.extraPlugins += (config.extraPlugins ? ',drupalbreaks' : 'drupalbreaks' );
    }

    /*
   * Append here extra CSS rules that should be applied into the editing area.
   * Example: 
   * config.extraCss = 'body {color:#FF0000;}';
   */
    config.extraCss = '';
    /**
   * Sample extraCss code for the "marinelli" theme.
   */
    if (Drupal.settings.ckeditor.theme == "marinelli") {
        config.extraCss += "body{background:#FFF;text-align:left;font-size:0.8em;}";
        config.extraCss += "#primary ol, #primary ul{margin:10px 0 10px 25px;}";
    }
    if (Drupal.settings.ckeditor.theme == "newsflash") {
        config.extraCss = "body{min-width:400px}";
    }

    /**
   * CKEditor's editing area body ID & class.
   * See http://drupal.ckeditor.com/tricks
   * This setting can be used if CKEditor does not work well with your theme by default.
   */
    config.bodyClass = '';
    config.bodyId = '';
    /**
   * Sample bodyClass and BodyId for the "marinelli" theme.
   */
    if (Drupal.settings.ckeditor.theme == "marinelli") {
        config.bodyClass = 'singlepage';
        config.bodyId = 'primary';
    }

    if (Drupal.ckeditorCompareVersion('3.1')) {
        CKEDITOR.plugins.addExternal('drupalbreaks', Drupal.settings.ckeditor.module_path + '/plugins/drupalbreaks/');
    }

    if (Drupal.settings.ckeditor_swf) {
        config.extraPlugins += (config.extraPlugins) ? ',swf' : 'swf';
        CKEDITOR.plugins.addExternal('swf', Drupal.settings.ckeditor_swf.module_path + '/plugins/swf/');
    }
    if (Drupal.settings.ckeditor_link) {
        config.extraPlugins += (config.extraPlugins) ? ',drupal_path' : 'drupal_path';
        CKEDITOR.plugins.addExternal('drupal_path', Drupal.settings.ckeditor_link.module_path + '/plugins/link/');
    }

	// 'MediaEmbed' plugin. To enable it, uncomment lines below and add 'MediaEmbed' button to selected toolbars.
	config.extraPlugins += (config.extraPlugins ? ',mediaembed' : 'mediaembed' );
	CKEDITOR.plugins.addExternal('mediaembed', Drupal.settings.ckeditor.module_path + '/plugins/mediaembed/');

	// 'IMCE' plugin. If IMCE module is enabled, you may uncomment lines below and add an 'IMCE' button to selected toolbar. 
	config.extraPlugins += (config.extraPlugins ? ',imce' : 'imce' );
	CKEDITOR.plugins.addExternal('imce', Drupal.settings.ckeditor.module_path + '/plugins/imce/');
	
  config.filebrowserWindowWidth = 850;
  
  config.extraPlugins += (config.extraPlugins ? ',video_filter' : 'video_filter' );
  CKEDITOR.plugins.addExternal('video_filter', Drupal.settings.basePath + Drupal.settings.video_filter.modulepath + '/editors/ckeditor/');	
  
  config.resize_enabled = false;
  
  config.width = 600;

};

      // Set defaults for tables
      CKEDITOR.on( 'dialogDefinition', function( ev )
      {
         // Take the dialog name and its definition from the event
         // data.
         var dialogName = ev.data.name;
         var dialogDefinition = ev.data.definition;

         // Check if the definition is from the dialog we're
         // interested on (the "Table" dialog).
         if ( dialogName == 'table' )
         {
             // Get a reference to the "Table Info" tab.
             var infoTab = dialogDefinition.getContents( 'info' );
             txtWidth = infoTab.get( 'txtWidth' );
             txtWidth['default'] = 80;
             cmbWidthType = infoTab.get( 'cmbWidthType' );
             cmbWidthType['default'] = 'percents';
             txtCellPad = infoTab.get( 'txtCellPad' );
             txtCellPad['default'] = 4;
         }
       });