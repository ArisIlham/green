<?php defined('BASEPATH') or exit('No direct sript access allowed');


class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Order_model');
        $this->load->model('Kupon_model');
        $this->load->model('kuponMember_model');
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
            date_default_timezone_set("Asia/Jakarta");
            $this->Kupon_model->addKupon(date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))), $member->newMember());
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
    public function editHP()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->editHP());
        echo json_encode($res);
    }
    public function checkHP()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->checkHP());
        echo json_encode($res);
    }
    public function checkTgl()
    {
        $member = $this->Member_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'member' => $member->checkTgl());
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
            "total_harga" => $member->login()->total_harga,
            "tanggal_lahir" => $member->login()->tanggal_lahir
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
        if ($this->input->post("kupon") != "") {
            $this->kuponMember_model->terpakai($this->input->post("kupon"));
        }
        redirect(base_url('Member/proses'), "location");
    }
    public function proses()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Order Laundry"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $this->load->view('MemberGL/proses_penjemputan', $this->session->userdata());
        }
    }
    public function order()
    {
        $order = $this->Order_model;
        $order->order();
        $this->load->view('MemberGL/proses_penjemputan', $this->session->userdata());
    }

    public function dashboard()
    {
        $kupon_member = $this->kuponMember_model->getKupon($this->session->userdata("id_member"));
        $this->session->set_userdata("kupon_member", $kupon_member);
        $this->load->view('MemberGL/navigation', ["title" => "Dashboard Member"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $member = $this->Member_model;
            $order = $this->Order_model;
            $total_laundry = $order->total($this->session->userdata('id_member'))["total_laundry"];
            $total_harga = $order->total($this->session->userdata('id_member'))["total_harga"];
            $total_kupon = $order->total($this->session->userdata('id_member'))["total_kupon"];
            $this->session->set_userdata("total_kupon", $total_kupon);
            $member->total(array("id_member" => $this->session->userdata('id_member'), "total_laundry" => $total_laundry, "total_harga" => $total_harga));
            $kupon = $this->Kupon_model->kupon();
            $this->session->set_userdata("kupon", $kupon);
            $order = $this->Order_model;
            $data = $order->history($this->session->userdata('id_member'));
            $this->session->set_userdata("order", $data);
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
            $this->load->view('MemberGL/profil', $this->session->userdata());
        }
    }

    public function history()
    {
        $this->load->view('MemberGL/navigation', ["title" => "Riwayat Pesanan"]);
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            $this->load->view('MemberGL/history', $this->session->userdata());
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
        $file_name = "foto-profil-" . $this->session->userdata('nama') . "_" . $this->session->userdata("id_member");

        $config['upload_path']          = FCPATH . '/upload/avatar/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        if (!empty($_FILES['foto']['name'])) {
            if (file_exists($file_name)) {
                delete_files(glob(FCPATH . "/upload/avatar/" . $file_name . ".*"));
            }
        }

        if (empty($_FILES['foto']['name'])) {
            $new_data = [
                'id' => $this->session->userdata('id_member'),
                'foto' => NULL,
            ];
        } else {
            $this->upload->do_upload('foto');
            $uploaded_data = $this->upload->data();
            $new_data = [
                'id' => $this->session->userdata('id_member'),
                'foto' => $uploaded_data['file_name'],
            ];
        }

        $member->editProfile($new_data);
        redirect(base_url('member/profile'), 'location');
    }

    public function addKupon()
    {
        $kupon = $this->Kupon_model->getKupon($this->input->post("id_kupon"));
        $data = [
            "id_kupon" => $kupon->id_kupon,
            "kode_kupon" => $kupon->kode_kupon,
            "persentase_diskon" => $kupon->persentase_diskon,
            "min_laundry" => $kupon->min_laundry,
            "masa_berlaku" => $kupon->masa_berlaku,
        ];
        $this->kuponMember_model->addKupon($data, $this->session->userdata("id_member"));
        $kupon_member = $this->kuponMember_model->getKupon($this->session->userdata("id_member"));
        $this->session->set_userdata("kupon_member", $kupon_member);
        redirect(base_url('member/dashboard'), "refresh");
    }

    public function getKupon()
    {
        $kupon = $this->kuponMember_model;
        $res = array('csrfName' => $this->security->get_csrf_token_name(), 'csrfHash' => $this->security->get_csrf_hash(), 'kupon' => $kupon->getKupon($this->session->userdata("id_member")));
        echo json_encode($res);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/'), "location");
    }

    public function editPassword()
    {
        if ($this->session->userdata('id_member') == NULL) {
            $this->load->view('MemberGL/edit_password_0');
        } else {
            $this->load->view('MemberGL/navigation', ["title" => "Edit Password"]);
            $this->load->view('MemberGL/edit_password', $this->session->userdata());
        }
    }

    public function goEditPassword()
    {
        $this->Member_model->editPassword();
        if ($this->session->userdata('id_member') == NULL) {
            redirect(base_url('login'), 'location');
        } else {
            redirect(base_url('member/profile'), 'location');
        }
    }
}
