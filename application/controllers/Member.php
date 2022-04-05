<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
    }

    public function register()
    {
        $member = $this->Member_model;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());

        if ($validation->run()) {
            $member->newMember();
            redirect('Member/login', 'location');
        } else {
            $this->load->view('join_member');
        }
    }

    public function login()
    {
        $this->load->view('loginmember');
    }
    public function presensi()
    {
        $this->load->view('PresensiKaryawan/index.php');
    }

}
