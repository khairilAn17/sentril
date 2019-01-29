<?php

class Penindakan_model extends CI_Model{

	public function delete_data($table,$id,$val){
		return $this->db->where($id,$val)->delete($table);
	}

	public function get_foto($nim){
		$this->db->select('foto')->from('pengurus')->where('nim',$nim);
		return $this->db->get();
	}

	public function update_data($table,$id,$val,$data){
		return $this->db->where($id,$val)->update($table,$data);
	}

	public function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}
	
	public function get_data($table,$id,$val){
		return $this->db->where($id,$val)->get($table);
	}

	function get_id_subkegiatan($table,$id_kegiatan, $jam, $ket, $tanggal ){
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->where('jam', $jam);
		$this->db->where('keterangan',$ket);
		$this->db->where('tanggal_kegiatan', $tanggal);
		$query = $this->db->get($table);
		return $query->row();

	}
	
	public function get_all_data($table,$field, $var){
		$this->db->LIKE($field, $var, 'both');
		return $this->db->get($table);
	}
	public function get_all_data2019($table,$field,$field2,$var, $var2){
		$this->db->LIKE($field, $var, 'both');
		$this->db->LIKE($field2, $var2, 'both');
		return $this->db->get($table);
	}
	function get_all_data_user($table, $unit){
		$this->db->where('unit',$unit);
		return $this->db->get($table);
	}
	function get_all_data_2018(){
		$query = $this->db->query("SELECT * FROM tbl_kegiatan_penindakan WHERE tanggal LIKE '_2018'");
	}
	public function get_data_id($id)
	{
		$this->db->select('*')->from('tbl_berita')->where('id_berita',$id);
		return $this->db->get();
	}


	function cari_kegiatan($id){
		return $this->db->select('*')->from('tbl_kegiatan_penindakan')
			->join('tbl_subkegiatan_penindakan','tbl_kegiatan_penindakan.id_kegiatan=tbl_subkegiatan_penindakan.id_kegiatan')
			->where('tbl_kegiatan_penindakan.id_kegiatan',$id)->where('status','terverifikasi')->get();
	}

	function get_subkegiatan($id){
		return $this->db->where(array('id_kegiatan'=>$id,'status'=>'terverifikasi'))->get('tbl_subkegiatan_penindakan');
	}


	function get_kegiatan($id){
		return $this->db->where('id_kegiatan',$id)->get('tbl_kegiatan_penindakan');
	}


	function update_kegiatan($data,$id){
		return $this->db->where('id_kegiatan',$id)->update('tbl_kegiatan_penindakan',$data);
	}

	function get_file_sub($id){
		return $this->db->select('file')->where('id_subkegiatan',$id)->get('tbl_subkegiatan_penindakan');
	}
	function get_file_keg($id){
		return $this->db->select('file')->where('id_kegiatan',$id)->get('tbl_subkegiatan_penindakan');
	}
	function get_user($id){
		return $this->db->where('username',$id)->get('tbl_user');
	}

	function update_user($data,$id){
		return $this->db->where('id_user',$id)->update('tbl_user', $data);
	}

	function get_file_date($limit, $offset){
		return $this->db->select('tanggal_input')->from('tbl_subkegiatan_penindakan')->group_by('tanggal_input')->order_by('tanggal_input','desc')->where('status','terverifikasi')->limit($limit,$offset)->get();
	}

	function get_file_total(){
		return $this->db->select('tanggal_kegiatan')->from('tbl_subkegiatan_penindakan')->group_by('tanggal_kegiatan')->order_by('tanggal_kegiatan','desc')->where('status','terverifikasi')->get();
	}
	function get_file($date){
		return $this->db->where('tanggal_input',$date)->get('tbl_subkegiatan_penindakan');
	}


	function get_kegiatan_su(){
		return $this->db->query("SELECT *,tbl_kegiatan_penindakan.anggaran as anggaran2,count(tbl_subkegiatan_penindakan.anggaran) as realisasi2, sum(tbl_subkegiatan_penindakan.anggaran) as jlh_anggaran FROM `tbl_kegiatan_penindakan` join tbl_subkegiatan_penindakan on tbl_kegiatan_penindakan.id_kegiatan=tbl_subkegiatan_penindakan.id_kegiatan where status='terverifikasi' group by tbl_kegiatan_penindakan.id_kegiatan");
	}


	function get_total_subkegiatan($tahun){
		return $this->db->query("select sum(anggaran) as sisa_anggaran from tbl_subkegiatan_penindakan where status='terverifikasi' AND tahun LIKE '%$tahun%'");
	}

	function get_total_subkegiatan2($id){
		return $this->db->query("select sum(anggaran) as sisa_anggaran from tbl_subkegiatan_penindakan where status='terverifikasi' and id_kegiatan='$id'");
	}

	function get_total_kegiatan($tahun){
		return $this->db->query("select count(id_kegiatan) as total_kegiatan, sum(anggaran) as total_anggaran from tbl_kegiatan_penindakan WHERE tanggal LIKE  '%$tahun%'");
	}
	

	function get_total_kegiatan2($id){
		return $this->db->query("select count(id_kegiatan) as total_kegiatan, sum(anggaran) as total_anggaran from tbl_kegiatan_penindakan where id_kegiatan='$id'");
	}
	function get_datetime(){
		$query = $this->db->query("SELECT tanggal FROM tbl_kegiatan_penindakan");
		return $query->result();
	}
	function get_group($tahun){
		$query =  $this->db->query("SELECT * FROM tbl_kegiatan_penindakan WHERE tanggal LIKE '%$tahun%' GROUP BY(nama_pj)");
		return $query->result();
	}
}