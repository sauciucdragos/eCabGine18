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
        $this->load->view('Patient_View', $data);
    }

    public function update() {


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
        }
    }

}
