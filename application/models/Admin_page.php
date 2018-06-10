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

      public function insert() { 
          $data = array(
        'last_name' => $this->input->post('last_name'),
        'first_name' => $this->input->post('first_name')
    );

    return $this->db->insert('user', $data);
         
      } 
   
      public function delete($id_no) { 
         if ($this->db->delete("ecabgine", "id_no = ".$id_no)) { 
            return true; 
         } 
      } 
   
      public function update($data,$old_id_no) { 
         $this->db->set($data); 
         $this->db->where("id_no", $old_id_no); 
         $this->db->update("ecabgine", $data); 
      } 
   } 
?> 