<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {

	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/ekspedisi-enterprise/rest_server/index.php";
	}
	public function get()
	{
		return json_decode($this->curl->simple_get($this->API.'/Kota'));
	}
	public function get_id($id)
	{
		$param = array(
			'id' => $id,
		);
		return json_decode($this->curl->simple_get($this->API.'/Kota',$param))[0];
	}
	public function insert()
	{
		$set = array(
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$this->curl->simple_post($this->API.'/Kota', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function update($id)
	{
		$set = array(
			'id' => $id,
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$this->curl->simple_put($this->API.'/Kota', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function delete($id)
	{
		$this->curl->simple_delete($this->API.'/Kota', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
	}
}
