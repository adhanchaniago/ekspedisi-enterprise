<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model {

	public function get()
	{
		if($this->session->userdata("logged_in")['level'] == 3){
			$this->db->where('pengiriman.fk_sopir',$this->session->userdata("logged_in")['id']);
		}
		$this->db->select('pengiriman.*,(select nama from pengguna where id=pengiriman.fk_sopir) as sopir_nama,(select kota from kota where id=pengiriman.fk_tujuan) as kota_tujuan');
		return $this->db->get('pengiriman')->result();
	}
	public function get_id($id)
	{
		
		return $this->db->where('id',$id)->get('pengiriman')->row(0);
	}
	public function get_pengguna()
	{
		return $this->db->get('pengguna')->result();
	}
	public function get_transaksi()
	{
		return $this->db->get('transaksi')->result();
	}
	public function get_kota()
	{
		return $this->db->get('kota')->result();
	}
	public function get_detail($id)
	{
		$this->db->select("pengiriman_detail.*,(select resi from transaksi where id=pengiriman_detail.fk_transaksi) as transaksi_resi");
		return $this->db->where('fk_pengiriman',$id)->get('pengiriman_detail')->result();
	}
	public function insert()
	{
		$set = array(
			'status' => 1,
			'fk_sopir' => $this->input->post('fk_sopir'),
			'fk_tujuan' => $this->input->post('fk_tujuan'),
		);
		$this->db->insert('pengiriman',$set);
	}
	public function insert_detail($id)
	{
		$set = array(
			'fk_pengiriman' => $id,
			'fk_transaksi' => $this->input->post('fk_transaksi'),
		);
		$this->db->insert('pengiriman_detail',$set);
	}
	public function generate_resi()
	{
		return "RESI";
	}
}
