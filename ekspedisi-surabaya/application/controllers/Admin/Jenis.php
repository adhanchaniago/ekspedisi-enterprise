<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Jenis_model');
	}
	public function index()
	{
		$data['data'] = $this->Jenis_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/jenis/jenis',$data);
		$this->load->view('admin/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('harga','Harga','required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/jenis/insert');
			$this->load->view('admin/footer');
		} else {
			$this->Jenis_model->insert();
			redirect('Admin/Jenis','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('harga','Harga','required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['jenis'] = $this->Jenis_model->get_id($id);
			$this->load->view('admin/header');
			$this->load->view('admin/jenis/update',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Jenis_model->update($id);
			redirect('Admin/Jenis','refresh');
		}
	}
	public function delete($id)
	{
		$this->Jenis_model->delete($id);
		redirect('Admin/Jenis','refresh');
	}
}
