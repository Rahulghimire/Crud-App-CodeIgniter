<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view("header");
		$this->load->view('create');
		$this->load->model('User_model');
		$users=$this->User_model->selectAll();
		$data=array();
		$data['users']=$users;
		//var_dump($data);
		$this->load->view('listing',$data);
	}

	public function insert(){
		$this->load->view('form');
	}

	public function create(){
		$this->load->model('User_model');

		//Validate the user input
		$this->form_validation->set_rules('name',"Name","required|min_length[5]|max_length[50]");
		$this->form_validation->set_rules('email',"Email","required|valid_email");
		$this->form_validation->set_rules('phone',"Phone","required|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]");
		$this->form_validation->set_rules('province',"Province","required");
		$this->form_validation->set_rules('gender',"Gender","required|in_list[Male,Female]");
		
		$this->form_validation->set_rules('date',"Date","required");
		//$this->form_validation->set_message('valid_dob', 'The date is invalid or the user is not at least 18 years old.');

		//Run Validation 
		if($this->form_validation->run()===false){
			$this->load->view('form');
		}

		else{
		$formArray=array();
		$formArray['name']=$this->input->post('name');
		$formArray['email']=$this->input->post('email');
		$formArray['pnumber']=$this->input->post('phone');
		$formArray['province']=$this->input->post('province');
		$formArray['gender']=$this->input->post('gender');
		$formArray['dob']=$this->input->post('date');

		$this->User_model->create($formArray);	
		$this->session->set_flashdata('success','Records added successfully!');
		redirect(base_url().'index.php/User/index');	
		}
	}

	public function update($userId){
		$this->load->model("User_model");
		$user=$this->User_model->getUser($userId);
		//var_dump($user);
		$data=array();
		$data['user']=$user;
		//var_dump($data);

		$this->form_validation->set_rules('name',"Name","required|trim|min_length[5]|max_length[50]");
		$this->form_validation->set_rules('email',"Email","required|valid_email");
		$this->form_validation->set_rules('phone',"Phone","required|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]");
		$this->form_validation->set_rules('province',"Province","required");

		if($this->form_validation->run()===false){
			$this->load->view("update",$data);
		}
		else{
		//update the user record
		$formArray=array();
		$formArray['name']=$this->input->post('name');
		$formArray['email']=$this->input->post('email');
		$formArray['pnumber']=$this->input->post('phone');
		$formArray['province']=$this->input->post('province');
		$formArray['gender']=$this->input->post('gender');
		$formArray['dob']=$this->input->post('date');
		$this->User_model->updateUser($userId,$formArray);
		$this->session->set_flashdata("success","Records Updated Successfully");
		redirect(base_url().'index.php/User/index');	
		}
	}

	public function delete($userId){
		$this->load->model('User_model');

		$user=$this->User_model->getUser($userId);
		//var_dump($user);

		if(!empty($user)){
			$this->User_model->deleteUser($userId);
			$this->session->set_flashdata('Success','Records deleted successfully!');

			//delete user having userId
			redirect(base_url().'index.php/User/index');
		}
		else{
			$this->session->set_flashdata('Failed','Records not found in database!');
			redirect(base_url().'index.php/User/index');
		}
	}

	//handle profile function

	public function profile(){
		$this->load->view("profile");
	}

	public function userEditHandler(){
	$this->load->view("profileEdit");
	
	}

	public function handleProfileUpdate($userId){

		// echo $userId;

		$this->load->model("UserRegModel");
		$this->load->model("User_model");

		$user=$this->User_model->getProfileUser($userId);

		//var_dump($user);
		
	
		$data=array();

		$data['user']=$user;

		//var_dump($data);


		$this->form_validation->set_rules('name','Name','trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('npassword','Password','trim|required');


		if($this->form_validation->run()===false){
			$this->load->view("profileEdit",$data);
		}
		
		else{
	
		$data=array(
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post("password"))
		);

		//var_dump($data);

		$result=$this->UserRegModel->loginUser($data);
	
		//var_dump($result);

		if(!$result){
            $this->session->set_flashdata('status','Invalid Username or Password');
        }

		else{
		$formArray['name']=$this->input->post('name');
		$formArray['email']=$this->input->post('email');
		$formArray['password']=md5($this->input->post('npassword'));
		
		$this->User_model->updateProfileUser($userId,$formArray);
		$this->session->set_flashdata("success","Records Updated Successfully, Login Again With New Password");
		redirect(base_url().'index.php/Auth/LoginController/login');
		}
		
		}
	}

	public function piechart(){

		$this->db->select('province, COUNT(*) as count');
		$this->db->from('users');
		$this->db->group_by('province');
		$query = $this->db->get();
		$data = $query->result();

		//var_dump($data);

		//var_dump(array('data' => $data));

		
		$this->load->view('test', array('data' => $data));

	}
}
