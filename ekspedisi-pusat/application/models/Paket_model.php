<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

	public function get()
	{
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Paket'));
	}
}
?>