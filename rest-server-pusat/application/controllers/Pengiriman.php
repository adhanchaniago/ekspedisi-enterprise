<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pengiriman extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
	function index_get() {
		$jenis = $this->get("jenis");
		$id_cabang = $this->get('id_cabang');
		$status = $this->get('status');
		$this->db->select("pengiriman.*,(select kota from cabang where id=fk_cabang_ke) as kota_tujuan");
		if ($jenis == "pengiriman") {
			$this->db->where('fk_cabang_dari',$id_cabang);
		}else{
			$this->db->where('fk_cabang_ke',$id_cabang);
		}
		$this->db->where('status',$status);
		$pengiriman = $this->db->get("pengiriman")->result();
		$this->response($pengiriman, 200);
	}
	
}
?>