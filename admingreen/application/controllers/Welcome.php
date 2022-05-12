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
	public function hapus_promo($kode_kupon)
	{
		$where = array ('kode_kupon'=>$kode_kupon);
		$this->m_admin->hapus_penjemputan($where, 'kupon');
		redirect('welcome/promo/');
	}
	public function edit_promo($kode_kupon){
		$where = array ('kode_kupon'=>$kode_kupon);
		$data['kupon'] = $this->m_admin->edit_penjemputan($where, 'kupon')->result();
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('edit_member', $data);
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
	public function persentasi()
	{
		$this->load->view('header');
		$this->load->view('topbar');
		$data['hadir']=$this->m_admin->hadir();
		$data['tidakhadir']=$this->m_admin->tidakhadir();
		$data['izin']=$this->m_admin->izin();
		$this->load->view('persentasi', $data);
		$this->load->view('footer');
	}
	public function print_penjemputan()
	{
		$data['penjemputan'] = $this->m_admin->tampil_penjemputan('order');
		$this->load->view('print_penjemputan', $data);
	}
	public function excel_penjemputan()
	{
		$data['penjemputan'] = $this->m_admin->tampil_penjemputan('order');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
		$object = new PHPexcel();

		$object->getProperties()->setCreator("Green Laundry");
		$object->getProperties()->setLastModifiedBy("Green Laundry");
		$object->getProperties()->setTitle("Data Orderan");
		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'ID Member');
		$object->getActiveSheet()->setCellValue('C1', 'NO HP');
		$object->getActiveSheet()->setCellValue('D1', 'Nama');
		$object->getActiveSheet()->setCellValue('E1', 'Alamat');
		$object->getActiveSheet()->setCellValue('F1', 'Jenis Barang');
		$object->getActiveSheet()->setCellValue('G1', 'Catatan');
		$object->getActiveSheet()->setCellValue('H1', 'Waktu Penjemputan');
		$object->getActiveSheet()->setCellValue('I1', 'Kupon');
		$object->getActiveSheet()->setCellValue('J1', 'Berat');
		$object->getActiveSheet()->setCellValue('K1', 'Harga');

		$baris = 2;
		$no = 1;
		foreach($data['penjemputan'] as $pjm){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $pjm->id_member);
			$object->getActiveSheet()->setCellValue('C'.$baris, $pjm->no_hp);
			$object->getActiveSheet()->setCellValue('D'.$baris, $pjm->nama);
			$object->getActiveSheet()->setCellValue('E'.$baris, $pjm->alamat);
			$object->getActiveSheet()->setCellValue('F'.$baris, $pjm->jenis_barang);
			$object->getActiveSheet()->setCellValue('G'.$baris, $pjm->note);
			$object->getActiveSheet()->setCellValue('H'.$baris, $pjm->waktu_jemput);
			$object->getActiveSheet()->setCellValue('I'.$baris, $pjm->kupon);
			$object->getActiveSheet()->setCellValue('J'.$baris, $pjm->berat);
			$object->getActiveSheet()->setCellValue('K'.$baris, $pjm->harga);
			$baris++;
		}
		$filename="Data_Orderan".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Orderan");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename="'.$filename. '"');

		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
	public function print_member()
	{
		$data['member'] = $this->m_admin->tampil_datamember('member');
		$this->load->view('print_member', $data);
	}
	public function excel_member()
	{
		$data['member'] = $this->m_admin->tampil_datamember('member');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
		$object = new PHPexcel();

		$object->getProperties()->setCreator("Green Laundry");
		$object->getProperties()->setLastModifiedBy("Green Laundry");
		$object->getProperties()->setTitle("Data Member");
		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'ID Member');
		$object->getActiveSheet()->setCellValue('C1', 'NO HP');
		$object->getActiveSheet()->setCellValue('D1', 'Nama');
		$object->getActiveSheet()->setCellValue('E1', 'Alamat');
		$object->getActiveSheet()->setCellValue('F1', 'Foto');
		$object->getActiveSheet()->setCellValue('G1', 'Tier Member');
		$object->getActiveSheet()->setCellValue('H1', 'Total Laundry');
		$object->getActiveSheet()->setCellValue('I1', 'Total Belanja');

		$baris = 2;
		$no = 1;
		foreach($data['member'] as $pjm){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $pjm->id_member);
			$object->getActiveSheet()->setCellValue('C'.$baris, $pjm->no_hp);
			$object->getActiveSheet()->setCellValue('D'.$baris, $pjm->nama);
			$object->getActiveSheet()->setCellValue('E'.$baris, $pjm->alamat);
			$object->getActiveSheet()->setCellValue('F'.$baris, $pjm->foto);
			$object->getActiveSheet()->setCellValue('G'.$baris, $pjm->tier_member);
			$object->getActiveSheet()->setCellValue('H'.$baris, $pjm->total_laundry);
			$object->getActiveSheet()->setCellValue('I'.$baris, $pjm->total_harga);
			$baris++;
		}
		$filename="Data_Member".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Member");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename="'.$filename. '"');

		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
	public function print_karyawan()
	{
		$data['karyawan'] = $this->m_admin->tampil_karyawan('karyawan');
		$this->load->view('print_karyawan', $data);
	}
	public function excel_karyawan()
	{
		$data['karyawan'] = $this->m_admin->tampil_karyawan('karyawan');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
		$object = new PHPexcel();

		$object->getProperties()->setCreator("Green Laundry");
		$object->getProperties()->setLastModifiedBy("Green Laundry");
		$object->getProperties()->setTitle("Data Karyawan");
		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'ID Karyawan');
		$object->getActiveSheet()->setCellValue('C1', 'Tanggal Terdaftar');
		$object->getActiveSheet()->setCellValue('D1', 'Nama');
		$object->getActiveSheet()->setCellValue('E1', 'No Handphone');
		$object->getActiveSheet()->setCellValue('F1', 'Alamat');

		$baris = 2;
		$no = 1;
		foreach($data['karyawan'] as $pjm){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $pjm->id_karyawan);
			$object->getActiveSheet()->setCellValue('C'.$baris, $pjm->tanggal_terdaftar);
			$object->getActiveSheet()->setCellValue('D'.$baris, $pjm->nama);
			$object->getActiveSheet()->setCellValue('E'.$baris, $pjm->no_hp);
			$object->getActiveSheet()->setCellValue('F'.$baris, $pjm->alamat);
			$baris++;
		}
		$filename="Data_Karyawan".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Karyawan");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename="'.$filename. '"');

		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
}
