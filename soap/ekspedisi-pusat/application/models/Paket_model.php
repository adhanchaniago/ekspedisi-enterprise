<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

	var $soap_client;
	public function __construct()
	{
		parent::__construct();
		$this->soap_client = new SoapClient($this->apidata->get_api_pusat()."/MySoapServer?wsdl");
	}
	public function get()
	{
		return json_decode($this->soap_client->getData(json_encode(array("table"=>"paket"))));
	}
}
?>