<?php


    Class Admin_page extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function get_users()
{

        $query = $this->db->get('user');
        return $query->result();
}
      public function get_user($userId) 
      {
         $query = $this->db->get_where("user",array("id_user"=>$userId));
        return $query->result();

}
   //This function is for inserting the existing record
      public function insert() { 
          $data = array(
        'last_name' => $this->input->post('last_name'),
        'first_name' => $this->input->post('first_name')
    );

    return $this->db->insert('user', $data);
         
      } 
   //This function is for deleting the existing record
      public function delete($user) { 
         if ($this->db->delete("user", "user = ".$user)) { 
            return true; 
         } 
      } 
   //This function is for updating the existing record
      public function update($data,$old_user) { 
         $this->db->set($data); 
         $this->db->where("id_user", $old_user); 
         $this->db->update("user", $data); 
      } 
   } 
?> 