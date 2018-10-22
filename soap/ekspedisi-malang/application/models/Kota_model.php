<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {

	var $soap_client;
	public function __construct()
	{
		$this->soap_client = new SoapClient($this->apidata->get_api_pusat()."/MySoapServer?wsdl");
		parent::__construct();
	}
	public function get()
	{
		return  json_decode($this->soap_client->getData(json_encode(array("table"=>"kota"))));
	}
	public function get_id($id)
	{
		return json_decode($this->soap_client->getDataId(json_encode(array("table"=>"kota",'id'=>$id))));
	}
	public function insert()
	{
		$set = array(
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$data = $this->soap_client->insertData(json_encode(array("table"=>"kota","data"=>$set)));
	}
	public function update($id)
	{
		$set = array(
			'kota' => $this->input->post('kota'),
			'harga' => $this->input->post('harga'),
		);
		$this->soap_client->updateData(json_encode(array("table"=>"kota","primary_key"=>"id","id"=>$id,"data"=>$set)));
	}
	public function delete($id)
	{
		$this->soap_client->deleteData(json_encode(array("table"=>"kota","primary_key"=>"id","id"=>$id)));
	}
}
