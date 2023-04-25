<?php
class AdminController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Authentication");
        $this->Authentication->checkIsAdmin();
    }
}
?>