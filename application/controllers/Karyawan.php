<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->load->helper(['form', 'url']);
    }

    public function login()
    {
        $karyawan = $this->Karyawan_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'id' => $karyawan->login());
        echo json_encode($res);
    }

    public function presensi()
    {
        $this->load->view('PresensiKaryawan/index.php');
    }
}
