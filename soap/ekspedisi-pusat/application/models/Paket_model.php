<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

	public function get()
	{
		return $this->db->get('paket')->result();
	}
}
?>