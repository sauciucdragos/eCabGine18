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
      // $this->load->view('Admin_adduser'); 
         
         $data['title'] = 'Create user';
         
         $this->User_page->insert();
         
         $this->load->view('success');
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
            //$this->load->view('Edit_user', $data);
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