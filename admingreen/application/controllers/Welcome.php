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
		$res_jumlah_member = $this->m_admin->jumlah_member();
		$data['jumlah_member'] = $res_jumlah_member[0]->jumlah_member;
		$res_jumlah_pemasukan = $this->m_admin->jumlah_pemasukan();
		$data['jumlah_pemasukan'] = $res_jumlah_pemasukan[0]->jumlah_pemasukan;
		$res_jumlah_penjemputan = $this->m_admin->jumlah_penjemputan();
		$data['jumlah_penjemputan'] = $res_jumlah_penjemputan[0]->jumlah_penjemputan;
		$res_jumlah_kehadiran = $this->m_admin->jumlah_kehadiran();
		$data['jumlah_kehadiran'] = $res_jumlah_kehadiran[0]->jumlah_kehadiran;
		$this->load->view('dashboard', $data);
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
	public function hapus_penjemputan($id_order)
	{
		$where = array ('id_order'=>$id_order);
		$this->m_admin->hapus_penjemputan($where, 'order');
		redirect('welcome/penjemputan/');
	}
	public function edit_penjemputan($id_order){
		$where = array ('id_order'=>$id_order);
		$data['penjemputan'] = $this->m_admin->edit_penjemputan($where, 'order')->result();
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('edit_penjemputan', $data);
		$this->load->view('footer');
	}
	public function update_penjemputan(){
		$id_order = $this->input->post('id_order');
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');

		$data = array(
			'berat'		=> $berat,
			'harga'		=> $harga,
		);
		$where = array(
			'id_order'	=> $id_order
		);
		$this->m_admin->update_penjemputan($where, $data, 'order');
		redirect('welcome/penjemputan/');
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
	public function presensi(){
		$this->load->view('header');
		$this->load->view('topbar');
		$queryAllpresensi = $this->m_admin->tampil_presensi();
		$DATA = array('queryAllpresensi' => $queryAllpresensi);
		$this->load->view('presensi', $DATA);
		$this->load->view('footer');
	}
	public function karyawan(){
		$this->load->view('header');
		$this->load->view('topbar');
		$queryAllkaryawan = $this->m_admin->tampil_karyawan();
		$DATA = array('queryAllkaryawan' => $queryAllkaryawan);
		$this->load->view('karyawan', $DATA);
		$this->load->view('footer');
	}
	public function tambahkaryawan()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('tambahkaryawan');
		$this->load->view('footer');
	}
	public function tambahkaryawanaksi()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$tanggal_terdaftar = $this->input->post('tanggal_terdaftar');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$data = array(
			'id_karyawan' => $id_karyawan,
			'tanggal_terdaftar' => $tanggal_terdaftar,
			'nama' => $nama,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
		);
		$this->m_admin->input_karyawan($data, 'karyawan');
		redirect('Welcome/karyawan');
	}
	
}
