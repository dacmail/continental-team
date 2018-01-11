function ssocial_add_animation($this, animation) {
	$this.removeClass('social_animated '+animation).addClass('social_animated '+animation).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (e) {
		$this.css({
			'-webkit-animation':'none',
	   '-webkit-animation-name':'none',
			   'animation-name':'none',
					'animation':'none'
		});
		$this.removeClass('social_animated '+animation).removeAttr('svc-animation');
	});
}
function ssocial_imag_animation(){
	jQuery('[svc-animation]').each(function () {
		var animation_style = jQuery(this).attr('svc-animation');
		ssocial_add_animation(jQuery(this), animation_style);
	});
}

function ssocial_magnific_popup_with_content(){
	jQuery('.ajax-insta-popup-link').magnificPopup({
	  type: 'ajax',
	  closeBtnInside:false,
	  closeOnBgClick: false,
	  mainClass: 'ssocial-popup-close',
	  gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1]
	  },
	  image: {
		tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		titleSrc: function(item) {
		  return '';
		}
	  },
	  callbacks: {
		  ajaxContentAdded: function(){
			  jQuery('.you-desc-hide-show').on('click',function(){
				  if(jQuery(this).hasClass('you-desc-show')){
					jQuery('.you-panel-details').addClass('you-desc-panel-height');
					jQuery(this).removeClass('you-desc-show'); 
					jQuery(this).text(jQuery(this).attr('show-more'));
				  }else{
					if(jQuery(this).hasClass('vimeo-show-more')){
						jQuery(this).remove();
					}
					jQuery('.you-panel-details').removeClass('you-desc-panel-height');
					jQuery(this).addClass('you-desc-show');
					jQuery(this).text(jQuery(this).attr('show-less'));
				  }
			  });
		  }
	  }
	});
	jQuery('a.ajax-insta-popup-image').magnificPopup({
	  type: 'image',
	  mainClass: 'ssocial-popup-close',
	  closeBtnInside:false
	});
}
function ssocial_magnific_popup(){
	jQuery('.ajax-insta-popup-link-special-video').magnificPopup({
	  type: 'ajax',
	  closeBtnInside:false,
	  mainClass: 'ssocial-popup-close',
	  gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1]
	  },
	  image: {
		tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		titleSrc: function(item) {
		  return '';
		}
	  }
	});
	jQuery('.ssocial-posts-wrap').magnificPopup({
	  delegate: 'a.ajax-insta-popup-image',
	  tLoading: 'Loading image #%curr%...',
	  mainClass: 'ssocial-popup-close',
	  gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return '';
			}
		},
	  type: 'image',
	  closeBtnInside:false
	});
	jQuery('.ajax-insta-popup-video').magnificPopup({
		disableOn: 0,
		type: 'iframe',
		mainClass: 'ssocial-popup-close',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		closeBtnInside:false,
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
	});
}