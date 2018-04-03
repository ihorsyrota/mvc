<?php
class Controller_Its extends Controller
{
	function action_view()
	{	
		$this->view->generate('its_view_view.php', 'template_view.php');
	}

	function action_approve()
	{	
		$this->view->generate('its_approve_view.php', 'template_view.php');
	}

	function action_reject()
	{	
		$this->view->generate('its_reject_view.php', 'template_view.php');
	}
}