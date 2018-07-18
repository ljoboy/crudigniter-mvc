<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('idAuto');
		$this->load->model('gambar');
		$this->load->model('artikel');
		$this->load->model('file');
		$data_index = array('nav' => 'dashboard');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['jumlah'] = array('idauto' => $this->idAuto->jumlah(),
								'gambar' => $this->gambar->jumlah(),
								'jml_artikel' => $this->artikel->jumlah(),
								'file' => $this->file->jumlah(),
								'artikel' => $this->artikel->tampil_limit());
		$this->load->view('index',$data);
	}
}
?>