<?php

class Patient_Data extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    // Fetch records
  

    // Select total records
    public function record_count() {
        return $this->db->count_all("patient");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("patient");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

    function patient_insert($data) {
// Inserting in Table(patients) of Database(ecabgine)
        $this->db->insert('patient', $data);
    }

    function getCounty() {

        $this->db->select('*');
        $q = $this->db->get('county');
        $response = $q->result_array();

        return $response;
    }

    // Get City 
    function getCity($postData) {

        // Select record
        $this->db->select('id_city,city');
        $this->db->where('id_county', $postData['id_county']);
        $q = $this->db->get('city');
        $response = $q->result_array();

        return $response;
    }

    function getCityPatient() {

        // Select record
        $this->db->select('*');
        $q = $this->db->get('city');
        $response = $q->result_array();

        return $response;
    }

    // Get user by id
    function getPatientById($id) {
        $this->db->select('*');
        $this->db->where('id_patient', $id);
        $q = $this->db->get('patient');
        $result = $q->result_array();
        return $result;
    }
     function getPatientByIdMedical($id) {
        $this->db->select('*');
        $this->db->where('id_patient', $id);
        $q = $this->db->get('medical_record');
        $this->db->join('patient', 'medical_record.id_patient=patient.id_patient', 'inner');
        $result = $q->result_array();
        return $result;
    }

    // Update record by id
    function updateUser($postData, $id) {

        $first_name = trim($postData['first_name']);
        $last_name = trim($postData['last_name']);
        $birth_date = trim($postData['birth_date']);
        $id_county = trim($postData['sel_county']);
        $id_city = trim($postData['sel_city']);
        $address = trim($postData['address']);
        $job = trim($postData['job']);
        $company = trim($postData['company']);
        $phone_number = trim($postData['phone_number']);
        $email = trim($postData['email']);
        $CNP = trim($postData['CNP']);
        $marital_status = trim($postData['marital_status']);
        if ($first_name != '' && $last_name != '') {

            // Update
            $value = array('first_name' => $first_name, 'last_name' => $last_name, 'birth_date' => $birth_date, 'id_county' => $id_county, 'id_city' => $id_city, 'address' => $address, 'job' => $job, 'company' => $company, 'phone_number' => $phone_number, 'email' => $email, 'CNP' => $CNP, 'marital_status' => $marital_status);
            $this->db->where('id_patient', $id);
            $this->db->update('patient', $value);
        }
    }

    function search($keyword) {
        // $this->db->limit($limit, $start);
        $this->db->or_like(array('first_name' => $keyword, 'last_name' => $keyword, 'cnp' => $keyword));
        $query = $this->db->get('patient');
        return $query->result();
    }

}
