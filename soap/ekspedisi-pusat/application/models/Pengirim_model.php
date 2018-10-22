<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengirim_model extends CI_Model {

	public function get()
	{
		$this->db->select('pengiriman.*,
			(select nama from pengguna where id=fk_pengirim) as nama_pengirim,
			(select kota from cabang where id=fk_cabang_ke) as kota_ke,
			(select kota from cabang where id=fk_cabang_dari) as kota_dari,');
		$this->db->where('fk_pengirim',$this->session->userdata("logged_in")['id']);
		return $this->db->get('pengiriman')->result();
	}
	public function get_id($id)
	{
		$this->db->select('pengiriman.*,
			(select nama from pengguna where id=fk_pengirim) as nama_pengirim,
			(select kota from cabang where id=fk_cabang_ke) as kota_ke,
			(select kota from cabang where id=fk_cabang_dari) as kota_dari,');
		$this->db->where('fk_pengirim',$this->session->userdata("logged_in")['id']);
		$this->db->where('id',$id);
		return $this->db->get('pengiriman')->result()[0];
	}
	public function get_detail($id)
	{
		$this->db->select("pengiriman_detail.*,(select resi from paket where id=fk_paket) as resi");
		return $this->db->where('fk_pengiriman',$id)->get("pengiriman_detail")->result();
	}
	public function berangkat($id)
	{
		$query = $this->db->where('fk_pengiriman',$id)->where("status",1)->get("pengiriman_detail");
		if($query->num_rows() != 0){
			return false;
		}else{
			$set = array(
				'status' => 2,
				'tgl_berangkat' => date("Y-m-d H:i"),
				'deskripsi_status' => "Berangkat ke Tujuan",
			);
			$this->db->where('id',$id)->update('pengiriman',$set);
			return true;
		}
	}
	public function sampai($id)
	{
		$set = array(
				'status' => 3,
				'tgl_sampai' => date("Y-m-d H:i"),
				'deskripsi_status' => "Menaruh Paket ke Tujuan",
			);
			$this->db->where('id',$id)->update('pengiriman',$set);
	}
	public function selesai($id)
	{
		$query = $this->db->where('fk_pengiriman',$id)->where("status",2)->get("pengiriman_detail");
		if($query->num_rows() != 0){
			return false;
		}else{
			$set = array(
				'status' => 4,
				'deskripsi_status' => "Selesai",
			);
			$this->db->where('id',$id)->update('pengiriman',$set);
			return true;
		}
	}
}
?>