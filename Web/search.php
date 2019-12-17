<?php
require_once("action/SearchAction.php");

$action = new SearchAction();
$action->execute();


require_once("partial/animPanel.php");
?>


<div class="container">


    <div class="row" id="searchMenu">

        <div class="col-sm-5 searchPannel">
            <h3>Spécifier la recherche</h3>
            <form action="search" method="GET">
                <div class="searchInside">
                    <div class="dropDown">
                        <p>Type de camp</p>
                        <select name="selectCampType" class="selectCampType">
                        </select>
                    </div>
                    <div class="dropDown">
                        <p>Type de clientèle</p>
                        <select name="selectClientele" class="selectClientele">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Chercher!</button>
                </div>
            </form>

        </div>

        <div class="col">
            <form action="search" method="POST">
                <h3>Options</h3>
                <p>Votre photo de profil</p>
                <img id="profilePicture" src="" height="200px" width="200px" onclick="changingProfilePicture()">
                <input name="fileProfilePicture" type="file" id="file" />
                <p>Votre mini bio:</p>
                <textarea name="miniBio" id="miniBio" rows="4" cols="50"></textarea>
                <button type="submit" class="btn btn-primary">Updater mes infos!</button>
            </form>
        </div>


    </div>

    <div id="searchResults" style="display: none">
        <h3>Résultats de la recherche</h3>
        <a href="search">Retour au panneau de recherche</a>
    </div>


</div>

</div>




<script>
    $("body").css("height", "100vh");
</script>
<script src="js/search.js"></script>
<script src="js/searchOptions.js"></script>
<?php 
    if ($action->searchEnabled)
    {
        echo "<script>showSearchResults()</script>";
        exit();
    }
?>

<?php
require_once("partial/footer.php");
