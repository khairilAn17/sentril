<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
		$this->load->model('infokom_model','',true);
		$this->load->helper(array('form','file','akses'),'',true);
		$this->load->library('dompdf_gen');  
		
		cek_petugas();
    cek_infokom();
	}
	
	public function index()
	{
		$this->load->view('infokom/public/templates/header_home');
		$this->load->view('infokom/public/home');
		$this->load->view('infokom/public/templates/footer_home');
	}

	public function kegiatan()
	{
    $tahun = date('Y');
		$data['total'] = $this->infokom_model->get_total_kegiatan($tahun)->row_array();
		$data['subtotal'] = $this->infokom_model->get_total_subkegiatan($tahun)->row_array();
		$data['row'] = $this->infokom_model->get_all_data("tbl_kegiatan_infokom", "tanggal", $tahun)->result_array();
    $data['group'] = $this->infokom_model->get_group($tahun);
    $this->session->set_flashdata('tahun', $tahun);
		//var_dump($data);die;
		$this->load->view('infokom/public/templates/header_table');
		$this->load->view('infokom/public/kegiatan',$data);
		$this->load->view('infokom/public/templates/footer_table');
	}

	public function cari_kegiatan(){
		//$data['row'] = $this->infokom_model->get_all_data("tbl_kegiatan_infokom")->result_array();
		//var_dump($data);die;
		$this->load->view('infokom/public/templates/header_insert');
		$this->load->view('infokom/public/cari_kegiatan');
		$this->load->view('infokom/public/templates/footer_insert');
		$this->load->view('infokom/public/cari_kegiatan_script');
	}
	function proses_cari($id){
		
		$kegiatan =  $this->infokom_model->cari_kegiatan($id);
		
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
		$data['total'] = $this->infokom_model->get_total_kegiatan2($id)->row_array();
		$data['subtotal'] = $this->infokom_model->get_total_subkegiatan2($id)->row_array();
		$data['row'] = $this->infokom_model->get_subkegiatan($id)->result_array();
		$this->load->view('infokom/public/cari_kegiatan_ajax',$data);
	}

	// function print_laporan(){
 //    $this->load->library('PHPExcel');

 //     $this->phpexcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal : '.date('d-m-Y'))
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
 //    $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension('A')->setAutoSize(true);
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

 //        $detail = $this->infokom_model->get_all_data("tbl_kegiatan_infokom")->result_array();
 //    $total = $this->infokom_model->get_total_kegiatan()->row_array();
 //    $subtotal = $this->infokom_model->get_total_subkegiatan()->row_array();

 //    $row=3;
 //    foreach($detail as $data){
 //        $this->phpexcel->setActiveSheetIndex(0)
 //            ->setCellValue('A' . $row, $data['id_kegiatan'])
 //            ->setCellValue('B' . $row, $data['nama_kegiatan'])
 //            ->setCellValue('C' . $row, $data['target'])
 //            ->setCellValue('D' . $row, $data['realisasi'])
 //            ->setCellValue('E' . $row, ($data['sisa_target']))
 //            ->setCellValue('F' . $row, ("Rp. ".number_format($data['anggaran'],0,'','.')))
 //            ->setCellValue('G' . $row, ("Rp. ".number_format($data['realisasi_anggaran'],0,'','.')))
 //            ->setCellValue('H' . $row, ("Rp.".number_format($data['sisa_anggaran'],0,'','.')))
 //            ->setCellValue('I' . $row, $data['tanggal'])
 //            ->setCellValue('J' . $row, $data['lokasi'])
 //            ->setCellValue('K' . $row, $data['nama_pj'])
 //            ->setCellValue('L' . $row, $data['keterangan']);

 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A'.$row.':L'.$row)->applyFromArray($styleDefault);
 //       $row++;
 //    }

 //      // set style
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:L2')->applyFromArray($styleTop);
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('L2:L'.($row-1))->applyFromArray($styleRight);
 //        $this->phpexcel->setActiveSheetIndex(0)->getStyle('A2:A'.($row-1))->applyFromArray($styleLeft);
 //     $this->phpexcel->setActiveSheetIndex(0)->getStyle('A' . ($row-1).':L'.($row-1))->applyFromArray($styleBottom);

 //        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 //        header('Content-Disposition: attachment;filename="'.date('d-m-Y').'-laporan-kegiatan.xlsx"');
 //        header('Cache-Control: max-age=0');
 //        // output
 //        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
 //        $obj_writer->save('php://output');
 //  }

  function print_laporan2019($param=''){
    $this->load->library('PHPExcel');
    $pj = $this->infokom_model->get_all_data("tbl_kegiatan_infokom", "tanggal", 2019)->result();
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

              $detail = $this->infokom_model->get_all_data2019("tbl_kegiatan_infokom", "nama_pj","tanggal", $param, 2019)->result_array();
          $total = $this->infokom_model->get_total_kegiatan(2019)->row_array();
          $subtotal = $this->infokom_model->get_total_subkegiatan(2019)->row_array();

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

              $detail = $this->infokom_model->get_all_data2019("tbl_kegiatan_infokom", "nama_pj","tanggal", $param, 2019)->result_array();
          $total = $this->infokom_model->get_total_kegiatan(2019)->row_array();
          $subtotal = $this->infokom_model->get_total_subkegiatan(2019)->row_array();

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

        $detail = $this->infokom_model->get_subkegiatan($id)->result_array();
    $total = $this->infokom_model->get_total_kegiatan(2019)->row_array();
    $subtotal = $this->infokom_model->get_total_subkegiatan(2019)->row_array();

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
  //   $data['row'] = $this->infokom_model->get_all_data("tbl_kegiatan_infokom")->result_array();
  //   $data['total'] = $this->infokom_model->get_total_kegiatan()->row_array();
  //   $data['subtotal'] = $this->infokom_model->get_total_subkegiatan()->row_array();
  //   $this->load->view("infokom/spuser/cetak",$data);
    
  //       $paper_size  = 'A4'; //paper size
  //       $orientation = 'landscape'; //tipe format kertas
  //       $html = $this->output->get_output();

  //       $this->dompdf->set_paper($paper_size, $orientation);
  //       //Convert to PDF
  //       $this->dompdf->load_html($html);
  //       $this->dompdf->render();
  //       $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
  // }

  function cetak_pdf($tahun,$param=''){
    $pj = $this->infokom_model->get_all_data("tbl_kegiatan_infokom", "tanggal", $tahun)->result();
    $urldecode = urldecode($param);
    if ($param == '') {
        $data['row'] = $this->infokom_model->get_all_data("tbl_kegiatan_infokom","tanggal",$tahun)->result_array();
        $data['total'] = $this->infokom_model->get_total_kegiatan($tahun)->row_array();
        $data['subtotal'] = $this->infokom_model->get_total_subkegiatan($tahun)->row_array();
        $this->load->view("infokom/spuser/cetak",$data);
        
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
      $data['row'] = $this->infokom_model->get_all_data2019("tbl_kegiatan_infokom", "nama_pj", "tanggal", $urldecode, $tahun)->result_array();
      $data['total'] = $this->infokom_model->get_total_kegiatan($tahun)->row_array();
      $data['subtotal'] = $this->infokom_model->get_total_subkegiatan($tahun)->row_array();
      $this->load->view("infokom/spuser/cetak",$data);
      
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
    $data['nama'] = $this->infokom_model->get_data("tbl_kegiatan_infokom","id_kegiatan",$id)->row_array();
    $data['total'] = $this->infokom_model->get_total_kegiatan2($id)->row_array();
    $data['subtotal'] = $this->infokom_model->get_total_subkegiatan2($id)->row_array();
    $data['row'] = $this->infokom_model->get_subkegiatan($id)->result_array();
    $this->load->view("infokom/spuser/cetak_sub",$data);
    
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
