<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	var $soap_client;
	var $soap_client_pengguna;
	public function __construct()
	{
		parent::__construct();
		$this->soap_client = new SoapClient($this->apidata->get_api_pusat()."/MySoapServer?wsdl");
		$this->soap_client_pengguna = new SoapClient($this->apidata->get_api_pusat()."/Pengguna?wsdl");
	}
	public function get()
	{
		return json_decode($this->soap_client_pengguna->getData(json_encode(array("table"=>"pengguna"))));
	}
	public function get_id($id)
	{
		return json_decode($this->soap_client->getDataId(json_encode(array("table"=>"pengguna",'id'=>$id))));;
	}
	public function get_level()
	{
		return json_decode($this->soap_client->getData(json_encode(array("table"=>"level"))));
	}
	public function insert()
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'fk_level' => $this->input->post('fk_level'),
		);
		$data = $this->soap_client->insertData(json_encode(array("table"=>"pengguna","data"=>$set)));
	}
	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'fk_level' => $this->input->post('fk_level'),
		);
		$this->soap_client->updateData(json_encode(array("table"=>"pengguna","primary_key"=>"id","id"=>$id,"data"=>$set)));
	}
	public function delete($id)
	{
		$this->soap_client->deleteData(json_encode(array("table"=>"pengguna","primary_key"=>"id","id"=>$id)));
	}
}
