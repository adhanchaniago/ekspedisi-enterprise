<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pengiriman_pusat extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
//Menampilkan data pengguna
	function index_get() {
		$id = $this->get('id');
		$this->db->select('pengiriman.*,
			(select nama from pengguna where id=fk_pengirim) as nama_pengirim,
			(select kota from cabang where id=fk_cabang_ke) as kota_ke,
			(select kota from cabang where id=fk_cabang_dari) as kota_dari,');
		if ($id == '') {
			$pengiriman = $this->db->get('pengiriman')->result();
		} else {
			$this->db->where('id', $id);
			$pengiriman = $this->db->get('pengiriman')->result();
		}
		$this->response($pengiriman, 200);
	}

	//Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'kode' => $this->post("kode"),
			'fk_pengirim' => $this->post('fk_pengirim'),
			'fk_cabang_dari' => $this->post('fk_cabang_dari'),
			'fk_cabang_ke' => $this->post('fk_cabang_ke'),
			'status' => $this->post('status'),
			'deskripsi_status' => "Proses pengambilan",
		);
		$insert = $this->db->insert('pengiriman', $data);
		if ($insert) {
			//modif
			$result = $this->db->where('id',$this->db->insert_id())->get("pengiriman")->row(0);
			$this->response($result, 200);
			//asline
			//$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>