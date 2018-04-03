<?php
class DmController extends Controller
{
	function actionDefault()
	{	
		$this->view->generate('dm_view_view.php', 'template_view.php');
	}

	function actionApprove()
	{	
		$this->view->generate('dm_approve_view.php', 'template_view.php');
	}

	function actionReject()
	{	
		$this->view->generate('dm_reject_view.php', 'template_view.php');
	}
}