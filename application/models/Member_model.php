<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $_table = "member";

    public $id_member;
    public $no_hp;
    public $password;
    public $nama;
    public $alamat;
    public $foto;
    public $tier_member;
    public $total_laundry;
    public $total_harga;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'no_hp',
                'label' => 'No Hp',
                'rules' => 'numeric'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ]
        ];
    }

    public function newMember()
    {
        $post = $this->input->post();
        $this->id_member = uniqid();
        $this->no_hp = $post["no_hp"];
        $this->nama = $post["nama"];
        $this->password = $post["password"];
        $this->alamat = $post["alamat"];
        $this->tier_member = 1;
        return $this->db->insert($this->_table, $this);
    }
}
