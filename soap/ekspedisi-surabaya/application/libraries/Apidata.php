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
	public function get_api_malang()
	{
		return "http://localhost:8080/ekspedisi-enterprise/soap/soap-server-surabaya/index.php";
	}
	public function get_api_pusat()
	{
		return "http://192.168.62.145/ekspedisi-enterprise/soap/soap-server-pusat/index.php";
	}
}
