<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
	public function insert()
	{
		$this->form_validation->set_rules('fk_sopir','fk_sopir',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['sopir'] = $this->Pengiriman_model->get_pengguna();
			$data['kota'] = $this->Pengiriman_model->get_kota();
			$this->load->view('admin/header');
			$this->load->view('admin/pengiriman/insert',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Pengiriman_model->insert();
			redirect('Admin/Pengiriman','refresh');
		}
	}
	public function detail($id)
	{
		$this->form_validation->set_rules('fk_transaksi','fk_transaksi',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->Pengiriman_model->get_detail($id);
			$data['pengiriman'] = $this->Pengiriman_model->get_id($id);
			$data['transaksi'] = $this->Pengiriman_model->get_transaksi();
			$this->load->view('admin/header');
			$this->load->view('admin/pengiriman/detail',$data);
			$this->load->view('admin/footer');
		} else {
			$this->Pengiriman_model->insert_detail($id);
			redirect('Admin/Pengiriman/detail/'.$id,'refresh');
		}
	}
}
