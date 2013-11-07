$(document).ready( function() {
	// Responsive stuff for the homepage. If they have a large enough screen, give them the nice tagline image and the google map
	if($(window).width() >= 735) {
		
		// Clear the current header div
		$("div#tag").empty(); 
		
		// Create a new tagline image and give it a source and alt text
		var tag = $('<img id="tagImage">');	// Creates a new image
		tag.attr('src', 'assets/images/tag.gif');
		tag.attr('alt', 'HUNTER MEMORIAL GOLF COURSE / SATURDAY, OCTOBER 19th 2013. To raise awareness of mental illness and support the Evan Allen Landry Memorial Scholarship');
		tag.attr('title', 'HUNTER MEMORIAL GOLF COURSE / SATURDAY, OCTOBER 19th 2013. To raise awareness of mental illness and support the Evan Allen Landry Memorial Scholarship');
		tag.appendTo("div#tag");
		
		
	}
});