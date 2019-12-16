<?php
require_once("action/SearchAction.php");

$action = new SearchAction();
$action->execute();


require_once("partial/animPanel.php");
?>


<div class="container">
    <div class="row">
        <div class="col-sm-5 searchPannel">

            <h3>Spécifier la recherche</h3>
            <div class="searchInside">
                <div class="dropDown">
                    <p>Type de camp</p>
                    <select class="selectCampType">
                    </select>
                </div>
                <div class="dropDown">
                    <p>Type de clientèle</p>
                    <select class="selectClientele">
                        <!-- <option value="volvo">Volvo</option> -->
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


        </div>
    </div>
</div>


<script>
    $("body").css("height", "100vh");
</script>
<script src="js/search.js"></script>
<?php
require_once("partial/footer.php");
