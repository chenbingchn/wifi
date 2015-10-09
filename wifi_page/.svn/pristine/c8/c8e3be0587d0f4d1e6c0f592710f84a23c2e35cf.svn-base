<?php

class Account extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getUser($user_id) {
        $query = $this->db->select('*')->from('account')->where('user_id =' . $user_id);
        $user = $query->get()->result();
        return current($user);
    }

}
