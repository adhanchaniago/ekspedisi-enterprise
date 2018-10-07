<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kota extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data kota
	function index_get() {
		$id = $this->get('id');
		if ($id == '') {
			$kota = $this->db->get('kota')->result();
		} else {
			$this->db->where('id', $id);
			$kota = $this->db->get('kota')->result();
		}
		$this->response($kota, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'id' => $this->post('id'),
			'kota' => $this->post('kota'),
			'harga' => $this->post('harga')
		);
		$insert = $this->db->insert('kota', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("kota")->row(0);
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
			'id' => $this->put('id'),
			'kota' => $this->put('kota'),
			'harga' => $this->put('harga')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('kota', $data);
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
		$delete = $this->db->delete('kota');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>