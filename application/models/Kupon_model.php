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
        $res =  $this->db->get_where($this->_table, ["id_kupon" => $id_kupon])->row();
        $klaim = $res->jumlah_klaim - 1;
        $this->db->update($this->_table, ["jumlah_klaim" => $klaim], ["id_kupon" => $id_kupon]);
        return $res;
    }

    public function addKupon($tanggal_join, $id_member)
    {
        $this->id_kupon = uniqid();
        $this->kode_kupon = "DSC 10%-1kg";
        $this->judul_kupon = "Diskon Khusus Member Baru";
        $this->masa_berlaku = $tanggal_join;
        $this->keterangan = "Khusus untuk Member Baru";
        $this->min_laundry = 1;
        $this->persentase_diskon = 10;
        $this->tier_kupon = 0;
        $this->jumlah_klaim = 1;
        $this->id_member = $id_member;
        $this->db->insert($this->_table, $this);
    }
}
