<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_model extends CI_Model 
{
	function getMinggu1()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-01');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function getMinggu2()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-02');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-08');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function getMinggu3()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-09');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-15');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function getMinggu4()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-16');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-22');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function getMinggu5()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-23');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-29');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function getMinggu6()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-30');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-31');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function ideperusahaan()
	{
		$query = $this->db->query("
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'GIH France S.A.S'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Aero Systems Indonesia'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Aero Wisata'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Citilink Indonesia'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Gapura Angkasa'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Garuda Maintenance Facility Aero Asia'
			UNION
			SELECT tb_pegawai.perusahaan, COUNT(*) as Jumlah FROM tb_pegawai INNER JOIN tb_inovasi ON nip1=nopeg WHERE tb_pegawai.perusahaan = 'PT Sabre Travel Network Indonesia'");

			if($query->num_rows() > 0)
				{
					return $query->result();
				}
			else
				{
					return array();
				}	
	}
	
	function idekategori()
	{
		$query = $this->db->query("Select kategori, Count(*) As Jumlah From tb_inovasi Group By kategori");
		if($query->num_rows() > 0)
			{
				return $query->result();
			}
		else
			{
				return array();
			}	
	}

	function idetotal()
	{
		$query = $this->db->query("SELECT COUNT(*) as Jumlah FROM tb_inovasi");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
	}

	function totalcost()
	{
		$query = $this->db->query("SELECT SUM(cost_saving) as Jumlah FROM tb_inovasi");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
	}

	function totalrevenue()
	{
		$query = $this->db->query("SELECT SUM(revenue) as Jumlah FROM tb_inovasi");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
	}

	function totalpegawai()
	{
		$query = $this->db->query("SELECT COUNT(*) as Jumlah FROM tb_pegawai");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
	}

	function list1()
	{
		$this->db->select("nip1, nama1, kategori, judul, waktu_pengumpulan, tb_pegawai.perusahaan");
    	$this->db->from('tb_inovasi');
    	$this->db->join('tb_pegawai','tb_inovasi.nip1 = tb_pegawai.nopeg', 'inner');
    	$this->db->order_by('tb_inovasi.waktu_pengumpulan', 'desc');
    	$query = $this->db->get();
    	return $query->result();

	}

	function bulanJuli()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-07-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-07-31');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function bulanAgus()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-08-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-08-31');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function bulanSept()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-09-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-09-30');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function bulanOkt()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-10-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-10-31');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function bulanNov()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-11-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-11-30');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}

	function bulanDes()
		{
 			$this->db->where('waktu_pengumpulan >=', '2017-12-01');
 			$this->db->where('waktu_pengumpulan <=', '2017-12-31');
 			$query = $this->db->get('tb_inovasi');
 			return $query->num_rows();
		}	
}