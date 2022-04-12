<?php defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    private $_table = "karyawan";

    public $id_karyawan;
    public $tanggal_terdaftar;
    public $nama;
    public $no_hp;
    public $alamat;


    public function newKaryawan()
    {
        $post = $this->input->post();
        $this->id_karyawan = $post["id"];
        $this->no_hp = $post["no_hp"];
        $this->nama = $post["nama"];
        $this->tanggal_terdaftar = $post["tanggal"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function login()
    {
        $id = $this->input->post("idKaryawan");
        $karyawan = $this->db->get_where($this->_table, ["id_karyawan" => $id])->result();

        if ($karyawan ==  NULL) {
            return 'false';
        } else {
            return $karyawan;
        }
    }
}
