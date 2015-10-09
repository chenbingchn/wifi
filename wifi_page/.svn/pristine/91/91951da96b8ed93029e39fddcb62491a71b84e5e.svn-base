<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $this->db2 = $this->load->database('additional', TRUE);
    $this->db2->where('id <',$id)->order_by('id', 'DESC')->limit(10);
    $imags = $this->db2->get('image');
    $pic = $imags->result();

    for ($i = 0; $i < count($pic); $i++) {
        $row[$i]['id'] = $pic[$i]->id;
        $row[$i]['name'] = $pic[$i]->url;
    }
}else{
    $row[0]['id'] = "";
    $row[0]['name'] = "";
}
echo json_encode($row)
?>