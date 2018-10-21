<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model {

	public function get()
	{
		$param = array(
			"id_cabang"=>$this->apidata->id_cabang,
			'jenis' => "pengiriman",
		);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengiriman',$param));
	}
	public function get_detail($id)
	{
		$param = array("id"=>$id);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengiriman_detail',$param));
	}
	public function angkut($id_paket)
	{
		$set = array(
			'id' => $id_paket,
			'status' => 2,
		);
		$this->curl->simple_put($this->apidata->get_api_pusat().'/Pengiriman_detail', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
}
