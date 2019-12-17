



// Exemple tiré d'internet.
// Si un changement dans le select est détecté, les fonctions sont apellées 
$("select.type").change(function(){
	selection =$(this).children("option:selected").val();
	showRightField(selection);
});


//  Show the right field when user is signing in:

const showSearchResults = (selection) => {
	
	$('#campSingInFields').css("display", "none");
	$('.animatorInscription').css("display", "block");
	$("body").css("height", "auto");

};


showRightField = (selection) => {

	if (selection == "animator")
	{
		$('#campSingInFields').css("display", "none");
		$('.animatorInscription').css("display", "block");
		$('body').css("height", "auto");
	}
	else {
		$('.animatorInscription').css("display", "none");
		$('#campSingInFields').css("display", "block");
		$('body').css("height", "100vh");
	}
};
