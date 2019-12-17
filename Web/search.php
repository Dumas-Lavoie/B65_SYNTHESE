<?php
require_once("action/SearchAction.php");

$action = new SearchAction();
$action->execute();


require_once("partial/animPanel.php");
?>


<div class="container">
    <form action="search" method="GET">
        <div class="row">
            <div class="col-sm-5 searchPannel">
                <h3>Spécifier la recherche</h3>
                <div class="searchInside">
                    <div class="dropDown">
                        <p>Type de camp</p>
                        <select name="selectCampType" class="selectCampType">
                        </select>
                    </div>
                    <div class="dropDown">
                        <p>Type de clientèle</p>
                        <select name="selectCampType" class="selectClientele">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Chercher!</button>
                </div>
            </div>

            <div class="col">
                <h3>Options</h3>
                <p>Votre photo de profil</p>
                <img src="" height="200px" width="200px">
                <p>Votre mini bio:</p>
                <textarea id="miniBio" rows="4" cols="50"></textarea>

    <div class="col">
        <h3>Options</h3>
        <p>Votre photo de profil</p>
        <img id="profilePicture" src="" height="200px" width="200px" onclick="changingProfilePicture()">
        <input type="file" id="file" />
        <p>Votre mini bio:</p>
        <textarea id="miniBio" rows="4" cols="50"></textarea>

            </div>

        </div>
    </form>
</div>

</div>


<script>
    $("body").css("height", "100vh");
</script>
<script src="js/search.js"></script>
<script src="js/searchOptions.js"></script>

<?php
require_once("partial/footer.php");
