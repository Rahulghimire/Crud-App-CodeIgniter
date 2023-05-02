<?php
class LogoutController extends CI_Controller{
function __construct(){
    parent::__construct();
    $this->load->model("Authentication");
}
public function logout(){
    $this->session->unset_userdata('authenticated');
    $this->session->unset_userdata('auth_user');
    $this->session->set_flashdata("success","You are logged out successfully!!");
    redirect(base_url().'index.php/Auth/LoginController/');
}
}
?>