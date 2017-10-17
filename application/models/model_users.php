<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_users extends CI_Model {
	
	public function login($username,$password)
	{

		//$query = $this->db->get_where('tb_admin', array('username' => $username,'password' => $password));
		$this->db->where('username', $username);
		$this->db->where('password like binary', $password);
		$query = $this->db->get('tb_admin');
		return $query->result();
	}

	public function cek_unit($unit)
	{
		$query = $this->db->query("SELECT * FROM tb_unit WHERE unit='$unit'");
		return $query->result();
	}

	public function cek_pegawai($nopeg)
	{
		$query = $this->db->get_where('tb_pegawai', array('nopeg' => $nopeg));
		return $query->result();
	}

	function tampil_data()
	{
		return $this->db->get('label');
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function edit_data($data_label,$id)
	{		
		$this->db->where('id',$id)
				 ->update('label',$data_label);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($id) 
	{
		//Query delete ... where id=...
		$this->db->where('id', $id)
				 ->delete('label');
	}

	public function list_label() 
	{
		$hasil = $this->db->query("SELECT * FROM label");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}

	public function hapus($id_choice) 
	{
		//Query delete ... where id=...
		$this->db->where('id_choice', $id_choice)
				 ->delete('multiple_choice');
	}

	public function tambah($data_inovasi){
		//Quert insert into
		$this->db->insert('evidence', $data_inovasi);
	}

	public function ubah($data_inovasi,$id_evidence){
		//Quert insert into
		$this->db->where('id_evidence', $id_evidence)
				 ->update('evidence',$data_inovasi);
	}

	function evidence($unit)
	{
 		$query = $this->db->query("SELECT * FROM evidence WHERE unit='$unit'");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

	function daftarunit()
	{
 		$query = $this->db->query("SELECT unit, COUNT(*) as jumlah FROM `evidence` GROUP by unit");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function bukti_evidence($sitacode)
 	{
 		$query = $this->db->query("SELECT * FROM evidence WHERE unit='$sitacode'");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function total_label()
 	{
 		$query = $this->db->query("SELECT COUNT(label) as Jumlah FROM label");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDC()
	{
 		$query = $this->db->query("
 			SELECT 'JKTCC'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCC' UNION 
 			SELECT 'JKTCG'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCG' UNION 
 			SELECT 'JKTCI'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCI' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDE()
	{
 		$query = $this->db->query("
 			SELECT 'JKTDE' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDE' UNION 
 			SELECT 'JKTML' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTML' UNION 
 			SELECT 'JKTMQ' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTMQ' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDF()
	{
 		$query = $this->db->query(" 
 			SELECT 'JKTWA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWA' UNION 
 			SELECT 'JKTWF' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWF' UNION 
 			SELECT 'JKTWL' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWL' UNION 
 			SELECT 'JKTWR' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWR'");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDG()
	{
 		$query = $this->db->query("
 			SELECT 'JKTGI' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGI' UNION 
 			SELECT 'JKTGC' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGC' UNION  
 			SELECT 'JKTGO' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGO' UNION
 			SELECT 'JKTGN' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGN' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitSHAAM()
	{
 		$query = $this->db->query("
 			SELECT 'SHAGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SHAGA' UNION
 			SELECT 'BJSGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BJSGA' UNION 
 			SELECT 'CANGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'CANGA' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitSINAM()
	{
 		$query = $this->db->query(" 			
 			SELECT 'BKKDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BKKDM' UNION 
 			SELECT 'SINDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SINDM' UNION
 			SELECT 'KULGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'KULGA' UNION
 			SELECT 'BOMGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BOMGA' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitTYOAM()
	{
 		$query = $this->db->query("
 			SELECT 'TYOGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TYOGA' UNION
 			SELECT 'HKGGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'HKGGA' UNION
 			SELECT 'OSAGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'OSAGA' UNION
 			SELECT 'HNDGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'HNDGA' UNION
 			SELECT 'SELGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SELGA' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDI()
	{
 		$query = $this->db->query(" 
 			SELECT 'JKTIB'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTIB' UNION 
 			SELECT 'JKTID'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTID' UNION 
 			SELECT 'JKTIG'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTIG' UNION
 			SELECT 'JKTVZ'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTVZ' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDN()
	{
 		$query = $this->db->query("
 			SELECT 'JKTCD'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCD' UNION
 			SELECT 'JKTNL'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTNL' UNION
 			SELECT 'JKTEC'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTEC' UNION			 
 			SELECT 'JKTNH'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTNH' UNION
 			SELECT 'JKTCM'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCM' UNION 
 			SELECT 'JKTRZ'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRZ' UNION
 			SELECT 'JKTMX'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTMX' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitJKTAM()
	{
 		$query = $this->db->query(" 
 			SELECT 'BDGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BDGDM' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitMESAM()
 	{
 		$query = $this->db->query("
 			SELECT 'MESDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MESDM' UNION
 			SELECT 'BTHDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BTHDM' UNION
 			SELECT 'BTJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BTJDM' UNION
 			SELECT 'PKUDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PKUDM' UNION
 			SELECT 'PDGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PDGDM' UNION
 			SELECT 'DJBDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DJBDM' UNION
 			SELECT 'TKGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TKGDM' UNION
 			SELECT 'PLMDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PLMDM' ");
 		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitSUBAM()
 	{
 		$query = $this->db->query("
 			SELECT 'SUBDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SUBDM' UNION
 			SELECT 'JOGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JOGDM' UNION
 			SELECT 'SRGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SRGDM' UNION
 			SELECT 'SOCDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SOCDM' UNION
 			SELECT 'DPSDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DPSDM' UNION
 			SELECT 'LOPDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'LOPDM' UNION
 			SELECT 'KOEDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'KOEDM' ");
 		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitUPGAM()
 	{
 		$query = $this->db->query("
 			SELECT 'UPGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'UPGDM' UNION
 			SELECT 'UPGSM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'UPGDM' UNION
 			SELECT 'MDCDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MDCDM' UNION
 			SELECT 'TTEDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TTEDM' UNION
 			SELECT 'PNKDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PNKDM' UNION
 			SELECT 'BDJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BDJDM' UNION 			
 			SELECT 'BPNDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BPNDM' UNION
 			SELECT 'SOQDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SOQDM' UNION
 			SELECT 'TIMDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TIMDM' UNION
 			SELECT 'DJJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DJJDM' ");
 		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDO()
	{
 		$query = $this->db->query("
 			SELECT 'JKTDO' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDO' UNION 
 			SELECT 'JKTOF' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTOF' UNION
 			SELECT 'JKTOS' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTOS' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDR()
	{
 		$query = $this->db->query("
 			SELECT 'JKTRN' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRN' UNION
 			SELECT 'JKTRG' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRG' UNION  
 			SELECT 'JKTDR' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDR' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function dirJKTDZ()
	{
 		$query = $this->db->query("
 			SELECT 'JKTDB' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDB' UNION 
 			SELECT 'JKTDH' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDH' UNION 
 			SELECT 'JKTDV' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDV' UNION 
 			SELECT 'JKTDA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDA' UNION
 			SELECT 'JKTDK' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDK' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitSYDAM()
	{
 		$query = $this->db->query("
 			SELECT 'SYDGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SYDGA' UNION 
 			SELECT 'PERGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PERGA' UNION
 			SELECT 'MELGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MELGA' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}
 	
 	function unitLON_AMS()
 	{
 		$query = $this->db->query("
 			SELECT 'LONDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'LONDM' UNION 
 			SELECT 'AMSDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'AMSDM' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function unitJED_MED()
 	{
 		$query = $this->db->query("
 			SELECT 'JEDDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JEDDM' UNION 
 			SELECT 'MEDDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MEDDM' ");
		if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		else
			{
				return array();
			}
 	}

 	function avgJKTDC()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTCC'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCC' UNION 
 			SELECT 'JKTCG'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCG' UNION 
 			SELECT 'JKTCI'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCI' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDE()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM( 
 			SELECT 'JKTML' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTML' UNION 
 			SELECT 'JKTMQ' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTMQ' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDF()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTWA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWA' UNION 
 			SELECT 'JKTWF' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWF' UNION 
 			SELECT 'JKTWL' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWL' UNION 
 			SELECT 'JKTWR' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTWR') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDG()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTGI' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGI' UNION 
 			SELECT 'JKTGC' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGC' UNION  
 			SELECT 'JKTGO' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGO' UNION
 			SELECT 'JKTGN' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTGN' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDI()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTIB'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTIB' UNION 
 			SELECT 'JKTID'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTID' UNION 
 			SELECT 'JKTIG'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTIG' UNION
 			SELECT 'JKTVZ'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTVZ') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDN()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTCD'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCD' UNION
 			SELECT 'JKTNL'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTNL' UNION
 			SELECT 'JKTEC'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTEC' UNION			 
 			SELECT 'JKTNH'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTNH' UNION
 			SELECT 'JKTCM'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTCM' UNION 
 			SELECT 'JKTRZ'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRZ' UNION
 			SELECT 'JKTMX'  as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTMX') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDO()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTOF' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTOF' UNION
 			SELECT 'JKTOS' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTOS' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTDR()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JKTRN' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRN' UNION
 			SELECT 'JKTRG' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTRG') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	} 	 

 	function avgJKTDZ()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM( 
 			SELECT 'JKTDB' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDB' UNION 
 			SELECT 'JKTDH' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDH' UNION 
 			SELECT 'JKTDV' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDV' UNION 
 			SELECT 'JKTDA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDA' UNION
 			SELECT 'JKTDK' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JKTDK' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJKTAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'BDGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BDGDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgMESAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'MESDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MESDM' UNION
 			SELECT 'BTHDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BTHDM' UNION
 			SELECT 'BTJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BTJDM' UNION
 			SELECT 'PKUDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PKUDM' UNION
 			SELECT 'PDGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PDGDM' UNION
 			SELECT 'DJBDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DJBDM' UNION
 			SELECT 'TKGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TKGDM' UNION
 			SELECT 'PLMDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PLMDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgSUBAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'SUBDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SUBDM' UNION
 			SELECT 'JOGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JOGDM' UNION
 			SELECT 'SRGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SRGDM' UNION
 			SELECT 'SOCDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SOCDM' UNION
 			SELECT 'DPSDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DPSDM' UNION
 			SELECT 'LOPDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'LOPDM' UNION
 			SELECT 'KOEDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'KOEDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgUPGAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'UPGDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'UPGDM' UNION
 			SELECT 'UPGSM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'UPGDM' UNION
 			SELECT 'MDCDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MDCDM' UNION
 			SELECT 'TTEDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TTEDM' UNION
 			SELECT 'PNKDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PNKDM' UNION
 			SELECT 'BDJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BDJDM' UNION 			
 			SELECT 'BPNDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BPNDM' UNION
 			SELECT 'SOQDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SOQDM' UNION
 			SELECT 'TIMDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TIMDM' UNION
 			SELECT 'DJJDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'DJJDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgSHAAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'SHAGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SHAGA' UNION
 			SELECT 'BJSGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BJSGA' UNION 
 			SELECT 'CANGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'CANGA') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgSINAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'BKKDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BKKDM' UNION 
 			SELECT 'SINDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SINDM' UNION
 			SELECT 'KULGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'KULGA' UNION
 			SELECT 'BOMGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'BOMGA' ) a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgTYOAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'TYOGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'TYOGA' UNION
 			SELECT 'HKGGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'HKGGA' UNION
 			SELECT 'OSAGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'OSAGA' UNION
 			SELECT 'HNDGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'HNDGA' UNION
 			SELECT 'SELGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SELGA') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgSYDAM()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'SYDGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'SYDGA' UNION 
 			SELECT 'PERGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'PERGA' UNION
 			SELECT 'MELGA' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MELGA') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgLON_AMS()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'LONDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'LONDM' UNION 
 			SELECT 'AMSDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'AMSDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}

 	function avgJED_MED()
 	{
 		$query = $this->db->query("SELECT a.Unit, avg(a.bukti) as Evidence FROM(
 			SELECT 'JEDDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'JEDDM' UNION 
 			SELECT 'MEDDM' as Unit, COUNT(bukti) as bukti FROM evidence WHERE unit = 'MEDDM') a");
 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		else
 		{
 			return array();
 		}
 	}   	  
}