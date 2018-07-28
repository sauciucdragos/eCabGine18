<?php 
   class Admin_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->model('User_page');       
         $this->load->helper('form');
          
      } 
      
      public function index() { 
       //$query = $this->db->get("user"); 
       //$data['user'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('Admin_page_view'); 
         
      } 
      
      public function user_list() { 
         $query = $this->db->get("user"); 
         $data['user'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('User_list',$data); 
      } 
      
      public function add() { 
         $this->load->helper('form');
         $query = $this->db->get("user"); 
         $data['user'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('Admin_adduser'); 
      } 
  
      public function add_user() { 
         $this->load->helper('form'); 
         $this->load->library('form_validation');
         $data['title'] = 'Create user';
         $rules = array(
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'callback_valid_password',
                ],
                [
                    'field' => 'confirm_password',
                    'label' => 'Confirm Password',
                    'rules' => 'matches[password]',
                ],
            );
         $this->form_validation->set_rules('user', 'Username', 'required');
         $this->form_validation->set_rules('first_name', 'First Name', 'required');
         $this->form_validation->set_rules('last_name', 'Last Name', 'required');
         $this->form_validation->set_rules($rules);  
         //$this->valid_password($password);
         
         if ($this->form_validation->run())
            {
             $this->User_page->insert();
             $this->load->view('success');
            }
            else
            {
              // echo 'Error! <ul>' . validation_errors('<li>', '</li>') . '</ul>';
               $this->load->view('Admin_adduser'); 
            }
        }
        //password validation
      public function valid_password($password = ''){
          
        $password = trim($password);
        
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        
        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        
        return TRUE;
    }
  
         
         
      
  
      public function view($page = 'home'){
         $data['title'] = ucfirst($page); 

         $this->load->view('admin_test', $data);
         $this->load->view('User_list', $data);
       
        }
   
      public function update_User_list() { 
         $this->load->helper('form'); 
         $user = $this->uri->segment('3'); 
         $query = $this->db->get_where("user",array("user"=>$user));
         
         $data['user'] = $query->result(); 
         $data['old_user'] = $user;
         $this->load->view('Edit_user',$data); 
        
      } 
  
      public function update_user(){ 
           $this->load->library('form_validation');
            $userId = $this->uri->segment('3');
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('user', 'Username', 'required');
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                if ($this->form_validation->run() === true) {
                    $userData['user'] = $this->input->post('user');
                    $userData['first_name'] = $this->input->post('first_name');
                    $userData['last_name'] = $this->input->post('last_name');
                    $this->User_page->update($userData, $userId); 
                }                 
            }
            $userData = $this->User_page->get_user($userId);
            $data['user'] = current($userData);
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('Edit_user', $data); 
            }
            else
            {
                $this->load->view('Save_user', $data);
            }
          
      } 
      
      public function delete_user() {
            $this->load->model('User_page');
            $id_user=$this->uri->segment('3');
            $this->User_page->delete($id_user);
          
            $query=$this->db->get("user");
            $data['user'] =$query->result();
          
          
            $this->load->view('Delete_user',$data);
          
      }
     
   } 
?>