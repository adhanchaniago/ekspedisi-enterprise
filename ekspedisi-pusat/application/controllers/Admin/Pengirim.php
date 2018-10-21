<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengirim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pengirim_model');
	}
	public function index()
	{
		$data['data'] = $this->Pengirim_model->get();
		$this->load->view('admin/header');
		$this->load->view('admin/pengirim/pengirim',$data);
		$this->load->view('admin/footer');
	}
	public function detail($id)
	{
		$data['pengiriman'] = $this->Pengirim_model->get_id($id);
		$data['data'] = $this->Pengirim_model->get_detail($id);
		$this->load->view('admin/header');
		$this->load->view('admin/pengirim/detail',$data);
		$this->load->view('admin/footer');
	}
	public function berangkat($id)
	{
		$berangkat = $this->Pengirim_model->berangkat($id);
		if($berangkat){
			echo "<script>alert('Semoga sampai tujuan')</script>";
		}else{
			echo "<script>alert('Mohon masukan semua paket sebelum berangkat')</script>";
		}
		redirect('Admin/Pengirim/detail/'.$id,'refresh');
	}
	public function sampai($id)
	{
		$sampai = $this->Pengirim_model->sampai($id);
		redirect('Admin/Pengirim/detail/'.$id,'refresh');
	}
	public function selesai($id)
	{
		$selesai = $this->Pengirim_model->selesai($id);
		if($selesai){
			echo "<script>alert('Terimakasih')</script>";
		}else{
			echo "<script>alert('Mohon taruh semua paket sebelum selesai')</script>";
		}
		redirect('Admin/Pengirim/detail/'.$id,'refresh');
	}
}
?>