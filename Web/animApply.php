<?php
require_once("action/AnimApplyAction.php");

$action = new AnimApplyAction();
$action->execute();

require_once("partial/animPanel.php");
?>




<div class="container">

    <h3>Liste de postulation</h3>

    <?php 
        if($action->apply != null)
        {
        foreach ($action->apply as $row) {

    ?>
        <div class="row" id="searchMenu">

            <div class="col-sm-6 searchPannel">
                <div class="division" style="display: flex; justify-content: space-between; ">
                    <div class="camp"><?php echo $row['campName']['nom']; ?></div>
                    <div class="jobOffer"></div>
                </div>
            </div>
            <div class="col-sm-6 searchPannel">
                <div class="date">Date: <?php echo $row['apply_date']; ?></div>
            </div>
        </div>
    <?php
    }
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
