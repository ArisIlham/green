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

    public function kupon($tier_member)
    {
        return $this->db->get_where($this->_table, ["tier_kupon" => $tier_member])->result();
    }

    public function getKupon($id_kupon)
    {
        return $this->db->get_where($this->_table, ["id_kupon" => $id_kupon])->row();
    }
}
