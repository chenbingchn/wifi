<?php
    class Award extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('award_model');
            $this->load->helper('url_helper');
        }
        public function index() {
            $data['award'] = $this->award_model->get_award();
            $this->lang->load('award', 'indonesian');
            $this->load->view('award/index', $data);
        }
        public function en() {
            $data['award'] = $this->award_model->get_award();
            $this->lang->load('award', 'english');
            $this->load->view('award/index', $data);
        }
        public function zh() {
            $data['award'] = $this->award_model->get_award();
            $this->lang->load('award', 'chinese');
            $this->load->view('award/index', $data);
        }
    }