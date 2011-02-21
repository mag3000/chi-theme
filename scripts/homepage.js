/** beginning of file **/

jQuery(document).ready(function () {
  if (jQuery('div.view-homepage-gallery div.view-content').length) {
		jQuery('div.view-homepage-gallery div.view-content').cycle({speed:3500,timeout:5000});
	}
});

