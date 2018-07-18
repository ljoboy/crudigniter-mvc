<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gambar');
		$data_index = array('nav' => 'gambar',
							'hal' => 'tampil',
							'url_unduh' => base_url().'index.php/gambar/unduh/load/',
							'url_tambah' => base_url().'index.php/gambar/tambah',
							'url_ubah' => base_url().'index.php/gambar/ubah/id/',
							'url_hapus' => base_url().'index.php/gambar/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['img'] = $this->gambar->tampil();
		$this->load->view('gambar/tampil',$data);
	}
}
?>