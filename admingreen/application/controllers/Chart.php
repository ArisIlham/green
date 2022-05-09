<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('m_admin'));
    }

    public function index() {
		$this->pie();
	}

	public function pie() {
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_presensi = $this->m_admin->read();
		
		//mengirim data ke view
		$output = array(
					'judul' => 'Pie Chart',
					'data_presensi' => $data_presensi
				);

		//memanggil file view
		$this->load->view('persentasi', $output);
	}
}