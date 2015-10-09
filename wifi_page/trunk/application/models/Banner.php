<?php

class Banner extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function getPoinBanner(){
        $sql = "SELECT * FROM `banner` WHERE type = ? and state = ? ";
        $poinBanner = $this->db->query($sql,array('3','1'))->result();
         return $poinBanner;
    }

}
