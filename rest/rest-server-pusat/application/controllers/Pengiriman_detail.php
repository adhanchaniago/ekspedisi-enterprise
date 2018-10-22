<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pengiriman_detail extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
	function index_get() {
		$id = $this->get('id');
		$this->db->select("pengiriman_detail.*,(select resi from paket where id=fk_paket) as resi");
		$this->db->where('fk_pengiriman',$id);
		$pengiriman_detail = $this->db->get("pengiriman_detail")->result();
		$this->response($pengiriman_detail, 200);
	}
	function index_put() {
		$id = $this->put('id');
		$data = array(
			'status' => $this->put('status')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('pengiriman_detail', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>