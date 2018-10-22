<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_model extends CI_Model {

	public function get()
	{
		$param = array(
			"id_cabang"=>$this->apidata->id_cabang,
			'jenis' => "penerimaan",
			'status' => 3,
		);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengiriman',$param));
	}
	public function get_detail($id)
	{
		$param = array("id"=>$id);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengiriman_detail',$param));
	}
	public function terima($id_paket)
	{
		$set = array(
			'id' => $id_paket,
			'status' => 3,
		);
		$this->curl->simple_put($this->apidata->get_api_pusat().'/Pengiriman_detail', $set, array(CURLOPT_BUFFERSIZE => 10));

		$set_terima = array(
			'id_detail_pengiriman' => $id_paket,
			'deskripsi_status' => "Diterima di cabang ".$this->apidata->kota_cabang,
			'kota_posisi' => $this->apidata->kota_cabang,
		);
		$this->curl->simple_put($this->apidata->get_api_pusat().'/Paket', $set_terima, array(CURLOPT_BUFFERSIZE => 10));
	}
}
