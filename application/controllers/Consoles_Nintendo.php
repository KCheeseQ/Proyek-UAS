<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consoles_Nintendo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consoles_Nintendo_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['judul'] = "Nintendo Consoles page";
		$data['consoles_nintendo'] = $this->Consoles_Nintendo_model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("consoles_nintendo_vw/vw_Consoles_Nintendo", $data);
		$this->load->view("layout/footer", $data);
	}

	public function create()
	{
		$data['judul'] = "Add Page For Nintendo Consoles";

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("consoles_nintendo_vw/vw_Create_Consoles_Nintendo", $data);
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
				$config['upload_path'] = './assets/img/consoles_nintendo/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$data['image'] = $new_image; // Set the image data to be inserted
				} else {
					echo $this->upload->display_errors();
				}
			}

			$inserted_id = $this->Consoles_Nintendo_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nintendo console data added successfully!</div>');
			redirect('Consoles_Nintendo');
		}
	}


	public function detail($id)
	{
		$data['judul'] = "Details Page For Nintendo Consoles";
		$data['consoles_nintendo'] = $this->Consoles_Nintendo_model->getById($id);
		$this->load->view("layout/header", $data);
		$this->load->view("consoles_nintendo_vw/vw_Detail_Consoles_Nintendo", $data);
		$this->load->view("layout/footer", $data);
	}

	public function delete($id)
	{
		$this->Consoles_Nintendo_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nintendo console data successfully deleted!</div>');
		redirect('Consoles_Nintendo');
	}

	public function edit($id)
	{
		$data['judul'] = "Edit Page For Nintendo Consoles";
		$data['consoles_nintendo'] = $this->Consoles_Nintendo_model->getById($id);

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("consoles_nintendo_vw/vw_Edit_Consoles_Nintendo", $data);
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
				$config['upload_path'] = './assets/img/consoles_nintendo/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['consoles_nintendo']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/consoles_nintendo/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			// Consoles_Nintendo controller - edit method
			$this->Consoles_Nintendo_model->update(['id' => $id], $data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Console Nintendo data changed successfully!</div>');
			redirect('Consoles_Nintendo');
		}
	}
}
