<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
}
