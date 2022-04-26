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
        $this->load->helper(['form', 'url', 'file']);
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

    public function detail()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Detail Pesanan"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $id_order = $this->uri->segment(3);
            $order = $this->Order_model;
            $data = $order->detail($id_order);
            $this->load->view('MemberGL/Detail_history', $data);
        }
    }

    public function editProfile()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Edit Profil"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $this->load->view('MemberGL/edit_profile', $this->session->userdata());
        }
    }

    public function goEditProfile()
    {
        $this->load->helper('file');
        $member = $this->Member_model;
        $file_name = "foto-profil-" . $this->session->userdata('nama');

        $config['upload_path']          = FCPATH . '/upload/avatar/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if (file_exists($file_name)) {
            delete_files(glob(FCPATH . "/upload/avatar/" . $file_name . ".*"));
        }
        $this->upload->do_upload('foto');
        $uploaded_data = $this->upload->data();
        $new_data = [
            'id' => $this->session->userdata('id_member'),
            'foto' => $uploaded_data['file_name'],
        ];

        $member->editProfile($new_data);
        redirect(base_url('member/profile'), 'location');
    }
}
