<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata {

	var $kode_cabang;

	function __construct(){
		$this->kode_cabang = "092";
	}
	public function get_api_pusat()
	{
		return "http://localhost:8080/ekspedisi-enterprise/rest-server-pusat/index.php";
	}
}
