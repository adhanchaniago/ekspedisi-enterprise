<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata {

	var $kode_cabang;
	var $id_cabang;
	var $kota_cabang;
	function __construct(){
		$this->kode_cabang = "092";
		$this->id_cabang = 2;
		$this->kota_cabang = "Malang";
	}
	public function get_api_malang()
	{
		return "http://localhost/ekspedisi-enterprise/soap-server-malang/index.php";
	}
}
