<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Upload extends CI_Controller
{
 
	public function __construct()
	{
		parent::__construct();
			$this->load->model('model_users');
		  	$this->load->helper(array('form', 'url'));
	}
 
	public function index()
	{
		$unit=$this->session->userdata('unit');
		$data['list_label'] 	= $this->model_users->list_label();
		$data['total_label']	= $this->model_users->total_label();
		$data['bukti_evidence']	= $this->model_users->bukti_evidence($unit);
		$data['evidence']		= $this->model_users->evidence($unit);
		//print_r($data);
		$this->load->view('user/view_user', $data);
	}
 
	public function aksi_upload()
	{
		
		$hamid=$this->input->post('hamid');
		$unit=$this->session->userdata('unit');
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'pdf|xlsx|xls|csv|jpg|png|doc|docx|ppt|pptx';
		$config['max_size']      = '2048';
		$config['overwrite']	 = true;
 		$config['file_name']     = $unit.'-evidence-'.$hamid;

		$this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) 
        {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } 

        else 
        {
        	$hamid=$this->input->post('hamid');
       		$id_evidence=$this->input->post('id_evidence');
            $result = $this->upload->data();
            if($id_evidence==0){
            $data_evidence = array(
            	'unit'		=> $this->session->userdata('unit'),
            	'bukti'		=> $result['file_name']);
            	/*print_r($data_evidence);*/
            $this->model_users->tambah($data_evidence);
        	} else {
        		$data_evidence = array(
	            	'unit'		=> $this->session->userdata('unit'),
	            	'bukti'		=> $result['file_name']);
	            	/*print_r($data_evidence);*/
            	$this->model_users->ubah($data_evidence,$id_evidence);	
        	}
			redirect('upload'); 
		}
            echo "<pre>";
            //print_r($result);
            echo "</pre>";
        }
}
	
