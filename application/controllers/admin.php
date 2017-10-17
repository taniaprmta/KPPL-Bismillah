<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_users');
	}
	public function index()
	{		
		//print_r($data);
		$data['total_label']	= $this->model_users->total_label();
		$data['label'] 		= $this->model_users->tampil_data()->result();
		$data['list_label'] = $this->model_users->list_label();
		$data['daftarunit'] = $this->model_users->daftarunit();
		$data['dirJKTDC']	= $this->model_users->dirJKTDC();
		$data['dirJKTDE']	= $this->model_users->dirJKTDE();
		$data['dirJKTDF']	= $this->model_users->dirJKTDF();
		$data['dirJKTDG']	= $this->model_users->dirJKTDG();
		$data['unitSHAAM']	= $this->model_users->unitSHAAM();
		$data['unitSINAM']	= $this->model_users->unitSINAM();
		$data['unitTYOAM']	= $this->model_users->unitTYOAM();
		$data['unitJKTAM']	= $this->model_users->unitJKTAM();
		$data['unitMESAM']	= $this->model_users->unitMESAM();
		$data['unitSUBAM']	= $this->model_users->unitSUBAM();
		$data['unitUPGAM']	= $this->model_users->unitUPGAM();
		$data['unitSYDAM']	= $this->model_users->unitSYDAM();
		$data['unitLON_AMS'] = $this->model_users->unitLON_AMS();
		$data['unitJED_MED'] = $this->model_users->unitJED_MED();
		$data['dirJKTDI']	= $this->model_users->dirJKTDI();
		$data['dirJKTDN']	= $this->model_users->dirJKTDN();
		$data['dirJKTDO']	= $this->model_users->dirJKTDO();
		$data['dirJKTDR']	= $this->model_users->dirJKTDR();
		$data['dirJKTDZ']	= $this->model_users->dirJKTDZ();
		$data['avgJKTDC']	= $this->model_users->avgJKTDC();
		$data['avgJKTDE']	= $this->model_users->avgJKTDE();
		$data['avgJKTDF']	= $this->model_users->avgJKTDF();
		$data['avgJKTDG']	= $this->model_users->avgJKTDG();
		$data['avgJKTDI']	= $this->model_users->avgJKTDI();
		$data['avgJKTDN']	= $this->model_users->avgJKTDN();
		$data['avgJKTDO']	= $this->model_users->avgJKTDO();
		$data['avgJKTDR']	= $this->model_users->avgJKTDR();
		$data['avgJKTDZ']	= $this->model_users->avgJKTDZ();
		$data['avgJKTAM']	= $this->model_users->avgJKTAM();
		$data['avgMESAM']	= $this->model_users->avgMESAM();
		$data['avgSUBAM']	= $this->model_users->avgSUBAM();
		$data['avgUPGAM']	= $this->model_users->avgUPGAM();
		$data['avgSHAAM']	= $this->model_users->avgSHAAM();
		$data['avgSINAM']	= $this->model_users->avgSINAM();
		$data['avgTYOAM']	= $this->model_users->avgTYOAM();
		$data['avgSYDAM']	= $this->model_users->avgSYDAM();
		$data['avgLON_AMS'] = $this->model_users->avgLON_AMS();
		$data['avgJED_MED'] = $this->model_users->avgJED_MED();
		$this->load->view('admin/view_admin',$data);
	}

	public function tambah_label()
	{		
		$label = $this->input->post('label');
 	
		$data = array('label' => $label);
		$this->model_users->input_data($data,'label');
		redirect('admin');
	}

	function edit($id)
	{
		//$id = $this->input->post('id');
		$data_label= array(
			'label' => $this->input->post('label'), 
		);
		$this->model_users->edit_data($data_label,$id);
		redirect('admin');
	}

	function update()
	{
		$id = $this->input->post('id');
		$label = $this->input->post('label');
	 
		$data = array('label' => $label); 
		$where = array('id' => $id);
	 
		$this->model_users->update_data($where,$data,'label');
		redirect('admin');
	}

	public function delete($id){
		$this->model_users->delete($id);
		redirect('admin');
	}
 		
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin_login');
	}
}