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
