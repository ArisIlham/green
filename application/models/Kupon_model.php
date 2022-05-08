<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kupon_model extends CI_Model
{
    private $_table = "kupon";
    public $id_kupon;
    public $kode_kupon;
    public $judul_kupon;
    public $masa_berlaku;
    public $keterangan;
    public $min_laundry;
    public $persentase_diskon;
    public $tier_kupon;
    public $jumlah_klaim;
    public $id_member;

    public function kupon()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getKupon($id_kupon)
    {
        return $this->db->get_where($this->_table, ["id_kupon" => $id_kupon])->row();
    }

    public function addKupon($tanggal_join, $id_member)
    {
        $this->id_kupon = uniqid();
        $this->kode_kupon = "Discount 10%";
        $this->judul_kupon = "Diskon Khusus Member Baru";
        $this->masa_berlaku = $tanggal_join;
        $this->keterangan = "Khusus untuk Member Baru";
        $this->min_laundry = 0;
        $this->persentase_diskon = 10;
        $this->tier_kupon = 0;
        $this->jumlah_klaim = -1;
        $this->id_member = $id_member;
        $this->db->insert($this->_table, $this);
    }
}
