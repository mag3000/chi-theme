/** beginning of file **/

jQuery(document).ready(function () {
	// Homepage features slideshow
  if (jQuery('div.view-homepage-features div.view-content').length) {
		jQuery('div.view-homepage-features div.view-content').cycle({speed:3500,timeout:10000,cleartypeNoBg:true});
	}
	// Slideshow for right column images on basic and news pages
  if (jQuery('div.slideshow').length) {
  	jQuery('div.slideshow').cycle({fx:'scrollLeft',speed:300,timeout:0,next:'#slide-next',prev:'#slide-previous',cleartypeNoBg:true});
	}
	// The last menu item in the toolbar is the feedback link which goes to a Wufoo form. Open it a new window so users don't get confused:
  if (jQuery('#toolbar-menu').length) {
		jQuery("#toolbar-menu li.last a").click(function() { window.open(this.href); return false; });
	}
});