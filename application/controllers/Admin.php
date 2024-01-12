<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consoles_XBOX_model');
	}

	public function index()
	{
		$data['judul'] = "Welcome Back Admin!";
		$this->load->view("layout/header", $data);
		$this->load->view("admin/vw_Admin", $data);
		$this->load->view("layout/footer", $data);
	}
}
