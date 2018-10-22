<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

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
		$this->load->model('Paket_model');

	}
	public function index()
	{
		$data['data'] = $this->Paket_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/paket/paket',$data);
		$this->load->view('admin/footer');
	}
}
?>