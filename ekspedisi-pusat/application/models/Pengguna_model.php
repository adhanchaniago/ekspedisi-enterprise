<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function get()
	{
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengguna'));
	}
	public function get_id($id)
	{
		
		$param = array(
			'id' => $id,
		);
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Pengguna',$param))[0];
	}
	public function get_level()
	{
		return json_decode($this->curl->simple_get($this->apidata->get_api_pusat().'/Level'));
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
		$this->curl->simple_post($this->apidata->get_api_pusat().'/Pengguna', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function update($id)
	{
		$set = array(
			'id' => $id,
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'fk_level' => $this->input->post('fk_level'),
		);
		$this->curl->simple_put($this->apidata->get_api_pusat().'/Pengguna', $set, array(CURLOPT_BUFFERSIZE => 10));
	}
	public function delete($id)
	{
		$this->curl->simple_delete($this->apidata->get_api_pusat().'/Pengguna', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
	}
}
