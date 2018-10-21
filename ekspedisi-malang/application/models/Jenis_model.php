<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

	public function get()
	{
		return $this->db->get('jenis')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('jenis')->row(0);
	}
	public function insert()
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
		);
		$this->db->insert('jenis',$set);
	}
	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
		);
		$this->db->where('id',$id);
		$this->db->update('jenis',$set);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('jenis');
	}
}
