<?php

class Useridscore extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function getScoreByUserId($userId){
        $sql ="select counter from `userid_score` where id = ? ";
        $result = $this->db->query($sql,array($userId))->row();
        if($result){
            return $result->counter;
        }
    }

}
