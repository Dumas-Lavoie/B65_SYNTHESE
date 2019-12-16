<?php

require_once("action/CampTagList.php");
$action = new CampTagList();
$action->execute();
echo json_encode($action->json);
