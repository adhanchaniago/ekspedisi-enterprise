<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Level extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data level
	function index_get() {
		$id = $this->get('id');
		if ($id == '') {
			$level = $this->db->get('level')->result();
		} else {
			$this->db->where('id', $id);
			$level = $this->db->get('level')->result();
		}
		$this->response($level, 200);
	}
}
?>