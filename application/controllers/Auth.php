<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth extends CI_Controller
{
    public function logout()
    {
        unset($_SESSION);
        redirect("auth/login",  "refresh");
    }

    public function login()       
    {   
          
          $this->form_validation->set_rules('user', 'User', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
          if ($this->form_validation->run() == TRUE) {
              
              $user = $_POST['user'];
              $password = ($_POST['password']);
                     //check user in database
              $this->db->select('*');
              $this->db->from ('user');
              $this->db->where(array('user'=> $user, 'password' => $password));
              $query = $this->db->get();
              
              $user = $query->row();
              
              if($user->first_name) {
                  
                  $this->session->set_flashdata("success", "You are logged");
                  
                  $_SESSION['user_logged'] = TRUE;
                  $_SESSION['user'] = $user->user;
                  
                  //redirect
                  
                  redirect("user/profile", "refresh");
                  
              } else {
                  $this->session->set_flashdata("error", "No account");
                  redirect("auth/login", "refresh");
              }
               
          } 
          
          $this->load->view('login');
    
    }

    public function register() 
    {
        $data['validation_errors'] = null;
        if (isset($_POST['register'])) {
            $this->form_validation->set_rules('user', 'User', 'required');
            $this->form_validation->set_rules('first_name', 'First_name', 'required');
            $this->form_validation->set_rules('last_name', 'Last_name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|min_length[5]|matches[password]');
            if ($this->form_validation->run() == TRUE) {
               //echo 'form validated';
               
               $data = array(
                   'user' =>$_POST['user'],
                   'first_name' =>$_POST['first_name'],
                   'last_name' =>$_POST['last_name'],
                   'password' =>$_POST['password'],
                   
                       
               );
               
               $this->db->insert('user', $data);
               
               $this->session->set_flashdata("success", "You can login now");
               redirect("auth/login", "refresh");
            
            } else {
				$data['validation_errors'] = validation_errors();
			}
        }
        //load view
        
		$this->load->view('register', $data);
    }

}
