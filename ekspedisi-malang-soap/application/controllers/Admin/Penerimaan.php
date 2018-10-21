<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['id'] == null) {
			redirect('Login','refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('Penerimaan_model');
	}
	public function index()
	{
		$data['data'] = $this->Penerimaan_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/penerimaan/penerimaan',$data);
		$this->load->view('admin/footer');
	}

	public function detail($id)
	{
		$data['data'] = $this->Penerimaan_model->get_detail($id);
		$this->load->view('admin/header');
		$this->load->view('admin/penerimaan/detail',$data);
		$this->load->view('admin/footer');
	}
	public function terima($id_pengiriman,$id_paket)
	{
		$this->Penerimaan_model->terima($id_paket);
		redirect('Admin/Penerimaan/detail/'.$id_pengiriman,'refresh');
	}
}
