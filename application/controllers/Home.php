<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  	function __construct(){
  		parent::__construct();
  		$this->load->helper(array('form', 'akses'));
          $this->load->library('form_validation');
          $this->load->model('login_model');
          cek_user();
  	}
	
	public function index()
	{
   	if(isset($_POST['submit'])){
			 $this->form_validation->set_rules('username', 'Username', 'required',  array('required' => ' Masukkan Username.'));
             $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Masukkan Password.'));
              if ($this->form_validation->run())
                {
                      $user = $this->login_model->get_user($this->input->post('username'));
                      if($user->num_rows()>0){
                      	$us = $user->row_array();
                      	if(cek_pass($this->input->post('password'), $us['password'])){
                      		$this->session->set_userdata('sp_user',$us['username']);
                      		$this->session->set_userdata('sp_role',$us['level']);
                          $this->session->set_userdata('sp_unit',$us['unit']);
                      		cek_user();
                      	}
                      	
                      }
                      $data['error'] = "Username atau Password Salah";
                       $this->load->view('home', $data);
                }
                else
                {
                     $this->load->view('home');
                }
		}else{
			$this->load->view('home');
		}
		
	}
}
