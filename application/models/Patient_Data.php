<?php
class Patient_Data extends CI_Model {
public function __construct() {
    parent::__construct(); 
  }

  // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('patient');

    if($search != ''){
      $this->db->like('id_patient', $search);
      $this->db->or_like('first_name', $search);
       $this->db->or_like('last_name', $search);
      $this->db->or_like('CNP', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('patient');
 
    if($search != ''){

      $this->db->or_like('first_name', $search);
         $this->db->like('last_name', $search);
      $this->db->or_like('CNP', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
function patient_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('patient', $data);
}
}

