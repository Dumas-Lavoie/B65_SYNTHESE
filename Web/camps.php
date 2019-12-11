<?php
require_once("action/CampAction.php");

$action = new CampAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>