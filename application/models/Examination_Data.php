<?php

class Examination_Data extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }



    public function getDataName($rowno, $rowperpage, $search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('first_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getrecordCountName($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('first_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function getDataSurname($rowno, $rowperpage, $search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('last_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();


        return $query->result_array();
        
        
    }

    public function getrecordCountSurname($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('last_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function getDataCNP($rowno, $rowperpage, $search = "") {

        $this->db->select('*');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('CNP', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getrecordCountCNP($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('patient');

        if ($search != '') {
            $this->db->like('CNP', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

}
