<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
        $this->load->helper(['form', 'url']);
    }

    public function register()
    {
        $member = $this->Member_model;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());

        if ($validation->run()) {
            $member->newMember();
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
    public function presensi()
    {
        $this->load->view('PresensiKaryawan/index.php');
    }
<<<<<<< HEAD
=======
    public function presensiResult() {
        $this->load->view('Presensikaryawan/result_presensi_karyawan.php');
    }

>>>>>>> d653c89190426ffbb336d5468535ab5da3435629
}
