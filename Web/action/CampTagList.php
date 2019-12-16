<?php

require_once("action/CommonAction.php");
require_once("action/DAO/CampTagsDAO.php");

class CampTagList extends CommonAction
{
    public $json;

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
    }

    protected function executeAction()
    { 
        $this->json = CampTagsDAO::getCampTags();
    }
}
