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
// Inserting in Table(patients) of Database(ecabgine)
$this->db->insert('patient', $data);
}
function getCounty(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('county');
    $response = $q->result_array();

    return $response;
  }
  // Get City 
  function getCity($postData){
    $response = array();
 
    // Select record
    $this->db->select('id_city,city');
    $this->db->where('county', $postData['county']);
    $q = $this->db->get('city');
    $response = $q->result_array();

    return $response;
  }
  // Get user by id
    function getPatientById($id){
        $this->db->select('*');
        $this->db->where('id_patient', $id);
        $q = $this->db->get('patient');
        $result = $q->result_array();
        return $result;
    }

    // Update record by id
    function updateUser($postData,$id){

        $first_name = trim($postData['first_name']);
        $last_name = trim($postData['last_name']);
         $birth_date = trim($postData['birth_date']);
        $id_county = trim($postData['id_county']);
         $id_city = trim($postData['id_city']);
        $address = trim($postData['address']);
         $job = trim($postData['job']);
        $company = trim($postData['company']);
         $phone_number = trim($postData['phone_number']);
        $email = trim($postData['email']);
         $CNP = trim($postData['CNP']);
        $marital_status = trim($postData['marital_status']);
        if($first_name !='' && $last_name !=''  ){

            // Update
            $value=array('first_name'=>$first_name,'last_name'=>$last_name,'birth_date'=>$birth_date,'id_county'=>$id_county,'id_city'=>$id_city,'address'=>$address, 'job'=>$job,'company'=>$company, 'phone_number'=>$phone_number,'email'=>$email,  'CNP'=>$CNP,'marital_status'=>$marital_status );
            $this->db->where('id_patient',$id);
            $this->db->update('patient',$value);

    }}

}

