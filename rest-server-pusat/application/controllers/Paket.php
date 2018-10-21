<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Paket extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data paket
	function index_get() {
		$id = $this->get('id');
		if ($id == '') {
			$paket = $this->db->get('paket')->result();
		} else {
			$this->db->where('id', $id);
			$paket = $this->db->get('paket')->result();
		}
		$this->response($paket, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'tanggal' => $this->post('tanggal'),
			'fk_cabang' => $this->post('fk_cabang'),
			'resi' => $this->post('resi'),
			'nama_pengirim' => $this->post('nama_pengirim'),
			'alamat_pengirim' => $this->post('alamat_pengirim'),
			'jenis' => $this->post('jenis'),
			'berat' => $this->post('berat'),
			'deskripsi' => $this->post('deskripsi'),
			'kota_tujuan' => $this->post('kota_tujuan'),
			'nama_penerima' => $this->post('nama_penerima'),
			'alamat_penerima' => $this->post('alamat_penerima'),
			'status' => $this->post('status'),
			'deskripsi_status' => $this->post('deskripsi_status'),
		);
		$insert = $this->db->insert('paket', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("paket")->row(0);
			$this->response($result, 200);
			//asline
			//$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>