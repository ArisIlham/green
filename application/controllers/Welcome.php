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
	public function member()
	{
		$this->load->view('loginmember');
	}
	public function joinMember()
	{
		$this->load->view('join_member');
	}
}