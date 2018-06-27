<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CreatePatient_Controller extends CI_Controller {

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

        // load view 
        $this->load->view('Add_patient', $data);
    }

    public function create() {


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
            $this->load->view('Add_Patient');
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
            var_dump($this->Patient_Data->patient_insert($data));

//Transfering data to Model
            $this->Patient_Data->patient_insert($data);

            $data['message'] = 'Data Inserted Successfully';

//Loading View
            $this->load->view('Add_Patient', $data);
        }
    }

    // get cities 



    public function getCity() {
        // POST data 
        $postData = $this->input->post();



        // get data 
        $data = $this->Patient_Data->getCity($postData);
        echo json_encode($data);
    }

}
