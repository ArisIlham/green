<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['form', 'url']);
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('login_member');
	}

	public function register()
	{
		$this->load->view('join_member');
	}

	public function order()
	{
		$this->load->view('halaman_penjemputan_customer/index');
	}

	public function presensi()
	{
		$this->load->view('PresensiKaryawan/index.php', $this->session->flashdata());
		$this->session->sess_destroy();
	}
}
