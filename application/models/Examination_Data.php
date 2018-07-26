<?php

class Examination_Data extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function getDataName($search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('first_name', $search);
        }

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getDataSurname($search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('last_name', $search);
        }

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getDataCNP($search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('CNP', $search);
        }

        $query = $this->db->get();

        return $query->result_array();
    }

   
}
