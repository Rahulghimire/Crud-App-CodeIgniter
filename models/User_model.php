<?php
class User_model extends CI_model{
    
    function create($data){
        $this->db->insert('users',$data); //Insert into the users table
    }

    function selectAll(){
        return $this->db->get('users')->result_array();
    }

    function getUser($userId){
    $this->db->where('id',$userId);
       return $this->db->get('users')->row_array();
    }

    function updateUser($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('users',$formArray); //update users set name=?, where id=?
    }

    function deleteUser($userId){
        $this->db->where('id',$userId);
        //delete from the users
        $this->db->delete('users');
    }
    
    function getProfileUser($userId){
        $this->db->where('id',$userId);
        return $this->db->get('user_reg')->row_array();
    }

    function updateProfileUser($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('user_reg',$formArray); //update users set name=?, where id=?
    }
    
}
?>