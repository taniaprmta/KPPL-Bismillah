<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('model_users');
		//$this->load->model('demografi_model');
	}
	public function index()
	{
		//$data['judul']  		 = $this->model_users->judul();
		$data['list_parent']  	 = $this->model_users->list_parent();
		$data['list_pertanyaan'] = $this->model_users->list_pertanyaan();
		$data['list_label'] 	 = $this->model_users->list_label();
		$data['daftarunit']		 = $this->model_users->daftarunit();

		$this->load->view('user/view_user',$data);
	}

	/*public function isi_survey(){
		$this->form_validation->set_rules('id_question', 'Pertanyaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$b = (sizeof($this->input->post())-1)/3;
			$c = 0;
			for ($i=0; $i < $b ; $i++) { 
			if ($this->input->post('type'.$i)=='skala'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $this->input->post('nilai'.$i),
					'input'					=> $c
				);
			}
			elseif ($this->input->post('type'.$i)=='input'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
			}	
			elseif ($this->input->post('type'.$i)=='textarea'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
			}
			$this->model_users->tambah_survey($data_aksi);
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			}
		}
		redirect('user');
	}*/

	/*public function action_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}*/

	/*public function action_top2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}*/

	/*public function action_top3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}*/

	/*public function action_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}*/

	/*public function action_bottom2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}*/

	/*public function action_bottom3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}*/

	
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	/*public function monitor()
	{	
		$unit = $this->session->userdata('unit');
		$data['monitoring_vp'] = $this->model_users->monitoring_vp($unit);
		$data['monitoring_dir'] = $this->model_users->monitoring_dir($unit);
		$data['daftar_aksivp'] = $this->model_users->daftar_aksivp($unit);
		$data['daftar_aksidir'] = $this->model_users->daftar_aksidir($unit);
		//print_r($data);
		$this->load->view('user/monitoring', $data);
	}*/

	/*public function cetak(){
		$unit = $this->session->userdata('unit');
		
		if ($this->session->userdata('level')=='MGR'){ 
			$data['mgrsm'] = $this->model_users->mgrsm($unit);
			$data['mgrvp'] = $this->model_users->mgrvp($unit);
			$data['mgrdir'] = $this->model_users->mgrdir($unit);
		}
		elseif ($this->session->userdata('level')=='SM'){
			$data['smvp'] = $this->model_users->smvp($unit);
			$data['smdir'] = $this->model_users->smdir($unit);
		}
		elseif ($this->session->userdata('level')=='VP'){ 
			$data['vpdir'] = $this->model_users->vpdir($unit);
		}
		else{ 
			$data['dir'] = $this->model_users->dir();
		}
		$data['corporate'] = $this->model_users->corporate();
		$data['score'] = $this->model_users->nilaiku($unit);
		$data['level'] = $this->model_users->levelku($unit);
		$data['nilai_dimensi'] = $this->model_users->nilai_dimensi($unit);
		$data['direktur'] = $this->model_users->direktur();
		$data['cek_bottom'] = $this->model_users->cek_bottom($unit);
		$data['cek_top'] = $this->model_users->cek_top($unit);
		//Demografi
		$data['gender'] = $this->demografi_model->gender();
		$data['lokasi'] = $this->demografi_model->lokasi();
		$data['pendidikan'] = $this->demografi_model->pendidikan1();
		$data['posisi'] = $this->demografi_model->posisi();
		$data['profesi'] = $this->demografi_model->profesi();
		$data['usia'] = $this->demografi_model->usia1();
		$data['generasi'] = $this->demografi_model->generasi1();
		$data['status'] = $this->demografi_model->status1();
		$data['Hpendidikan'] = $this->demografi_model->Hpendidikan1();
		$data['Hposisi'] = $this->demografi_model->Hposisi1();
		$data['Hprofesi'] = $this->demografi_model->Hprofesi1();
		$data['Hstatus'] = $this->demografi_model->Hstatus1();
		$data['Husia'] = $this->demografi_model->Husia1();
		$data['Hgenerasi'] = $this->demografi_model->Hgenerasi1();
		//$data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('export_user', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "MyDashboard.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');

        $mpdf = new mPDF('utf-8', 'A4', '', '', '0', '0', '0', '0', '7', '7');

		$mpdf->useSubstitutions = true;
		$mpdf->simpleTables = true;
		$mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLHeader($headerEven, 'E');
        $mpdf->SetHTMLFooter($footer);
        $mpdf->SetHTMLFooter($footer, 'E');
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->autoMarginPadding = 0;
		$mpdf->SetDisplayMode('fullpage');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
        redirect('user');
	}*/

	/*public function edit()
	{
		$unit = $this->session->userdata('unit');
		$data['list_staf'] = $this->model_users->list_staf($unit);
		$data['list_vp'] = $this->model_users->list_vp($unit);
		$data['aksi'] = $this->model_users->tampil_aksi($unit);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($unit);				
		//print_r($data);
		$this->load->view('user/edit_aksi',$data);
	}*/

	/*public function progres()
	{
		$penanggung_jawab = $this->session->userdata('penanggung_jawab');
		$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab);			
		//print_r($data);
		$this->load->view('user/progres',$data);
	}*/

	/*public function update_progres($id_aksi){
		$this->form_validation->set_rules('progres');
		$this->form_validation->set_rules('keterangan');

		if ($this->form_validation->run() == FALSE){
			$penanggung_jawab = $this->session->userdata('penanggung_jawab');
			$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab);
			$this->load->view('user/progres', $data);
		}
		else {
				$data_progres = array(
						'progres'				=> set_value('progres'),
						'keterangan'			=> set_value('keterangan')
				);
				$this->model_users->update_progres($id_aksi, $data_progres);
				redirect('user/progres');
			}
	
	}*/

	
	

	public function proses(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/view_user');
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv|pdf'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("user/view_user")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 1; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_users->simpan($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("user")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}

	public function tambah(){
		//sebelum mengeksekusi query
		//$data['bobot'] = $this->model_users->bobot(0);
		$this->form_validation->set_rules('nip1');
		$this->form_validation->set_rules('nama1');
		$this->form_validation->set_rules('nip2');
		$this->form_validation->set_rules('nip3');
		$this->form_validation->set_rules('nip4');
		$this->form_validation->set_rules('kategori');
		$this->form_validation->set_rules('judul');
		$this->form_validation->set_rules('latar_belakang');
		$this->form_validation->set_rules('deskripsi');
		$this->form_validation->set_rules('cost_saving');
		$this->form_validation->set_rules('revenue');
		$this->form_validation->set_rules('waktu');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/view_user',$data);
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'pdf|xlsx|xls|csv|jpg|png|doc|docx|ppt|pptx'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
		         $config['file_name']      = 'evidence-'.trim(str_replace(" ","",date('dmYHis')));
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    var_dump($error);
					}
					else {
						$gambar = $this->upload->data();
						$data_inovasi = array(
								/*'nip1'				=> $this->session->userdata('nopeg'),
								'nip2'				=> $this->input->post('nip2'),
								'nip3'				=> $this->input->post('nip3'),
								'nip4'				=> $this->input->post('nip4'),
								'nama1'				=> $this->session->userdata('nama'),
								'kategori'			=> $this->input->post('kategori'),
								'judul'				=> $this->input->post('judul'),
								'latar_belakang'	=> $this->input->post('latar_belakang'),
								'deskripsi'			=> $this->input->post('deskripsi'),
								'cost_saving'		=> $this->input->post('cost_saving'),
								'revenue'			=> $this->input->post('revenue'),
								'waktu'				=> $this->input->post('waktu'),*/
								'bukti_1'			=> $gambar['file_name']
						);
						$this->model_users->tambah($data_inovasi);
						redirect('user'); 
						}
					}
			/*else {
				//form submit dengan gambar dikosongkan
				$data_inovasi = array(
						'nip1'				=> $this->session->userdata('nopeg'),
						'nip2'				=> $this->input->post('nip2'),
						'nip3'				=> $this->input->post('nip3'),
						'nip4'				=> $this->input->post('nip4'),
						'nama1'				=> $this->session->userdata('nama'),
						'kategori'			=> $this->input->post('kategori'),
						'judul'				=> $this->input->post('judul'),
						'latar_belakang'	=> $this->input->post('latar_belakang'),
						'deskripsi'			=> $this->input->post('deskripsi'),
						'cost_saving'		=> $this->input->post('cost_saving'),
						'revenue'			=> $this->input->post('revenue'),
						'waktu'				=> $this->input->post('waktu')
				);
				$this->model_users->tambah($data_inovasi);
				redirect('user'); 
			}*/
		}
	}

	public function simpan(){
	   	if($this->input->post('submit')){
	             $config['upload_path']    = "./uploads/";
	             $config['allowed_types']  = 'pdf|xlsx|xls|csv|jpg|png|doc|docx|ppt|pptx	';
	             $config['max_size']       = '2000';
	             $config['max_width']      = '2000';
	             $config['max_height']     = '2000';
	             $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
	             $this->load->library('upload', $config);
	                
	            if (!$this->upload->do_upload("userfile")) {
	                 echo "Error";
	            }else{
	               echo "Data berhasil terupload";
	            }    
	  	}
	}

	public function aksi_upload(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
 
		$this->load->library('upload', $config); 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/view_user', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('user/view_user', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */