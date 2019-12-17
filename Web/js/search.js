

$(document).ready(() => {
    getCampTags();
    getClientele();
});


const getCampTags = () => {
    $.ajax({
        type: "POST",
        url: "getCampTags.php"
    }).done(response => {
        response = JSON.parse(response);

        for (let index = 0; index < response.length; index++) {
            const nom = response[index].typeCamp;
            $(".selectCampType").append("<option name=\""+ nom +"\" value=\""+ nom +"\">" + nom + "</option>");
        }
    });
};

const getClientele = () => {
    $.ajax({
        type: "POST",
        url: "getClientele.php"
    }).done(response => {
        response = JSON.parse(response);

        for (let index = 0; index < response.length; index++) {
            const nom = response[index].clientele;
            $(".selectClientele").append("<option value=\""+ nom +"\">" + nom + "</option>");
        }
    });
};


const showSearchResults = () => {
		$('#searchMenu').css("display", "none");
		$('#searchResults').css("display", "block");
};