<?php if(!defined('BASEPATH')) exit('No direct access allowed');

function cek_pass($pass,$pass2){
		for($i=0;$i<73;$i++){
			$pass = md5($pass);	
			$pass = base64_encode($pass);		
			$pass = md5($pass);
		}
		$hased_pass = password_verify($pass, $pass2);
		if($hased_pass == $pass)
			return 1;
		else
			return 0;
	}

function set_pass($pass){
	for($i=0;$i<73;$i++){
		$pass = md5($pass);
		$pass = base64_encode($pass);		
		$pass = md5($pass);
		}
		$hased_pass = password_hash($pass, PASSWORD_BCRYPT);
		return $hased_pass;
	}


function cek_user(){
	$CI =& get_instance();
	if($CI->session->userdata('sp_role')=='admin'){
		if($CI->session->userdata('sp_unit')=='pemeriksaan'){
			redirect('admin/home');
		}else if($CI->session->userdata('sp_unit')=='infokom'){
			redirect('infokom/admin/home');
		}else if($CI->session->userdata('sp_unit')=='tu'){
			redirect('tu/admin/home');
		}else if($CI->session->userdata('sp_unit')=='penindakan'){
			redirect('penindakan/admin/home');
		}else if($CI->session->userdata('sp_unit')=='pengujian'){
			redirect('pengujian/admin/home');
		}
	}
	else if($CI->session->userdata('sp_role')=='superuser'){
		if($CI->session->userdata('sp_unit')=='pemeriksaan'){
			redirect('superuser/home');
		}else if($CI->session->userdata('sp_unit')=='infokom'){
			redirect('infokom/superuser/home');
		}else if($CI->session->userdata('sp_unit')=='tu'){
			redirect('tu/superuser/home');
		}else if($CI->session->userdata('sp_unit')=='penindakan'){
			redirect('penindakan/superuser/home');
		}else if($CI->session->userdata('sp_unit')=='pengujian'){
			redirect('pengujian/superuser/home');
		}
	}
	if($CI->session->userdata('sp_role')=='petugas'){
		if($CI->session->userdata('sp_unit')=='pemeriksaan'){
			redirect('petugas/home');
		}else if($CI->session->userdata('sp_unit')=='infokom'){
			redirect('infokom/petugas/home');
		}else if($CI->session->userdata('sp_unit')=='tu'){
			redirect('tu/petugas/home');
		}else if($CI->session->userdata('sp_unit')=='penindakan'){
			redirect('penindakan/petugas/home');
		}else if($CI->session->userdata('sp_unit')=='pengujian'){
			redirect('pengujian/petugas/home');
		}
	}
}
// cek unit
function cek_pemeriksaan(){
	$CI=& get_instance();
	if($CI->session->userdata('sp_unit')!='pemeriksaan'){
		redirect('home');
	}
}

function cek_infokom(){
	$CI=& get_instance();
	if($CI->session->userdata('sp_unit')!='infokom'){
		redirect('home');
	}
}

function cek_tu(){
	$CI =& get_instance();
	if($CI->session->userdata('sp_unit')!='tu'){
		redirect('home');
	}
}

function cek_penindakan(){
	$CI =& get_instance();
	if($CI->session->userdata('sp_unit')!='penindakan'){
		redirect('home');
	}
}

function cek_pengujian(){
	$CI =& get_instance();
	if($CI->session->userdata('sp_unit')!='pengujian'){
		redirect('home');
	}
}
//cek leve user
function cek_superuser(){
	$CI=& get_instance();
	if($CI->session->userdata('sp_role')!='superuser'){
		redirect('home');
	}
}

function cek_admin(){
	$CI=& get_instance();
	if($CI->session->userdata('sp_role')!='admin')
		redirect('home');
}

function cek_petugas(){
	$CI=& get_instance();
	if($CI->session->userdata('sp_role')!='petugas')
		redirect('home');
}


function user_logout(){
	$CI=& get_instance();
	$CI->session->unset_userdata('sp_user');
	$CI->session->unset_userdata('sp_role');
}