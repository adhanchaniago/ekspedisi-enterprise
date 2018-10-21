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
	public function get_petugas()
	{
		return $this->db->where("fk_level",2)->get('pengguna')->result();
	}
	public function get_sopir()
	{
		return $this->db->where("fk_level",3)->get('pengguna')->result();
	}
	public function get_pelanggan()
	{
		return $this->db->where("fk_level",4)->get('pengguna')->result();
	}
	public function get_kota()
	{
		return $this->db->get('kota')->result();
	}
	public function get_jenis()
	{
		return $this->db->get('jenis')->result();
	}
	public function insert()
	{
		$set = array(
			'tanggal' => $this->input->post('tanggal'),
			'penerima' => $this->input->post('penerima'),
			'alamat' => $this->input->post('alamat'),
			'resi' => $this->generate_resi(),
			'status' => 1,
			'berat' => $this->input->post('berat'),
			'deskripsi' => $this->input->post('deskripsi'),
			'fk_petugas' => $this->session->userdata('logged_in')['id'],
			'fk_kota' => $this->input->post('fk_kota'),
			'fk_jenis' => $this->input->post('fk_jenis'),
		);
		if($this->input->post("pelanggan_baru") != null){
			$gen_username = $this->generate_username($this->input->post('pengguna_nama'));
			$set_pelanggan = array(
				'nama' => $this->input->post('pengguna_nama'),
				'alamat' => $this->input->post('pengguna_alamat'),
				'telp' => $this->input->post('pengguna_telp'),
				'email' => $this->input->post('pengguna_email'),
				'username' => $gen_username,
				'password' => md5($gen_username),
				'fk_level' => 4,
			);
			$this->db->insert('pengguna',$set_pelanggan);
			$set['fk_pelanggan'] = $this->db->insert_id();
		}else{
			$set['fk_pelanggan'] = $this->input->post('fk_pelanggan');
		}
		$this->db->insert('transaksi',$set);
		$this->insert_to_pusat($this->db->insert_id());
	}
	public function insert_to_pusat($id)
	{
		$this->load->library("curl");
		$this->db->select("transaksi.*,
			(select nama from pengguna where id=fk_pelanggan) as nama_pengirim,
			(select alamat from pengguna where id=fk_pelanggan) as alamat_pengirim,
			(select nama from jenis where id=fk_jenis) as nama_jenis,
			(select kota from kota where id=fk_kota) as nama_kota");
		$query = $this->db->where('id',$id)->get("transaksi");
		$res_query = $query->result()[0];
		$data = array(
			'tanggal' => $res_query->tanggal,
			'fk_cabang' => $this->apidata->id_cabang,
			'resi' => $res_query->resi,
			'nama_pengirim' => $res_query->nama_pengirim,
			'alamat_pengirim' => $res_query->alamat_pengirim,
			'jenis' => $res_query->nama_jenis,
			'berat' => $res_query->berat,
			'deskripsi' => $res_query->deskripsi,
			'kota_tujuan' => $res_query->nama_kota,
			'nama_penerima' => $res_query->penerima,
			'alamat_penerima' => $res_query->alamat,
			'status' => $res_query->status,
			'deskripsi_status' => "",
			'kota_posisi' => $this->apidata->kota_cabang,
		);
		$this->curl->simple_post($this->apidata->get_api_pusat().'/Paket', $data, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function generate_resi()
	{
		$date = date("Ymd");
		$rand = rand(1000,9999);
		$id = $this->db->query("select id from transaksi order by id desc")->row(0)->id;
		$newid = $id+1;
		$stringid = substr("00000".$newid, -5);
		return $this->apidata->kode_cabang.$date.$rand.$stringid;
	}
	public function generate_username($nama)
	{
		$purename = strtolower(str_replace(" ", "", $nama));
		do{
			$username = $purename.rand(1000,9999);
			$query = $this->db->where("username",$username)->get('pengguna');
		}while($query->num_rows() != 0);
		return $username;
	}
}
