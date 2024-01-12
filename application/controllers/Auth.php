<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'userrole');
	}

	public function index()
	{
		$this->load->view('layout/auth_header');
		$this->load->view("auth/login");
		$this->load->view('layout/auth_footer');
	}

	public function register()
	{
		$this->load->view('layout/auth_header');
		$this->load->view('auth/register');
		$this->load->view('layout/auth_footer');
	}

	public function cek_regis()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role' => "User",
			'date_created' =>time()
		];
		$this->userrole->insert($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations, your account has been successfully registered, please log in!</div>');
		redirect('Auth');
	}

	public function cek_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role' => $user['role'],
					'id' => $user['id'],
				];
				$this->session->set_userdata($data);
				if ($user['role'] == 'Admin') {
					redirect('Admin');
				} else {
					redirect('Cosmic');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Registered!</div>');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Successfully!</div>');
		redirect('Auth');
	}
}
