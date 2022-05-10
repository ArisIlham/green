<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{

    private $_table = "member";

    public $id_member;
    public $waktu_join;
    public $no_hp;
    public $password;
    public $nama;
    public $tanggal_lahir;
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
        date_default_timezone_set("Asia/Jakarta");
        $post = $this->input->post();
        $this->id_member = uniqid();
        $this->no_hp = $post["no_hp"];
        $this->nama = $post["nama"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->alamat = $post["alamat"];
        $this->tier_member = 1;
        $this->waktu_join = date("Y-m-d");
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->db->insert($this->_table, $this);
        return $this->id_member;
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
    public function editHP()
    {
        $no_hp = $this->input->post("no_hp");
        $check = $this->db->get_where($this->_table, ["no_hp" => $no_hp])->row();
        if ($check == NULL || $check->no_hp === $no_hp) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function checkHP()
    {
        $no_hp = $this->input->post("no_hp");
        $check = $this->db->get_where($this->_table, ["no_hp" => $no_hp])->row();
        if ($check == NULL) {
            return 'false';
        } else {
            return 'true';
        }
    }
    public function checkTgl()
    {
        $no_hp = $this->input->post("no_hp");
        $tgl = $this->input->post("tanggal_lahir");
        $check = $this->db->get_where($this->_table, ["no_hp" => $no_hp, "tanggal_lahir" => $tgl])->row();
        if ($check == NULL) {
            return 'false';
        } else {
            return 'true';
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

    public function total($data)
    {
        $this->total_laundry = $data["total_laundry"];
        $this->total_harga = $data["total_harga"];
        $this->session->set_userdata("total_laundry", $this->total_laundry);
        $this->session->set_userdata("total_harga", $this->total_harga);
        if ($this->total_laundry >= 25 && $this->total_laundry < 60) {
            $this->db->update($this->_table, array("tier_member" => 2, "total_laundry" => $this->total_laundry, "total_harga" => $this->total_harga), array("id_member" => $data["id_member"]));
            $this->session->set_userdata("tier_member", 2);
        } else if ($this->total_laundry >= 60) {
            $this->db->update($this->_table, array("tier_member" => 3, "total_laundry" => $this->total_laundry, "total_harga" => $this->total_harga), array("id_member" => $data["id_member"]));
            $this->session->set_userdata("tier_member", 3);
        } else {
            $this->db->update($this->_table, array("tier_member" => 1, "total_laundry" => $this->total_laundry, "total_harga" => $this->total_harga), array("id_member" => $data["id_member"]));
            $this->session->set_userdata("tier_member", 1);
        }
    }

    public function editProfile($data)
    {
        $post = $this->input->post();
        $this->foto = $data["foto"];
        $this->nama = $post["nama"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        if ($this->foto == NULL) {
            $this->db->update($this->_table, array("nama" => $this->nama, "tanggal_lahir" => $this->tanggal_lahir, "alamat" => $this->alamat, "no_hp" => $this->no_hp), array("id_member" => $data['id']));
        } else {
            $this->db->update($this->_table, array("foto" => $this->foto, "nama" => $this->nama, "tanggal_lahir" => $this->tanggal_lahir, "alamat" => $this->alamat, "no_hp" => $this->no_hp), array("id_member" =>  $data['id']));
            $this->session->set_userdata("foto", $this->foto);
        }
        $this->session->set_userdata("nama", $this->nama);
        $this->session->set_userdata("tanggal_lahir", $this->tanggal_lahir);
        $this->session->set_userdata("alamat", $this->alamat);
        $this->session->set_userdata("no_hp", $this->no_hp);
    }

    public function editPassword()
    {
        $this->no_hp = $this->input->post("no_hp");
        $this->password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
        $this->db->update($this->_table, ["password" => $this->password], ["no_hp" => $this->no_hp]);
    }
}
