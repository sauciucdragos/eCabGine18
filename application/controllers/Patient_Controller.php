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


        // load view 
    }

    public function index() {
        //redirect('PatientController/loadRecord');
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
        $rowperpage = 4;

// Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

// All records count
        $allcount = $this->Patient_Data->getrecordCount($search_text);

// Get records
        $users_record = $this->Patient_Data->getData($rowno, $rowperpage, $search_text);

// Pagination Configuration
<<<<<<< HEAD
        $config['base_url'] = base_url() . 'index.php/Patient_Controller/loadRecord';
=======
       $config['base_url'] = base_url() . 'index.php/Patient_Controller/loadRecord';
>>>>>>> origin/task2
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
        $this->load->view('Patient_View', $data);
    }

    public function update() {


<<<<<<< HEAD
        $edit = $this->input->get('edit');

        if (isset($edit)) {

            // Check submit button POST or not
            if ($this->input->post('submit') != NULL) {
                // POST data
                $postData = $this->input->post();

                //load model
                // Update record
                $this->Patient_Data->updatePatient($postData, $edit);

                // Redirect page
                redirect('Patient_Controller/loadRecord');
            } else {

                // get data by id
                $data['response'] = $this->Patient_Data->getUserById($edit);


                // load view
                $data['view'] = 2;
                $this->load->view('Edit_Patient', $data);
            }
=======
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth date', 'required');
        $this->form_validation->set_rules('id_county', 'County');
        $this->form_validation->set_rules('id_city', 'City');
        $this->form_validation->set_rules('adress', 'Adress');
        $this->form_validation->set_rules('job', 'Job');
        $this->form_validation->set_rules('company', 'Company');
        $this->form_validation->set_rules('phone_number', 'Phone number', 'required');
        $this->form_validation->set_rules('email', 'Email');
        $this->form_validation->set_rules('CNP', 'CNP');
        $this->form_validation->set_rules('marital_status', 'Marital Status');

        if ($this->form_validation->run() === FALSE) {
            $data['counties'] = $this->Patient_Data->getCounty();
            $this->load->view('Add_Patient', $data);
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birth_date'),
                'id_county' => $this->input->post('id_county'),
                'id_city' => $this->input->post('id_city'),
                'address' => $this->input->post('adress'),
                'job' => $this->input->post('job'),
                'company' => $this->input->post('company'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'CNP' => $this->input->post('CNP'),
                'marital_status' => $this->input->post('marital_status')
            );
            var_dump($this->Patient_Data);
//Transfering data to Model
            $this->Patient_Data->patient_insert($data);
            $data['message'] = 'Data Inserted Successfully';
//Loading View
            $this->load->view('Add_Patient', $data);
>>>>>>> origin/task2
        }
    }

    public function getCity() {
        // POST data 
        $postData = $this->input->post();
        // get data 
        $data = $this->Patient_Data->getCity($postData);
        echo json_encode($data);
    }

    public function editPatient() {
        // Get 
        $edit = $this->input->get('edit');

        if (!isset($edit)) {
               $data['response'] = $this->Patient_Data->getPatientById($edit);
              $data['view'] = 2;
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
                $data['view'] = 2;

                // load view
                $this->load->view('Edit_Patient', $data);
            }
        }
    }

}
