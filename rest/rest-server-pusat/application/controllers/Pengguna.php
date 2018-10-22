<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pengguna extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data pengguna
	function index_get() {
		$id = $this->get('id');
		$this->db->select("pengguna.*, (select nama from level where id=pengguna.fk_level) as level_nama");
		if ($id == '') {
			$pengguna = $this->db->get('pengguna')->result();
		} else {
			$this->db->where('id', $id);
			$pengguna = $this->db->get('pengguna')->result();
		}
		$this->response($pengguna, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'nama' => $this->post('nama'),
			'alamat' => $this->post('alamat'),
			'telp' => $this->post('telp'),
			'email' => $this->post('email'),
			'username' => $this->post('username'),
			'password' => md5($this->post('password')),
			'fk_level' => $this->post('fk_level'),
		);
		$insert = $this->db->insert('pengguna', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("pengguna")->row(0);
			$this->response($result, 200);
			//asline
			//$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Memperbarui data kontak yang telah ada
	function index_put() {
		$id = $this->put('id');
		$data = array(
			'nama' => $this->put('nama'),
			'alamat' => $this->put('alamat'),
			'telp' => $this->put('telp'),
			'email' => $this->put('email'),
			'username' => $this->put('username'),
			'password' => md5($this->put('password')),
			'fk_level' => $this->put('fk_level'),
		);
		$this->db->where('id', $id);
		$update = $this->db->update('pengguna', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Menghapus salah satu data kontak
	function index_delete() {
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('pengguna');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>