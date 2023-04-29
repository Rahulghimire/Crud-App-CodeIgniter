<?php

class LoginController extends CI_controller{

    public function index(){
        $this->load->view("template/login.php");
    }
    public function login(){

        $this->load->model("UserRegModel");
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()===false){
            $this->session->set_flashdata("status","Login Failed!!");
            $this->index();
        }

        else{
            $this->session->set_flashdata("status","Login in successfully");
            $data=array(
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post("password"))
            );

        $result=$this->UserRegModel->loginUser($data);
   
        if(!$result){
            $this->session->set_flashdata('status','Invalid Username or Password');
            $this->index();
        }
        
        else{
            $auth_userdetails=[
                'id'=>$result->id,
                'name'=>$result->name,
                'email'=>$result->email,
                'password'=>$result->password
            ];

            //echo $auth_userdetails;
            
            $this->session->set_userdata("authenticated",$result->role_as);
            $this->session->set_userdata("auth_user",$auth_userdetails);
            redirect(base_url().'index.php/User/index');   
        }
    }
}

}