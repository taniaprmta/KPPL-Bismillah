<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_users');
	}
	public function index()
	{
			$this->load->view('login');

	}

	public function unit()
	{
		$unit = $_POST['unit'];
		$data = $this->model_users->cek_unit($unit);
		if($data == null)
		{
			$message = "Kode unit tidak terdaftar ";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='".base_url("login")."';</script>";			
		}
		else
		{
			//if match
			foreach($data as $d);
				$newdata = array(
			    'unit'	 		=> $d->unit,

			);
			$this->session->set_userdata($newdata);
			redirect('upload');
		}
	}

	public function pegawai()
	{
		$nopeg = $_POST['nopeg'];
		//print_r($username);
		$data= $this->model_users->cek_pegawai($nopeg);
		if($data == null)
		{
			$message = "Anda tidak memiliki hak akses kehalaman ini";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='".base_url("login")."';</script>";		
		}
		else
		{
			//if match
			foreach($data as $d);
				$newdata = array(
			    'nopeg'	=> $d->nopeg,
			    'nama'  => $d->nama
			);
			$this->session->set_userdata($newdata);
			redirect('upload');
			//print_r("ada");	
		}
	}
}
