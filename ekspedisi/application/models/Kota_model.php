<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {

	public function get()
	{
		return $this->db->get('kota')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('kota')->row(0);
	}
	public function insert()
	{
		$set = array(
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$this->db->insert('kota',$set);
	}
	public function update($id)
	{
		$set = array(
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$this->db->where('id',$id);
		$this->db->update('kota',$set);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('kota');
	}
}
