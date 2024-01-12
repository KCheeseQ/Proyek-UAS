<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Games_XBOX extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Games_XBOX_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['judul'] = "XBOX Games page";
		$data['games_xbox'] = $this->Games_XBOX_model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("games_xbox_vw/vw_Games_XBOX", $data);
		$this->load->view("layout/footer", $data);
	}

	public function create()
	{
		$data['judul'] = "Add Page For XBOX Games";

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("games_xbox_vw/vw_Create_Games_XBOX", $data);
			$this->load->view("layout/footer", $data);
		} else {
			$data = [
				'image' => $this->input->post('image'),
				'description' => $this->input->post('description'),
			];

			// Process image upload
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '10000';
				$config['upload_path'] = './assets/img/games_xbox/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$data['image'] = $new_image; // Set the image data to be inserted
				} else {
					echo $this->upload->display_errors();
				}
			}

			$inserted_id = $this->Games_XBOX_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">XBOX games data added successfully!</div>');
			redirect('Games_XBOX');
		}
	}


	public function detail($id)
	{
		$data['judul'] = "Details Page For XBOX Games";
		$data['games_xbox'] = $this->Games_XBOX_model->getById($id);
		$this->load->view("layout/header", $data);
		$this->load->view("games_xbox_vw/vw_Detail_Games_XBOX", $data);
		$this->load->view("layout/footer", $data);
	}

	public function delete($id)
	{
		$this->Games_XBOX_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">XBOX games data successfully deleted!</div>');
		redirect('Games_XBOX');
	}

	public function edit($id)
	{
		$data['judul'] = "Edit Page For XBOX Games";
		$data['games_xbox'] = $this->Games_XBOX_model->getById($id);

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("games_xbox_vw/vw_Edit_Games_XBOX", $data);
			$this->load->view("layout/footer", $data);
		} else {
			$data = [
				'image' => $this->input->post('image'),
				'description' => $this->input->post('description'),
			];
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '10000';
				$config['upload_path'] = './assets/img/games_xbox/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['games_xbox']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/games_xbox/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			// Games_XBOX controller - edit method
			$this->Games_XBOX_model->update(['id' => $id], $data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Games XBOX data changed successfully!</div>');
			redirect('Games_XBOX');
		}
	}
}
