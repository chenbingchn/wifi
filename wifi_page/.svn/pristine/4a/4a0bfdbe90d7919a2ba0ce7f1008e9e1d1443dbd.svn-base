<?php

class Integralrecord extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function getHistoryByUserId($userId){
        $sql = "select * from `integral_record` where user_id = ? order by buy_time desc";
        $record = $this->db->query($sql,array($userId))->result();
        foreach($record as $v){
            $sql = "select * from `integral` where id = ? ";
            $r = $this->db->query($sql,array($v->integral_id))->result();
            $v->good =$r[0];
        }
        return $record;  
    }
    


}