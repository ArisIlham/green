<?php defined('BASEPATH') or exit('No direct script access allowed');
class Presensi_model extends CI_Model
{
    private $_table = "presensi";

    public $id_presensi;
    public $id_karyawan;
    public $nama;
    public $status;
    public $keterangan;
    public $tanggal;
    public $jam;

    public function presensi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $datetime = new DateTime("now");
        $post = $this->input->post();
        $this->id_karyawan = $post["id"];
        $presensi = $this->db->get_where($this->_table, array("id_karyawan" => $this->id_karyawan, "tanggal" => $datetime->format('Y-m-d')))->last_row();
        if ($presensi->status == "Tidak Hadir") {

            $this->id_presensi = $presensi->id_presensi;
            $this->nama = $post["nama"];
            $this->status = $post["hadir"];
            if (isset($post["hadir"])) {
                if ($post["hadir"] == "Izin")
                    $this->keterangan = $post["ket"];
            }
            $this->tanggal = $datetime->format('Y-m-d');
            $this->jam = $datetime->format('G:i:s');
            return $this->db->update($this->_table, $this, array('id_presensi' => $this->id_presensi, "tanggal" => $datetime->format('Y-m-d')));
        } else {
            return false;
        }
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
            $this->status = "Tidak Hadir";
            $this->tanggal = $datetime->format('Y-m-d');
            $this->db->insert($this->_table, $this);
        }
    }
}
