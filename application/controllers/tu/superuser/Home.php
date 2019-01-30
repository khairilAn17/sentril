<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('tu_model','',true);
      	$this->load->helper("akses");  
      	$this->load->library('dompdf_gen');    	
      	// $this->load->session()
      	cek_tu();
      	cek_superuser();
	}
	
	public function index()
	{
		$this->load->view('tu/spuser/templates/header_home');
		$this->load->view('tu/spuser/home');
		$this->load->view('tu/spuser/templates/footer_home');
	}

	public function kegiatan($param="")
	{
		if($param==2018){

			if(isset($_POST['ubah'])){
				$id = $this->input->post('id');
				$nama = $this->input->post('nama');
				$target = $this->input->post('target');
				$anggaran = $this->input->post('anggaran');
				$tgl = $this->input->post('tanggal');
				$lokasi = $this->input->post('lokasi');
				$pj = $this->input->post('pj');
				$ket = $this->input->post('keterangan');

				// $tgl = explode("-", $tgl);
				$trget = str_replace(".", "",$target);
				$anggrn = str_replace(".", "",$anggaran);

				// $bln["January"] = "01";
				// $bln["February"] = "02";
				// $bln["March"] = "03";
				// $bln["April"] = "04";
				// $bln["May"] = "05";
				// $bln["June"] = "06";
				// $bln["July"] = "07";
				// $bln["August"] = "08";
				// $bln["September"] = "09";
				// $bln["October"] = "10";
				// $bln["November"] = "11";
				// $bln["December"] = "12";

				// $tanggal = $tgl[2]."-".$bln[$tgl[1]]."-".$tgl[0];
				//var_dump($tanggal);die;
				$data = array(
					'id_kegiatan'=>$id,
					'nama_kegiatan'=>$nama,
					'tanggal'=>$tgl,
					'lokasi'=>$lokasi,
					'nama_pj'=>$pj,
					'keterangan'=>$ket
				);

				if($this->tu_model->update_kegiatan($data,$id)){
					$data['pesan'] = 1;
				}else{
					$data['pesan'] = 0;
				}

			}	
				//$data['row'] = $this->tu_model->get_kegiatan_su()->result_array();
		$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu","tanggal", 2018)->result_array();
		//$data['row'] = $this->tu_model->get_all_data_2018();
		$data['total'] = $this->tu_model->get_total_kegiatan(2018)->row_array();
		$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2018)->row_array();
		$data['group'] = $this->tu_model->get_group($param);
		$this->session->set_flashdata('tahun', '2018');

		
		//var_dump($data);die;
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/kegiatan',$data);
		$this->load->view('tu/spuser/templates/footer_table');
		$this->load->view('tu/spuser/kegiatan_script');
		}

		if($param==2019){
			if(isset($_POST['ubah'])){
				$id = $this->input->post('id');
				$nama = $this->input->post('nama');
				$target = $this->input->post('target');
				$anggaran = $this->input->post('anggaran');
				$tgl = $this->input->post('tanggal');
				$lokasi = $this->input->post('lokasi');
				$pj = $this->input->post('pj');
				$ket = $this->input->post('keterangan');

				// $tgl = explode("-", $tgl);
				$trget = str_replace(".", "",$target);
				$anggrn = str_replace(".", "",$anggaran);

				// $bln["January"] = "01";
				// $bln["February"] = "02";
				// $bln["March"] = "03";
				// $bln["April"] = "04";
				// $bln["May"] = "05";
				// $bln["June"] = "06";
				// $bln["July"] = "07";
				// $bln["August"] = "08";
				// $bln["September"] = "09";
				// $bln["October"] = "10";
				// $bln["November"] = "11";
				// $bln["December"] = "12";

				// $tanggal = $tgl[2]."-".$bln[$tgl[1]]."-".$tgl[0];
				//var_dump($tanggal);die;
				$data = array(
					'id_kegiatan'=>$id,
					'nama_kegiatan'=>$nama,
					'tanggal'=>$tgl,
					'lokasi'=>$lokasi,
					'nama_pj'=>$pj,
					'keterangan'=>$ket
				);

				if($this->tu_model->update_kegiatan($data,$id)){
					$data['pesan'] = 1;
				}else{
					$data['pesan'] = 0;
				}

			}	
				//$data['row'] = $this->tu_model->get_kegiatan_su()->result_array();
		$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu","tanggal", 2019)->result_array();
		$data['total'] = $this->tu_model->get_total_kegiatan(2019)->row_array();
		$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2019)->row_array();
		$data['group'] = $this->tu_model->get_group($param);
		$this->session->set_flashdata('tahun', '2019');
		
		//var_dump($data);die;
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/kegiatan',$data);
		$this->load->view('tu/spuser/templates/footer_table');
		$this->load->view('tu/spuser/kegiatan_script');
		}

	
	}

	
	public function user()
	{
		if(isset($_POST['ubah'])){
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$level = $this->input->post('level');
			
			if($password != ''){
				$data = array(
				'username'=>$username,
				'password'=>set_pass($password),
				'level'=>$level,
				);	
			}else{
				$data = array(
				'username'=>$username,			
				'level'=>$level,
				);
			}
			if($this->tu_model->update_user($data,$id)){
				$data['pesan'] = 1;
			}else{
				$data['pesan'] = 0;
			}

		}
		$data['row'] = $this->tu_model->get_all_data_user("tbl_user", "tu")->result_array();
		//var_dump($data);die;
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/user',$data);
		$this->load->view('tu/spuser/templates/footer_table');
		$this->load->view('tu/spuser/user_script');
	}

	public function add_user()
	{
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/add_user');
		$this->load->view('tu/spuser/templates/footer_table');
	}

	public function insert_proccess_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level 	  = $this->input->post('level');
		$unit	  = $this->input->post('unit');
		
		$data = array(
			'username'=>$username,
			'password'=>set_pass($password),
			'level'	  =>$level,
			'unit'	  =>$unit
		);

		$this->tu_model->insert_data("tbl_user",$data);
		redirect('superuser/home/user');
	}

	public function tambah_anggaran()
	{	
		$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2019)->result_array();
		$this->load->view('tu/spuser/templates/header_insert');
		$this->load->view('tu/spuser/add_anggaran',$data);
		$this->load->view('tu/spuser/templates/footer_insert');
	}

	public function kurangi_anggaran()
	{	
		$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2019)->result_array();
		$this->load->view('tu/spuser/templates/header_insert');
		$this->load->view('tu/spuser/min_anggaran',$data);
		$this->load->view('tu/spuser/templates/footer_insert');
	}

	public function kurangi_anggaran_proccess(){
		$id = $this->input->post('id');
		$target = $this->input->post('target');
		$anggaran = $this->input->post('anggaran');
		$trget = str_replace(".", "",$target);
		$anggrn = str_replace(".", "",$anggaran);
		$this->tu_model->db->query("UPDATE tbl_kegiatan_tu SET target=target-$trget,anggaran=anggaran-$anggrn,sisa_anggaran=sisa_anggaran-$anggrn,sisa_target=sisa_target-$trget WHERE id_kegiatan='$id'");
		$this->tu_model->db->query("UPDATE tbl_anggaran_all SET target=target-$trget,anggaran=anggaran-$anggrn,sisa_anggaran=sisa_anggaran-$anggrn,sisa_target=sisa_target-$trget WHERE id_kegiatan='$id'");
		redirect('tu/superuser/home/kegiatan/2019');
	}

	public function tambah_anggaran_proccess(){
		$id = $this->input->post('id');
		$target = $this->input->post('target');
		$anggaran = $this->input->post('anggaran');
		$trget = str_replace(".", "",$target);
		$anggrn = str_replace(".", "",$anggaran);
		$this->tu_model->db->query("UPDATE tbl_kegiatan_tu SET target=target+$trget,anggaran=anggaran+$anggrn,sisa_anggaran=sisa_anggaran+$anggrn,sisa_target=sisa_target+$trget WHERE id_kegiatan='$id'");
		$this->tu_model->db->query("UPDATE tbl_anggaran_all SET target=target+$trget,anggaran=anggaran+$anggrn,sisa_anggaran=sisa_anggaran+$anggrn,sisa_target=sisa_target+$trget WHERE id_kegiatan='$id'");
		redirect('tu/superuser/home/kegiatan/2019');
	}

	public function log_subkegiatan()
	{
		$data['row'] = $this->tu_model->get_all_data("tbl_subkegiatan_tu","tahun", 2019)->result_array();
		//var_dump($data);die;
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/subkegiatan',$data);
		$this->load->view('tu/spuser/templates/footer_table');
	}

	public function add_kegiatan(){
		$this->load->view('tu/spuser/templates/header_insert');
		$this->load->view('tu/spuser/add_kegiatan');
		$this->load->view('tu/spuser/templates/footer_insert');
	}

	public function insert_proccess(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$target = $this->input->post('target');
		$anggaran = $this->input->post('anggaran');
		$tgl = $this->input->post('tanggal');
		$lokasi = $this->input->post('lokasi');
		$pj = $this->input->post('pj');
		$ket = $this->input->post('keterangan');

		// $tgl = explode("-", $tgl);
		$trget = str_replace(".", "",$target);
		$anggrn = str_replace(".", "",$anggaran);

		// $bln["January"] = "01";
		// $bln["February"] = "02";
		// $bln["March"] = "03";
		// $bln["April"] = "04";
		// $bln["May"] = "05";
		// $bln["June"] = "06";
		// $bln["July"] = "07";
		// $bln["August"] = "08";
		// $bln["September"] = "09";
		// $bln["October"] = "10";
		// $bln["November"] = "11";
		// $bln["December"] = "12";

		// $tanggal = $tgl[2]."-".$bln[$tgl[1]]."-".$tgl[0];
		//var_dump($tanggal);die;
		$data = array(
			'id_kegiatan'=>$id,
			'nama_kegiatan'=>$nama,
			'target'=>$trget,
			'anggaran'=>$anggrn,
			'realisasi'=>0,
			'tanggal'=>$tgl,
			'lokasi'=>$lokasi,
			'nama_pj'=>$pj,
			'realisasi_anggaran'=>0,
			'sisa_anggaran'=>$anggrn,
			'sisa_target'=>$trget,
			'keterangan'=>$ket
		);
		$data1 =  array(
			'id_kegiatan' =>$id,
			'anggaran' =>$anggaran,
			'target'=>$target,
			'realisasi'=>0,
			'realisasi_anggaran'=>0,
			'tanggal'=>$tgl,
			'sisa_anggaran'=>$anggrn,
			'sisa_target'=>$trget,
		);
		$this->tu_model->insert_data("tbl_kegiatan_tu",$data);
		$this->tu_model->insert_data("tbl_anggaran_all",$data1);
		redirect('tu/superuser/home/kegiatan/2019');
	}
	public function delete(){
		$id = $this->input->post('checkbox');# Using Form POST method you can use whatever you want like GET
		for ($i=0; $i < count($id) ; $i++) { 
			$gbr = $this->tu_model->get_file_keg($id[$i])->result_array();
			foreach($gbr as $data){
				$file = './assets/file/'.$data['file'];
				unlink($file);
			}
			$this->tu_model->delete_data("tbl_kegiatan_tu","id_kegiatan",$id[$i]);
			$this->tu_model->delete_data("tbl_subkegiatan_tu","id_kegiatan",$id[$i]);
			$this->tu_model->delete_data("tbl_anggaran_all","id_kegiatan",$id[$i]);
			$this->tu_model->delete_data("tbl_subangaran_all","id_kegiatan",$id[$i]);
		}
		redirect('tu/superuser/home/kegiatan/2019');
	}
	public function delete_subkegiatan(){
		$id = $this->input->post('checkbox');# Using Form POST method you can use whatever you want 
		//$id = $this->input->get('id');
		// $id_keg = $this->input->get('id_keg');
		// $agr = $this->input->get('agr');
		//var_dump($id);die;
		for ($i=0; $i < count($id) ; $i++) { 
			$gbr = $this->tu_model->get_file_sub($id[$i])->result_array();
			//var_dump($gbr);die;
			foreach($gbr as $data){
				$file = './assets/file/'.$data['file'];
				unlink($file);
			}
			$data_blk = $gbr = $this->tu_model->get_data("tbl_subkegiatan_tu","id_subkegiatan",$id[$i])->row();
			//var_dump($data_blk->status);die;
			if($data_blk->status=='terverifikasi'){
				$this->tu_model->db->query("UPDATE tbl_kegiatan_tu SET realisasi=realisasi-1,sisa_target=sisa_target+1,realisasi_anggaran=realisasi_anggaran-$data_blk->anggaran,sisa_anggaran=sisa_anggaran+$data_blk->anggaran WHERE id_kegiatan='$data_blk->id_kegiatan'");
				$this->tu_model->db->query("UPDATE tbl_anggaran_all SET realisasi=realisasi-1,sisa_target=sisa_target+1,realisasi_anggaran=realisasi_anggaran-$data_blk->anggaran,sisa_anggaran=sisa_anggaran+$data_blk->anggaran WHERE id_kegiatan='$data_blk->id_kegiatan'");
			}
			$this->tu_model->delete_data("tbl_subkegiatan_tu","id_subkegiatan",$id[$i]);
			$this->tu_model->delete_data("tbl_subangaran_all","id_subkegiatan",$id[$i]);
			
		}
		// $gbr = $this->tu_model->get_file_sub($id)->row_array();
		// $file = './assets/file/'.$gbr['file'];
		// unlink($file);

		// $stat = $this->tu_model->db->query("SELECT status FROM tbl_subkegiatan_tu WHERE id_subkegiatan='$id'")->row_array();
		// //var_dump($gbr);die;
		// if($stat['status']=='terverifikasi'){
		// $this->tu_model->db->query("UPDATE tbl_kegiatan_tu SET realisasi=realisasi-1,sisa_target=sisa_target+1,realisasi_anggaran=realisasi_anggaran-$agr,sisa_anggaran=sisa_anggaran+$agr WHERE id_kegiatan='$id_keg'");
		// $this->tu_model->delete_data("tbl_subkegiatan_tu","id_subkegiatan",$id);
		// }else{
		// 	$this->tu_model->delete_data("tbl_subkegiatan_tu","id_subkegiatan",$id);
		// }
		redirect('tu/superuser/home/kegiatan/2019');
	}
	public function delete_user(){
		$id = $this->input->post('checkbox');# Using Form POST method you can use whatever you want like GET
		//var_dump($id);die;
		for ($i=0; $i < count($id) ; $i++) { 
			$this->tu_model->delete_data("tbl_user","id_user",$id[$i]);
		}
		redirect('tu/superuser/home/user');
	}


	function kegiatan_ajax($id){
		$data = $this->tu_model->get_kegiatan($id)->row_array();

		$bulan  = array('January','February','March','April','May','June','July','August','September','October','November','December');
		$tgl = explode('-', $data['tanggal']);
		//$data['tanggal'] = $tgl[2].'-'.$bulan[$tgl[1]-1].'-'.$tgl[0];
		header("Content-Type:application/json");
		echo json_encode($data);
	}


	function user_ajax($id){
		$data = $this->tu_model->get_user($id)->row_array();		
		header("Content-Type:application/json");
		echo json_encode($data);
	}


	function laporan(){
		$this->load->library('pagination');
		$total_rows = $this->tu_model->get_file_total()->num_rows();
		$data = [];
		if($total_rows>0){
			$limit = 10;
			$page_num = $this->uri->segment(4);
			($page_num>1) ? $start = ($page_num-1)*$limit : $start = 0;	
			$data['file'] = $this->tu_model->get_file_date($limit, $start)->result_array();
			//var_dump($data['file']);die;
			$config['base_url'] = base_url('tu/superuser/home/laporan');
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = true;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

		}
		

		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/laporan',$data);
		$this->load->view('tu/spuser/templates/footer_table');
		$this->load->view('tu/spuser/laporan_script');
			
	}


	function file_laporan($date){
		$data['file'] = $this->tu_model->get_file($date)->result_array();
		$data['tanggal'] = $date;
		$this->load->view('tu/spuser/file_laporan',$data);
	}

	public function verifikasi(){
		$id = $this->input->get('id');
		$id_keg = $this->input->get('id_keg');
		//var_dump($id_keg);var_dump($id);die;
		//$agr = $this->tu_model->get_data("tbl_subkegiatan_tu","id_kegiatan",$id_keg)->row_array();
	    $this->tu_model->db->query("UPDATE tbl_subkegiatan_tu SET status='terverifikasi' WHERE id_subkegiatan='$id'");
	    $this->tu_model->db->query("UPDATE tbl_subangaran_all SET status='terverifikasi' WHERE id_subkegiatan='$id'");
		//$agr = $this->tu_model->db->query("SELECT anggaran FROM tbl_subkegiatan_tu WHERE id_kegiatan='$id_keg' AND status='terverifikasi' ORDER BY id_subkegiatan DESC LIMIT 1")->row_array();
		$agr = $this->tu_model->db->query("SELECT anggaran FROM tbl_subkegiatan_tu WHERE id_kegiatan='$id_keg' AND status='terverifikasi' AND id_subkegiatan='$id'")->row_array();
		$angg = $agr['anggaran'];
		//echo $angg;die;
		//var_dump($agr);die;
		/*$a = $this->tu_model->db->query("SELECT sum(anggaran) AS anggaran_total,count(id_kegiatan) AS jlh FROM tbl_subkegiatan_tu WHERE status='terverifikasi' AND  id_kegiatan='$id_keg'")->result_array();
		foreach ($a as $t) {
			$data[] = $t['jlh'];
		}
		//var_dump($data);die;
		$realisasi_keg=implode("",$data);*/
		//var_dump($realisasi_keg);die;
		$this->tu_model->db->query("UPDATE tbl_kegiatan_tu SET realisasi=realisasi+1,sisa_target=sisa_target-1,realisasi_anggaran=realisasi_anggaran+$angg,sisa_anggaran=sisa_anggaran-$angg WHERE id_kegiatan='$id_keg'");
		
		$this->tu_model->db->query("UPDATE tbl_anggaran_all SET realisasi=realisasi+1,sisa_target=sisa_target-1,realisasi_anggaran=realisasi_anggaran+$angg,sisa_anggaran=sisa_anggaran-$angg WHERE id_kegiatan='$id_keg'");
		redirect('tu/superuser/home/log_subkegiatan');
	}	

	public function cari_kegiatan(){
		//$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu")->result_array();
		//var_dump($data);die;
		$this->load->view('tu/spuser/templates/header_table');
		$this->load->view('tu/spuser/cari_kegiatan');
		$this->load->view('tu/spuser/templates/footer_insert');
		$this->load->view('tu/spuser/cari_kegiatan_script');
	}


	function cari_kegiatan_ajax($id){
		$data['nama'] = $this->tu_model->get_data("tbl_kegiatan_tu","id_kegiatan",$id)->row_array();
		$data['total'] = $this->tu_model->get_total_kegiatan2($id)->row_array();
		$data['subtotal'] = $this->tu_model->get_total_subkegiatan2($id)->row_array();
		$data['row'] = $this->tu_model->get_subkegiatan($id)->result_array();
		$this->load->view('tu/spuser/cari_kegiatan_ajax',$data);
	}

	function proses_cari($id){
		
		$kegiatan =  $this->tu_model->cari_kegiatan($id);

		if($kegiatan->num_rows()>0){
			$data['error'] = 0;
			$data['id'] = $id;
		}
		else{
			$data['error'] = 1;
		}

		header("Content-Type:application/json");
		echo json_encode($data);

	}


	function print_laporan2018($param=''){
		$this->load->library('PHPExcel');
		$pj = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2018)->result();
		foreach ($pj as $key) {	
				if($param== $key->nama_pj){
					 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))					
			        ->setCellValue('A2', 'Kode')
			        ->setCellValue('B2', 'Nama Kegiatan')
			        ->setCellValue('C2', 'Target')
			        ->setCellValue('D2', 'Realisasi Target')
			        ->setCellValue('E2', 'Sisa Target')
			        ->setCellValue('F2', 'Anggaran')
			        ->setCellValue('G2', 'Realisasi Anggaran')
			        ->setCellValue('H2', 'Sisa Anggaran')
			        ->setCellValue('I2', 'Tanggal Mulai')
			        ->setCellValue('J2', 'Lokasi')
			        ->setCellValue('K2', 'Penanggung Jawab')
			        ->setCellValue('L2', 'Keterangan');

			          $styleTop = array(
			            'borders' => array(
			              'top' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			               ),
			               'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			            ),

			         );
			         $styleBottom = array(
			             'borders' => array(
			               'bottom' => array(
			                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                   )
			               )
			             );
			       $styleRight = array(
			          'borders' => array(
			             'right' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			          $styleLeft = array(
			          'borders' => array(
			             'left' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			           $styleDefault = array(
			          'borders' => array(
			             'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			             )
			          );
			      
			        // set align center
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);

			        $detail = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj","tanggal", $param, 2018)->result_array();
					$total = $this->tu_model->get_total_kegiatan(2018)->row_array();
					$subtotal = $this->tu_model->get_total_subkegiatan(2018)->row_array();

					$row=3;
					foreach($detail as $data){
						  $this->phpexcel->setActiveSheetIndex(0)
						  		->setCellValue('A' . $row, $data['id_kegiatan'])
						  		->setCellValue('B' . $row, $data['nama_kegiatan'])
						  		->setCellValue('C' . $row, $data['target'])
						  		->setCellValue('D' . $row, $data['realisasi'])
						  		->setCellValue('E' . $row, ($data['sisa_target']))
						  		->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
						  		->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
						  		->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
						  		->setCellValue('I' . $row, $data['tanggal'])
						  		->setCellValue('J' . $row, $data['lokasi'])
						  		->setCellValue('K' . $row, $data['nama_pj'])
						  		->setCellValue('L' . $row, $data['keterangan']);

						  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
						 $row++;
						}
					

					  // set style
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
					 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

			        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
			        header('Cache-Control: max-age=0');
			        // output
			        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
			        $obj_writer->save('php://output');
				    	}
				if($param== $key->nama_pj){break;}}

					if($param== ''){
					 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))					
			        ->setCellValue('A2', 'Kode')
			        ->setCellValue('B2', 'Nama Kegiatan')
			        ->setCellValue('C2', 'Target')
			        ->setCellValue('D2', 'Realisasi Target')
			        ->setCellValue('E2', 'Sisa Target')
			        ->setCellValue('F2', 'Anggaran')
			        ->setCellValue('G2', 'Realisasi Anggaran')
			        ->setCellValue('H2', 'Sisa Anggaran')
			        ->setCellValue('I2', 'Tanggal Mulai')
			        ->setCellValue('J2', 'Lokasi')
			        ->setCellValue('K2', 'Penanggung Jawab')
			        ->setCellValue('L2', 'Keterangan');

			          $styleTop = array(
			            'borders' => array(
			              'top' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			               ),
			               'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			            ),

			         );
			         $styleBottom = array(
			             'borders' => array(
			               'bottom' => array(
			                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                   )
			               )
			             );
			       $styleRight = array(
			          'borders' => array(
			             'right' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			          $styleLeft = array(
			          'borders' => array(
			             'left' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			           $styleDefault = array(
			          'borders' => array(
			             'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			             )
			          );
			      
			        // set align center
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);

			        $detail = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj","tanggal", $param, 2018)->result_array();
					$total = $this->tu_model->get_total_kegiatan(2018)->row_array();
					$subtotal = $this->tu_model->get_total_subkegiatan(2018)->row_array();

					$row=3;
					foreach($detail as $data){
						  $this->phpexcel->setActiveSheetIndex(0)
						  		->setCellValue('A' . $row, $data['id_kegiatan'])
						  		->setCellValue('B' . $row, $data['nama_kegiatan'])
						  		->setCellValue('C' . $row, $data['target'])
						  		->setCellValue('D' . $row, $data['realisasi'])
						  		->setCellValue('E' . $row, ($data['sisa_target']))
						  		->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
						  		->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
						  		->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
						  		->setCellValue('I' . $row, $data['tanggal'])
						  		->setCellValue('J' . $row, $data['lokasi'])
						  		->setCellValue('K' . $row, $data['nama_pj'])
						  		->setCellValue('L' . $row, $data['keterangan']);

						  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
						 $row++;
						}
					

					  // set style
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
					 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

			        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
			        header('Cache-Control: max-age=0');
			        // output
			        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
			        $obj_writer->save('php://output');
				    	}
	//ending
	}

	function print_laporan2019($param=''){
		$this->load->library('PHPExcel');
		$pj = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2019)->result();
		foreach ($pj as $key) {	
				if($param== $key->nama_pj){
					 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))					
			        ->setCellValue('A2', 'Kode')
			        ->setCellValue('B2', 'Nama Kegiatan')
			        ->setCellValue('C2', 'Target')
			        ->setCellValue('D2', 'Realisasi Target')
			        ->setCellValue('E2', 'Sisa Target')
			        ->setCellValue('F2', 'Anggaran')
			        ->setCellValue('G2', 'Realisasi Anggaran')
			        ->setCellValue('H2', 'Sisa Anggaran')
			        ->setCellValue('I2', 'Tanggal Mulai')
			        ->setCellValue('J2', 'Lokasi')
			        ->setCellValue('K2', 'Penanggung Jawab')
			        ->setCellValue('L2', 'Keterangan');

			          $styleTop = array(
			            'borders' => array(
			              'top' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			               ),
			               'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			            ),

			         );
			         $styleBottom = array(
			             'borders' => array(
			               'bottom' => array(
			                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                   )
			               )
			             );
			       $styleRight = array(
			          'borders' => array(
			             'right' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			          $styleLeft = array(
			          'borders' => array(
			             'left' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			           $styleDefault = array(
			          'borders' => array(
			             'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			             )
			          );
			      
			        // set align center
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);

			        $detail = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj","tanggal", $param, 2019)->result_array();
					$total = $this->tu_model->get_total_kegiatan(2019)->row_array();
					$subtotal = $this->tu_model->get_total_subkegiatan(2019)->row_array();

					$row=3;
					foreach($detail as $data){
						  $this->phpexcel->setActiveSheetIndex(0)
						  		->setCellValue('A' . $row, $data['id_kegiatan'])
						  		->setCellValue('B' . $row, $data['nama_kegiatan'])
						  		->setCellValue('C' . $row, $data['target'])
						  		->setCellValue('D' . $row, $data['realisasi'])
						  		->setCellValue('E' . $row, ($data['sisa_target']))
						  		->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
						  		->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
						  		->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
						  		->setCellValue('I' . $row, $data['tanggal'])
						  		->setCellValue('J' . $row, $data['lokasi'])
						  		->setCellValue('K' . $row, $data['nama_pj'])
						  		->setCellValue('L' . $row, $data['keterangan']);

						  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
						 $row++;
						}
					

					  // set style
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
					 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

			        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
			        header('Cache-Control: max-age=0');
			        // output
			        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
			        $obj_writer->save('php://output');
				    	}
				if($param== $key->nama_pj){break;}}

					if($param== ''){
					 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))					
			        ->setCellValue('A2', 'Kode')
			        ->setCellValue('B2', 'Nama Kegiatan')
			        ->setCellValue('C2', 'Target')
			        ->setCellValue('D2', 'Realisasi Target')
			        ->setCellValue('E2', 'Sisa Target')
			        ->setCellValue('F2', 'Anggaran')
			        ->setCellValue('G2', 'Realisasi Anggaran')
			        ->setCellValue('H2', 'Sisa Anggaran')
			        ->setCellValue('I2', 'Tanggal Mulai')
			        ->setCellValue('J2', 'Lokasi')
			        ->setCellValue('K2', 'Penanggung Jawab')
			        ->setCellValue('L2', 'Keterangan');

			          $styleTop = array(
			            'borders' => array(
			              'top' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			               ),
			               'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			            ),

			         );
			         $styleBottom = array(
			             'borders' => array(
			               'bottom' => array(
			                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                   )
			               )
			             );
			       $styleRight = array(
			          'borders' => array(
			             'right' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			          $styleLeft = array(
			          'borders' => array(
			             'left' => array(
			                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			                 )
			             )
			          );

			           $styleDefault = array(
			          'borders' => array(
			             'allborders' => array(
			                  'style' => PHPExcel_Style_Border::BORDER_THIN
			               )
			             )
			          );
			      
			        // set align center
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
			        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);

			        $detail = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj","tanggal", $param, 2019)->result_array();
					$total = $this->tu_model->get_total_kegiatan(2019)->row_array();
					$subtotal = $this->tu_model->get_total_subkegiatan(2019)->row_array();

					$row=3;
					foreach($detail as $data){
						  $this->phpexcel->setActiveSheetIndex(0)
						  		->setCellValue('A' . $row, $data['id_kegiatan'])
						  		->setCellValue('B' . $row, $data['nama_kegiatan'])
						  		->setCellValue('C' . $row, $data['target'])
						  		->setCellValue('D' . $row, $data['realisasi'])
						  		->setCellValue('E' . $row, ($data['sisa_target']))
						  		->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
						  		->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
						  		->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
						  		->setCellValue('I' . $row, $data['tanggal'])
						  		->setCellValue('J' . $row, $data['lokasi'])
						  		->setCellValue('K' . $row, $data['nama_pj'])
						  		->setCellValue('L' . $row, $data['keterangan']);

						  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
						 $row++;
						}
					

					  // set style
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
			        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
					 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

			        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
			        header('Cache-Control: max-age=0');
			        // output
			        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
			        $obj_writer->save('php://output');
				    	}
	//ending
	}
	

	function print_laporan_sub(){
		$id = $this->input->get('id');
		
		$this->load->library('PHPExcel');

		 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))
        ->setCellValue('A2', 'Tanggal Kegiatan')
        ->setCellValue('B2', 'Tanggal Input')
        ->setCellValue('C2', 'Jam')
        ->setCellValue('D2', 'Anggaran')
        ->setCellValue('E2', 'Lokasi')
        ->setCellValue('F2', 'PJ Kegiatan')
        ->setCellValue('G2', 'Keterangan')
        ->setCellValue('H2', 'File');
        
          $styleTop = array(
            'borders' => array(
              'top' => array(
                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
               ),
               'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
               )
            ),

         );
         $styleBottom = array(
             'borders' => array(
               'bottom' => array(
                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
                   )
               )
             );
       $styleRight = array(
          'borders' => array(
             'right' => array(
                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
                 )
             )
          );

          $styleLeft = array(
          'borders' => array(
             'left' => array(
                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
                 )
             )
          );

           $styleDefault = array(
          'borders' => array(
             'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
               )
             )
          );
      
        // set align center
        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);

        $detail = $this->tu_model->get_subkegiatan($id)->result_array();
		$total = $this->tu_model->get_total_kegiatan(2019)->row_array();
		$subtotal = $this->tu_model->get_total_subkegiatan(2019)->row_array();

		$row=3;
		foreach($detail as $data){
			  $this->phpexcel->setActiveSheetIndex(0)
			  		->setCellValue('A' . $row, $data['tanggal_kegiatan'].' '.$data['tahun'])
			  		->setCellValue('B' . $row, $data['tanggal_input'])
			  		->setCellValue('C' . $row, $data['jam'])
			  		->setCellValue('D' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
			  		->setCellValue('E' . $row, $data['lokasi'])
			  		->setCellValue('F' . $row, $data['pj_kegiatan'])
			  		->setCellValue('G' . $row, $data['keterangan'])
			  		->setCellValue('H' . $row, $data['file']);
			  		
			  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':H'.$row)->applyFromArray($styleDefault);
			 $row++;
		}

		  // set style
        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:H2')->applyFromArray($styleTop);
        $this->phpexcel->setActiveSheetIndex(0)->getStyle('H2:H'.($row-1))->applyFromArray($styleRight);
        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
		 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':H'.($row-1))->applyFromArray($styleBottom);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-subkegiatan.xlsx"');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
	}

	function cetak_pdf2018($param=''){
		$pj = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2018)->result();
		if ($param == '') {
				$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu","tanggal",2018)->result_array();
				$data['total'] = $this->tu_model->get_total_kegiatan(2018)->row_array();
				$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2018)->row_array();
				$this->load->view("tu/spuser/cetak",$data);
				
		      	$paper_size  = 'A4'; //paper size
		        $orientation = 'landscape'; //tipe format kertas
		        $html = $this->output->get_output();

		        $this->dompdf->set_paper($paper_size, $orientation);
		        //Convert to PDF
		        $this->dompdf->load_html($html);
		        $this->dompdf->render();
		        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));	
			}
		foreach ($pj as $key) {
			if ($param == $key->nama_pj) {
			$data['row'] = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj", "tanggal", $param, 2018)->result_array();
			$data['total'] = $this->tu_model->get_total_kegiatan(2018)->row_array();
			$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2018)->row_array();
			$this->load->view("tu/spuser/cetak",$data);
			
	      	$paper_size  = 'A4'; //paper size
	        $orientation = 'landscape'; //tipe format kertas
	        $html = $this->output->get_output();

	        $this->dompdf->set_paper($paper_size, $orientation);
	        //Convert to PDF
	        $this->dompdf->load_html($html);
	        $this->dompdf->render();
	        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));	
			}	
			if ($param == $key->nama_pj) {
				break;
			}
		}			
	}

	function cetak_pdf2019($param=''){
		$pj = $this->tu_model->get_all_data("tbl_kegiatan_tu", "tanggal", 2019)->result();
		if ($param == '') {
				$data['row'] = $this->tu_model->get_all_data("tbl_kegiatan_tu","tanggal",2019)->result_array();
				$data['total'] = $this->tu_model->get_total_kegiatan(2019)->row_array();
				$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2019)->row_array();
				$this->load->view("tu/spuser/cetak",$data);
				
		      	$paper_size  = 'A4'; //paper size
		        $orientation = 'landscape'; //tipe format kertas
		        $html = $this->output->get_output();

		        $this->dompdf->set_paper($paper_size, $orientation);
		        //Convert to PDF
		        $this->dompdf->load_html($html);
		        $this->dompdf->render();
		        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));	
			}
		foreach ($pj as $key) {
			if ($param == $key->nama_pj) {
			$data['row'] = $this->tu_model->get_all_data2019("tbl_kegiatan_tu", "nama_pj", "tanggal", $param, 2019)->result_array();
			$data['total'] = $this->tu_model->get_total_kegiatan(2019)->row_array();
			$data['subtotal'] = $this->tu_model->get_total_subkegiatan(2019)->row_array();
			$this->load->view("tu/spuser/cetak",$data);
			
	      	$paper_size  = 'A4'; //paper size
	        $orientation = 'landscape'; //tipe format kertas
	        $html = $this->output->get_output();

	        $this->dompdf->set_paper($paper_size, $orientation);
	        //Convert to PDF
	        $this->dompdf->load_html($html);
	        $this->dompdf->render();
	        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));	
			}	
			if ($param == $key->nama_pj) {
				break;
			}
		}			
	}

	function cetak_pdf_sub(){
		$id = $this->input->get("id");
		$data['nama'] = $this->tu_model->get_data("tbl_kegiatan_tu","id_kegiatan",$id)->row_array();
		$data['total'] = $this->tu_model->get_total_kegiatan2($id)->row_array();
		$data['subtotal'] = $this->tu_model->get_total_subkegiatan2($id)->row_array();
		$data['row'] = $this->tu_model->get_subkegiatan($id)->result_array();
		$this->load->view("tu/spuser/cetak_sub",$data);
		
      	$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
	}
}
