<?php
	class Find extends CI_Controller 
	{
		public function index()
		{
			$this->lang->load('all','english');
			$this->load->view('find/find');
		}

		public function id()
		{
			$this->lang->load('all','indonesian');
			$this->load->view('find/find');
		}
	}
?>