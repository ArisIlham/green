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
}
