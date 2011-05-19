/** beginning of file **/

jQuery(document).ready(function () {
	if (document.documentElement.clientWidth >= 600) {
		// Homepage features slideshow
		if (jQuery('div.view-homepage-features div.view-content').length) {
			jQuery('div.view-homepage-features div.view-content').cycle({speed:3500,timeout:10000,cleartypeNoBg:true});
		}
		// Slideshow for right column images on basic and news pages
		if (jQuery('div.slideshow').length) {
			jQuery('div.slideshow').cycle({fx:'scrollLeft',speed:300,timeout:0,next:'#slide-next',prev:'#slide-previous',cleartypeNoBg:true});
		}
	}
	// The last menu item in the toolbar is the feedback link which goes to a Wufoo form. Open it a new window so users don't get confused:
  if (jQuery('#toolbar-menu').length) {
		jQuery("#toolbar-menu li.last a").click(function() { window.open(this.href); return false; });
	}
	// This is an ugly hack to get the magnify glass to float above the right column image when it's only 198px wide (lots of old images are this width)
  if (jQuery('.field-name-field-rightimage img').length) {	
		var imgWidth = jQuery('.field-name-field-rightimage img').width();
		if (imgWidth < '218') { jQuery('.magnify').addClass('skinny'); };
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