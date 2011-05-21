/** beginning of file **/

jQuery(document).ready(function () {
	if (document.documentElement.clientWidth >= 600) {
		// Homepage features slideshow
		if (jQuery('div.view-homepage-features div.view-content').length) {
			jQuery('div.view-homepage-features div.view-content').cycle({speed:3500,timeout:10000,cleartypeNoBg:true});
		}
		// Slideshow for right column images on basic and news pages
		if (jQuery('div.slideshow').length) {
				// Force it to wait until all images are loaded before applying cycle, otherwise image height is messed up
				jQuery(window).load(function() {
					jQuery('.rightcolimage-outerwrapper').show(); // This is hidden so that all the images aren't visible before they all disappear
					jQuery('div.slideshow').cycle({fx:'scrollLeft',speed:300,timeout:0,next:'#slide-next',prev:'#slide-previous',cleartypeNoBg:true});
				});
		}
	}
	// The last menu item in the toolbar is the feedback link which goes to a Wufoo form. Open it a new window so users don't get confused:
  if (jQuery('#toolbar-menu').length) {
		jQuery("#toolbar-menu li.last a").click(function() { window.open(this.href); return false; });
	}
	// This is an ugly hack to remove the magnify glass above the right column image when it's only 198px wide (lots of old images are this width)
  if (jQuery('.field-name-field-rightimage.no-slideshow img').length) {	
		var imgWidth = jQuery('.field-name-field-rightimage.no-slideshow img').width();
		if (imgWidth <= '198') { jQuery('.magnify').remove(); };
	}
	if (document.documentElement.clientWidth < 600) {
		// Move the homefeature title further up the DOM to display correctly
		jQuery('.views-row-first .homefeature').prepend(jQuery('.views-row-first .homefeature .grid_5'));
		// for small screens, move the nav to the top of the DOM
		jQuery('#content').prepend(jQuery('#block-system-main-menu'));
		jQuery('#toggle-nav').click(function () {
			jQuery('#block-system-main-menu').slideToggle('slow');
		});
	}
});