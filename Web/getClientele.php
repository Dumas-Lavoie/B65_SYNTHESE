<?php
require_once("action/ClienteleList.php");

$action = new ClienteleList();
$action->execute();
echo json_encode($action->json);
