<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Order_model');
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
            "tier_member" => $member->login()->tier_member,
            "total_laundry" => $member->login()->total_laundry,
            "total_harga" => $member->login()->total_harga
        );
        $this->session->set_userdata($data);
        $res = array('member' => $member->login());
        echo json_encode($res);
        redirect(base_url('member/dashboard'), 'location');
    }

    public function orderMember()
    {
        $order = $this->Order_model;
        $order->orderMember($this->session->userdata("id_member"));
    }

    public function order()
    {
        $order = $this->Order_model;
        $order->order();
        redirect(base_url('order'), 'refresh');
    }

    public function dashboard()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Dashboard Member"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $this->load->view('MemberGL/index', $this->session->userdata());
        }
    }

    public function orderForm()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Order Laundry"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $this->load->view('MemberGL/Penjemputan_barang', $this->session->userdata());
        }
    }

    public function profile()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Profile Member"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $member = $this->Member_model;
            $order = $this->Order_model;
            $total_laundry = $order->total($this->session->userdata('id_member'))["total_laundry"];
            $total_harga = $order->total($this->session->userdata('id_member'))["total_harga"];
            $member->total(array("id_member" => $this->session->userdata('id_member'), "total_laundry" => $total_laundry, "total_harga" => $total_harga));
            $this->load->view('MemberGL/profil', $this->session->userdata());
        }
    }

    public function history()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Riwayat Pesanan"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $order = $this->Order_model;
            $data = $order->history($this->session->userdata('id_member'));
            $this->load->view('MemberGL/history', ["data" => $data]);
        }
    }
}
