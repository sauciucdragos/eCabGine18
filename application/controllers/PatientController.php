<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PatientController extends CI_Controller {
public function __construct(){
parent::__construct();
$this->load->helper('url');

// Load session
$this->load->library('session');

// Load Pagination library
$this->load->library('pagination');

// Load model
$this->load->model('Patient_data');
}

public function index(){
redirect('PatientController/loadRecord');
}

public function loadRecord($rowno = 0){

// Search text
$search_text = "";
if($this->input->post('submit') != NULL ){
$search_text = $this->input->post('search');
$this->session->set_userdata(array("search" => $search_text));
}else{
if($this->session->userdata('search') != NULL){
$search_text = $this->session->userdata('search');
}
}

// Row per page
$rowperpage = 2;

// Row position
if($rowno != 0){
$rowno = ($rowno-1) * $rowperpage;
}

// All records count
$allcount = $this->Patient_data->getrecordCount($search_text);

// Get records
$users_record = $this->Patient_data->getData($rowno, $rowperpage, $search_text);

// Pagination Configuration
$config['base_url'] = base_url().'index.php/PatientController/loadRecord';
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
$this->load->view('patient_view', $data);

}
public function create()
{


$this->load->helper('form');
$this->load->library('form_validation');



$this->form_validation->set_rules('first_name', 'First name', 'required');
$this->form_validation->set_rules('last_name', 'Last name', 'required');
$this->form_validation->set_rules('birth_date', 'Birth date', 'required');
$this->form_validation->set_rules('county', 'County', 'required');
$this->form_validation->set_rules('city', 'City', 'required');
$this->form_validation->set_rules('adress', 'Adress', 'required');
$this->form_validation->set_rules('job', 'Job', 'required');
$this->form_validation->set_rules('company', 'Company', 'required');
$this->form_validation->set_rules('phone_number', 'Phone number', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('CNP', 'CNP', 'required');
$this->form_validation->set_rules('marital_status', 'Marital Status', 'required');

if ($this->form_validation->run() === FALSE) {

$this->load->view('add_patient');

} else {
$data = array(
'first_name' => $this->input->post('first_name'),
 'last_name' => $this->input->post('last_name'),
 'birth_date' => $this->input->post('birth_date'),
 'county' => $this->input->post('county'),
        'city' => $this->input->post('city'),
 'adress' => $this->input->post('adress'),
 'job' => $this->input->post('job'),
 'company' => $this->input->post('company'),
                'city' => $this->input->post('city'),
 'phone_number' => $this->input->post('phone_number'),
 'email' => $this->input->post('email'),
 'CNP' => $this->input->post('CNP'),
         'marital_status' => $this->input->post('marital_status')
);
//Transfering data to Model
$this->patient_insert->form_insert($data);
$data['message'] = 'Data Inserted Successfully';
//Loading View
$this->load->view('add_patient', $data);
}

}
}



