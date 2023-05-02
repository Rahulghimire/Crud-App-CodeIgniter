<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("UserRegModel");
    }

    public function index(){
        $this->load->view("template/register.php");
    }

    public function register(){
        $this->encryption->initialize(array('driver' => 'openssl'));
        $this->form_validation->set_rules('name','Name','required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user_reg.email]');
        $this->form_validation->set_rules('password','Password','trim|required');
        // $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');
   
        if($this->form_validation->run()==false){
            $this->index();
        }

        else{
            $data=array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post("password"))
            );
            
            $checking=$this->UserRegModel->insert($data);
            if(!$checking){
                $this->session->set_flashdata("failed","Registration Failed!!");
            }
            else{
                $this->session->set_flashdata("success","Records Inserted Successfully!!Login");
                redirect(base_url().'index.php/Auth/LoginController/index');
            }
        }
    }
}