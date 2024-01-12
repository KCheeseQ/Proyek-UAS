<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cosmic_Game_Shop extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consoles_XBOX_model');
		$this->load->model('Accessories_XBOX_model');
		$this->load->model('Games_XBOX_model');
		$this->load->model('Games_PS4_model');
		$this->load->model('Games_PS5_model');
		$this->load->model('Consoles_PlayStation_model');
		$this->load->model('Accessories_PS2_model');
		$this->load->model('Accessories_PS3_model');
		$this->load->model('Accessories_PS4_model');
		$this->load->model('Accessories_PS5_model');
		$this->load->model('Games_Nintendo_model');
		$this->load->model('Consoles_Nintendo_model');
		$this->load->model('Accessories_Nintendo_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("user_templates/home");
	}

	public function parentData()
	{
		$this->load->view("user_templates/products");
	}

	// XBOX
	public function dataDetails_Parent()
	{
		$this->load->view("user_templates/product-details-XBOX");
	}

	public function dataDetails_Parent_Consoles()
	{
		$data['consoles_xbox'] = $this->Consoles_XBOX_model->get();
		$this->load->view("cag_xbox_vw-assets2/product-details-XBOX_Consoles", $data);
	}

	public function dataDetails_Parent_Accessories()
	{
		$data['accessories_xbox'] = $this->Accessories_XBOX_model->get();
		$this->load->view("cag_xbox_vw-assets2/product-details-XBOX_Accessories", $data);
	}

	public function dataDetails_Parent_Games()
	{
		$data['games_xbox'] = $this->Games_XBOX_model->get();
		$this->load->view("cag_xbox_vw-assets2/product-details-XBOX_Games", $data);
	}

	// PlayStation
	public function dataDetails_Parent_2()
	{
		$this->load->view("user_templates/product-details-PlayStation");
	}

	public function dataDetails_Parent_GamesParent()
	{
		$this->load->view("user_templates/product-details-PlayStation_Games");
	}

	public function dataDetails_Parent_GamesParent_Games_PS4()
	{
		$data['games_ps4'] = $this->Games_PS4_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Games_PS4", $data);
	}

	public function dataDetails_Parent_GamesParent_Games_PS5()
	{
		$data['games_ps5'] = $this->Games_PS5_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Games_PS5", $data);
	}

	public function dataDetails_Parent_ConsolesParent()
	{
		$data['consoles_playstation'] = $this->Consoles_PlayStation_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Consoles", $data);
	}

	public function dataDetails_Parent_AccessoriesParent()
	{
		$this->load->view("user_templates/product-details-PlayStation_Accessories");
	}

	public function dataDetails_Parent_AccessoriesParent_Accessories_PS2()
	{
		$data['accessories_ps2'] = $this->Accessories_PS2_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Accessories_PS2", $data);
	}

	public function dataDetails_Parent_AccessoriesParent_Accessories_PS3()
	{
		$data['accessories_ps3'] = $this->Accessories_PS3_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Accessories_PS3", $data);
	}

	public function dataDetails_Parent_AccessoriesParent_Accessories_PS4()
	{
		$data['accessories_ps4'] = $this->Accessories_PS4_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Accessories_PS4", $data);
	}

	public function dataDetails_Parent_AccessoriesParent_Accessories_PS5()
	{
		$data['accessories_ps5'] = $this->Accessories_PS5_model->get();
		$this->load->view("cag_playstation_vw-assets2/product-details-PlayStation_Accessories_PS5", $data);
	}

	// Nintendo
	public function dataDetails_Parent_3()
	{
		$this->load->view("user_templates/product-details-Nintendo");
	}

	public function dataDetails_parentParent_Games()
	{
		$data['games_nintendo'] = $this->Games_Nintendo_model->get();
		$this->load->view("cag_nintendo_vw-assets2/product-details-Nintendo_Games", $data);
	}

	public function dataDetails_parentParent_Consoles()
	{
		$data['consoles_nintendo'] = $this->Consoles_Nintendo_model->get();
		$this->load->view("cag_nintendo_vw-assets2/product-details-Nintendo_Consoles", $data);
	}

	public function dataDetails_parentParent_Accessories()
	{
		$data['accessories_nintendo'] = $this->Accessories_Nintendo_model->get();
		$this->load->view("cag_nintendo_vw-assets2/product-details-Nintendo_Accessories", $data);
	}

	public function location()
	{
		$this->load->view("user_templates/contact");
	}
}
