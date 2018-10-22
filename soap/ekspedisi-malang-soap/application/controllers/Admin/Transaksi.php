<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['id'] == null) {
			redirect('Login','refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('Transaksi_model');
	}
	public function index()
	{
		$data['data'] = $this->Transaksi_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/transaksi/transaksi',$data);
		$this->load->view('admin/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('fk_kota','fk_kota',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['petugas'] = $this->Transaksi_model->get_petugas();
			$data['pelanggan'] = $this->Transaksi_model->get_pelanggan();
			$data['kota'] = $this->Transaksi_model->get_kota();
			$data['jenis'] = $this->Transaksi_model->get_jenis();
			$this->load->view('admin/header');
			$this->load->view('admin/transaksi/insert',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Transaksi_model->insert();
			redirect('Admin/Transaksi','refresh');
		}
	}
}
