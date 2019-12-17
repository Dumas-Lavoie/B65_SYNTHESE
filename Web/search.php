<?php
require_once("action/SearchAction.php");

$action = new SearchAction();
$action->execute();


require_once("partial/animPanel.php");
?>


<?php 
if ($action->applyConfirmed)
{
?>
    <div class="alert alert-success aPostule">
    <strong>Succès!</strong> Vous avez postulé au <?php echo $action->selectedCampName; ?>
    </div>
<?php
}
?>

<?php 
if ($action->alreadyApplied)
{
?>
    <div class="alert alert-warning aPostule">
    <strong>Erreur!</strong> Vous avez déjà postulé pour cet emploi au <?php echo $action->selectedCampName; ?>
    </div>
<?php
}
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

        <?php
        if (isset($action->searchResults)) {

            foreach ($action->searchResults as $key) {

                ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title offreDuCamp"><a href="offer?offerNumber=1">Offre d'emploi</a></h5>
                        <h6 class="card-subtitle mb-2 text-muted leCamp"><?php echo $key->camp->nom; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted laDate"><?php echo $key->creationDate; ?></h6>
                        <p class="card-text descOffre"><?php echo $key->description; ?></p>

                        <form action="search" method="POST">
                            <input style="display: none;" type="text" name="nomCampPostulation" value="<?php echo $key->camp->nom; ?>">
                            <input style="display: none;" type="text" name="message" value="Votre candidature remise au camp d'ici quelques minutes! Consultez votre courriel pour des détails. Bonne chance! <?php echo $key->camp->nom; ?>">
                            <input style="display: none;" type="text" name="idJobOfferPostulation" value="<?php echo $key->id; ?>">
                            <button type="submit">Postuler!</button>
                        </form>
                    </div>
                    <div class="photoCard"></div>
                </div>

        <?php

            }
        }

        ?>

        <template>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title offreDuCamp">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted leCamp">Nom</h6>
                    <h6 class="card-subtitle mb-2 text-muted laDate">Date</h6>
                    <p class="card-text descOffre">Some quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" onclick="" class="card-link">Postuler!</a>
                </div>
                <div class="photoCard"></div>
            </div>
        </template>

    </div>


</div>

</div>


<script>
    $("body").css("height", "100vh");
</script>

<?php
if ($action->ajustHeight) {
    ?>
    <script>
        $("body").css("height", "auto");
    </script>
<?php
}
?>



<script src="js/search.js"></script>
<script src="js/searchOptions.js"></script>
<?php
if ($action->searchEnabled) {
    echo "<script>showSearchResults()</script>";
    exit();
}
?>

<?php
require_once("partial/footer.php");
