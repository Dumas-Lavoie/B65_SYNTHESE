<?php
require_once("action/CommonAction.php");
require_once("action/DAO/CurrentApplysDAO.php");

class AdminAction extends CommonAction
{
    public $apply = array();
    public $ajustHeight = false;

	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_ADMIN);
	}

	protected function executeAction()
	{
        
        $this->apply = CurrentApplysDAO::getAllApplys();

        if (count($this->apply) >= 7)
        {
            $this->ajustHeight = true;
        }

	}
}
