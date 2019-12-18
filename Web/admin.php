<?php
require_once("action/AdminAction.php");

$action = new AdminAction();

$action->execute();

require_once("partial/header.php");
?>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

    <img src="images/campFire.jpg" width="100px" height="100px">
    <h1>Adminstration</h1>
    <h5 class="my-0 mr-md-auto font-weight-normal"></h5>

    <div id="connectedOptions">
        <p class="p-2 text-muted" id="loginState">Connecté en tant qu'administrateur</p>

        <a class="btn btn-outline-danger" href="logout">Se déconnecter</a>
    </div>
</div>


<div class="container">

    <h3>Liste de postulation</h3>

    <div class="row" id="searchMenu" >
            <div class="col-sm-6 searchPannel">
                <div class="division" style="display: flex; justify-content: space-between; ">
                    <div class="camp">Camp</div>
                    <div class="jobOffer">Courriel anim</div>
                    <div class="jobOffer">id animateur</div>
                </div>
            </div>
            <div class="col-sm-6 searchPannel">
                <div class="date">Date</div>
            </div>
        </div>

    <?php foreach ($action->apply as $row) {

    ?>
        <div class="row" id="searchMenu" style="border: solid; border-color:black;">
            <div class="col-sm-6 searchPannel">
                <div class="division" style="display: flex; justify-content: space-between; ">
                    <div class="camp"><?php echo $row['campName']['nom']; ?></div>
                    <div class="jobOffer"><?php  echo $row['userEmail']->email; ?></div>
                    <div class="jobOffer"><?php  echo $row['userEmail']->userID; ?></div>
                </div>
            </div>
            <div class="col-sm-6 searchPannel">
                <div class="date"><?php echo $row['apply_date']; ?></div>
            </div>
        </div>
    <?php
                                    }
    ?>





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


    <?php
                                    require_once("partial/footer.php");
