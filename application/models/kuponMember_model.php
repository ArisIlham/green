<?php defined('BASEPATH') or exit('No direct script access allowed');

class kuponMember_model extends CI_Model
{
    private $_table = "kupon_member";
    public $id_kupon_member;
    public $id_member;
    public $id_kupon;
    public $kode_kupon;
    public $judul_kupon;
    public $persentase_diskon;
    public $min_laundry;
    public $masa_berlaku;
    public $terpakai;

    public function addKupon($kupon, $id_member)
    {
        $this->id_kupon_member = uniqid();
        $this->id_member = $id_member;
        $this->id_kupon = $kupon["id_kupon"];
        $this->kode_kupon = $kupon["kode_kupon"];
        $this->judul_kupon = $kupon["judul_kupon"];
        $this->persentase_diskon = $kupon["persentase_diskon"];
        $this->min_laundry = $kupon["min_laundry"];
        $this->masa_berlaku = $kupon["masa_berlaku"];
        $this->terpakai = 0;
        $this->db->insert($this->_table, $this);
    }

    public function getKupon($id_member)
    {
        return $this->db->get_where($this->_table, ["id_member" => $id_member])->result();
    }

    public function terpakai($kode_kupon)
    {
        $this->db->update($this->_table, ["terpakai" => 1], ["kode_kupon" => $kode_kupon]);
    }
}
