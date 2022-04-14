<?php defined('BASEPATH') or exit('No direct script access allowed');
class Presensi_model extends CI_Model
{
    private $_table = "presensi";

    public $id_presensi;
    public $id_karyawan;
    public $nama;
    public $status;
    public $waktu_hadir;
    public $keterangan;

    public function presensi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $datetime = new DateTime("now");
        $post = $this->input->post();
        $this->id_karyawan = $post["id"];
        $presensi = $this->db->get_where($this->_table, array("id_karyawan" => $this->id_karyawan))->last_row();
        $this->id_presensi = $presensi->id_presensi;
        $this->nama = $post["nama"];
        $this->status = $post["hadir"];
        if (isset($post["hadir"])) {
            if ($post["hadir"] == 2)
                $this->keterangan = $post["ket"];
        }
        $this->waktu_hadir = $datetime->format('Y-m-d G:i:s');
        return $this->db->update($this->_table, $this, array('id_presensi' => $this->id_presensi));
    }

    public function dailyPresensi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $datetime = new DateTime("now");
        $karyawan = $this->db->get("karyawan")->result();
        foreach ($karyawan as $row) {
            $this->id_presensi = uniqid();
            $this->id_karyawan = $row->id_karyawan;
            $this->nama = $row->nama;
            $this->status = 0;
            $this->waktu_hadir = $datetime->format('Y-m-d');
            $this->db->insert($this->_table, $this);
        }
    }
}
