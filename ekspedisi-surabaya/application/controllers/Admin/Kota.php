<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	var $API ="";

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/ekspedisi-enterprise/rest_server/index.php";
		$this->load->library('form_validation');
		$this->load->model('Kota_model');
		$this->load->library('curl');
	}
	public function index()
	{
		$data['data'] = $this->Kota_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/kota/kota',$data);
		$this->load->view('admin/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('kota','Kota','required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/kota/insert');
			$this->load->view('admin/footer');
		} else {
			$this->Kota_model->insert();
			redirect('Admin/Kota','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('kota','Kota','required');

		if ($this->form_validation->run() == FALSE) {
			$data['kota'] = $this->Kota_model->get_id($id);
			$this->load->view('admin/header');
			$this->load->view('admin/kota/update',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Kota_model->update($id);
			redirect('Admin/Kota','refresh');
		}
	}
	public function delete($id)
	{
		$this->Kota_model->delete($id);
		redirect('Admin/Kota','refresh');
	}
}
