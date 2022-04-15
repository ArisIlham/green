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
                'label' => 'Kata Sandi',
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
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->alamat = $post["alamat"];
        $this->tier_member = 1;
        return $this->db->insert($this->_table, $this);
    }

    public function uniqeHP()
    {
        $no_hp = $this->input->post("no_hp");
        $check = $this->db->get_where($this->_table, ["no_hp" => $no_hp])->num_rows();
        if ($check == 0) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function checkPassword()
    {
        $no_hp = $this->input->post("no_hp");
        $password = $this->input->post("password");
        $member = $this->db->get_where($this->_table, array("no_hp" => $no_hp))->row();

        if ($member ==  NULL) {
            return 'false';
        } else if (password_verify($password, $member->password) == TRUE) {
            return 'true';
        } else {
            return 'false';
        }
    }


    public function login()
    {
        $no_hp = $this->input->post("no_hp");
        $member = $this->db->get_where($this->_table, array("no_hp" => $no_hp))->row();

        return $member;
    }
}
