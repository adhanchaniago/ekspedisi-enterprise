<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	public function get()
	{
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Cabang'));
	}
	public function get_id($id)
	{
		$param = array(
			'id' => $id,
		);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Cabang',$param))[0];
	}
	public function insert()
	{
		$set = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kota' => $this->input->post('kota'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->curl->simple_post($this->apidata->get_api_pusat().'/Cabang', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function update($id)
	{
		$set = array(
			'id' => $id, 
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'kota' => $this->input->post('kota'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->curl->simple_put($this->apidata->get_api_pusat().'/Cabang', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function delete($id)
	{
		$this->curl->simple_delete($this->apidata->get_api_pusat().'/Cabang', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
	}
}
