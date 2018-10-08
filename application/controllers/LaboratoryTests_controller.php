<?php

class LaboratoryTests_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Tests');
        $this->load->helper('form');
    }

    public function index() {
        $query = $this->db->get("name_of_medical_check_up");
        var_dump($data);
        $data['name_of_medical_check_up'] = $query->result();
        $this->load->helper('url');
        $this->load->view('Admin_page_view', $data);
    }

    public function test_list() {
        $query = $this->db->get("name_of_medical_check_up");

        $data['name_of_medical_check_up'] = $query->result();

        $this->load->helper('url');
        $this->load->view('LabTest_list', $data);
    }

    public function add() {
        $this->load->helper('form');
        $query = $this->db->get("name_of_medical_check_up");
        $data['name_of_medical_check_up'] = $query->result();

        $this->load->helper('url');
        $this->load->view('AddLab_tests');
    }

    public function add_test() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Create  laboratory test';
        $this->load->view('AddLab_tests');
        $this->Tests->insert('name_of_medical_check_up', $data);
        $this->load->view('Labsuccess');
    }

    public function view($page = 'home') {
        $data['title'] = ucfirst($page);

        $this->load->view('admin_test', $data);
        $this->load->view('LabTest_list', $data);
    }

    public function update_Test_list() {
        $this->load->helper('form');
        $laboratory_test = $this->uri->segment('3');
        $query = $this->db->get_where("name_of_medical_check_up", array("name_of_medical_check_up" => $name_of_medical_check_up));

        $data['laboratory_test'] = $query->result();
        $data['old_laboratory_test'] = $laboratory_test;
        $this->load->view('Edit_labtest', $data);
    }

    public function update_test() {
        $this->load->library('form_validation');
        $name_of_medical_check_upId = $this->uri->segment('3');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('laboratory_test', 'Lab test', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');

            if ($this->form_validation->run() === true) {
                $data['laboratory_test'] = $this->input->post('laboratory_test');
                $data['price'] = $this->input->post('price');
                $this->Tests->update($data, $name_of_medical_check_upId);
                
            }
        }
        $data = $this->Tests->get_test($name_of_medical_check_upId);
   
        $data['name_of_medical_check_up'] = current($data);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Edit_labtest', $data);
        } else {
           // $this->load->view('Save_labtest', $data);
        }
    }

}
