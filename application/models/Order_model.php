<?php defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    private $_table = "order";

    public $id_order;
    public $id_member;
    public $no_hp;
    public $nama;
    public $alamat;
    public $jenis_barang;
    public $note;
    public $waktu_jemput;
    public $kupon;
    public $berat;
    public $harga;

    public function orderMember($id_member)
    {
        $post = $this->input->post();
        $this->id_order = uniqid();
        $this->id_member = $id_member;
        $this->no_hp = $post["no_hp"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_barang = $post["jenis"];
        $this->note = $post["note"];
        $this->waktu_jemput = $post["waktu"];
        $this->kupon = $post["kupon"];
        return $this->db->insert($this->_table, $this);
    }

    public function order()
    {
        $post = $this->input->post();
        $this->id_order = uniqid();
        $this->no_hp = $post["no_hp"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->jenis_barang = $post["jenis"];
        $this->note = $post["note"];
        $this->waktu_jemput = $post["waktu"];
        return $this->db->insert($this->_table, $this);
    }

    public function total($id_member)
    {
        $order = $this->db->get_where($this->_table, ["id_member" => $id_member])->result();
        $total_laundry = 0;
        $total_harga = 0;

        foreach ($order as $row) {
            $total_laundry += $row->berat;
            $total_harga += $row->harga;
        }
        return array("total_laundry" => $total_laundry, "total_harga" => $total_harga);
    }
}
