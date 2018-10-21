<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['id'] == null) {
			redirect('Login','refresh');
		}
		if ($this->session->userdata('logged_in')['level'] == 2 || $this->session->userdata('logged_in')['level'] == 3) {
			redirect('Login','refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('Pengguna_model');
	}
	public function index()
	{
		$data['data'] = $this->Pengguna_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/pengguna/pengguna',$data);
		$this->load->view('admin/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('nama','Nama',"required");
		$this->form_validation->set_rules('alamat','Alamat',"required");
		$this->form_validation->set_rules('telp','Telp',"required");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('username','Username',"required");
		$this->form_validation->set_rules('password','Password',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['level'] = $this->Pengguna_model->get_level();
			$this->load->view('admin/header');
			$this->load->view('admin/pengguna/insert',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Pengguna_model->insert();
			redirect('Admin/Pengguna','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama','Nama',"required");
		$this->form_validation->set_rules('alamat','Alamat',"required");
		$this->form_validation->set_rules('telp','Telp',"required");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('username','Username',"required");
		$this->form_validation->set_rules('password','Password',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['level'] = $this->Pengguna_model->get_level();
			$data['pengguna'] = $this->Pengguna_model->get_id($id);
			$this->load->view('admin/header');
			$this->load->view('admin/pengguna/update',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Pengguna_model->update($id);
			redirect('Admin/Pengguna','refresh');
		}
	}
	public function delete($id)
	{
		$this->Pengguna_model->delete($id);
		redirect('Admin/Pengguna','refresh');
	}
}
