<?php
require_once("action/CommonAction.php");
require_once("action/DAO/CurrentApplysDAO.php");

class AnimApplyAction extends CommonAction
{
    public $apply = array();
    public $ajustHeight = false;

	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_MEMBER);
	}

	protected function executeAction()
	{
        
        $this->apply = CurrentApplysDAO::getAnimatorApplys($_SESSION['userEmail']);

	}
}
