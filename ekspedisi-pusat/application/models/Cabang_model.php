<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	public function get()
	{
		return $this->db->get('cabang')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('cabang')->row(0);
	}
	public function insert()
	{
		$set = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kota' => $this->input->post('kota'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->db->insert('cabang',$set);
	}
	public function update($id)
	{
		$set = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kota' => $this->input->post('kota'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->db->where('id',$id);
		$this->db->update('cabang',$set);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('cabang');
	}
}
