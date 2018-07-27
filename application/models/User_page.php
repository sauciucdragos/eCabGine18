<?php


    Class User_page extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function get_users(){

        $query = $this->db->get('user');
        return $query->result();
}
      public function get_user($userId) {
        $query = $this->db->get_where("user",array("id_user"=>$userId));
        return $query->result();

}
   //This function is for inserting the existing record
      public function insert() { 
        $data = array(
        'user' => $this->input->post('user'),
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name')
        
    );

        return $this->db->insert('user', $data);
         
      } 
   //This function is for deleting the existing record
      public function delete($id_user) { 
         if ($this->db->delete("user", "id_user = ".$id_user)) { 
            return true; 
         } 
      } 
   //This function is for updating the existing record
      public function update($data, $id_user) { 
         $this->db->set($data); 
         $this->db->where("id_user", $id_user); 
         $this->db->update("user", $data);  
         
      }
      
       public function save($data,$id_user) { 
         $data = array(
         'id_user'=>$this->input->post('id_user'),
         'last_name' => $this->input->post('last_name'),
         'first_name' => $this->input->post('first_name')
    );
       //$this->db->set($data); 
       //$this->db->where("id_user", $id_user); 

          return $this->db->replace('user', $data);
         
      } 
   } 
   
?> 