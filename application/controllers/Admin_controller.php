<?php 
   class Admin_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->model('Admin_page');
               
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
         $this->load->view('Admin_adduser'); 
         
          $data['title'] = 'Create user';
         
         $this->Admin_page->insert();
        $this->load->view('success');
      } 
  
      public function view($page = 'home')
        {
            $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('admin_test', $data);
        }
   } 
?>