<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(['form', 'url']);
    }

    public function register()
    {
        $member = $this->Member_model;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());

        if ($validation->run()) {
            $member->newMember();
            redirect(base_url('login'), 'location');
        } else {
            redirect(base_url('register'), 'location');
        }
    }

    public function uniqe()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->uniqeHP());
        echo json_encode($res);
    }

    public function password()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->checkPassword());
        echo json_encode($res);
    }

    public function login()
    {
        $member = $this->Member_model;
        $data = array(
            "id_member" => $member->login()->id_member,
            "no_hp" => $member->login()->no_hp,
            "password" => $member->login()->password,
            "nama" => $member->login()->nama,
            "alamat" => $member->login()->alamat,
            "foto" => $member->login()->foto,
            "total_laundry" => $member->login()->total_laundry,
            "total_harga" => $member->login()->total_harga
        );
        $this->session->set_userdata($data);
        $res = array('member' => $member->login());
        echo json_encode($res);
        redirect(base_url('member/dashboard'), 'location');
    }
}
