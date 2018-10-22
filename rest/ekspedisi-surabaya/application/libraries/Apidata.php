<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata {

	var $kode_cabang;
	var $id_cabang;
	var $kota_cabang;
	function __construct(){
		$this->kode_cabang = "082";
		$this->id_cabang = 3;
		$this->kota_cabang = "Surabaya";
	}
	public function get_api_pusat()
	{
		return "http://192.168.1.10/ekspedisi-enterprise/rest/rest-server-pusat/index.php";
	}

	public function get_api_malang()
	{
		return "http://localhost/ekspedisi-enterprise/rest/rest-server-surabaya/index.php";
	}
}
