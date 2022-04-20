<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}
	public function penjemputan()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$queryAllpenjemputan = $this->m_admin->tampil_penjemputan();
		$DATA = array('queryAllpenjemputan' => $queryAllpenjemputan);
		$this->load->view('penjemputan', $DATA);
		$this->load->view('footer');
	}
	public function datamember()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$queryAlldatamember = $this->m_admin->tampil_datamember();
		$DATA = array('queryAlldatamember' => $queryAlldatamember);
		$this->load->view('datamember', $DATA);
		$this->load->view('footer');
	}
	public function promo()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$queryAllpromo = $this->m_admin->tampil_promo();
		$DATA = array('queryAllpromo' => $queryAllpromo);
		$this->load->view('promo', $DATA);
		$this->load->view('footer');
	}
	public function tambahpromo()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('tambahpromo');
		$this->load->view('footer');
	}
	public function tambahpromoaksi()
	{
		$id_kupon = uniqid();
		$kode_kupon = $this->input->post('kode_kupon');
		$judul_kupon = $this->input->post('judul_kupon');
		$masa_berlaku = $this->input->post('masa_berlaku');
		$min_laundry = $this->input->post('min_laundry');
		$persentase_diskon = $this->input->post('persentase_diskon');
		$tier_kupon = $this->input->post('tier_kupon');
		$jumlah_klaim = $this->input->post('jumlah_klaim');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'id_kupon' => $id_kupon,
			'kode_kupon' => $kode_kupon,
			'judul_kupon' => $judul_kupon,
			'masa_berlaku' => $masa_berlaku,
			'min_laundry' => $min_laundry,
			'persentase_diskon' => $persentase_diskon,
			'tier_kupon' => $tier_kupon,
			'jumlah_klaim' => $jumlah_klaim,
			'keterangan' => $keterangan,
		);
		$this->m_admin->input_promo($data, 'kupon');
		redirect('Welcome/promo');
	}
}
