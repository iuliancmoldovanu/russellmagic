$(function(){
			$('#gallery a').lightBox({ 
				imageLoading:			'widget/images/lightbox/lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
				imageBtnPrev:			'widget/images/lightbox/lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
				imageBtnNext:			'widget/images/lightbox/lightbox-btn-next.gif',			// (string) Path and the name of the next button image
				imageBtnClose:			'widget/images/lightbox/lightbox-btn-close.gif',		// (string) Path and the name of the close btn
				imageBlank:				'widget/images/lightbox/lightbox-blank.gif',			// (string) Path and the name of a blank image (one pixel)
				fixedNavigation:		false,		// (boolean) Boolean that informs if the navigation (next and prev button) will be fixed or not in the interface.
				containerResizeSpeed:	400,			 // Specify the resize duration of container image. These number are miliseconds. 400 is default.
				overlayBgColor: 		"#999999",		// (string) Background color to overlay; inform a hexadecimal value like: #RRGGBB. Where RR, GG, and BB are the hexadecimal values for the red, green, and blue values of the color.
				overlayOpacity:			.6,		// (integer) Opacity value to overlay; inform: 0.X. Where X are number from 0 to 9
				txtImage:				'Image',				//Default text of image
				txtOf:					'of'
			});
		});

