<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['id'] == null) {
			redirect('Login','refresh');
		}
		if ($this->session->userdata('logged_in')['level'] == 3) {
			redirect('Login','refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('Cabang_model');
	}
	public function index()
	{
		$data['data'] = $this->Cabang_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/cabang/cabang',$data);
		$this->load->view('admin/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('kode','Kode','required|numeric|exact_length[3]|is_unique[cabang.kode]');
		$this->form_validation->set_rules('nama','Nama','required|regex_match[/^[a-zA-Z][a-zA-Z\\s]+$/]');
		$this->form_validation->set_rules('kota','Kota','required|regex_match[/^[a-zA-Z][a-zA-Z\\s]+$/]');
		$this->form_validation->set_rules('alamat','Alamat','required');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/cabang/insert');
			$this->load->view('admin/footer');
		} else {
			$this->Cabang_model->insert();
			redirect('Admin/Cabang','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('kode','Kode','required|numeric|exact_length[3]');
		$this->form_validation->set_rules('nama','Nama','required|regex_match[/^[a-zA-Z][a-zA-Z\\s]+$/]');
		$this->form_validation->set_rules('kota','Kota','required|regex_match[/^[a-zA-Z][a-zA-Z\\s]+$/]');
		$this->form_validation->set_rules('alamat','Alamat','required');

		$this->form_validation->set_error_delimeter("<p class='text-danger'>","</p>");
		
		if ($this->form_validation->run() == FALSE) {
			$data['cabang'] = $this->Cabang_model->get_id($id);
			$this->load->view('admin/header');
			$this->load->view('admin/cabang/update',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Cabang_model->update($id);
			redirect('Admin/Cabang','refresh');
		}
	}
	public function delete($id)
	{
		$this->Cabang_model->delete($id);
		redirect('Admin/Cabang','refresh');
	}
}
