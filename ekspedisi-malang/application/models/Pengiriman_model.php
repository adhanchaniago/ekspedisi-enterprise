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
	public function get_sopir()
	{
		return $this->db->where("fk_level",3)->get('pengguna')->result();
	}
	public function get_transaksi($id)
	{
		$query = $this->db->where("id",$id)->get("pengiriman")->row(0);
		$id_tujuan = $query->fk_tujuan;

		$this->db->select('transaksi.*,(select kota from kota where id=fk_kota) as nama_kota');
		$this->db->where('fk_kota',$id_tujuan);
		$this->db->where('status',1);
		$result['direct'] = $this->db->get('transaksi')->result();

		$this->db->select('transaksi.*,(select kota from kota where id=fk_kota) as nama_kota');
		$this->db->where('fk_kota !=',$id_tujuan);
		$this->db->where('status',1);
		$result['transit'] = $this->db->get('transaksi')->result();
		return $result;
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
	public function insert_detail($id,$id_transaksi)
	{
		$set = array(
			'fk_pengiriman' => $id,
			'fk_transaksi' => $id_transaksi,
		);
		$query = $this->db->insert('pengiriman_detail',$set);
		if($query){
			$this->db->where("id",$id_transaksi)->update("transaksi",array('status'=>2));
		}
	}
	public function generate_resi()
	{
		return "RESI";
	}
}
