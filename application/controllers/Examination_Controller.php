<?php

class Examination_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

// Load session
        $this->load->library('session');
// Load model
        $this->load->model('Examination_Data');
        $this->load->model('Patient_Data');
    }

    public function index() {
        $dropdown = $this->input->post('dropdown');
        var_dump($dropdown);

        $search_text = "";

// Load view
        $this->load->view('Examination_View');

        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));

            switch ($dropdown) {

                case 'name':

                    $users_record = $this->Examination_Data->getDataName($search_text);

                    break;
                case 'surname':

                    $users_record = $this->Examination_Data->getDataSurname($search_text);

                    break;
                case 'cnp':

                    $users_record = $this->Examination_Data->getDataCNP($search_text);

                    break;
            }
            $data['result'] = $users_record;
            $data['search'] = $search_text;
            $this->load->view('Examination_View_Search', $data);
// Load view
        } else {

            if (($this->session->userdata('search') != NULL)) {
                $search_text = $this->session->userdata('search');
            }
        }
    }

    public function examinatePatient() {
        $edit = $this->input->get('edit');
        $data['counties'] = $this->Patient_Data->getCounty();
        $data['cities'] = $this->Patient_Data->getCityPatient();

        if (isset($edit)) {
            // get data by id
            $data['demo'] = $this->Patient_Data->getPatientById($edit);
            $data['medical'] = $this->Patient_Data->getPatientByIdMedical($edit);
            // load view
            $this->load->view('Examination_Consult_View', $data);
        }
    }

}
