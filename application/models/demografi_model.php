<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class demografi_model extends CI_Model {
	


	public	function direktorat(){
		$query = $this->db->query("SELECT tb_pegawai.direktorat, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG WHERE tb_pegawai.perusahaan='PT Gapura Angkasa' GROUP BY tb_pegawai.direktorat");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	public	function gender(){
		$query = $this->db->query("SELECT a.gender, COUNT(*) as Jumlah FROM tb_pegawai a JOIN tb_respon b on a.nopeg = b.nopeg GROUP BY a.gender");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	public	function pendidikan(){
		$query = $this->db->query("SELECT tb_pegawai.PENDIDIKAN, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.PENDIDIKAN");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function lokasi (){
		$query = $this->db->query("SELECT a.lokasi, COUNT(*) as Jumlah FROM tb_pegawai a JOIN tb_respon b on a.nopeg = b.nopeg GROUP BY a.lokasi");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function posisi(){
		$query = $this->db->query("SELECT a.posisi, COUNT(*) as Jumlah FROM tb_pegawai a JOIN tb_respon b on a.nopeg = b.nopeg GROUP BY a.posisi");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function profesi(){
		$query = $this->db->query("SELECT a.profesi, COUNT(*) as Jumlah FROM tb_pegawai a JOIN tb_respon b on a.nopeg = b.nopeg GROUP BY a.profesi");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function usia(){
		$query = $this->db->query("select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 18 and 30) a UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 31 and 40) b UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 41 and 50) c UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 51 and 58) d UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age > 58) e");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function generasi(){
		$query = $this->db->query("select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 53 and 72) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 37 and 54) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 23 and 38) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 18 and 22) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public	function pendidikan1(){
		$query = $this->db->query("SELECT tb_pegawai.pendidikan, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg GROUP BY tb_pegawai.pendidikan");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function usia1(){
		$query = $this->db->query("SELECT '18-30' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 18 and 30) a
			UNION
			SELECT '31-40' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 31 and 40) b
			UNION
			SELECT '41-50' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 41 and 50) c
			UNION
			SELECT '51-58' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 51 and 58) d 
			UNION
			SELECT '>58' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) >58) e");
					if($query->num_rows() > 0){
						return $query->result();
		}
		else{
			return array();
		}
	}

	public function status1(){
		$query = $this->db->query("SELECT tb_pegawai.status_pegawai, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}



	public function generasi1(){
		$query = $this->db->query("SELECT 'Baby Boomers' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 57 and 72) a
			UNION
			SELECT 'X' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 37 and 56) b
			UNION
			SELECT 'Y' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 22 and 36) c
			UNION
			SELECT 'Z' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 18 and 21) d");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function Hpendidikan1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Hasil FROM (SELECT tb_pegawai.pendidikan, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg GROUP BY tb_pegawai.pendidikan) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function Hposisi1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Hasil FROM (SELECT tb_pegawai.posisi, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg GROUP BY tb_pegawai.posisi) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function Hprofesi1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Hasil FROM (SELECT tb_pegawai.profesi, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg GROUP BY tb_pegawai.profesi) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function Hstatus1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Hasil FROM (SELECT tb_pegawai.status_pegawai, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg GROUP BY tb_pegawai.status_pegawai) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function Husia1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Jumlah FROM (SELECT '18-30' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 18 and 30) a
			UNION
			SELECT '31-40' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 31 and 40) b
			UNION
			SELECT '41-50' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 41 and 50) c
			UNION
			SELECT '51-58' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 51 and 58) d 
			UNION
			SELECT '>58' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) >58) e) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function Hgenerasi1(){
		$query = $this->db->query("SELECT SUM(Jumlah) as Jumlah FROM (SELECT 'Baby Boomers' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 57 and 72) a
			UNION
			SELECT 'X' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 37 and 56) b
			UNION
			SELECT 'Y' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 22 and 36) c
			UNION
			SELECT 'Z' as umur, COUNT(*) as Jumlah FROM (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) FROM tb_pegawai JOIN tb_respon on tb_respon.nopeg = tb_pegawai.nopeg WHERE YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) BETWEEN 18 and 21) d) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

}