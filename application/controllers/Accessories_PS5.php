<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accessories_PS5 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Accessories_PS5_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['judul'] = "PS5 Accessories page";
		$data['accessories_ps5'] = $this->Accessories_PS5_model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("accessories_ps5_vw/vw_Accessories_PS5", $data);
		$this->load->view("layout/footer", $data);
	}

	public function create()
	{
		$data['judul'] = "Add Page For PS5 Accessories";

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("accessories_ps5_vw/vw_Create_Accessories_PS5", $data);
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
				$config['upload_path'] = './assets/img/accessories_ps5/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$data['image'] = $new_image; // Set the image data to be inserted
				} else {
					echo $this->upload->display_errors();
				}
			}

			$inserted_id = $this->Accessories_PS5_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">PS5 accessories data added successfully!</div>');
			redirect('Accessories_PS5');
		}
	}


	public function detail($id)
	{
		$data['judul'] = "Details Page For PS5 Accessories";
		$data['accessories_ps5'] = $this->Accessories_PS5_model->getById($id);
		$this->load->view("layout/header", $data);
		$this->load->view("accessories_ps5_vw/vw_Detail_accessories_PS5", $data);
		$this->load->view("layout/footer", $data);
	}

	public function delete($id)
	{
		$this->Accessories_PS5_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">PS5 accessories data successfully deleted!</div>');
		redirect('Accessories_PS5');
	}

	public function edit($id)
	{
		$data['judul'] = "Edit Page For PS5 Accessories";
		$data['accessories_ps5'] = $this->Accessories_PS5_model->getById($id);

		$this->form_validation->set_rules('description', 'Description', 'required', [
			'required' => 'A description is required to be entered'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("accessories_ps5_vw/vw_Edit_Accessories_PS5", $data);
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
				$config['upload_path'] = './assets/img/accessories_ps5/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['accessories_ps5']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/accessories_ps5/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			// Accessories_PS5 controller - edit method
			$this->Accessories_PS5_model->update(['id' => $id], $data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Accessories PS5 data changed successfully!</div>');
			redirect('Accessories_PS5');
		}
	}
}
