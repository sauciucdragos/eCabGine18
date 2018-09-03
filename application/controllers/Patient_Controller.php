<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

// Load session
        $this->load->library('session');

// Load Pagination library
        $this->load->library('pagination');

// Load model
        $this->load->model('Patient_Data');
        $this->load->model('Examination_Data');
    }

    public function index() {
        redirect('PatientController/loadRecord');
    }

    public function loadRecord($rowno = 0) {
        // Search text
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }
         
        // Row per page
        $rowperpage = 3;
        // Row position
        if ($this->input->post('submit') != NULL) {
            $dropdown = $this->input->post('dropdown');
            switch ($dropdown) {
                case 'name':
                    $allcount = $this->Examination_Data->getrecordCountName($search_text);
                    $users_record = $this->Examination_Data->getDataName($rowno, $rowperpage, $search_text);
                    break;
                case 'surname':
                    $users_record = $this->Examination_Data->getDataSurname($rowno, $rowperpage, $search_text);
                    $allcount = $this->Examination_Data->getrecordCountSurname($search_text);
                    break;
                case 'cnp':
                    $users_record = $this->Examination_Data->getDataCNP($rowno, $rowperpage, $search_text);
                    $allcount = $this->Examination_Data->getrecordCountCNP($search_text);
                    break;
            }
        } else {
            $allcount = $this->Examination_Data->getrecordCountName($search_text);
             $users_record = $this->Examination_Data->getDataName($rowno, $rowperpage, $search_text);
        }

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        // Pagination Configuration
        $config['base_url'] = base_url() . 'index.php/Patient_Controller/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        // Initialize
        $this->pagination->initialize($config);

      $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        // Load view
         $this->load->view('header');
        $this->load->view('Patient_View', $data);
        $this->load->view('footer');
    }


    public function create() {

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth date', 'required');
        $this->form_validation->set_rules('sel_county', 'sel_county', 'required');
        $this->form_validation->set_rules('sel_city', 'sel_city', 'required');
        $this->form_validation->set_rules('adress', 'Adress');
        $this->form_validation->set_rules('job', 'Job');
        $this->form_validation->set_rules('company', 'Company');
        $this->form_validation->set_rules('phone_number', 'Phone number', 'required');
        $this->form_validation->set_rules('email', 'Email');
        $this->form_validation->set_rules('CNP', 'CNP');
        $this->form_validation->set_rules('marital_status', 'Marital Status');
        $data['counties'] = $this->Patient_Data->getCounty();

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('Add_Patient', $data);
        } else {

            $patientData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birth_date'),
                'id_county' => $this->input->post('sel_county'),
                'id_city' => $this->input->post('sel_city'),
                'address' => $this->input->post('adress'),
                'job' => $this->input->post('job'),
                'company' => $this->input->post('company'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'CNP' => $this->input->post('CNP'),
                'marital_status' => $this->input->post('marital_status')
            );

//Transfering data to Model
            $this->Patient_Data->patient_insert($patientData);
            $data['message'] = 'Data Inserted Successfully';
//Loading View
            $this->load->view('Add_Patient', $data);
        }
    }

    public function getCity() {

        $postData = $this->input->post();
        $data_city = $this->Patient_Data->getCity($postData);
        echo json_encode($data_city);
    }

    function getCountyId() {
        $data_county = $this->input->post('id_county', true);
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($data_county));
    }

    function getCityId() {
        $data = $this->input->post('id_city', true);
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($data));
    }

    public function editPatient() {
        // Get 
        $edit = $this->input->get('edit');
        $data['counties'] = $this->Patient_Data->getCounty();
        $data['cities'] = $this->Patient_Data->getCityPatient();

        if (!isset($edit)) {
            $data['response'] = $this->Patient_Data->getPatientById($edit);

            // load view
            $this->load->view('Edit_Patient', $data);
        } else {

            // Check submit button POST or not
            if ($this->input->post('submit') != NULL) {
                // POST data
                $postData = $this->input->post();

                // Update record
                $this->Patient_Data->updateUser($postData, $edit);

                // Redirect page
                redirect('Patient_Controller/loadRecord');
            } else {

                // get data by id
                $data['response'] = $this->Patient_Data->getPatientById($edit);


                // load view
                $this->load->view('Edit_Patient', $data);
            }
        }
    }

}
