<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidata {

	function __construct(){
	}
	public function get_api_pusat()
	{
		return "http://localhost/ekspedisi-enterprise/rest/rest-server-pusat/index.php";
	}
}
