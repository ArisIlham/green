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

    public function login()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->login());
        echo json_encode($res);
    }
}
