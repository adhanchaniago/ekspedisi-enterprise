<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

public function __construct()
	{
		parent::__construct();
	}
	public function get()
	{
		return json_decode($this->curl->simple_get($this->apidata->get_api_malang().'/Jenis'));
	}
	public function get_id($id)
	{
		$param = array(
			'id' => $id,
		);
		return json_decode($this->curl->simple_get($this->apidata->get_api_malang().'/Jenis',$param))[0];
	}
	public function insert()
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
		);
		$this->curl->simple_post($this->apidata->get_api_malang().'/Jenis', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function update($id)
	{
		$set = array(
			'id' => $id,
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
		);
		$this->curl->simple_put($this->apidata->get_api_malang().'/Jenis', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function delete($id)
	{
		$this->curl->simple_delete($this->apidata->get_api_malang().'/Jenis', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
	}
}
