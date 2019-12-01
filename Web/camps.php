<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>