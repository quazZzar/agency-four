(function ($) {
	'use strict';
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
			this.subscription();
			this.menus();
		},
		menus: function(){
			$('.menu-trigger').on('click', function(){
				$('#menu').toggleClass('visible');
			});
		},
		subscription: function(){
			$('#saveForm').on('click', function(){
				var the_name = $(document).find('#subs_name').val();
				var the_email = $(document).find('#subs_email').val();

				$.ajax({
					url: ajax_object.ajax_url,
					type: 'POST',
					data: {
						action: 'subscribe_email',
						email: the_email,
						name: the_name
					},
					success : function( result ){
						var result = JSON.parse(result);
						$(document).find('#saveForm').val(result.info);
						$(document).find('#subs_name').val('');
						$(document).find('#subs_email').val('');
					},
					error: function(xhr, status, error){
						console.log(xhr, status, error);
					}
				});
			});
			$('#submbtn').on('click', function(e){
				e.preventDefault();
				var the_email = $(document).find('#page-subscription-email').val();

				$.ajax({
					url: ajax_object.ajax_url,
					type: 'POST',
					data: {
						action: 'subscribe_email',
						email: the_email
					},
					success : function( result ){
						var result = JSON.parse(result);
						$(document).find('#page-subscription-email').val(result.info);
					},
					error: function(xhr, status, error){
						console.log(xhr, status, error);
					}
				});
			});
		}
}
	$( document ).ready( function () {
		WPTheme.init();
	});
}( jQuery ));