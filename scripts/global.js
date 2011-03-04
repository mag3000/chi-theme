/** beginning of file **/

jQuery(document).ready(function () {
  if (jQuery('div.view-homepage-features div.view-content').length) {
		jQuery('div.view-homepage-features div.view-content').cycle({speed:3500,timeout:5000});
	}
  if (jQuery('div.slideshow').length) {
  	jQuery('div.slideshow div.field-items').cycle({fx:'scrollLeft',speed:300,timeout:0,next:'#slide-next',prev:'#slide-previous'});
	}	
});

// Load typekit
try{Typekit.load();}catch(e){}