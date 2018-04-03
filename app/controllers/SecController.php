<?php
class Controller_Sec extends Controller
{
	function action_view()
	{	
		$this->view->generate('sec_view_view.php', 'template_view.php');
	}

	function action_approve()
	{	
		$this->view->generate('sec_approve_view.php', 'template_view.php');
	}

	function action_reject()
	{	
		$this->view->generate('sec_reject_view.php', 'template_view.php');
	}
}