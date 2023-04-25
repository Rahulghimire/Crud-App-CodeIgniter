<?php
    class UserRegModel extends CI_model{

    public function insert($data){
        return $this->db->insert("user_reg",$data);
    }

    public function loginUser($data){
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $this->db->from('user_reg');
        $this->db->limit(1);
        $query=$this->db->get();
        //var_dump($query);
        $query->num_rows();

        //var_dump($query->row());
        //var_dump($query->num_rows());

        if($query->num_rows()>0){
            return $query->row();
        }

        else{
            return false;
        }
    }
}
?>