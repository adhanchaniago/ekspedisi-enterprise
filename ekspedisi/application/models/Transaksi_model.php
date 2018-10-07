<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function get()
	{
		$this->db->select("transaksi.*,(select nama from pengguna where id=transaksi.fk_petugas) as petugas_nama,(select nama from pengguna where id=transaksi.fk_pelanggan) as pelanggan_nama");
		return $this->db->get('transaksi')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('transaksi')->row(0);
	}
	public function get_pengguna()
	{
		return $this->db->get('pengguna')->result();
	}
	public function insert()
	{
		$set = array(
			'tanggal' => $this->input->post('tanggal'),
			'alamat' => $this->input->post('alamat'),
			'resi' => $this->generate_resi(),
			'status' => 1,
			'berat' => $this->input->post('berat'),
			'deskripsi' => $this->input->post('deskripsi'),
			'fk_petugas' => $this->input->post('fk_petugas'),
			'fk_pelanggan' => $this->input->post('fk_pelanggan'),
		);
		$this->db->insert('transaksi',$set);
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
		$this->db->update('transaksi',$set);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('transaksi');
	}
	public function generate_resi()
	{
		return "RESI";
	}
}
