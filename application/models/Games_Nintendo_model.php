<?php
defined('BASEPATH') or exit('Not direct script access allowed');

class Games_Nintendo_model extends CI_Model
{
	public $table = 'games_nintendo';
	public $id = 'games_nintendo.id';

	public function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getById($id)
	{
		$this->db->where('id', $id); // Add this line to filter based on the provided $id
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	// Consoles_XBOX_model
	public function update($where, $data, $upload_image)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function insert($data, $upload_image)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
}
