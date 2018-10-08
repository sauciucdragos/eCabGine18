<?php

class Tests extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_tests() {
        $query = $this->db->get('name_of_medical_check_up');
        return $query->result();
    }

    public function get_test($name_of_medical_check_upId) {
        $query = $this->db->get_where("name_of_medical_check_up", array("id_name_of_medical_check_up" => $name_of_medical_check_upId));
        return $query->result();
    }

//This function is for inserting a laboratory test in db
    public function insert() {
        $data = array(
            'laboratory_test' => $this->input->post('laboratory_test'),
            'price' => $this->input->post('price')
        );

        return $this->db->insert('name_of_medical_check_up', $data);
    }

    //This function is for deleting a laboratory test in db
    public function delete($laboratory_test) {
        if ($this->db->delete("name_of_medical_check_up", "laboratory_test = " . $laboratory_test)) {
            return true;
        }
    }

    //This function is for updating a laboratory test in db
    public function update($data, $id_name_of_medical_check_up) {
        $this->db->set($data);
        $this->db->where("id_name_of_medical_check_up", $id_name_of_medical_check_up);
        $this->db->update("name_of_medical_check_up", $data);
    }

    public function save($data, $laboratory_test) {
        $data = array(
        'laboratory_test' => $this->input->post('laboratory_test'),
        'price' => $this->input->post('price'));
        return $this->db->replace('name_of_medical_check_up', $data);
    }
}
 ?>






