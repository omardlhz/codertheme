/*
Live Preview of Customizer API for Coder Theme
Created by Omar De La Hoz (omar.dlhz@hotmail.com) on 07/06/16
Available on Github (https://github.com/omardlhz/codertheme/)
*/


(function($){
	wp.customize("header_title", function(value) {
		value.bind(function(newval) {
			$("#header_title").text(newval);
		} );
	});
})(jQuery);

(function($){
	wp.customize("header_caption", function(value) {
		value.bind(function(newval) {
			$("#header_caption").text(newval);
		} );
	});
})(jQuery);

(function($){
	wp.customize("profile_image", function(value) {
		value.bind(function(newval) {
			$("#profile_image").attr('src', newval);
		} );
	});
})(jQuery);

(function($){
	wp.customize("cover_image", function(value) {
		value.bind(function(newval) {
			$("#cover_image").css('backgroundImage', 'url(' + newval + ')');
		} );
	});
})(jQuery);

