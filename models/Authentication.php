<?php
class Authentication extends CI_Model{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata("authenticated")){
            if($this->session->userdata("authenticated")==1){
                
            }
        }
        else{
            $this->session->set_flashdata("status","Login First!!");
            redirect(base_url().'index.php/Auth/LoginController/');
        }
    }
    public function checkIsAdmin(){
        if($this->session->has_userdata('authenticated')){
            if($this->session->has_userdata('authenticated')!=='2'){
                $this->session->set_flashdata("status","Your are not admin");
                redirect(base_url('403')); 
            }

        }
        
        else{
            $this->session->set_flashdata("status","Login First!!");
            redirect(base_url().'index.php/Auth/LoginController/'); 
        }

    }

}