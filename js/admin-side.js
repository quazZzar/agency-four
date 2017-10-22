(function ($) {
	/* ///// Template Helper Function ///// */
	$.fn.hasAttr = function( attribute ) {
		var obj = this;

		if( obj.attr(attribute ) !== undefined ) {
			return true;
		} else {
			return false;
		}
	};
	var WPTheme = {
		init: function() {
			this.pageMetas();
		},
		pageMetas: function(){
			if($('#page_template').val() != 'page-media-page.php'){
				$('#cs-tab-section_1 .cs-element.cs-field-upload, #cs-tab-section_1 .cs-element.cs-field-color_picker').hide();
			} else {
				$('#cs-tab-section_1 .cs-element.cs-field-upload, #cs-tab-section_1 .cs-element.cs-field-color_picker').show();
			}

			$('#page_template').on('change', function(){
				if($(this).val() == 'page-media-page.php'){
					$('#cs-tab-section_1 .cs-element.cs-field-upload, #cs-tab-section_1 .cs-element.cs-field-color_picker ').show();
				} else {
					$('#cs-tab-section_1 .cs-element.cs-field-upload, #cs-tab-section_1 .cs-element.cs-field-color_picker ').hide();
				}
			});
			console.log('merge');
		},	
	}

	$( document ).ready( function () {
		WPTheme.init();
	});
}( jQuery ));