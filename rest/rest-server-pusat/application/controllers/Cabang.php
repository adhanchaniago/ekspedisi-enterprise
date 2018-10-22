<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Cabang extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data cabang
	function index_get() {
		$id = $this->get('id');
		if ($id == '') {
			$cabang = $this->db->get('cabang')->result();
		} else {
			$this->db->where('id', $id);
			$cabang = $this->db->get('cabang')->result();
		}
		$this->response($cabang, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'kode' => $this->post('kode'),
			'nama' => $this->post('nama'),
			'kota' => $this->post('kota'),
			'alamat' => $this->post('alamat'),
		);
		$insert = $this->db->insert('cabang', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("cabang")->row(0);
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
			'kode' => $this->put('kode'),
			'nama' => $this->put('nama'),
			'kota' => $this->put('kota'),
			'alamat' => $this->put('alamat'),
		);
		$this->db->where('id', $id);
		$update = $this->db->update('cabang', $data);
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
		$delete = $this->db->delete('cabang');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>