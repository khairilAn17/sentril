<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
      	$this->load->helper("akses");
      	
	}
	
	function index(){
		user_logout();
		redirect("home");
	}
	
}
