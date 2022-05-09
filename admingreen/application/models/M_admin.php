<?php

class M_admin extends CI_Model
{

	function tampil_penjemputan()
	{
		$query = $this->db->get('order');
		return $query->result();
	}
	function tampil_datamember()
	{
		$query = $this->db->get('member');
		return $query->result();
	}
	function tampil_promo()
	{
		$query = $this->db->get('kupon');
		return $query->result();
	}
	function input_promo($data)
	{
		$this->db->insert('kupon', $data);
	}
	function tampil_presensi()
	{
		$query = $this->db->get('presensi');
		return $query->result();
	}
	function tampil_karyawan()
	{
		$query = $this->db->get('karyawan');
		return $query->result();
	}
	function input_karyawan($data)
	{
		$this->db->insert('karyawan', $data);
	}
	function detail_penjemputan($id_order){
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('order');
		return $query->row();
	}
	function hapus_penjemputan($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_penjemputan($where, $table) {
		return $this->db->get_where($table, $where);
	}
	function update_penjemputan($where,$data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function jumlah_member(){
		$this->db->select('count(id_member) as jumlah_member');
		$query = $this->db->get('member');
		if($query->result()){	
			return $query->result();
		}else{
			$res = (object) array('jumlah_member' => 0);
			$result = array("0"=>$res);
			return $result;
		}
	}
	function jumlah_pemasukan(){
		$this->db->select('sum(harga) as jumlah_pemasukan');
		$query = $this->db->get('order');
		if($query->result()){	
			return $query->result();
		}else{
			$res = (object) array('jumlah_pemasukan' => 0);
			$result = array("0"=>$res);
			return $result;
		}
	}
	function jumlah_penjemputan(){
		$this->db->select('count(id_member) as jumlah_penjemputan');
		$query = $this->db->get('order');
		if($query->result()){	
			return $query->result();
		}else{
			$res = (object) array('jumlah_penjemputan' => 0);
			$result = array("0"=>$res);
			return $result;
		}
	}
	function jumlah_kehadiran(){
		$this->db->select('count(id_karyawan) as jumlah_kehadiran');
		$this->db->where('waktu_hadir', date('Y-m-d'));
		$query = $this->db->get('presensi');
		if($query->result()){	
			return $query->result();
		}else{
			$res = (object) array('jumlah_kehadiran' => 0);
			$result = array("0"=>$res);
			return $result;
		}
	}
}
