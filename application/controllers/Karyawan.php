<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->load->helper(['form', 'url']);
    }

    public function presensi()
    {
        $karyawan = $this->Karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->login();
            redirect(base_url('Member/login'), 'location');
        } else {
            $this->load->view('join_member');
        }
    }

    public function uniqe()
    {
        $member = $this->Member_model;
        echo $member->uniqeHP();
    }

    public function login()
    {
        $this->load->view('loginmember');
    }
    // public function presensi()
    // {
    //     $this->load->view('PresensiKaryawan/index.php');
    // }
}
