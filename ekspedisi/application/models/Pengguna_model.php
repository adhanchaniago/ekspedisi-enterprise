<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function get()
	{
		$this->db->select("pengguna.*, (select nama from level where id=pengguna.id) as level_nama");
		return $this->db->get('pengguna')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('pengguna')->row(0);
	}
	public function get_level()
	{
		return $this->db->get('level')->result();
	}
	public function insert()
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'fk_level' => $this->input->post('fk_level'),
		);
		$this->db->insert('pengguna',$set);
	}
	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'fk_level' => $this->input->post('fk_level'),
		);
		$this->db->where('id',$id);
		$this->db->update('pengguna',$set);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pengguna');
	}
}
