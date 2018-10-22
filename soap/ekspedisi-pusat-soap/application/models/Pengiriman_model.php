<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model {

	public function get()
	{
		$this->db->select('pengiriman.*,
			(select nama from pengguna where id=fk_pengirim) as nama_pengirim,
			(select kota from cabang where id=fk_cabang_ke) as kota_ke,
			(select kota from cabang where id=fk_cabang_dari) as kota_dari,');
		return $this->db->get('pengiriman')->result();
	}
	public function get_id($id)
	{
		$this->db->select('pengiriman.*,
			(select nama from pengguna where id=fk_pengirim) as nama_pengirim,
			(select kota from cabang where id=fk_cabang_ke) as kota_ke,
			(select kota from cabang where id=fk_cabang_dari) as kota_dari,');
		return $this->db->where('id',$id)->get('pengiriman')->row(0);
	}
	public function get_pengirim()
	{
		return $this->db->where('fk_level',3)->get("pengguna")->result();
	}
	public function get_cabang()
	{
		return $this->db->get('cabang')->result();
	}
	public function insert()
	{
		$set = array(
			'kode' => $this->generate_kode(),
			'fk_pengirim' => $this->input->post('fk_pengirim'),
			'fk_cabang_dari' => $this->input->post('fk_cabang_dari'),
			'fk_cabang_ke' => $this->input->post('fk_cabang_ke'),
			'status' => 1,
			'deskripsi_status' => "Proses pengambilan",
		);
		$insert = $this->db->insert('pengiriman',$set);

		
	}
	public function get_paket($id)
	{
		$this->db->select("pengiriman.*,(select kota from cabang where id=fk_cabang_dari) as kota_dari,(select kota from cabang where id=fk_cabang_ke) as kota_ke");
		$query = $this->db->where("id",$id)->get("pengiriman")->row(0);
		$kota_dari = $query->kota_dari;
		$kota_ke = $query->kota_ke;

		$this->db->select('paket.*,(select kota from cabang where kota=kota_tujuan) as nama_kota');
		$this->db->where('kota_posisi',$kota_dari);
		$this->db->where('kota_tujuan',$kota_ke);
		$this->db->where('status',1);
		$result['direct'] = $this->db->get('paket')->result();

		$this->db->select('paket.*,(select kota from cabang where kota=kota_tujuan) as nama_kota');
		$this->db->where('kota_posisi',$kota_dari);
		$this->db->where('kota_tujuan !=',$kota_ke);
		$this->db->where('status',1);
		$result['transit'] = $this->db->get('paket')->result();
		return $result;
	}
	public function get_detail($id)
	{
		$this->db->select("pengiriman_detail.*,(select resi from paket where id=fk_paket) as resi");
		return $this->db->where('fk_pengiriman',$id)->get("pengiriman_detail")->result();
	}
	public function insert_detail($id,$id_paket)
	{
		$set = array(
			'fk_pengiriman' => $id,
			'fk_paket' => $id_paket,
			'status' => 1,
		);
		$query = $this->db->insert('pengiriman_detail',$set);
		if($query){
			$res_data = $this->get_id($id);
			$this->db->where("id",$id_paket)->update("paket",array('status'=>2,'deskripsi_status'=>"Proses kirim ke ".$res_data->kota_ke));
		}
	}
	public function generate_kode()
	{
		$purename = "EKSP";
		do{
			$kode = $purename.rand(1000,9999);
			$query = $this->db->where("kode",$kode)->get('pengiriman');
		}while($query->num_rows() != 0);
		return $kode;
	}
}
