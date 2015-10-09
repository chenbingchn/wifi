<?php
	class Prize extends CI_Controller {
		public function __construct() {
	        parent::__construct();
	        $this->load->model('prize_model');
	        $this->load->helper('url_helper');
	    }
		public function index() {
			$data['daily_profit'] = $this->prize_model->get_prize(1);
			$data['daily_prizes'] = $this->prize_model->get_prize(2);
			$data['grand_prize'] = $this->prize_model->get_prize(3);
			$this->load->view('prize/index', $data);
		}
		public function view() {
			$this->load->view('prize/view');
		}
		public function wait() {
			$this->load->view('prize/wait');
		}
		public function id() {
			$data['award'] = $this->award_model->get_award();
			$this->lang->load('award', 'indonesian');
			$this->load->view('prize/multilang', $data);
		}
		public function en() {
			$data['award'] = $this->award_model->get_award();
			$this->lang->load('award', 'english');
			$this->load->view('prize/multilang', $data);
		}
	}
?>