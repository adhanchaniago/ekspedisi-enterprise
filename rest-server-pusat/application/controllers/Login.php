<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
	function index_post() {
		$data = array(
			'username' => $this->post('username'),
			'password' => $this->post('password'),
		);
		$this->db->select("id,nama,username,fk_level");
		$this->db->where("username",$data['username']);
		$this->db->where("password",$data['password']);
		$query = $this->db->get("pengguna");
		$res['num_rows'] = $query->num_rows();
		$res['data'] = $query->row(0);
		$this->response($res, 200);
	}
}
?>