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
    public $status;

    public function total($id_member)
    {
        $order = $this->db->get_where($this->_table, ["id_member" => $id_member])->result();
        $total_laundry = 0;
        $total_harga = 0;
        $total_kupon = 0;

        foreach ($order as $row) {
            $total_laundry += $row->berat;
            $total_harga += $row->harga;
            if ($row->kupon != NULL) {
                $total_kupon += 1;
            }
        }
        return array("total_laundry" => $total_laundry, "total_harga" => $total_harga, "total_kupon" => $total_kupon);
    }
}
