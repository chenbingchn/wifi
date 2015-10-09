<?php
	class Share extends CI_Controller 
	{
		public function index() 
		{
			$this->lang->load('all','english');
			$this->load->view('share/share');
		}

		public function id() 
		{
			$this->lang->load('all','indonesian');
			$this->load->view('share/share');
		}
	}
?>