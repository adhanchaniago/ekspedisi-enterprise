<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['id'] == null) {
			redirect('Login','refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('Pengiriman_model');
	}
	public function index()
	{
		$data['data'] = $this->Pengiriman_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/pengiriman/pengiriman',$data);
		$this->load->view('admin/footer');
	}

	public function detail($id)
	{
		$data['data'] = $this->Pengiriman_model->get_detail($id);
		$this->load->view('admin/header');
		$this->load->view('admin/pengiriman/detail',$data);
		$this->load->view('admin/footer');
	}
	public function angkut($id_pengiriman,$id_paket)
	{
		$this->Pengiriman_model->angkut($id_paket);
		redirect('Admin/Pengiriman/detail/'.$id_pengiriman,'refresh');
	}
}
