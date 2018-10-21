<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata {

	var $kode_cabang;
	var $id_cabang;

	function __construct(){
		$this->kode_cabang = "092";
		$this->id_cabang = 2;
	}
	public function get_api_pusat()
	{
		return "http://localhost/ekspedisi-enterprise/rest-server-pusat/index.php";
	}
}
