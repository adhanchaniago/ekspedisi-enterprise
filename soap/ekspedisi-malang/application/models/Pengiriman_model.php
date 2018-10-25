<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model {

var $soap_client;
	public function __construct()
	{
		parent::__construct();
		$this->soap_client = new SoapClient($this->apidata->get_api_pusat()."/Pengiriman?wsdl");
	}

	public function get()
	{
		$param = array(
			"table" => "pengiriman",
			"id_cabang"=>$this->apidata->id_cabang,
			'column_where' => "fk_cabang_dari",
			'status' => 1,
		);
		$data = $this->soap_client->getPengiriman(json_encode($param));
		$data = json_decode($data);
		if($data == null){
			$data = array();
		}
		return $data;
	}
	public function get_detail($id)
	{
		$data = json_decode($this->soap_client->pengirimanDetail(json_encode(array("id"=>$id))));
		return $data;
	}
	public function angkut($id_paket)
	{
		$set = array(
			'id' => $id_paket,
			'status' => 2,
		);
		$this->soap_client->pengirimanDetail(json_encode($set));
	}
}
