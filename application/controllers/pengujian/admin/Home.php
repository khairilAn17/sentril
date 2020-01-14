<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
		$this->load->model('pengujian_model','',true);
		$this->load->helper(array('form','file','akses'),'',true);
		$this->load->library('dompdf_gen');  
		
		cek_admin();
		cek_pengujian();
	}
	
	public function index()
	{
		$this->load->view('pengujian/private/templates/header_home');
		$this->load->view('pengujian/private/home');
		$this->load->view('pengujian/private/templates/footer_home');
	}

	public function kegiatan()
	{
		$tahun = date("Y");
		$data['total'] = $this->pengujian_model->get_total_kegiatan($tahun)->row_array();
		$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan($tahun)->row_array();
		$data['row'] = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", $tahun)->result_array();
		$data['group'] = $this->pengujian_model->get_group($tahun);
		$this->session->set_flashdata('tahun', $tahun);
		//var_dump($data);die;
		$this->load->view('pengujian/private/templates/header_table');
		$this->load->view('pengujian/private/kegiatan',$data);
		$this->load->view('pengujian/private/templates/footer_table');
	}

	public function add_kegiatan(){
		$tahun = date('Y');
		$data['row'] = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", $tahun)->result_array();
		//var_dump($data);die;
		$this->load->view('pengujian/private/templates/header_insert');
		$this->load->view('pengujian/private/add_kegiatan',$data);
		$this->load->view('pengujian/private/templates/footer_insert');
	}

	public function cari_kegiatan(){
		//$data['row'] = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian")->result_array();
		//var_dump($data);die;
		$this->load->view('pengujian/private/templates/header_insert');
		$this->load->view('pengujian/private/cari_kegiatan');
		$this->load->view('pengujian/private/templates/footer_insert');
		$this->load->view('pengujian/private/cari_kegiatan_script');
	}
	public function insert_proccess(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->input->post('id');
		$anggaran = $this->input->post('anggaran');
		$tgl = $this->input->post('tanggal');
		$tahun = date("Y");
		$tgl_input = date("d-M-Y");
		//var_dump($tgl_input);die;
		$lokasi = $this->input->post('lokasi');
		$pj = $this->input->post('pj');
		$ket = $this->input->post('keterangan');
		$jam = date('h:i A');
		
		// $tgl = explode("-", $tgl);
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

		$mimeExt = array();
		$mimeExt['image/jpeg'] ='.jpg';
		$mimeExt['image/pjpeg'] ='.jpg';
		$mimeExt['image/bmp'] ='.bmp';
		$mimeExt['image/gif'] ='.gif';
		$mimeExt['image/x-icon'] ='.ico';
		$mimeExt['image/png'] ='.png';
		//var_dump($tanggal);die;
		$data = array(
			'id_kegiatan'=>$id,
			'tanggal_kegiatan'=>$tgl,
			'tahun'=>$tahun,
			'tanggal_input'=>$tgl_input,
			'jam'=>$jam,
			'anggaran'=>$anggrn,
			'lokasi'=>$lokasi,
			'pj_kegiatan'=>$pj,
			'keterangan'=>$ket,
			'status'=>'belum verifikasi'
		);

		if ($_FILES['fupload']['name'] != "") {
			$image = $mimeExt[$_FILES['fupload']['type']]; //Get image extension
			$lokasi_file = $_FILES['fupload']['tmp_name'];
			$nama_file   = $_FILES['fupload']['name'];
			// Tentukan folder untuk menyimpan file
			$folder = "./assets/file/";
			$namafilenya ="$id-$nama_file";
			$alamat=$folder.$namafilenya;
			if (move_uploaded_file($lokasi_file,$alamat))
			{
		 		// echo "Nama File : <b>$nama_file</b> sukses di upload";
	 			$data['file'] = $namafilenya;
			}
		}

		//var_dump($data);die;
		$this->pengujian_model->insert_data("tbl_subkegiatan_pengujian",$data);
		$id_subkegiatan = $this->pengujian_model->get_id_subkegiatan('tbl_subkegiatan_pengujian', $id, $jam, $ket, $tgl);
		
		$data1 = array(
			'id_kegiatan'=>$id,
			'id_subkegiatan'=>$id_subkegiatan->id_subkegiatan,
			'tanggal'=>$tahun,
			'anggaran'=>$anggrn,
			'status'=>'belum verifikasi'
		);

		//var_dump($data);die;
		
		$this->pengujian_model->insert_data("tbl_subangaran_all",$data1);		
		
		redirect('pengujian/admin/home/kegiatan');
	}


	function proses_cari($id){
		
		$kegiatan =  $this->pengujian_model->cari_kegiatan($id);
		
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


	function cari_kegiatan_ajax($id){
		$data['total'] = $this->pengujian_model->get_total_kegiatan2($id)->row_array();
		$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan2($id)->row_array();
		$data['row'] = $this->pengujian_model->get_subkegiatan($id)->result_array();
		$this->load->view('pengujian/private/cari_kegiatan_ajax',$data);
	}

	// function print_laporan(){
	// 	$this->load->library('PHPExcel');

	// 	 $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))
 //        ->setCellValue('A2', 'Kode')
 //        ->setCellValue('B2', 'Nama Kegiatan')
 //        ->setCellValue('C2', 'Target')
 //        ->setCellValue('D2', 'Realisasi Target')
 //        ->setCellValue('E2', 'Sisa Target')
 //        ->setCellValue('F2', 'Anggaran')
 //        ->setCellValue('G2', 'Realisasi Anggaran')
 //        ->setCellValue('H2', 'Sisa Anggaran')
 //        ->setCellValue('I2', 'Tanggal Mulai')
 //        ->setCellValue('J2', 'Lokasi')
 //        ->setCellValue('K2', 'Penanggung Jawab')
 //        ->setCellValue('L2', 'Keterangan');
        

 //          $styleTop = array(
 //            'borders' => array(
 //              'top' => array(
 //                  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
 //               ),
 //               'allborders' => array(
 //                  'style' => PHPExcel_Style_Border::BORDER_THIN
 //               )
 //            ),

 //         );
 //         $styleBottom = array(
 //             'borders' => array(
 //               'bottom' => array(
 //                   'style' => PHPExcel_Style_Border::BORDER_MEDIUM
 //                   )
 //               )
 //             );
 //       $styleRight = array(
 //          'borders' => array(
 //             'right' => array(
 //                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
 //                 )
 //             )
 //          );

 //          $styleLeft = array(
 //          'borders' => array(
 //             'left' => array(
 //                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
 //                 )
 //             )
 //          );

 //           $styleDefault = array(
 //          'borders' => array(
 //             'allborders' => array(
 //                  'style' => PHPExcel_Style_Border::BORDER_THIN
 //               )
 //             )
 //          );
      
 //        // set align center
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 // 		$this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('B')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('C')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('D')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
 //        $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);

 //        $detail = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", 2019)->result_array();
	// 	$total = $this->pengujian_model->get_total_kegiatan(2019)->row_array();
	// 	$subtotal = $this->pengujian_model->get_total_subkegiatan(2019)->row_array();

	// 	$row=3;
	// 	foreach($detail as $data){
	// 		  $this->phpexcel->setActiveSheetIndex(0)
	// 		  		->setCellValue('A' . $row, $data['id_kegiatan'])
	// 		  		->setCellValue('B' . $row, $data['nama_kegiatan'])
	// 		  		->setCellValue('C' . $row, $data['target'])
	// 		  		->setCellValue('D' . $row, $data['realisasi'])
	// 		  		->setCellValue('E' . $row, ($data['sisa_target']))
	// 		  		->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
	// 		  		->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
	// 		  		->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
	// 		  		->setCellValue('I' . $row, $data['tanggal'])
	// 		  		->setCellValue('J' . $row, $data['lokasi'])
	// 		  		->setCellValue('K' . $row, $data['nama_pj'])
	// 		  		->setCellValue('L' . $row, $data['keterangan']);

	// 		  $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
	// 		 $row++;
	// 	}

	// 	  // set style
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
	// 	 $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

 //        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 //        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
 //        header('Cache-Control: max-age=0');
 //        // output
 //        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
 //        $obj_writer->save('php://output');
	// }
	function print_laporan($tahun,$param=''){
			$this->load->library('PHPExcel');
			$pj = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", $tahun)->result();
			$urldecode = urldecode($param);
			foreach ($pj as $key) {	
					if($urldecode== $key->nama_pj){
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

				        $detail = $this->pengujian_model->get_all_data2019("tbl_kegiatan_pengujian", "nama_pj","tanggal", $urldecode, $tahun)->result_array();
						$total = $this->pengujian_model->get_total_kegiatan($tahun)->row_array();
						$subtotal = $this->pengujian_model->get_total_subkegiatan($tahun)->row_array();

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
					if($urldecode== $key->nama_pj){break;}}

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

				        $detail = $this->pengujian_model->get_all_data2019("tbl_kegiatan_pengujian", "nama_pj","tanggal", $urldecode, $tahun)->result_array();
						$total = $this->pengujian_model->get_total_kegiatan($tahun)->row_array();
						$subtotal = $this->pengujian_model->get_total_subkegiatan($tahun)->row_array();

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

        $detail = $this->pengujian_model->get_subkegiatan($id)->result_array();
		$total = $this->pengujian_model->get_total_kegiatan(2019)->row_array();
		$subtotal = $this->pengujian_model->get_total_subkegiatan(2019)->row_array();

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

	// function cetak_pdf(){
	// 	$data['row'] = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", 2019)->result_array();
	// 	$data['total'] = $this->pengujian_model->get_total_kegiatan(2019)->row_array();
	// 	$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan(2019)->row_array();
	// 	$this->load->view("pengujian/spuser/cetak",$data);
		
 //      	$paper_size  = 'A4'; //paper size
 //        $orientation = 'landscape'; //tipe format kertas
 //        $html = $this->output->get_output();

 //        $this->dompdf->set_paper($paper_size, $orientation);
 //        //Convert to PDF
 //        $this->dompdf->load_html($html);
 //        $this->dompdf->render();
 //        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
	// }
	function cetak_pdf($tahun,$param=''){
		$pj = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian", "tanggal", $tahun)->result();
		$urldecode = urldecode($param);
		if ($param == '') {
				$data['row'] = $this->pengujian_model->get_all_data("tbl_kegiatan_pengujian","tanggal",$tahun)->result_array();
				$data['total'] = $this->pengujian_model->get_total_kegiatan($tahun)->row_array();
				$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan($tahun)->row_array();
				$this->load->view("pengujian/spuser/cetak",$data);
				
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
			if ($urldecode == $key->nama_pj) {
			$data['row'] = $this->pengujian_model->get_all_data2019("tbl_kegiatan_pengujian", "nama_pj", "tanggal", $urldecode, $tahun)->result_array();
			$data['total'] = $this->pengujian_model->get_total_kegiatan($urldecode)->row_array();
			$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan($urldecode)->row_array();
			$this->load->view("pengujian/spuser/cetak",$data);
			
	      	$paper_size  = 'A4'; //paper size
	        $orientation = 'landscape'; //tipe format kertas
	        $html = $this->output->get_output();

	        $this->dompdf->set_paper($paper_size, $orientation);
	        //Convert to PDF
	        $this->dompdf->load_html($html);
	        $this->dompdf->render();
	        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));	
			}	
			if ($urldecode == $key->nama_pj) {
				break;
			}
		}			
	}

	function cetak_pdf_sub(){
		$id = $this->input->get("id");
		$data['nama'] = $this->pengujian_model->get_data("tbl_kegiatan_pengujian","id_kegiatan",$id)->row_array();
		$data['total'] = $this->pengujian_model->get_total_kegiatan2($id)->row_array();
		$data['subtotal'] = $this->pengujian_model->get_total_subkegiatan2($id)->row_array();
		$data['row'] = $this->pengujian_model->get_subkegiatan($id)->result_array();
		$this->load->view("pengujian/spuser/cetak_sub",$data);
		
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
