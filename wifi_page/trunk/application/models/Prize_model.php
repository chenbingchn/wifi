<?php
	class Prize_model extends CI_Model {

	    public function __construct() {
	        $this->load->database();
	    }
		public function get_prize($i) {
			$sql = 'select * from prize where type='.$i;
			$query = $this->db->query($sql);
			return $query->result();
		}
	}