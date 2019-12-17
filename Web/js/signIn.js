



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

