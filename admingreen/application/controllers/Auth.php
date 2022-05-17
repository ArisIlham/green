 <?php
	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('m_admin');
		}

		function index()
		{
			$this->load->view('login_form');
		}

		function aksi_login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$cek = $this->m_admin->cek_login("admin", $where)->num_rows();
			if ($cek > 0) {

				$data_session = array(
					'username' => $username,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("Welcome"));
			} else {
				echo "Username dan password salah !";
			}
		}

		function logout()
		{
			session_destroy();
			$url = base_url('auth');
			redirect($url);
		}
	}
