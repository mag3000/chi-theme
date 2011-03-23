/** beginning of file **/

jQuery(document).ready(function () {
  if (jQuery('div.view-homepage-features div.view-content').length) {
		jQuery('div.view-homepage-features div.view-content').cycle({speed:3500,timeout:10000});
	}
  if (jQuery('div.slideshow').length) {
  	jQuery('div.slideshow').cycle({fx:'scrollLeft',speed:300,timeout:0,next:'#slide-next',prev:'#slide-previous'});
	}	
});