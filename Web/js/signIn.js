







//  Show the right field when user is signing in:

showRightField = () => {
	if ( $('#animInscType').is(':checked'))
	{
		$('#campSingInFields').css("display", "none");
		$('#animatorsSingInFields').css("display", "block");
	}
	else {
		$('#animatorsSingInFields').css("display", "none");
		$('#campSingInFields').css("display", "block");
	}
};